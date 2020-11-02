<?php

//use App\Http\Controllers\MenusController;
use App\Http\Controllers\API\MenusController;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/name', function (){
    return ["name" => 'Thanakit Yannam',
        "id" => "6110400653"
    ] ;
});

Route::get('/allMenus', function (){
   return Menu::all() ;
});

Route::post('/addMenus', function (Request $request){
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
    $menu->save() ;
    return $menu ;
});

//Route::delete('/deleteMenus/{id}', [MenusController::class, 'destroy']) ;

Route::name('api')->group(function (){
    Route::apiResource('/menus', MenusController::class) ;
});
