<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_description');
            $table->text('description');
            $table->integer('category_id');
            $table->integer('item_family_id');
            $table->timestamps();
        });

        Schema::create('item_specification', function (Blueprint $table) {
            $table->integer('item_id');
            $table->integer('item_specification_type_id');
            $table->string('value');
        });

        Schema::create('item_specification_types', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('system_name');
            $table->string('name');
            $table->string('units')->nullable();
            $table->boolean('required');
            $table->integer('order');
            $table->timestamps();
        });

        Schema::create('item_families', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->string('name');
            $table->string('short_description');
            $table->text('description');
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
        Schema::dropIfExists('items');
        Schema::dropIfExists('item_specification');
        Schema::dropIfExists('item_specification_types');
        Schema::dropIfExists('item_types');
        Schema::dropIfExists('item_families');
    }
}
