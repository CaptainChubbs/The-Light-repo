/** @format */

// Load the Google Maps API

// Get the Google Maps API Key from PHP
const googleMapsApiKey = "<?php echo $googleMapsApiKey; ?>";

// Get oauthtoken

function initMap() {
  // Create a new map object
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });

  // Load Google Calendar events on the map
  const calendarId = 'dev@abahlengi.com'; // Replace with your Google Calendar ID
  const apiKey = 'AIzaSyDjlWl9AFidUCGehPK7GLMTtLIfGMFtva0'; // Replace with your Google API Key

  const request = gapi.client.calendar.events.list({
    calendarId: calendarId,
    timeMin: new Date().toISOString(),
    showDeleted: false,
    singleEvents: true,
    orderBy: 'startTime',
  });

  request.execute(function (response) {
    const events = response.items;
    events.forEach(function (event) {
      const eventLocation = event.location;
      const eventTitle = event.summary;

      // Create a marker for each event on the map
      const marker = new google.maps.Marker({
        position: { lat: eventLocation.lat, lng: eventLocation.lng },
        map: map,
        title: eventTitle,
      });

      // You can customize the marker's appearance or add event info windows as needed
    });
  });
}

