<?php
$pass = '';
if (isset($_GET['user-password'])) {
    if (strlen($_GET['user-password']) >= 8) {
        $pass = $_GET['user-password'];
        echo $pass;
    }
    else {
        echo 'Password troppo corta';
    }
}

var_dump($pass);
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

            <div class="title text-center">
                <h1 class="py-2">Strong Generator Password</h1>
                <h2 class="py-2">Generatore di password</h2>
            </div>

            <div class="mt-4 rounded py-4">
                <form method="GET" action="index.php">
                    <div class="input-field d-flex flex-column align-items-center">
                        <label class="long" for="long">Inserisci la lunghezza password desiderata:</label>
                        <input id="long" name="user-password" class="rounded border-0 my-3 w-25" type="text">
                    </div>
                    <div class="buttons my-5 mx-auto text-center">
                        <button type="submit" class="btn btn-primary align-self">Invia</button>
                        <button type="button" class="btn mx-3 btn-danger align-self"><a href="index.php">RESET</a></button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</body>

</html>