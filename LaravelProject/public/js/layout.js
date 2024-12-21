document.addEventListener("DOMContentLoaded", function () {
    // Example of dynamically updating the cart count from a variable
    let cartCount = 3; // You could replace this with a dynamic cart count from Laravel
    document.querySelector('.cart-count').innerText = cartCount;

    // Handle active link styling
    const navbarLinks = document.querySelectorAll('.navbar-nav .nav-link');
    navbarLinks.forEach(link => {
        link.addEventListener('click', () => {
            navbarLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        });
    });
});
