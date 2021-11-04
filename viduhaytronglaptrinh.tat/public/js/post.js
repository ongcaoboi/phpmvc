
$(document).ready(function(){

  console.log("ok");



});

function request(){
  
  $.ajax({
    url: 'Questions/getAllQuestions',
    type: 'POST',
    data: null,
    success: function(response){

      $('#listPost').html(response);
      console.log('Thành công');
    }

  });
}