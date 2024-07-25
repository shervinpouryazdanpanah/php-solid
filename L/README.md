# Description of 'L' in SOLID

## Liskov Substitution Principle

The Liskov Substitution Principle (LSP) states:

> Let q(x) be a property provable about objects x of type T. Then q(y) should be provable for objects y of type S where S is a subtype of T.

This means that every subclass or derived class should be substitutable for its base or parent class.

### Example

In `false.php`, the `ReadOnlyNote` class can override the `save` function that exists in the parent class `Note`, which violates the Liskov Substitution Principle:

```php
<?php
class Note
{
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function save($text)
    {
        //saving process
    }
}

class ReadOnlyNote extends Note
{
    public function save($text)
    {
        throw new Error("Can't save or update");
    }
}

$note = new ReadOnlyNote(1);
$note->save("Saving note");

```

However, the child class should not change the behavior of the parent function. Instead, you should create another class for the `save` function and remove it from the parent class:

```php
<?php
class Note
{
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
}

class WriteNote extends Note
{
    public function save($text)
    {
        //saving process
    }
}

class ReadOnlyNote extends Note
{
}

$note = new WriteNote(1);
$note->save("Saving note");

```

This approach ensures that the `ReadOnlyNote` class does not violate the Liskov Substitution Principle, and each class maintains a clear and appropriate responsibility.