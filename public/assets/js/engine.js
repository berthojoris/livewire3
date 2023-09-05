document.addEventListener("livewire:init", () => {
    console.log("livewire.init");
    Livewire.hook("component.init", ({ component }) => {
        console.log("component.init");
        if (component.name == "about") {
            console.log("component about");
        }
    });
});