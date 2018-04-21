$(document).ready(function () {

    $('#sair').click(function(){

      $.ajax({
            url: "/sair",
            success: function(data){
              
              window.location.href = "/home";
            },
            error: function (result) {
                alert("Ocorreu um erro!");

            }
        });

      });

});
