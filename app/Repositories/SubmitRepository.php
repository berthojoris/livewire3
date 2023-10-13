<?php

namespace App\Repositories;

use App\Models\Page;
use App\Models\User;
use App\Models\Esign;
use App\Models\Outlet;
use App\Models\GMBrand;
use App\Models\CEManager;
use App\Mail\OutletNotify;
use App\Models\MailReceipt;
use App\Jobs\SentEmailNotif;
use App\Models\BrandManager;
use App\Models\OutletDetail;
use App\Models\OutletMaintenance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\OutletDetailAttachment;

class SubmitRepository
{
	public function create($validated)
    {
		$user = auth()->user();
		$outlet =  Outlet::create($validated);

		$recipients = MailReceipt::with('user')->whereGroup('SUBMITTED')->get();

		if(env('APP_ENV') != 'local') {
			$html = "<p style='font-family: Tahoma; font-size: 14px;'>Dear All,</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Outlet dengan nama : <b>".$outlet->outlet_name."</b> baru saja didaftarkan oleh <b>".$user->name."</b>.</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Klik <a href=".route('validasi_akuisisi', $outlet->uuid).">disini</a> untuk melakukan validasi outlet</p>";
			$html .= "<br>";
			$html .= "<br>";
			$html .= "<br>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Best regards,</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>GG Tracking System</p>";

			sendMailToInternal(auth()->user()->email, '', '[Auto Email Notification]', $html);

			foreach($recipients as $recipient) {
				sendMailToInternal($recipient->user->email, '', '[Auto Email Notification]', $html);
			}
		}
		// else {
		// 	foreach($recipients as $recipient) {
		// 		Mail::to($recipient->user->email)->send(new OutletNotify('submited', $outlet, $user->name));
		// 	}
		// }
		return "Done";
    }

	public function updateToValidation($validated, $uuid, $request)
    {
		$outlet = Outlet::where('uuid', $uuid)->firstOrFail();
		$validated['outlet_id'] = $outlet->id;

		if(auth()->user()) {
			if($request->hasFile('upload_score_card')) {
				$validated['upload_score_card'] = $request->file('upload_score_card')->store('akuisisi');
			}

			if($request->hasFile('form_validasi')) {
				$validated['form_validasi'] = $request->file('form_validasi')->store('akuisisi');
			}

			if($request->hasFile('dokumentasi')) {
				$validated['dokumentasi'] = $request->file('dokumentasi')->store('akuisisi');
			}

			if($request->hasFile('proposal')) {
				$validated['proposal'] = $request->file('proposal')->store('akuisisi');
			}

			if($request->hasFile('upload_form_branding')) {
				$validated['upload_form_branding'] = $request->file('upload_form_branding')->store('akuisisi');
			}

			if($request->hasFile('upload_po_branding')) {
				$validated['upload_po_branding'] = $request->file('upload_po_branding')->store('akuisisi');
			}

			if($request->hasFile('upload_kontrak_branding')) {
				$validated['upload_kontrak_branding'] = $request->file('upload_kontrak_branding')->store('akuisisi');
			}

			if($request->hasFile('upload_po_event')) {
				$validated['upload_po_event'] = $request->file('upload_po_event')->store('akuisisi');
			}

			if($request->hasFile('upload_kontrak_event')) {
				$validated['upload_kontrak_event'] = $request->file('upload_kontrak_event')->store('akuisisi');
			}
		}

		DB::beginTransaction();
		try {

			$outlet->update($validated);

			$user = auth()->user();

			OutletDetail::updateOrCreate([
				'outlet_id'   => $validated['outlet_id'],
			], $validated);

			// Esign::create([
			// 	'outlet_id' => $validated['outlet_id'],
			// 	'sign_pic_hop' => 'approved',
			// 	'sign_hop_manager' => optional(CEManager::where('brand_name', 'HOP')->first())->ce_manager_email,
			// 	'sign_gm_marketing_channel' => optional(GMBrand::where('brand_name', $outlet->brand_sugestion)->first())->brand_gm_email,
			// 	'sign_ce_manager' => optional(CEManager::where('brand_name', $outlet->brand_sugestion)->first())->ce_manager_email,
			// 	'sign_gm_ce' => optional(GMBrand::where('brand_name', 'CE')->first())->brand_gm_email,
			// 	'sign_brand_manager' => optional(BrandManager::where('brand_name', $outlet->brand_sugestion)->first())->brand_manager_email,
			// 	'sign_gm_brand' => optional(GMBrand::where('brand_name', $outlet->brand_sugestion)->first())->brand_gm_email,
			// 	'sign_deputy_brand' => 'hendyanto@gudanggaramtbk.com',
			// 	'sign_marketing_activation' => 'pongky.puranto@gudanggaramtbk.com',
			// ]);

			Esign::insert([
				[
					'outlet_id' => $validated['outlet_id'],
					'email' => 'albertho.joris@gudanggaramtbk.com',
					'name' => 'PIC HOP',
					'type' => 'sign_pic_hop',
					'response' => 'APPROVED',
					'token' => randomStr(),
					'created_at' => now(),
					'updated_at' => now(),
				],
				[
					'outlet_id' => $validated['outlet_id'],
					'email' => 'albertho.joris@gudanggaramtbk.com',
					'name' => 'MANAGER HOP',
					'type' => 'sign_hop_manager',
					'response' => 'WAIT',
					'token' => randomStr(),
					'created_at' => now(),
					'updated_at' => now(),
				],
				[
					'outlet_id' => $validated['outlet_id'],
					'email' => 'albertho.joris@gudanggaramtbk.com',
					'name' => 'CE MANAGER',
					'type' => 'sign_ce_manager',
					'response' => 'WAIT',
					'token' => randomStr(),
					'created_at' => now(),
					'updated_at' => now(),
				],
				[
					'outlet_id' => $validated['outlet_id'],
					'email' => 'albertho.joris@gudanggaramtbk.com',
					'name' => 'GM MARKETING CHANNEL',
					'type' => 'sign_gm_marketing_channel',
					'response' => 'WAIT',
					'token' => randomStr(),
					'created_at' => now(),
					'updated_at' => now(),
				],
				[
					'outlet_id' => $validated['outlet_id'],
					'email' => 'albertho.joris@gudanggaramtbk.com',
					'name' => 'BRAND MANAGER',
					'type' => 'sign_brand_manager',
					'response' => 'WAIT',
					'token' => randomStr(),
					'created_at' => now(),
					'updated_at' => now(),
				],
				[
					'outlet_id' => $validated['outlet_id'],
					'email' => 'albertho.joris@gudanggaramtbk.com',
					'name' => 'BRAND GM',
					'type' => 'sign_gm_brand',
					'response' => 'WAIT',
					'token' => randomStr(),
					'created_at' => now(),
					'updated_at' => now(),
				],
				[
					'outlet_id' => $validated['outlet_id'],
					'email' => 'albertho.joris@gudanggaramtbk.com',
					'name' => 'BRAND DEPUTY',
					'type' => 'sign_deputy_brand',
					'response' => 'WAIT',
					'token' => randomStr(),
					'created_at' => now(),
					'updated_at' => now(),
				],
				[
					'outlet_id' => $validated['outlet_id'],
					'email' => 'albertho.joris@gudanggaramtbk.com',
					'name' => 'MARKETING ACTIVATION DEPUTY',
					'type' => 'sign_deputy_marketing_activation',
					'response' => 'WAIT',
					'token' => randomStr(),
					'created_at' => now(),
					'updated_at' => now(),
				],
			]);

			if(env('APP_ENV') != 'local') {
				$html = "<p style='font-family: Tahoma; font-size: 14px;'>Dear All,</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Outlet dengan nama : <b>".$outlet->outlet_name."</b> telah divalidasi oleh <b>".$user->name."</b>.</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Klik <a href=".route('validasi_akuisisi', $outlet->uuid).">disini</a> untuk melampirkan file attachment dari outlet dan mengunduh form request akuisisi</p>";
				$html .= "<br>";
				$html .= "<br>";
				$html .= "<br>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Best regards,</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>GG Tracking System</p>";

				sendMailToInternal(auth()->user()->email, '', '[Auto Email Notification]', $html);

				$recipients = MailReceipt::with('user')->whereGroup('VALIDATED')->get();

				foreach($recipients as $recipient) {
					sendMailToInternal($recipient->user->email, '', '[Auto Email Notification]', $html);
				}

			} else {
				Mail::to(auth()->user()->email)->send(new OutletNotify('validated', $outlet, $user->name));
			}

			DB::commit();

			return "done";

		} catch (\Exception $e) {
			DB::rollback();
			logger($e);
			return "fail";
		}
	}

	public function updateOrCreateAttachment($validated, $uuid, $request)
	{
		$outlet = Outlet::where('uuid', $uuid)->firstOrFail();
		$validated['outlet_id'] = $outlet->id;

		if(auth()->user()) {
			if($request->hasFile('file_landmark')) {
				$validated['file_landmark'] = $request->file('file_landmark')->store('akuisisi');
			}

			if($request->hasFile('file_signed_outdoor')) {
				$validated['file_signed_outdoor'] = $request->file('file_signed_outdoor')->store('akuisisi');
			}

			if($request->hasFile('file_gate')) {
				$validated['file_gate'] = $request->file('file_gate')->store('akuisisi');
			}

			if($request->hasFile('file_parking_space')) {
				$validated['file_parking_space'] = $request->file('file_parking_space')->store('akuisisi');
			}

			if($request->hasFile('file_facade')) {
				$validated['file_facade'] = $request->file('file_facade')->store('akuisisi');
			}

			if($request->hasFile('file_entrance_wall_branding')) {
				$validated['file_entrance_wall_branding'] = $request->file('file_entrance_wall_branding')->store('akuisisi');
			}

			if($request->hasFile('file_info_board')) {
				$validated['file_info_board'] = $request->file('file_info_board')->store('akuisisi');
			}

			if($request->hasFile('file_concierge_table')) {
				$validated['file_concierge_table'] = $request->file('file_concierge_table')->store('akuisisi');
			}

			if($request->hasFile('file_stage_wall_branding')) {
				$validated['file_stage_wall_branding'] = $request->file('file_stage_wall_branding')->store('akuisisi');
			}

			if($request->hasFile('file_dj_booth')) {
				$validated['file_dj_booth'] = $request->file('file_dj_booth')->store('akuisisi');
			}

			if($request->hasFile('file_frame_screen')) {
				$validated['file_frame_screen'] = $request->file('file_frame_screen')->store('akuisisi');
			}

			if($request->hasFile('file_totem')) {
				$validated['file_totem'] = $request->file('file_totem')->store('akuisisi');
			}

			if($request->hasFile('file_dining_wall_branding_indoor')) {
				$validated['file_dining_wall_branding_indoor'] = $request->file('file_dining_wall_branding_indoor')->store('akuisisi');
			}

			if($request->hasFile('file_dining_wall_branding_outdoor')) {
				$validated['file_dining_wall_branding_outdoor'] = $request->file('file_dining_wall_branding_outdoor')->store('akuisisi');
			}

			if($request->hasFile('file_tv_frame_branding_dining_area')) {
				$validated['file_tv_frame_branding_dining_area'] = $request->file('file_tv_frame_branding_dining_area')->store('akuisisi');
			}

			if($request->hasFile('file_bar_wall_branding_indoor')) {
				$validated['file_bar_wall_branding_indoor'] = $request->file('file_bar_wall_branding_indoor')->store('akuisisi');
			}

			if($request->hasFile('file_tv_frame_branding_bar_area')) {
				$validated['file_tv_frame_branding_bar_area'] = $request->file('file_tv_frame_branding_bar_area')->store('akuisisi');
			}

			if($request->hasFile('file_cigaret_cabinet')) {
				$validated['file_cigaret_cabinet'] = $request->file('file_cigaret_cabinet')->store('akuisisi');
			}

			if($request->hasFile('file_cigaret_cabinet')) {
				$validated['file_mirror_sticker'] = $request->file('file_cigaret_cabinet')->store('akuisisi');
			}

			if($request->hasFile('file_cigaret_cabinet')) {
				$validated['file_restroom_wall_branding'] = $request->file('file_cigaret_cabinet')->store('akuisisi');
			}

			if($request->hasFile('file_table_ashtray')) {
				$validated['file_table_ashtray'] = $request->file('file_table_ashtray')->store('akuisisi');
			}

			if($request->hasFile('file_standing_asthray')) {
				$validated['file_standing_asthray'] = $request->file('file_standing_asthray')->store('akuisisi');
			}

			if($request->hasFile('file_fsu')) {
				$validated['file_fsu'] = $request->file('file_fsu')->store('akuisisi');
			}

			if($request->hasFile('file_sitting_corner')) {
				$validated['file_sitting_corner'] = $request->file('file_sitting_corner')->store('akuisisi');
			}

			if($request->hasFile('file_charging_station')) {
				$validated['file_charging_station'] = $request->file('file_charging_station')->store('akuisisi');
			}

			if($request->hasFile('file_table_set')) {
				$validated['file_table_set'] = $request->file('file_table_set')->store('akuisisi');
			}

			if($request->hasFile('file_selling_display_booth')) {
				$validated['file_selling_display_booth'] = $request->file('file_selling_display_booth')->store('akuisisi');
			}
		}

		DB::beginTransaction();
		try {
			$user = auth()->user();

			$outlet->update($validated);

			OutletDetailAttachment::updateOrCreate([
				'outlet_id'   => $validated['outlet_id'],
			], $validated);

			$managerHop = Esign::where('type', 'sign_hop_manager')->where('response', 'WAIT')->firstOrFail();

			if(env('APP_ENV') != 'local') {

				$recipients = Esign::where('outlet_id', $validated['outlet_id'])->first();

				$html = "<p style='font-family: Tahoma; font-size: 14px;'>Dear All,</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Outlet dengan nama <b>".$outlet->outlet_name."</b> telah divalidasi oleh <b>".$user->name."</b>.</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Sistem membutuhkan keputusan anda untuk melakukan approve atau hold pada outlet ini dengan klik link <a href=".route('need_approval', [$outlet->uuid, $managerHop->token]).">disini</a></p>";
				$html .= "<br>";
				$html .= "<br>";
				$html .= "<br>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Best regards,</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>GG Tracking System</p>";

				sendMailToInternal($managerHop->email, '', '[Auto Email Notification]', $html);

				$htmlToCreator = "<p style='font-family: Tahoma; font-size: 14px;'>Hi ".$user->name.",</p>";
				$htmlToCreator .= "<p style='font-family: Tahoma; font-size: 14px;'>Data yang anda kirimkan sedang dalam tahap review dan approval. Anda akan mendapatkan notifikasi jika approval sudah selesai dilakukan</p>";
				$htmlToCreator .= "<br>";
				$htmlToCreator .= "<br>";
				$htmlToCreator .= "<br>";
				$htmlToCreator .= "<p style='font-family: Tahoma; font-size: 14px;'>Best regards,</p>";
				$htmlToCreator .= "<p style='font-family: Tahoma; font-size: 14px;'>GG Tracking System</p>";

				sendMailToInternal(auth()->user()->email, '', '[Auto Email Notification]', $htmlToCreator);

			}
			// else {
			// 	Mail::to(auth()->user()->email)->send(new OutletNotify('waiting_approval_done', $outlet, $user->name));
			// }

			DB::commit();

			return "done";

		} catch (\Exception $e) {
			DB::rollback();
			logger($e);
			return "fail";
		}
	}

	public function approvalDone($uuid)
	{
		$outlet = Outlet::with('user')->where('uuid', $uuid)->firstOrFail();
		$outlet->update(['status' => 6]);

		$html = "<p style='font-family: Tahoma; font-size: 14px;'>Dear All,</p>";
		$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Outlet dengan nama <b>".$outlet->outlet_name."</b> telah mendapatkan semua approval yang dibutuhkan</p>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<br>";
		$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Best regards,</p>";
		$html .= "<p style='font-family: Tahoma; font-size: 14px;'>GG Tracking System</p>";

		$recipients = MailReceipt::with('user')->whereGroup('DONE')->get();

		sendMailToInternal($outlet->user->email, '', '[Auto Email Notification]', $html);

		foreach($recipients as $recipient) {
			sendMailToInternal($recipient->user->email, '', '[Auto Email Notification]', $html);
		}
	}

	public function updateMasterAkuisisi($request, $uuid)
    {
		$outlet = Outlet::where('uuid', $uuid)->firstOrFail();
		$validated = $request->validated();

		$outlet->update($validated);

		if(env('APP_ENV') != 'local') {
			$user = auth()->user();
			$html = "<p style='font-family: Tahoma; font-size: 14px;'>Dear All,</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Data master akuisisi diupdate oleh ".$user->name.".</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Silahkan klik <a href=".route('akuisisi_index').">disini</a> untuk mengakses dashboard</p>";
			$html .= "<br>";
			$html .= "<br>";
			$html .= "<br>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Best regards,</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>GG Tracking System</p>";

			$recipients = [
				auth()->user()->email,
			];

			foreach($recipients as $recipient) {
				sendMailToInternal($recipient, '', '[Auto Email Notification]', $html);
			}
		}

		return "Done";
    }

	public function prolong($validated, $uuid, $request)
	{
		$outlet = Outlet::with('detail')->where('uuid', $uuid)->firstOrFail();

		$submitedStartDate	= $validated['start_date'];
		$submitedEndDate	= $validated['end_date'];

		if($outlet->detail->start_date == $submitedStartDate) {
			return "sama";
		}

		if($outlet->detail->end_date == $submitedEndDate) {
			return "sama";
		}

		if($outlet->update($validated)) {
			return "done";
		} else {
			return "gagal";
		}
	}

	public function approved($uuid, $token)
	{
		$outlet = Outlet::where('uuid', $uuid)->firstOrFail();

		$esign = Esign::where('outlet_id', $outlet->id)->where('token', $token)->firstOrFail();
		$esign->update(['response' => 'APPROVED']);

		$link = Esign::where('outlet_id', $outlet->id)->where('response', 'WAIT')->orderBy('id', 'asc')->first();

		if(empty($link)) {
			return "empty";
		} else {
			if(env('APP_ENV') != 'local') {
				$html = "<p style='font-family: Tahoma; font-size: 14px;'>Dear ".$link->name.",</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Outlet dengan nama : <b>".$outlet->outlet_name."</b> telah divalidasi.</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Sistem membutuhkan keputusan anda untuk melakukan approve atau hold pada outlet ini dengan klik link <a href=".route('need_approval', [$outlet->uuid, $link->token]).">disini</a></p>";
				$html .= "<br>";
				$html .= "<br>";
				$html .= "<br>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Best regards,</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>GG Tracking System</p>";

				sendMailToInternal($link->email, '', '[Auto Email Notification]', $html);
			}
			return "done";
		}
	}

	public function hold($uuid, $token)
	{
		$outlet = Outlet::with('user')->where('uuid', $uuid)->firstOrFail();
		$outlet->update(['status' => 5]);

		$esign = Esign::where('outlet_id', $outlet->id)->where('token', $token)->firstOrFail();
		$esign->update(['response' => 'HOLD']);

		if(env('APP_ENV') != 'local') {
			$html = "<p style='font-family: Tahoma; font-size: 14px;'>Dear All,</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Outlet dengan nama : <b>".$outlet->outlet_name."</b> tidak mendapat persetujuan dari ".$esign->name." untuk diproses lebih lanjut.</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Data pengajuan outlet ini akan tetap ada di sistem sebagai data log.</p>";
			$html .= "<br>";
			$html .= "<br>";
			$html .= "<br>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Best regards,</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>GG Tracking System</p>";

			$recipients = MailReceipt::with('user')->whereGroup('DONE')->get();

			sendMailToInternal($outlet->user->email, '', '[Auto Email Notification]', $html);

			foreach($recipients as $recipient) {
				sendMailToInternal($recipient->user->email, '', '[Auto Email Notification]', $html);
			}
		}
		return "done";
	}

	public function proceedToDone($validated, $uuid)
	{
		$outlet = Outlet::where('uuid', $uuid)->firstOrFail();

		if($outlet->update($validated)) {

			$user = auth()->user();

			if(env('APP_ENV') != 'local') {
				$html = "<p style='font-family: Tahoma; font-size: 14px;'>Dear All,</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Permintaan anda <b>DITERIMA</b> oleh Manager HOP.</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Klik <a href=".route('kontrak_index').">disini</a> untuk mengakses dashboard</p>";
				$html .= "<br>";
				$html .= "<br>";
				$html .= "<br>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Best regards,</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>GG Tracking System</p>";

				sendMailToInternal(auth()->user()->email, '', '[Auto Email Notification]', $html);

				$recipients = MailReceipt::with('user')->whereGroup('DONE')->get();

				foreach($recipients as $recipient) {
					sendMailToInternal($recipient->user->email, '', '[Auto Email Notification]', $html);
				}
			} else {
				Mail::to(auth()->user()->email)->send(new OutletNotify('done', $outlet, $user->name));
			}

			return "done";
		} else {
			return "else";
		}
	}

	public function requestMaintenance($validated, $uuid, $request)
	{
		$outlet = Outlet::where('uuid', $uuid)->firstOrFail();
		$validated['outlet_id'] = $outlet->id;

		DB::beginTransaction();

		try {
			$user = auth()->user();

			if(auth()->user()) {
				if($request->hasFile('file_landmark')) {
					$validated['file_landmark'] = $request->file('file_landmark')->store('akuisisi');
				}

				if($request->hasFile('file_signed_outdoor')) {
					$validated['file_signed_outdoor'] = $request->file('file_signed_outdoor')->store('akuisisi');
				}

				if($request->hasFile('file_gate')) {
					$validated['file_gate'] = $request->file('file_gate')->store('akuisisi');
				}

				if($request->hasFile('file_parking_space')) {
					$validated['file_parking_space'] = $request->file('file_parking_space')->store('akuisisi');
				}

				if($request->hasFile('file_facade')) {
					$validated['file_facade'] = $request->file('file_facade')->store('akuisisi');
				}

				if($request->hasFile('file_entrance_wall_branding')) {
					$validated['file_entrance_wall_branding'] = $request->file('file_entrance_wall_branding')->store('akuisisi');
				}

				if($request->hasFile('file_info_board')) {
					$validated['file_info_board'] = $request->file('file_info_board')->store('akuisisi');
				}

				if($request->hasFile('file_concierge_table')) {
					$validated['file_concierge_table'] = $request->file('file_concierge_table')->store('akuisisi');
				}

				if($request->hasFile('file_stage_wall_branding')) {
					$validated['file_stage_wall_branding'] = $request->file('file_stage_wall_branding')->store('akuisisi');
				}

				if($request->hasFile('file_dj_booth')) {
					$validated['file_dj_booth'] = $request->file('file_dj_booth')->store('akuisisi');
				}

				if($request->hasFile('file_frame_screen')) {
					$validated['file_frame_screen'] = $request->file('file_frame_screen')->store('akuisisi');
				}

				if($request->hasFile('file_totem')) {
					$validated['file_totem'] = $request->file('file_totem')->store('akuisisi');
				}

				if($request->hasFile('file_dining_wall_branding_indoor')) {
					$validated['file_dining_wall_branding_indoor'] = $request->file('file_dining_wall_branding_indoor')->store('akuisisi');
				}

				if($request->hasFile('file_dining_wall_branding_outdoor')) {
					$validated['file_dining_wall_branding_outdoor'] = $request->file('file_dining_wall_branding_outdoor')->store('akuisisi');
				}

				if($request->hasFile('file_tv_frame_branding_dining_area')) {
					$validated['file_tv_frame_branding_dining_area'] = $request->file('file_tv_frame_branding_dining_area')->store('akuisisi');
				}

				if($request->hasFile('file_bar_wall_branding_indoor')) {
					$validated['file_bar_wall_branding_indoor'] = $request->file('file_bar_wall_branding_indoor')->store('akuisisi');
				}

				if($request->hasFile('file_tv_frame_branding_bar_area')) {
					$validated['file_tv_frame_branding_bar_area'] = $request->file('file_tv_frame_branding_bar_area')->store('akuisisi');
				}

				if($request->hasFile('file_cigaret_cabinet')) {
					$validated['file_cigaret_cabinet'] = $request->file('file_cigaret_cabinet')->store('akuisisi');
				}

				if($request->hasFile('file_cigaret_cabinet')) {
					$validated['file_mirror_sticker'] = $request->file('file_cigaret_cabinet')->store('akuisisi');
				}

				if($request->hasFile('file_cigaret_cabinet')) {
					$validated['file_restroom_wall_branding'] = $request->file('file_cigaret_cabinet')->store('akuisisi');
				}

				if($request->hasFile('file_table_ashtray')) {
					$validated['file_table_ashtray'] = $request->file('file_table_ashtray')->store('akuisisi');
				}

				if($request->hasFile('file_standing_asthray')) {
					$validated['file_standing_asthray'] = $request->file('file_standing_asthray')->store('akuisisi');
				}

				if($request->hasFile('file_fsu')) {
					$validated['file_fsu'] = $request->file('file_fsu')->store('akuisisi');
				}

				if($request->hasFile('file_sitting_corner')) {
					$validated['file_sitting_corner'] = $request->file('file_sitting_corner')->store('akuisisi');
				}

				if($request->hasFile('file_charging_station')) {
					$validated['file_charging_station'] = $request->file('file_charging_station')->store('akuisisi');
				}

				if($request->hasFile('file_table_set')) {
					$validated['file_table_set'] = $request->file('file_table_set')->store('akuisisi');
				}

				if($request->hasFile('file_selling_display_booth')) {
					$validated['file_selling_display_booth'] = $request->file('file_selling_display_booth')->store('akuisisi');
				}
			}

			OutletMaintenance::updateOrCreate([
				'outlet_id'   => $validated['outlet_id'],
			], $validated);

			$outlet->update([
				'status' => 11
			]);

			if(env('APP_ENV') != 'local') {
				$html = "<p style='font-family: Tahoma; font-size: 14px;'>Dear All,</p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Baru saja ada request maintenance outlet yang diproses oleh <b>".$user->name."</b></p>";
				$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Untuk melakukan approval atau reject silahkan klik <a href=".route('kontrak_show', $outlet->uuid).">disini</a> untuk mengakses dashboard</p>";

				$recipients = [
					auth()->user()->email,
				];

				foreach($recipients as $recipient) {
					sendMailToInternal($recipient, '', '[Auto Email Notification]', $html);
				}

			} else {
				Mail::to(auth()->user()->email)->send(new OutletNotify('maintenance', $outlet, $user->name));
			}

			DB::commit();

			return "done";
		} catch (\Exception $e) {
			DB::rollback();
			logger($e);
			return "fail";
		}
	}

	public function approvalMaintenance($uuid)
	{
		$outlet = Outlet::where('uuid', $uuid)->where('status', 11)->firstOrFail();
		$outlet->update([
			'status' => 6
		]);

		$user = auth()->user();

		if(env('APP_ENV') != 'local') {
			$html = "<p style='font-family: Tahoma; font-size: 14px;'>Dear All,</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Data outlet <b>".$outlet->outlet_name."</b> baru saja di approve oleh <b>".$user->name."</b> untuk dilakukan maintenance</p>";
			$html .= "<p style='font-family: Tahoma; font-size: 14px;'>Silahkan klik <a href=".route('kontrak_show', $outlet->uuid).">disini</a> untuk mengakses data outlet pada dashboard</p>";

			$recipients = [
				auth()->user()->email,
			];

			foreach($recipients as $recipient) {
				sendMailToInternal($recipient, '', '[Auto Email Notification]', $html);
			}

		} else {
			Mail::to(auth()->user()->email)->send(new OutletNotify('maintenance_approve', $outlet, $user->name));
		}

		return "done";
	}
}