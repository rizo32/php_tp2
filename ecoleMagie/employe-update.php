<?php
require_once 'class/Crud.php';

$Crud = new Crud;
$update = $Crud->update('employe', $_POST);
