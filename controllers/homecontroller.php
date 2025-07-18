<?php
session_start();
require_once 'core/Database.php';
require_once 'models/user.php';
require_once 'models/pet.php';
require_once 'petscontroller.php';
require_once 'userscontroller.php';
$pets  = getPets($_SESSION['userId'], $pdo->prepare("SELECT * FROM pet JOIN tipo ON pet.tipoid = tipo.idtipo WHERE tutor = :id AND ativo = 1 ORDER BY datetimeregistro"));
$user = getUser($_SESSION['userId'], $pdo->prepare("SELECT * FROM users WHERE iduser = :id"));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] == 'exportJson' )  {
    $commitMessage = 'commit ' . date('Y-m-d H:i:s').'';
    exportJson("pets", json_encode($pets));
    exportJson("user", json_encode($user));
    //$gitaddMessage = system(('git add .'));
    //$gitcommitMessage = system('git commit -m "' . $commitMessage . '"');
   // $gitpushMessage = system(('git push origin master '));
    header('Location: home.php?section=home&message=Dados exportados com sucesso ' . $commitMessage. ' ' . $gitaddMessage . ' ' . $gitcommitMessage . ' ' . $gitpushMessage);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] == 'updateUser') {
    $user->setUsername($_POST['username']);
    $user->setTelefone($_POST['telefone']);
    $user->setImgprofile($_POST['imgprofile']);
    $user->setPassword($_POST['password']);
    updateUser($user,$pdo);
    header('Location: home.php?section=home&message=Usuário atualizado com sucesso');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] == 'addpet') {
    $pet = new Pet;
    $pet->setNome($_POST['nome']);
    $pet->setRace($_POST['race']);
    $pet->setBio($_POST['bio']);
    $pet->setNascimento($_POST['nascimento']);
    $pet->setTipo(($_POST['tipo'] === 'Gato' ) ? 1 : 2 );
    $pet->setTutor( $_SESSION['userId']);
    $pet->setImgperfil($_POST['img-perfil']);
    array_push($pets, $pet);
    addPet($pet,$pdo);
    header('Location: home.php?section=home&message=Pet adicionado com sucesso');
    exit();

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] == 'updatePet') {

    $pet = array_find($pets, fn($p) => $p->idpet == $_POST['idpet']);
    $pet->setNome($_POST['nome']);
    $pet->setRace($_POST['race']);
    $pet->setBio($_POST['bio']);
    $pet->setNascimento($_POST['nascimento']);
    $pet->setTipo(($_POST['tipo'] === 'Gato' ) ? 1 : 2 );
    $pet->setTutor( $_SESSION['userId']);
    $pet->setImgperfil($_POST['imgperfil']);
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