<?php

namespace App\Http\Controllers;

use App\Company;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->request = $request;
    }

    public function index()
    {
        $companies = Company::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
        return view('company.index', ['companies' => $companies]);
    }

    public function create()
    {
        if (!$this->request->user()->isAdmin()) {
            return abort(403);
        }

        return view('company.create');
    }

    public function store(Request $request)
    {
        if (!$this->request->user()->isAdmin()) {
            return abort(403);
        }

        $data = $request->validate([
            'name' => 'required',
            'website' => 'nullable|url',
            'photo' => 'nullable|image|max:2000',
            'description' => 'nullable|max:10000',
            'location_id' => 'nullable|exists:locations,id',
        ]);

        $slug = str_slug($data['name']);
        $counter = 1;

        while (Company::whereSlug($slug)->exists()) {
            $slug = str_slug($data['name']) . '-' . $counter;
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('company-photos');
        }

        if ($request->filled('location_id')) {
            $data['location'] = Location::findOrFail($request->get('location_id'));
        }

        $company = Company::create(array_merge($data, [
            'user' => $request->user(),
            'slug' => $slug,
        ]));

        $company->invitation()->create([
            'token' => Str::random(16),
        ]);

        return redirect()->route('companies.show', [$company]);
    }

    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
    }

    public function edit(Company $company, Request $request)
    {
        if ($request->user()->cant('update', $company)) {
            return abort(403);
        }

        return view('company.edit', ['company' => $company]);
    }

    public function update(Company $company, Request $request)
    {
        if ($request->user()->cant('update', $company)) {
            return abort(403);
        }

        $data = $request->validate([
            'name' => 'required',
            'website' => 'nullable|url',
            'description' => 'nullable|max:10000',
            'location_id' => 'nullable|exists:locations,id',
        ]);

        if ($request->filled('location_id')) {
            $data['location'] = Location::findOrFail($request->get('location_id'));
        }

        $company->fill($data)->save();

        return redirect()->route('companies.show', [$company]);
    }
}
