@extends('layouts.app')
@extends('layouts.header')

@section('content')
<!-- Include Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh; font-family: 'Poppins', sans-serif; background-color: #fff;">
        <div class="col-md-8">
            <div class="card p-4 shadow-lg rounded" style="font-family: 'Roboto', sans-serif;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center justify-content-center"> <!-- Center image vertically and horizontally -->
                            <img src="{{ asset('storage/marker/barong.jpg') }}" alt="Logo" class="img-fluid rounded" style="width: 80%; height: auto;">
                        </div>

                        <div  class="col-md-6">
                            <div>
                                <h2 style="font-family: 'Poppins', sans-serif; font-weight: bold;">Sign up</h2>
                            </div>
                            <form method="POST" action="{{ route('register') }}" id="register-form">
                                @csrf
                            
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="name-addon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror custom-input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name" aria-describedby="name-addon">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="email-addon">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror custom-input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" aria-describedby="email-addon">
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror custom-input" name="password" required autocomplete="new-password" placeholder="Password" aria-describedby="password-addon">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="password-confirm-addon">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control custom-input" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" aria-describedby="password-confirm-addon">
                                </div>
                                
                                
                            
                                <div class="mb-0">
                                    <button type="submit" class="btn btn-primary" style="font-family: 'Poppins', sans-serif; font-weight: 600;">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
        
</div>






<script>
    document.getElementById('register-form').addEventListener('submit', function(event) {
        event.preventDefault();
        
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let password_confirmation = document.getElementById('password-confirm').value;
        
        fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                name: name,
                email: email,
                password: password,
                password_confirmation: password_confirmation
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.access_token) {
                localStorage.setItem('access_token', data.access_token);
                window.location.href = '/home';
            } else {
                alert('Registration failed');
            }
        })
        .catch(error => console.error('Error:', error));
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
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endsection
