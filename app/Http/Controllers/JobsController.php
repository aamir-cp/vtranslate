<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\JobsPairLanguages;
use App\Models\FavouriteJobs;
use App\Models\JobProposal;
use App\Mail\JobApplyEmail;
use App\Mail\JobCopyEmail;
use App\Models\JobViews;
use App\Models\Country;
use Auth;
use DB;
use Mail;

class JobsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('screens.job-posting');
    }

    //save job
    public function store(Request $request)
    {
        try {
            $jobsModel = new Jobs();
            $jobsModel->job_title = $request->job_title;
            $jobsModel->budget = $request->job_budget;
            $jobsModel->job_desc = $request->job_desc;
            $jobsModel->job_type = $request->job_type;
            $jobsModel->job_level = $request->job_type_level;
            if (isset($request->expiry_status)) {
                $jobsModel->expiry_status = 1;
                $jobsModel->expiry_date = $request->expiry_date;
            } else {
                $jobsModel->expiry_status = 0;
            }
            if (isset($request->cerfity)) {
                $jobsModel->certify = 1;
            } else {
                $jobsModel->certify = 0;
            }
            $jobsModel->user_id = Auth::user()->id;
            $jobsModel->save();
            $jobsid = $jobsModel->id;
            for ($i = 0; $i < count($request->from_language); $i++) {
                $JobsPairLanguages = new JobsPairLanguages();
                $JobsPairLanguages->from_lang = $request->from_language[$i];
                $JobsPairLanguages->to_lang = $request->to_language[$i];
                $JobsPairLanguages->jobs_id = $jobsid;
                $JobsPairLanguages->save();
            }

            toastr()->success('Jobs Saved Successfully!');
            return back();
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
    //make job favourite
    public function make_job_fav(Request $request)
    {
        $jobs_id = $request->jobs_id;
        $FavouriteJobs = new FavouriteJobs();
        $FavouriteJobs->jobs_id = $jobs_id;
        $FavouriteJobs->user_id = Auth::user()->id;
        if ($FavouriteJobs->save()) {
            echo "success";
        } else {
            echo "error";
        }
    }

    //remove from favourite

    public function remove_job_fav(Request $request)
    {
        $jobs_id = $request->jobs_id;
        $res = FavouriteJobs::where('jobs_id', $jobs_id)->where('user_id', Auth::user()->id)->delete();
        if ($res) {
            echo "success";
        } else {
            echo "error";
        }
    }

    //jobs details page work
    public function job_details($id)
    {
        try {
            $jobs_details = DB::table('jobs')
                ->select('*')
                ->join('users', 'users.id', '=', 'jobs.user_id')
                ->join('countries', 'countries.id', '=', 'users.country_id')
                ->join('jobs_pair_languages', 'jobs_pair_languages.jobs_id', '=', 'jobs.id')
                ->leftjoin('user_specializations', 'user_specializations.user_id', '=', 'users.id')
                ->leftjoin('user_general_information', 'users.id', '=', 'user_general_information.user_id')
                ->where(['jobs.id' => $id])
                ->get();
            //view jobs for login translator
            $checkcurrentuserview = JobViews::where('jobs_id', $id)->where('user_id', Auth::user()->id)->count();
            if (Auth::user()->user_status == "Translator" && $checkcurrentuserview == 0) {
                $jobsview = new JobViews();
                $jobsview->user_id = Auth::user()->id;
                $jobsview->jobs_id = $id;
                $jobsview->save();
            }
            //count job proposals
            $job_proposal_counts = JobProposal::where('jobs_id', $id)->count();
            //jobs views count
            $jobviewcount = JobViews::where('jobs_id', $id)->count();
            //check if job is already applied
            $jobapplystatus = JobProposal::where('jobs_id', $id)->where('user_id', Auth::user()->id)->count();
            return view('screens.job-detail', compact('jobs_details', 'job_proposal_counts', 'jobapplystatus', 'jobviewcount'));
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }
    //sned message against job OR PROPOSAL
    public function job_send_message(Request $request)
    {
        try {
            $jobproposal = new JobProposal();
            $jobproposal->from = $request->from;
            $jobproposal->subject = $request->subject;
            $jobproposal->message = $request->message;
            $jobproposal->user_id = Auth::user()->id;
            $jobproposal->jobs_id = $request->jobid;
            if (isset($request->send_copy)) {
                $jobproposal->copy_self = 1;
            }
            if (isset($request->inclue_profile_link)) {
                $jobproposal->include_link = 1;
            }
            if ($jobproposal->save()) {

                $data = [
                    'from' => $request->from,
                    'subject' => $request->subject,
                    'messsage' => $request->message,
                    'job_poster_name' => $request->job_poster_name,
                ];
                //send email to job poster
                Mail::to($request->job_poster_email)->send(new JobApplyEmail($data));
                if (isset($request->send_copy)) {
                    //send email to translator
                    Mail::to(Auth::user()->email)->send(new JobCopyEmail($data));
                }
                toastr()->success('Job Apply Successfully');
                return back();
            }
        } catch (\Exception $exception) {
            toastr()->error('Something went wrong, try again');
            return back();
        }
    }

    //favourite jobs
    public function favourite_job()
    {
        $countries = Country::get();
        $FavouriteJobs = jobs::with('user')->with('jobspairlang')->with('jobproposals')
            ->with('favourite')->where('status', 1)
            ->where(function ($query) {
                $query = $query->whereHas('favourite', function ($query) {
                    $query->where('favourite_jobs.user_id', '=', Auth::user()->id);
                });
            })
            ->paginate(20);
        //dd($FavouriteJobs);
        return view('screens.favourite-job', compact('FavouriteJobs', 'countries'));
    }

    //search job on home page
    public function favourite_job_search(Request $request)
    {
        $FavouriteJobs = Jobs::with('jobspairlang')->with('user')
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
            ->where(function ($query) {
                $query = $query->whereHas('favourite', function ($query) {
                    return $query->where('favourite_jobs.user_id', '=', Auth::user()->id);
                });
            })
            ->paginate(20);
        $countries = Country::get();
        return view('screens.favourite-job', compact('FavouriteJobs', 'countries'));
    }
}
