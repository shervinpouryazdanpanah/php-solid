<?php

interface Character
{
    public function move();

    public function fly();

    public function attack();
}

class GeneralCharacter implements Character
{
    public function move()
    {
    }

    public function fly()
    {
        throw new Error("can't fly");
    }

    public function attack()
    {
    }
}


class FlyingCharacter implements Character
{
    public function move()
    {
        throw new Error("can't move");
    }

    public function fly()
    {
    }

    public function attack()
    {
    }
}

class Friend implements Character
{
    public function move()
    {
    }

    public function fly()
    {
    }

    public function attack()
    {
        throw new Error("can't attack");
    }
}
