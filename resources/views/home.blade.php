@extends('layouts.app')

@section('content')
    <p>Home Administrador</p>

    <form method="POST" action="{{ route('logout') }}" accept-charset="UTF-8" name="logout-form" id="logout-form">
        {{ csrf_field() }}
        <button type="submit">Log Out</button>
    </form>
@endsection

