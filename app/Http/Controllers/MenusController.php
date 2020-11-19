<?php

namespace App\Http\Controllers;

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
        return view('pages.menu', [
            'menus' => $menus
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all() ;
        $menu = new Menu ;
        $menu->menu_id = $request->input('menu_id') ;
        if ($request->input('menu_status') == 'Yes'){
            $menu->menu_status = true ;
        }
        else{
            $menu->menu_status = false ;
        }
        $menu->menu_name = $request->input('menu_name') ;
        $menu->price = $request->input('price') ;
//        $file = $request->file('file') ;
//        $extension = $file->getClientOriginalExtension() ;
//        $filename = time() . '.' . $extension ;
//        $file->move('uploads/images/', $filename) ;
//        $menu->image = 'uploads/images/' . $filename ;
        $path = $request->file('file') ;
//        if($request->hasFile('file')){
//            return "yes" ;
//        }
//        else{
//            return "no" ;
//        }
        $logo = file_get_contents($path);
        $base64 = base64_encode($logo);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $menu->image = $base64 ;
        $menu->save() ;
        return redirect()->route('menus.index') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id) ;
        return $menu ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id) ;
        return view('pages.editMenu', [
           'menu' => $menu
        ]);
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
        $menu = Menu::findOrFail($id) ;
        if ($request->input('menu_status') == 'Yes'){
            $menu->menu_status = true ;
        }
        else{
            $menu->menu_status = false ;
        }
        $menu->menu_name = $request->input('menu_name') ;
        $menu->price = $request->input('price') ;
        if ($request->hasFile('file')){
            $path = $request->file('file') ;
            $logo = file_get_contents($path);
            $base64 = base64_encode($logo);
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $menu->image = $base64 ;
        }
        $menu->save() ;
        return redirect()->route('menus.index') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id) ;
        $menu->delete();
        return redirect(route('menus.index')) ;
    }
}
