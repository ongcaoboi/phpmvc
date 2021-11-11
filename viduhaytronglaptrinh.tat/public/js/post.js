
$(document).ready(function(){
  
  $('#select_page').on("change", function (){
    var a = $('#select_page').val();
    window.location.href = '/post/page/'+a;
  });

  $('#select_page_me').on("change", function (){
    var a = $('#select_page_me').val();
    window.location.href = '/post/me/'+a;
  });

  let arr = window.location.href.split('/');
  if(arr[4] == null){
    var a = document.getElementById('post_1');
    a.style.background = "white";
  }
  else{
    switch(arr[4]){
      case 'me' : 
      var a = document.getElementById('post_3');
      a.style.background = "white";
      break;
    } 
  } 

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