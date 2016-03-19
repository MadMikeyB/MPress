<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\UserGroup;

class AddUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name')->unique();
            $table->timestamps();
        });
        
        if ( UserGroup::count() < 3 )
        {
            Artisan::call( 'db:seed', 
                [
                    '--class' => 'GroupSeeder', 
                    '--force' => true 
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_groups');
    }
}
