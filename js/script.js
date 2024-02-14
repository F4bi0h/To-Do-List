document.addEventListener("DOMContentLoaded", function () {
    showLoadingScreen();

    setTimeout(function () {
        hideLoadingScreen();
    }, 2000);
});

function showLoadingScreen() {
    var loadingContainer = document.getElementById("loadingContainer");
    if (loadingContainer) {
        loadingContainer.style.display = "flex";
    }
}

function hideLoadingScreen() {
    var loadingContainer = document.getElementById("loadingContainer");
    if (loadingContainer) {
        loadingContainer.style.display = "none";
    }
}