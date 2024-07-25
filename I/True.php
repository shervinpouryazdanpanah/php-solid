<?php

interface MovableCharacter
{
    public function move();
}

interface FlyableCharacter
{
    public function fly();
}

interface AttackableCharacter
{
    public function attack();
}

class GeneralCharacter implements MovableCharacter, AttackableCharacter
{
    public function move()
    {
    }

    public function attack()
    {
    }
}

class FlyingCharacter implements FlyableCharacter, AttackableCharacter
{
    public function fly()
    {
    }

    public function attack()
    {
    }
}

class FriendCharacter implements MovableCharacter
{
    public function move()
    {
    }
}
