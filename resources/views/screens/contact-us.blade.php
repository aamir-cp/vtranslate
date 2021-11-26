@extends('layouts.master' ,['page_title' => 'Contact Us'])
@section('content')
<section id="profileBanner">
        <h3>Contact Us</h3>
    </section>

    <section id="contactDiv" class="padd-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="commonDiv">
                        <h3>Contact Us</h3>
                        <form action="{{route('contact-us')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="inputDiv">
                                <label for="">Subject</label>
                                <input type="text" name="subject" id="Subject" class="form-control" placeholder="Enter Subject" required="required">
                            </div>
                            <div class="inputDiv">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" required="required" value="{{auth::user()->email ?? ''}}">
                            </div>
                            <div class="inputDiv">
                                <label for="">Attachement</label>
                                <input type="file" name="file" id="file" class="form-control" placeholder="Enter Email" required="required">
                            </div>
                            <div class="inputDiv">
                                <label for="">Question</label>
                                <div class="textArea">
                                    <textarea name="message" id="message" cols="30" rows="5" required="required"></textarea>
                                    <p>250 characters left.                                    </p>
                                    <p>Summarize your question in one sentence.</p>
                                    <p>Example Question: "How do I change my e-mail?"</p>
                                    
                                </div>
                            </div>
                            <p class="notice">You will be able to describe your question in detail on the next page that will appear after you click or tap the Submit Your Request button.</p>
                            
                            <div class="multiBtn">
                                <button  type="submit" class="commonBtn mb-4 ">Submit You Request</button>
                                <a href="/"><button class="commonBtn">Back</button></a>
                            </div>
                           
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="rightDiv">
                        <div class="lookingFor">
                            <p class="header">Clients Looking for a Language Professional:</p>
                            <ul>
                                <li><a href="job-posting.html">Post a Job</a></li>
                                <li><a href="">Find a Translator</a></li>
                                <li><a href="">Find a Translation Agency</a></li>
                            </ul>
                        </div>
                        <div class="lookingFor">
                            <p class="header">Language Professionals:</p>
                            <ul>
                                <li><a href="">Translation Jobs</a></li>
                                <li><a href="">Terminology Help</a></li>
                                <li><a href="">Discussion Forums</a></li>
                                <li><a href="">Web Site Builder</a></li>
                                <li><a href="">Web Site Builder</a></li>
                                <li><a href="">Discussion Forums</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection