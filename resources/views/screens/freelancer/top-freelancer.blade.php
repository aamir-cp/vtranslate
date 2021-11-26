@extends('layouts.master' ,['page_title' => 'Top Freelancer'])
@section('content')
<section id="profileBanner">
        <h3>Top 20 Freelancer</h3>
    </section>
    <section id="contactDiv" class="sectionMain padd-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                   
                   <div class="table-responsive">
                    <table class="table">
                        
                        <thead class="tablehead">
                          <tr>
                            <th scope="col">Select</th>
                            <th scope="col">Freelancer</th>
                            <th scope="col">Location</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col">To Jobs, if any</th>
                            <th scope="col">Send Resume</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($FreelancerData as $freelancer)
                          <tr>
                            <td class="checkbox">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            </td>
                            <td class="companyimg">
                                <h3>{{$freelancer->fname.' '.$freelancer->lname}}</h3>
                                <img src="@if($freelancer->profile_photo!=null){{asset('/profile-images').'/'.$freelancer->profile_photo}} @else{{'/assets/img/Job Posted.png'}}@endif" alt="" class="img-circle img-responsive " width="100px" height="100px">
                            </td>
                            <td class="location">{{$freelancer->usergeneralinfo->address ?? ''}}</td>
                            <td class="date">{{date("F-Y", strtotime($freelancer->usergeneralinfo->updated_at ?? ''));}}</td>
                            <td></td>
                            <td></td>
                          </tr>
                        @endforeach
                        </tbody>
                        
                    </table>
                   </div>
                   
                    
                </div>
                <div class="col-lg-3">
                    <div class="lookingFor">
                        <p class="header">FREELANCER OF THE DAY</p>
                        <div class="sliderDiv">
                            <div class="profileBox">
                                <img src="@if(isset($FreelancerData[0]->profile_photo) && $FreelancerData[0]->profile_photo!=null){{asset('/profile-images/'.$FreelancerData[0]->profile_photo ?? '')}}@else{{'/assets/img/Job Posted.png'}}@endif" alt="" class="img-fluid">
                                <div class="userDetail">
                                    <h5>{{$FreelancerData[0]->fname ?? ''}} {{ $FreelancerData[0]->lname ?? ''}}</h5>
                                    <p>{{$FreelancerData[0]->userlanguages[0]->from_languages ?? ''}} Translator</p>
                                </div>
                                <hr>
                                <div class="reviewDiv">
                                    <p><img src="assets/img/star.png" alt="" class="img-fluid"> 3 Reviews (5.0)</p>
                                    <p>
                                        <img src="assets/img/arrow.png" alt="" class="img-fluid"> Spain
                                    </p>
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