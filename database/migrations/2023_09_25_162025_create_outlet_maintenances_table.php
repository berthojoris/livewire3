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
        Schema::create('outlet_maintenances', function (Blueprint $table) {
            $table->id();

			$table->foreignId('outlet_id')
				->constrained();
			$table->foreignId('user_id')
				->constrained();

			$table->string('check_file_landmark')->nullable();
			$table->string('check_file_signed_outdoor')->nullable();
			$table->string('check_file_gate')->nullable();
			$table->string('check_file_parking_space')->nullable();
			$table->string('check_file_facade')->nullable();
			$table->string('check_file_entrance_wall_branding')->nullable();
			$table->string('check_file_info_board')->nullable();
			$table->string('check_file_concierge_table')->nullable();
			$table->string('check_file_stage_wall_branding')->nullable();
			$table->string('check_file_dj_booth')->nullable();
			$table->string('check_file_frame_screen')->nullable();
			$table->string('check_file_totem')->nullable();
			$table->string('check_file_dining_wall_branding_indoor')->nullable();
			$table->string('check_file_dining_wall_branding_outdoor')->nullable();
			$table->string('check_file_tv_frame_branding_dining_area')->nullable();
			$table->string('check_file_bar_wall_branding_indoor')->nullable();
			$table->string('check_file_tv_frame_branding_bar_area')->nullable();
			$table->string('check_file_cigaret_cabinet')->nullable();
			$table->string('check_file_mirror_sticker')->nullable();
			$table->string('check_file_restroom_wall_branding')->nullable();
			$table->string('check_file_table_ashtray')->nullable();
			$table->string('check_file_standing_asthray')->nullable();
			$table->string('check_file_fsu')->nullable();
			$table->string('check_file_sitting_corner')->nullable();
			$table->string('check_file_charging_station')->nullable();
			$table->string('check_file_table_set')->nullable();
			$table->string('check_file_selling_display_booth')->nullable();

			$table->string('file_landmark')->nullable();
			$table->string('file_signed_outdoor')->nullable();
			$table->string('file_gate')->nullable();
			$table->string('file_parking_space')->nullable();
			$table->string('file_facade')->nullable();
			$table->string('file_entrance_wall_branding')->nullable();
			$table->string('file_info_board')->nullable();
			$table->string('file_concierge_table')->nullable();
			$table->string('file_stage_wall_branding')->nullable();
			$table->string('file_dj_booth')->nullable();
			$table->string('file_frame_screen')->nullable();
			$table->string('file_totem')->nullable();
			$table->string('file_dining_wall_branding_indoor')->nullable();
			$table->string('file_dining_wall_branding_outdoor')->nullable();
			$table->string('file_tv_frame_branding_dining_area')->nullable();
			$table->string('file_bar_wall_branding_indoor')->nullable();
			$table->string('file_tv_frame_branding_bar_area')->nullable();
			$table->string('file_cigaret_cabinet')->nullable();
			$table->string('file_mirror_sticker')->nullable();
			$table->string('file_restroom_wall_branding')->nullable();
			$table->string('file_table_ashtray')->nullable();
			$table->string('file_standing_asthray')->nullable();
			$table->string('file_fsu')->nullable();
			$table->string('file_sitting_corner')->nullable();
			$table->string('file_charging_station')->nullable();
			$table->string('file_table_set')->nullable();
			$table->string('file_selling_display_booth')->nullable();
			$table->string('file_upload_form_branding')->nullable();
			$table->string('file_no_po_branding')->nullable();
			$table->string('file_upload_po_branding')->nullable();
			$table->string('file_nomor_kontrak_branding')->nullable();
			$table->string('file_upload_kontrak_branding')->nullable();
			$table->string('file_nilai_kontrak_branding')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlet_maintenances');
    }
};
