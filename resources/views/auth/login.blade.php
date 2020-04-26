@extends('layouts.app')

@section('content')

<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100 ">
			<div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
					<span class="login100-form-title p-b-43">
                        Welcome to eLibrary!<br><br>
                        Please Log In to continue
					</span>
					
                    <label class="font-weight-bolder pl-2 text-secondary">Email:</label>
                    <div class="wrap-input100 validate-input" style="height:4em" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100 @error('email') is-invalid @enderror" type="text" name="email" 
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                           @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror						
                    </div><br/>					
                    
					<label class="font-weight-bolder pl-2 text-secondary">Password:</label>                    
					<div class="wrap-input100 validate-input" style="height:4em" data-validate="Password is required">
                        <input type="password" class="input100  @error('password') is-invalid @enderror" 
                        name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div><br/>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								{{ __('Remember Me') }}
							</label>
						</div>

						<div>
                            @if (Route::has('password.request'))
                                <a href="#" class="txt1">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							{{ __('Login') }}
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign in using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="{{url('login/google')}}" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-google" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
@endsection
