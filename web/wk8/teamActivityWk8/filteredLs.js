let fs = require('fs');
let path = require('path');

fs.readdir(process.argv[2], function (err, files) {
    if (err) return console.log(err)
    files.forEach(function(file){
        if (path.extname(file) === '.' + process.argv[3]){
            console.log(file)
        }
    })
    })