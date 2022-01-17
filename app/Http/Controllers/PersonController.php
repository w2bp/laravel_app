<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    //
    public function index(Person $person)
    {
        $data = ['msg' => $person];
        return view('hello.index', $data);
    }
}
