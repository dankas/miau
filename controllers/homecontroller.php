<?php
session_start();
require_once 'core/Database.php';
require_once 'models/user.php';
require_once 'models/pet.php';
require_once 'petscontroller.php';
require_once 'userscontroller.php';
$pets  = getPets($_SESSION['userId'], $pdo->prepare("SELECT * FROM pet JOIN tipo ON pet.tipoid = tipo.idtipo WHERE tutor = :id AND ativo = 1 ORDER BY datetimeregistro"));
$users = getUser($_SESSION['userId'], $pdo->prepare("SELECT * FROM users WHERE iduser = :id"));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] == 'exportJson' )  {
    $commitMessage = 'commit ' . date('Y-m-d H:i:s').'';
    exportJson("pets", json_encode($pets));
    exportJson("users", json_encode($users));
    system(('git add .'));
    system('git commit -m "' . $commitMessage . '"');
    system(('git push origin master '));
    header('Location: home.php?section=home&message=Dados exportados com sucesso ' . $commitMMessage);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] == 'addpet') {
    $pet = new Pet;
    $pet->setNome($_POST['nome']);
    $pet->setRace($_POST['race']);
    $pet->setBio($_POST['bio']);
    $pet->setNascimento($_POST['nascimento']);
    $pet->setTipo(($_POST['tipo'] === 'Gato' ) ? 1 : 2 );
    $pet->setTutor( $_SESSION['userId']);
    array_push($pets, $pet);
    addPet($pet,$pdo);
    header('Location: home.php?section=home&message=Pet adicionado com sucesso');
    exit();

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] == 'updatePet') {

    // $pet = new Pet;
    // $pet->setId($_POST['idpet']);
    // $pet->setNome($_POST['nome']);
    // $pet->setRace($_POST['race']);
    // $pet->setBio($_POST['bio']);
    // $pet->setNascimento($_POST['nascimento']);
    // $pet->setTipo(($_POST['tipo'] === 'Gato' ) ? 1 : 2 );
    // $pet->setTutor( $_SESSION['userId']);
    $pet = array_find($pets, fn($p) => $p->idpet == $_POST['idpet']);
    $pet->setNome($_POST['nome']);
    $pet->setRace($_POST['race']);
    $pet->setBio($_POST['bio']);
    $pet->setNascimento($_POST['nascimento']);
    $pet->setTipo(($_POST['tipo'] === 'Gato' ) ? 1 : 2 );
    $pet->setTutor( $_SESSION['userId']);
    updatePet($pet,$pdo);
    header('Location: home.php?section=home&message=Pet atualizado com sucesso');
    exit();

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] == 'deletePet') {
   $pet = array_find($pets, fn($p) => $p->idpet == $_POST['idpet']);
   deletePet($pet,$pdo);
   header('Location: home.php');
   exit();

}
    
function exportJson($nome,$json) {
    $fp = fopen("export/".$nome.".json","wb");
    fwrite($fp,$json);
    fclose($fp);
}



?>