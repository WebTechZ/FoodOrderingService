<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::get();
        return $orders ;
    }


    public function getOrderByTable($table_number){
        return $orders = Order::get()->where('table_number', $table_number) ;
//        return [
//            'order' => $orders,
//
//        ] ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request ;
        $menu = Menu::get()->where('menu_name', $request->input('menu_name'))->first() ;
        $order = new Order ;
        $order->menu_id = $menu->menu_id ;
        $order->table_number = $request->input('table_number') ;
        $order->status = "cooking" ;
        $order->save() ;
        return $order ;
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
        $order = Order::findById($id) ;
        return $order ;
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
        $order = Order::findById($id) ;
        $order->status = 'complete' ;
        $order->save() ;
        return $order ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::get()->where('table_number', $id) ;
        foreach ($orders as $order) {
            $orderHistory = new OrderHistory() ;
            $orderHistory->menu_id = $order->menu_id ;
            $orderHistory->table_number = $order->table_number ;
            $orderHistory->order_time = $order->created_at ;
            $orderHistory->save() ;
            $order->delete() ;
        }
        return 'success' ;
    }
}
