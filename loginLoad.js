const sqlite3 = require('sqlite3').verbose();
const user = "fin";
const password = "password";
//open database
let db = new sqlite3.Database('database.db');
let sql = `SELECT username, type, password FROM users WHERE username = ?`;
let username = user;
var success = false;

db.get(sql, [username], (err, row) => {
  if (err) {
    return console.error(err.message);
  }
  if (row){
    console.error(password === row.password);
    success = (password === row.password);
  }
});
db.close();
console.error(success + "h");