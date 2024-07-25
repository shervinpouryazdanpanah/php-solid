# Description of 'I' in SOLID

## Interface Segregation Principle

The Interface Segregation Principle (ISP) states:

> A client should never be forced to implement an interface that it doesn’t use, or clients shouldn’t be forced to depend on methods they do not use.

### Example

In `false.php`, you have one interface, and three classes implement it. However, the `Friend` class doesn't have the function `attack`, the `FlyingCharacter` class doesn't have the function `move`, and the `GeneralCharacter` class doesn't have the function `fly`.

```php
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

```

### Correct Implementation

To adhere to the Interface Segregation Principle, you should create separate interfaces for each class:

```php
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


```

In this implementation, each class only implements the interfaces that it needs. This design adheres to the Interface Segregation Principle, ensuring that no class is forced to implement methods it does not use.