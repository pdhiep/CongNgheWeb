<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // This migration is intentionally left empty to prevent creating a duplicate user table.
        // The main users table migration has been updated with the correct schema.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};