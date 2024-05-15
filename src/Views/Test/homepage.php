<?php
ob_start();
?>

<section class="menu">
    <h2>Tournoi</h1>

    
        
        <form action="store" method="post">
        <label for="select"> Choissisez un tournoi :</label> 
        <select name="select" id="select">
            <option disabled selected>Selectionnez</option>
            <?php 
                foreach ($tournois as $key => $value) {
                    
                    ?>
                        <option value="<?php echo escape($value->getName())?>"><?php echo escape($value->getName())?></option>
                    <?php
                }
            
            
            ?>
        </select>
        <p>ou</p>
        <p>Créez un tournoi:</p>
        <label for="name">Nom:</label>
        <input type="text" name="name" id="name"> <br>
        <label for="date">Date:</label>
        <input type="date" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" name="date"><br> 
        <label for="partie">Nombre de partie: </label>
        <input type="number" name="parti" id="partie" min="1" value="1"><br>
        <button>GO</button>
    </form>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
