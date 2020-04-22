@extends('layouts.app')

@section('content')
<div class="ui container">
                <!--<div class="card-header">{{ __('Register') }}</div>-->                
                    <form method="POST" class="ui form" action="{{ route('register') }}">
                        @csrf

                        <div class="two fields">
                            <div class="field">
                                    <label>Nombre</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="field">
                                <label for="email">Correo</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>


                        <div class="two fields">
                            
                            <div class="field">
                                <label for="password" >Password</label>
                                <input id="password" type="password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <label for="password-confirm" >Confirmar password</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                                <button type="submit" class="ui primary button">
                                    {{ __('Register') }}
                                </button>
                    </form>
</div>
@endsection
