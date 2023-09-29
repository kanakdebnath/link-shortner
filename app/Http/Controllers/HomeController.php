<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home(){
        
        if(Auth::user()){
            if(Auth::user()->user_type == 'admin'){
                return view('admin.dashboard');
            }elseif(Auth::user()->user_type == 'user'){
                return view('admin.dashboard');
            }else{
                return redirect()->route('login');
            }

        }else{
            return redirect()->route('login');
        }
    }


    public function index(){
        return view('frontend.index');
    }

    public function login(){
        return view('frontend.login');
    }
    public function register(){
        return view('frontend.register');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }


     // all Contacts
     public function contactIndex(){
        $results = Contact::orderBy('id','DESC')->paginate(15);
        return view('admin.contact.index',compact('results'));
    }


    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->message = $request->get('message');
        if ($contact->save()) {
            return view('frontend.index')->with('success','Thanks for your Feedback. We will contact Soon');
        } else {
            return redirect()->back()->with('message','An error occurred while saving the data');
        }

    }

    
}
