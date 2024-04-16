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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('buyer_name');
            $table->string('payer_name');
            $table->string('buyer_id');
            $table->string('payer_id');
            $table->enum('gender_buyer', ['Laki - Laki', 'Perempuan']);
            $table->string('address');
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('buyer_photo')->default('uploads/images/profile-photos/avatar.jpg');
            $table->enum('user_category', ['administrator', 'cashier', 'payer']);
            $table->enum('role', ['Administrator', 'Kasir', 'Guru', 'Orang Tua/Wali']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
