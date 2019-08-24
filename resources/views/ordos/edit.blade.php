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
                <div class="card-header">Edit ordo {{ $ordo->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ordos.update', $ordo) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="divisio" class="col-md-3 col-form-label text-md-right">{{ __('Classis') }}</label>

                            <div class="col-md-6">
                                <select id="classis" class="custom-select @error('classis') is-invalid @enderror" name="classis">
                                    @foreach(App\Classis::all() as $classis)
                                    <option value="{{ $classis->id }}" @if($classis->classis_id == $classis->id) SELECTED @endif>{{ $classis->name }}</option>
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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $ordo->name }}" required autocomplete="name" autofocus>

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
