@extends('layouts.master' ,['page_title' => 'Forums'])
@section('content')
<section id="profileBanner">
        <h3>Forum</h3>
        
        <p>Translation Profession</p>
    </section>
    <section id="findJobSection" class="padd-100">
        <div class="container">
            <div class="row">

                <div class="col-lg-9">
                    <div class="forumtopButton pb-5">
                        <div class="topbtnchild1">
                            <button class="commonBtn1">Create New</button>
                        </div>
                        <div class="topbtnchild2">
                            <button class="commonBtn2">Ask a Question</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead >
                                    <th></th>
                                    <th class="forumNam">Forum name</th>
                                    <th class= "forummsg">Messages</th>
                                    <th class="forummsg">View</th>
                              
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="/assets/img/Forum images.png"></td>
                                    <td>  
                                        <div class="tableContent">
                                            <h2>Lorem ipsum </h2>
                                            <div class="spann d-flex">
                                                <p>Posted by ABC</p>
                                                <p>4 hours ago</p>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint maiores praesentium omnis aliquid fuga, iste, iure nihil tenetur, dicta accusantium commodi? Aliquam, doloribus quasi earum neque doloremque atque nemo ratione.</p>
                                        </div>
                                    </td>
                                    <td>1234</td>
                                    <td>1234</td>
                                </tr>
                                <tr>
                                    <td><img src="/assets/img/Forum images.png"></td>
                                    <td>  
                                        <div class="tableContent">
                                            <h2>Lorem ipsum </h2>
                                            <div class="spann d-flex">
                                                <p>Posted by ABC</p>
                                                <p>4 hours ago</p>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint maiores praesentium omnis aliquid fuga, iste, iure nihil tenetur, dicta accusantium commodi? Aliquam, doloribus quasi earum neque doloremque atque nemo ratione.</p>
                                        </div>
                                    </td>
                                    <td>1234</td>
                                    <td>1234</td>
                                </tr>
                                <tr>
                                    <td><img src="/assets/img/Forum images.png"></td>
                                    <td>  
                                        <div class="tableContent">
                                            <h2>Lorem ipsum </h2>
                                            <div class="spann d-flex">
                                                <p>Posted by ABC</p>
                                                <p>4 hours ago</p>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint maiores praesentium omnis aliquid fuga, iste, iure nihil tenetur, dicta accusantium commodi? Aliquam, doloribus quasi earum neque doloremque atque nemo ratione.</p>
                                        </div>
                                    </td>
                                    <td>1234</td>
                                    <td>1234</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="googleAdd">
                        <img src="assets/img/Google Ad..png" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection