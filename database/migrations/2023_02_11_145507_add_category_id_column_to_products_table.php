<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->addColumn('integer', 'category_id')->nullable();
            $table->index('category_id', 'products_category_id');

            $table->foreign('category_id', 'products_category_fk')
                ->references('id')
                ->on('products_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_fk');
            $table->dropIndex('products_category_idx');
            $table->dropColumn('category_id');
        });
    }
};
