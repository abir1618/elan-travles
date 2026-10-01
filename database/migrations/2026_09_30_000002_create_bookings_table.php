<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('bookings', function(Blueprint $table){ $table->id(); $table->string('reference')->unique(); $table->string('name'); $table->string('email'); $table->string('destination')->nullable(); $table->foreignId('journey_id')->nullable()->constrained('journeys')->nullOnDelete(); $table->enum('status',['Pending','Confirmed','Completed','Cancelled'])->default('Pending'); $table->text('notes')->nullable(); $table->date('travel_date')->nullable(); $table->unsignedSmallInteger('guests')->default(1); $table->timestamps(); $table->index(['status','created_at']); }); }
    public function down(): void { Schema::dropIfExists('bookings'); }
};