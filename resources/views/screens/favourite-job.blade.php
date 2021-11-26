@extends('layouts.master' ,['page_title' => 'Search Job'])
@section('content')
<section id="profileBanner">
    <h3>Favourite Jobs</h3>
</section>
<section id="findJobSection" class="padd-100">
    <div class="container">
        <div class="row">

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="font-weight-600 mb-3">Latest Jobs </h3>
                    </div>
                    <div class="formDiv">
                        <div class="col-lg-12">
                            <form action="{{route('favourite-job-search')}}" method="get">
                                <div class="multiDiv">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="job_type" class="form-control p-0 pl-4" required>
                                                <option value="">Select Job Type</option>
                                                <option value="Closed captioning">Closed captioning</option>
                                                <option value="Copywriting">Copywriting</option>
                                                <option value="Desktop publishing">Desktop publishing</option>
                                                <option value="Editing">Editing</option>
                                                <option value="Interpreting">Interpreting</option>
                                                <option value="Interpreting – conference">Interpreting – conference</option>
                                                <option value="Interpreting – court/legal">Interpreting – court/legal</option>
                                                <option value="Interpreting – medical">Interpreting – medical</option>
                                                <option value="Interpreting – phone">Interpreting – phone</option>
                                                <option value="Interpreting – sign language">Interpreting – sign language</option>
                                                <option value="Localization">Localization</option>
                                                <option value="Other">Other</option>
                                                <option value="Project management">Project management</option>
                                                <option value="Proofreading">Proofreading</option>
                                                <option value="Research">Research</option>
                                                <option value="Subtitling">Subtitling</option>
                                                <option value="Teaching">Teaching</option>
                                                <option value="Technical Review">Technical Review</option>
                                                <option value="Technical writing">Technical writing</option>
                                                <option value="Terminology research">Terminology research</option>
                                                <option value="Transcription">Transcription</option>
                                                <option value="Translation">Translation</option>
                                                <option value="Typesetting"></option>
                                                <option value="Voice-over">Voice-over</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control p-0 pl-4" name="country" id="country">
                                                <option value="">Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control p-0 pl-4" id="language" name="language">
                                                <option value="">Select Language</option>
                                                <option value="af">Afrikaans</option>
                                                <option value="sq">Albanian - shqip</option>
                                                <option value="am">Amharic - አማርኛ</option>
                                                <option value="ar">Arabic - العربية</option>
                                                <option value="an">Aragonese - aragonés</option>
                                                <option value="hy">Armenian - հայերեն</option>
                                                <option value="ast">Asturian - asturianu</option>
                                                <option value="az">Azerbaijani - azərbaycan dili</option>
                                                <option value="eu">Basque - euskara</option>
                                                <option value="be">Belarusian - беларуская</option>
                                                <option value="bn">Bengali - বাংলা</option>
                                                <option value="bs">Bosnian - bosanski</option>
                                                <option value="br">Breton - brezhoneg</option>
                                                <option value="bg">Bulgarian - български</option>
                                                <option value="ca">Catalan - català</option>
                                                <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                                                <option value="zh">Chinese - 中文</option>
                                                <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
                                                <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
                                                <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
                                                <option value="co">Corsican</option>
                                                <option value="hr">Croatian - hrvatski</option>
                                                <option value="cs">Czech - čeština</option>
                                                <option value="da">Danish - dansk</option>
                                                <option value="nl">Dutch - Nederlands</option>
                                                <option value="en">English</option>
                                                <option value="en-AU">English (Australia)</option>
                                                <option value="en-CA">English (Canada)</option>
                                                <option value="en-IN">English (India)</option>
                                                <option value="en-NZ">English (New Zealand)</option>
                                                <option value="en-ZA">English (South Africa)</option>
                                                <option value="en-GB">English (United Kingdom)</option>
                                                <option value="en-US">English (United States)</option>
                                                <option value="eo">Esperanto - esperanto</option>
                                                <option value="et">Estonian - eesti</option>
                                                <option value="fo">Faroese - føroyskt</option>
                                                <option value="fil">Filipino</option>
                                                <option value="fi">Finnish - suomi</option>
                                                <option value="fr">French - français</option>
                                                <option value="fr-CA">French (Canada) - français (Canada)</option>
                                                <option value="fr-FR">French (France) - français (France)</option>
                                                <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
                                                <option value="gl">Galician - galego</option>
                                                <option value="ka">Georgian - ქართული</option>
                                                <option value="de">German - Deutsch</option>
                                                <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
                                                <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                                                <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                                <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                                                <option value="el">Greek - Ελληνικά</option>
                                                <option value="gn">Guarani</option>
                                                <option value="gu">Gujarati - ગુજરાતી</option>
                                                <option value="ha">Hausa</option>
                                                <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                                                <option value="he">Hebrew - עברית</option>
                                                <option value="hi">Hindi - हिन्दी</option>
                                                <option value="hu">Hungarian - magyar</option>
                                                <option value="is">Icelandic - íslenska</option>
                                                <option value="id">Indonesian - Indonesia</option>
                                                <option value="ia">Interlingua</option>
                                                <option value="ga">Irish - Gaeilge</option>
                                                <option value="it">Italian - italiano</option>
                                                <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
                                                <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                                                <option value="ja">Japanese - 日本語</option>
                                                <option value="kn">Kannada - ಕನ್ನಡ</option>
                                                <option value="kk">Kazakh - қазақ тілі</option>
                                                <option value="km">Khmer - ខ្មែរ</option>
                                                <option value="ko">Korean - 한국어</option>
                                                <option value="ku">Kurdish - Kurdî</option>
                                                <option value="ky">Kyrgyz - кыргызча</option>
                                                <option value="lo">Lao - ລາວ</option>
                                                <option value="la">Latin</option>
                                                <option value="lv">Latvian - latviešu</option>
                                                <option value="ln">Lingala - lingála</option>
                                                <option value="lt">Lithuanian - lietuvių</option>
                                                <option value="mk">Macedonian - македонски</option>
                                                <option value="ms">Malay - Bahasa Melayu</option>
                                                <option value="ml">Malayalam - മലയാളം</option>
                                                <option value="mt">Maltese - Malti</option>
                                                <option value="mr">Marathi - मराठी</option>
                                                <option value="mn">Mongolian - монгол</option>
                                                <option value="ne">Nepali - नेपाली</option>
                                                <option value="no">Norwegian - norsk</option>
                                                <option value="nb">Norwegian Bokmål - norsk bokmål</option>
                                                <option value="nn">Norwegian Nynorsk - nynorsk</option>
                                                <option value="oc">Occitan</option>
                                                <option value="or">Oriya - ଓଡ଼ିଆ</option>
                                                <option value="om">Oromo - Oromoo</option>
                                                <option value="ps">Pashto - پښتو</option>
                                                <option value="fa">Persian - فارسی</option>
                                                <option value="pl">Polish - polski</option>
                                                <option value="pt">Portuguese - português</option>
                                                <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
                                                <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
                                                <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                                                <option value="qu">Quechua</option>
                                                <option value="ro">Romanian - română</option>
                                                <option value="mo">Romanian (Moldova) - română (Moldova)</option>
                                                <option value="rm">Romansh - rumantsch</option>
                                                <option value="ru">Russian - русский</option>
                                                <option value="gd">Scottish Gaelic</option>
                                                <option value="sr">Serbian - српски</option>
                                                <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
                                                <option value="sn">Shona - chiShona</option>
                                                <option value="sd">Sindhi</option>
                                                <option value="si">Sinhala - සිංහල</option>
                                                <option value="sk">Slovak - slovenčina</option>
                                                <option value="sl">Slovenian - slovenščina</option>
                                                <option value="so">Somali - Soomaali</option>
                                                <option value="st">Southern Sotho</option>
                                                <option value="es">Spanish - español</option>
                                                <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
                                                <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
                                                <option value="es-MX">Spanish (Mexico) - español (México)</option>
                                                <option value="es-ES">Spanish (Spain) - español (España)</option>
                                                <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
                                                <option value="su">Sundanese</option>
                                                <option value="sw">Swahili - Kiswahili</option>
                                                <option value="sv">Swedish - svenska</option>
                                                <option value="tg">Tajik - тоҷикӣ</option>
                                                <option value="ta">Tamil - தமிழ்</option>
                                                <option value="tt">Tatar</option>
                                                <option value="te">Telugu - తెలుగు</option>
                                                <option value="th">Thai - ไทย</option>
                                                <option value="ti">Tigrinya - ትግርኛ</option>
                                                <option value="to">Tongan - lea fakatonga</option>
                                                <option value="tr">Turkish - Türkçe</option>
                                                <option value="tk">Turkmen</option>
                                                <option value="tw">Twi</option>
                                                <option value="uk">Ukrainian - українська</option>
                                                <option value="ur">Urdu - اردو</option>
                                                <option value="ug">Uyghur</option>
                                                <option value="uz">Uzbek - o‘zbek</option>
                                                <option value="vi">Vietnamese - Tiếng Việt</option>
                                                <option value="wa">Walloon - wa</option>
                                                <option value="cy">Welsh - Cymraeg</option>
                                                <option value="fy">Western Frisian</option>
                                                <option value="xh">Xhosa</option>
                                                <option value="yi">Yiddish</option>
                                                <option value="yo">Yoruba - Èdè Yorùbá</option>
                                                <option value="zu">Zulu - isiZulu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                &nbsp;
                                <button type="submit" class="commonBtn">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="multiCards">
                            <div class="mb-4">
                                <h6 class="ont-weight-600 mb-3">Your Job Search result is given below...</h6>
                            </div>
                            @foreach($FavouriteJobs as $job)
                            <div class="cardDiv">
                                <div class="priceInfo">
                                    <div class="detailDiv">
                                        <h4><a href="{{url('job-details',$job->id)}}">{{$job->job_title}}</a></h4>
                                        <span class="price">${{$job->budget}}</span>
                                        @foreach($job->jobspairlang as $lng)
                                        <span>{{$lng->from_lang}}>{{$lng->to_lang}}</span>
                                        @endforeach
                                        <p>{{$job->job_desc}}</p>
                                    </div>
                                    <hr>
                                    <div class="locationDate">
                                        <div class="detial">
                                            <p>
                                                <span>Poposals</span>
                                                <span>{{count($job->jobproposals ?? 0)}}</span>
                                            </p>
                                            <p>
                                                <span>Location</span>
                                                @php
                                                if(isset($job->user->country_id))
                                                {
                                                $location=\App\Models\Country::where('id',$job->user->country_id)->first();
                                                }
                                                @endphp
                                                <span>{{$location->country_name ?? ''}}</span>
                                            </p>
                                            <p>
                                                <span>Expiry</span>
                                                @php
                                                if($job->expiry_date)
                                                {
                                                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $job->expiry_date);
                                                $from = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                                                $diff_in_days = $to->diffInDays($from);
                                                }

                                                $favourite=\App\Models\FavouriteJobs::where('jobs_id',$job->id)->where('user_id',auth::user()->id)->first();

                                                @endphp
                                                <span>@if($job->expiry_date){{$diff_in_days." Day Left"}}@else{{'No Deadline'}}@endif</span>
                                            </p>
                                        </div>
                                        @if($favourite)
                                        <i class="fa fa-heart favoriteIcon removefavor" data-id="{{$job->id}}" aria-hidden="true"></i>
                                        @else
                                        <i class="fa fa-heart-o favoriteIcon makefavor" data-id="{{$job->id}}" aria-hidden="true"></i>
                                        @endif
                                        <a href="{{url('job-details',$job->id)}}"><button class="commonBtn" style="padding: 8px 32px;">Apply Now</button></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                {!! $FavouriteJobs->links() !!}
                            </div>
                        </div>
                    </div>
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
@section('script')
<script type="text/javascript">
    $(".makefavor").click(function() {
        jobs_id = $(this).attr('data-id');
        $.ajax({
            url: "{{route('make-job-fav')}}",
            method: 'get',
            data: {
                jobs_id: jobs_id
            },
            success: function(res) {

                if (res == "success") {
                    Swal.fire('Job is Added in Favourite', '', 'success');
                } else {
                    Swal.fire('Oops!', '', 'error');
                }
            }
        })
    });

    //remove from favourite
    $(".removefavor").click(function() {
        jobs_id = $(this).attr('data-id');
        $.ajax({
            url: "{{route('remove-job-fav')}}",
            method: 'get',
            data: {
                jobs_id: jobs_id
            },
            success: function(res) {

                if (res == "success") {
                    Swal.fire('Job is Removed From Favourite', '', 'success');
                } else {
                    Swal.fire('Oops!', '', 'error');
                }
            }
        })
    })
</script>
@endsection