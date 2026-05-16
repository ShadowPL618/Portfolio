<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page Title -->
    <title>Projects</title>
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
                <li><a href="projects.php" class="active">Projects</a></li>
                <li><a href="converter.php">Converter</a></li>
                <li><a href="calculator.php">Calculator</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="page-container projects-page">
        <!-- Page Heading -->
        <h1>My Projects</h1>
        
        <!-- Project 1 -->
        <article class="project-card">
            <h2>Calculator++</h2>
            <p class="project-subject"><strong>Subject: WEB</strong></p>
            
            <!-- Project Description -->
            <p class="project-description">
                Expand the basic calculator by adding more advanced functionalities like converter, home, projects and forms pages. Use PHP to handle calculations and form submissions, and enhance the user interface with CSS for a better user experience.
            </p>
            
            <!-- Project Images -->
            <div class="project-images">
                <img src="assets/WEB1.jpg">
                <img src="assets/WEB2.jpg">
            </div>
            
            <!-- Things Learned -->
            <div class="project-learnings">
                <h3>What I Learned:</h3>
                <ul>
                    <li>How to design and structure a multi-page website with navigation and consistent styling using HTML and CSS.</li>
                    <li>How to improve UX through layout design, button styling, and responsive formatting.</li>
                    <li>How to structure a project for scalability, so new pages or features can be added without breaking existing functionality.</li>
                </ul>
            </div>
        </article>

        <!-- Project 2 -->
        <article class="project-card">
            <h2>BikeLightExtended</h2>
            <p class="project-subject"><strong>Subject: EBSY</strong></p>
            
            <!-- Project Description -->
            <p class="project-description">
                For embedded systems, I created a bike lamp that 7 modes changebale with the click of a button. The lamp features multiple lighting modes, including steady and flashing, left to right and many more. It is powered by a arduino board. The project involved programming a microcontroller to read sensor data and control the LED and RGB output accordingly.
            </p>
            
            <!-- Project Images -->
            <div class="project-images">
                <img src="assets/EBSY1.jpg">
                <img src="assets/EBSY2.jpg">
            </div>
            
            <!-- Things Learned -->
            <div class="project-learnings">
                <h3>What I Learned:</h3>
                <ul>
                    <li>How to program an Arduino microcontroller to respond to button inputs and control multiple LEDs.</li>
                    <li>How to implement state machines or mode switching in embedded systems programming.</li>
                    <li>How to troubleshoot with the mode change so it is smooth and clean.</li>
                </ul>
            </div>
        </article>

        <!-- Project 3 -->
        <article class="project-card">
            <h2>MysteryNumber</h2>
            <p class="project-subject"><strong>Subject: APPR</strong></p>
            
            <!-- Project Description -->
            <p class="project-description">
                A simple number guessing game where the user has to guess a randomly generated number within a certain range. The game provides feedback on whether the guess is too high, too low, or correct.
            </p>
            
            <!-- Project Images -->
            <div class="project-images">
                <img src="assets/APPR1.jpg">
                <img src="assets/APPR2.jpg">
            </div>
            
            <!-- Things Learned -->
            <div class="project-learnings">
                <h3>What I Learned:</h3>
                <ul>
                    <!-- Fill in: Add three things you learned -->
                    <li>How to use random number generation and conditional statements in programming logic.</li>
                    <li>How to handle user input validation and provide feedback in a clear way.</li>
                    <li>How to make the program more engaging by adding loops and replay options, allowing the user to play multiple rounds without restarting the app.</li>
                </ul>
            </div>
        </article>
    </main>
</body>
</html>