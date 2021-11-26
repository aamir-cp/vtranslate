@extends('layouts.master' ,['page_title' => 'Job Details'])
@section('content')
<section id="profileBanner">
    <h3>Job Details</h3>
</section>
<section id="jobDetail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bidding</a>
                    </li>
                    @if(auth::user()->user_status=="Translator")
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Send a Message to the Job Poster</a>
                    </li>
                    @endif
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">All My Bids</a>
                    </li> -->
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="jobPosted commonDiv">
                                    <p class="text-center"><b>Job Posted By:</b></p>
                                    <img src="{{asset('profile-images/').'/'.$jobs_details[0]->profile_photo}}" alt="" class="img-fluid">
                                    <p><b>{{$jobs_details[0]->fname ?? ''}} {{$jobs_details[0]->lname ?? ''}}</b></p>
                                    <p>{{$jobs_details[0]->country_name ?? ''}}</p>
                                    <p>Company:</p>
                                    <p><b>{{$jobs_details[0]->company_name ?? 'Unknow'}}</b></p>
                                    <p>Email At:</p>
                                    <p><b>{{$jobs_details[0]->email ?? ''}}</b></p>
                                    <p>Is it a free Email?</p>
                                    <hr>
                                    <!-- <p>Bids: <span><b>0</b></span></p> -->
                                    <p>View: <span><b>{{$jobviewcount}}</b></span></p>
                                    <hr>
                                    <p>Notification:</p>
                                    <p>All member</p>
                                    <p>Message Sent: <span><b>{{$job_proposal_counts}}</b></span></p>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="jobDetailDiv commonDiv">
                                    <p>Job Type: <b>{{$jobs_details[0]->job_type}},</b> {{$jobs_details[0]->job_level}}</p>
                                    <p>Langauages:</p>
                                    <p><b>
                                            @foreach($jobs_details as $pair_lng)
                                            {{$pair_lng->from_lang.'>>'.$pair_lng->to_lang}},
                                            @endforeach
                                        </b></p>
                                    <p>Specilizations :
                                        <b>
                                            @if(isset($jobs_details[0]->spicializations))
                                            @foreach(json_decode($jobs_details[0]->spicializations) as $parilng)
                                            {{$parilng}},
                                            @endforeach
                                            @endif
                                        </b>
                                    </p>
                                    <hr>
                                    <p>
                                        {{$jobs_details[0]->job_desc ?? ''}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="commonDiv">
                                    <div class="messageDiv">
                                        <form action="{{route('job-send-message')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="jobid" value="{{request()->route('id') }}" />
                                            <div class="inputDiv">
                                                <label for="to">
                                                    To:
                                                </label>
                                                <input type="hidden" name="job_poster_email" value="{{$jobs_details[0]->email ?? ''}}" />
                                                <input type="hidden" name="job_poster_name" value="{{$jobs_details[0]->fname ?? ''}} {{$jobs_details[0]->lname ?? ''}}" />
                                                <p><b>{{$jobs_details[0]->fname ?? ''}} {{$jobs_details[0]->lname ?? ''}}</b></p>
                                            </div>
                                            <div class="inputDiv">
                                                <label for="from">
                                                    From<sapn class="text-danger"> *</sapn>
                                                </label>
                                                <p>
                                                    <input type="text" class="form-control" name="from" placeholder="Enter Name" required>
                                                </p>
                                            </div>
                                            <div class="inputDiv">
                                                <label for="email">
                                                    Your Email
                                                </label>
                                                <p><b>{{auth::user()->email ?? ''}}</b></p>
                                            </div>
                                            <div class="inputDiv">
                                                <label for="subject">
                                                    Subject<sapn class="text-danger"> *</sapn>
                                                </label>
                                                <p>
                                                    <input type="text" class="form-control" name="subject" placeholder="Enter Subject" value="{{\Request::url() }}" required>
                                                </p>
                                            </div>
                                            <div class="inputDiv textAreaDiv">
                                                <label for="">
                                                    Your Message<sapn class="text-danger"> *</sapn>
                                                </label>
                                                <p>
                                                    <textarea name="message" id="summernote" required></textarea>
                                                </p>
                                            </div>
                                            <p><b>Submit your Resume From Profile section</b> and it will appear in the message box above.</p>
                                            <p>If you worked for the outsourcer, please do not forget to post your feedback in the Hall of Fame and Shame — posting is free. Use the Feedback link in users' or agencies' profiles to post your feedback. Your positive feedback is especially welcome. Best outsourcers will appear on Who's Posting Jobs pages and banner.</p>
                                            <p>* indicates a required field.</p>
                                            <p>Your e-mail address and your IP address will be disclosed to the recipient of this message.</p>

                                            <input type="checkbox" id="copy_self" name="send_copy">
                                            <label for="send_copy"> Sen a copy to your self</label><br>
                                            <input type="checkbox" id="inclue_profile_link" name="inclue_profile_link">
                                            <label for="inclue_link"> Include a link to your profile in this list</label><br>
                                            <div class="btnDiv">
                                                @if($jobapplystatus>0)
                                                <p class="text-danger">You Already Applied For this job</p>
                                                @else
                                                <button type="submit">Submit</button>
                                                @endif
                                                <button type="reset">Cancle</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection