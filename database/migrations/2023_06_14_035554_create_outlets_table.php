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
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
			$table->uuid('uuid')->nullable();
			$table->string('tp_code')->nullable();
			$table->string('outlet_code')->nullable();
			$table->string('outlet_name')->nullable();
			$table->string('horecataiment_group_type')->nullable();
			$table->string('horecataiment_outlet_type')->nullable();
			$table->string('ro')->nullable();
			$table->string('ao')->nullable();
			$table->text('alamat')->nullable();
			$table->string('kelurahan')->nullable();
			$table->string('kecamatan')->nullable();
			$table->string('kabupaten_kota')->nullable();
			$table->string('bintang')->nullable();
			$table->string('kuadran')->nullable();
			$table->string('brand_sugestion')->nullable();
			$table->string('nama_pic_outlet')->nullable();
			$table->string('telp_pic_outlet')->nullable();
			$table->string('telp_pic_outlet_second')->nullable();
			$table->string('email_pic_outlet')->nullable();
			$table->string('instalasi_branding')->nullable();
			$table->string('kontrak_event')->nullable();
			$table->string('selling')->nullable();
			$table->bigInteger('status')->default(1);
			$table->foreignId('user_id')->constrained();
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlets');
    }
};
