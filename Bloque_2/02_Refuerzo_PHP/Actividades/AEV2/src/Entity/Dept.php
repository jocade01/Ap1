<?php
namespace AEV2\Entity;

use AEV2\Repository\EmpresaRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use DateTime;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity(repositoryClass: EmpresaRepository::class)]
#[Table(name: 'dept')]
class Dept
{
#[Id]
 #[Column(name: "dept_no", type: 'smallint')]
private int $deptNo;

#[Column(name: "dnombre", type: 'string', length: 14)]
private string $dnombre;

#[Column(name: "loc", type: 'string', length: 14)]
private string $loc;

#[Column(name: "color", type: 'string', length: 20)]
private string $color;

    #[OneToMany(targetEntity: Emp::class, mappedBy: "dept")]
private Collection $emp;

public function __construct(){
    $this->emp = new ArrayCollection();
}

    public function getDeptNo(): int
    {
        return $this->deptNo;
    }

    public function setDeptNo(int $deptNo): void
    {
        $this->deptNo = $deptNo;
    }

    public function getEmp(): Collection
    {
        return $this->emp;
    }

    public function setEmp(Collection $emp): void
    {
        $this->emp = $emp;
    }

    public function getLoc(): string
    {
        return $this->loc;
    }

    public function setLoc(string $loc): void
    {
        $this->loc = $loc;
    }

    public function getDnombre(): string
    {
        return $this->dnombre;
    }

    public function setDnombre(string $dnombre): void
    {
        $this->dnombre = $dnombre;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

}