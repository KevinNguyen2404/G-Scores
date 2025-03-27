import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("sidebarToggle");
    if (toggleButton) {
        toggleButton.addEventListener("click", function () {
            const sidebar = document.getElementById("sidebar");
            if (sidebar) {
                sidebar.classList.toggle("active");
            }
        });
    }
});

document.addEventListener("click", function (event) {
    const sidebar = document.getElementById("sidebar");
    const mobileNav = document.querySelector(".mobile-nav");

    if (
        window.innerWidth <= 768 &&
        !sidebar.contains(event.target) &&
        !mobileNav.contains(event.target) &&
        sidebar.classList.contains("active")
    ) {
        sidebar.classList.remove("active");
    }
});
