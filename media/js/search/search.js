$(document).ready(function() {
	$('.search_form').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
            url: "search/index/" + $('.search_text').val(),
            type: "post",
            dataType:'json',
            success: function(data) {
            	$('#search_results_table tbody').empty();
            	var str = '';
            	for ( var i=0; i< data.length; i++) {
            		str += '<tr>';
					str += '<td>'+ (i+1) + '</td>';	
					str += '<td>'+ (data[i].title +  ' ' + data[i].guest_name) + '</td>';	
					str += '<td>'+ data[i].email + '</td>';	
					str += '<td>'+ data[i].phone + '</td>';	
					str += '<td>'+ data[i].guest_number + '</td>';
					str += '<td>'+ data[i].start + '</td>';	
					str += '<td>'+ data[i].end + '</td>';	
					str += '</tr>';
            	}
            	$('#search_results_table tbody').append(str);
            	$('#search_modal').modal('show');
            	
            }
        });
		
	});
	

});