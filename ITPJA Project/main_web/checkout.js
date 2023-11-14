// Function to create a PayPal order
async function createOrderCallback(cart) {
    try {
        // Use fetch or another AJAX method to send a request to your server
        const response = await fetch('/api/orders', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ cart }),
        });

        const orderData = await response.json();

        if (orderData.id) {
            return orderData.id;
        } else {
            // Handle error cases
            console.error('Error creating PayPal order:', orderData);
            throw new Error('Error creating PayPal order');
        }
    } catch (error) {
        console.error('Error creating PayPal order:', error);
        throw new Error('Error creating PayPal order');
    }
}

// Function to handle payment approval
async function onApproveCallback(orderId) {
    try {
        // Use fetch or another AJAX method to send a request to your server
        const response = await fetch(`/api/orders/${orderId}/capture`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
        });

        const orderData = await response.json();

        // Handle different cases: success, failure, etc.
        if (orderData.status === 'COMPLETED') {
            console.log('Payment successful:', orderData);
        } else {
            console.error('Payment not successful:', orderData);
            // Handle failure cases
        }
    } catch (error) {
        console.error('Error capturing payment:', error);
        // Handle error cases
    }
}

// Render PayPal buttons using the PayPal JS SDK
window.paypal
    .Buttons({
        style: {
            shape: 'rect',
            layout: 'vertical',
        },
        createOrder: async (data, actions) => {
            const orderId = await createOrderCallback(/* Pass your cart or product details here */);
            return orderId;
        },
        onApprove: (data) => onApproveCallback(data.orderID),
    })
    .render('#paypal-button-container');