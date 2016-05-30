<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 29-5-2016
 * Time: 15:42
 */

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class DomainRepository extends EntityRepository
{
    public function findByName($name)
    {
        return $this->findOneBy(['name' => $name]);
    }
}