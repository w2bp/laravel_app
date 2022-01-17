<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    function __construct()
    {
        config(['sample.message' => 'new message changed in construct']);
    }

    //
    public function index(Request $request)
    {
        // $data = ['msg' => 'SAMPLE-CONTROLLER-INDEX!!',];

        // return view('hello.index', $data);

        $sample_msg = config('sample.message');
        $sample_data = config('sample.data');

        $data = ['msg' => $sample_msg, 'data' => $sample_data];

        return view('sample.index', $data);
    }

    public function other(Request $request)
    {
        // $data = ['msg' => 'SAMPLE-CONTROLLER-OTHER!!'];

        // return view('hello.index', $data);
        return redirect()->route('hello');
    }
}
