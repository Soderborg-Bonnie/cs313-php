// node core modules
const http = require('http');
const url = require('url');
const fs = require('fs');
const path = require('path');

// create server
const server = http.createServer(function onRequest(req, res) {
	// add styling
	if (req.url == '/style.css') {
		fs.readFile(path.join(__dirname, 'style.css'), function(err, data) {
			if (err) throw err;
			res.writeHead(200, { 'Content-Type': 'text/css' });
			return res.end(data);
		});
	}
	// check if home page
	if (req.url == '/' || req.url == '/index') {
		fs.readFile(path.join(__dirname, 'index.html'), function(err, data) {
			if (err) throw err;
			res.writeHead(200, { 'Content-Type': 'text/html' });
			return res.end(data);
		});
	}
	// check if json data page
	if (req.url == '/getData') {
		fs.readFile(path.join(__dirname, 'info.json'), function(err, data) {
			if (err) throw err;
			res.writeHead(200, { 'Content-Type': 'application/json' });
			return res.end(data);
		});
	}
	// if not either home or json data then it's a 404
	if (req.url !== '/getData' || req.url !== '/' || req.url !== '/index') {
		fs.readFile(path.join(__dirname, 'lostPage.html'), function(err, data) {
			if (err) throw err;
			res.writeHead(404, { 'Content-Type': 'text/html' });
			return res.end(data);
		});
	}
});
// port to listen on
server.listen(8888);
