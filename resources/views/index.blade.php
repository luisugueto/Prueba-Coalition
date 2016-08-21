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
			<hr>
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
					

</body>
<script src="js/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/ajax.js"></script>
</html>