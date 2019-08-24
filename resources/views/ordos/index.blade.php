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
                <div class="card-header">Ordos <a href="{{ route('ordos.create') }}" class="btn btn-link btn-sm">Add new</a></div>

                <div class="card-body p-0">
                    <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Actions</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach(App\Ordo::all() as $ordo)
					    <tr>
					      <th scope="row">{{ $ordo->name }}</th>
					      <td>
					      	<a href="{{ route('ordos.edit', $ordo) }}" class="btn btn-link btn-sm">Edit</a>

					      	<a href="{{ route('ordos.destroy', $ordo) }}" class="btn btn-link btn-sm" onclick="event.preventDefault();
                                 document.getElementById('delete-ordo-{{ $ordo->id }}').submit();">Delete</a>

					      	<form id="delete-ordo-{{ $ordo->id }}" action="{{ route('ordos.destroy', $ordo) }}" method="POST" style="display: none;">
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
