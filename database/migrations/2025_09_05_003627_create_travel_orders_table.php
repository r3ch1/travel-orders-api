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
        Schema::create('travel_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('applicant_name');
            $table->string('destination');
            $table->datetime('departure_at');
            $table->datetime('return_at');
            $table->enum('status', ['requested', 'approved', 'cancelled'])->default('requested');
            $table->timestamps();

            $table->index('status');
            $table->index('departure_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel_orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('travel_orders');
    }
};
