<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name', 100)->unique();
            $table->text('description', 100);
            $table->decimal('weight', 4, 2);
            $table->decimal('width', 4, 2);
            $table->decimal('depth', 4, 2);
            $table->decimal('height', 4, 2);
            $table->text('producer', 100)->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('type');
            $table->integer('quantity');
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
        Schema::dropIfExists('products');
    }
}
