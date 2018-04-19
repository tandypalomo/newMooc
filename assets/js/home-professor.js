
    $(document).ready(function () {

      $('#sair').click(function(){
        
        $.post({
          url: "/sair",
          success: function(data){
            alert("Boa!");
            window.location.href = "/home";
          },
          error: function (result) {
            alert("Ocorreu um erro!");
          }
        });
      });



});
