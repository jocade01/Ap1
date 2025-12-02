<?php
namespace AEV2\Entity;

use AEV2\Repository\EmpresaRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use DateTime;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToMany;


#[Entity(repositoryClass: EmpresaRepository::class)]
#[Table(name: 'emp')]
class Emp
{
    #[Id]
    #[GeneratedValue('NONE')]
    #[Column(name: "emp_no", type: 'integer')]
    private ?int $empNo;


    #[ManyToOne(targetEntity: Emp::class, inversedBy: "employer")]
    #[JoinColumn(name: "jefe", referencedColumnName: "emp_no")]
    private ?Emp $boss = null;

    #[Column(name: "apellidos", type: 'string', length: 10)]
    private string $surname;

    #[Column(name: "oficio", type: 'string', length: 10)]
    private string $work;

    #[OneToMany(targetEntity: Emp::class, mappedBy: "boss")]
    private Collection $employer;

    #[OneToMany(targetEntity: Client::class, mappedBy: "emp")]
    private Collection $client;
    #[Column(name: "fecha_alta", type: 'date')]
    private \DateTime $TallDate;

    #[Column(name: "salario", type: 'integer')]
    private int $salary;

    #[Column(name: "comision", type: 'integer')]
    private ?int $comision = null;

    #[ManyToOne(targetEntity: Dept::class, inversedBy: "emp")]
    #[JoinColumn(name: "dept_no", referencedColumnName: "dept_no", nullable: false)]
    private ?Dept $dept;

    public function __construct(){
        $this->employer = new ArrayCollection();
        $this->client = new ArrayCollection();
    }

    public function getEmpNo(): ?int
    {
        return $this->empNo;
    }

    public function setEmpNo(int $empNo): void
    {
        $this->empNo = $empNo;
    }

    public function getBoss(): ?Emp
    {
        return $this->boss;
    }

    public function setBoss(?Emp $boss): void
    {
        $this->boss = $boss;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getWork(): string
    {
        return $this->work;
    }

    public function setWork(string $work): void
    {
        $this->work = $work;
    }

    public function getEmployer(): Collection
    {
        return $this->employer;
    }

    public function setEmployer(Collection $employer): void
    {
        $this->employer = $employer;
    }

    public function getClient(): Collection
    {
        return $this->client;
    }

    public function setClient(Collection $client): void
    {
        $this->client = $client;
    }

    public function getTallDate(): DateTime
    {
        return $this->TallDate;
    }

    public function setTallDate(DateTime $TallDate): void
    {
        $this->TallDate = $TallDate;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    public function getComision(): ?int
    {
        return $this->comision;
    }

    public function setComision(?int $comision): void
    {
        $this->comision = $comision;
    }

    public function getDept(): Dept
    {
        return $this->dept;
    }

    public function setDept(Dept $dept): void
    {
        $this->dept = $dept;
    }

}