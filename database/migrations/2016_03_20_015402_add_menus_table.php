<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Menu;

class AddMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('url')->unique();
            $table->integer('position')->unique();
            $table->integer('group')->default('3'); // default to member group
            $table->timestamps();
        });

        if ( Menu::count() < 1 )
        {
            Artisan::call( 'db:seed', 
                [
                    '--class' => 'MenuSeeder', 
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
        Schema::drop('menus');
    }
}
