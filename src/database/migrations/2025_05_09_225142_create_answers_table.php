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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('support_ticket_id');
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees');
            $table->foreign('support_ticket_id')
                ->references('id')
                ->on('support_tickets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
