@extends('layouts.master' ,['page_title' => 'Register'])
@section('css')
<style>
    #message {
      display:none;
      background: #f1f1f1;
      color: #000;
      position: relative;
      padding: 20px;
      margin-top: 10px;
    }

    #message p {
      padding: 10px 35px;
      font-size: 18px;
    }

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
@endsection
@section('content')
{!! NoCaptcha::renderJs() !!}
<section id="mainBanner">
        <div class="registerDiv">
            <h2>Register</h2>
            <p>Create a new account with us and start using the most trusted<br>
                platform to provide services.</p>
        </div>
    </section>
    <section id="createAccount">
        <div class="container">
            <div class="formDiv">
                <form method="POST" action="{{ route('register') }}">
                     @csrf
                    <h2>Create Account</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inputDiv">
                                    <label for="">First Name <span>*</span></label>
                                    <input type="text" class="@error('fname') is-invalid @enderror" placeholder="Enter First Name" name="fname" value="{{ old('fname') }}"  autocomplete="fname" autofocus required="required">
                                    @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputDiv">
                                    <label for="">Last Name <span>*</span></label>
                                    <input type="text" class="@error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}"  autocomplete="lname" autofocus placeholder="Enter Last Name" required="required">
                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputDiv">
                                    <label for="">Country <span>*</span></label>
                                    <select name="country" class="@error('country') is-invalid @enderror" required="required">
                                        <option value="">Select Your Country</option>
                                        @foreach($countries as $country)
                                         <option value="{{$country->id}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputDiv">
                                    <label for="">Postal (ZIP) Code</label>
                                    <input type="text" name="zipcode" id="" placeholder="Enter Area Code">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputDiv">
                                    <label for="">Email Address <span>*</span></label>
                                    <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Enter Email Address" required="required">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputDiv">
                                    <label for="">User Name <span>*</span></label>
                                    <input type="text" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" placeholder="Enter User Name" required="required">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputDiv">
                                    <label for="">Password <span>*</span></label>
                                    <input type="password" class="@error('password') is-invalid @enderror" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="new-password" placeholder="Enter Password" required="required">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputDiv">
                                    <label for="">Confirm Password <span>*</span></label>
                                    <input type="password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password" placeholder="Enter Password" required="required">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div id="message">
                              <h3>Password must contain the following:</h3>
                              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                              <p id="number" class="invalid">A <b>number</b></p>
                              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                            </div>
                            <div class="checkBoxDiv">
                                <input type="checkbox" name="job_notification" id="job_notification" >
                                <label for="">Can we send you job notifications, news and updates about WeTranslate.com?</label>
                            </div>
                            <div class="checkBoxDiv">
                                <input type="checkbox" name="terms_conditon" id="terms_conditon" required="required">
                                <label for="">I have read and accept User Registration Rules and Terms and Conditions.</label>
                            </div>
                            <div class="rebootDiv ">
                                {!! NoCaptcha::display() !!}
                                 @error('g-recaptcha-response')
                                <span class="invalid-feedback" style="display: block !important" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                             <button class="commonBtn" type="submit">Register</button> 
                        
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
@endsection
