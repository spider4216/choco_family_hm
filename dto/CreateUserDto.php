<?php
namespace app\dto;

class CreateUserDto
{
    /**
     * @var string
     */
    private $email;
    
    /**
     * @var string
     */
    private $phone;
    
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var string
     */
    private $surname;
    
    /**
     * @var int
     */
    private $gender;
    
    /**
     * @var int
     */
    private $town_id;
    
    /**
     * @return string
     */
    public function getEmail() : ?string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone() : ?string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname() : ?string
    {
        return $this->surname;
    }

    /**
     * @return number
     */
    public function getGender() : ?int
    {
        return $this->gender;
    }

    /**
     * @return number
     */
    public function getTownId()  : ?int
    {
        return $this->town_id;
    }

    /**
     * @param string $email
     * @return CreateUserDto
     */
    public function setEmail(?string $email) : self
    {
        $this->email = $email;
        
        return $this;
    }

    /**
     * @param string $phone
     * @return CreateUserDto
     */
    public function setPhone(?string $phone) : self
    {
        $this->phone = $phone;
        
        return $this;
    }

    /**
     * @param string $name
     * @return CreateUserDto
     */
    public function setName(?string $name) : self
    {
        $this->name = $name;
        
        return $this;
    }

    /**
     * @param string $surname
     * @return CreateUserDto
     */
    public function setSurname(?string $surname) : self
    {
        $this->surname = $surname;
        
        return $this;
    }

    /**
     * @param number $gender
     * @return CreateUserDto
     */
    public function setGender(?string $gender) : self
    {
        $this->gender = $gender;
        
        return $this;
    }

    /**
     * @param number $town_id
     * @return CreateUserDto
     */
    public function setTownId(?string $town_id) : self
    {
        $this->town_id = $town_id;
        
        return $this;
    }

}

