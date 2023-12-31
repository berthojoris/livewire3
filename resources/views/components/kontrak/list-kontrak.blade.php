<tr data-row="0" class="datatable-row" style="left: 0px;">
	<td class="datatable-cell" style="width: 10%;">
		<span>{{ $outlet->outlet_code }}</span>
	</td>
	<td class="datatable-cell" style="width: 15%;">
		<span>{{ $outlet->outlet_name }}</span>
	</td>
	<td class="datatable-cell" style="width: 15%;">
		<span>{{ optional($outlet->horecaGroup)->group_name }}</span>
	</td>
	<td class="datatable-cell" style="width: 15%;">
		<span>{{ optional($outlet->horecaOutlet)->outlet_name }}</span>
	</td>
	<td class="datatable-cell" style="width: 10%;">
		<span>{{ optional($outlet->regional)->name }}</span>
	</td>
	<td class="datatable-cell" style="width: 10%;">
		<span>{{ optional($outlet->statusTracking)->status_name }}</span>
	</td>
	<td class="datatable-cell" style="width: 10%;">
		<span><a wire:navigate href="{{ route('kontrak_detail', $outlet->uuid) }}">Detail</a></span>
	</td>
</tr>