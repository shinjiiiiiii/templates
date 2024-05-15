<?php
ob_start();
?>

<section class="joueur">
    <h2>Tirage</h1>
        <p>Liste des equipes:</p>


        <table border="1">
            <thead>
                <tr>
                    <th></th>
                    <th>Joueur 1</th>
                    <th>Joueur 2</th>
                    <th>Score</th>
                    <th>Joueur 3</th>
                    <th>Joueur 4</th>
                    <th>Score</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Partie</td>
                    <td>Faf de Klerk</td>
                    <td>leon Marchand</td>
                    <td><input type="number" min="0" max="13"></td>
                    <td>Carlos Sainz</td>
                    <td>Jesper Tjäder </td>
                    <td><input type="number" min="0" max="13"></td>
                    <td><button>Valider</button></td>
                </tr>
            </tbody>

        </table>

        <?php
        foreach ($tirages as $key => $value) {
            var_dump($value);
            ?>
                
        <?php
        }
        ?>
        
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
