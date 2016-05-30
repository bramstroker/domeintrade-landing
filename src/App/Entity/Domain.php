<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 29-5-2016
 * Time: 15:31
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DomainRepository")
 * @ORM\Table(name="domain")
 */
class Domain implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=32)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="analyticsCode", type="string", length=32)
     * @var string
     */
    private $analyticsCode;

    /**
     * Application constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAnalyticsCode()
    {
        return $this->analyticsCode;
    }

    /**
     * @param string $analyticsCode
     */
    public function setAnalyticsCode($analyticsCode)
    {
        $this->analyticsCode = $analyticsCode;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'analyticsCode' => $this->analyticsCode
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}