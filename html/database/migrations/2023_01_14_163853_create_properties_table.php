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
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->boolean('for_sale');
            $table->boolean('for_rent');
            $table->boolean('sold')->default(false);
            $table->decimal('price',16,2);
            $table->char('currency',5)->default('THB');
            $table->char('currency_symbol',8)->default('฿');
            $table->string('property_type');
            $table->unsignedTinyInteger('bedrooms');
            $table->unsignedTinyInteger('bathrooms');
            $table->unsignedInteger('area');
            $table->char('area_type',5)->default('sqm');
            $table->unsignedBigInteger('geo_id')->nullable();
            $table->string('street');
            $table->json('photos')->nullable();

            $table->foreign('geo_id')->references('id')->on('geolocations')->onDelete('set null');

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
        Schema::dropIfExists('properties');
    }
};
