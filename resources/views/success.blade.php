@extends('form')

@section('success')

<div class="container" style="padding: 25px;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Exito!</strong> {{$message}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

@endsection