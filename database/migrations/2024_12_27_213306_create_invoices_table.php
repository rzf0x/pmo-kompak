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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_name');
            $table->string('no_invoice')->unique();
            $table->date('invoice_date');
            $table->date('due_date');
            $table->uuid('project_id');
            $table->decimal('amount', 15, 2);
            $table->enum('status', ['draft', 'sent', 'paid', 'canceled'])->default('draft');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
