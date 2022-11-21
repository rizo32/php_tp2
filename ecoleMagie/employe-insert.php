<?php
require_once 'class/Crud.php';

$Crud = new Crud;
$insert = $Crud->insert('employe', $_POST);

$insert;