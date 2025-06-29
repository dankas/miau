<?php
function listPets($pets) {
     foreach($pets as $key => $value){
        echo "<tr>";
        echo "<form method='POST' action='home.php?action=updatePet'>";
        echo "<input type='hidden' name='idpet' value='" . $value->idpet . "'>";
        echo "<td><input type='text' name='nome' value='" . $value->nome . "'></td>";
        echo "<td><select name='tipo' id='tipo' required>
                    <option value='Cachorro' " . ($value->tipo =='cão' ? "selected" : "") . ">Cachorro</option>
                    <option value='Gato' " . ($value->tipo == 'gato' ? "selected" : "") . ">Gato</option>
              </select>";
        echo "<td><input type='text' name='race' value='" . $value->race . "'></td>";
        echo "<td><input type='date' name='nascimento' value='" . $value->nascimento . "'></td>";
        echo "<td><textarea rows='5' cols='30' name='bio'>" . $value->bio . "</textarea></td>";
        echo "<td>
            <button type='submit'>Salvar</button>
              </form>
              <form method='POST' action='home.php?action=deletePet' style='display:inline;'>
            <input type='hidden' name='idpet' value='" . $value->idpet . "'>
            <button type='submit'>Excluir</button>
              </form>
              </td>";
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
    $pet->setAtivo(1);
    $pet->atualizaDb($data);
 
}
function deletePet($pet,$data) {
    $pet->setAtivo(0);
    $pet->atualizaDb($data);

}
function updatePet($pet,$data) {
    $pet->atualizaDb($data);

    // try {
        // $data = $data->prepare("UPDATE pet SET nome = :nomepet, race = :racepet, tipoid = :tipopet, tutor = :userid, bio = :biopet, nascimento = :nascimentopet WHERE idpet = :idpet");
        // $data->bindValue(":nomepet", $pet->nome);
        // $data->bindValue(":tipopet", $pet->tipo, PDO::PARAM_INT);
        // $data->bindValue(":racepet", $pet->race);
        // $data->bindValue(":biopet", $pet->bio);
        // $data->bindValue(":nascimentopet", $pet->nascimento);
        // $data->bindValue(":userid", $pet->tutor, PDO::PARAM_INT);
        // $data->bindValue(":idpet", $pet->idpet, PDO::PARAM_INT);
        // $data->execute();
    // } catch (PDOException $e) {
    //     echo "Erro ao atualizar pet: " . $e->getMessage();
    // }

}

?>