<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Auth;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct(Dispatcher $event)
    {
        $this->sidebar($event);
    
        $this->middleware('auth');
        
    }

    public function sidebar($events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(trans('menu.pages'));
                $id = collect(json_decode(DB::table('roles')->where('id_roles', Auth::user()->role)->first()->menus))->keys();
                $get_menus = collect( DB::table('menus')->whereIn('id',$id)->get())->groupBy('child');
                $sidebar = [];
                foreach ($get_menus as $key => $value) {
                        $parent = DB::table("menus")->where('id',$key)->first();
                        if (isset($parent->menu)) {
                            $submenu = [];
                            foreach ($value as $last_data) {
                                array_push($submenu,[
                                    "text" => $last_data->menu,
                                    "url" => $last_data->url,
                                ]);
                            }
                            $sidebar[$key]["text"] = $parent->menu;
                            $sidebar[$key]["submenu"] = $submenu;
                        }else{
                            foreach ($value as $keys => $data) {
                                $kr = array_key_last ($sidebar);
                                $sidebar[$kr + 1]["text"] = $data->menu;
                            }
                     }
                       
                    
                }
            $event->menu->add(...$sidebar);
        });
    }
   
}
