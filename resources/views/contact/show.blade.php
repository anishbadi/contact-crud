@extends('layouts.app') 
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('contact.index')}}">Contact</a></li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Contact Detail') }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$contact->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$contact->email}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">{{$contact->phone_number}}</h6>
                        <p class="card-text">{{$contact->address}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
