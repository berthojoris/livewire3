// import 'bootstrap';
// import './bootstrap';

window.addEventListener('close-modal', event => {
	$('.text-danger').hide();
	$('.text-validation').hide();
	$('#createOutlet').modal('hide');
	$(':input')
	.not(':button, :submit, :reset, :hidden')
	.val('')
	.prop('checked', false)
	.prop('selected', false);
	$("#horecataiment_outlet_type").empty();
	$("#ao").empty().empty();

	$('<option/>').val("").text('-- Pilih --').appendTo('#horecataiment_outlet_type')
	$('<option/>').val("").text('-- Pilih --').appendTo('#ao')
})

window.addEventListener('saved', event => {
    console.log(event);
	$('.text-danger').hide();
	$('.text-validation').hide();
	$('#createOutlet').modal('hide');
})

window.addEventListener('close-akuisisi', event => {
	$('.text-danger').hide();
	$('.text-validation').hide();
	$('#akuisisi').modal('hide');
})

window.addEventListener('alert', event => {
	Swal.fire("Data saved", "You clicked the button!", "success");
})
