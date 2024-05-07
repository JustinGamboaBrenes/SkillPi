#!/usr/bin/env node
const fs = require('fs');
const { promisify } = require('util');
const readFileAsync = promisify(fs.readFile);

async function verificarReto1(filePath) {
  try {
    const codigo = await readFileAsync(filePath, 'utf8');
    const reto1 = /function hacerSolicitudHTTP\(\) {[\s\S]*return new Promise/.test(codigo);
    console.log(`Reto 1 cumplido: ${reto1}`);
  } catch (error) {
    console.error('Error:', error);
  }
}

// Permitir ejecución directa o uso como módulo
if (require.main === module) {
  verificarReto1('/home/candidate/javascript_advanced.html');
}

module.exports = verificarReto1;

