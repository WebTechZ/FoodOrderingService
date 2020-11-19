<?php

namespace Database\Seeders;

use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new Table() ;
        $table->table_number =  1 ;
        $table->reserve_status = false ;
        $table->number_of_customer = 0 ;
        $table->time_in = Carbon::now();
        $table->save() ;

        $table = new Table() ;
        $table->table_number =  2 ;
        $table->reserve_status = false ;
        $table->number_of_customer = 0 ;
        $table->time_in = Carbon::now();
        $table->save() ;

        $table = new Table() ;
        $table->table_number =  3 ;
        $table->reserve_status = false ;
        $table->number_of_customer = 0 ;
        $table->time_in = Carbon::now();
        $table->save() ;

        $table = new Table() ;
        $table->table_number =  4 ;
        $table->reserve_status = false ;
        $table->number_of_customer = 0 ;
        $table->time_in = Carbon::now() ;
        $table->save() ;
    }
}
