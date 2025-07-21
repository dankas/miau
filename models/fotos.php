<?php

class Foto
{
    public $id;
    public $idpet;
    public $img;
    public $ativo;
    public $datetimeregistro;


    function __construct() {}

    public function atualizaDb($pdo)
    {
        try {
            $stmt = $pdo->prepare("UPDATE fotos SET idpet = :idpet, img = :img WHERE id = :id");
            $stmt->bindValue(":idpet", $this->idpet);
            $stmt->bindValue(":img", $this->img);
            $stmt->bindValue(":id", $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao atualizar foto: " . $e->getMessage();
        }
    }
}
?>