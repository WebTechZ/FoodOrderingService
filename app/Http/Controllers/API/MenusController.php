<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();
        return $menus ;
////        $tempMenus[] = array() ;
//        foreach ($menus as $menu) {
//            $tempMenu = new Menu() ;
//            $tempMenus[] = $menu ;
//            $path = $menu->image ;
//            $logo = file_get_contents($path);
//            $base64 = base64_encode($logo);
////            $tempMenus[] = $menu->menu_id ;
//            $tempMenus[] = $base64 ;
//        }
////        foreach ($menus as $menu){
////            $path = $menu->image ;
////            $logo = file_get_contents($path);
////            $base64 = base64_encode($logo);
//////            $tempMenus[] = $menu->menu_id ;
////            $tempMenus[] = $base64 ;
////        }
//        return $tempMenus;
    }

    public function getAllMenu(){
        $menus = Menu::get();
        foreach ($menus as $menu){
            $allID[] = $menu->menu_id ;
        }
        return [
            'count' => $menus->count(),
            'allID' => $allID
        ] ;
    }

    public function search($menu_id){
//        return $menu_id ;
        $menus = Menu::get()->where('menu_id', $menu_id) ;
//        foreach ($menus as $menu) {
//            $tempMenu = new Menu() ;
//            $tempMenus[] = $menu ;
//            $path = $menu->image ;
//            $logo = file_get_contents($path);
//            $base64 = base64_encode($logo);
////            $tempMenus[] = $menu->menu_id ;
//            $tempMenus[] = $base64 ;
//        }
//        return $menus->count() ;
        return $menus ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->menu_id = $request->input('menu_id');
        if ($request->input('menu_status') == 'Yes') {
            $menu->menu_status = true;
        } else {
            $menu->menu_status = false;
        }
        $menu->menu_name = $request->input('menu_name');
        $menu->price = $request->input('price');
        $path = $request->file('file');
        $logo = file_get_contents($path);
        $base64 = base64_encode($logo);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $menu->image = $base64;
        $menu->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return $menu;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
//        return $request ;
        if ($request->input('menu_status') == 'Yes') {
            $menu->menu_status = true;
        } else {
            $menu->menu_status = false;
        }
        $menu->menu_name = $request->input('menu_name');
        $menu->price = $request->input('price');
        if ($request->hasFile('file')) {
            $path = $request->file('file');
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $menu->image = $base64;
        }
        $menu->save();
        return $menu;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return "success";
    }
}
