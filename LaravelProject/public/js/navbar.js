document.addEventListener("DOMContentLoaded", function () {
    // Example of dynamically updating the cart count
    let cartCount = 3; // Replace this with dynamic cart count if needed
    let cartElement = document.querySelector('.icon-cart');
    if (cartElement) {
        cartElement.innerText = `Cart (${cartCount})`;
    }

    // Handle active link styling (optional)
    const navbarLinks = document.querySelectorAll('.navbar-links a');
    navbarLinks.forEach(link => {
        link.addEventListener('click', () => {
            navbarLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        });
    });
});
