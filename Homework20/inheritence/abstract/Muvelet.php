<?php

/**
 * Description of Muvelet
 *
 * @author feher
 */
abstract class Muvelet
{
    private String $muveletiJel;
    private int $a, $b;
    
    public function __construct(String $muveletiJel, int $a, int $b)
    {
        $this->muveletiJel = $muveletiJel;
        $this->a = $a;
        $this->b = $b;
    }
    
    public abstract function muvelet();
    
    public function getA(): int
    {
        return $this->a;
    }

    public function getB(): int
    {
        return $this->b;
    }
        
    public function __toString(): string
    {
        return $this->a." ".$this->muveletiJel." ".$this->b." = ".$this->muvelet();
    }
}
