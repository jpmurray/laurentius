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
                <form method="POST" action="{{ route('species.update', $species) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-header">Edit species {{ $species->name }}</div>

                    <div class="card-body">
                        <h5 class="card-title text-md-center">Taxonomy</h5>

                        <div class="form-group row">
                            <label for="genus" class="col-md-3 col-form-label text-md-right">{{ __('Genus') }}</label>

                            <div class="col-md-6">
                                <select id="genus" class="custom-select @error('genus') is-invalid @enderror" name="genus">
                                    @foreach(App\Genus::all() as $genus)
                                    <option value="{{ $genus->id }}" @if($genus->genus_id == $genus->id) SELECTED @endif>{{ $genus->name }}</option>
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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $species->name }}" required autocomplete="name" autofocus>

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
                                <input id="name_fr" type="text" class="form-control @error('name_fr') is-invalid @enderror" name="name_fr" value="{{ $species->name_fr }}" required autocomplete="name_fr" autofocus>

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
                                <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ $species->name_en }}" required autocomplete="name_en" autofocus>

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
                                    <option value="{{ $hardiness }}" @if($species->hardiness_ca == $hardiness) SELECTED @endif>{{ $hardiness }}</option>
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
                                  <input type="checkbox" class="custom-control-input" id="sun_full" name="sun[]" value="full" @if(!is_null($species->sun) && in_array('full',$species->sun)) CHECKED @endif>
                                  <label class="custom-control-label" for="sun_full">Full sun</label>
                                </div>

                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="sun_partial" name="sun[]" value="partial" @if(!is_null($species->sun) && in_array('partial',$species->sun)) CHECKED @endif>
                                  <label class="custom-control-label" for="sun_partial">Partial</label>
                                </div>

                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="full_shade" name="sun[]" value="shade" @if(!is_null($species->sun) && in_array('shade',$species->sun)) CHECKED @endif>
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
                                  <input type="checkbox" class="custom-control-input" id="soil_light" name="soil[]" value="light" @if(!is_null($species->soil) && in_array('light',$species->soil)) CHECKED @endif>
                                  <label class="custom-control-label" for="soil_light">Light</label>
                                </div>

                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="soil_medium" name="soil[]" value="mid" @if(!is_null($species->soil) && in_array('mid',$species->soil)) CHECKED @endif>
                                  <label class="custom-control-label" for="soil_medium">Medium</label>
                                </div>

                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="soil_heavy" name="soil[]" value="heavy" @if(!is_null($species->soil) && in_array('heavy',$species->soil)) CHECKED @endif>
                                  <label class="custom-control-label" for="soil_heavy">Heavy</label>
                                </div>

                                <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="soil_aqua" name="soil[]" value="aqua" @if(!is_null($species->soil) && in_array('aqua',$species->soil)) CHECKED @endif>
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
                                  <input class="form-check-input" type="radio" name="water" id="water_1" value="1" @if(!is_null($species->water) && $species->water == 1) CHECKED @endif>
                                  <label class="form-check-label" for="water_1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="water" id="water_2" value="2" @if(!is_null($species->water) && $species->water == 2) CHECKED @endif>
                                  <label class="form-check-label" for="water_2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="water" id="water_3" value="3" @if(!is_null($species->water) && $species->water == 3) CHECKED @endif>
                                  <label class="form-check-label" for="water_3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="water" id="water_4" value="4" @if(!is_null($species->water) && $species->water == 4) CHECKED @endif>
                                  <label class="form-check-label" for="water_4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="water" id="water_5" value="5" @if(!is_null($species->water) && $species->water == 5) CHECKED @endif>
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
                                <input id="ph_min" type="text" class="form-control @error('ph_min') is-invalid @enderror" name="ph_min" value="{{ $species->ph_min }}" autocomplete="ph_min" autofocus>

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
                                <input id="ph_max" type="text" class="form-control @error('ph_max') is-invalid @enderror" name="ph_max" value="{{ $species->ph_max }}" autocomplete="ph_max" autofocus>

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
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
