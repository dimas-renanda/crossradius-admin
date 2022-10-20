var app = {
    show: function(){
     $.ajax({
      url: "data.php",
      method: "GET",
      success: function(response){
       $("#live_data").html(response)
      }
     })
    }
   }