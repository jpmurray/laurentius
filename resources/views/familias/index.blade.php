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
                <div class="card-header">{{ __('Familias') }} <a href="{{ route('familias.create') }}" class="btn btn-link btn-sm">{{ __('Add new') }}</a></div>

                <div class="card-body p-0">
                    <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">{{ __('Name') }}</th>
					      <th scope="col">{{ __('Actions') }}</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach(App\Familia::all() as $familia)
					    <tr>
					      <th scope="row">{{ $familia->name }}</th>
					      <td>
					      	<a href="{{ route('familias.edit', $familia) }}" class="btn btn-link btn-sm">{{ __('Edit') }}</a>

					      	<a href="{{ route('familias.destroy', $familia) }}" class="btn btn-link btn-sm" onclick="event.preventDefault();
                                 document.getElementById('delete-familia-{{ $familia->id }}').submit();">{{ __('Delete') }}</a>

					      	<form id="delete-familia-{{ $familia->id }}" action="{{ route('familias.destroy', $familia) }}" method="POST" style="display: none;">
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
