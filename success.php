<?php
session_start();

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
    <title>SUCCESSSSS</title>
</head>

<body>
    <div class="container result text-center w-50 rounded my-5 py-5">

        <h4 class="user-password w-50 mx-auto rounded my-5 pt-5">La password consigliata è:
            <p class="pt-5 success text-center mx-auto">
                <?php echo $_SESSION['password'] ?>
            </p>
        </h4>

        <button type="button" class="btn my-5 btn-danger align-self"><a href="index.php">RESET</a></button>
    </div>
</body>

</html>