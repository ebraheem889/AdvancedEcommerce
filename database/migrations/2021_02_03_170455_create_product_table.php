<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->increments('id');
            $table->string('slug')->unique();
            $table->decimal('price',18,4)->unsigned()->nullable();
            $table->decimal('special_price',18,4)->unsigned()->nullable();
            $table->string('special_price_type')->nullable()->after('special_price');
            $table->date('special_price_start')->nullable();
            $table->date('special_price_end')->nullable();
            $table->decimal('selling_price',18,4)->unsigned()->nullable();
            $table->string('sku')->nullable();
            $table->boolean('manage_stock');
            $table->integer('qty')->nullable();
            $table->boolean('in_stock')->nullable();
            $table->integer('viewed')->unsigned()->default(0);
            $table->boolean('is_active');
            $table->integer('brand_id')->unsigned()->nullable()->after('id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();




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
            //
        });
    }
}
