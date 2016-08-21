$(document).ready(function () {
	$(".open-modal").click(function() {
		var product_id = $(this).val();

		$.get('/product/' + product_id, function (data) {
            $('#modal-name').val(data.name);
            $('#modal-stock').val(data.stock);
            $('#modal-price').val(data.price);
            $('#product_id').val(data.id);
        }) 
	});

	$('.delete-product').click(function(e){

		e.preventDefault();

	    var row = $(this).parents('tr');
	    var id = row.data('id');
	    var form = $('#form-delete');
	    var url = form.attr('action').replace(':USER_ID', id);
	    var method = $('#_method').val();
	    var token = $('#_token').val();
	    var data = '&_method='+method+'&'+'_token='+token;

	    $.ajax({
	        url: url,
	        data: data,
	        success: function (result) {
	            row.fadeOut();
	        },
	        error: function (data) {
	            console.log('Error:', data);
	        }
	    }); 
	});

	$(".btn-save").click(function (e) {
		e.preventDefault(); 
		var route = "http://localhost:8000/product/edit/";
		var token = $("#_token").val();

		var formData = {
	            name : $('#modal-name').val(),
	            stock : $('#modal-stock').val(),
	            price : $('#modal-price').val(),
	            id : $('#product_id').val()
	        }

		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'PUT',
			dataType: 'json',
			data: {genre: formData},
			success: function (data) {
					var total = parseInt(data.price)*parseInt(data.stock);
	                var product = '<tr id="product'+ data.id +'"><td>'+ data.name +'</td><td>'+ data.stock +'</td><td>'+ data.price +'</td><td>'+ data.submitted +'</td><td>'+ total +'</td><td><button class="btn btn-warning open-modal" data-toggle="modal" data-target="#modal" value="'+data.id+'">Edit</button><button class="btn btn-danger delete-product" value="'+data.id+'">Delete</button></td></tr>';

	                $("#product" + data.id).replaceWith(product);
	                $("#btn-cancel").click();
	                $('#modal').trigger("reset");
	        },
	        error: function (data) {
	            console.log('Error:', data);
	        }
		});  
	});
});