<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="book")
 * @UniqueEntity("title")
 *
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 *     })
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     * @Groups({"read", "write"})
     * @Assert\NotBlank()
     */
    private $title;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Groups({"read", "write"})
     */
    private $summary;
    
    /**
     * @ORM\Column(type="integer")
     * @Groups({"read", "write"})
     * @Assert\Type("numeric")
     * @Assert\GreaterThan(0)
     */
    private $ageMin;
    
    /**
     * Book constructor.
     */
    function __construct()
    {
        $this->ageMin = 10;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param mixed $id
     * @return Book
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param mixed $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }
    
    /**
     * @param mixed $summary
     * @return Book
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAgeMin()
    {
        return $this->ageMin;
    }
    
    /**
     * @param mixed $ageMin
     * @return Book
     */
    public function setAgeMin($ageMin)
    {
        $this->ageMin = $ageMin;
        
        return $this;
    }
    
}