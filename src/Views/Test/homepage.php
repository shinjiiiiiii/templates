<?php
ob_start();
?>

<section class="menu">
    
<h1>Todo ajax Test</h1>
<input type="text" placeholder="errgth" name="content" id="input01">
<button id="01">Ok</button>
<div id="list">

    <?php 
    foreach ($Test as $key => $value) {
       ?>
            <p><?php echo escape($value->getContent())?></p>
       <?php
    }
    
    ?>
</div>
</section>

<script>
    const btn = document.getElementById("01");
    const rep = document.getElementById('list')

    btn.addEventListener("click", (e) => {
        // Empêcher le comportement par défaut du bouton (soumission du formulaire)
        e.preventDefault();

        // Récupérer la valeur de l'input
        const inputValue = document.getElementById("input" + btn.id).value;

        // URL de la route à appeler
        let url = `/test/`;

        // Données à envoyer via la requête POST
        let formData = new FormData();
        formData.append('content', inputValue); // Ajouter les données à envoyer


        // Configuration de la requête Fetch
        fetch(url, {
            method: "POST",
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                rep.innerHTML += `${inputValue} <br>`
            })
            .catch(error => {
                console.error('Erreur Fetch :', error);
            });
    });
</script>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
