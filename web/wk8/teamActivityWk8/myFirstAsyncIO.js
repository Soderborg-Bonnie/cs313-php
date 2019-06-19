let fs = require("fs");
let testFile = process.argv[2];
// test = fs.readFile(testFile, function(err, test) {
fs.readFile(testFile, function(err, test) {
if (err){return err}
  lines = test.toString();
  console.log(lines.split("\n").length - 1);
});
