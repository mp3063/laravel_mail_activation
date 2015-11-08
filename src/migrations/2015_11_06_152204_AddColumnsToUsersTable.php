<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->string( 'code', 60 );
            $table->tinyInteger( 'active' );
        } );
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->dropColumn( [ 'code', 'active' ] );
        } );
    }
}
