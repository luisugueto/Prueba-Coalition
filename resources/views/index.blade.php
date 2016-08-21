<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" id="token" content="{{ csrf_token() }}">
	<title>Coalition Technologies</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Coalition Test Product Manager</h1>
			</div>
			<!-- 
			rows ordered by date
			 
			 Product name, Quantity in stock, Price per item, Datetime submitted, 
			  Total value number.
			The "Total value number" should be calculated as (Quantity in stock
			 * Price per item).
			The last row should how a sum total of all of the Total Value numbers.
			For extra credit, include functionality to edit each line. -->
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="{{ route('producto.store') }}" method="POST">
				{{ csrf_field() }}
				  <div class="form-group">
				    <label>Name</label>
				    <input type="text" id="product-name" name="name" class="form-control" placeholder="Product name">
				  </div>
				  <div class="form-group">
				    <label>Stock</label>
				    <input type="number" name="stock" class="form-control" placeholder="Stock">
				  </div>
				  <div class="form-group">
				    <label>Price</label>
				    <input type="number" name="price" class="form-control" placeholder="Price">
				  </div>
				  <button type="submit" class="btn-new btn btn-default">Submit</button>
				</form>
			</div>
		</div>
		<div class="row">
			<hr>
			<div class="col-md-12">
				<table class="table table-condensed table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Stock</th>
							<th>Price</th>
							<th>Submitted</th>
							<th>Total Value</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="products_list">
					@if (count($products) > 0)
						
						@foreach ($products as $product)
						<tr data-id="{{ $product->id }}" id="product{{ $product->id }}">
							<td>{{ $product->name }}</td>
							<td>{{ $product->stock }}</td>
							<td>{{ $product->price }}</td>
							<td>{{ $product->submitted }}</td>
							<td>{{ $product->price * $product->stock }}</td>
							<td>
								<button class="btn btn-warning open-modal" data-toggle="modal" data-target="#modal" value="{{$product->id}}">Edit</button>
								<!-- <a type="button" href="{{ route('deleteProduct', $product->id)}}" class="btn btn-danger delete-product" value="{{$product->id}}">Delete</a>-->
								<button class="btn btn-danger delete-product" value="{{$product->id}}">Delete</button> 
								<form action="{{ url('product/delete/:USER_ID') }}" method="DELETE" id="form-delete"></form>
									<input name="_method" type="hidden" value="DELETE" id="_method">
									<input name="_token" type="hidden" value="{{ csrf_token() }}" id="_token">
								</form>
							</td>
						</tr>
						@endforeach

					@else
					<tr>
						<td>No products loaded</td>
					</tr>
					@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div id="modal" class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Edit Product</h4>
	      </div>
		      <div class="modal-body">
		      	  <div class="form-group">
		            <label>Name</label>
		            <input type="text" id="modal-name" name="name" class="form-control" placeholder="Product name">
		          </div>

		          <div class="form-group">
		            <label>Stock</label>
		            <input type="number" id="modal-stock" name="stock" class="form-control" placeholder="Stock">
		          </div>
		          <div class="form-group">
		            <label>Price</label>
		            <input type="number" id="modal-price" name="price" class="form-control" placeholder="Price">
		          </div>
		          <input type="hidden" id="product_id" name="id">
		      </div>
		      <div class="modal-footer">
		      	{{ csrf_field() }}
		        <button type="button" id="btn-cancel" class="btn btn-default" data-dismiss="modal">Cancel</button>
		        <button class="btn btn-primary btn-save" data-toggle="modal">Save changes</button>
		      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

</body>
<script src="js/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/ajax.js"></script>
</html>