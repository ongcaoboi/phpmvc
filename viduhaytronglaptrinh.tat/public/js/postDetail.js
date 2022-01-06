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
  var button = $('#btn_comment');
  $("#comment_text").on('input',function(e){
    if(e.target.value === ''){
      button.removeClass('btn--success-1');
      button.addClass('btn-disabled');
    } else {
      button.addClass('btn--success-1');
      button.removeClass('btn-disabled');
    }
  });
  button.on('click', function (){
    if($('#comment_text').val()=="") return;
    let content = $('#comment_text').val();
    $.ajax({
      url: 'post/Comment',
      type: 'POST',
      data: {'id': id_post, 'content': content },
      success: function(response){
        let rs = JSON.parse(response);
        if(rs.position == "0"){
          alert(rs.messenger);
        }else if(rs.position == "1"){
          location.reload();
        }
      }
    });
  });
  $('#btn_report').on('click', function(){
    var ct_report = prompt("Mời nhập nội dung báo cáo!", "");
    if(ct_report == null){
      return;
    }
    if(ct_report == ""){
      alert("Vui lòng nhập nội dung");
      return;
    }
    $.ajax({
      url: "post/report",
      type: "post",
      data: {
        id: id_post,
        content: ct_report
      },
      success: function(response){
        let rs = JSON.parse(response);
        alert(rs.messenger);
      }
    });
  });
  $('#btn_delete_post').on('click', function(){
    if(confirm("Bạn có chắc chắn xoá bài viết này không")){
      $.ajax({
        url: "admin/deletePost",
        type: "post",
        data: {
          id: id_post
        },
        success: function(response){
          let rs = JSON.parse(response);
          alert(rs.messenger);
          if(rs.position == '1'){
            window.location.href = "./post";
          }
        }
      });
    }
  });
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
function deleteComment(id){
  if(confirm("Bạn có chắc chắn xoá bình luận này không")){
    var id_comment = id;
    $.ajax({
      url: "admin/deleteComment",
      type: "post",
      data: {
        id: id_comment
      },
      success: function(response){
        let rs = JSON.parse(response);
        alert(rs.messenger);
        if(rs.position == '1'){
          location.reload();
        }
      }
    });
  }
}