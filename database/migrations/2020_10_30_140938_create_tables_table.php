<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->integer('table_number')->nullable(false) ;
            $table->integer('number_of_customer')->default(0) ;
            $table->boolean('reserve_status')->default(false) ;
            $table->timestamp('time_in')->default(null) ;
            $table->timestamps();
            $table->softDeletes('deleted_at') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
