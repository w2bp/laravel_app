<?php

namespace App\MyClasses;

class MyService implements MyServiceInterface
{
    private $id;
    private $msg;
    private $data;
    private $serial;

    private $myservice;

    function __construct()
    {
        $this->msg = 'Hello! This is MyService!!';
        $this->data = ['Hello', 'Welcome', 'Bye'];

        // $this->serial = rand();
        // echo "[" . $this->serial . "]";
    }

    // public static function getInstance()
    // {
    //     return self::$myservice ?? self::$myservice = new MyService();
    // }

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

    public function data(int $id)
    {
        return $this->data[$id];
    }

    public function allData(){
        return $this->data;
    }
}