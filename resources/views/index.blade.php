@extends('statamic::layout')
@section('title', __('Afterschool'))

@section('content')

<h1 class="flex-1">Constant Contact</h1>

    @if($access_token === 'Error')
        Please authenticate.
        <a href="/cp/constantcontact/auth">Sign in with Constant Contact</a>
    @else
        <a href="/cp/constantcontact/logout" onclick="return confirm('If you logout, you will disable Constant Contact anywhere it is used on the site.  Are you sure?');">Log out of your account.</a>
    @endif

@endsection
