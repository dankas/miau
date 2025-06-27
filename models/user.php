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

}

?>