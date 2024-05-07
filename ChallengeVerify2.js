#!/usr/bin/env node
const fs = require('fs');
const { promisify } = require('util');
const readFileAsync = promisify(fs.readFile);

async function verificarReto2(filePath) {
  try {
    const codigo = await readFileAsync(filePath, 'utf8');
    const reto2 = /setTimeout\([\s\S]*, 2000\)/.test(codigo);
    console.log(`Reto 2 cumplido: ${reto2}`);
  } catch (error) {
    console.error('Error:', error);
  }
}

if (require.main === module) {
  verificarReto2('/home/candidate/javascript_advanced.html');
}

module.exports = verificarReto2;
