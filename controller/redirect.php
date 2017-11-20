<?php
include 'model/functions.php';

if(isset($_GET['code']) && !empty($_GET['code'])){
    $redirect = $_GET['code'];
    redirect($redirect);
    die();
}
?>