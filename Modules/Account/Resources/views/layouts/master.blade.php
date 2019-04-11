@extends('home')
{{-- Laravel Mix - JS File --}}
{{-- <script src="{{ mix('js/account.js') }}"></script> --}}
@section('aside')
    @include('account::partials.accountInfo')
@endsection