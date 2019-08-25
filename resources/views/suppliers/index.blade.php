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
                <div class="card-header">{{ __('Suppliers') }} <a href="{{ route('suppliers.create') }}" class="btn btn-link btn-sm">{{ __('Add new') }}</a></div>

                <div class="card-body p-0">
                    <table class="table">
					  <thead>
					    <tr>
					      <th scope="col">{{ __('Name') }}</th>
					      <th scope="col">{{ __('Actions') }}</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach(App\Supplier::all() as $supplier)
					    <tr>
					      <th scope="row">{{ $supplier->name }}</th>
					      <td>
					      	<a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-link btn-sm">{{ __('Edit') }}</a>

					      	<a href="{{ route('suppliers.destroy', $supplier) }}" class="btn btn-link btn-sm" onclick="event.preventDefault();
                                 document.getElementById('delete-supplier-{{ $supplier->id }}').submit();">{{ __('Delete') }}</a>

					      	<form id="delete-supplier-{{ $supplier->id }}" action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display: none;">
			                    @csrf
			                    @method('DELETE')
			                </form>

			                <a href="{{ $supplier->url }}" target="_blank" class="btn btn-link btn-sm">{{ __('Visit') }}</a>
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
