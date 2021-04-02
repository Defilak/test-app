<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Company;
use App\Models\Comment;

class CompanyController extends Controller
{
    public function index($id)
    {
        $company = Company::findOrFail($id);

        /*$comments = !Auth::check() ? [] : $company->comments->filter(function($item) {
            return $item->user_id == Auth::id();
        });*/
        $comments = $company->comments;

        return view('company_page', [
            'cols' => Schema::getColumnListing('companies'),
            'company' => $company,
            'comments' => $comments
        ]);
    }

    public function newComment(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $validator = Validator::make($request->all(), [
            'text' => 'required|max:255'
        ]);

        if ($validator->fails()) {

            if ($request->ajax()) {
                return response()
                    ->json($validator->errors()->all(), 422);
            }

            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'company_id' => $id,
            'company_type' => $request->input('company_type'),
            'text' => $request->input('text')
        ]);

        if ($request->ajax()) {
            return response([
                'name' => Auth::user()->name,
                'comment' => $comment,
            ], 200);
        }

        return redirect("/company/$id");
    }

    public function addCompany(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:companies|max:50',
            'inn' => 'required|max:12',
            'description' => 'required|max:255',
            'director' => 'required|max:50',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:20',
        ]);

        if ($validator->fails()) {

            if ($request->ajax()) {
                return response()
                    ->json($validator->errors()->all(), 422);
            }

            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $company = Company::create($request->all());

        if ($request->ajax()) {
            return response($company, 200);
        }

        return redirect('/');
    }
}
