<?php
// Initialize variables to store form data
$formSubmitted = false;
$errors = [];
$formData = [];

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formSubmitted = true;
    
    // Validate Gender field
    if (empty($_POST['gender'])) {
        $errors[] = "Please select your gender";
    } else {
        $formData['gender'] = htmlspecialchars($_POST['gender']);
    }
    
    // Validate First Name field (required)
    if (empty($_POST['firstname'])) {
        $errors[] = "First name is required";
    } else {
        $formData['firstname'] = htmlspecialchars($_POST['firstname']);
    }
    
    // Validate Last Name field (required)
    if (empty($_POST['lastname'])) {
        $errors[] = "Last name is required";
    } else {
        $formData['lastname'] = htmlspecialchars($_POST['lastname']);
    }
    
    // Validate Email field (required)
    if (empty($_POST['email'])) {
        $errors[] = "Email address is required";
    } else {
        $formData['email'] = htmlspecialchars($_POST['email']);
    }
    
    // Validate Website field (required)
    if (empty($_POST['website'])) {
        $errors[] = "Favourite website is required";
    } else {
        $formData['website'] = htmlspecialchars($_POST['website']);
    }
    
    // Validate Birthday fields (required)
    if (empty($_POST['birth_day']) || empty($_POST['birth_month']) || empty($_POST['birth_year'])) {
        $errors[] = "Complete birthday (day, month, year) is required";
    } else {
        $formData['birth_day'] = htmlspecialchars($_POST['birth_day']);
        $formData['birth_month'] = htmlspecialchars($_POST['birth_month']);
        $formData['birth_year'] = htmlspecialchars($_POST['birth_year']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Title -->
    <title>Contact</title>
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
                <li><a href="converter.php">Converter</a></li>
                <li><a href="calculator.php">Calculator</a></li>
                <li><a href="contact.php" class="active">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="page-container contact-page">
        <!-- Page Heading -->
        <h1>Contact Me</h1>
        
        <!-- Contact Form Container -->
        <div class="contact-form-container">
            
            <!-- Display Error Messages if any -->
            <?php if ($formSubmitted && !empty($errors)): ?>
                <div class="error-messages">
                    <h3>Please fix the following errors:</h3>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Contact Form (only show if not successfully submitted) -->
            <?php if (!$formSubmitted || !empty($errors)): ?>
                <form method="POST" action="contact.php" class="contact-form">
                    
                    <!-- Gender Selection (required) -->
                    <div class="form-group">
                        <label for="gender">Gender: <span class="required">*</span></label>
                        <select name="gender" id="gender" required>
                            <option value="">-- Select Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Female">Other</option>
                        </select>
                    </div>

                    <!-- First Name (required) -->
                    <div class="form-group">
                        <label for="firstname">First Name: <span class="required">*</span></label>
                        <input type="text" name="firstname" id="firstname" required>
                    </div>

                    <!-- Last Name (required) -->
                    <div class="form-group">
                        <label for="lastname">Last Name: <span class="required">*</span></label>
                        <input type="text" name="lastname" id="lastname" required>
                    </div>

                    <!-- Email (required) -->
                    <div class="form-group">
                        <label for="email">Email Address: <span class="required">*</span></label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <!-- Favourite Website (required) -->
                    <div class="form-group">
                        <label for="website">Favourite Website: <span class="required">*</span></label>
                        <input type="url" name="website" id="website" placeholder="https://example.com" required>
                    </div>

                    <!-- Birthday (required) -->
                    <div class="form-group">
                        <label>Birthday: <span class="required">*</span></label>
                        <div class="birthday-inputs">
                            <!-- Day Input -->
                            <div class="birthday-field">
                                <label for="birth_day">Day:</label>
                                <input type="number" name="birth_day" id="birth_day" min="1" max="31" placeholder="DD" required>
                            </div>
                            <!-- Month Input -->
                            <div class="birthday-field">
                                <label for="birth_month">Month:</label>
                                <input type="number" name="birth_month" id="birth_month" min="1" max="12" placeholder="MM" required>
                            </div>
                            <!-- Year Input -->
                            <div class="birthday-field">
                                <label for="birth_year">Year:</label>
                                <input type="number" name="birth_year" id="birth_year" min="1900" max="2025" placeholder="YYYY" required>
                            </div>
                        </div>
                    </div>

                    <!-- Form Buttons -->
                    <div class="form-buttons">
                        <!-- Submit Button -->
                        <button type="submit" class="submit-btn">Submit</button>
                        <!-- Reset Button -->
                        <button type="reset" class="reset-btn">Reset</button>
                    </div>

                    <!-- Required Field Notice -->
                    <p class="required-notice"><span class="required">*</span> indicates required field</p>
                </form>
            <?php endif; ?>

            <!-- Display Submitted Data if successful -->
            <?php if ($formSubmitted && empty($errors)): ?>
                <div class="success-message">
                    <h3>Thank you for your submission!</h3>
                    <p>Here is the information you provided:</p>
                    <ul class="submitted-data">
                        <li><strong>Gender:</strong> <?php echo $formData['gender']; ?></li>
                        <li><strong>First Name:</strong> <?php echo $formData['firstname']; ?></li>
                        <li><strong>Last Name:</strong> <?php echo $formData['lastname']; ?></li>
                        <li><strong>Email:</strong> <?php echo $formData['email']; ?></li>
                        <li><strong>Favourite Website:</strong> <a href="<?php echo $formData['website']; ?>" target="_blank"><?php echo $formData['website']; ?></a></li>
                        <li><strong>Birthday:</strong> <?php echo $formData['birth_day'] . "/" . $formData['birth_month'] . "/" . $formData['birth_year']; ?></li>
                    </ul>
                    <a href="contact.php" class="new-submission-btn">Submit Another Form</a>
                </div>
            <?php endif; ?>

            
        </div>
    </main>
</body>
</html>