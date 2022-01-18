<?php

namespace App\MyClasses;

class MyService
{
    private $id;
    private $msg;
    private $data;

    public function __construct()
    {
        $this->msg = 'Hello! This is MyService!!';
        $this->data = ['Hello', 'Welcome', 'Bye'];
    }

    public function setId($id)
    {
        $this->id = $id;
        if($id >= 0 && $id < count($this->data))
        {
            $this->msg = "Selected id:" . $id . ', data:' . $this->data[$id] . '';
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data()
    {
        return $this->data;
    }
}