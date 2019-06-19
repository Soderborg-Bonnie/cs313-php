let modularFn = require('./teamActivitywk8/makeItModular.js/index.js');
let filterX = process.argv[3];
let dir = process.argv[2];

modularFn(dir, filterX,  function(err, files){
    if (err){
        return console.error('There was an error: ', err)
    }
    files.forEach(function (file){
        console.log(file)
    })
})