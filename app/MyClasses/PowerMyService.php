<?php

namespace App\MyClasses;

class PowerMyService implements MyServiceInterface
{
    private $id = -1;
    private $msg = 'no id..';
    private $data = ['いちご', 'りんご', 'バナナ', 'みかん', 'ぶどう'];
    private $serial;

    function __construct()
    {
        $this->setid(rand(0, count($this->data)));

        $this->serial = rand();
        echo "[" . $this->serial . "]";
    }

    public function setId($id)
    {
        if($id >= 0 && $id < count($this->data))
        {
            $this->id = $id;
            $this->msg = "あなたが好きなのは、" . $id . "番の" . $this->data[$id] . "ですね";
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

    public function setData($data)
    {
        $this->data = $data;
    }

    public function allData()
    {
        return $this->data;
    }
}