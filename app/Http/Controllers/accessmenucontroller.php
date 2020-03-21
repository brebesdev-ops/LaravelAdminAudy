<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class accessmenucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $access = DB::table('accessmenu')->get();
        return view('accessmenu.index',compact('access'));
    }

    public function create(Request $request)
    {
        DB::table('accessmenu')->insert([
            'access_menus' => $request->accessmenu
        ]);
    }

 

    public function edit(Request $request)
    {
        $data = DB::table('accessmenu')->where('id',$request->id)->insert([
            'access_menus' => $request->accessmenu
        ]);
        return response()->json($data);
    }

  
    public function destroy($id)
    {
       DB::table('accessmenu')->where('id',$id)->delete();
       return redirect()->back();
    }
}
