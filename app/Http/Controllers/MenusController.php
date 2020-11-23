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
        $menus = Menu::orderBy('menu_id', 'ASC')->paginate(10);
        return view('pages.menu', [
            'menus' => $menus
        ]) ;
    }


//<option>Rices [A]</option>
//<option>Noodles [B]</option>
//<option>Hot Dishes [C]</option>
//<option>Appetizers [D]</option>
//<option>Sushi [E]</option>
//<option>Beverages [F]</option>
    public function sort($type){
        return $type ;

        if($type == 'No Sort'){
            $menus = Menu::orderBy('menu_id', 'ASC')->paginate(10);
            return view('pages.menu', [
                'menus' => $menus
            ]) ;
        }
        if($type == 'Rices [A]'){
            $type = 'A' ;
        }
        if($type == 'Noodles [B]'){
            $type = 'B' ;
        }
        if($type == 'Hot Dishes [C]'){
            $type = 'C' ;
        }
        if($type == 'Appetizers [D]'){
            $type = 'D' ;
        }
        if($type == 'Sushi [E]'){
            $type = 'E' ;
        }
        if($type == 'Beverages [F]'){
            $type = 'F' ;
        }
        $menus = Menu::where('menu_id', 'LIKE', '%'.$type.'%')->orderBy('menu_id', 'ASC')->paginate(10) ;


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
//        $menu->menu_id = $request->input('menu_id') ;
//        return $request ;
        if($request->input('type') == 'Rices'){
            $tempMenu = Menu::orderBy('menu_id', 'DESC')->where('menu_id', 'like', '%A%')->get() ;
            if ($tempMenu->count() > 0){
                $i = $tempMenu->first()->menu_id ;
                $rawID = str_replace('A', '', $i) ;
                $id = strval($rawID) ;
                $id++ ;
                $menu->menu_id = 'A'.$id ;
            }
            else{
                $menu->menu_id = 'A1' ;
            }
        }
        elseif ($request->input('type') == 'Noodles'){
            $tempMenu = Menu::orderBy('menu_id', 'DESC')->where('menu_id', 'like', '%B%')->get() ;
            if ($tempMenu->count() > 0){
                $i = $tempMenu->first()->menu_id ;
                $rawID = str_replace('B', '', $i) ;
                $id = strval($rawID) ;
                $id++ ;
                $menu->menu_id = 'B'.$id ;
            }
            else{
                $menu->menu_id = 'B1' ;
            }

        }
        elseif ($request->input('type') == 'Hot Dishes'){
            $tempMenu = Menu::orderBy('menu_id', 'DESC')->where('menu_id', 'like', '%C%')->get() ;
            if ($tempMenu->count() > 0){
                $i = $tempMenu->first()->menu_id ;
                $rawID = str_replace('C', '', $i) ;
                $id = strval($rawID) ;
                $id++ ;
                $menu->menu_id = 'C'.$id ;
            }
            else{
                $menu->menu_id = 'C1' ;
            }
        }
        elseif ($request->input('type') == 'Appetizers'){
            $tempMenu = Menu::orderBy('menu_id', 'DESC')->where('menu_id', 'like', '%D%')->get() ;
            if ($tempMenu->count() > 0){
                $i = $tempMenu->first()->menu_id ;
                $rawID = str_replace('D', '', $i) ;
                $id = strval($rawID) ;
                $id++ ;
                $menu->menu_id = 'D'.$id ;
            }
            else{
                $menu->menu_id = 'D1' ;
            }
        }
        elseif ($request->input('type') == 'Sushi'){
            $tempMenu = Menu::orderBy('menu_id', 'DESC')->where('menu_id', 'like', '%E%')->get() ;
            if ($tempMenu->count() > 0){
                $i = $tempMenu->first()->menu_id ;
                $rawID = str_replace('E', '', $i) ;
                $id = strval($rawID) ;
                $id++ ;
                $menu->menu_id = 'E'.$id ;
            }
            else{
                $menu->menu_id = 'E1' ;
            }
        }
        elseif ($request->input('type') == 'Beverages'){
            $tempMenu = Menu::orderBy('menu_id', 'DESC')->where('menu_id', 'like', '%F%')->get() ;
            if ($tempMenu->count() > 0){
                $i = $tempMenu->first()->menu_id ;
                $rawID = str_replace('F', '', $i) ;
                $id = strval($rawID) ;
                $id++ ;
                $menu->menu_id = 'F'.$id ;
            }
            else{
                $menu->menu_id = 'F1' ;
            }
        }
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
