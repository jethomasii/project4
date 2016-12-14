<?php

namespace project4\Http\Controllers;

use Illuminate\Http\Request;

use project4\Http\Requests;


class PageController extends Controller
{

    public function welcome(Request $request) {

        if($request->user()) {
            return redirect('/tasks');
        }

        return view('welcome');

    }

    /**
	*
	*/
    public function help() {
        return 'This page should show help information';
    }

    /**
	*
	*/
    public function faq() {
        return 'This page should show a list of frequently asked questions';
    }

}
