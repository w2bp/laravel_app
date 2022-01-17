<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileAccessController extends Controller
{
    private $fname;
    private $public_fname;

    function __construct()
    {
        $this->fname = 'sample.txt';
        $this->public_fname = 'hello.txt';
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
        // $data = Storage::get($this->fname) . PHP_EOL . $msg;
        // Storage::put($this->fname, $data);
        Storage::append($this->fname, $msg);

        return redirect()->route('fileaccess');
    }

    public function index2()
    {
        $sample_msg = Storage::disk('public')->url($this->public_fname);
        $sample_data = Storage::disk('public')->get($this->public_fname);

        $data = [
            'msg' => $sample_msg,
            'data' => explode(PHP_EOL, $sample_data),
        ];

        return view('sample.index', $data);
    }

    public function other2($msg)
    {
        //dd($msg);
        Storage::disk('public')->prepend($this->public_fname, $msg);

        return redirect()->route('fileaccess2');
    }

    public function download(){
        return Storage::disk('public')->download($this->public_fname);
    }

    public function logs()
    {
        $dir = '/';
        $all = Storage::disk('logs')->allfiles($dir);

        $data = [
            'msg' => 'DIR: ' . $dir,
            'data' => $all,
        ];

        return view('sample.index', $data);
    }
}
