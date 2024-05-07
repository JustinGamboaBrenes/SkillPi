#!/usr/bin/env node
const fs = require('fs');
const filePath = '/home/candidate/javascript_advanced.html';

fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) {
        console.error('Error:', err);
        process.exit(1);
    }
    const reto3 = /Math.random\(\) < 0.8/.test(data);
    console.log(`Reto 3 cumplido: ${reto3 ? 'success' : 'failure'}`);
    process.exit(reto3 ? 0 : 1);
});
