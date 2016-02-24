<?php

namespace Newsletter\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function getIndex()
    {
    	return view('newsletter::newsletterform');
    }

    public function postIndex(Request $request){
    	return 'Votre nom est' . $request->input('nom');
    }

    public function getTartenpion(){
    	return 'coucou';
    }
}
