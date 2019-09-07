<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCascadeDeleteToForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interest_user', function (Blueprint $table) {
            $table->dropForeign('interest_user_interest_id_foreign');
            $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');

            $table->dropForeign('interest_user_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('cart_item', function (Blueprint $table) {
            $table->dropForeign('cart_item_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dropForeign('cart_item_product_id_foreign');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interest_user', function (Blueprint $table) {
            $table->dropForeign('interest_user_interest_id_foreign');
            $table->foreign('interest_id')->references('id')->on('interests');

            $table->dropForeign('interest_user_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('cart_item', function (Blueprint $table) {
            $table->dropForeign('cart_item_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users');
            $table->dropForeign('cart_item_product_id_foreign');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
}
