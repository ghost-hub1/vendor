<?php
session_start();
if (isset($_POST['payment_method'])) {
    $_SESSION['selected_payment_method'] = htmlspecialchars($_POST['payment_method']);
    echo 'OK';
}
?>
