let fs = require("fs");

let testFile = process.argv[2];
test = fs.readFileSync(testFile);
lines = test.toString();
console.log(lines.split("\n").length - 1);
