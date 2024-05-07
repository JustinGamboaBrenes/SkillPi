#!/usr/bin/env node
const fs = require('fs');
const filePath = '/home/candidate/javascript_advanced.html';

fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) {
        console.error('Error:', err);
        process.exit(1);
    }
    const reto1 = /function hacerSolicitudHTTP\(\) {[\s\S]*return new Promise/.test(data);
    console.log(`Reto 1 cumplido: ${reto1 ? 'success' : 'failure'}`);
    process.exit(reto1 ? 0 : 1);
});
