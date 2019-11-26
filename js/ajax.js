$(document).ready(function(){
  $("#fupForm").on('submit', function(event){
       event.preventDefault(); //prevent default action
       var form_data = new FormData(this); //Creates new FormData object
       $.ajax({
           url: "main.php",
           type: "POST",
           data: form_data,
           contentType: false,
           cache: false,
           processData: false,
           success: function(response){ //console.log(response);
               $('#reco').html(response);
           }
       });
   });
});
// File type validation
