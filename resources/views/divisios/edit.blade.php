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
                <div class="card-header">{{ __('Edit :name', ['name' => $divisio->name]) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('divisios.update', $divisio) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="regnum" class="col-md-3 col-form-label text-md-right">{{ __('Regnum') }}</label>

                            <div class="col-md-6">
                                <select id="regnum" class="custom-select @error('regnum') is-invalid @enderror" name="regnum">
                                    @foreach(App\Regnum::all() as $regnum)
                                    <option value="{{ $regnum->id }}" @if($divisio->regnum_id == $regnum->id) SELECTED @endif>{{ $regnum->name }}</option>
                                    @endforeach
                                </select>

                                @error('regnum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $divisio->name }}" required autocomplete="name" autofocus>

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
