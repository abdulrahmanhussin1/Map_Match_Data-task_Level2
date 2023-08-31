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
        Schema::create('matching_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keyword_ar_id')->nullable()->constrained('keyword_ars','id');
            $table->foreignId('keyword_en_id')->nullable()->constrained('keyword_ens','id');
            $table->foreignId('keyword_lat_id')->nullable()->constrained('keyword_lats','id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matching_data');
    }
};
