<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Company;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function __invoke()
    {
        $cards = Company::all();
        return view('index', ['cards' => $cards]);
    }
}
