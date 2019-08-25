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
                            <label for="genus" class="col-md-3 col-form-label text-md-right">{{ __('Genus') }} *</label>

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
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }} *</label>

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
                            <label for="name_fr" class="col-md-3 col-form-label text-md-right">{{ __('Name (french)') }} *</label>

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
                            <label for="name_en" class="col-md-3 col-form-label text-md-right">{{ __('Name (english)') }} *</label>

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

                    <h5 class="card-title text-md-center">Architecture</h5>

                    <div class="form-group row">
                        <label for="shape" class="col-md-3 col-form-label text-md-right">{{ __('Shape') }}</label>

                        <div class="col-md-6">
                            @foreach(App\Species::SHAPES as $key => $shape)
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="shape_{{ $shape }}" name="shape[]" value="{{ $shape }}">
                              <label class="custom-control-label" for="shape_{{ $shape }}">{{ ucfirst($shape) }}</label>
                            </div>
                            @endforeach

                            @error('sun')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="root" class="col-md-3 col-form-label text-md-right">{{ __('Root') }}</label>

                        <div class="col-md-6">
                            @foreach(App\Species::ROOTS as $key => $root)
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="root_{{ $root }}" name="root[]" value="{{ $root }}">
                              <label class="custom-control-label" for="root_{{ $root }}">{{ ucfirst($root) }}</label>
                            </div>
                            @endforeach

                            @error('sun')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="maturity_height_meters" class="col-md-3 col-form-label text-md-right">{{ __('Hight, maturity (meters)') }}</label>

                        <div class="col-md-6">
                            <input id="maturity_height_meters" type="text" class="form-control @error('maturity_height_meters') is-invalid @enderror" name="maturity_height_meters" value="{{ old('maturity_height_meters') }}" autocomplete="maturity_height_meters" autofocus>

                            @error('maturity_height_meters')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="maturity_width_meters" class="col-md-3 col-form-label text-md-right">{{ __('Width, maturity (meters)') }}</label>

                        <div class="col-md-6">
                            <input id="maturity_width_meters" type="text" class="form-control @error('maturity_width_meters') is-invalid @enderror" name="maturity_width_meters" value="{{ old('maturity_width_meters') }}" autocomplete="maturity_width_meters" autofocus>

                            @error('maturity_width_meters')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <h5 class="card-title text-md-center">Functions</h5>

                    <div class="form-group row">
                        <label for="nitrogen_fixer" class="col-md-3 col-form-label text-md-right">{{ __('Nitrogen fixer') }}</label>

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="nitrogen_fixer" id="nitrogen_fixer_yes" value="1">
                              <label class="form-check-label" for="nitrogen_fixer_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="nitrogen_fixer" id="nitrogen_fixer_no" value="0">
                              <label class="form-check-label" for="nitrogen_fixer_no">No</label>
                            </div>

                            @error('soil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nutrient_accumulator" class="col-md-3 col-form-label text-md-right">{{ __('Nutrients accumulator') }}</label>

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="nutrient_accumulator" id="nutrient_accumulator_yes" value="1">
                              <label class="form-check-label" for="nutrient_accumulator_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="nutrient_accumulator" id="nutrient_accumulator_no" value="0">
                              <label class="form-check-label" for="nutrient_accumulator_no">No</label>
                            </div>

                            @error('soil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ground_cover" class="col-md-3 col-form-label text-md-right">{{ __('Ground cover') }}</label>

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="ground_cover" id="ground_cover_yes" value="1">
                              <label class="form-check-label" for="ground_cover_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="ground_cover" id="ground_cover_no" value="0">
                              <label class="form-check-label" for="ground_cover_no">No</label>
                            </div>

                            @error('soil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hedge" class="col-md-3 col-form-label text-md-right">{{ __('Hedge') }}</label>

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="hedge" id="hedge_yes" value="1">
                              <label class="form-check-label" for="hedge_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="hedge" id="hedge_no" value="0">
                              <label class="form-check-label" for="hedge_no">No</label>
                            </div>

                            @error('soil')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="wildlife_use" class="col-md-3 col-form-label text-md-right">{{ __('Wildlife uses') }}</label>

                        <div class="col-md-6">
                            @foreach(App\Species::WILDLIFE_USES as $key => $use)
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="wildlife_use_{{ $use }}" name="wildlife_use[]" value="{{ $use }}">
                              <label class="custom-control-label" for="wildlife_use_{{ $use }}">{{ ucfirst($use) }}</label>
                            </div>
                            @endforeach

                            @error('wildlife_use')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ecological_use" class="col-md-3 col-form-label text-md-right">{{ __('Ecological uses') }}</label>

                        <div class="col-md-6">
                            @foreach(App\Species::ECOLOGICAL_USES as $key => $use)
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="ecological_use_{{ $use }}" name="ecological_use[]" value="{{ $use }}">
                              <label class="custom-control-label" for="ecological_use_{{ $use }}">{{ ucfirst($use) }}</label>
                            </div>
                            @endforeach

                            @error('ecological_use')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pollinating_type" class="col-md-3 col-form-label text-md-right">{{ __('Pollinating type') }}</label>

                        <div class="col-md-6">
                            @foreach(App\Species::POLLINATING_TYPES as $key => $type)
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="pollinating_type_{{ $type }}" name="pollinating_type[]" value="{{ $type }}">
                              <label class="custom-control-label" for="pollinating_type_{{ $type }}">{{ ucfirst($type) }}</label>
                            </div>
                            @endforeach

                            @error('pollinating_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <h5 class="card-title text-md-center">Uses</h5>

                    <div class="form-group row">
                        <label for="medicinal_use" class="col-md-3 col-form-label text-md-right">{{ __('Medicinal use') }}</label>

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="medicinal_use" id="medicinal_use_yes" value="1">
                              <label class="form-check-label" for="medicinal_use_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="medicinal_use" id="medicinal_use_no" value="0">
                              <label class="form-check-label" for="nitrogen_fixer_no">No</label>
                            </div>

                            @error('medicinal_use')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="comestible_use" class="col-md-3 col-form-label text-md-right">{{ __('Comestible use') }}</label>

                        <div class="col-md-6">
                            @foreach(App\Species::COMESTIBLE_USES as $key => $use)
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="comestible_use_{{ $use }}" name="comestible_use[]" value="{{ $use }}">
                              <label class="custom-control-label" for="comestible_use_{{ $use }}">{{ ucfirst($use) }}</label>
                            </div>
                            @endforeach

                            @error('comestible_use')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <h5 class="card-title text-md-center">Ornemental</h5>

                    <div class="form-group row">
                        <label for="flowering_period" class="col-md-3 col-form-label text-md-right">{{ __('Flowering period') }}</label>

                        <div class="col-md-6">
                            @foreach(App\Species::FLOWERING_PERIODS as $key => $period)
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="flowering_period_{{ $period }}" name="flowering_period[]" value="{{ $period }}">
                              <label class="custom-control-label" for="flowering_period_{{ $period }}">{{ ucfirst($period) }}</label>
                            </div>
                            @endforeach

                            @error('flowering_period')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="flowering_color" class="col-md-3 col-form-label text-md-right">{{ __('Flowering color') }}</label>

                        <div class="col-md-6">
                            @foreach(App\Species::FLOWERING_COLORS as $key => $color)
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="flowering_color_{{ $color }}" name="flowering_color[]" value="{{ $color }}">
                              <label class="custom-control-label" for="flowering_color_{{ $color }}">{{ ucfirst($color) }}</label>
                            </div>
                            @endforeach

                            @error('flowering_color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foliage_color" class="col-md-3 col-form-label text-md-right">{{ __('Foliage color') }}</label>

                        <div class="col-md-6">
                            @foreach(App\Species::FOLIAGE_COLORS as $key => $color)
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="foliage_color_{{ $color }}" name="foliage_color[]" value="{{ $color }}">
                              <label class="custom-control-label" for="foliage_color_{{ $color }}">{{ ucfirst($color) }}</label>
                            </div>
                            @endforeach

                            @error('foliage_color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="post_summer_appeal" class="col-md-3 col-form-label text-md-right">{{ __('Post summer appeal') }}</label>

                        <div class="col-md-6">
                            @foreach(App\Species::POST_SUMMER_APPEALS as $key => $season)
                            <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="post_summer_appeal_{{ $season }}" name="post_summer_appeal[]" value="{{ $season }}">
                              <label class="custom-control-label" for="post_summer_appeal_{{ $season }}">{{ ucfirst($season) }}</label>
                            </div>
                            @endforeach

                            @error('post_summer_appeal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
