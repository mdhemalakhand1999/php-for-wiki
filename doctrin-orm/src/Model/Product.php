<?php
namespace Shop\Model;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\Table(name: 'products')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "products")]
    private $user;
    public function setUser(User $user) {
        $this->user = $user;
    }
    /**
     * @return Shop\Model\User
     */
    public function getId() {
        return $this->id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getUser() {
        return $this->user;
    }
    public function getName() {
        return $this->name;
    }
}