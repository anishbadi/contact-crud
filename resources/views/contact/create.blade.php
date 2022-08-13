@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('contact.index')}}">Contact</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Contact') }}</div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <div class="card-body">
                    <form method="post" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>{{__('Name')}}<span class="text-danger">*</span></label>
                            <input class="form-control" name="name" type="text" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('Email')}}<span class="text-danger">*</span></label>
                            <input class="form-control" name="email" type="text" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('Phone Number')}}<span class="text-danger">*</span></label>
                            <input class="form-control" name="phone_number" type="text" value="{{ old('phone_number') }}">
                        </div>
                        <div>
                            <label>{{__('Address')}}</label>
                            <textarea name="address" class="form-control" cols="10" rows="3">{{ old('address') }}</textarea>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">{{__('Save Contact')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection