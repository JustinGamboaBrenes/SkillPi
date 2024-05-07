#!/usr/bin/env node
const fs = require('fs');
const { promisify } = require('util');
const readFileAsync = promisify(fs.readFile);

async function verificarReto3(filePath) {
  try {
    const codigo = await readFileAsync(filePath, 'utf8');
    const reto3 = /Math.random\(\) < 0.8/.test(codigo);
    console.log(`Reto 3 cumplido: ${reto3}`);
  } catch (error) {
    console.error('Error:', error);
  }
}

if (require.main === module) {
  verificarReto3('path/to/your/file.html');
}

module.exports = verificarReto3;
