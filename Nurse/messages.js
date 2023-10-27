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

