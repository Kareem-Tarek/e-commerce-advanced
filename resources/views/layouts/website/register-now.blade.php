<!--------- for guests ONLY! (which are unknown users that are not registered to the DB) ---------->
@if(!auth()->user() || Auth::guest()) <!---- both conditions means the same thing which is if user is a guest ----->
    <a href="{{ route('register') }}">
        <span class="badge register-now-badge">
            Register Now!&nbsp;&nbsp;<i class="fa-solid fa-computer-mouse"></i>
        </span>
    </a>
@endif