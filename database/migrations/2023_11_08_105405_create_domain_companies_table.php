<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('domain_companies', function (Blueprint $table) {
            $table->id();
            $table->uuid('domain_id');
            $table->uuid('company_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('domain_companies');
    }
};
