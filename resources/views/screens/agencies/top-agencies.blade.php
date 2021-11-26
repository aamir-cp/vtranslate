@extends('layouts.master' ,['page_title' => 'Top Agencies'])
@section('content')
<section id="profileBanner">
    <h3>Top 20 Agency</h3>
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
                                <th scope="col">Agency</th>
                                <th scope="col">Location</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">To Jobs, if any</th>
                                <th scope="col">Send Resume</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($AgencyData)>0)
                            @foreach($AgencyData as $agency)
                            <tr>
                                <td class="checkbox">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                </td>
                                <td class="companyimg">
                                    <h3>{{$agency->fname ?? ''}} {{$agency->lname ?? ''}}</h3>
                                    <img src="@if(isset($agency->profile_photo) && $agency->profile_photo!=null){{asset('/profile-images').'/'.$agency->profile_photo}} @else{{'/assets/img/Job Posted.png'}}@endif" alt="" class="img-circle img-responsive " width="100px" height="100px">
                                </td>
                                <td class="location">{{$agency->usergeneralinfo->address ?? ''}}</td>
                                <td class="date">{{date("F-Y", strtotime($agency->usergeneralinfo->updated_at ?? ''));}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" style="text-align: center;">
                                    <h3 class="text-danger">No Record Found!</h3>
                                <td </tr>
                                    @endif
                        </tbody>

                    </table>
                </div>


            </div>
            <div class="col-lg-3">
                <div class="lookingFor">
                    <p class="header">AGENCY OF THE DAY
                    </p>
                    <div class="sliderDiv">
                        <div class="profileBox">
                            <img src="assets/img/user.png" alt="" class="img-fluid">
                            <div class="userDetail">
                                <h5>John Doe</h5>
                                <p>Spanish Translator</p>
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
                <div class="googleAdd">
                    <img src="assets/img/Google Ad..png" alt="" class="img-responsive">
                </div>
                <div class="googleAdd">
                    <img src="assets/img/Google Ad..png" alt="" class="img-responsive">
                </div>

            </div>

        </div>

    </div>
    </div>
</section>
@endsection