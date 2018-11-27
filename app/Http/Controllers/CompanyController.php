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
            'description' => 'nullable|max:10000',
        ]);

        $slug = str_slug($data['name']);
        $counter = 1;

        while (Company::whereSlug($slug)->exists()) {
            $slug = str_slug($data['name']) . '-' . $counter;
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('company-photos');
        }

        $company = Company::create(array_merge($data, [
            'user' => $request->user(),
            'slug' => $slug,
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
            'description' => 'nullable|max:10000',
        ]);

        $company->fill($data)->save();

        return redirect()->route('companies.show', [$company]);
    }
}
