@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header">Add Product</div>
	<div class="card-body">
		<form action="{{ isset($product) ? route('products.update', $product->slug) : route('products.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			@if(isset($product))
				@method('PATCH')
			@endif
			<div class="row justify-content-between m-auto">
				<!-- product name -->
				<div class="form-group">
					<label for="name">Product Name</label>
					<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($product) ? $product->name : '' }}">

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<!-- product code -->
				<div class="form-group">
					<label for="code">Product Code</label>
					<input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ isset($product) ? $product->code : '' }}">

					@error('code')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<!-- product category -->
				<div class="form-group">
					<label for="category_id">Product Category</label>
					<select name="category_id" id="category_id" class="form-control @error('category') is-invalid @enderror">
						<option>Select Category.....</option>
						@foreach($categories as $cat)
							<option value="{{ $cat->id }}">{{ $cat->name }}</option>
						@endforeach
					</select>

					@error('category')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
			</div>
			<!-- product description -->
			<div class="form-group">
				<label for="description">Product Description</label>
				<textarea type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ isset($product) ? $product->description : '' }}</textarea>

				@error('description')
					<span class="invalid-feedback" role="alert">
						<strong>{{$message}}</strong>
					</span>
				@enderror
			</div>
			<!-- product images -->
			@if(isset($product))
				<div class="form-group">
					@foreach($product->photos as $image)
						<img src="/storage/{{ $image->images }}" style="width: 200px;">
					@endforeach
				</div>
			@endif
			<div class="form-group">
				<label for="images">Product Image</label>
				<input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" multiple>

				@error('images')
					<span class="invalid-feedback" role="alert">
						<strong>{{$message}}</strong>
					</span>
				@enderror
			</div>
			<!-- product price -->
			<div class="row justify-content-between m-auto">
				<div class="form-group">
					<label for="price">Product Price</label>
					<input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ isset($product) ? $product->price : '' }}">

					@error('price')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<!-- product qty -->
				<div class="form-group">
					<label for="quantity">Product Quantity</label>
					<input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ isset($product) ? $product->quantity : '' }}">

					@error('quantity')
						<span class="invalid-feedback" role="alert">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
			</div>
			<!-- product add btn -->
			<div class="form-group">
				<button class="btn btn-primary">Add Product</button>
			</div>
		</form>
	</div>
</div>

@endsection