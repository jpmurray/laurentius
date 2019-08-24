@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a new familia</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('familias.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="ordo" class="col-md-3 col-form-label text-md-right">{{ __('Ordo') }}</label>

                            <div class="col-md-6">
                                <select id="ordo" class="custom-select @error('ordo') is-invalid @enderror" name="ordo">
                                    @foreach(App\Ordo::all() as $ordo)
                                    <option value="{{ $ordo->id }}">{{ $ordo->name }}</option>
                                    @endforeach
                                </select>

                                @error('ordo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    {{ __('Add') }}
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
