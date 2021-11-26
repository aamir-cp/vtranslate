<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\JobsPairLanguages;
use App\Models\User;
use App\Models\Country;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries = Country::get();
        $totaltranslater = User::where('user_status', 'Translator')->count();
        $jobs = jobs::with('user')->with('jobspairlang')->with('jobproposals')->where('status', 1)->paginate(20);
        return view('screens.home', compact('jobs', 'totaltranslater', 'countries'));
    }
    //search job on home page
    public function job_search(Request $request)
    {
        $jobs = Jobs::with('jobspairlang')->with('user')
            ->where('status', 1)
            ->when($request->job_type, function ($query) use ($request) {
                return $query->where('job_type', $request->job_type);
            })
            ->when($request->country, function ($query) use ($request) {
                $query = $query->whereHas('user', function ($query) {
                    $query->orwhere('country_id', '=', \Request::input('country'));
                });
            })
            ->when($request->language, function ($query) use ($request) {
                return $query->whereHas('jobspairlang', function ($query) {
                    $query->orwhere('from_lang', '=', \Request::input('language'))->orwhere('to_lang', '=', \Request::input('language'));
                });
            })
            ->paginate(20);
        $countries = Country::get();
        $totaltranslater = User::where('user_status', 'Translator')->count();
        return view('screens.home', compact('jobs', 'totaltranslater', 'countries'));
    }
}
