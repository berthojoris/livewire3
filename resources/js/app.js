// import 'bootstrap';
// import './libs';

window.addEventListener("close-modal", (event) => {
    $("#createOutlet").modal("hide");
    $(":input")
        .not(":button, :submit, :reset, :hidden")
        .val("")
        .prop("checked", false)
        .prop("selected", false);

    $("#ro").prop("selectedIndex", 0);
    $("#horecataiment_group_type").prop("selectedIndex", 0);

    $("#horecataiment_outlet_type").empty();
    $("#ao").empty();

    $("<option/>")
        .val("")
        .text("-- Pilih --")
        .appendTo("#horecataiment_outlet_type");
    $("<option/>").val("").text("-- Pilih --").appendTo("#ao");
});

window.addEventListener("saved", (event) => {
    $("#createOutlet").modal("hide");
    Swal.fire("Data saved", "You clicked the button!", "success");
});

window.addEventListener("close-akuisisi", (event) => {
    // $(".text-danger").hide();
    // $(".text-validation").hide();
    $("#akuisisi").modal("hide");
    $(":input")
        .not(":button, :submit, :reset, :hidden")
        .val("")
        .prop("checked", false)
        .prop("selected", false);

    $("#ro").prop("selectedIndex", 0);
    $("#horecataiment_group_type").prop("selectedIndex", 0);

    $("#horecataiment_outlet_type").empty();
    $("#ao").empty();

    $("<option/>")
        .val("")
        .text("-- Pilih --")
        .appendTo("#horecataiment_outlet_type");
    $("<option/>").val("").text("-- Pilih --").appendTo("#ao");
});

document.addEventListener("livewire:navigated", () => {
    console.log("navigated");
});

document.addEventListener("notif", (event) => {
    let data = event.detail;

    notify("success", data.message)
});

function notify(type, message) {
    if(type == "success") {
        var color = 'success'
    } else if(type == "error") {
        var color = 'danger'
    } else if(type == "warning") {
        var color = 'warning'
    }else {
        var color = 'primary'
    }

    $.notify({
        title: "Notification",
        message: message,
    },{
        allow_dismiss: true,
        type: color,
        animate:{
            enter:"animate__animated animate__bounceIn",
            exit:"animate__animated animate__bounceIn"
        },
    });
}

window.addEventListener("open_modal_akuisisi", (event) => {
    $("#akuisisi").modal("show");
});