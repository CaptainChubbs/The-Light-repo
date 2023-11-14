<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Portal - Nurse Booking Services</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        .pricing-table {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .table-heading {
            color: #3e474d;
        }
        .table-subheading {
            color: #6c757d;
        }
        .table th, .table td {
            border: none;
        }
        .table th {
            background-color: #f5f5f5;
        }
    </style>
</head>

<?php
    include_once("includes/head.php");
include("./nav.php");
?>
<body>
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Welcome to Our Nurse Booking Services</h2>

            <!-- Health Assessments Table -->
            <div class="pricing-table">
                <h3 class="text-center table-heading">Comprehensive Health Assessments</h3>
                <p class="text-center table-subheading">Caring for your well-being.</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Health risk assessment for 25 or more people (HRA)</td>
                            <td>R150</td>
                            <td>
                            <a href="#" class="add-to-cart" data-service="HRA" data-price="150">Add to Cart</a>
                        </td>
                        </tr>
                        <tr>
                            <td>Hematocrit Tests (HCT)</td>
                            <td>R250</td>
                            <td><a href="#">Add to Cart</a></td>
                        </tr>
                        <tr>
                            <td>HRA & HCT</td>
                            <td>R350</td>
                            <td><a href="#">Add to Cart</a></td>
                        </tr>
                        <!-- Add more rows if needed -->
                    </tbody>
                </table>
            </div>

            <!-- Health Education and Coordination Fees Table -->
            <div class="pricing-table">
                <h3 class="table-heading">Health Education and Coordination Fees</h3>
                <p class="table-subheading">Supporting your health journey.</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Less than 100 attendees</td>
                            <td>R1500</td>
                            <td><a href="cart.php?service=Less_than_100_attendees&price=1500">Add to Cart</a></td>
                        </tr>
                        <tr>
                            <td>More than 100 attendees</td>
                            <td>R2500</td>
                            <td><a href="cart.php?service=More_than_100_attendees&price=2500">Add to Cart</a></td>
                        </tr>
                        <tr>
                            <td>Travelling is only billed for more than 200km event booked within 10 days of the event taking place.</td>
                            <td>R2500</td>
                            <td><a href="cart.php?service=Travelling_fee&price=2500">Add to Cart</a></td>
                        </tr>
                        <!-- Add more rows if needed -->
                    </tbody>
                </table>
            </div>

            <!-- Consultation Fees Table -->
            <div class="pricing-table">
                <h3 class="table-heading">Consultation Fees</h3>
                <p class="table-subheading">Your health, our priority.</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Individual consultation, counselling, planning and/or assessment. 15 - 30 minutes.</td>
                            <td>R220</td>
                            <td><a href="#">Add to Cart</a></td>
                        </tr>
                        <tr>
                            <td>Individual consultation, counselling, planning and/or assessment. 31 - 45 minutes.</td>
                            <td>R380</td>
                            <td><a href="#">Add to Cart</a></td>
                        </tr>
                        <tr>
                            <td>Virtual home assessments and care plan</td>
                            <td>R350</td>
                            <td><a href="#">Add to Cart</a></td>
                        </tr>
                        <!-- Add more rows if needed -->
                    </tbody>
                </table>
            </div>

            <!-- Psychiatric Nursing Therapy Table -->
            <div class="pricing-table">
                <h3 class="table-heading">Psychiatric Nursing Therapy</h3>
                <p class="table-subheading">Caring for your mental well-being.</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Individual Therapy Session</td>
                            <td>R120</td>
                            <td><a href="#">Add to Cart</a></td>
                        </tr>
                        <tr>
                            <td>Group Therapy Session</td>
                            <td>R75</td>
                            <td><a href="#">Add to Cart</a></td>
                        </tr>
                        <!-- Add more rows if needed -->
                    </tbody>
                </table>
            </div>
        </div>

    <!-- Booking form begins -->
    <form id="booking-form" action="process_booking.php" method="post">
        <div class="container">
            <!-- <h2 class="mb-4 text-center">WELCOME TO YOUR USER PORTAL</h2> -->

            <div class="container">
                <!-- ... Your user information form ... -->
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2>Booking Details</h2>
                    <!-- Booking Form Fields -->
                    <div class="form-group">
                        <label for="service">Select Service(s)</label>
                        <select class="form-control" id="service" name="service[]" multiple required>
                            <option value="HRA" data-price="150">Health risk assessment for 25 or more people (HRA)</option>
                            <option value="HCT" data-price="250">Hematocrit Tests (HCT)</option>
                            <option value="HRA_HCT" data-price="350">HRA & HCT</option>
                            <option value="Less_than_100_attendees" data-price="1500">Less than 100 attendees</option>
                            <option value="More_than_100_attendees" data-price="2500">More than 100 attendees</option>
                            <option value="Travelling_fee" data-price="2500">Travelling is only billed for more than 200km event</option>
                            <option value="Individual_Consultation_15-30_min" data-price="220">Individual consultation, counselling, planning and/or assessment. 15 - 30 minutes</option>
                            <option value="Individual_Consultation_31-45_min" data-price="380">Individual consultation, counselling, planning and/or assessment. 31 - 45 minutes</option>
                            <option value="Virtual_home_assessment" data-price="350">Virtual home assessments and care plan</option>
                            <option value="Individual_Therapy_Session" data-price="120">Individual Therapy Session</option>
                            <option value="Group_Therapy_Session" data-price="75">Group Therapy Session</option>
                            <!-- Add more service options here -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="event-date">Event Date</label>
                        <input type="date" class="form-control" id="event-date" name="event-date" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Additional Notes</label>
                        <textarea class="form-control" id="message" name="message" placeholder="Any additional notes or requests"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="total-price">Total Price</label>
                        <input type="text" class="form-control" id="total-price" name="total-price" placeholder="Total Price" readonly>
                    </div>

                    <button type="submit" class="btn bg-black" id="pay-now-button"><a href="order-summary.php">Pay Now</a></button>
                    <button type="button" class="btn btn-secondary" id="cancel-booking">Cancel</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Booking form ends -->
</section>
    
<?php include_once("./includes/footer.php");?>

    <!-- Add Bootstrap JS and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const serviceSelect = document.getElementById("service");
        const quantityInput = document.getElementById("quantity");
        const eventDateInput = document.getElementById("event-date");
        const totalPriceInput = document.getElementById("total-price");
        const payNowButton = document.getElementById("pay-now-button");

        // Function to calculate the total price
        function calculateTotalPrice() {
            const selectedServices = Array.from(serviceSelect.selectedOptions);
            const totalPrice = selectedServices.reduce((total, option) => {
                return total + parseFloat(option.getAttribute("data-price"));
            }, 0);
            const quantity = parseInt(quantityInput.value);
            const total = totalPrice * quantity;
            totalPriceInput.value = total.toFixed(2);
            enablePayNowButton();
        }

        // Calculate the total price when service selections change
        serviceSelect.addEventListener("change", calculateTotalPrice);

        // Calculate the total price when quantity changes
        quantityInput.addEventListener("input", calculateTotalPrice);

        // Enable the "Pay Now" button when all required fields are filled
        function enablePayNowButton() {
            if (serviceSelect.value && quantityInput.value && eventDateInput.value) {
                payNowButton.removeAttribute("disabled");
            } else {
                payNowButton.setAttribute("disabled", true);
            }
        }

        // Validate the form when any field changes
        serviceSelect.addEventListener("change", enablePayNowButton);
        quantityInput.addEventListener("input", enablePayNowButton);
        eventDateInput.addEventListener("input", enablePayNowButton);
        eventDateInput.addEventListener("change", enablePayNowButton); // Added event listener for date change

        // Initially, disable the "Pay Now" button
        enablePayNowButton();
    });
</script>


</body>
</html>


