<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserGeneralInformation;
use App\Models\UserLanguages;
use App\Models\UserVoiceOver;
use App\Models\UserSpecializations;
use App\Models\UserSoftware;
use App\Models\UserFiles;
use App\Models\UserMotherLanguages;
use App\Models\UserServicesRates;
use App\Models\Country;
use DB;

class FreelancerController extends Controller
{
    //

    public function index()
    {
        
        $FreelancerData=User::with('usergeneralinfo','userlanguages','usersoftwares','userspicialize','uservoicover','userfiles','usermotherlanguages','usersevices')->where('user_status','Translator')->paginate(12);
         return view('screens.freelancer.top-freelancer',compact('FreelancerData'));
    }

    //search Freelancer
    public function search_freelancer()
    {
         $allafreelancermembers=User::where('user_status','Translator')->get();
         $FreelancerData=User::with('usergeneralinfo','userlanguages','usersoftwares','userspicialize','uservoicover','userfiles','usermotherlanguages','usersevices')->where('user_status','Translator')->get();
         $countries=Country::get();
         return view('screens.freelancer.search-freelancer',compact('FreelancerData','countries','allafreelancermembers'));
    }
    public function search(Request $request)
    {
         $allafreelancermembers=User::where('user_status','Translator')->get();
         $countries=Country::get();
         $FreelancerData=User::with('usergeneralinfo','userlanguages','usersoftwares','userspicialize','uservoicover','userfiles','usermotherlanguages','usersevices')
         
          ->when($request->freelancerid, function($query) use ($request){
              return $query->orwhere('id', $request->freelancerid);
          })
           ->when($request->keyword, function($query) use ($request){
              return $query->whereHas('usergeneralinfo', function($query) {
                    $query->orwhere('special_keywords', '=', \Request::input('keyword'));
                    });
          })
         ->when($request->languages, function($query) use ($request){
              return $query->whereHas('userlanguages', function($query) {
                    $query->orwhere('from_languages', '=', \Request::input('languages'))->orwhere('to_languages', '=', \Request::input('languages'));
                    });
          })
         ->when($request->country, function($query) use ($request){
                    return $query->orwhere('country_id', '=',$request->country);    
          })
         ->where('user_status','Translator')
         ->get();
         return view('screens.freelancer.search-freelancer',compact('FreelancerData','allafreelancermembers','countries'));
        
    }
}
