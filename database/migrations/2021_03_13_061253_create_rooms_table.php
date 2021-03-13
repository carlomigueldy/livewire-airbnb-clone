<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('home_type');
            $table->string('room_type');
            $table->unsignedInteger('total_occupancy')->default(0);
            $table->unsignedInteger('total_bedrooms')->default(0);
            $table->unsignedInteger('total_bathrooms')->default(0);
            $table->string('summary')->nullable();
            $table->string('address')->nullable();
            $table->boolean('has_tv')->default(false);
            $table->boolean('has_kitchen')->default(false);
            $table->boolean('has_air_con')->default(false);
            $table->boolean('has_heathing')->default(false);
            $table->decimal('price');
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
