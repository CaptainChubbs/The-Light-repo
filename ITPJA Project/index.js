//Function to validate the email format to ensure that it is in the right format
function emailValidation(){
    value = document.getElementById('email-address').value;
    apos=value.indexOf("@"); 
    dotpos=value.lastIndexOf(".");
    lastpos=value.length-1;
    if (apos < 1 || dotpos-apos < 2 || lastpos-dotpos > 3 || lastpos-dotpos < 2){
        document.getElementById("email-error").innerHTML = "Invalid Email Address";
        return false;
      } else {
        return true;
    }
  }


//Function to make the Practice number option disappear if the "Yes" radio button is not checked
const box = document.getElementById('box');

function handleRadioClick() {
if (document.getElementById('prac-Yes').checked) {
box.style.display = 'block';
} else {
box.style.display = 'none';
}
}

//Listener actively listening at the radio buttons to see when the "Yes" is clicked
const radioButtons = document.querySelectorAll('input[name="practice"]');
radioButtons.forEach(radio => {
radio.addEventListener('click', handleRadioClick);
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

        if (lengBoolean == true && bigLetterBoolean == true && numBoolean == true && specialCharBoolean == true) {
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

//This JS Function is used by Google Maps to help Nurses autocomplete their Address input
      "use strict";
  
      function initMap() {
        const CONFIGURATION = {
          "ctaTitle": "Checkout",
          "mapOptions": {"center":{"lat":37.4221,"lng":-122.0841},"fullscreenControl":true,"mapTypeControl":false,"streetViewControl":true,"zoom":11,"zoomControl":true,"maxZoom":22,"mapId":""},
          "mapsApiKey": "AIzaSyBrYOKQrKnN_OgxZau_JUvI4MjyJU-WBHE",
          "capabilities": {"addressAutocompleteControl":true,"mapDisplayControl":false,"ctaControl":false}
        };
        const componentForm = [
          'location',
          'locality',
          'administrative_area_level_1',
          'country',
          'postal_code',
        ];
  
        const getFormInputElement = (component) => document.getElementById(component + '-input');
        const autocompleteInput = getFormInputElement('location');
        const autocomplete = new google.maps.places.Autocomplete(autocompleteInput, {
          fields: ["address_components", "geometry", "name"],
          types: ["address"],
        });
        autocomplete.addListener('place_changed', function () {
          const place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert('No details available for input: \'' + place.name + '\'');
            return;
          }
          fillInAddress(place);
        });
  
        function fillInAddress(place) {  // optional parameter
          const addressNameFormat = {
            'street_number': 'short_name',
            'route': 'long_name',
            'locality': 'long_name',
            'administrative_area_level_1': 'short_name',
            'country': 'long_name',
            'postal_code': 'short_name',
          };
          const getAddressComp = function (type) {
            for (const component of place.address_components) {
              if (component.types[0] === type) {
                return component[addressNameFormat[type]];
              }
            }
            return '';
          };
          getFormInputElement('location').value = getAddressComp('street_number') + ' '
                    + getAddressComp('route');
          for (const component of componentForm) {
            // Location field is handled separately above as it has different logic.
            if (component !== 'location') {
              getFormInputElement(component).value = getAddressComp(component);
            }
          }
        }
      }