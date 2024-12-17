<?php
session_start();

// Menyimpan riwayat perhitungan dalam session
if (isset($_POST['clearHistory'])) {
    unset($_SESSION['history']);
}

if (isset($_POST['calculation'])) {
    $calculation = $_POST['calculation'];
    $result = eval("return $calculation;");
    $_SESSION['history'][] = "$calculation = $result";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Analog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="calculator">
        <div id="mode-toggle">
            <button id="toggleMode" onclick="toggleMode()">Mode Gelap/Terang</button>
        </div>
        <div id="calculator-screen">
            <input type="text" id="display" disabled>
        </div>
        <div id="buttons">
            <button onclick="appendNumber(7)">7</button>
            <button onclick="appendNumber(8)">8</button>
            <button onclick="appendNumber(9)">9</button>
            <button onclick="appendOperator('+')">+</button>
            <button onclick="appendNumber(4)">4</button>
            <button onclick="appendNumber(5)">5</button>
            <button onclick="appendNumber(6)">6</button>
            <button onclick="appendOperator('-')">-</button>
            <button onclick="appendNumber(1)">1</button>
            <button onclick="appendNumber(2)">2</button>
            <button onclick="appendNumber(3)">3</button>
            <button onclick="appendOperator('*')">*</button>
            <button onclick="appendNumber(0)">0</button>
            <button onclick="clearDisplay()">C</button>
            <button onclick="calculate()">=</button>
            <button onclick="appendOperator('/')">/</button>
        </div>
        <div id="history">
            <h3>Riwayat:</h3>
            <ul id="history-list">
                <?php
                if (isset($_SESSION['history'])) {
                    foreach ($_SESSION['history'] as $entry) {
                        echo "<li>$entry</li>";
                    }
                }
                ?>
            </ul>
            <form method="POST">
                <button type="submit" name="clearHistory">Hapus Riwayat</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
