$(document).ready(function() {

	$( '.addtocart').each( function(){

		var btn = this ;

		jQuery(btn).click(function(e){
			var item_id = btn.id;
			addtocart(item_id);
		}); 
	}); 

	function addtocart(item_id){
		var price = $("#price_"+item_id).html();
		jQuery.post(base_url+"order/addtocart" ,{'id': item_id,'price':price}, function(data){
			if(data.status == 200 ){
				$('.order_nums').html(data.qty);
			}
		},"json");  
	}


	$("#checkout").on('submit',(function(e) {    
  e.preventDefault();
  $('#save_data').html('Sending');

  $.ajax({
    url: base_url+"order/checkout",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    dataType: "json",
    success: function(data)
    {
      if(data.status == 200){
       		window.location.href = base_url+"order/show";
      }
    },
    error: function() 
    {
    }           
  });
}));

});


