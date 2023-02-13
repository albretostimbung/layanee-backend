<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('password', 100);
            $table->string('email', 50)->unique();
            $table->enum('roles', ['admin', 'merchant', 'user'])->default('user');
            $table->string('address', 200)->nullable();
            $table->char('province_code', 2)->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('image', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('province_code')->references('code')->on('provinces')->onDelete('cascade');
        });

        User::factory()->create([
            'name' => 'Admin',
            'password' => bcrypt('admin123'),
            'email' => 'admin@example.com',
            'roles' => 'admin',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
