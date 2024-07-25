# Description of 'S' in SOLID

## Single-Responsibility Principle

Single-responsibility Principle (SRP) states:

> A class should have one and only one reason to change, meaning that a class should have only one job.

- Example

  The file `OrderManagerF.php` contains one class that must perform several tasks:

- Converting to JSON
  - Processing the payment
- Sending an email

```php
  <?php

  class OrderManager
{
      public function process()
    {
          // This function manages orders
    }

    public function toJson()
      {
        // This function converts the order to JSON
      }

      public function paymentWithCash()
    {
          // This function processes the payment with cash
    }

    public function sendEmail()
      {
        // This function sends an email
      }
}

```

However, to adhere to the SRP, you should create separate classes for each task, as shown in the code below:

```php
<?php

class OrderManager
{
    public function process()
    {
        Json::convert($this->order);
        Payment::Cash($this->order);
        Notification::sendEmail($this->order);
    }
}

class Json
{
    public static function convert($order)
    {
        // Implementation for converting to JSON
    }
}

class Payment
{
    public static function cash($order)
    {
        // Implementation for processing payment with cash
    }
}

class Notification
{
    public static function sendEmail($order)
    {
        // Implementation for sending an email
    }
}
```

This approach ensures that each class has a single responsibility, making the code easier to maintain and extend.
