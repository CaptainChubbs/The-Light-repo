document.addEventListener("DOMContentLoaded", function () {
    // Function to handle "Add to Cart" button clicks
    const addToCartButtons = document.querySelectorAll(".service-card a");
    addToCartButtons.forEach((button) => {
        button.addEventListener("click", addToCart);
    });

    function addToCart(event) {
        event.preventDefault();
        const serviceId = this.getAttribute("href").replace("book-now.php?add-to-cart=", "");

        // Create or retrieve the shopping cart from the session storage
        let shoppingCart = JSON.parse(sessionStorage.getItem("shoppingCart")) || [];

        // Find the service in the shopping cart by serviceId
        const existingService = shoppingCart.find((item) => item.id === serviceId);

        if (existingService) {
            // If the service is already in the cart, increase its quantity
            existingService.quantity += 1;
        } else {
            // If not, add the service to the cart with a quantity of 1
            shoppingCart.push({ id: serviceId, quantity: 1 });
        }

        // Update the session storage with the updated shopping cart
        sessionStorage.setItem("shoppingCart", JSON.stringify(shoppingCart));

        // Display an alert or update the UI to indicate the service has been added to the cart
        alert(`Added service with ID ${serviceId} to the cart.`);
    }
});
