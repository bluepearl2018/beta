@extends('profile::layouts.master')
@section('content')
@include('flash::message')
<div class="card">
    <h2 class="card-header bg-secondary">
        @lang('profile.addCertificate')
    </h2>
    <div class="card-body">
        <p class="lead">
            @lang('profile.addCertificateLead')
        </p>
        @if ($errors->any())
            <div class="container alert alert-danger mb-2">
                <ul class="m-0 pb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row container">
            {!! Form::open(['route' => 'users-certificates.store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
                @csrf
                @include('profile::userCertificates.fields') 
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                $('.custom-file-label').html(fileName);
            });
        });
    </script>
@endsection