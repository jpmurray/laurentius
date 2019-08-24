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
                <div class="card-header">Classes <a href="{{ route('classes.create') }}" class="btn btn-link btn-sm">Add new</a></div>

                <div class="card-body p-0">
                    <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Name</th>
					      <th scope="col">Actions</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach(App\Classis::all() as $classis)
					    <tr>
					      <th scope="row">{{ $classis->name }}</th>
					      <td>
					      	<a href="{{ route('classes.edit', $classis) }}" class="btn btn-link btn-sm">Edit</a>

					      	<a href="{{ route('classes.destroy', $classis) }}" class="btn btn-link btn-sm" onclick="event.preventDefault();
                                 document.getElementById('delete-divisio-{{ $classis->id }}').submit();">Delete</a>

					      	<form id="delete-divisio-{{ $classis->id }}" action="{{ route('classes.destroy', $classis) }}" method="POST" style="display: none;">
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
