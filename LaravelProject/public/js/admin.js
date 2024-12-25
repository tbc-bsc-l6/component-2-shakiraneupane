document.addEventListener("DOMContentLoaded", () => {
    console.log("Dashboard");

    const logoutButton = document.querySelector(".logout-btn");
    logoutButton.addEventListener("click", () => {
        alert("You have been logged out.");
        window.location.href = "/home"; // Redirect to login page
    });

    const navLinks = document.querySelectorAll(".sidebar nav ul li a");
    navLinks.forEach(link => {
        link.addEventListener("click", function () {
            navLinks.forEach(l => l.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
