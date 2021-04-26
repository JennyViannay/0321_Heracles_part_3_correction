<?php

namespace App;

class Arena
{
    private array $monsters = [];
    private ?Hero $hero = null;
    private int $size;

    public function __construct(Hero $hero, array $monsters, int $size = 10)
    {
        $this->hero = $hero;
        $this->monsters = $monsters;
        $this->size = $size;
    }

    public function getDistance(Fighter $fighter, Fighter $enemy)
    {
        return sqrt((($enemy->getX() - $fighter->getX())**2) + (($enemy->getY() - $fighter->getY())**2));
    }

    public function touchable(Fighter $fighter, Fighter $enemy)
    {
        return ($this->getDistance($fighter, $enemy) <= $enemy->getRange()) ? true : false;
    }

    public function getMonsters(): array
    {
        return $this->monsters;
    }

    public function addMonsters(Monster $monster)
    {
        if (!$this->monsters->contains($monster)) {
            $this->monsters[] = $monster;
        }

        return $this;
    }

    public function removeMonsters(Monster $monster)
    {
        $this->monsters->removeElement($monster);

        return $this;
    }

    /**
     * Get the value of hero
     */ 
    public function getHero()
    {
        return $this->hero;
    }

    /**
     * Set the value of hero
     *
     * @return  self
     */ 
    public function setHero(Hero $hero)
    {
        $this->hero = $hero;

        return $this;
    }

    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }
}