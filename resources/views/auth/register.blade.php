@extends('layout.login.app')

@section('content')
<div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
    <main class="mdl-layout__content">
        <div class="mdl-card mdl-card__login mdl-shadow--2dp">
        <div class="mdl-card__supporting-text color--dark-gray">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <span class="mdl-card__title-text text-color--smooth-gray"></span>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <span class="login-name text-color--white">{{ __('Register') }}</span>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                     <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <label for="name" class="mdl-textfield__label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="mdl-textfield__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <label for="email" class="mdl-textfield__label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="mdl-textfield__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span></span> class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <label for="password" class="mdl-textfield__label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="mdl-textfield__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <label for="password-confirm" class="mdl-textfield__label text-md-right">{{ __('Confirm Password') }}</label>

                    
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="mdl-textfield__input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <label for="password-confirm" class="mdl-textfield__label text-md-right">{{ __('Contact') }}</label>

                    
                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="mdl-textfield__input" name="contact" required>
                            </div>
                        </div>
                        
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <label for="password-confirm" class="mdl-textfield__label text-md-right">{{ __('Address') }}</label>

                    
                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="mdl-textfield__input" name="address" required>
                            </div>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <label for="password-confirm" class="mdl-textfield__label text-md-right">{{ __('Image') }}</label>

                    
                            <div class="col-md-6">
                                <input id="password-confirm" type="file" class="mdl-textfield__input" name="image" required>
                            </div>
                        </div>
                       
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect checkbox--colored-light-blue checkbox--inline" for="checkbox-1">
                        <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked>

                    </label>
                    <span class="login-link">I agree all statements in <a href="#" class="underlined">terms of service</a></span>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                    <a href="{{ url('login') }}" class="login-link">I have already signed up</a>
                    <div class="mdl-layout-spacer"></div>
                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>

@endsection
