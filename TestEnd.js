#!/usr/bin/env node

const puppeteer = require('puppeteer');

async function testHTML() {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();

    // Capturar la salida de la consola del navegador y mostrarla en la consola de Node.js
    page.on('console', msg => console.log('PAGE LOG:', msg.text()));

    // Cambia 'path/to/your/file.html' al camino correcto donde tienes tu archivo HTML
    await page.goto('file:/home/candidate/javascript_advancedtest.html');

    // Esperar suficiente tiempo para ver los resultados de las promesas
    await page.waitForTimeout(3000);

    await browser.close();
}

testHTML();
