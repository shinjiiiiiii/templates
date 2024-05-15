<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>—Mélée —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">

</head>

<body>
    <header class="header">
        <h1>Pétanque en mélée</h1>
        <nav>

            <div class="hoverLink">
                <a href="">Connexion</a>
            </div>
            <div class="hoverLink">
                <a href="/tournoi">Tournoi</a>
            </div>

            <?php
            if (isset($joueurs)) {
                ?>
                <div class="hoverLink">
                    <a href="">Joueur</a>
                </div>
                <?php
            }
            ?>



            <div class="hoverLink">
                <a href="">Tirage</a>
            </div>

            <div class="hoverLink">
                <a href="">Score</a>
            </div>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>
</body>

</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
