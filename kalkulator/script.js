let currentInput = '';

function appendNumber(number) {
    currentInput += number;
    document.getElementById('display').value = currentInput;
}

function appendOperator(operator) {
    currentInput += ' ' + operator + ' ';
    document.getElementById('display').value = currentInput;
}

function clearDisplay() {
    currentInput = '';
    document.getElementById('display').value = currentInput;
}

function calculate() {
    try {
        let result = eval(currentInput);
        document.getElementById('display').value = result;
        currentInput = result;
        saveCalculation(currentInput);
    } catch (e) {
        document.getElementById('display').value = 'Error';
        currentInput = '';
    }
}

function saveCalculation(result) {
    let historyList = document.getElementById('history-list');
    let newHistoryItem = document.createElement('li');
    newHistoryItem.textContent = result;
    historyList.appendChild(newHistoryItem);
}

function toggleMode() {
    document.body.classList.toggle('dark-mode');
}

