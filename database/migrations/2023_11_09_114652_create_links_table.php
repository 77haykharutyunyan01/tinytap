<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->string('status');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('original_link');
            $table->string('short_link');
            $table->string('image_path')->nullable();
            $table->uuid('domain_id')->nullable();
            $table->uuid('company_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
