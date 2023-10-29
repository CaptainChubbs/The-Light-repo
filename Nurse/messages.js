/** @format */

// Get the oauth token

const { google } = require("googleapis");

const chat = google.chat({
  version: "v1",
  auth: "YOUR_AUTHORIZATION_HERE",
});

// Example request
chat.spaces.list(
  {
    pageSize: 10,
  },
  (err, res) => {
    if (err) return console.error("The API returned an error:", err.message);
    const spaces = res.data.spaces;
    if (spaces.length) {
      console.log("Spaces:");
      spaces.forEach((space) => {
        console.log(`${space.name} (${space.displayName})`);
      });
    } else {
      console.log("No spaces found.");
    }
  }
);

const accessToken = '<?php echo $_SESSION["access_token"]; ?>';

// Function to send a message to Google Chat
function sendMessage(message) {
  // Construct the API request to send a message using the accessToken
  // Replace 'YOUR_API_ENDPOINT' with the actual Google Chat API endpoint
  const apiEndpoint = 'YOUR_API_ENDPOINT';
  const chatMessage = {
      text: message,
  };

  // Make an API request to send the message
  fetch(apiEndpoint, {
      method: 'POST',
      headers: {
          'Authorization': `Bearer ${accessToken}`,
          'Content-Type': 'application/json',
      },
      body: JSON.stringify(chatMessage),
  })
  .then(response => response.json())
  .then(data => {
      console.log('Message sent:', data);
  })
  .catch(error => {
      console.error('Error sending message:', error);
  });
}

// Example: Send a message
sendMessage('Hello, this is a test message.');

