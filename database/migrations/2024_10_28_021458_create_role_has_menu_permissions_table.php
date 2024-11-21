<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleHasMenuPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_has_menu_permissions', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('role_id'); 
            $table->unsignedBigInteger('menu_id'); 
            $table->boolean('read')->default(false); 
            $table->boolean('edit')->default(false); 
            $table->boolean('create')->default(false); 
            $table->boolean('delete')->default(false); 
            $table->boolean('print')->default(false); 
            $table->boolean('upload')->default(false); 
            $table->timestamps(); 

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');

           
            $table->unique(['role_id', 'menu_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_has_menu_permissions');
    }
}

