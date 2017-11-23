$(document).ready(function() {
  load_collections();
});

$("#new_collection").on('submit',(function(e) {    
  e.preventDefault();
  $('#save_data').html('Saving');

  $.ajax({
    url: base_url+"collection/insert_data",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    dataType: "json",
    success: function(data)
    {
      if(data.status == 200){
            $('#collectionModal').modal('hide');
            $('.form-control').val('');
            $('#save_data').html('Save');
            load_collections();
      }
    },
    error: function() 
    {
    }           
  });
}));

function load_collections(){
  $('#load_data tbody').html("<img src='"+base_url+"assets/img/giphy.gif' class='load_data'>");
  $.ajax({
    url: base_url+"collection/load_data",
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