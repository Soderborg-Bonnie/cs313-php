sum = 0;
for (i = 2; i <= process.argv.length - 1; i++) {
  sum += +process.argv[i];
}

console.log(sum);
