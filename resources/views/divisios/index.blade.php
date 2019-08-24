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
                <div class="card-header">Divisios <a href="{{ route('divisios.create') }}" class="btn btn-link btn-sm">Add new</a></div>

                <div class="card-body p-0">
                    <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Actions</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach(App\Divisio::all() as $divisio)
					    <tr>
					      <th scope="row">{{ $divisio->name }}</th>
					      <td>
					      	<a href="{{ route('divisios.edit', $divisio) }}" class="btn btn-link btn-sm">Edit</a>

					      	<a href="{{ route('divisios.destroy', $divisio) }}" class="btn btn-link btn-sm" onclick="event.preventDefault();
                                 document.getElementById('delete-divisio-{{ $divisio->id }}').submit();">Delete</a>

					      	<form id="delete-divisio-{{ $divisio->id }}" action="{{ route('divisios.destroy', $divisio) }}" method="POST" style="display: none;">
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
