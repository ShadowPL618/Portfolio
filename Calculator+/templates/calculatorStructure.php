<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Title -->
    <title>Calculator</title>
    <!-- Author Information -->
    <meta name="author" content="<!-- Fill in: Your Name -->">
    <!-- Link to CSS stylesheet -->
    <link rel="stylesheet" href="css/calculator-styles.css">
</head>
<body>
    <!-- Navigation Bar - Links to all pages -->
    <header>
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="converter.php">Converter</a></li>
                <li><a href="calculator.php" class="active">Calculator</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Calculator Content -->
    <main class="calculator-page-wrapper">
        <!-- Calculator Container -->
        <div class="calculator">
            <!-- Calculator Title -->
            <h1>Advanced Calculator</h1>

            <!-- Calculator Form -->
            <form method="POST" action="calculator.php">
                
                <!-- Number Input Section -->
                <div class="input-section">
                    <!-- Labels for the two number inputs -->
                    <div class="input-labels">
                        <span class="input-label">First Number</span>
                        <span class="input-label">Second Number</span>
                    </div>

                    <!-- Two number input boxes side by side -->
                    <div class="number-inputs">
                        <input 
                            type="number" 
                            name="num1" 
                            step="any" 
                            value="<?php echo htmlspecialchars($num1Value); ?>" 
                            placeholder="0" 
                            required>
                        <input 
                            type="number" 
                            name="num2" 
                            step="any" 
                            value="<?php echo htmlspecialchars($num2Value); ?>" 
                            placeholder="0" 
                            required>
                    </div>
                </div>

                <!-- Operation Selection Section -->
                <div class="operation-container">
                    <div class="operation-label">Select Operation(s):</div>
                    
                    <!-- Grid of operation checkboxes styled as buttons -->
                    <div class="operation-grid">
                        <!-- Addition -->
                        <label class="operation-option <?php echo in_array('add', (array)$selectedOperation) ? 'active' : ''; ?>">
                            <input type="checkbox" name="operation[]" value="add" 
                                <?php echo in_array('add', (array)$selectedOperation) ? 'checked' : ''; ?>>
                            <span>Add</span>
                        </label>

                        <!-- Subtraction -->
                        <label class="operation-option <?php echo in_array('subtract', (array)$selectedOperation) ? 'active' : ''; ?>">
                            <input type="checkbox" name="operation[]" value="subtract" 
                                <?php echo in_array('subtract', (array)$selectedOperation) ? 'checked' : ''; ?>>
                            <span>Subtract</span>
                        </label>

                        <!-- Multiplication -->
                        <label class="operation-option <?php echo in_array('multiply', (array)$selectedOperation) ? 'active' : ''; ?>">
                            <input type="checkbox" name="operation[]" value="multiply" 
                                <?php echo in_array('multiply', (array)$selectedOperation) ? 'checked' : ''; ?>>
                            <span>Multiply</span>
                        </label>

                        <!-- Division -->
                        <label class="operation-option <?php echo in_array('divide', (array)$selectedOperation) ? 'active' : ''; ?>">
                            <input type="checkbox" name="operation[]" value="divide" 
                                <?php echo in_array('divide', (array)$selectedOperation) ? 'checked' : ''; ?>>
                            <span>Divide</span>
                        </label>

                        <!-- Power -->
                        <label class="operation-option <?php echo in_array('power', (array)$selectedOperation) ? 'active' : ''; ?>">
                            <input type="checkbox" name="operation[]" value="power" 
                                <?php echo in_array('power', (array)$selectedOperation) ? 'checked' : ''; ?>>
                            <span>Power</span>
                        </label>

                        <!-- Square Root -->
                        <label class="operation-option <?php echo in_array('sqrt', (array)$selectedOperation) ? 'active' : ''; ?>">
                            <input type="checkbox" name="operation[]" value="sqrt" 
                                <?php echo in_array('sqrt', (array)$selectedOperation) ? 'checked' : ''; ?>>
                            <span>Square root</span>
                        </label>
                    </div>
                </div>

                <!-- Calculate Button -->
                <button type="submit" class="calculate-btn">Calculate</button>
            </form>

            <!-- Result Display Area -->
            <div class="result <?php echo $resultClass; ?>">
                <?php 
                // If there's a result, display it. Otherwise show reminder message
                if ($result) {
                    echo $result;
                } else {
                    echo "Enter numbers and select operation(s)";
                }
                ?>
            </div>
        </div>
    </main>

    <!-- JavaScript to handle operation button toggling -->
    <script>
    document.querySelectorAll('.operation-option').forEach(option => {
        option.addEventListener('click', () => {
        const checkbox = option.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked;
        option.classList.toggle('active', checkbox.checked);
        });
    });
</script>

</body>
</html>