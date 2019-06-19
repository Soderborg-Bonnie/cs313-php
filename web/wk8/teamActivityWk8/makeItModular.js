let fs = require('fs');
let path = require('path');

module.exports = function(dir, filterX, callback){
    fs.readdir(dir, function(err, files){
        if (err){
            return callback(err)
        }
        files = files.filter(function(file){
            return path.extname(file) === '.' + filterX
        })
        callback(null, files)
    })
}