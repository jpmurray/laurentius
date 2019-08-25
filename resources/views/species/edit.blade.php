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

            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    Here you can edit known informations about {{ $species->binominal_name }}. <strong>Mandatory fields are marked with an asterisk (*).</strong>
                </div>
            </div>
            
            <form method="POST" action="{{ route('species.update', $species) }}">
                @csrf
                @method('PUT')

                <div class="card mb-3">
                    <div class="card-header">Taxonomy</div>

                    <div class="card-body">
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
                    </div>
                </div>

                <div class="card-deck mb-3">
                    <div class="card">
                        <div class="card-header">
                            Tolerance / Needs
                        </div>
                        <div class="card-body">
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
                                    @foreach(App\Species::SUN as $key => $sun)
                                        <div class="custom-control custom-switch">
                                            <input
                                            @if(!is_null($species->sun) && in_array($sun,$species->sun)) CHECKED @endif
                                            type="checkbox" class="custom-control-input" id="sun_{{ $sun }}" name="sun[]" value="{{ $sun }}">
                                            <label class="custom-control-label" for="sun_{{ $sun }}">{{ ucfirst($sun) }}</label>
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
                                <label for="soil" class="col-md-3 col-form-label text-md-right">{{ __('Soil') }}</label>

                                <div class="col-md-6">
                                    @foreach(App\Species::SOIL as $key => $soil)
                                        <div class="custom-control custom-switch">
                                            <input
                                            @if(!is_null($species->soil) && in_array($soil,$species->soil)) CHECKED @endif
                                            type="checkbox" class="custom-control-input" id="soil_{{ $soil }}" name="soil[]" value="{{ $soil }}">
                                            <label class="custom-control-label" for="soil_{{ $soil }}">{{ ucfirst($soil) }}</label>
                                        </div>
                                    @endforeach

                                    @error('soil')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="water" class="col-md-3 col-form-label text-md-right">{{ __('Water') }}</label>

                                <div class="col-md-8">
                                    @foreach(App\Species::WATER as $key => $water)
                                        <div class="form-check form-check-inline">
                                            <input
                                            @if(!is_null($species->water) && $species->water == $water) CHECKED @endif
                                            class="form-check-input" type="radio" id="water_{{ $water }}" name="water" value="{{ $water }}">
                                            <label class="form-check-label" for="water_{{ $water }}">{{ ucfirst($water) }}</label>
                                        </div>
                                    @endforeach

                                    <span class="form-text text-muted">from Low (1) to High (5)</span>

                                    @error('water')
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
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Architecture
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="shape" class="col-md-3 col-form-label text-md-right">{{ __('Shape') }}</label>

                                <div class="col-md-6">
                                    @foreach(App\Species::SHAPES as $key => $shape)
                                    <div class="custom-control custom-switch">
                                      <input type="checkbox" class="custom-control-input" id="shape_{{ $shape }}" name="shape[]" value="{{ $shape }}" @if(!is_null($species->shape) && in_array($shape, $species->shape)) CHECKED @endif>
                                      <label class="custom-control-label" for="shape_{{ $shape }}">{{ ucfirst($shape) }}</label>
                                    </div>
                                    @endforeach

                                    @error('shape')
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
                                      <input type="checkbox" class="custom-control-input" id="root_{{ $root }}" name="root[]" value="{{ $root }}" @if(!is_null($species->root) && in_array($root, $species->root)) CHECKED @endif>
                                      <label class="custom-control-label" for="root_{{ $root }}">{{ ucfirst($root) }}</label>
                                    </div>
                                    @endforeach

                                    @error('root')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="maturity_height_meters" class="col-md-3 col-form-label text-md-right">{{ __('Hight, maturity (meters)') }}</label>

                                <div class="col-md-6">
                                    <input id="maturity_height_meters" type="text" class="form-control @error('maturity_height_meters') is-invalid @enderror" name="maturity_height_meters" value="{{ $species->maturity_height_meters }}" autocomplete="maturity_height_meters" autofocus>

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
                                    <input id="maturity_width_meters" type="text" class="form-control @error('maturity_width_meters') is-invalid @enderror" name="maturity_width_meters" value="{{ $species->maturity_width_meters }}" autocomplete="maturity_width_meters" autofocus>

                                    @error('maturity_width_meters')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-deck mb-3">
                    <div class="card">
                        <div class="card-header">
                            Functions
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nitrogen_fixer" class="col-md-3 col-form-label text-md-right">{{ __('Nitrogen fixer') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="nitrogen_fixer" id="nitrogen_fixer_yes" value="1" @if(!is_null($species->nitrogen_fixer) && $species->nitrogen_fixer) CHECKED @endif>
                                      <label class="form-check-label" for="nitrogen_fixer_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="nitrogen_fixer" id="nitrogen_fixer_no" value="0" @if(!is_null($species->nitrogen_fixer) && !$species->nitrogen_fixer) CHECKED @endif>
                                      <label class="form-check-label" for="nitrogen_fixer_no">No</label>
                                    </div>

                                    @error('nitrogen_fixer')
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
                                      <input class="form-check-input" type="radio" name="nutrient_accumulator" id="nutrient_accumulator_yes" value="1" @if(!is_null($species->nutrient_accumulator) && $species->nutrient_accumulator) CHECKED @endif>
                                      <label class="form-check-label" for="nutrient_accumulator_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="nutrient_accumulator" id="nutrient_accumulator_no" value="0" @if(!is_null($species->nutrient_accumulator) && !$species->nutrient_accumulator) CHECKED @endif>
                                      <label class="form-check-label" for="nutrient_accumulator_no">No</label>
                                    </div>

                                    @error('nutrient_accumulator')
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
                                      <input class="form-check-input" type="radio" name="ground_cover" id="ground_cover_yes" value="1" @if(!is_null($species->ground_cover) && $species->ground_cover) CHECKED @endif>
                                      <label class="form-check-label" for="ground_cover_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="ground_cover" id="ground_cover_no" value="0" @if(!is_null($species->ground_cover) && !$species->ground_cover) CHECKED @endif>
                                      <label class="form-check-label" for="ground_cover_no">No</label>
                                    </div>

                                    @error('ground_cover')
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
                                      <input class="form-check-input" type="radio" name="hedge" id="hedge_yes" value="1" @if(!is_null($species->hedge) && $species->hedge) CHECKED @endif>
                                      <label class="form-check-label" for="hedge_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="hedge" id="hedge_no" value="0" @if(!is_null($species->hedge) && !$species->hedge) CHECKED @endif>
                                      <label class="form-check-label" for="hedge_no">No</label>
                                    </div>

                                    @error('hedge')
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
                                      <input type="checkbox" class="custom-control-input" id="wildlife_use_{{ $use }}" name="wildlife_use[]" value="{{ $use }}" @if(!is_null($species->wildlife_use) && in_array($use, $species->wildlife_use)) CHECKED @endif>
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
                                      <input type="checkbox" class="custom-control-input" id="ecological_use_{{ $use }}" name="ecological_use[]" value="{{ $use }}" @if(!is_null($species->ecological_use) && in_array($use, $species->ecological_use)) CHECKED @endif>
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
                                      <input type="checkbox" class="custom-control-input" id="pollinating_type_{{ $type }}" name="pollinating_type[]" value="{{ $type }}" @if(!is_null($species->pollinating_type) && in_array($type, $species->pollinating_type)) CHECKED @endif>
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
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Usage
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="medicinal_use" class="col-md-3 col-form-label text-md-right">{{ __('Medicinal use') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="medicinal_use" id="medicinal_use_yes" value="1" @if(!is_null($species->medicinal_use) && $species->medicinal_use) CHECKED @endif>
                                      <label class="form-check-label" for="medicinal_use_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="medicinal_use" id="medicinal_use_no" value="0" @if(!is_null($species->medicinal_use) && !$species->medicinal_use) CHECKED @endif>
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
                                      <input type="checkbox" class="custom-control-input" id="comestible_use_{{ $use }}" name="comestible_use[]" value="{{ $use }}" @if(!is_null($species->comestible_use) && in_array($use, $species->comestible_use)) CHECKED @endif>
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
                        </div>
                    </div>
                </div>

                <div class="card-deck mb-3">
                    <div class="card">
                        <div class="card-header">
                            Ornemental
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="flowering_period" class="col-md-3 col-form-label text-md-right">{{ __('Flowering period') }}</label>

                                <div class="col-md-6">
                                    @foreach(App\Species::FLOWERING_PERIODS as $key => $period)
                                    <div class="custom-control custom-switch">
                                      <input type="checkbox" class="custom-control-input" id="flowering_period_{{ $period }}" name="flowering_period[]" value="{{ $period }}" @if(!is_null($species->flowering_period) && in_array($period, $species->flowering_period)) CHECKED @endif>
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
                                      <input type="checkbox" class="custom-control-input" id="flowering_color_{{ $color }}" name="flowering_color[]" value="{{ $color }}" @if(!is_null($species->flowering_color) && in_array($color, $species->flowering_color)) CHECKED @endif>
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
                                      <input type="checkbox" class="custom-control-input" id="foliage_color_{{ $color }}" name="foliage_color[]" value="{{ $color }}" @if(!is_null($species->foliage_color) && in_array($color, $species->foliage_color)) CHECKED @endif>
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
                                      <input type="checkbox" class="custom-control-input" id="post_summer_appeal_{{ $season }}" name="post_summer_appeal[]" value="{{ $season }}" @if(!is_null($species->post_summer_appeal) && in_array($season, $species->post_summer_appeal)) CHECKED @endif>
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
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Horticulture
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="growth" class="col-md-3 col-form-label text-md-right">{{ __('Growth') }}</label>

                                <div class="col-md-6">
                                    @foreach(App\Species::GROWTH_SPEEDS as $key => $speed)
                                    <div class="custom-control custom-switch">
                                      <input type="checkbox" class="custom-control-input" id="growth_{{ $speed }}" name="growth[]" value="{{ $speed }}" @if(!is_null($species->growth) && in_array($speed, $species->growth)) CHECKED @endif>
                                      <label class="custom-control-label" for="growth_{{ $speed }}">{{ ucfirst($speed) }}</label>
                                    </div>
                                    @endforeach

                                    @error('growth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pruning_period" class="col-md-3 col-form-label text-md-right">{{ __('Pruning period') }}</label>

                                <div class="col-md-6">
                                    @foreach(App\Species::PRUNING_PERIODS as $key => $period)
                                    <div class="custom-control custom-switch">
                                      <input type="checkbox" class="custom-control-input" id="pruning_period_{{ $period }}" name="pruning_period[]" value="{{ $period }}" @if(!is_null($species->pruning_period) && in_array($period, $species->pruning_period)) CHECKED @endif>
                                      <label class="custom-control-label" for="pruning_period_{{ $period }}">{{ ucfirst($period) }}</label>
                                    </div>
                                    @endforeach

                                    @error('pruning_period')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="multiplication" class="col-md-3 col-form-label text-md-right">{{ __('Multiplication') }}</label>

                                <div class="col-md-6">
                                    @foreach(App\Species::MULTIPLICATIONS as $key => $method)
                                    <div class="custom-control custom-switch">
                                      <input type="checkbox" class="custom-control-input" id="multiplication_{{ $method }}" name="multiplication[]" value="{{ $method }}" @if(!is_null($species->multiplication) && in_array($method, $species->multiplication)) CHECKED @endif>
                                      <label class="custom-control-label" for="multiplication_{{ $method }}">{{ ucfirst($method) }}</label>
                                    </div>
                                    @endforeach

                                    @error('multiplication')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="disadvantages" class="col-md-3 col-form-label text-md-right">{{ __('Disadvantages') }}</label>

                                <div class="col-md-6">
                                    @foreach(App\Species::DISADVANTAGES as $key => $reason)
                                    <div class="custom-control custom-switch">
                                      <input type="checkbox" class="custom-control-input" id="disadvantages_{{ $reason }}" name="disadvantages[]" value="{{ $reason }}" @if(!is_null($species->disadvantages) && in_array($reason, $species->disadvantages)) CHECKED @endif>
                                      <label class="custom-control-label" for="disadvantages_{{ $reason }}">{{ ucfirst($reason) }}</label>
                                    </div>
                                    @endforeach

                                    @error('disadvantages')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">Others</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="interesting_cultivar" class="col-md-3 col-form-label text-md-right">{{ __('Interesting cultivars') }} *</label>

                            <div class="col-md-6">
                                <input id="interesting_cultivar" type="text" class="form-control @error('interesting_cultivar') is-invalid @enderror" name="interesting_cultivar" value="{{ implode(',', $species->interesting_cultivar) }}" autofocus>

                                <span class="form-text">Separate each cultivar with comas,<br>ex: <code>a cool cultivar,cultivar1,another cultivar</code></span>

                                @error('interesting_cultivar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <button type="submit" class="btn btn-lg btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
