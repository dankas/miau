<?php
function listPets($pets) {
     foreach($pets as $key => $value){
        echo "<tr>";
        echo "<td>". $value->nome ." </td>";
        echo "<td>". $value->tipo ." </td>";
        echo "<td>". $value->race ." </td>";
        echo "<td>". $value->nascimento ." </td>";
        echo "<td>". $value->bio ." </td>";
        echo "<td> <button type='submit'>Editar</button> <form method='POST' action='home.php?action=deletePet'><input type='hidden' name='idpet' value=".$value->idpet."><button type='submit'>Excluir</button> </form> </td>";
        echo "</tr>";
     }
}
function getPets($idtutor,$data) {
    try {
        $data->bindValue(":id",$idtutor);
        $data->execute();
        return $data->fetchAll(PDO::FETCH_CLASS,'Pet');
    }    catch (PDOException $e) {
        echo "Erro ao buscar dados: " . $e->getMessage();
    }
}
function addPet($pet,$data) {

    try {
        $data = $data->prepare("INSERT INTO pet (nome,race,tipoid,tutor,bio,nascimento) VALUES (:nomepet,:racepet, :tipopet, :userid, :biopet, :nascimentopet)");
        $data->bindValue(":nomepet", $pet->nome);
        $data->bindValue(":tipopet", $pet->tipo, PDO::PARAM_INT);
        $data->bindValue(":racepet", $pet->race);
        $data->bindValue(":biopet", $pet->bio);
        $data->bindValue(":nascimentopet", $pet->nascimento);
        $data->bindValue(":userid", $pet->tutor, PDO::PARAM_INT);
        $data->execute();
    } catch (PDOException $e) {
        echo "Erro ao adicionar pet: " . $e->getMessage();
    }
 
}
function deletePet($pet,$data) {
    
    try {
        header("Location: log.php?message=".$pet."");
        $data = $data->prepare("DELETE FROM pet WHERE idpet = :idpet ;");
        $data->bindValue(":idpet", $pet, PDO::PARAM_INT);
        $data->execute();
    } catch (PDOException $e) {
        header("Location: log.php?message=".$e->getMessage()."");
        exit();
    }
}

?>