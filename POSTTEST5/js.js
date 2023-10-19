const toggleModeButton = document.getElementById("toggleModeButton");
const body = document.body;
const popupBox = document.getElementById("popupBox");

// Fungsi untuk mengubah mode (light/dark)
function toggleMode() {
    body.classList.toggle("light-mode");
    body.classList.toggle("dark-mode");
    // Tampilkan popup box selama 2 detik
    popupBox.style.display = "block";
    setTimeout(() => {
        popupBox.style.display = "none";
    }, 2000);
}

toggleModeButton.addEventListener("click", toggleMode);
