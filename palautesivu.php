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
<div class="logo-container">
    <a href="index.html">
        <img src="logo.png" alt="Turo's Burger Logo" class="logo">
    </a>
    </div>


</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lomaketiedot
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
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
            font-family: "Amatic SC", sans-serif;
            font-size: 1.3em;
            
        }
        body {
            width: 100%;
            background-image: url(palautesivu_tausta.png); 
            background-size: cover;
            background-repeat: no-repeat;
        }
        .message-container {
            text-align-last: center;
            padding: 10px;
            color: #fff; 
            font-size: 1em; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); 
            background-color: transparent; 
        }

        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #444;
        }
        .logo-container {
    position: fixed; /* Fixes the position of the logo */
    top: 10px; /* Distance from the top */
    left: 10px; /* Distance from the left */
    z-index: 1000; /* Ensures the logo stays on top of other elements */
}

.logo {
    width: 100px; /* Adjust the width as needed */
    height: auto; /* Maintains the aspect ratio */
}

    </style>
    </head>
    <body>';

    // Sähköposti-ilmotus sivuston ylläpitäjälle
    $to = "turosburger1@gmail.com";  // Laittakaa tähän ylläpitäjän sähköpostiosoite
    $subject = "Uusi yhteydenotto: $name";
    $body = "Nimi: $name\nSähköposti: $email\nViesti:\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Vastaanottajalle menevä sähköposti-ilmoitus
    if (mail($to, $subject, $body, $headers)) {
        // Vahvistusviesti vastaanotajalle
        $confirmationSubject = "Kiitos yhteydenotostasi!";
        $confirmationBody = "Hei $name,\n\nKiitos yhteydenotosta! \n\nOlemme yhteydessä tarvittaessa.\nTurosBurger";
        $confirmationHeaders = "From: turosburger1@gmail.com\r\n";  // tämä muutetaan myös ylläpitäjän osoitteeksi.

        // Lähetä vahvistusviesti
        mail($email, $confirmationSubject, $confirmationBody, $confirmationHeaders);

        echo '<div class="message-container">
                <h2>Kiitos, ' . $name . '</h2>
                <p>Yhteydenottosi on toimitettu onnistuneesti!</p>
                <a href="index.html" class="back-button">Takaisin etusivulle</a>
              </div>';
    } else {
        echo '<div class="message-container">
                <h2>Virhe</h2>
                <p>Pahoittelut, jokin meni pieleen. Yritä uudelleen.</p>
                <a href="index.html" class="back-button">Takaisin etusivulle</a>
              </div>';
    }

    

    echo '</body>
    </html>';
}
?>
