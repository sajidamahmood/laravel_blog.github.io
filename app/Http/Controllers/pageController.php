<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class pageController extends Controller
{
        public function legals(): View
        {
            return view('legals',
            ['title'=>'legals',
            'content'=> 'first title in laravel',
            'item' => '$items']);
        }
    }
    

