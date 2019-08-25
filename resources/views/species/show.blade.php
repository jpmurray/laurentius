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
			      <img src="https://placehold.co/600x400" class="card-img" alt="{{ $species->binominal_name }}">
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
			        <p class="card-text">
			        	<strong>Interesting cultivars:</strong> {{ implode(', ', $species->interesting_cultivar) }}
			        </p>
			        <p class="card-text">
			        	<small class="text-muted">Dernière mise à jour: {{ $species->updated_at->tz("America/Montreal") }}</small>
			        </p>
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
				    <p class="card-text"><strong>Hardiness Zone (CA)</strong>: {{ ucfirst($species->hardiness_ca) }}</p>
				    <p class="card-text"><strong>Sun</strong>: {!! $species->sun_icon !!}</p>
				    <p class="card-text"><strong>Water</strong>: {{ $species->water_icon }}<br><span class="text-muted">1 is low, 5 is high.</span></p>
				    <p class="card-text"><strong>PH (min / max)</strong>: {{ $species->ph_min }} / {{ $species->ph_max }}</p>
				    <p class="card-text"><strong>Soil</strong>: {!! $species->soil_icon !!}</p>
				  </div>
				</div>

				<div class="card">
				  <div class="card-header">
				    Architecture
				  </div>
				  <div class="card-body">
				    <p class="card-text"><strong>Shape</strong>:
				    	@foreach($species->shape as $shape)
				    		{{ ucfirst($shape) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>Root</strong>:
				    	@foreach($species->root as $root)
				    		{{ ucfirst($root) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    </p>
				    <p class="card-text"><strong>Size at maturity (H x W)</strong>:
				    	{{ $species->maturity_height_meters }}m x {{ $species->maturity_width_meters }}<main></main>
				    </p>
				  </div>
				</div>

				<div class="card">
				  <div class="card-header">
				    Uses
				  </div>
				  <div class="card-body">
				    <p class="card-text"><strong>Comestible</strong>:
				    	@if($species->comestible_use == null)
				    	None or unknown.
				    	@else
				    	@foreach($species->comestible_use as $use)
				    		{{ ucfirst($use) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    	@endif
				    </p>
				    <p class="card-text"><strong>Medicinal</strong>: {{ $species->medicinal_use ? "Yes" : "No" }}
				    </p>
				  </div>
				</div>
			</div>

			<div class="card-deck mb-3">
				<div class="card">
				  <div class="card-header">
				    Ornemental
				  </div>
				  <div class="card-body">
				    <p class="card-text"><strong>Flowering period</strong>:
				    	@if($species->flowering_period == null)
				    	None or unknown.
				    	@else
				    	@foreach($species->flowering_period as $period)
				    		{{ ucfirst($period) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    	@endif
				    </p>
				    <p class="card-text"><strong>Flowering color</strong>:
				    	@if($species->flowering_color == null)
				    	None or unknown.
				    	@else
				    	@foreach($species->flowering_color as $color)
				    		{{ ucfirst($color) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    	@endif
				    </p>
				    <p class="card-text"><strong>Foliage color</strong>:
				    	@if($species->foliage_color == null)
				    	None or unknown.
				    	@else
				    	@foreach($species->foliage_color as $color)
				    		{{ ucfirst($color) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    	@endif
				    </p>
				    <p class="card-text"><strong>Post summer appeal</strong>:
				    	@if($species->post_summer_appeal == null)
				    	None or unknown.
				    	@else
				    	@foreach($species->post_summer_appeal as $season)
				    		{{ ucfirst($season) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    	@endif
				    </p>
				  </div>
				</div>

				<div class="card">
				  <div class="card-header">
				    Horticulture
				  </div>
				  <div class="card-body">
				    <p class="card-text"><strong>Growth</strong>:
				    	@if($species->growth == null)
				    	None or unknown.
				    	@else
				    	@foreach($species->growth as $speed)
				    		{{ ucfirst($speed) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    	@endif
				    </p>
				    <p class="card-text"><strong>Pruning period</strong>:
				    	@if($species->pruning_period == null)
				    	None or unknown.
				    	@else
				    	@foreach($species->pruning_period as $period)
				    		{{ ucfirst($period) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    	@endif
				    </p>
				    <p class="card-text"><strong>Multiplication</strong>:
				    	@if($species->multiplication == null)
				    	None or unknown.
				    	@else
				    	@foreach($species->multiplication as $method)
				    		{{ ucfirst($method) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    	@endif
				    </p>
				    <p class="card-text"><strong>Disadvantages</strong>:
				    	@if($species->disadvantages == null)
				    	None or unknown.
				    	@else
				    	@foreach($species->disadvantages as $disadvantage)
				    		{{ ucfirst($disadvantage) }}
				    		@if(!$loop->last && $loop->count != 1) , @endif
				    	@endforeach
				    	@endif
				    </p>
				  </div>
				</div>
			</div>

			<div class="card">
			  <h5 class="card-header">Functions</h5>
			  <div class="card-body">
			    <p class="card-text"><strong>Nitrogen fixer</strong>:
			    	{{ $species->nitrogen_fixer ? "Yes" : "No" }}
			    </p>
			    <p class="card-text"><strong>Nutrients accumulator</strong>:
			    	{{ $species->nutrient_accumulator ? "Yes" : "No" }}
			    </p>
			    <p class="card-text"><strong>Ground cover</strong>:
			    	{{ $species->ground_cover ? "Yes" : "No" }}
			    </p>
			    <p class="card-text"><strong>Hedge</strong>:
			    	{{ $species->hedge ? "Yes" : "No" }}
			    </p>
			    <p class="card-text"><strong>Wildlife use</strong>:
			    	@foreach($species->wildlife_use as $use)
			    		{{ ucfirst($use) }}
			    		@if(!$loop->last && $loop->count != 1) , @endif
			    	@endforeach
			    </p>
			    <p class="card-text"><strong>Ecological use</strong>:
			    	@foreach($species->ecological_use as $use)
			    		{{ ucfirst($use) }}
			    		@if(!$loop->last && $loop->count != 1) , @endif
			    	@endforeach
			    </p>
			    <p class="card-text"><strong>Pollinating type</strong>:
			    	@foreach($species->pollinating_type as $type)
			    		{{ ucfirst($type) }}
			    		@if(!$loop->last && $loop->count != 1) , @endif
			    	@endforeach
			    </p>
			  </div>
			</div>
        </div>
    </div>
</div>
@endsection
