<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Auth;
use File;

class ContactUsController extends Controller
{
    //

    public function index()
    {
         return view('screens.contact-us');
    }

    public function store(Request $request)
    {
        try
        {
          if($file = $request->file('file'))
            {
                $path = 'files/contact-us/';
                if(!file_exists(public_path().'/'.$path)) 
                {
                  $path = 'files/contact-us/';
                   File::makeDirectory(public_path().'/'.$path,0777,true);
                } 
                $name = time().$file->getClientOriginalName();
                $file->move('files/contact-us/',$name);
                $contactus= new ContactUs();
                $contactus->subject=$request->subject;
                $contactus->email=$request->email;
                $contactus->message=$request->message;
                $contactus->attachement=$name;
                if(Auth::check())
                {
                    $contactus->user_id=Auth::user()->id;
                }
                $contactus->save();
                toastr()->success('Your Request Submitted Successfully!');
                return back();
            }
        }
        catch (\Exception $exception)
        {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
}
