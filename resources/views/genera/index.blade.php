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
                <div class="card-header">{{ __('Genera') }} <a href="{{ route('genera.create') }}" class="btn btn-link btn-sm">{{ __('Add new') }}</a></div>

                <div class="card-body p-0">
                    <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">{{ __('Name') }}</th>
					      <th scope="col">{{ __('Actions') }}</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach(App\Genus::all() as $genus)
					    <tr>
					      <th scope="row">{{ $genus->name }}</th>
					      <td>
					      	<a href="{{ route('genera.edit', $genus) }}" class="btn btn-link btn-sm">{{ __('Edit') }}</a>

					      	<a href="{{ route('genera.destroy', $genus) }}" class="btn btn-link btn-sm" onclick="event.preventDefault();
                                 document.getElementById('delete-genus-{{ $genus->id }}').submit();">{{ __('Delete') }}</a>

					      	<form id="delete-genus-{{ $genus->id }}" action="{{ route('genera.destroy', $genus) }}" method="POST" style="display: none;">
			                    @csrf
			                    @method('DELETE')
			                </form>
					      </td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
