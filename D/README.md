# Description of 'D' in SOLID

## Dependency Inversion Principle

Dependency inversion principle states:

> Entities must depend on abstractions, not on concretions. It states that the high-level module must not depend on the low-level module, but they should depend on abstractions.

### Example:

In summary, the parent class shouldn't depend on the child class.

In `false.php`, the `Store` class depends directly on the `PayPal` class. If you want to add a new payment method like cash, you must change the `Store` class.

```php
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
```

To adhere to the Dependency Inversion Principle, you should create an interface to define the `makePayment` function. Then, implement this interface in all payment classes such as `Cash` and `PayPal`.

This allows you to add another payment method in the future without changing the parent class.

```php
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

```

  

This way, you can add new payment methods without modifying the `Store` class.
