<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('bloom')->create('seeds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('upload_id')
                ->constrained('uploads')
                ->cascadeOnDelete();
            $table->string('grow_time')->nullable();
            $table->unsignedInteger('issue_count')->default(0);
            $table->string('issue_duration')->nullable();
            $table->string('quality')->nullable();
            $table->string('merit_event')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('bloom')->dropIfExists('seeds');
    }
};
