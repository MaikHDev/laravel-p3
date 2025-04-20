<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        if (auth()->check()){
            $products = Contact::all();
            return view('contact', ['forms' => $products]);
        }
        else{
            return view('contact');
        }
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        Contact::create($data);

        return redirect(route('contact.index'))->with('success', 'Form has been successfully submitted!');
    }
}
