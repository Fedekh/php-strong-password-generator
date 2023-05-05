<?php
include_once __DIR__ . '/functions.php';     // includo il file functions.php

$pass = '';                                 // variabile vuota per la lunghezza della password
$password = '';                             // variabile vuota per la password da generare
$error_message = '';                        // variabile vuota per il messaggio di errore
                
$word= $_GET['words'];                      // variabile per la scelta delle lettere
$number= $_GET['numbers'];                  // variabile per la scelta dei numeri
$symbol= $_GET['symbols'];                  // variabile per la scelta dei simboli
$yes= $_GET['yes'];                         // variabile per la scelta delle ripetizioni
$no= $_GET['no'];          


if (isset($_GET['user-password'])) {                                                         // se è settata la variabile
    if (intval($_GET['user-password']) >= 8 && ($word !== null || $number !== null || $symbol !== null || $yes !== null || $no !== null)) {                                                   // se la lunghezza della password è maggiore o uguale a 8
        $pass = intval($_GET['user-password']);
        $password = create_password($pass,$word,$number,$symbol,$yes,$no);
        // var_dump($password);
    } elseif ($word === null && $number === null && $symbol === null && $yes === null && $no === null) { 
        $error_message ='Seleziona almeno una opzione, e definisci lunghezza password';    
    } elseif (intval($_GET['user-password']) < 8 && intval($_GET['user-password']) > 0) {      // se la lunghezza della password è minore di 8 e maggiore di 0
        $error_message = 'Password troppo corta';                                               //intval trasforma la stringa in numero come parseInt in JS
    } else {
        $error_message = 'Lunghezza non inserita';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./css/style.css">

    <title>STRONG PASSWORD GENERATOR</title>
</head>

<body class="text-white">

    <div class="wrapper d-flex my-5 justify-content-center text-center align-items-center">
        <div class="ms_container d-flex-column">

            <header class="title text-center">
                <h1 class="py-2">Strong Generator Password</h1>
                <h2 class="py-2">Generatore di password</h2>
            </header>


            <!-- MAIN SECTION -->
            <section class="mt-4 rounded py-4">
                <form method="GET" action="index.php">
                    <div class="input-field d-flex flex-column align-items-center">
                        <label class="long" for="long">Inserisci la lunghezza password desiderata, almeno 8 caratteri:</label>
                        <input id="long" name="user-password" class="rounded border-0 my-3 w-25" type="text">
                    </div>


                    <!--  BONUS -->
                    <div class="bonus-choice my-4 d-flex justify-content-between">

                        <div class="typing">
                            <h3 class="long">Scegli cosa vuoi includere : </h3>

                            <label for="words">Lettere</label> <input type="checkbox" name="words" > <br>
                            <label for="numbers">Numeri</label> <input type="checkbox" name="numbers"> <br>
                            <label for="symbols">Simboli</label> <input type="checkbox" name="symbols">
                        </div>


                        <div class="ripetizioni d-flex flex-column">

                            <h3 class="long">Consenti ripetizioni caratteri ?</h3>

                            <div class="yes">
                                <label for="yes">Si</label>
                                <input type="radio" name="yes" id="yes" value='true'>
                            </div>

                            <div class="no">
                                <label for="no">No</label>
                                <input type="radio" name="no" id="no" value='false'>
                            </div>
                        </div>
                    </div>
                    <!-- / BONUS -->



                    <!-- BUTTON SUBMIT & RESET -->
                    <div class="buttons my-5 mx-auto text-center">
                        <button type="submit" class="btn btn-success align-self">INVIA</button>
                        <button type="button" class="btn mx-3 btn-danger align-self"><a href="index.php">RESET</a></button>
                    </div>
                    <!-- /BUTTON SUBMIT & RESET -->

                </form>


                <!-- RESULT PASSWORD -->
                <div class="password text-center">
                    <h5 class="rounded border-0">
                        <?php echo $error_message; ?>
                    </h5>
                </div>
                <!-- /RESULT PASSWORD -->

            </section>
            <!-- /MAIN SECTION -->

        </div>
</body>

</html>