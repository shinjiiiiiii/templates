<?php
ob_start();
?>

<section class="menu">
   
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
