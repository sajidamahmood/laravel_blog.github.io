<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class about_usController extends Controller
{
    
    public function about_us(): View
    {
        $items = array(
            "test",
            "test2"
        );

        return view( 'about_us',
        ['title'=>'about_us',
        'content'=> 'im creating first title in laravel',
        'items' => $items]);
    }

}
