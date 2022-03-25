const sqlite3 = require('sqlite3').verbose();
//open database
let db = new sqlite3.Database('database.db',(err) => {
 if (err) {
   return console.error(err.message);
 }
 console.log('Connected to the database.')
});

let sql = "SELECT * FROM menu";
db.all(sql, [], (err, rows) => {
  if (err) {
    throw err;
  }
  rows.forEach((row) => {
    console.log(row);
  });
});

//close database
db.close((err) => {
 if (err) {
   return console.error(err.message);
 }
 console.log('Close the database connection.');
});