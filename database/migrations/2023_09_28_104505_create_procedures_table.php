<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id');
            $table->string('title');
            $table->boolean('status')->default(0);
            $table->text('notes')->nullable(); // Allow null values
            $table->string('file_name')->nullable(); // Allow null values
            $table->string('last_editor')->nullable(); // Allow null values
            $table->boolean("notification_sent")->default(0);
            $table->timestamp("end_at")->nullable();
            $table->timestamp("start_at")->nullable();
            // Add other columns as needed
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedures');
    }
};
