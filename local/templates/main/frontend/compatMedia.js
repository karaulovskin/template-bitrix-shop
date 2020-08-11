const fs = require('fs');
const mqpacker = require("css-mqpacker");

const fileName = 'main.css';
const fileDirectory = './assets/styles/';


const compated = mqpacker.pack(fs.readFileSync(`${fileDirectory + fileName}`, "utf8"), {
    from: fileName,
    map: {
        inline: false
    }
}).css;


fs.writeFile((fileDirectory + fileName), compated, function(err) {
    if (err) throw err;
});
