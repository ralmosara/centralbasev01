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
        Schema::create('procurements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('system_id')->constrained('systems')->cascadeOnDelete();
            $table->string('procurement')->nullable();
            $table->string('reseller')->nullable();
            $table->string('distributor')->nullable();
            $table->decimal('approved_budget_contract', total: 8, places: 2);

            $table->unsignedInteger('winning_bid_price')->nullable();
            $table->string('status')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procurements');
    }
};
