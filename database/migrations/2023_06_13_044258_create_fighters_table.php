<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFightersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fighters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar');
            $table->decimal('health', 8, 2);
            $table->decimal('attack', 8, 2);
            $table->decimal('attack_speed', 8, 2);
            $table->decimal('speed_movement', 8, 2);
            $table->decimal('scale', 8, 2);
            $table->decimal('width', 8, 2);
            $table->decimal('height', 8, 2);
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
        Schema::dropIfExists('fighters');
    }
}
