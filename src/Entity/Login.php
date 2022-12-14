<?php 

namespace App\Entity;


class Login{
    protected $email,$mdp,$verif;

    public function getEmail(){
        return $this->email;
    }

    public function getMdp(){
        return $this->mdp;
    }

    public function getVerif(){
        return $this->verif;
    }

    public function setEmail($email): void{
        $this->email = $email;
    }

    public function setMdp($mdp):void {
        $this->mdp = $mdp;
    }
}

?>