@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-10">
            <h1 class="h1 text-center m-4">Contact</h1>

            <ul>
                <li>Spotted an error?</li>
                <li>Do you have a better photos for a map?</li>
                <li>You've made a map and want to see it published in Shareable Maps?</li>
                <li>Something else?</li>
            </ul>

            <p>
                Please use the following form to contact us, thanks!
            </p>
        </div>

    </div>

    <form action={{ route('postMail') }} method="POST">
        @csrf
        <div class="row justify-content-center mt-1">
            <div class="col-lg-10 col-sm-12 ">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control light-border-primary x1quarter" id="email"
                        aria-describedby="emailHelp" placeholder="Enter your email" required name="email">
                    <small id="emailHelp" class="form-text text-muted">Required field</small>
                </div>

            </div>
            <div class="col-lg-10 col-sm-12">
                <div class="form-group ">
                    <label for="text">Your Message:</label>
                    <textarea class="form-control light-border-primary x1quarter" id="text" rows="5" required
                        name="message"></textarea>
                    <small id="textHelp" class="form-text text-muted">Required field</small>
                    @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            <div class="col-lg-10 col-sm-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
