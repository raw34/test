const fs = require('fs');
const path = require('path');

async function test() {
  var name = path.resolve() + '/javascript/helloworld.js';
  var file = await fs.promises.readFile(name);

  return file;
}

test().then(function(res) {
  console.log(res.toString());
});