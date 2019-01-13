<?php

namespace App\Http\Controllers;

use App\Company;
use App\Vacancy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'vacancies' => Vacancy::latest()->take(3)->get(),
            'companies' => Company::latest()->take(3)->get(),
        ]);
    }
}
