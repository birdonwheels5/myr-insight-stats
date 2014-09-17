var page = require('webpage').create();
var fs = require('fs');// File System Module
var args = system.args[1];
var output = '/var/www/myr-insight-stats/scrape.html'; // path for saving the local file 
page.open(address, function() { // open the file 
fs.write(output,page.content,'w'); // Write the page to the local file using page.content
phantom.exit(); // exit PhantomJs
});
