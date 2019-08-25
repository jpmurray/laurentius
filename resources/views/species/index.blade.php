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
                <div class="card-header">Species <a href="{{ route('species.create') }}" class="btn btn-link btn-sm">Add new</a></div>

                <div class="card-body p-0">
                    <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Actions</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach(App\Species::all() as $species)
					    <tr>
					      <th scope="row">{{ $species->name }}</th>
					      <td>
							<a href="{{ route('species.edit', $species) }}" class="btn btn-link btn-sm">Edit</a>

					      	<a href="{{ route('species.destroy', $species) }}" class="btn btn-link btn-sm" onclick="event.preventDefault();
                                 document.getElementById('delete-species-{{ $species->id }}').submit();">Delete</a>

					      	<form id="delete-species-{{ $species->id }}" action="{{ route('species.destroy', $species) }}" method="POST" style="display: none;">
			                    @csrf
			                    @method('DELETE')
			                </form>
			                <a href="{{ route('species.show', $species) }}" class="btn btn-link btn-sm">Show</a>
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
