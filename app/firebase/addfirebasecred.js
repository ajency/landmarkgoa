const fs = require('fs');
let jsonData = require('./env.json');

fs.readFile('./src/index.js', function read(err, data) {
    if (err) {
        throw err;
    }

    fs.writeFile("./src/firebase-functions.js", "var firebaseConfig = " + JSON.stringify(jsonData) + ";\r\n" + data, function(err) {
        if(err) {
            return console.log(err);
        }
    }); 
});