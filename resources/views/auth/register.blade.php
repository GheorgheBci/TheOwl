@extends('layouts.loginRegisterPlantilla')

@section('titulo', 'Registro')

@section('content')
    <div class="main-registro main-registro--padding">
        <div class="main-registro__div-p">
            <p class="main-registro__p"><strong>{{ __('Enjoy') }}</strong> {{ __('millions of books on all subjects') }}</p>
            <p class="main-registro__p"><strong>{{ __('Become') }}</strong> {{ __('a partner and enjoy many advantages') }}</p>
            <p class="main-registro__p"><strong>{{ __('Read') }}</strong> {{ __('from any device') }}</p>
        </div>

        <div class="main-registro__separador"></div>

        <div class="main-registro__div--ml main-registro__div--ma">
            <h1 class="main-registro__titulo">{{ __('Create an Account') }}</h1>

            <form method="POST" action="{{ route('register') }}" class="main-registro__form main-registro__form--mt">
                @csrf
                <div class="main-registro__div main-registro__div--mb">
                    <div class="main-registro__div--width main-registro__div--mb">
                        <label for="nombre" class="main-registro__label">{{ __('Name') }}</label>

                        <div>
                            <input id="nombre" class="main-registro__input" type="text"
                                @error('nombre') is-invalid @enderror name="nombre" value="{{ old('nombre') }}" required
                                autocomplete="nombre" placeholder="{{ __('Enter your name') }}">

                            @error('nombre')
                                <span class="mensaje__error mensaje__error-registro-fs">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="main-registro__div--width main-registro__div--mb">
                        <label for="ape1" class="main-registro__label">{{ __('First Surname') }}</label>

                        <div>
                            <input id="ape1" class="main-registro__input" type="text" l @error('ape1') is-invalid @enderror
                                name="ape1" value="{{ old('ape1') }}" required autocomplete="ape1"
                                placeholder="{{ __('Enter your first surname') }}">

                            @error('ape1')
                                <span class="mensaje__error mensaje__error-registro-fs">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="main-registro__div--width main-registro__div--mb">
                        <label for="ape2" class="main-registro__label">{{ __('Second Surname') }}</label>

                        <div>
                            <input id="ape2" class="main-registro__input" type="text" @error('ape2') is-invalid @enderror
                                name="ape2" value="{{ old('ape2') }}" autocomplete="ape2"
                                placeholder="{{ __('Enter your second surname') }}">

                            @error('ape2')
                                <span class="mensaje__error mensaje__error-registro-fs">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="main-registro__div main-registro__div--mb">
                    <div class="main-registro__email--width main-registro__div--mb">
                        <label for="email" class="main-registro__label">Email</label>

                        <div>
                            <input id="email" class="main-registro__input" type="email" @error('email') is-invalid @enderror
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="{{ __('Enter your email address') }}">

                            @error('email')
                                <span class="mensaje__error mensaje__error-registro-fs">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="main-registro__date--width main-registro__div--mb">
                        <label for="fechaNac" class="main-registro__label">{{ __('Date of birth') }}</label>

                        <div>
                            <input id="fechaNac" class="main-registro__input" type="date"
                                @error('fechaNac') is-invalid @enderror name="fechaNac" value="{{ old('fechaNac') }}"
                                required autocomplete="fechaNac">

                            @error('fechaNac')
                                <span class="mensaje__error mensaje__error-registro-fs">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="main-registro__div main-registro__div--mb">
                    <div class="main-registro__password--width main-registro__div--mb">
                        <label for="password" class="main-registro__label">{{ __('Password') }}</label>

                        <div>
                            <input id="password" class="main-registro__input" type="password"
                                @error('password') is-invalid @enderror name="password" required autocomplete="new-password"
                                placeholder="{{ __('Enter your password') }}">

                            @error('password')
                                <span class="mensaje__error mensaje__error-registro-fs">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="main-registro__password--width main-registro__div--mb">
                        <label for="password-confirm" class="main-registro__label">{{ __('Confirm Password') }}</label>

                        <div>
                            <input id="password-confirm" class="main-registro__input" type="password"
                                name="password-confirm" required autocomplete="new-password"
                                placeholder="{{ __('Repeat the password') }}">

                            @error('password-confirm')
                                <span class="mensaje__error mensaje__error-registro-fs">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="main-registro__button">{{ __('Create Account') }}</button>
                <a href="{{ route('login') }}" class="main-registro__a">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
@endsection
