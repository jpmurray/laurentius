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
                <div class="card-header">{{ __('Regnums') }} <a href="{{ route('regnums.create') }}" class="btn btn-link btn-sm">{{ __('Add new') }}</a></div>

                <div class="card-body p-0">
                    <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">{{ __('Name') }}</th>
					      <th scope="col">{{ __('Actions') }}</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach(App\Regnum::all() as $regnum)
					    <tr>
					      <th scope="row">{{ $regnum->name }}</th>
					      <td>
					      	<a href="{{ route('regnums.edit', $regnum) }}" class="btn btn-link btn-sm">{{ __('Edit') }}</a>

					      	<a href="{{ route('regnums.destroy', $regnum) }}" class="btn btn-link btn-sm" onclick="event.preventDefault();
                                 document.getElementById('delete-regnum-{{ $regnum->id }}').submit();">{{ __('Delete') }}</a>

					      	<form id="delete-regnum-{{ $regnum->id }}" action="{{ route('regnums.destroy', $regnum) }}" method="POST" style="display: none;">
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
