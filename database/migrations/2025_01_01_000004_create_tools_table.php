<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('bloom')->create('tools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('upload_id')->constrained('uploads')->cascadeOnDelete();
            $table->string('broken_chance')->nullable();
            $table->string('problem')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('bloom')->dropIfExists('tools');
    }
};
