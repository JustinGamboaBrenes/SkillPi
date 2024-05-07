#!/usr/bin/env node
const fs = require('fs');
const { promisify } = require('util');
const readFileAsync = promisify(fs.readFile);

async function verificarReto4(filePath) {
  try {
    const codigo = await readFileAsync(filePath, 'utf8');
    const reto4 = /\.then\([\s\S]*\.catch\(/.test(codigo);
    console.log(`Reto 4 cumplido: ${reto4}`);
  } catch (error) {
    console.error('Error:', error);
  }
}

if (require.main === module) {
  verificarReto4('path/to/your/file.html');
}

module.exports = verificarReto4;
