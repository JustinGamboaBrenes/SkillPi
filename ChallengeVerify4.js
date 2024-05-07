#!/usr/bin/env node
const fs = require('fs');
const filePath = '/home/candidate/javascript_advanced.html';

fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) {
        console.error('Error:', err);
        process.exit(1);
    }
    const reto4 = /\.then\([\s\S]*\.catch\(/.test(data);
    console.log(`Reto 4 cumplido: ${reto4 ? 'success' : 'failure'}`);
    process.exit(reto4 ? 0 : 1);
});
