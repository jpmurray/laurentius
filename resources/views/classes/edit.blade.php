@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">Edit classis {{ $classis->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('classes.update', $classis) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="divisio" class="col-md-3 col-form-label text-md-right">{{ __('Divisio') }}</label>

                            <div class="col-md-6">
                                <select id="divisio" class="custom-select @error('divisio') is-invalid @enderror" name="divisio">
                                    @foreach(App\Divisio::all() as $divisio)
                                    <option value="{{ $divisio->id }}" @if($divisio->divisio_id == $divisio->id) SELECTED @endif>{{ $divisio->name }}</option>
                                    @endforeach
                                </select>

                                @error('divisio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $classis->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
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
