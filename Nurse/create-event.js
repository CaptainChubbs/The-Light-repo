/** @format */

// Node.js with Express and MySQL example
const express = require("express");
const mysql = require("mysql");

const app = express();

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

app.get("/api/nurse", (req, res) => {
  const selectedProvince = req.query.province;

  // Your MySQL query to get available nurses
  const sql = `SELECT * FROM nurse WHERE province = 'Gauteng' AND status = 'available'`;

  db.query(sql, [selectedProvince], (err, result) => {
    if (err) throw err;
    res.json(result);
  });
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Server is running on port ${PORT}`));
