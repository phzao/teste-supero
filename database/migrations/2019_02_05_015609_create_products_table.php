<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('description', 150);
            $table->string('code', 10);
            $table->string('short_description', 30);
            $table->enum('status', ['enable', 'disable']);
            $table->decimal('value', 10, 2);
            $table->integer('qty' )->default(0);
            $table->timestamps();
            $table->index("description");
            $table->index("code");
            $table->index("short_description");
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
