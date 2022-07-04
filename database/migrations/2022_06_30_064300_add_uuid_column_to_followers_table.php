<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUuidColumnToFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('followers', function (Blueprint $table) {
            $table->uuid('uuid');

            $table->string('login')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('lastName')->nullable()->change();
            $table->string('firstName')->nullable()->change();
            $table->string('middleName')->nullable()->change();
            $table->string('displayName')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('followers', function (Blueprint $table) {
            $table->dropColumn('uuid');
            $table->string('login')->change();
            $table->string('password')->change();
        });
    }
}
