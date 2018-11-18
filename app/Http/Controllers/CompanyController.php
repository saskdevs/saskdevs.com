<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'website' => 'nullable|url'
        ]);

        $company = Company::create(array_merge($data, [
            'user' => $request->user()
        ]));

        $company->users()->attach($request->user());

        return redirect()->route('companies.show', [$company]);
    }

    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
    }
}
