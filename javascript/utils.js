function showSnackbar(text) {
    // Get the snackbar DIV
    const x = document.getElementById("snackbar");

    x.innerHTML = text;

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function () {
        x.className = x.className.replace("show", "");
    }, 3000);
}