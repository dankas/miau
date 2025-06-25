<?php 


class User {
    public private(set) int $iduser;
    public private(set) string $username;
    public private(set) string $telefone;
    public private(set) string $imgprofile;
    private $password;

    public function __construct()        {

        }

    
    public function setIduser(int $iduser) {
        $this->iduser = $iduser;
    }

    public function setUsername(string $username) {
        $this->username = $username;
    }

    public function setTelefone(string $telefone) {
        $this->telefone = $telefone;
    }

    public function setImgprofile(string $imgprofile) {
        $this->imgprofile = $imgprofile;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }


    public function atualizaUsername($username,$data) {
        $this->$username = $username;
        $data->prepare("UPDATE users SET username = :username WHERE id = :id");
        $data->bindValue(":id",$this->iduser);
        $data->bindValue(":username",$this->username);
        $data->execute();

    }
        public function atualizaPassword($password,$data) {
        $this->$password = $password;
        $data->prepare("UPDATE users SET password = :password WHERE id = :id");
        $data->bindValue(":id",$this->iduser);
        $data->bindValue(":password",$this->password);
        $data->execute();

    }

}

?>