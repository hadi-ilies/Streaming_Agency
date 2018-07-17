<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 ** @UniqueEntity(
 * fields= {"Mail"},
 * message= "L'email que vous avez indiqué est déjà utilisé !"
 * )
 */

class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */

     private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $UserName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */

    private $Mail;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="votre mot de passe doit faire minimum 8 caractères")
     */

    private $PassWord;

    public function getId()
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->UserName;
    }

    public function setUserName(string $UserName): self
    {
        $this->UserName = $UserName;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->Mail;
    }

    public function setMail(string $Mail): self
    {
        $this->Mail = $Mail;

        return $this;
    }

    public function getPassWord(): ?string
    {
        return $this->PassWord;
    }

    public function setPassWord(string $PassWord): self
    {
        $this->PassWord = $PassWord;

        return $this;
    }

    public function getRoles() {
        return ['ROLE_USER'];
      }
  
      public function getSalt() {}
  
      public function eraseCredentials() {}   
}
