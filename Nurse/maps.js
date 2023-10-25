/** @format */

// Load the Google Maps API

// Get oauthtoken

function initMap() {
  // Create a new map object
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}
