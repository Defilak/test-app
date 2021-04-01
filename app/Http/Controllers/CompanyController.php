<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Schema;

class CompanyController extends Controller
{
    public function index($id)
    {
        $company = Company::findOrFail($id);


        return view('company_page', [
            'cols' => Schema::getColumnListing('companies'),
            'company' => $company
        ]);
    }
}
