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
                <div class="card-header">{{ __('Import Contact') }}</div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                <div class="card-body">
                    <form method="post" action="{{ route('contact.import.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{__('Contact File')}}<span class="text-danger">*</span></label>
                            <input class="form-control" name="file" type="file" value="">
                        </div>
                        <a href="{{url('storage/sample/contacts.xml')}}" download>Click Here for sample file</a>
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