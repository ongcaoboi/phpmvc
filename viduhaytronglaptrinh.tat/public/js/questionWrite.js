$(document).ready(function(){
    CKEDITOR.replace('editor1');
    $('#cancer').on("click", function (){
      window.location.href = '/Questions'
    });
    
    $('#submit').on('click', function (){
      var title = document.getElementById('question_title').value;
      if(title == ''){
        alert('Đừng để trống tiêu đề chứ')
        return false;
      }
      var data = CKEDITOR.instances.editor1.getData();
      if(data == ''){
        alert('Đừng để trống nội dung chứ');
        return false;
      }
      var form_data = new FormData();
      form_data.append('title', title);
      form_data.append('data', data);
      if(!confirm('Bạn xác nhận muốn tạo câu hỏi')){
        return false;
      }
      $.ajax({
        url: 'Questions/write',
        type: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function (response) {
          var rs = JSON.parse(response);
          alert(rs.messenger);
          if(rs.position == 1){
              window.location.href = "/Questions";
          }
        }
      });
  
      return false;
    });
  });