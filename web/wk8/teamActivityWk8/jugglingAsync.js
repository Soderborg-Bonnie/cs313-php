let http = require('http')
let bl = require('bl')
let results = []
let count = 0

function displayResults () {
  for (let i = 0; i < 3; i++) {
    console.log(results[i])
  }
}

function httpGet (counter) {
  http.get(process.argv[2 + counter], function (response) {
    response.pipe(bl(function (err, data) {
      if (err) {
        return console.error(err)
      }

      results[counter] = data.toString()
      count++

      if (count === 3) {
        displayResults()
      }
    }))
  })
}

for (let i = 0; i < 3; i++) {
  httpGet(i)
}