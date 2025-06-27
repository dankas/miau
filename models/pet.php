<?php 


class Pet {
    public $idpet;
    public $nome;
    public $race;
    public $tipo;
    public $tutor;
    public $bio;
    public $nascimento;

    public function __construct()        {

        }
    public function setId($id) {
        $this->idpet = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setRace($race) {
        $this->race = $race;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setTutor($tutor) {
        $this->tutor = $tutor;
    }

    public function setBio($bio) {
        $this->bio = $bio;
    }

    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }


}

?>