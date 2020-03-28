<?php
require '../class/sessions.php';
$objSes = new Sessions();
$objSes->destroy();

echo '<script>

window.location= "../index.php";

</script>';