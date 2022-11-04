<?php

class User
{
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $username;
    private string $email;
    private string $password;


    /**Suit le mm schéma que la classe post avec la définition 
     * des getters puis des setters et après du constructeur et de la fonction hydrate */

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    public function getId()
    {
        return $this->id;
    }

    public function getFirst_name()
    {
        return $this->first_name;
    }
    public function getLast_name()
    {
        return $this->last_name;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }





    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}
