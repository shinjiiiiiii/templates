<?php
ob_start();
?>

<section class="joueur">
    <h2>Joueur</h1>



        <?php
        foreach ($tournoi as $key => $value) {
            ?>
            <p>Tournoi
                <?php echo escape($value->getName()) ?> à la date du
                <?php echo escape($value->getDate()) ?> En
                <?php echo escape($value->getNombre_parti()) ?> parties, tirage au sort: Mélée
            </p>
         

        <form action="/tournoi/<?php echo escape($value->getName()) ?>/tirage " method="post">
        <input type="hidden" name="name_tournoi" value="<?php echo escape($value->getName()) ?>">
        <input type="hidden" name="id_tournoi" value="<?php echo escape($value->getId()) ?>">
        <input type="hidden" name="parti" value="<?php echo escape($value->getNombre_parti()) ?>">
        <?php
        }
        ?>
            <p> Sélectionnez les joueurs à ajouter au tournoi:
                <label for="doublette">doublette</label>
                <input type="radio" id="doublette" name="type" value="doublette">
                <label for="triplette">triplette</label>
                <input type="radio" id="triplette" name="type" value="triplette">
                <button>TIRAGE !</button>
            </p>

            <table border="1">
                <thead>
                    <tr>
                        <th>Nom - Prénom</th>
                        <th>Sexe</th>
                        <th>Sélection</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($joueurs as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo escape($value->getName()) ?> <?php echo escape($value->getPrenom()) ?></td>
                            <td><?php echo escape($value->getSexe()) ?></td>
                            <td><input type="checkbox" name="check[]" value="<?php echo escape($value->getId()) ?>"></td>
                        </tr>
                        <?php
                    }
                    ?>
                        
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td> <p style="margin-left: 30px;">Tous</p></td>
                    </tr>
                </tfoot>
            </table>
            </form>
            <input type="checkbox" name="check[]" id="box" onClick="checkAll(this)">


        <form action="joueur/store" method="post">
            <p>Nouveau joueur:</p>
            <label for="name">Nom:</label>
            <input type="text" name="name" id="name"> <br>
            <label for="prenom">prénom:</label>
            <input type="text" name="prenom" id="prenom"> <br>
            <p>Sexe :
                <label for="M">M</label>
                <input type="radio" id="M" name="sexe" value="M">
                <label for="F">F</label>
                <input type="radio" id="F" name="sexe" value="F">
            </p>

            <?php
            foreach ($tournoi as $key => $value) {
                ?>
                <input type="hidden" name="tournoi" value="<?php echo escape($value->getName()) ?>">
                <?php
            }
            ?>


            <button>Cree</button>
        </form>
</section>

<script>
    function checkAll(source) {
        checkboxes = document.getElementsByName('check[]');
        for (let i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }


</script>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
