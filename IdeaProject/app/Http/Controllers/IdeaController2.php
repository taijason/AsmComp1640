<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController2 extends Controller
{
    public function index()
    {
        $data = Idea::get();
        return view('customer.home', compact('data'));
    }

    public function getIdeas()
    {
        $data = Idea::get();
        return view('customer.products', compact('data'));
    }
}
