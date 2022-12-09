<!--------- for guests ONLY! (which are unknown users that are not registered to the DB) ---------->
@if(!auth()->user() || Auth::guest()) <!---- both conditions means the same thing which is if user is a guest ----->
    <a href="{{ route('register') }}">
        <span class="badge register-now-badge">
            Register Now!&nbsp;&nbsp;<i class="fa-solid fa-computer-mouse"></i>
        </span>
    </a>

<style>
    .register-now-badge{
        position: fixed;
        left: 1px;
        top: 16%;
        color: rgb(206, 191, 123);
        background-color: rgb(96, 92, 75);
        /* bottom: 0px;
        right: 50%; */
        width: 100%;
        padding: 10px 0px 10px 0px;
        border: 0px solid black;
        font-size: 115%;
        z-index: 1000;
        /* box-shadow: 0 1rem 3rem rgba(#000000, 0.1); */
    }
    
    .register-now-badge:hover{
        /* background-color: aliceblue; */
        background-color: rgba(178, 179, 180, 0.65);
        color: rgb(78, 78, 80);
        border: 0px solid black;
    }
</style>
@endif