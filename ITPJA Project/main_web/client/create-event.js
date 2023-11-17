// Node.js with Express and MySQL example
const express = require("express");
const mysql = require("mysql");

const app = express();
app.use(express.json()); // Parse JSON requests

// Create MySQL connection
const db = mysql.createConnection({
  host: "127.0.0.1",
  user: "root",
  password: "r3zsaturn",
  database: "Abahlengi",
});

// Connect
db.connect((err) => {
  if (err) {
    throw err;
  }
  console.log("MySQL connected");
});

// API endpoint to handle booking requests
app.post("/api/book-event", (req, res) => {
  const eventData = req.body; // Assuming the client sends the event data in the request body

  const checkEventQuery = `
    SELECT * 
    FROM event 
    WHERE event_date = ? 
      AND province = ? 
      AND city = ? 
      AND event_status = 'upcoming'`;

  db.query(
    checkEventQuery,
    [eventData.event_date, eventData.event_province, eventData.event_city],
    (err, existingEvents) => {
      if (err) {
        console.error(err);
        return res.status(500).json({ error: "Internal Server Error" });
      }

      if (existingEvents.length > 0) {
        return res.status(409).json({ error: "Event already scheduled for the selected day" });
      }

      const insertEventQuery = `
        INSERT INTO event (
          event_type,
          event_status,
          event_name,
          event_date,
          start_time,
          end_time,
          event_location,
          city,
          province,
          description
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

      const eventValues = [
        eventData.event_type,
        eventData.event_status,
        eventData.event_name,
        eventData.event_date,
        eventData.start_time,
        eventData.end_time,
        eventData.event_location,
        eventData.event_city,
        eventData.event_province,
        eventData.event_description,
      ];

      db.query(insertEventQuery, eventValues, (err, result) => {
        if (err) {
          console.error(err);
          return res.status(500).json({ error: "Internal Server Error" });
        }

        const eventID = result.insertId;
        return res.status(201).json({ message: "Event added successfully", eventID });
      });
    }
  );
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Server is running on port ${PORT}`));
