let http = require('http');
let map = require('through2-map');

let server = http.createServer(function(req, res) {
  if (req.method !== "POST") {
    return res.end("send me a POST\n");
  }

  req.pipe(map(function(data) {
        return data.toString().toUpperCase();
      })
    )
    .pipe(res);
});

server.listen(Number(process.argv[2]));
