@component('mail::message')
<div class="background-color:#454545;">Hello {{$data['job_poster_name']}}</div><br>
{{$data['messsage']}}
<br>
<div style="text-align:center;"><a style="margin-right:10px;color:#F26C20;" href="{{route('public-profile',auth::user()->id)}}">Veiw Profile</a></div>
<div style="margin-top:20px;text-align:center;">
    <a href="https://www.facebook.com/evateachlms/"><img style="width:40px;height:40px;" src="https://tobyo18.sg-host.com/wp-content/uploads/2021/03/fb.png" /></a>
    <a href="https://www.linkedin.com/company/evateach/about/"><img style="width:40px;height:40px;" src="https://tobyo18.sg-host.com/wp-content/uploads/2021/03/linkedin.png" /></a>
    <a href="https://twitter.com/evateach2"><img style="width:40px;height:40px;" src="https://tobyo18.sg-host.com/wp-content/uploads/2021/03/twitter.png" /></a>
    <a href="https://www.instagram.com/_evateach/"><img style="width:40px;height:40px;" src="https://tobyo18.sg-host.com/wp-content/uploads/2021/03/instagram.png" /></a>
</div>
<div style="margin-top:20px;text-align:center;">
    <p style="text-align:center;color:#777;">Suite 2A, Blackthorn House, St Pauls Square,</p>
    <p style="text-align:center;color:#777;">Birmingham. B3 1RL, United Kingdom</p>
</div>
@endcomponent