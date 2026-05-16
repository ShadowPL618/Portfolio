
<?php
// Initialize default values for form persistence
$result = "";
$resultClass = "reminder";
$num1Value = $num2Value = "";
$selectedOperation = "add";

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['num1'], $_POST['num2'], $_POST['operation'])) {
    // Get and convert input values
    $num1 = floatval($_POST['num1']);
    $num2 = floatval($_POST['num2']);
    $num1Value = $_POST['num1'];
    $num2Value = $_POST['num2'];
    $selectedOperation = (array) $_POST['operation'];
    
    $resultClass = "";
    $resultsArray = [];

    // Perform calculations for each selected operation
    foreach ($selectedOperation as $operation) {
        switch ($operation) {
            case 'add':
                $resultsArray[] = "$num1 + $num2 = " . number_format($num1 + $num2, 2, '.', '');
                break;
            case 'subtract':
                $resultsArray[] = "$num1 - $num2 = " . number_format($num1 - $num2, 2, '.', '');
                break;
            case 'multiply':
                $resultsArray[] = "$num1 × $num2 = " . number_format($num1 * $num2, 2, '.', '');
                break;
            case 'divide':
                $resultsArray[] = $num2 != 0 
                    ? "$num1 ÷ $num2 = " . number_format($num1 / $num2, 2, '.', '') 
                    : "Error: Cannot divide by zero!";
                break;
            case 'power':
                $resultsArray[] = "$num1 ^ $num2 = " . number_format(pow($num1, $num2), 2, '.', '');
                break;
            case 'square root':
                $sqrt1 = $num1 >= 0 ? number_format(sqrt($num1), 2, '.', '') : "Error: Cannot calculate square root of negative number";
                $sqrt2 = $num2 >= 0 ? number_format(sqrt($num2), 2, '.', '') : "Error: Cannot calculate square root of negative number";
                $resultsArray[] = "√$num1 = $sqrt1<br>√$num2 = $sqrt2";
                break;
        }
    }

    $result = implode("<br>", $resultsArray);
    
    // Easter egg detection based on calculation results
    if (!empty($resultsArray)) {
        $easterEggs = [];
        
        foreach ($resultsArray as $resultLine) {
            preg_match('/= ([\d,.-]+)/', $resultLine, $matches);
            if (isset($matches[1])) {
                $numericResult = floatval(str_replace(',', '', $matches[1]));
                
                // Check for various easter egg triggers
                if ($num1 == 3.14 || $num1 == 3.1415 || $num2 == 3.14 || $num2 == 3.1415) $easterEggs[] = "Happy π Day! 🥧";
                if ($numericResult == 777) $easterEggs[] = "Jackpot! 🎰";
                if ($numericResult == 21) $easterEggs[] = "Yakuza's favorite number! 🎴";
                if ($numericResult == 2076) $easterEggs[] = "The future is now! Welcome to Night City. 🌃";
                if ($numericResult == 38) $easterEggs[] = "Welcome to the Lucky 38! 🎰";
                if ($numericResult == 2077) $easterEggs[] = "War... war never changes ☢️";
                if ($numericResult == 2247) $easterEggs[] = "Ave, true to Caesar!";
                if ($numericResult == 2277) $easterEggs[] = "2277 — The year Malpais became the Burned Man.";
                if ($numericResult == 2281) $easterEggs[] = "2281? Sounds like it's time to head to the Mojave.";
                if ($numericResult == 6) $easterEggs[] = "Courier Six — House's most trusted employee 🤖";
                if ($numericResult == 1899) $easterEggs[] = "I HAD A GODDAMN PLAN! 🤠";
                if ($numericResult == -216) $easterEggs[] = "Hannibal ad portas! 🐍🏛️";
            }
        }
        
        // Append easter eggs to results if any were triggered
        if (!empty($easterEggs)) {
            $result .= "<br><br><em style='color: #51002cff; font-size: 0.9em;'>" . implode("<br>", $easterEggs) . "</em>";
        }
    }
}

// Load HTML template
include(__DIR__ . "/templates/calculatorStructure.php");
?>