<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('fighters', function (Blueprint $table) {
            $table->id();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('city_id')->constrained()->restrictOnDelete();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('description');
    $table->decimal('price', 10, 2);
    $table->string('style');
    $table->unsignedInteger('wins')->default(0);
    $table->unsignedInteger('losses')->default(0);
    $table->timestamp('unavailable_at')->nullable();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('fighters');
    }
};
