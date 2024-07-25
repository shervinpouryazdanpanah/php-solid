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
