<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        return view('home', ['vacancies' => Vacancy::latest()->get()]);
    }

    public function create(Request $request)
    {
        if ($request->user()->companies->count() === 0) {
            return redirect()->route('companies.create')->with('danger', 'You need to be on a company before you can create a job posting.');
        }

        return view('vacancy.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $user = $request->user();

        $company = $user->companies->firstWhere('id', $data['company_id']);

        if (!$company) {
            return redirect()->back()->withInput()->withErrors(['company_id' => 'You do not belong to that company']);
        }

        $vacancy = Vacancy::create(array_merge($data, [
            'user' => $user,
            'company' => $company,
        ]));

        return redirect()->route('vacancies.show', [$vacancy]);
    }

    public function show(Vacancy $vacancy)
    {
        return view('vacancy.show', ['vacancy' => $vacancy]);
    }

    public function edit(Vacancy $vacancy)
    {
        return view('vacancy.edit', ['vacancy' => $vacancy]);
    }

    public function update(Vacancy $vacancy, Request $request)
    {
        if (isset($request->delete)) {
            return $this->delete($vacancy);
        }

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $vacancy->fill($data)->save();

        return redirect()->route('vacancies.show', [$vacancy]);
    }

    public function delete(Vacancy $vacancy)
    {
        $company = $vacancy->company;

        $vacancy->delete();

        return redirect()->route('companies.show', [$company]);
    }
}
