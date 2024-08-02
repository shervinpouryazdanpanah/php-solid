<?php

interface PaymentProcessor
{
    public function makePayment($totalPayment);
}

class Store
{
    protected $paymentProcessor;

    public function __construct(PaymentProcessor $paymentProcessor)
    {
        $this->paymentProcessor = $paymentProcessor;
    }

    public function purchaseSomething(float $price, int $quantity)
    {
        $totalPayment = $price * $quantity;
        $this->paymentProcessor->makePayment($totalPayment);
    }
}

class PayPalPaymentProcessor implements PaymentProcessor
{
    protected $paypal;

    public function __construct($user)
    {
        $this->paypal = new PayPal($user);
    }

    public function makePayment($totalPayment)
    {
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

class CashPaymentProcessor implements PaymentProcessor
{
    protected $cash;

    public function __construct($user)
    {
        $this->cash = new Cash($user);
    }

    public function makePayment($totalPayment)
    {
        $this->cash->makePayment($totalPayment);
    }
}

class Cash
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

$store = new Store(new CashPaymentProcessor("user 1"));
$store->purchaseSomething(25.00, 2);

$store = new Store(new PayPalPaymentProcessor("user 2"));
$store->purchaseSomething(25.00, 2);
