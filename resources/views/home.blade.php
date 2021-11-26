@extends('layouts.master' ,['page_title' => 'Home'])
@section('content')
<section id="homeBanner">
        <div id="mainbanner" class="banner">
            <div class="container-fluid">
                <div class="banner-content">
                    <div class="row" >
                        <div class="col-lg-6">
                            <h1>The Easiest Way To Hire <br> Expert Translate</h1>
                            <h2>lorem ipsum dolor sit amit, consectetur adipiscing elit ut aliquam, purus <br> sit amet luctus</h2>
                            <!-- <a href="#" class="btnD1">Read More</a> -->
                            <div class="inputfield">
                                <div class="form-group forum d-flex" style="margin-right: 20px;" >
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input class="form-control" placeholder="Search by language" >
                                </div>
                                <div class="select">
                                    <select name="Categories" class="Categories">
                                        <option value="Categories">Categories</option>
                                        <option value="Categories">English-korean</option>
                                        <option value="Categories">Japenese-English</option>
                                        <option value="audi">Germen-korean</option>
                                      </select> 
                                </div>
                                <div class="input-bar-item">
                                    <button class="btn btn-info">Search</button>
                                  </div>
                            </div>
                            <div class="language">
    
                                <p>
                                    <span >Popular Categories:</span>
                                    <span class="spantext">English-korean</span>
                                    <span class="spantext">English-korean</span>
                                    <span class="spantext">English-korean</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 pt-3">
                            <div class="rightDiv">
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
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 pt-3">
                            <div class="rightDiv">
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
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </section>
    <section id="companyOverview" class="companyOverview">
        <div class="container ">
            <div class="row ">
                <div class="col-4">
                    <div class="totalTranslate">
                        <img class="overviewImg" src="assets/img/Total Translator.png">
                       <div class="translateContent">
                        <h2>100,000+</h2>
                        <p>Total Translate</p>
                       </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="totalTranslate">
                        <img class="overviewImg" src="assets/img/Job Posted.png">
                        <div class="translateContent">
                            <h2>2000+</h2>
                        <p> Jobs Posted</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="totalTranslate">
                        <img class="overviewImg" src="assets/img/Satisfied Clients.png">
                        <div class="translateContent">
                            <h2>70,000+</h2>
                            <p>Satidied Clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="findJobSection" class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="font-weight-600 mb-3">Latest Jobs </h3>                        </div>
                        <div class="formDiv">
                            <div class="col-lg-12">
                                <form action="">
                                    <div class="multiDiv">
                                        <select name="" id="">
                                            <option value="Categories">Categories</option>
                                        </select>
                                        <select name="" id="">
                                            <option value="Country">Country</option>
                                        </select>
                                        <select name="" id="">
                                            <option value="Language">Language</option>
                                        </select>
                                    </div>
                                    <a class="commonBtn" href="{{ url('search-job') }}">Search</a>
                                    <!-- <button class="commonBtn">Search</button> -->
                                </form>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="multiCards">
                                <div class="cardDiv">
                                    <div class="priceInfo">
                                        <div class="detailDiv">
                                            <span class="price">$50</span>
                                            <span>Italian>English</span>
                                            <p>Lorem ipsum dolor sit amet,  consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus</p>
                                        </div>
                                        <hr>
                                        <div class="locationDate">
                                            <div class="detial">
                                                <p>
                                                    <span>Poposals</span>
                                                    <span>0</span>
                                                </p>
                                                <p>
                                                    <span>Location</span>
                                                    <span>Lorem Ipsum</span>
                                                </p>
                                                <p>
                                                    <span>Expiry</span>
                                                    <span>10 Day Left</span>
                                                </p>
                                            </div>
                                            <i class="fa fa-heart-o favoriteIcon" aria-hidden="true"></i>
                                            <button class="commonBtn">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cardDiv">
                                    <div class="priceInfo">
                                        <div class="detailDiv">
                                            <span class="price">$50</span>
                                            <span>Italian>English</span>
                                            <p>Lorem ipsum dolor sit amet,  consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus</p>
                                        </div>
                                        <hr>
                                        <div class="locationDate">
                                            <div class="detial">
                                                <p>
                                                    <span>Poposals</span>
                                                    <span>0</span>
                                                </p>
                                                <p>
                                                    <span>Location</span>
                                                    <span>Lorem Ipsum</span>
                                                </p>
                                                <p>
                                                    <span>Expiry</span>
                                                    <span>10 Day Left</span>
                                                </p>
                                            </div>
                                            <i class="fa fa-heart-o favoriteIcon" aria-hidden="true"></i>
                                            <button class="commonBtn">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cardDiv">
                                    <div class="priceInfo">
                                        <div class="detailDiv">
                                            <span class="price">$50</span>
                                            <span>Italian>English</span>
                                            <p>Lorem ipsum dolor sit amet,  consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus</p>
                                        </div>
                                        <hr>
                                        <div class="locationDate">
                                            <div class="detial">
                                                <p>
                                                    <span>Poposals</span>
                                                    <span>0</span>
                                                </p>
                                                <p>
                                                    <span>Location</span>
                                                    <span>Lorem Ipsum</span>
                                                </p>
                                                <p>
                                                    <span>Expiry</span>
                                                    <span>10 Day Left</span>
                                                </p>
                                            </div>
                                            <i class="fa fa-heart-o favoriteIcon" aria-hidden="true"></i>
                                            <button class="commonBtn">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cardDiv">
                                    <div class="priceInfo">
                                        <div class="detailDiv">
                                            <span class="price">$50</span>
                                            <span>Italian>English</span>
                                            <p>Lorem ipsum dolor sit amet,  consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus</p>
                                        </div>
                                        <hr>
                                        <div class="locationDate">
                                            <div class="detial">
                                                <p>
                                                    <span>Poposals</span>
                                                    <span>0</span>
                                                </p>
                                                <p>
                                                    <span>Location</span>
                                                    <span>Lorem Ipsum</span>
                                                </p>
                                                <p>
                                                    <span>Expiry</span>
                                                    <span>10 Day Left</span>
                                                </p>
                                            </div>
                                            <i class="fa fa-heart-o favoriteIcon" aria-hidden="true"></i>
                                            <button class="commonBtn">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cardDiv">
                                    <div class="priceInfo">
                                        <div class="detailDiv">
                                            <span class="price">$50</span>
                                            <span>Italian>English</span>
                                            <p>Lorem ipsum dolor sit amet,  consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus</p>
                                        </div>
                                        <hr>
                                        <div class="locationDate">
                                            <div class="detial">
                                                <p>
                                                    <span>Poposals</span>
                                                    <span>0</span>
                                                </p>
                                                <p>
                                                    <span>Location</span>
                                                    <span>Lorem Ipsum</span>
                                                </p>
                                                <p>
                                                    <span>Expiry</span>
                                                    <span>10 Day Left</span>
                                                </p>
                                            </div>
                                            <i class="fa fa-heart-o favoriteIcon" aria-hidden="true"></i>
                                            <button class="commonBtn">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cardDiv">
                                    <div class="priceInfo">
                                        <div class="detailDiv">
                                            <span class="price">$50</span>
                                            <span>Italian>English</span>
                                            <p>Lorem ipsum dolor sit amet,  consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus</p>
                                        </div>
                                        <hr>
                                        <div class="locationDate">
                                            <div class="detial">
                                                <p>
                                                    <span>Poposals</span>
                                                    <span>0</span>
                                                </p>
                                                <p>
                                                    <span>Location</span>
                                                    <span>Lorem Ipsum</span>
                                                </p>
                                                <p>
                                                    <span>Expiry</span>
                                                    <span>10 Day Left</span>
                                                </p>
                                            </div>
                                            <i class="fa fa-heart-o favoriteIcon" aria-hidden="true"></i>
                                            <button class="commonBtn">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cardDiv">
                                    <div class="priceInfo">
                                        <div class="detailDiv">
                                            <span class="price">$50</span>
                                            <span>Italian>English</span>
                                            <p>Lorem ipsum dolor sit amet,  consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus</p>
                                        </div>
                                        <hr>
                                        <div class="locationDate">
                                            <div class="detial">
                                                <p>
                                                    <span>Poposals</span>
                                                    <span>0</span>
                                                </p>
                                                <p>
                                                    <span>Location</span>
                                                    <span>Lorem Ipsum</span>
                                                </p>
                                                <p>
                                                    <span>Expiry</span>
                                                    <span>10 Day Left</span>
                                                </p>
                                            </div>
                                            <i class="fa fa-heart-o favoriteIcon" aria-hidden="true"></i>
                                            <button class="commonBtn">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cardDiv">
                                    <div class="priceInfo">
                                        <div class="detailDiv">
                                            <span class="price">$50</span>
                                            <span>Italian>English</span>
                                            <p>Lorem ipsum dolor sit amet,  consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus</p>
                                        </div>
                                        <hr>
                                        <div class="locationDate">
                                            <div class="detial">
                                                <p>
                                                    <span>Poposals</span>
                                                    <span>0</span>
                                                </p>
                                                <p>
                                                    <span>Location</span>
                                                    <span>Lorem Ipsum</span>
                                                </p>
                                                <p>
                                                    <span>Expiry</span>
                                                    <span>10 Day Left</span>
                                                </p>
                                            </div>
                                            <i class="fa fa-heart-o favoriteIcon" aria-hidden="true"></i>
                                            <button class="commonBtn">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                                <button class="commonBtn">View More Jobs</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="rightDiv">
                        <div class="lookingFor">
                            <p class="header">What are you Looking for?</p>
                            <ul>
                                <li><a href="{{ url('/post-a-job') }}">Post a Job</a></li>
                                <li><a href="">Find a Translator</a></li>
                                <li><a href="">Find a Translation Agency</a></li>
                            </ul>
                        </div>
                        <div class="lookingFor">
                            <p class="header">Need Help?:</p>
                            <ul>
                                <li><a href="">Translation Jobs</a></li>
                                <li><a href="">Terminology Help</a></li>
                                <li><a href="">Discussion Forums</a></li>
                                <li><a href="">Web Site Builder</a></li>
                                <li><a href="">Web Site Builder</a></li>
                                <li><a href="">Discussion Forums</a></li>
                            </ul>
                        </div>
                        <div class="lookingFor">
                            <p class="header">LINGUISTS OF THE DAY</p>
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
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <section id="centerBanner" class="centerBanner" style="background-image: url('assets/img/Home\ Background.png');">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Since The start</h1>
                    <h2>We provide stable service  with expert</h2>
                    <p>Freelancer around the globle are looking for work</p>
                    <div class="btn-parent d-flex">
                        <div class="centerbannerbtn1">
                            <a href="find-a-job.html"><button type="button" class="btnD1">View Job</button></a>
                       </div>
                        <div class="centerbannerbtn2">
                             <a href="{{ url('/post-a-job') }}"><button type="button" class="btnD2">Post a job</button></a>
                        </div>
                     </div> 
                </div>
            </div>
        </div>
    </section>
    <section id="Services" class=" Services mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <h2 class="heading">How it Works?</h2>
                </div>
                <div class="col-md-6 mainpart2 ">
                    <p class="heading1">For Employer</p>
                    <p class="heading2">For Freelancer</p>
                </div>
                
            </div>
            <div class="row text-center pt-5">
                <div class="col-md-3">
                    <div class="servicesIcon">
                        <div class="imgparent">
                            <a href="register.html"><img class="servicesImg" src="assets/img/Group 22.png"></a>
                        </div>
                        <div class="servicesContent">
                            <a href="register.html"><h2>Create in Account</h2></a>
                            <p>Become an Employer by creating an account</p>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-3">
                    <div class="servicesIcon">
                        <div class="imgparent">
                            <a href="job-posting.html"><img class="servicesImg" src="assets/img/Group 23.png"></a>
                        </div>
                        <div class="servicesContent">
                            <h2><a href="job-posting.html">Post A Job</a></h2>
                            <p>Tell Us what you need done in seconds</p>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-3">
                    <div class="servicesIcon">
                        <div class="imgparent">
                            <a href="Freelancer.html"><img class="servicesImg" src="assets/img/Group 24.png"></a>
                        </div>
                        <div class="servicesContent">
                            <h2>Choose Translator</h2>
                            <p>Get your bids in a while and choose a from best </p>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-3">
                    <div class="servicesIcon">
                        <div class="imgparent">
                            <img class="servicesImg" src="assets/img/Group 25.png">
                        </div>
                        <div class="servicesContent">
                            <h2>Pro Membership</h2>
                            <p>Only pay when you'r completely satisfied</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
