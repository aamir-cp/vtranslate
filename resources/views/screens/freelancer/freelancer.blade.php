@extends('layouts.master' ,['page_title' => 'Freelancer'])
@section('content')
    <section id="profileBanner">
        <h3>Freelancer</h3>
    </section>
    <section id="freelancerSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="commonDiv">
                        <h3>Profile</h3>
                        <div class="profileInfo">
                            <img src="{{asset('profile-images/').'/'.auth::user()->profile_photo ?? ''}}" alt="" class="img-fluid">
                            <h4>{{auth::user()->fname.' '.auth::user()->lname}}. <svg><path d="M13.72 7.03c.45-.56.34-1.39-.24-1.82l-.55-.41c-.34-.25-.53-.66-.51-1.08l.03-.68c.03-.72-.53-1.32-1.25-1.33h-.68c-.42 0-.81-.22-1.05-.57L9.11.57c-.39-.6-1.2-.75-1.79-.33l-.55.4c-.34.24-.79.3-1.18.15L4.95.55c-.67-.25-1.41.11-1.64.79l-.21.65c-.14.4-.46.71-.87.82l-.65.18C.89 3.19.5 3.92.71 4.6l.21.65c.13.41.04.85-.22 1.18l-.42.54c-.45.56-.34 1.39.24 1.81l.55.41c.34.25.53.66.51 1.08l-.03.68c-.03.72.54 1.32 1.25 1.33h.68c.42 0 .81.22 1.05.57l.37.57c.39.6 1.21.75 1.79.33l.55-.4c.34-.25.78-.31 1.18-.16l.64.24c.67.25 1.41-.1 1.64-.79l.21-.65c.13-.4.45-.71.86-.82l.65-.17c.69-.19 1.09-.92.87-1.61l-.21-.65c-.13-.4-.05-.85.22-1.18l.42-.53zM6.06 9.84L3.5 7.27l1.23-1.23 1.33 1.33 3.21-3.21L10.5 5.4 6.06 9.84z"></path></svg></i></h4>
                            <div class="locationTime">
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{$userData[0]->usergeneralinfo->address ?? ''}} </span><span>{{date("h: i: sa ");}} local time</span>
                            </div>
                            <div class="jobPosted">
                                <p>62</p>
                                <p>Job Applied</p>
                            </div>
                        </div>
                    </div>
                    <div class="commonDiv" style="margin-top:50px">
                        <h3>Languages</h3>
                        @foreach($userData[0]->userlanguages as $lang)
                        <p><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 14 14" role="img"><path d="M13.72 7.03c.45-.56.34-1.39-.24-1.82l-.55-.41c-.34-.25-.53-.66-.51-1.08l.03-.68c.03-.72-.53-1.32-1.25-1.33h-.68c-.42 0-.81-.22-1.05-.57L9.11.57c-.39-.6-1.2-.75-1.79-.33l-.55.4c-.34.24-.79.3-1.18.15L4.95.55c-.67-.25-1.41.11-1.64.79l-.21.65c-.14.4-.46.71-.87.82l-.65.18C.89 3.19.5 3.92.71 4.6l.21.65c.13.41.04.85-.22 1.18l-.42.54c-.45.56-.34 1.39.24 1.81l.55.41c.34.25.53.66.51 1.08l-.03.68c-.03.72.54 1.32 1.25 1.33h.68c.42 0 .81.22 1.05.57l.37.57c.39.6 1.21.75 1.79.33l.55-.4c.34-.25.78-.31 1.18-.16l.64.24c.67.25 1.41-.1 1.64-.79l.21-.65c.13-.4.45-.71.86-.82l.65-.17c.69-.19 1.09-.92.87-1.61l-.21-.65c-.13-.4-.05-.85.22-1.18l.42-.53zM6.06 9.84L3.5 7.27l1.23-1.23 1.33 1.33 3.21-3.21L10.5 5.4 6.06 9.84z"></path></svg>&nbsp;<b>{{$lang->from_languages}} ==> {{$lang->to_languages}}</b></p>
                        @endforeach
                       
                    </div>
                    <div class="commonDiv" style="margin-top:50px">
                        <h3>Specialisation </h3>
                        <ul>

                            @foreach($userData[0]->userspicialize->spicializations ?? []  as $sp)
                            <li><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 14 14" role="img"><path d="M13.72 7.03c.45-.56.34-1.39-.24-1.82l-.55-.41c-.34-.25-.53-.66-.51-1.08l.03-.68c.03-.72-.53-1.32-1.25-1.33h-.68c-.42 0-.81-.22-1.05-.57L9.11.57c-.39-.6-1.2-.75-1.79-.33l-.55.4c-.34.24-.79.3-1.18.15L4.95.55c-.67-.25-1.41.11-1.64.79l-.21.65c-.14.4-.46.71-.87.82l-.65.18C.89 3.19.5 3.92.71 4.6l.21.65c.13.41.04.85-.22 1.18l-.42.54c-.45.56-.34 1.39.24 1.81l.55.41c.34.25.53.66.51 1.08l-.03.68c-.03.72.54 1.32 1.25 1.33h.68c.42 0 .81.22 1.05.57l.37.57c.39.6 1.21.75 1.79.33l.55-.4c.34-.25.78-.31 1.18-.16l.64.24c.67.25 1.41-.1 1.64-.79l.21-.65c.13-.4.45-.71.86-.82l.65-.17c.69-.19 1.09-.92.87-1.61l-.21-.65c-.13-.4-.05-.85.22-1.18l.42-.53zM6.06 9.84L3.5 7.27l1.23-1.23 1.33 1.33 3.21-3.21L10.5 5.4 6.06 9.84z"></path></svg> {{$sp}}</li>
                            @endforeach
                         
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="commonDiv">
                        <h3>Work History</h3>
                        <div class="historyBox">
                            <div class="titleDate">
                                <div class="titleReview">
                                    <p>Seeking experienced WooCommerce Specialist for guidance on questions</p>
                                    <div class="reviewBox">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="datePrice">
                                    <p>Aug 2021 - Aug 2021</p>
                                </div>
                            </div>
                            <p class="comment">Ashish was very helpful with his WooCommerce knowledge and was able to help me with my questions.</p>
                        </div>
                        <div class="historyBox">
                            <div class="titleDate">
                                <div class="titleReview">
                                    <p>Seeking experienced WooCommerce Specialist for guidance on questions</p>
                                    <div class="reviewBox">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="datePrice">
                                    <p>Aug 2021 - Aug 2021</p>
                                </div>
                            </div>
                            <p class="comment">Ashish was very helpful with his WooCommerce knowledge and was able to help me with my questions.</p>
                        </div>
                        <div class="historyBox">
                            <div class="titleDate">
                                <div class="titleReview">
                                    <p>Seeking experienced WooCommerce Specialist for guidance on questions</p>
                                    <div class="reviewBox">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="datePrice">
                                    <p>Aug 2021 - Aug 2021</p>
                                </div>
                            </div>
                            <p class="comment">Ashish was very helpful with his WooCommerce knowledge and was able to help me with my questions.</p>
                        </div>
                        <div class="historyBox">
                            <div class="titleDate">
                                <div class="titleReview">
                                    <p>Seeking experienced WooCommerce Specialist for guidance on questions</p>
                                    <div class="reviewBox">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="datePrice">
                                    <p>Aug 2021 - Aug 2021</p>
                                </div>
                            </div>
                            <p class="comment">Ashish was very helpful with his WooCommerce knowledge and was able to help me with my questions.</p>
                        </div>
                        <div class="historyBox">
                            <div class="titleDate">
                                <div class="titleReview">
                                    <p>Seeking experienced WooCommerce Specialist for guidance on questions</p>
                                    <div class="reviewBox">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="datePrice">
                                    <p>Aug 2021 - Aug 2021</p>
                                </div>
                            </div>
                            <p class="comment">Ashish was very helpful with his WooCommerce knowledge and was able to help me with my questions.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection