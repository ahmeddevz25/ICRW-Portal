<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the Home page.
     */
    public function index()
    {
        return view('index.index');
    }

    /**
     * Display the Faculty & Leadership page.
     */
    public function faculty()
    {
        return view('index.faculty');
    }

    /**
     * Display the Workshop Details page.
     */
    public function workshopDetails()
    {
        return view('index.workshop-details');
    }
}

