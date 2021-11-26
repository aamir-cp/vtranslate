@extends('layouts.master' ,['page_title' => 'Email Verification'])
@section('content')
    <section id="email-verification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="verificationBox">
                        <div class="iconBox">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <h4>Thank you for Verifying your Email</h4>
                        <p>Please Login and Keep using VTranslate</p>
                        <a href="{{ url('login') }}"><button class="commonBtn">Sign In</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
