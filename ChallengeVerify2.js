#!/usr/bin/env node
const fs = require('fs');
const filePath = '/home/candidate/javascript_advanced.html';

fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) {
        console.error('Error:', err);
        process.exit(1);
    }
    const reto2 = /setTimeout\([\s\S]*, 2000\)/.test(data);
    console.log(`Reto 2 cumplido: ${reto2 ? 'success' : 'failure'}`);
    process.exit(reto2 ? 0 : 1);
});

