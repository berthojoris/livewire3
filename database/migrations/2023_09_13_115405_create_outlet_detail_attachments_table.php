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
        Schema::create('outlet_detail_attachments', function (Blueprint $table) {
            $table->id();
			$table->foreignId('outlet_id')
				->constrained()
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->string('user_id');
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlet_detail_attachments');
    }
};
