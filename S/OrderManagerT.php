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
