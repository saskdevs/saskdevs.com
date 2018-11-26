<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all()->sortBy('name')->all();
        return view('company.index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'website' => 'nullable|url',
            'photo' => 'nullable|image|max:2000',
        ]);

        $company = Company::create(array_merge($data, [
            'user' => $request->user(),
            'photo' => $request->file('photo')->store('company-photos'),
        ]));

        $company->users()->attach($request->user());

        return redirect()->route('companies.show', [$company]);
    }

    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
    }

    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company]);
    }

    public function update(Company $company, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'website' => 'nullable|url',
        ]);

        $company->fill($data)->save();

        return redirect()->route('companies.show', [$company]);
    }
}
