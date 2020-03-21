<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class menuscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('menus')->get();
        $accessgroup = DB::table('accessmenu')->get();
        return view ('mastermenus.index',compact('data','accessgroup'));

    }

  
    public function store(Request $request)
    {
        $accessmenu = [];
        $data = [];
        foreach ($request->data as $key => $value) {

            if($value['name'] == "accessmenu[]"){
                array_push($accessmenu,$value['value']);
            }else{
                $data[$value['name']] = $value['value'];
            }
        }
        $accessmenu = json_encode($accessmenu);
        $data["access_menus"] = $accessmenu;
        DB::table('menus')->insert($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
