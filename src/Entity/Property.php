<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 */
class Property
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Domain", mappedBy="property", orphanRemoval=true)
     */
    private $domain;

    public function __construct()
    {
        $this->domain = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Domain[]
     */
    public function getDomain(): Collection
    {
        return $this->domain;
    }

    public function addDomain(Domain $domain): self
    {
        if (!$this->domain->contains($domain)) {
            $this->domain[] = $domain;
            $domain->setProperty($this);
        }

        return $this;
    }

    public function removeDomain(Domain $domain): self
    {
        if ($this->domain->contains($domain)) {
            $this->domain->removeElement($domain);
            // set the owning side to null (unless already changed)
            if ($domain->getProperty() === $this) {
                $domain->setProperty(null);
            }
        }

        return $this;
    }
}
