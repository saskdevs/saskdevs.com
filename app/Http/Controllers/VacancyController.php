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

    public function create()
    {
        return view('vacancy.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $vacancy = Vacancy::create(array_merge($data, [
            'user' => $request->user(),
        ]));

        return redirect()->route('vacancies.show', [$vacancy]);
    }

    public function show(Vacancy $vacancy)
    {
        return view('vacancy.show', ['vacancy' => $vacancy]);
    }

}
