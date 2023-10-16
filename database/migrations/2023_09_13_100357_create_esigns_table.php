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
        Schema::create('esigns', function (Blueprint $table) {
            $table->id();
			$table->foreignId('outlet_id')->constrained();
			$table->string('email')->nullable();
			$table->string('name')->nullable();
			$table->string('type');
			$table->string('response');
			$table->string('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esigns');
    }
};
