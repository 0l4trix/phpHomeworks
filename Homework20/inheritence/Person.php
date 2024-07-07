<?php

/*final*/ class Person{
    private String $firstname;
    private String $lastname;
    private String $address;
    private String $email;
    
    
    public function getFirstname(): String
    {
        return $this->firstname;
    }

    public function getLastname(): String
    {
        return $this->lastname;
    }

    public function getAddress(): String
    {
        return $this->address;
    }

    public function getEmail(): String
    {
        return $this->email;
    }

    public function setFirstname(String $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function setLastname(String $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function setAddress(String $address): void
    {
        $this->address = $address;
    }

    public function setEmail(String $email): void
    {
        $this->email = $email;
    }

    public /*final*/ function payroll(){
        print('Jó sok pénz');
    }

    
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
    
}
