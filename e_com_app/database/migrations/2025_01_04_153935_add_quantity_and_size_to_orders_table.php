<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('quantity')->after('phone');
            $table->string('size', 50)->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn('quantity');
        $table->dropColumn('size');
    });
}
};
