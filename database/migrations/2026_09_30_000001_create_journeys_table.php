<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void { Schema::create('journeys', function(Blueprint $table){ $table->id(); $table->string('title'); $table->string('slug')->unique(); $table->string('country'); $table->unsignedSmallInteger('days'); $table->string('style')->nullable(); $table->text('description')->nullable(); $table->text('image_url')->nullable(); $table->enum('status',['Published','Draft'])->default('Draft'); $table->decimal('price',10,2)->nullable(); $table->string('accent',32)->nullable(); $table->boolean('featured')->default(false); $table->timestamps(); $table->index(['status','featured']); }); }
    public function down(): void { Schema::dropIfExists('journeys'); }
};