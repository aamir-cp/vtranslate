<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\UserGeneralInformation;
use App\Models\UserLanguages;
use App\Models\UserVoiceOver;
use App\Models\UserSpecializations;
use App\Models\UserSoftware;
use App\Models\UserFiles;
use App\Models\UserMotherLanguages;
use App\Models\UserServicesRates;
use Auth;
use File;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    //user profile 
    public function profile()
    {
        $countries = Country::get();
        $userData = User::with('usergeneralinfo', 'userlanguages', 'usersoftwares', 'userspicialize', 'uservoicover', 'userfiles', 'usermotherlanguages', 'usersevices')->where('id', Auth::user()->id)->get();
        //dd($userData[0]->userspicialize->spicializations);
        return view('screens.profile', compact('countries', 'userData'));
    }

    //user chagne status translater or employer
    public function change_status(Request $request)
    {
        try {
            $user_id = Auth::user()->id;
            $user_data = User::find($user_id)->update([
                'user_status' => $request->user_status,
            ]);
            toastr()->success('User Status Changed Successfull!');
            return \Redirect::route('profile')->with('currtab', $request->currtab);
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', $request->currtab);
        }
    }

    //save general info of user
    public function save_general_info(Request $request)
    {

        $input = $request->except('_token', 'currtab', 'private_information', 'disallow_indexing', 'display_contact_info', 'news_notification', 'jobsnotification', 'show_rated_users');
        try {
            $record = UserGeneralInformation::where('user_id', Auth::user()->id)->first();
            $input['user_id'] = Auth::user()->id;
            if (!$record) {
                UserGeneralInformation::create($input);
            } else {
                UserGeneralInformation::where('user_id', Auth::user()->id)->update($input);
            }

            //update record in user table
            $userdata = User::find(Auth::user()->id);
            $userdata->private_information = isset($request->private_information) ? 1 : 0;
            $userdata->disallow_indexing = isset($request->disallow_indexing) ? 1 : 0;
            $userdata->display_contact_info = isset($request->display_contact_info) ? 1 : 0;
            $userdata->news_notification = isset($request->news_notification) ? 1 : 0;
            $userdata->jobsnotification = isset($request->jobsnotification) ? 1 : 0;
            $userdata->show_rated_users = isset($request->show_rated_users) ? 1 : 0;
            $userdata->save();
            //toaster message
            toastr()->success('User Gneral Info Saved Successfull!');
            return \Redirect::route('profile')->with('currtab', $request->currtab);
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', $request->currtab);
        }
    }
    //upload resume
    public function upload_resume(Request $request)
    {
        try {

            if ($file = $request->file('resume')) {
                $path = 'files/resume/';
                if (!file_exists(public_path() . '/' . $path)) {
                    $path = 'files/resume/';
                    File::makeDirectory(public_path() . '/' . $path, 0777, true);
                }
                if (Auth::user()->resume) //if already resume unlink resume and upload new one
                {
                    unlink(public_path() . '/files/resume/' . Auth::user()->resume);
                }
                $name = time() . $file->getClientOriginalName();
                $file->move('files/resume/', $name);
                $userModel = User::find(Auth::user()->id);
                $userModel->resume = $name;
                $userModel->save();
                //toaster message
                toastr()->success('User Resume Saved Successfull!');
                return \Redirect::route('profile')->with('currtab', $request->currtab);
            }
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', $request->currtab);
        }
    }

    //save languages
    public function user_save_languages(Request $request)
    {
        try {
            $UserLanguages = new UserLanguages();
            $UserLanguages->from_languages = $request->from_languages;
            $UserLanguages->to_languages = $request->to_languages;
            $UserLanguages->user_id = Auth::user()->id;
            $UserLanguages->save();
            toastr()->success('User Language Saved Successfull!');
            return \Redirect::route('profile')->with('currtab', $request->currtab);
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', $request->currtab);
        }
    }
    //save mother languages
    public function user_mother_languages(Request $request)
    {
        try {
            $MotherLanguages = new UserMotherLanguages();
            $MotherLanguages->mother_language = $request->mother_language;
            $MotherLanguages->user_id = Auth::user()->id;
            $MotherLanguages->save();
            toastr()->success('User Mother Language Saved Successfull!');
            return \Redirect::route('profile')->with('currtab', $request->currtab);
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', $request->currtab);
        }
    }

    //save user services rates
    public function save_services_rates(Request $request)
    {
        try {
            $UserServicesRates = new UserServicesRates();
            $UserServicesRates->service = $request->service;
            $UserServicesRates->pair_language = $request->pair_language;
            $UserServicesRates->min_rate_per_word = $request->min_rate_per_word;
            $UserServicesRates->min_rate_per_minute = $request->min_rate_per_minute;
            $UserServicesRates->user_id = Auth::user()->id;
            $UserServicesRates->save();
            toastr()->success('User Services Saved Successfull!');
            return \Redirect::route('profile')->with('currtab', $request->currtab);
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', $request->currtab);
        }
    }

    //save voice over languages
    public function save_voice_over(Request $request)
    {
        try {
            //check if language alreayd exist
            $exist = UserVoiceOver::where('language', $request->language)->where('user_id', Auth::user()->id)->first();
            if (!$exist) {
                $UserVoiceOver = new UserVoiceOver();
                $UserVoiceOver->language = $request->language;
                $UserVoiceOver->user_id = Auth::user()->id;
                $UserVoiceOver->save();
                toastr()->success('User VoiceOver Language Saved Successfull!');
            } else {
                toastr()->error('User VoiceOver Language Already Added');
            }
            return \Redirect::route('profile')->with('currtab', $request->currtab);
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', $request->currtab);
        }
    }

    //save specializtions
    public function save_specializations(Request $request)
    {
        try {
            //if record exist then delete
            $record = UserSpecializations::where('user_id', Auth::user()->id)->first();
            if ($record) {
                UserSpecializations::where('user_id', Auth::user()->id)->update([
                    'spicializations' => $request->spicializations,
                ]);
            } else {
                $UserSpecializations = new UserSpecializations();
                $UserSpecializations->spicializations = $request->spicializations;
                $UserSpecializations->user_id = Auth::user()->id;
                $UserSpecializations->save();
            }
            toastr()->success('User specializtions Saved Successfull!');
            return \Redirect::route('profile')->with('currtab', $request->currtab);
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', $request->currtab);
        }
    }

    //save software tools
    public function save_software_tools(Request $request)
    {
        try {
            $record = UserSoftware::where('user_id', Auth::user()->id)->first();
            if ($record) {
                UserSoftware::where('user_id', Auth::user()->id)->update([
                    'software_tools' => $request->softwares,
                ]);
            } else {
                $UserSoftware = new UserSoftware();
                $UserSoftware->software_tools = $request->softwares;
                $UserSoftware->user_id = Auth::user()->id;
                $UserSoftware->save();
            }
            toastr()->success('User Softwares Saved Successfull!');
            return \Redirect::route('profile')->with('currtab', $request->currtab);
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', $request->currtab);
        }
    }

    //save user files
    public function user_save_files(Request $request)
    {
        try {
            if ($file = $request->file('file')) {
                $path = 'files/userfiles/';
                if (!file_exists(public_path() . '/' . $path)) {
                    $path = 'files/userfiles/';
                    File::makeDirectory(public_path() . '/' . $path, 0777, true);
                }
                $name = time() . $file->getClientOriginalName();
                $size = $file->getSize();
                $file->move('files/userfiles/', $name);
            }
            $UserFiles = new UserFiles();
            $UserFiles->file_title = $request->file_title;
            $UserFiles->file = $name;
            $UserFiles->file_size = $size;
            $UserFiles->purpose = $request->purpose;
            $UserFiles->language = $request->language;
            $UserFiles->comments = $request->comments;
            $UserFiles->user_id = Auth::user()->id;
            $UserFiles->save();
            toastr()->success('User Files Saved Successfully!!');
            return \Redirect::route('profile');
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }

    //delete user language
    public function delete_user_languages(Request $request)
    {
        try {
            UserLanguages::find($request->id)->delete();
            toastr()->success('User Language Deleted Successfull!');
            return \Redirect::route('profile')->with('currtab', 'languages');
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', 'languages');
        }
    }
    //delte mother langugaes
    public function delete_mother_languages(Request $request)
    {
        try {
            UserMotherLanguages::find($request->id)->delete();
            toastr()->success('Mother Language Deleted Successfull!');
            return \Redirect::route('profile')->with('currtab', 'languages');
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', 'languages');
        }
    }
    //delete voiceover language
    public function delete_voiceover_language(Request $request)
    {
        try {
            UserVoiceOver::find($request->id)->delete();
            toastr()->success('VoiceOver Language Deleted Successfull!');
            return \Redirect::route('profile')->with('currtab', 'voiceover');
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back()->with('currtab', 'voiceover');
        }
    }
    //delete user files
    public function delete_user_files(Request $request)
    {

        try {
            foreach ($request->user_files as $key => $file) {
                UserFiles::find($file)->delete();
            }
            toastr()->success('Files  Deleted Successfull!');
            return \Redirect::route('profile');
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }

    //delete service rates
    public function delete_service_rates(Request $request)
    {
        try {
            UserServicesRates::find($request->id)->delete();
            toastr()->success('Service  Deleted Successfull!');
            return \Redirect::route('profile')->with('currtab', 'service_rates');
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }

    public function chagne_profile_photo(Request $request)
    {
        try {
            if ($file = $request->file('profilephoto')) {
                $path = 'profile-images/';
                if (!file_exists(public_path() . '/' . $path)) {
                    $path = 'profile-images/';
                    File::makeDirectory(public_path() . '/' . $path, 0777, true);
                }
                if (Auth::user()->profile_photo) //if already resume unlink resume and upload new one
                {
                    unlink(public_path() . '/profile-images/' . Auth::user()->profile_photo);
                }
                $name = time() . $file->getClientOriginalName();
                $size = $file->getSize();
                $file->move('profile-images/', $name);
            }

            User::find(Auth::user()->id)->update([
                'profile_photo' => $name,
            ]);
            toastr()->success('Profile Photo Changed Successfully');
            return \Redirect::route('profile');
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }

    //view user profile
    public function view_user_profile()
    {
        if (Auth::user()->user_status == 'Translator') {
            $userData = User::with('usergeneralinfo', 'userlanguages', 'usersoftwares', 'userspicialize', 'uservoicover', 'userfiles', 'usermotherlanguages', 'usersevices')->where('id', Auth::user()->id)->get();
            // dd($userData[0]->usergeneralinfo);
            return view('screens.freelancer.freelancer', compact('userData'));
        } else {
            $userData = User::with('usergeneralinfo', 'userlanguages', 'usersoftwares', 'userspicialize', 'uservoicover', 'userfiles', 'usermotherlanguages', 'usersevices')->where('id', Auth::user()->id)->get();
            return view('screens.agencies.agency', compact('userData'));
        }
    }

    //use public profile sprofile
    public function public_profile($id)
    {

        $userData = User::with('usergeneralinfo', 'userlanguages', 'usersoftwares', 'userspicialize', 'uservoicover', 'userfiles', 'usermotherlanguages', 'usersevices')->where('id', $id)->get();
        // dd($userData[0]->usergeneralinfo);
        return view('screens.freelancer.freelancer', compact('userData'));
    }

    //change user status
    public function change_user_status(Request $request)
    {
        try {
            $type = $request->type;
            if ($type == "profile") {
                $result = User::find(Auth::user()->id)->update(['private_information' => $request->status]);
            } elseif ($type == "availability") {
                $result = User::find(Auth::user()->id)->update(['status' => $request->status]);
            } elseif ($type == "ContactInfo") {
                $result = User::find(Auth::user()->id)->update(['display_contact_info' => $request->status]);
            } elseif ($type == "Rates") {
                $result = User::find(Auth::user()->id)->update(['show_rated_users' => $request->status]);
            } elseif ($type == "JobNotification") {
                $result = User::find(Auth::user()->id)->update(['jobsnotification' => $request->status]);
            } elseif ($type == "NewsNotification") {
                $result = User::find(Auth::user()->id)->update(['news_notification' => $request->status]);
            } elseif ($type == "ForumsNotification") {
                $result = 1;
            }
            if ($result) {
                echo "success";
            } else {
                echo "error";
            }
        } catch (\Exception $exception) {
            echo "error";
        }
    }
}
