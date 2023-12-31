<footer class="w-100">
        <div>
            <div class="row footer-div p-4 mt-5">
                <div class="col-md-4 mt-4">
                    <h4>Abahlengi</h4>
                    <p>Abahlengi is a home nursing agency that provides home nursing services to patients in the comfort of their homes.</p>
                </div>
                <div class="col-md-4 mt-4">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href=".../../about.php">About Us</a></li> 
                        <li><a href="../../services.php">Services</a></li>
                        <li><a href="../../contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mt-4">
                    <h4>Contact Us</h4>
                    <ul>
                        <li><a href="mailto:info@abahlengi.com">Email</a></li>
                        <li><a href="tel:+27 71 566 7236">Phone</a></li> 
                        <li><a href="https://www.google.com/maps/place/WeWork+-+Coworking+%26+Office+Space/@-26.1458466,28.0412706,17z/data=!3m1!4b1!4m6!3m5!1s0x1e950dcd57eac3bf:0x2c4556de75b244a5!8m2!3d-26.1458514!4d28.0438455!16s%2Fg%2F11fk4sjcy4?entry=ttu">Address</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<!-- Add Bootstrap JS and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editUserInfoBtn = document.getElementById("edit-user-info");
        const saveUserInfoBtn = document.getElementById("save-user-info");

        const userInfoForm = document.getElementById("user-info-form");
        editUserInfoBtn.addEventListener("click", function() {
            userInfoForm.querySelectorAll("input, textarea").forEach((element) => {
                element.removeAttribute("readonly");
            });
            saveUserInfoBtn.removeAttribute("disabled");
            editUserInfoBtn.setAttribute("disabled", true);
        });

        userInfoForm.addEventListener("submit", function(e) {
            e.preventDefault();
            // Handle user info form submission (e.g., update user info on the server)
            // Disable form fields and "Save" button after saving
            userInfoForm.querySelectorAll("input, textarea").forEach((element) => {
                element.setAttribute("readonly", true);
            });
            saveUserInfoBtn.setAttribute("disabled", true);
            editUserInfoBtn.removeAttribute("disabled");
        });

    });
</script>