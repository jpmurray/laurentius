@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a new ordo</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ordos.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="classis" class="col-md-3 col-form-label text-md-right">{{ __('Classis') }}</label>

                            <div class="col-md-6">
                                <select id="classis" class="custom-select @error('classis') is-invalid @enderror" name="classis">
                                    @foreach(App\Classis::all() as $classis)
                                    <option value="{{ $classis->id }}">{{ $classis->name }}</option>
                                    @endforeach
                                </select>

                                @error('classis')
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
