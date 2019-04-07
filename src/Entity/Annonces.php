<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnoncesRepository")
 */
class Annonces
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="annonce_id", type="integer", nullable=false)
     */
    private $annonceId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_jugement", type="date", nullable=false)
     */
    private $dateJugement;

    /**
     * @var int
     *
     * @ORM\Column(name="siren", type="integer", nullable=false)
     */
    private $siren;

    /**
     * @var int
     *
     * @ORM\Column(name="nic", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $nic;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires", type="text", length=0, nullable=false)
     */
    private $commentaires;

    /**
     * @var int
     *
     * @ORM\Column(name="dep", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $dep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MandatairesTest", mappedBy="annonces")
     */
    private $MandatairesTest;

    public function __construct()
    {
        $this->MandatairesTest = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnonceId(): ?int
    {
        return $this->annonceId;
    }

    public function setAnnonceId(int $annonceId): self
    {
        $this->annonceId = $annonceId;

        return $this;
    }

    public function getDateJugement(): ?\DateTimeInterface
    {
        return $this->dateJugement;
    }

    public function setDateJugement(\DateTimeInterface $dateJugement): self
    {
        $this->dateJugement = $dateJugement;

        return $this;
    }

    public function getSiren(): ?int
    {
        return $this->siren;
    }

    public function setSiren(int $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getNic(): ?int
    {
        return $this->nic;
    }

    public function setNic(int $nic): self
    {
        $this->nic = $nic;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(string $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getDep(): ?int
    {
        return $this->dep;
    }

    public function setDep(int $dep): self
    {
        $this->dep = $dep;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|MandatairesTest[]
     */
    public function getMandatairesTest(): Collection
    {
        return $this->MandatairesTest;
    }

    public function addMandatairesTest(MandatairesTest $mandatairesTest): self
    {
        if (!$this->MandatairesTest->contains($mandatairesTest)) {
            $this->MandatairesTest[] = $mandatairesTest;
            $mandatairesTest->setAnnonces($this);
        }

        return $this;
    }

    public function removeMandatairesTest(MandatairesTest $mandatairesTest): self
    {
        if ($this->MandatairesTest->contains($mandatairesTest)) {
            $this->MandatairesTest->removeElement($mandatairesTest);
            // set the owning side to null (unless already changed)
            if ($mandatairesTest->getAnnonces() === $this) {
                $mandatairesTest->setAnnonces(null);
            }
        }

        return $this;
    }

}
