<?php
// Initialize variables to store conversion results
$euroResult = "";
$kgResult = "";
$cmResult = "";

// Check if the Euro/DKK converter form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['euro_converter'])) {
    // Get the amount entered by user
    $amount = floatval($_POST['euro_amount']);
    // Get which direction to convert (euro_to_dkk or dkk_to_euro)
    $direction = $_POST['euro_direction'];
    
    // Conversion rate: 1 Euro = 1.47 DKK
    if ($direction === 'euro_to_dkk') {
        // Convert Euro to Danish Krone
        $converted = $amount * 1.47;
        // Round to 2 decimal places and display result
        $euroResult = number_format($amount, 2) . " EUR = " . number_format($converted, 2) . " DKK";
    } else {
        // Convert Danish Krone to Euro
        $converted = $amount / 1.47;
        // Round to 2 decimal places and display result
        $euroResult = number_format($amount, 2) . " DKK = " . number_format($converted, 2) . " EUR";
    }
}

// Check if the Kg/Pounds converter form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kg_converter'])) {
    // Get the weight entered by user
    $weight = floatval($_POST['kg_amount']);
    // Get which direction to convert (kg_to_lbs or lbs_to_kg)
    $direction = $_POST['kg_direction'];
    
    // Conversion rate: 1 Kg = 2.20462 Pounds
    if ($direction === 'kg_to_lbs') {
        // Convert Kilograms to Pounds
        $converted = $weight * 2.20462;
        // Round to 2 decimal places and display result
        $kgResult = number_format($weight, 2) . " kg = " . number_format($converted, 2) . " lbs";
    } else {
        // Convert Pounds to Kilograms
        $converted = $weight / 2.20462;
        // Round to 2 decimal places and display result
        $kgResult = number_format($weight, 2) . " lbs = " . number_format($converted, 2) . " kg";
    }
}

// Check if the Cm/Inches converter form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cm_converter'])) {
    // Get the length entered by user
    $length = floatval($_POST['cm_amount']);
    // Get which direction to convert (cm_to_inches or inches_to_cm)
    $direction = $_POST['cm_direction'];
    
    // Conversion rate: 1 Inch = 2.54 Cm
    if ($direction === 'cm_to_inches') {
        // Convert Centimeters to Inches
        $converted = $length / 2.54;
        // Round to 2 decimal places and display result
        $cmResult = number_format($length, 2) . " cm = " . number_format($converted, 2) . " inches";
    } else {
        // Convert Inches to Centimeters
        $converted = $length * 2.54;
        // Round to 2 decimal places and display result
        $cmResult = number_format($length, 2) . " inches = " . number_format($converted, 2) . " cm";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Title -->
    <title>Converter</title>
    <!-- Author Information -->
    <meta name="author" content="<!-- Fill in: Your Name -->">
    <!-- Link to CSS stylesheet -->
    <link rel="stylesheet" href="css/calculator-styles.css">
</head>
<body>
    <!-- Navigation Bar -->
    <header>
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="converter.php" class="active">Converter</a></li>
                <li><a href="calculator.php">Calculator</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="page-container converter-page">
        <!-- Page Heading -->
        <h1>Unit Converters</h1>
        
        <!-- Converter Container -->
        <div class="converters-container">
            
            <!-- Euro/DKK Converter -->
            <div class="converter-box">
                <h2>Currency Converter</h2>
                <p class="converter-info">Euro ↔ Danish Krone</p>
                
                <!-- Form for Euro/DKK conversion -->
                <form method="POST" action="converter.php">
                    <!-- Hidden field to identify which converter was used -->
                    <input type="hidden" name="euro_converter" value="1">
                    
                    <!-- Input for amount -->
                    <label for="euro_amount">Amount:</label>
                    <input type="number" step="0.01" name="euro_amount" id="euro_amount" required>
                    
                    <!-- Dropdown to select conversion direction -->
                    <label for="euro_direction">Convert:</label>
                    <select name="euro_direction" id="euro_direction">
                        <option value="euro_to_dkk">EUR to DKK</option>
                        <option value="dkk_to_euro">DKK to EUR</option>
                    </select>
                    
                    <!-- Submit button -->
                    <button type="submit">Convert</button>
                </form>
                
                <!-- Display result if available -->
                <?php if ($euroResult): ?>
                    <div class="converter-result">
                        <?php echo $euroResult; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Kg/Pounds Converter -->
            <div class="converter-box">
                <h2>Weight Converter</h2>
                <p class="converter-info">Kilograms ↔ Pounds</p>
                
                <!-- Form for Kg/Pounds conversion -->
                <form method="POST" action="converter.php">
                    <!-- Hidden field to identify which converter was used -->
                    <input type="hidden" name="kg_converter" value="1">
                    
                    <!-- Input for weight -->
                    <label for="kg_amount">Weight:</label>
                    <input type="number" step="0.01" name="kg_amount" id="kg_amount" required>
                    
                    <!-- Dropdown to select conversion direction -->
                    <label for="kg_direction">Convert:</label>
                    <select name="kg_direction" id="kg_direction">
                        <option value="kg_to_lbs">Kg to Pounds</option>
                        <option value="lbs_to_kg">Pounds to Kg</option>
                    </select>
                    
                    <!-- Submit button -->
                    <button type="submit">Convert</button>
                </form>
                
                <!-- Display result if available -->
                <?php if ($kgResult): ?>
                    <div class="converter-result">
                        <?php echo $kgResult; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Cm/Inches Converter -->
            <div class="converter-box">
                <h2>Length Converter</h2>
                <p class="converter-info">Centimeters ↔ Inches</p>
                
                <!-- Form for Cm/Inches conversion -->
                <form method="POST" action="converter.php">
                    <!-- Hidden field to identify which converter was used -->
                    <input type="hidden" name="cm_converter" value="1">
                    
                    <!-- Input for length -->
                    <label for="cm_amount">Length:</label>
                    <input type="number" step="0.01" name="cm_amount" id="cm_amount" required>
                    
                    <!-- Dropdown to select conversion direction -->
                    <label for="cm_direction">Convert:</label>
                    <select name="cm_direction" id="cm_direction">
                        <option value="cm_to_inches">Cm to Inches</option>
                        <option value="inches_to_cm">Inches to Cm</option>
                    </select>
                    
                    <!-- Submit button -->
                    <button type="submit">Convert</button>
                </form>
                
                <!-- Display result if available -->
                <?php if ($cmResult): ?>
                    <div class="converter-result">
                        <?php echo $cmResult; ?>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
    </main>
</body>
</html>