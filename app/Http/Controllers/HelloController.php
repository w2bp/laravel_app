<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\MyService;

class HelloController extends Controller
{
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

    public function service(MyService $myservice, $id = -1)
    {
        $myservice->setId($id);

        $data = [
            'msg' => $myservice->say(),
            'data' => $myservice->data()
        ];

        return view('sample.index', $data);
    }
}
