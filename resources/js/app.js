// import 'bootstrap';
// import './libs';

window.addEventListener("close-modal", (event) => {
    $(".text-danger").hide();
    $(".text-validation").hide();
    $("#createOutlet").modal("hide");
    $(":input")
        .not(":button, :submit, :reset, :hidden")
        .val("")
        .prop("checked", false)
        .prop("selected", false);
    $("#horecataiment_outlet_type").empty();
    $("#ao").empty().empty();

    $("<option/>")
        .val("")
        .text("-- Pilih --")
        .appendTo("#horecataiment_outlet_type");
    $("<option/>").val("").text("-- Pilih --").appendTo("#ao");
});

window.addEventListener("saved", (event) => {
    console.log(event);
    $(".text-danger").hide();
    $(".text-validation").hide();
    $("#createOutlet").modal("hide");
    Swal.fire("Data saved", "You clicked the button!", "success");
});

window.addEventListener("close-akuisisi", (event) => {
    $(".text-danger").hide();
    $(".text-validation").hide();
    $("#akuisisi").modal("hide");
});

document.addEventListener("livewire:navigated", () => {
    console.log("navigated");
});

document.addEventListener("notif", (event) => {
    let data = event.detail;

    if(data.type == "success") {
        var color = 'success'
    } else if(data.type == "error") {
        var color = 'danger'
    } else if(data.type == "warning") {
        var color = 'warning'
    }else {
        var color = 'primary'
    }

    $.notify({
        title: "Notification",
        message: data.message,
    },{
        allow_dismiss: true,
        type: color,
        animate:{
            enter:"animate__animated animate__bounceIn",
            exit:"animate__animated animate__bounceIn"
        },
    });
});