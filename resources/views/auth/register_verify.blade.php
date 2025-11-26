@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register.verify') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="input__grp">
                                    <label for="OTP">Enter OTP</label>
                                    <input class="form-control" type="text" id="OTP" name="email_otp" placeholder="Enter OTP" maxlength="6" minlength="6" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="input__grp mt-3">
                                    <button type="submit" class="cmn__btn btn-block">
                                        <span>
                                            Verify
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <form method="POST" action="{{ route('register.resend') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="input__grp mt-3">
                                    <button type="submit" class="cmn__btn btn-block">
                                        <span>
                                            Resend OTP
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
