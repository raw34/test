#! /usr/bin/env node 

var fs = require('fs'); // needed to read JSON file from disk
var Collection = require('postman-collection').Collection;
var myCollection;

// Load a collection to memory from a JSON file on disk (say, sample-collection.json)
myCollection = new Collection(JSON.parse(fs.readFileSync('sample-collection.json').toString()));

// log items at root level of the collection
console.log(myCollection.toJSON()); 
