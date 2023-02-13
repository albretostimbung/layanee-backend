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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('service_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('description')->nullable();
            $table->char('province_code', 2);
            $table->char('city_code', 4);
            $table->char('district_code', 7);
            $table->char('village_code', 10);
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('is_active')->default(true);
            $table->timestamps();

            $table->foreign('province_code')->references('code')->on('provinces')->onDelete('cascade');
            $table->foreign('city_code')->references('code')->on('cities')->onDelete('cascade');
            $table->foreign('district_code')->references('code')->on('districts')->onDelete('cascade');
            $table->foreign('village_code')->references('code')->on('villages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
