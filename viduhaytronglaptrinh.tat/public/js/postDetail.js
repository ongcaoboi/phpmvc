$(document).ready(function(){
  var num = 0;
  var a = window.location.href.split("/");
  var a = a[a.length - 1].split("-");
  var id_post = a[a.length -1];
  getPageComment();
  $('.next-page').on("click", function(){
    num += 1;
    getPageComment();
  });
  // var b = document.getElementById("content-post");
  // var c = document.getElementById("content-post1");
  // var a =$("#content-post");
  // console.log(a);
  // console.log('-----------');
  // console.log(b);
  // $('#btn_comment').on('click', function(){
  //   c.innerHTML = b;
  // });
    
  function getPageComment(){
    $.ajax({
      url: 'post/getComment',
      type: 'POST',
      data: {'id': id_post, 'page': num},
      success: function(response){
        var arr = JSON.parse(response);
        if(arr['type'] == "2"){
          $('.next-page').hide();
          $('.next-page2').css('display','block');
          return;
        }
        var str = "";
        arr['content'].forEach(element => {
          str += element;
        });
        var comments = $('#post_comment').html();
        comments += str;
        $('#post_comment').html(comments);
        if(arr['type'] == "0"){
          $('.next-page').hide();
          $('.next-page1').css('display','block');
          return;
        }
      }
    });
  }
});