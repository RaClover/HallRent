<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('halls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('size');
            $table->integer('capacity'); // how much people can be in this hall as maximum
            $table->integer('floor_number')->nullable();
            $table->enum('parking_available', ['free parking', 'paid parking', 'no parking'])->default('no parking');
            $table->enum('pets_policy', ['No pets', 'Small pets', 'All pets'])->default('No pets');
            $table->boolean('furniture');
            $table->integer('toilets')->nullable();
            $table->integer('kitchens')->nullable();
            $table->text('smoking_policy');
            $table->text('alcohol_policy');
            $table->text('noise_restrictions');
            $table->text('cleanup_requirements');
            $table->decimal('security_deposit');
            $table->text('cancellation_policy');
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('halls');
    }
};

