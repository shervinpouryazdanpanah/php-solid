<?php

class Store
{
    protected $paypal;

    public function __construct($user)
    {
        $this->paypal = new PayPal($user);
    }

    public function purchaseSomething(float $price, int $quantity)
    {
        $totalPayment = $price * $quantity;
        $this->paypal->makePayment($totalPayment);
    }
}

class PayPal
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function makePayment($totalPayment)
    {
        echo "{$this->user} paid {$totalPayment}";
    }
}

$store = new Store("user 1");
$store->purchaseSomething(25.00, 2);
