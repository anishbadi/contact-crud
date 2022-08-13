@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Contacts') }}
                        <a class="btn btn-success ml-2 float-right" href="{{route('contact.create')}}">{{__('Add Contact')}}</a>
                        <a class="btn btn-success float-right" href="{{route('contact.import')}}">{{__('Import Contact')}}</a>
                    </div>
                    @if(session()->has('message'))
                        <div class="alert alert-success"> {{ session()->get('message') }} </div>
                    @endif
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Phone Number') }}</th>
                                    <th scope="col">{{ __('Address') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone_number}}</td>
                                        <td>{{$contact->address}}</td>
                                        <td>
                                            <button><a href="{{route('contact.show',$contact)}}"><i class="bi bi-eye-fill"></i></a></button>
                                            <button><a href="{{route('contact.edit',$contact)}}"><i class="bi bi-pencil-fill"></i></a></button>
                                            <form class="d-inline" method="post" action="{{ route('contact.destroy',$contact) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h1>{{ __('No Contact found') }}</h1>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
