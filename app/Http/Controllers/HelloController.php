<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;

class HelloController extends Controller
{
    
    function __construct(MyServiceInterface $myservice)
    {
        $myservice = app('App\MyClasses\PowerMyService');
    }

    //
    public function index($id)
    {
        if(empty($id)){
            $data = ['msg' => 'this is sample message',];
        } else {
            $data = ['msg' => 'id = ' . $id,];
        }
        
        return view('sample.index', $data);
    }

    public function other()
    {
        return redirect()->route('hello');
    }

    public function hello(Request $request)
    {
        $data = ['msg' => $request->hello];
        return view ('sample.index', $data);
    }

    public function bye(Request $request)
    {
        $data = ['msg' => $request->bye];
        return view('sample.index', $data);
    }

    public function service(MyServiceInterface $myservice, $id = -1)
    {
        // $myservice->setId($id);

        $data = [
            'msg' => $myservice->say(),
            'data' => $myservice->allData()
        ];

        return view('sample.index', $data);
    }
}
