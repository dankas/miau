<?php
session_start();
require_once 'core/Database.php';
require_once 'models/user.php';
require_once 'models/pet.php';

$pets  = getPets($_SESSION['userId'], $pdo->prepare("SELECT * FROM pet JOIN tipo ON pet.tipoid = tipo.idtipo WHERE tutor = :id"));
$users = getUser(1, $pdo->prepare("SELECT * FROM users WHERE iduser = :id"));
exportJson("pets",json_encode($pets));
exportJson("users",json_encode($users));
function exportJson($nome,$json) {
    $fp = fopen("export/".$nome.".json","wb");
    fwrite($fp,$json);
    fclose($fp);
    //system(('git commit -m "commit automatico"'));
    //system(('git push master master '));
}





function listPets($pets) {
     foreach($pets as $key => $value){
        echo "<tr>";
        echo "<td>". $value->nome ." </td>";
        echo "<td>". $value->tipo ." </td>";
        echo "<td>". $value->race ." </td>";
        echo "<td>". $value->nascimento ." </td>";
        echo "<td>". $value->bio ." </td>";
        echo "<td> <button> <button> </td>";
        echo "</tr>";
     }
}
function getUser($idtutor,$data) {
    try {
        $data->bindValue(":id",$idtutor);
        $data->execute();
        return $data->fetchObject('User');
    }
    catch (PDOException $e) {
        echo "Erro ao buscar dados: " . $e->getMessage();
    }
}
function getPets($idtutor,$data) {
    try {
        $data->bindValue(":id",$idtutor);
        $data->execute();
        return $data->fetchAll(PDO::FETCH_CLASS,'Pet');
    }
    catch (PDOException $e) {
        echo "Erro ao buscar dados: " . $e->getMessage();
    }
}
?>