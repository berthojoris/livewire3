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
        Schema::create('outlet_details', function (Blueprint $table) {
            $table->id();
			$table->foreignId('outlet_id')
				->constrained()
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->foreignId('user_id')
				->constrained();

			$table->string('nilai_score_card');
			$table->string('upload_score_card');
			$table->date('tanggal_terima_score_card');
			$table->string('form_validasi');
			$table->string('dokumentasi');
			$table->string('proposal');

			$table->string('landmark')->nullable();
			$table->string('signed_outdoor')->nullable();
			$table->string('gate')->nullable();
			$table->string('parking_space')->nullable();
			$table->string('facade')->nullable();
			$table->string('entrance_wall_branding')->nullable();
			$table->string('info_board')->nullable();
			$table->string('concierge_table')->nullable();
			$table->string('stage_wall_branding')->nullable();
			$table->string('dj_booth')->nullable();
			$table->string('frame_screen')->nullable();
			$table->string('totem')->nullable();
			$table->string('dining_wall_branding_indoor')->nullable();
			$table->string('dining_wall_branding_outdoor')->nullable();
			$table->string('tv_frame_branding_dining_area')->nullable();
			$table->string('bar_wall_branding_indoor')->nullable();
			$table->string('tv_frame_branding_bar_area')->nullable();
			$table->string('cigaret_cabinet')->nullable();
			$table->string('mirror_sticker')->nullable();
			$table->string('restroom_wall_branding')->nullable();
			$table->string('table_ashtray')->nullable();
			$table->string('standing_asthray')->nullable();
			$table->string('fsu')->nullable();
			$table->string('sitting_corner')->nullable();
			$table->string('charging_station')->nullable();
			$table->string('table_set')->nullable();
			$table->string('selling_display_booth')->nullable();

			$table->string('upload_form_branding')->nullable();
			$table->string('no_po_branding')->nullable();
			$table->string('upload_po_branding')->nullable();
			$table->string('nomor_kontrak_branding')->nullable();
			$table->string('upload_kontrak_branding')->nullable();
			$table->string('nilai_kontrak_branding')->nullable();

			$table->string('kelas_event_international')->nullable();
			$table->string('kelas_event_a')->nullable();
			$table->string('kelas_event_b')->nullable();
			$table->string('kelas_event_c')->nullable();
			$table->string('kelas_event_d')->nullable();
			$table->string('kelas_event_e')->nullable();
			$table->string('kelas_event_f')->nullable();
			$table->string('total_quantity_event')->nullable();
			$table->string('event_kompetitor')->nullable();
			$table->text('event_notes')->nullable();
			$table->string('no_po_event')->nullable();
			$table->string('upload_po_event')->nullable();
			$table->string('no_kontrak_event')->nullable();
			$table->string('nilai_kontrak_event')->nullable();
			$table->string('upload_kontrak_event')->nullable();
			$table->string('rokok_sharing_per_event')->nullable();
			$table->string('total_rokok_sharing')->nullable();
			$table->string('estimasi_nilai_branding')->nullable();
			$table->string('estimasi_nilai_event')->nullable();
			$table->string('total_nilai_kontrak')->nullable();
			$table->string('range_negosiasi_min')->nullable();
			$table->string('range_negosiasi_max')->nullable();
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlet_details');
    }
};
