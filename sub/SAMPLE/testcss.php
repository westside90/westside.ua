<?php 
require_once '../header.php';
require_once 'menu3.php'; ?>
<style type = 'text/css'>


</style>
<body bgcolor = '#d8d5c2'>

<form action = 'post.php' method = 'POST'>
<p align = 'center'>
<input type = 'text' name = 'name' id = 'text'>
<input type = 'submit' id = 'button' value = 'Додати'>
</p>
</form>

<?php 
require_once 'sample_list.php';
require_once '../footer.php';
?>
</body>