@extends('layout')

@section('title')
    <title>{{ config('app.name', 'Email With Report Sent') }}</title>
@endsection

@section('content')

    <div class="container">

     <section class="custom-sections form-section">
         <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                @if (!$mail_failures)
                 <h5 class="text-primary">Email with report was successfully sent on this mail box: <strong>{{$the_email}}</strong></h5>
                @else
                 <h5 class="text-danger">Something went wrong with the email sending, please check this problem with admin.</h5>
                 @endif
             </div>
         </div>
     </section>

    </div>

@endsection

@section('custom_js')

@endsection
