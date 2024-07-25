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
