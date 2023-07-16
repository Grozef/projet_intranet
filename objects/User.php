<?php

class User {
    private string $numeroAgrement;
    private string $login;
    private string $password;

    public function setNumeroAgrement ($numeroAgrement)
    {
        $this->numeroAgrement = $numeroAgrement;
    }

    public function getNumeroAgrement() 
    {
        return $this->numeroAgrement;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword ($password)
    {
        $this->password = $password;
    }


}