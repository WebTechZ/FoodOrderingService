<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTeble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_id')->nullable(false) ;
            $table->boolean('menu_status')->default(false) ;
            $table->string('menu_name')->nullable(false) ;
            $table->float('price')->default(0) ;
            $table->string('recipe')->default("") ;
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
        Schema::dropIfExists('menus');
    }
}
