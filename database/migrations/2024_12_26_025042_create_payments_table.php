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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_name');
            $table->enum('payment_type', ['cicilan', 'transfer']);
            $table->enum('payment_status', ['pending', 'success', 'failed']);
            $table->decimal('amount_paid', 15, 2);
            $table->date('payment_date');
            $table->string('payment_proof')->nullable();
            $table->timestamps();

            $table->foreignId('revenue_id')->references('id')->on('revenues')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
