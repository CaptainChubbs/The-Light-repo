/** @format */

// If Client type selected display form

document.addEventListener("DOMContentLoaded", function () {
  // Your code here
  let formSelector = document.getElementsByClassName("form-select")[0];
  formSelector.addEventListener("change", function () {
    let selectedClientType = formSelector.value;

    let individualFormDiv =
      document.getElementsByClassName("individual-form")[0];
    let businessFormDiv = document.getElementsByClassName("business-form")[0];

    if (selectedClientType === "Individual") {
      individualFormDiv.classList.toggle("show-form");
      businessFormDiv.classList.remove("show-form");

      // Get the form element by its ID
      const form = document.getElementsByClassName("individual")[0];

      // Add a submit event listener to the form
      form.addEventListener("submit", function (event) {
        // Prevent the form from submitting by default
        event.preventDefault();

        // Validation checks for each input field
        let isValid = true;

        // First Name and Last Name
        const firstName = document.getElementById("first-name").value;
        const lastName = document.getElementById("last-name").value;
        if (firstName.trim() === "" || lastName.trim() === "") {
          isValid = false;
        }

        // Date of Birth
        // set minimum age to 18
        const today = new Date();
        const minAge = 18;
        const minAgeDate = new Date(
          today.getFullYear() - minAge,
          today.getMonth(),
          today.getDate()
        );
        const dobInput = document.getElementById("dob");
        const dob = new Date(document.getElementById("dob").value);
        if (dob == "") {
          isValid = false;
        }
        const age = today.getFullYear() - dob.getFullYear();

        if (age < minAge) {
          // alert("You must be at least 18 years old to register.");
          dobInput.setCustomValidity(
            "You must be at least 18 years old to register."
          );
          return false;
        }

        // Email validation
        const email = document.getElementById("email-address").value;
        if (!isValidEmail(email)) {
          isValid = false;
          alert("Email is not valid.");
        }

        // Phone Number
        const phoneNumber = document.getElementById("phone-number").value;
        if (phoneNumber.trim() === "" || phoneNumber.length < 10) {
          isValid = false;
          alert(
            "Phone Number is required and should be at least 10 characters."
          );
        }

        // Address
        const address = document.getElementById("address").value;
        if (address.trim() === "") {
          isValid = false;
          alert("Address is required.");
        }

        // City, Province, and Postal Code
        const city = document.getElementById("city").value;
        const province = document.getElementById("province").value;
        const postalCode = document.getElementById("postal-code").value;
        if (
          city.trim() === "" ||
          province.trim() === "" ||
          postalCode.trim() === ""
        ) {
          isValid = false;
          alert("City, Province, and Postal Code are required.");
        }

        // Password and Confirm Password
        const password = document.getElementById("inputPassword").value;
        const confirmPassword = document.getElementById("conf-password").value;
        if (!isValidPassword(password)) {
          isValid = false;
          alert("Password must meet the criteria.");
        }
        if (password !== confirmPassword) {
          isValid = false;
          alert("Passwords do not match.");
        }

        // If all checks pass, you can submit the form
        // return isValid;
        if (isValid) {
          form.submit();
        }
      });

      // Function to check for a valid email address
      function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
      }

      // Function to check for a valid password
      function isValidPassword(password) {
        // You can define your own password criteria here
        // For example, at least 8 characters, with uppercase, lowercase, and a number
        const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        return passwordRegex.test(password);
      }
    } else if (selectedClientType === "Business") {
      businessFormDiv.classList.toggle("show-form");
      individualFormDiv.classList.remove("show-form");

      // Get the form element by its ID
      const form = document.getElementsByClassName("business")[0];
      // Add an event listener on the form's submit event
      form.addEventListener("submit", function (event) {
        // Prevent the form from submitting by default
        event.preventDefault();

        // Validation checks for each input field
        let isValid = true;

        // Business Name
        const businessName = document.getElementById("business-name").value;
        if (businessName.trim() === "") {
          isValid = false;
        }

        // Business Type
        const businessType = document.getElementById("business-type").value;
        if (businessType.trim() === "") {
          isValid = false;
        }

        // Email validation
        const email = document.getElementById("email-address-2").value;
        if (!isValidEmail(email)) {
          isValid = false;
          alert("Email is not valid.");
        }

        // Phone Number
        const phoneNumber = document.getElementById("phone-number-2").value;
        if (phoneNumber.trim() === "" || phoneNumber.length < 10) {
          isValid = false;
          alert(
            "Phone Number is required and should be at least 10 characters."
          );
        }

        // Address
        const address = document.getElementById("address-2").value;
        if (address.trim() === "") {
          isValid = false;
          alert("Address is required.");
        }

        // City, Province, and Postal Code
        const city = document.getElementById("city-2").value;
        const province = document.getElementById("province-2").value;
        const postalCode = document.getElementById("postal-code-2").value;
        if (
          city.trim() === "" ||
          province.trim() === "" ||
          postalCode.trim() === ""
        ) {
          isValid = false;
          alert("City, Province, and Postal Code are required.");
        }

        // Password and Confirm Password
        const password = document.getElementById("inputPassword-2").value;
        const confirmPassword =
          document.getElementById("conf-password-2").value;
        if (!isValidPassword(password)) {
          isValid = false;
          alert("Password must meet the criteria.");
        }
        if (password !== confirmPassword) {
          isValid = false;
          alert("Passwords do not match.");
        }

        // If all checks pass, you can submit the form
        // return isValid;
        if (isValid) {
          form.submit();
        }
      });

      // Function to check for a valid email address
      function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
      }

      // Function to check for a valid password
      function isValidPassword(password) {
        // You can define your own password criteria here
        // For example, at least 8 characters, with uppercase, lowercase, and a number
        const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        return passwordRegex.test(password);
      }
    }
  });
});

let forms = document.querySelectorAll(".needs-validation");
Array.prototype.slice.call(forms).forEach(function (form) {
  form.addEventListener(
    "submit",
    function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation;
      }
      form.classList.add("was-validated");
    },
    false
  );
});

//This JS Listener will aim to validate the password being created by the user and validate to ensure it meets the criteria
addEventListener("DOMContentLoaded", (event) => {
  const password = document.getElementById("inputPassword");
  const conf_password = document.getElementById("conf-password");
  const passwordAlert = document.getElementById("password-alert");
  const requirements = document.querySelectorAll(".requirements");
  let lengBoolean, bigLetterBoolean, numBoolean, specialCharBoolean;
  let leng = document.querySelector(".leng");
  let bigLetter = document.querySelector(".big-letter");
  let num = document.querySelector(".num");
  let specialChar = document.querySelector(".special-char");
  const specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
  const numbers = "0123456789";

  requirements.forEach((element) => element.classList.add("wrong"));

  password.addEventListener("focus", () => {
    passwordAlert.classList.remove("d-none");
    if (!password.classList.contains("is-valid")) {
      password.classList.add("is-invalid");
    }
  });

  password.addEventListener("input", () => {
    let value = password.value;
    if (value.length < 8) {
      lengBoolean = false;
    } else if (value.length > 7) {
      lengBoolean = true;
    }

    if (value.toLowerCase() == value) {
      bigLetterBoolean = false;
    } else {
      bigLetterBoolean = true;
    }

    numBoolean = false;
    for (let i = 0; i < value.length; i++) {
      for (let j = 0; j < numbers.length; j++) {
        if (value[i] == numbers[j]) {
          numBoolean = true;
        }
      }
    }

    specialCharBoolean = false;
    for (let i = 0; i < value.length; i++) {
      for (let j = 0; j < specialChars.length; j++) {
        if (value[i] == specialChars[j]) {
          specialCharBoolean = true;
        }
      }
    }

    if (
      lengBoolean == true &&
      bigLetterBoolean == true &&
      numBoolean == true &&
      specialCharBoolean == true
    ) {
      password.classList.remove("is-invalid");
      password.classList.add("is-valid");

      requirements.forEach((element) => {
        element.classList.remove("wrong");
        element.classList.add("good");
      });
      passwordAlert.classList.remove("alert-warning");
      passwordAlert.classList.add("alert-success");
    } else {
      password.classList.remove("is-valid");
      password.classList.add("is-invalid");

      passwordAlert.classList.add("alert-warning");
      passwordAlert.classList.remove("alert-success");

      if (lengBoolean == false) {
        leng.classList.add("wrong");
        leng.classList.remove("good");
      } else {
        leng.classList.add("good");
        leng.classList.remove("wrong");
      }

      if (bigLetterBoolean == false) {
        bigLetter.classList.add("wrong");
        bigLetter.classList.remove("good");
      } else {
        bigLetter.classList.add("good");
        bigLetter.classList.remove("wrong");
      }

      if (numBoolean == false) {
        num.classList.add("wrong");
        num.classList.remove("good");
      } else {
        num.classList.add("good");
        num.classList.remove("wrong");
      }

      if (specialCharBoolean == false) {
        specialChar.classList.add("wrong");
        specialChar.classList.remove("good");
      } else {
        specialChar.classList.add("good");
        specialChar.classList.remove("wrong");
      }
    }
  });

  password.addEventListener("blur", () => {
    passwordAlert.classList.add("d-none");
  });
});
