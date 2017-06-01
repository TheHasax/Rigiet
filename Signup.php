<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Skriv dig op til en Rigiet Stabilizer - Rigiet - Optag dit liv som aldrig før</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/custom.css">
        <link href='//fonts.googleapis.com/css?family=Abel|Open+Sans' rel='stylesheet' type='text/css'>
    </head>
    <body>
         <div id="top_header" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a href="index.php"><img src="images/Rigiet Logo.png" alt=""/></a>
            <p class="pull-right">Kontakt: +45 12 34 56 78</p>
        </div>
        <?php
            // define variables and set to empty values
            $nameErr = $emailErr = $postnummerErr = "";
            $name = $email = $postnummer = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["name"])) {
                $nameErr = "Du skal intaste dit navn.";
              } else {
                $name = test_input($_POST["name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                  $nameErr = "Kun bogstaver og mellemrum"; 
                }
              }

              if (empty($_POST["email"])) {
                $emailErr = "Email er påkrævet";
              } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Ugyldigt Email format"; 
                }
              }
              
              if (empty($_POST["postnummer"])) {
                $postnummerErr = "Postnummer er påkrævet";
              } else {
                $postnummer = test_input($_POST["postnummer"]);
              }

              
            }

            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }

            ?>
        <div id="wrapperSU">
            <div class="filler col-lg-2 col-md-1"><img src="images/blank_br.png" alt=""/></div>
            <h2 class="col-lg-8 col-md-9">Fyld denne form ud, og bliv en af de første til at købe en Regiet.</h2>
            <div class="filler col-lg-2 col-md-1"><img src="images/blank_br.png" alt=""/></div>
            <div class="signupForm col-lg-5 col-md-6 col-sm-8 col-xs-12"><p><span class="error">* påkrævet.</span></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                    Navn: <input type="text" name="name" value="<?php echo $name;?>">
                    <span class="error">* <?php echo $nameErr;?></span>
                    <br><br>
                    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
                    <span class="error">* <?php echo $emailErr;?></span>
                    <br><br>
                    Postnummer: <input type="text" name="postnummer" value="<?php echo $postnummer;?>">
                    <span class="error">* <?php echo $postnummerErr;?></span>
                    <br><br>
                    <input type="submit" name="submit" value="Submit">  
                    <?php $to ="gaminghole@gmail.com";
            $subject = "New submition";
            $message = "$name $email $postnummer"; ?>
                </form>
            </div>

            <div class="submit col-lg-5 col-md-6 col-sm-8 col-xs-12">
                
                <h2>Tak for din tilmeldning.</h2>
                <br>
                <p>Du vil blive underrettet når du kan købe din Rigiet Stabilizator.
                <br>
                <p>Dette er den information du har sendt os:
                <br>
                <br>
                <?php echo $name; ?>
                <br>
                <?php echo $email; ?>
                <br>
                <?php echo $postnummer;?>
                
            </div>
        </div>
    </body>
</html>
