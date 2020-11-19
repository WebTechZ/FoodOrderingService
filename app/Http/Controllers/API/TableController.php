<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function getTableStatus($id){
        $table = Table::findOrFail($id) ;
        return $table->isInit ;
    }

    public function inItTable($id){
        $table = Table::findOrFail($id) ;
        $table->isInit = 1 ;
        $table->save() ;
        return $table->isInit ;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function checkIn(Request $request, $id){
//        return $request ;
        $table = Table::findOrFail($id) ;
        $table->number_of_customer = $request->input('numCus') ;
        $table->reserve_status = true ;
        $table->save() ;
        return $table ;
    }

    public function checkOut($id){
        $table = Table::findOrFail($id) ;
        $table->number_of_customer = 0 ;
        $table->reserve_status = false ;
        $table->save() ;
        return $table ;
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
//        $table = Table::findById($id) ;
//        $table->
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
