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

            <div class="card mb-3">
			  <div class="row no-gutters">
			    <div class="col-md-4">
			    	@if($species->getMedia('main')->count() == 0)
			    	<img src="https://placehold.co/600x400?text={{ urlencode(__('No images yet')) }}" class="card-img" alt="{{ $species->binominal_name }}">
			    	@else
			    	<img src="{{ $species->getMedia('main')->first()->getUrl('thumb') }}" class="card-img" alt="{{ $species->binominal_name }}">
			    	@endif
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			      	<p class="card-text">
			      		<small class="text-info">{{ $species->genus->familia->ordo->classis->divisio->regnum->name }} > {{ $species->genus->familia->ordo->classis->divisio->name }} > {{ $species->genus->familia->ordo->classis->name }} > {{ $species->genus->familia->ordo->name }} > {{ $species->genus->familia->name }} > {{ $species->genus->name }}</small>
			      	</p>
			        <h4 class="card-title">{{ $species->binominal_name }}</h4>
			        <p class="card-text">
			        	FR: {{ $species->name_fr }}<br>
			        	EN: {{ $species->name_en }}<br>
			        </p>
			        @if(!empty($species->interesting_cultivar))
			        <p class="card-text">
			        	<strong>{{ __('Interesting cultivars:') }}</strong> {{ implode(', ', $species->interesting_cultivar) }}
			        </p>
			        @endif
			        <p class="card-text">
			        	<small class="text-muted">{{ __('Last updated:') }} {{ $species->updated_at->tz("America/Montreal") }}</small>
			        </p>
			      </div>
			    </div>
			  </div>
			</div>

			<div class="card-deck mb-3">
				<div class="card">
				  <div class="card-header">
				    {{ __('Tolerance / Needs') }}
				  </div>
				  <div class="card-body">
				    <p class="card-text"><strong>{{ __('Hardiness Zone (CA)') }}</strong>: {{ ucfirst($species->hardiness_ca) }}</p>
				    <p class="card-text"><strong>{{ __('Sun') }}</strong>: {!! $species->sun_icon !!}</p>
				    <p class="card-text"><strong>{{ __('Water') }}</strong>: {{ $species->water_icon }}<br><span class="text-muted">{{ __('1 is low, 5 is high.') }}</span></p>
				    <p class="card-text"><strong>{{ __('PH (min / max)') }}</strong>: {{ $species->ph_min }} / {{ $species->ph_max }}</p>
				    <p class="card-text"><strong>{{ __('Soil') }}</strong>: {!! $species->soil_icon !!}</p>
				  </div>
				</div>

				<div class="card">
				  <div class="card-header">
				    {{ __('Architecture') }}
				  </div>
				  <div class="card-body">
				    <p class="card-text"><strong>{{ __('Shape') }}</strong>:
				    	@foreach($species->shape as $shape)
				    		{{ ucfirst(__($shape)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>{{ __('Root') }}</strong>:
				    	@foreach($species->root as $root)
				    		{{ ucfirst(__($root)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>{{ __('Size at maturity (H x W)') }}</strong>:
				    	{{ $species->maturity_height_meters }}m x {{ $species->maturity_width_meters }}<main></main>
				    </p>
				  </div>
				</div>

				<div class="card">
				  <div class="card-header">
				    {{ __('Uses') }}
				  </div>
				  <div class="card-body">
				    <p class="card-text"><strong>{{ __('Comestible') }}</strong>:
				    	@foreach($species->comestible_use as $use)
				    		{{ ucfirst(__($use)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>{{ __('Medicinal') }}</strong>: {{ $species->medicinal_use ? __('Yes') : __('No') }}
				    </p>
				  </div>
				</div>
			</div>

			<div class="card-deck mb-3">
				<div class="card">
				  <div class="card-header">
				    {{ __('Ornemental') }}
				  </div>
				  <div class="card-body">
				    <p class="card-text"><strong>{{ __('Flowering period') }}</strong>:
				    	@foreach($species->flowering_period as $period)
				    		{{ ucfirst(__($period)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>{{ __('Flowering color') }}</strong>:
				    	@foreach($species->flowering_color as $color)
				    		{{ ucfirst(__($color)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>{{ __('Foliage color') }}</strong>:
				    	@foreach($species->foliage_color as $color)
				    		{{ ucfirst(__($color)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>{{ __('Post summer appeal') }}</strong>:
				    	@foreach($species->post_summer_appeal as $season)
				    		{{ ucfirst(__($season)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				  </div>
				</div>

				<div class="card">
				  <div class="card-header">
				    {{ __('Horticulture') }}
				  </div>
				  <div class="card-body">
				    <p class="card-text"><strong>{{ __('Growth') }}</strong>:
				    	@foreach($species->growth as $speed)
				    		{{ ucfirst(__($speed)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>{{ __('Pruning period') }}</strong>:
				    	@foreach($species->pruning_period as $period)
				    		{{ ucfirst(__($period)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>{{ __('Multiplication') }}</strong>:
				    	@foreach($species->multiplication as $method)
				    		{{ ucfirst(__($method)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>{{ __('Disadvantages') }}</strong>:
				    	@foreach($species->disadvantages as $disadvantage)
				    		{{ ucfirst(__($disadvantage)) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				  </div>
				</div>
			</div>

			<div class="card-deck mb-3">
				<div class="card">
			  		<h5 class="card-header">{{ __('Functions') }}</h5>

					<div class="card-body">
						<div class="row">
							<div class="col">
								<p class="card-text"><strong>{{ __('Nitrogen fixer') }}</strong>:
									{{ $species->nitrogen_fixer ? __('Yes') : __('No') }}
								</p>
								<p class="card-text"><strong>{{ __('Nutrients accumulator') }}</strong>:
									{{ $species->nutrient_accumulator ? __('Yes') : __('No') }}
								</p>
								<p class="card-text"><strong>{{ __('Ground cover') }}</strong>:
									{{ $species->ground_cover ? __('Yes') : __('No') }}
								</p>
								<p class="card-text"><strong>{{ __('Hedge') }}</strong>:
									{{ $species->hedge ? __('Yes') : __('No') }}
								</p>
							</div>
							<div class="col">
							<p class="card-text"><strong>{{ __('Wildlife uses') }}</strong>:
								@foreach($species->wildlife_use as $use)
									{{ ucfirst(__($use)) }}
									@if(!$loop->last && $loop->count != 1) , @endif
								@endforeach
							</p>
							<p class="card-text"><strong>{{ __('Ecological uses') }}</strong>:
								@foreach($species->ecological_use as $use)
									{{ ucfirst(__($use)) }}
									@if(!$loop->last && $loop->count != 1) , @endif
								@endforeach
							</p>
							<p class="card-text"><strong>{{ __('Pollinating type') }}</strong>:
								@foreach($species->pollinating_type as $type)
									{{ ucfirst(__($type)) }}
									@if(!$loop->last && $loop->count != 1) , @endif
								@endforeach
							</p>
						</div>
						</div>
					</div>
				</div>

				@if($species->suppliers->isNotEmpty())
				<div class="card">
			  		<h5 class="card-header">{{ __('Suppliers') }}</h5>

					<div class="card-body">
						<ul>
							@foreach($species->suppliers as $supplier)
							<li><a href="{{ $supplier->url }}" target="_blank">{{ $supplier->name }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
				@endif
			</div>

			@if(!empty($species->maintainers_note))
			<div class="card mb-3">
			  <h5 class="card-header">{{ __('Administrators notes') }}</h5>
			  <div class="card-body">
			    {!! $species->maintainers_note !!}
			</div>
			@endif
        </div>
    </div>
</div>
@endsection
