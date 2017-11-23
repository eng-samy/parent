$(document).ready(function() {
  load_products();
});

$("#new_product").on('submit',(function(e) {    
  e.preventDefault();
  $('#save_data').html('Saving');

  $.ajax({
    url: base_url+"product/insert_data",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    dataType: "json",
    success: function(data)
    {
      if(data.status == 200){
            $('#productModal').modal('hide');
            $('.form-control').val('');
            $('#save_data').html('Save');
            load_products();
      }
    },
    error: function() 
    {
    }           
  });
}));

function load_products(){
  $('#load_data tbody').html("<img src='"+base_url+"assets/img/giphy.gif' class='load_data'>");
  $.ajax({
    url: base_url+"product/load_data",
    type: "GET",
    cache: false,
    dataType: "json",
    success: function(data)
    {
      if(data.status == 200){
            $('#load_data tbody').html(data.content);
      }
    },
    error: function() 
    {
    }           
  }); 
}