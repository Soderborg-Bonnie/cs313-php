let net = require('net')

function addZero (i) {
  return (i < 10 ? '0' : '') + i
}

function now () {
  let d = new Date()
  return d.getFullYear() + '-' +
    addZero(d.getMonth() + 1) + '-' +
    addZero(d.getDate()) + ' ' +
    addZero(d.getHours()) + ':' +
    addZero(d.getMinutes())
}

let server = net.createServer(function (socket) {
  socket.end(now() + '\n')
})

server.listen(Number(process.argv[2]))