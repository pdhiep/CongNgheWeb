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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
        $table->string('brand');           // <-- Kiểm tra kỹ chính tả
        $table->string('model');
        $table->string('specifications');  // <-- Bạn đang thiếu hoặc sai dòng này
        $table->boolean('rental_status')->default(false);
        $table->foreignId('renter_id')->constrained('renters')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
