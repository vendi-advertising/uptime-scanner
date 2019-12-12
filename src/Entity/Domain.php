<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DomainRepository")
 */
class Domain
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Property", inversedBy="domain")
     * @ORM\JoinColumn(nullable=false)
     */
    private $property;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DnsEntry", mappedBy="domain", orphanRemoval=true)
     */
    private $dnsEntries;

    public function __construct()
    {
        $this->dnsEntries = new ArrayCollection();
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

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(?Property $property): self
    {
        $this->property = $property;

        return $this;
    }

    /**
     * @return Collection|DnsEntry[]
     */
    public function getDnsEntries(): Collection
    {
        return $this->dnsEntries;
    }

    public function addDnsEntry(DnsEntry $dnsEntry): self
    {
        if (!$this->dnsEntries->contains($dnsEntry)) {
            $this->dnsEntries[] = $dnsEntry;
            $dnsEntry->setDomain($this);
        }

        return $this;
    }

    public function removeDnsEntry(DnsEntry $dnsEntry): self
    {
        if ($this->dnsEntries->contains($dnsEntry)) {
            $this->dnsEntries->removeElement($dnsEntry);
            // set the owning side to null (unless already changed)
            if ($dnsEntry->getDomain() === $this) {
                $dnsEntry->setDomain(null);
            }
        }

        return $this;
    }
}
