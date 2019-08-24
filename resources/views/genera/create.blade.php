@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a new genus</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('genera.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="familia" class="col-md-3 col-form-label text-md-right">{{ __('Familia') }}</label>

                            <div class="col-md-6">
                                <select id="familia" class="custom-select @error('familia') is-invalid @enderror" name="familia">
                                    @foreach(App\Familia::all() as $familia)
                                    <option value="{{ $familia->id }}">{{ $familia->name }}</option>
                                    @endforeach
                                </select>

                                @error('familia')
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
