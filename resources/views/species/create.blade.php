@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ route('species.store') }}">
                    @csrf

                    <div class="card-header">Create a new species</div>

                    <div class="card-body">
                        <h5 class="card-title text-md-center">Taxonomy</h5>

                        <div class="form-group row">
                            <label for="genus" class="col-md-3 col-form-label text-md-right">{{ __('Genus') }}</label>

                            <div class="col-md-6">
                                <select id="genus" class="custom-select @error('genus') is-invalid @enderror" name="genus">
                                    @foreach(App\Genus::all() as $genus)
                                    <option value="{{ $genus->id }}">{{ $genus->name }}</option>
                                    @endforeach
                                </select>

                                @error('genus')
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

                        <div class="form-group row">
                            <label for="name_fr" class="col-md-3 col-form-label text-md-right">{{ __('Name (french)') }}</label>

                            <div class="col-md-6">
                                <input id="name_fr" type="text" class="form-control @error('name_fr') is-invalid @enderror" name="name_fr" value="{{ old('name_fr') }}" required autocomplete="name_fr" autofocus>

                                @error('name_fr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_en" class="col-md-3 col-form-label text-md-right">{{ __('Name (english)') }}</label>

                            <div class="col-md-6">
                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ old('name_en') }}" required autocomplete="name_en" autofocus>

                                @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <h5 class="card-title text-md-center">Needs / Tolerance</h5>

                        <div class="form-group row">
                            <label for="hardiness_ca" class="col-md-3 col-form-label text-md-right">{{ __('Plan hardiness (Canada)') }}</label>

                            <div class="col-md-6">
                                <select id="hardiness_ca" class="custom-select @error('hardiness_ca') is-invalid @enderror" name="hardiness_ca">
                                    <option value="null">Unknown</option>
                                    @foreach(App\Species::HARDINESS_CA as $key => $hardiness)
                                    <option value="{{ $hardiness }}">{{ $hardiness }}</option>
                                    @endforeach
                                </select>

                                @error('hardiness_ca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sun" class="col-md-3 col-form-label text-md-right">{{ __('Sun') }}</label>

                            <div class="col-md-6">
                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="sun_full" name="sun[]" value="full">
                                  <label class="custom-control-label" for="sun_full">Full sun</label>
                                </div>

                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="sun_partial" name="sun[]" value="partial">
                                  <label class="custom-control-label" for="sun_partial">Partial</label>
                                </div>

                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="full_shade" name="sun[]" value="shade">
                                  <label class="custom-control-label" for="full_shade">Full shade</label>
                                </div>

                                @error('sun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="soil" class="col-md-3 col-form-label text-md-right">{{ __('Soil') }}</label>

                            <div class="col-md-6">
                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="soil_light" name="soil[]" value="light">
                                  <label class="custom-control-label" for="soil_light">Light</label>
                                </div>

                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="soil_medium" name="soil[]" value="mid">
                                  <label class="custom-control-label" for="soil_medium">Medium</label>
                                </div>

                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="soil_heavy" name="soil[]" value="heavy">
                                  <label class="custom-control-label" for="soil_heavy">Heavy</label>
                                </div>

                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="soil_aqua" name="soil[]" value="aqua">
                                  <label class="custom-control-label" for="soil_aqua">Aquatic</label>
                                </div>

                                @error('soil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="water" class="col-md-3 col-form-label text-md-right">{{ __('Water') }}</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="water" id="water_1" value="1">
                                  <label class="form-check-label" for="water_1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="water" id="water_2" value="2">
                                  <label class="form-check-label" for="water_2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="water" id="water_3" value="3">
                                  <label class="form-check-label" for="water_3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="water" id="water_4" value="4">
                                  <label class="form-check-label" for="water_4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="water" id="water_5" value="5">
                                  <label class="form-check-label" for="water_5">5</label>
                                </div>

                                @error('soil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ph_min" class="col-md-3 col-form-label text-md-right">{{ __('PH (Mininum)') }}</label>

                            <div class="col-md-6">
                                <input id="ph_min" type="text" class="form-control @error('ph_min') is-invalid @enderror" name="ph_min" value="{{ old('ph_min') }}" autocomplete="ph_min" autofocus>

                                @error('ph_min')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ph_max" class="col-md-3 col-form-label text-md-right">{{ __('PH (Maximum)') }}</label>

                            <div class="col-md-6">
                                <input id="ph_max" type="text" class="form-control @error('ph_max') is-invalid @enderror" name="ph_max" value="{{ old('ph_max') }}" autocomplete="ph_max" autofocus>

                                @error('ph_max')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">
                            {{ __('Add') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
