@extends('layouts.app')
@extends('layouts.header')

@section('content')
<!-- Include Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh; font-family: 'Poppins', sans-serif; background-color: #fff;">
    
        <div class="col-md-8">
            <div class="card p-4 shadow-lg rounded" style="font-family: 'Roboto', sans-serif;"> <!-- Enhanced card style -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center justify-content-center"> <!-- Center image vertically and horizontally -->
                            <img src="{{ asset('storage/marker/barong.jpg') }}" alt="Logo" class="img-fluid rounded" style="width: 80%; height: auto;">
                        </div>
                        <div class="col-md-6">
                            <div>
                                <h2 style="font-family: 'Poppins', sans-serif; font-weight: bold;">Sign in</h2>
                            </div>
                            <form method="POST" action="{{ route('login') }}" id="login-form">
                                @csrf
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="email-addon">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror custom-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address" aria-describedby="email-addon">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="password-addon">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror custom-input" name="password" required autocomplete="current-password" placeholder="Password" aria-describedby="password-addon">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember" style="font-family: 'Poppins', sans-serif; font-weight: 500;">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn btn-primary" style="font-family: 'Poppins', sans-serif; font-weight: 600;">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}" style="font-family: 'Poppins', sans-serif; font-weight: 500;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Axios library -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>
    // document.getElementById('login-form').addEventListener('submit', function(event) {
    //     event.preventDefault();

    //     let email = document.getElementById('email').value;
    //     let password = document.getElementById('password').value;

    //     fetch('/api/login', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'Accept': 'application/json'
    //         },
    //         body: JSON.stringify({
    //             email: email,
    //             password: password
    //         })
    //     })
    //     .then(response => response.json())
    //     .then(data => {
            
    //         if (data.access_token) {
    //             localStorage.setItem('access_token', data.access_token);
    //             window.location.href = '/home';
    //         } else {
    //             console.log(data);
    //             alert('Login failed');
    //         }
    //     })
    //     .catch(error => console.error('Error:', error));
    // });

    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault();

        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        axios.post('/api/login', {
            email: email,
            password: password
        })
        .then(response => {
            let data = response.data;
            if (data.access_token) {
                localStorage.setItem('access_token', data.access_token);
                window.location.href = '/home';
            } else {
                console.log(data);
                alert('Login failed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

</script>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    h1 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .custom-input {
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0;
        box-shadow: none;
    }

    .custom-input:focus {
        box-shadow: none;
        border-color: #007bff;
    }

    .input-group-prepend .input-group-text {
        background: none;
        border: none;
        border-bottom: 1px solid #ccc;
    }

    .input-group-prepend .input-group-text .fas {
        color: #6c757d;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 30px; /* Rounded button */
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-link {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        color: #007bff;
    }

    .btn-link:hover {
        color: #0056b3;
    }

    .form-check-label {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
    }

    .card {
        border-radius: 20px; /* Rounded corners for the card */
        background-color: #fff; /* Maintain white background */
    }
</style>
@endsection
