<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileAccessController extends Controller
{
    private $fname;

    function __construct()
    {
        $this->fname = 'sample.txt';
    }

    //
    public function index()
    {
        $sample_msg = $this->fname;
        $asmple_data = Storage::get($this->fname);
        $data =[
            'msg' => $sample_msg,
            'data' => explode(PHP_EOL, $asmple_data),
        ];

        return view('sample.index', $data);
    }

    public function other($msg)
    {
        $data = Storage::get($this->fname) . PHP_EOL . $msg;
        Storage::put($this->fname, $data);

        return redirect()->route('fileaccess');
    }
}
