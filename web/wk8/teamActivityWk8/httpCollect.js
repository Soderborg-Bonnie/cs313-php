//couldn't get this way to work calling in a 3rd party module like bl or concat-stream
// let http = require('http')
// let concatStream = require('concat-stream')
// // let bl = require('bl')
// let dir = process.argv[2]

// http.get(dir, function (response) {
//   response.pipe(concatStream(function (err, data) {
//     if (err) {
//       return console.error(err)
//     }
//     data = data.toString()
//     console.log(data.length)
//     console.log(data)
//   }))
// })

let http = require('http')
let dir = process.argv[2]
let data = ''
 
http.get(dir, function (response) {
  response.on('data', function (nextData) {
    data += nextData
  })
  response.on('end', function () {
    console.log(data.length)
    console.log(data)
  })
})