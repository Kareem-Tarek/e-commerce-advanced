@extends('layouts.dashboard.master')

@section('title')
    Deactivate Account
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">Deactivate your account?</h4>
            <p class="h6 fw-bold" style="font-family:Verdana, Geneva, Tahoma, sans-serif;">Read the content down below!</p>
            <div class="col-sm-12 col-xl-12 xl-100">
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <form action="{{route('users.deactivateAccount', [$User_model->id, $User_model->username])}}" class="forms-sample" method="post" id="alert-form">
                            @csrf
                            {{ method_field('patch') }}
                            @if(session()->has('incorrect_password_confirmation_for_account_deactivation'))
                                <div class="alert alert-danger text-center">
                                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                                    {{ session()->get('incorrect_password_confirmation_for_account_deactivation') }}
                                </div>
                            @elseif(session()->has('empty_password_confirmation_for_account_deactivation'))
                                <div class="alert alert-danger text-center">
                                    <a href="javascript:void(0);" class="close-btn text-decoration-none text-danger" onclick="this.parentElement.style.display='none';" style="position:absolute; top:0px; right:5px; font-size: 150%;">&times;</a>
                                    {{ session()->get('empty_password_confirmation_for_account_deactivation') }}
                                </div>
                            @endif
                            <p class="mb-3">Once your your account is deactivate you won't be able to do some certain stuff (such as using giving a rate or comment, using cart, ..etc.). But You could reactivate it again by logging out and then logging in again.</p>
                            <input type="password" class="form-control mb-4 border-1 border-dark" name="password" placeholder="Enter your password here..">
                            {{-- <input type="text" class="d-none" value="inactive" name="status"> --}}
                            {{-- <button type="submit" class="btn btn-warning text-dark me-2" onclick="return confirm('Are you sure that you want to deactivate your account?');" title="Deactivate Account">Deactivate Account</button> --}}
                            <button type="submit" value="inactive" name="status" class="btn btn-warning text-dark me-2" onclick="return confirm('Are you sure that you want to deactivate your account?');" title="Deactivate Account">Deactivate Account</button>
                            <a href="{{ route('users.edit', auth()->user()->id) }}" class="btn btn-secondary text-light me-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.oncontextmenu = () => { //"Right Click" -> of mouse
        // alert("Sorry! This action isn't allowed.");
        return false;
    }

    document.onkeydown = (e) => {
        if(e.ctrlKey && e.key == 'u' || e.ctrlKey && e.key == 'U'){   //"ctrl + u" OR "ctrl + U" -> for viewing page source
            // alert("Sorry! You can't view the page source.");
            return false;
        }
        if(e.key == 'F12'){   //"F12" -> for page's inspect element
            // alert("Sorry! You can't inspect element for this page.");
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.key == 'c' || e.ctrlKey && e.shiftKey && e.key == 'C'){   //"ctrl + shift + c" OR "ctrl + shift + C" -> for page's inspect element
            // alert("Sorry! You can't inspect element for this page.");
            return false;
        }
        if(e.ctrlKey && e.key == 'c' || e.ctrlKey && e.key == 'C'){   //"ctrl + c" OR "ctrl + C" -> for copying
            // alert("Sorry! You can't view the page source.");
            return false;
        }
        if(e.ctrlKey && e.key == 'v' || e.ctrlKey && e.key == 'V'){   //"ctrl + v" OR "ctrl + V" -> for pasting
            // alert("Sorry! You can't view the page source.");
            return false;
        }
    }
</script>
