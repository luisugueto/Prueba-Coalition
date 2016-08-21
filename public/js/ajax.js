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

	
});