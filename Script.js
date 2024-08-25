// scripts.js
let display = document.getElementById('display');
let currentInput = '0';
let shouldResetDisplay = false;

function updateDisplay() {
    display.innerText = currentInput;
}

function clearDisplay() {
    currentInput = '0';
    shouldResetDisplay = false;
    updateDisplay();
}

function deleteLast() {
    if (currentInput.length === 1) {
        currentInput = '0';
    } else {
        currentInput = currentInput.slice(0, -1);
    }
    updateDisplay();
}

function appendNumber(number) {
    if (shouldResetDisplay) {
        currentInput = '';
        shouldResetDisplay = false;
    }

    if (currentInput === '0' && number !== '.') {
        currentInput = number.toString();
    } else {
        currentInput += number.toString();
    }
    updateDisplay();
}

function appendOperator(operator) {
    if (shouldResetDisplay) {
        shouldResetDisplay = false;
    }
    const lastChar = currentInput.slice(-1);
    if (['+', '-', '*', '/'].includes(lastChar)) {
        currentInput = currentInput.slice(0, -1);
    }
    currentInput += operator;
    updateDisplay();
}

function calculate() {
    try {
        currentInput = eval(currentInput).toString();
    } catch {
        currentInput = 'Error';
    }
    shouldResetDisplay = true;
    updateDisplay();
}
