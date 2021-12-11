$(document).ready(function(){
  CKEDITOR.replace('editor1');
  $('#cancer').on("click", function (){
    window.location.href = '/Post'
  });
  
  $('#submit').on('click', function (){
    var title = document.getElementById('post_title').value;
    if(title == ''){
      alert('Đừng để trống tiêu đề chứ')
      return false;
    }
    var data = CKEDITOR.instances.editor1.getData();
    if(data == ''){
      alert('Đừng để trống nội dung chứ');
      return false;
    }
    var file = $('#file').prop('files')[0];
    var topic = document.getElementById('topic');
    topic = topic.options[topic.selectedIndex].value;
    var form_data = new FormData();
    form_data.append('title', title);
    form_data.append('data', data);
    form_data.append('file', file);
    form_data.append('topic', topic);
    if(!confirm('Bạn xác nhận muốn tạo bài viết')){
      return false;
    }
    $.ajax({
      url: 'post/postWrite',
      type: 'post',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      success: function (response) {
        var rs = JSON.parse(response);
        alert(rs.messenger);
        if(rs.position == 1){
            window.location.href = "./post";
        }
      }
    });

    return false;
  });
});