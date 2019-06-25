@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            <h2>{{ session('message') }}</h2>
                        </div>
                    @endif
                    <h2>Update config variable</h2>
                       <form method="POST" action="{{ route('updateconfig') }}">
                            <div class="form-group row">
                            @csrf
                            @if ($config_variables)
                                @foreach($config_variables AS $key=>$val)
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ $key }}:
                                     </label>
                                    <div class="col-md-6">
                                        <input type="text" value="{{ $val }}" name="{{ $key }}" class="form-control">
                                    </div>
                                @endforeach
                            @endif
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
