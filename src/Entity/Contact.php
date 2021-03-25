<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="text")
     */
    private $message_contact;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     *
     */
    private $nomComplet;

    /**
     * @ORM\Column(type="boolean")
     */
    private $reponse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNomComplet() : ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet (){

       $nomComplet =  $this->getNom().'_'.$this->getPrenom();
       $this->nomComplet = $nomComplet;

       return $nomComplet;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMessageContact(): ?string
    {
        return $this->message_contact;
    }

    public function setMessageContact(string $message_contact): self
    {
        $this->message_contact = $message_contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {

        //$date = $dateBase->format('d/m/Y');
        $this->date = $date;

        return $this;
    }

    public function getReponse(): ?bool
    {
        return $this->reponse;
    }

    public function setReponse(bool $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }
}
