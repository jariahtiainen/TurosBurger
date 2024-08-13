<!DOCTYPE html>
<html>
<head>
<title>Turo's Burger</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url(kuva.jpeg);
  min-height: 90%;
}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: #fff;
  font-weight: bold;
  font-size: 24px; /* Adjusted size */
  transition: 0.6s ease;
  border-radius: 3px;
  background-color: rgba(0,0,0,0.5); /* Slightly transparent */
  text-shadow: 0px 0px 3px rgba(0,0,0,0.8); /* Adds a subtle shadow */
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px;
}

/* On hover, change background color */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #fff;
  font-size: 18px; /* Adjusted size */
  padding: 8px 16px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
  background-color: rgba(0,0,0,0.5); /* Background for readability */
}

/* Number text (1/3 etc) */
.numbertext {
  color: #fff;
  font-size: 14px; /* Adjusted size */
  padding: 8px 12px;
  position: absolute;
  top: 0;
  background-color: rgba(0,0,0,0.5); /* Background for readability */
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: 0.4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 768px) {
  .prev, .next, .text {font-size: 14px}
}

@media only screen and (max-width: 480px) {
  .prev, .next, .text {font-size: 12px}
}
</style>
</head>
<body>
    <!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>Powered by <a href="index.html" title="Kurpitsa Solutions" target="_blank" class="w3-hover-text-green">Kurpitsa Solutions</a></p>
</footer>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'] ?? '';
    $people = $_POST['People'] ?? '';
    $date = $_POST['date'] ?? '';
    $message = $_POST['Message'] ?? '';

    // Start HTML output
    echo '<!DOCTYPE html>
    <html lang="fi">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palautteen lähetys</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .message-container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: #000;
            color: #fff;
            padding: 10px;
            box-sizing: border-box;
        }
    </style>
    </head>
    <body>';

    // Display the appropriate message
    if (!empty($name) && !empty($people) && !empty($date) && !empty($message)) {
        echo '<div class="message-container">
            <h2>Viesti vastaanotettu!</h2>
        </div>';
    } elseif (empty($name) || empty($people) || empty($date) || empty($message)) {
        echo '<div class="message-container">
            <p>Kaikki kentät ovat pakollisia.</p>
        </div>';
    } else {
        echo '<div class="message-container">
            <p>Lomakkeen lähettäminen epäonnistui.</p>
        </div>';
    }

    // Footer
    echo '<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
        <p>Powered by <a href="index.html" title="Kurpitsa Solutions" target="_blank" class="w3-hover-text-green">Kurpitsa Solutions</a></p>
    </footer>';

    echo '</body>
    </html>';
}
?>
