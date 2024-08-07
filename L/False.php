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
