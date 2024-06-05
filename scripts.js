document.addEventListener('DOMContentLoaded', function() {
    // Get all "Buy Now" buttons
    var buyNowButtons = document.querySelectorAll('.buy-now');

    // Add click event listener to each button
    buyNowButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            // Redirect to the product page with the index of the shoe
            window.location.href = `product.html?shoe=${index}`;
        });
    });
});
