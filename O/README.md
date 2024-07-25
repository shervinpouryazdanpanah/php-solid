# Description of 'O' in SOLID

## Open-Closed Principle (OCP)

The Open-Closed Principle (OCP) states:

> Objects or entities should be open for extension but closed for modification.

### Example

In `false.php`, there are three classes: two shapes and one class for calculating the sum of their areas.

```php
<?php


class Rectangle
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea()
    {
        return $this->width * $this->height;
    }
}


class Circle
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getArea()
    {
        return 3.14 * $this->radius * $this->radius;
    }
}

class AreaCalculator
{
    private $shapes;
    public function __construct($shapes)
    {
        $this->shapes = $shapes;
    }

    public function sum()
    {
        $area = [];
        foreach ($this->shapes as $shape) {
            if ($shape instanceof Rectangle) {
                $area[] = $shape->getArea();
            }
            if ($shape instanceof circle) {
                $area[] = $shape->getArea();
            }
        }
        return array_sum($area);
    }
}

```

In the `AreaCalculator` class, you have a property to get shapes and sum their areas.

In the future, if you want to create a new shape like a square, you must change the `sum` function in `AreaCalculator`.

### Correct Implementation

In `true.php`, you can add shapes to the file without changing `AreaCalculator` by using an interface:

```php
<?php

interface Shape
{
    public function getArea();
}

class Rectangle implements Shape
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function getArea()
    {
        return $this->width * $this->height;
    }
}


class Circle implements Shape
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getArea()
    {
        return 3.14 * $this->radius * $this->radius;
    }
}

class AreaCalculator
{
    private $shapes;
    public function __construct($shapes)
    {
        $this->shapes = $shapes;
    }

    public function sum()
    {
        $area = [];
        foreach ($this->shapes as $shape) {
            $area[] = $shape->getArea();
        }
        return array_sum($area);
    }
}

```

This approach ensures that `AreaCalculator` is open for extension but closed for modification. By using an interface, new shapes can be added without altering the existing `AreaCalculator` class.
