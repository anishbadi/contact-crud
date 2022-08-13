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
                <div class="card-header">{{ __('Edit Contact') }}</div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <div class="card-body">
                    <form method="post" action="{{ route('contact.update',$contact) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>{{__('Name')}}<span class="text-danger">*</span></label>
                            <input class="form-control" name="name" type="text" value="{{ old('name') ? old('name') : $contact->name }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('Email')}}<span class="text-danger">*</span></label>
                            <input class="form-control" name="email" type="text" value="{{ old('email') ? old('email') : $contact->email }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('Phone Number')}}<span class="text-danger">*</span></label>
                            <input class="form-control" name="phone_number" type="text" value="{{ old('phone_number') ? old('phone_number') : $contact->phone_number}}">
                        </div>
                        <div>
                            <label>{{__('Address')}}</label>
                            <textarea name="address" class="form-control" cols="10" rows="3">{{ old('address') ? old('address') : $contact->address}}</textarea>
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