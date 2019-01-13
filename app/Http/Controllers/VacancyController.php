<?php

namespace App\Http\Controllers;

use App\Company;
use App\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->middleware('auth')->except(['show', 'index']);
        $this->request = $request;
    }

    public function index()
    {
        return view('vacancy.index', ['vacancies' => Vacancy::latest()->get()]);
    }

    public function create()
    {
        if ($this->request->user()->cant('create', Vacancy::class)) {
            return redirect()->route('home')->with('danger', 'You need to be on a company before you can create a job posting.');
        }

        return view('vacancy.create');
    }

    public function store()
    {
        if ($this->request->user()->cant('create', Vacancy::class)) {
            return redirect()->route('home')->with('danger', 'You need to be on a company before you can create a job posting.');
        }

        $data = $this->request->validate([
            'title' => 'required',
            'description' => 'required|max:20000',
            'email' => 'required|email',
            'company_id' => 'required|exists:companies,id',
        ]);

        $user = $this->request->user();

        if (!$user->isOnCompany($data['company_id'])) {
            return redirect()->back()->withInput()->withErrors(['company_id' => 'You do not belong to that company']);
        }

        $vacancy = Vacancy::create(array_merge($data, [
            'user' => $user,
            'company' => Company::find($data['company_id']),
        ]));

        return redirect()->route('vacancies.show', [$vacancy]);
    }

    public function show(Vacancy $vacancy)
    {
        return view('vacancy.show', ['vacancy' => $vacancy]);
    }

    public function edit(Vacancy $vacancy)
    {
        if ($this->request->user()->cant('update', $vacancy)) {
            return abort(401);
        }

        return view('vacancy.edit', ['vacancy' => $vacancy]);
    }

    public function update(Vacancy $vacancy)
    {
        if ($this->request->user()->cant('update', $vacancy)) {
            return abort(401);
        }

        if (isset($request->delete)) {
            return $this->delete($vacancy);
        }

        $data = $this->request->validate([
            'title' => 'required',
            'email' => 'required|email',
            'description' => 'required|max:20000',
        ]);

        $vacancy->fill($data)->save();

        return redirect()->route('vacancies.show', [$vacancy]);
    }

    public function delete(Vacancy $vacancy)
    {
        if ($this->request->user()->cant('delete', $vacancy)) {
            return abort(401);
        }

        $company = $vacancy->company;

        $vacancy->delete();

        return redirect()->route('companies.show', [$company]);
    }
}
