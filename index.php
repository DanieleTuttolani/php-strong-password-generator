<?php
// $seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789!@#$%^&*()');
// shuffle($seed);
// $rand = '';
// foreach (array_rand($seed, 10) as $i) $rand .= $seed[$i];
// echo $rand

if(isset($_GET['number'])){
    $numero = $_GET['number'];
}else {
    $numero = '3';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <div class="container text-center">
        <div class="app-wrapper">

            <h1>Password generator super ganzo</h1>
            <h2>Creiamo un password tutta per te!</h2>
            
            <div class="main-wrapper d-flex justify-content-between p-5">
                <p>Seleziona una lungezza per la tua password:</p>
                
                <form action="index.php" method="GET">
                    <input type="number" class="form-control" min='4' max='15' name="number" value="<?= $numero ?>" >
                </form>

                <?php if(isset($_GET['number'])) : ?>
                    <p>
                    la password :
                        <?php 
                            session_start();
                            $root = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789@()#$%!&*');
                            shuffle($root);
                            $random= '';
                            foreach(array_rand($root, $numero) as $i) $random .= $root[$i];
                            $_SESSION['password'] = $random;
                            header('Location: components/result.php')
                        ?>
                    </p>
                <?php endif; ?>
                
            </div>
                <?php 
                    var_dump($numero)
                ?>
        </div>
    </div>
</body>
</html>