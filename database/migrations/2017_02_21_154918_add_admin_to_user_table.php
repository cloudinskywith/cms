<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminToUserTable extends Migration
{
    public function up()
    {
        Schema::table('users',function(Blueprint $table){
           $table->integer('is_admin')->after('password')->default(0);
        });
    }

    public function down()
    {
        Schema::table('users',function(Blueprint $table){
            $table->dropColumn(['is_admin']);
        });
    }
}
