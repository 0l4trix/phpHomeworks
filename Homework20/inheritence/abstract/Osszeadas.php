<?php
require_once('./Muvelet.php');

/**
 * Description of Szorzas
 *
 * @author feher
 */
class Osszeadas extends Muvelet
{
    public function __construct(int $a, int $b)
    {
        parent::__construct("+", $a, $b);
    }
    
    public function muvelet()
    {
        return $this->getA() + $this->getB();
    }
}

$osszeadas = new Osszeadas(5,4);
print($osszeadas);