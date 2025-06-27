<?php
session_start();
require_once 'core/Database.php';
require_once 'models/user.php';
require_once 'models/pet.php';
require_once 'petscontroller.php';
require_once 'userscontroller.php';
 $pets  = getPets($_SESSION['userId'], $pdo->prepare("SELECT * FROM pet JOIN tipo ON pet.tipoid = tipo.idtipo WHERE tutor = :id"));
$users = getUser($_SESSION['userId'], $pdo->prepare("SELECT * FROM users WHERE iduser = :id"));

if ($_SERVER['REQUEST_METHOD'] === 'GET' )  {
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] == 'addpet') {
    $pet = new Pet;
    $pet->setNome($_POST['nome']);
    $pet->setRace($_POST['race']);
    $pet->setBio($_POST['bio']);
    $pet->setNascimento($_POST['nascimento']);
    $pet->setTipo(($_POST['tipo'] === 'Gato' ) ? 1 : 2 );
    $pet->setTutor( $_SESSION['userId']);
    addPet($pet,$pdo);
    header('Location: home.php?section=home');
    exit();

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] == 'deletePet') {
    
    deletePet($_POST['idpet'],$pdo);
    header('Location: home.php');
    exit();

}

function exportJson($nome,$json) {
    $fp = fopen("export/".$nome.".json","wb");
    fwrite($fp,$json);
    fclose($fp);
    //system(('git add .'));
    //system(('git commit -m "commit automatico"'));
    //system(('git push origin master '));
}



?>