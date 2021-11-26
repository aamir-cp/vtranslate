@extends('layouts.master' ,['page_title' => 'Pro Membership'])
@section('content')
    <section id="profileBanner">
        <h3>Pro MemberShip</h3>
    </section>
    <section id="proMemberInfo">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="commonDiv">
                        <h3>Banefits of Pro Members</h3>
                        <ul>
                            <li>Pro member will receive instant job notification while non pro will receive after 6 hours.</li>
                            <li>Pro member will have option to create its own invoice so he can send it to job poster.</li>
                            <li>Pro members will get free access to pro members features for first 2 years.</li>
                        </ul>
                       <a href="{{ url('login') }}">
                            <button class="commonBtn">Become a Pro member</button>
                       </a> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection