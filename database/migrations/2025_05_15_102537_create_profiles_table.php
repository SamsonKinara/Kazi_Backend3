<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('full_name')->nullable();
            $table->text('bio')->nullable();
            $table->string('location')->nullable();
            $table->string('skills')->nullable(); // skills as comma-separated text
            $table->string('phone')->nullable();
            $table->string('profile_picture')->nullable(); // image URL or path

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
