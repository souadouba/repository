<?php

namespace App\Entity;

use App\Repository\AnnoncesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass=AnnoncesRepository::class)
 */
class Annonces
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=155)
     */
    private $titre;

    /**
     * @Gedmo\Slug(fields={"titre"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

   

    /** 
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="annonces", orphanRemoval=true,cascade={"persist"})
     */
    private $images;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $num_imarticul;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays_imarticul;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_societe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $num_contrat;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_agence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addresse_agence;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $email_agence;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nom_conduct;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $prenom_conduct;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $addres_conduct;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel_email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $num_permis;


    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_temoins;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adres_temoin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $circontance_2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $circontance_3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $circontance_4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $circontance_5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $circontance_6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $circontance_7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $circontance_8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $circontance_9;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mes_observ;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $circontance_10;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $circontance_1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $circontance_11;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $circontance_14;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $circontance_15;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $circontance_16;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $circontance_17;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $circontance_18;
    
    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setAnnonces($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getAnnonces() === $this) {
                $image->setAnnonces(null);
            }
        }

        return $this;
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

    public function getNumImarticul(): ?string
    {
        return $this->num_imarticul;
    }

    public function setNumImarticul(string $num_imarticul): self
    {
        $this->num_imarticul = $num_imarticul;

        return $this;
    }

    public function getPaysImarticul(): ?string
    {
        return $this->pays_imarticul;
    }

    public function setPaysImarticul(string $pays_imarticul): self
    {
        $this->pays_imarticul = $pays_imarticul;

        return $this;
    }

    public function getNomSociete(): ?string
    {
        return $this->nom_societe;
    }

    public function setNomSociete(string $nom_societe): self
    {
        $this->nom_societe = $nom_societe;

        return $this;
    }

    public function getNumContrat(): ?string
    {
        return $this->num_contrat;
    }

    public function setNumContrat(string $num_contrat): self
    {
        $this->num_contrat = $num_contrat;

        return $this;
    }

    public function getNomAgence(): ?string
    {
        return $this->nom_agence;
    }

    public function setNomAgence(string $nom_agence): self
    {
        $this->nom_agence = $nom_agence;

        return $this;
    }

    public function getAddresseAgence(): ?string
    {
        return $this->addresse_agence;
    }

    public function setAddresseAgence(string $addresse_agence): self
    {
        $this->addresse_agence = $addresse_agence;

        return $this;
    }

    public function getEmailAgence(): ?string
    {
        return $this->email_agence;
    }

    public function setEmailAgence(string $email_agence): self
    {
        $this->email_agence = $email_agence;

        return $this;
    }

    public function getNomConduct(): ?string
    {
        return $this->nom_conduct;
    }

    public function setNomConduct(string $nom_conduct): self
    {
        $this->nom_conduct = $nom_conduct;

        return $this;
    }

    public function getPrenomConduct(): ?string
    {
        return $this->prenom_conduct;
    }

    public function setPrenomConduct(string $prenom_conduct): self
    {
        $this->prenom_conduct = $prenom_conduct;

        return $this;
    }

    public function getAddresConduct(): ?string
    {
        return $this->addres_conduct;
    }

    public function setAddresConduct(string $addres_conduct): self
    {
        $this->addres_conduct = $addres_conduct;

        return $this;
    }

    public function getTelEmail(): ?string
    {
        return $this->tel_email;
    }

    public function setTelEmail(string $tel_email): self
    {
        $this->tel_email = $tel_email;

        return $this;
    }

    public function getNumPermis(): ?string
    {
        return $this->num_permis;
    }

    public function setNumPermis(string $num_permis): self
    {
        $this->num_permis = $num_permis;

        return $this;
    }
   
    public function getNomTemoins(): ?string
    {
        return $this->nom_temoins;
    }

    public function setNomTemoins(string $nom_temoins): self
    {
        $this->nom_temoins = $nom_temoins;

        return $this;
    }

    public function getAdresTemoin(): ?string
    {
        return $this->adres_temoin;
    }

    public function setAdresTemoin(string $adres_temoin): self
    {
        $this->adres_temoin = $adres_temoin;

        return $this;
    }

    public function getCircontance2(): ?string
    {
        return $this->circontance_2;
    }

    public function setCircontance2(string $circontance_2): self
    {
        $this->circontance_2 = $circontance_2;

        return $this;
    }

    public function getCircontance3(): ?string
    {
        return $this->circontance_3;
    }

    public function setCircontance3(?string $circontance_3): self
    {
        $this->circontance_3 = $circontance_3;

        return $this;
    }

    public function getCircontance4(): ?string
    {
        return $this->circontance_4;
    }

    public function setCircontance4(?string $circontance_4): self
    {
        $this->circontance_4 = $circontance_4;

        return $this;
    }

    public function getCircontance5(): ?string
    {
        return $this->circontance_5;
    }

    public function setCircontance5(?string $circontance_5): self
    {
        $this->circontance_5 = $circontance_5;

        return $this;
    }

    public function getCircontance6(): ?string
    {
        return $this->circontance_6;
    }

    public function setCircontance6(?string $circontance_6): self
    {
        $this->circontance_6 = $circontance_6;

        return $this;
    }

    public function getCircontance7(): ?string
    {
        return $this->circontance_7;
    }

    public function setCircontance7(?string $circontance_7): self
    {
        $this->circontance_7 = $circontance_7;

        return $this;
    }

    public function getCircontance8(): ?string
    {
        return $this->circontance_8;
    }

    public function setCircontance8(?string $circontance_8): self
    {
        $this->circontance_8 = $circontance_8;

        return $this;
    }

    public function getCircontance9(): ?string
    {
        return $this->circontance_9;
    }

    public function setCircontance9(?string $circontance_9): self
    {
        $this->circontance_9 = $circontance_9;

        return $this;
    }

    public function getMesObserv(): ?string
    {
        return $this->mes_observ;
    }

    public function setMesObserv(string $mes_observ): self
    {
        $this->mes_observ = $mes_observ;

        return $this;
    }

    public function getCircontance10(): ?string
    {
        return $this->circontance_10;
    }

    public function setCircontance10(string $circontance_10): self
    {
        $this->circontance_10 = $circontance_10;

        return $this;
    }

    public function getCircontance1(): ?string
    {
        return $this->circontance_1;
    }

    public function setCircontance1(?string $circontance_1): self
    {
        $this->circontance_1 = $circontance_1;

        return $this;
    }

    public function getCircontance11(): ?string
    {
        return $this->circontance_11;
    }

    public function setCircontance11(?string $circontance_11): self
    {
        $this->circontance_11 = $circontance_11;

        return $this;
    }

    public function getCircontance12(): ?string
    {
        return $this->circontance_12;
    }

    public function getCircontance14(): ?string
    {
        return $this->circontance_14;
    }

    public function setCircontance14(string $circontance_14): self
    {
        $this->circontance_14 = $circontance_14;

        return $this;
    }

    public function getCircontance15(): ?string
    {
        return $this->circontance_15;
    }

    public function setCircontance15(string $circontance_15): self
    {
        $this->circontance_15 = $circontance_15;

        return $this;
    }

    public function getCircontance16(): ?string
    {
        return $this->circontance_16;
    }

    public function setCircontance16(string $circontance_16): self
    {
        $this->circontance_16 = $circontance_16;

        return $this;
    }

    public function getCircontance17(): ?string
    {
        return $this->circontance_17;
    }

    public function setCircontance17(string $circontance_17): self
    {
        $this->circontance_17 = $circontance_17;

        return $this;
    }

    public function getCircontance18(): ?string
    {
        return $this->circontance_18;
    }

    public function setCircontance18(string $circontance_18): self
    {
        $this->circontance_18 = $circontance_18;

        return $this;
    }

}
