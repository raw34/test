const fs = require('fs');
const path = require('path');

var readFile = function (fileName){
  return new Promise(function (resolve, reject){
    fs.readFile(fileName, function(error, data){
      if (error) reject(error);
      resolve(data);
    });
  });
};

async function test() {
  var name = path.resolve() + '/javascript/helloworld.js';
  // var file = await fs.promises.readFile(name);
  var file = readFile(name);

  return file;
}

test().then(function(res) {
  console.log(res.toString());
});