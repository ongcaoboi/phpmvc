function doimatkhau(){
    
    var a = document.querySelector("#container_pass");
    a.classList.toggle("container_show");
}
// mã hoá md5
function doimatkhau1(){
    var mkc = $("#mk_c").val();
    var mkm = $("#mk_m").val();
    var mkmnl = $("#mk_m_nl").val();
    if(mkc == ''| mkm == '' | mkmnl == ''){
        alert("vui long nhập đày đủ thông tin");
        return;
    }
    if(mkm != mkmnl){
        alert("nhập lại mật khẩu không đúng");
        return; 
    }
    $.ajax({
        url: './Profile/doimatkhau',
                type: 'post',
                data: {
                    'mkc': mkc,
                    'mkm': mkm,
                },
                success: function(response){
                    var rs = JSON.parse(response);
                    alert(rs.messenger);
                    console.log(rs);
                }
    });
}


function doitenhienthi(){
    var a = document.querySelector("#container_chgDisplayName");
    a.classList.toggle("container_show");
}
function chgDisplayName1(){
    
    var newDisplayname = $("#new_displayName").val();
    var mk = $("#mk").val();
    if(newDisplayname == ''){
        alert("vui lòng nhập tên muốn thay đổi");
        return;
        }
    if(mk == ''){
            alert("vui lòng nhập mật khẩu");
            return;
        }
    $.ajax({
        url: './Profile/doitenhienthi',
                type: 'post',
                data: {
                    'newDisplayname': newDisplayname,
                    'mk': mk,
                },
                success: function(response){
                    var rs = JSON.parse(response);
                    alert(rs.messenger);
                    if(rs.position == 1){
                        location.reload();
                    }
                    console.log(rs);
                }
    });

}


function doiimg(){
    
    var a = document.querySelector("#container_chgImage");
    a.classList.toggle("container_show");
}
function chgImage1(){
    
        // còn thiếu

}


function quit2(){
    var a = document.querySelector("#container_pass");
    a.classList.toggle("container_show");
}
function quit1(){
    var a = document.querySelector("#container_chgImage");
    a.classList.toggle("container_show");
}
function quit(){
    var a = document.querySelector("#container_chgDisplayName");
    a.classList.toggle("container_show");
}
$('#upload').on('click', function () {
    var file_data = $('#file').prop('files')[0];
    var type = file_data.type;
    var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];
    if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: 'profile/doiimg',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                var rs = JSON.parse(response);
                alert(rs.messenger);
                if(rs.position == 1){
                    window.location.href = "./home";
                    window.location.href = "./profile";
                }
                $('#file').val('');
            }
        });
    } else {
        alert('Chỉ được upload file (gif, jpg, png');
        $('#file').val('');
    }
    return false;
});
// function doiimg_(){    
//     var file_data = $('#file').prop('files')[0];
//     var type = file_data.type;
//     var match = ["image/gif", "image/png", "image/jpg",];
//     console.log("123");
    
//     if (type == match[0] || type == match[1] || type == match[2]) {
//         var form_data = new FormData();
//         form_data.append('file', file_data);
//         console.log("abc");
//         $.ajax({
//             url: './Profile/doiimg',
//             dataType: 'text',
//             cache: false,
//             contentType: false,
//             processData: false,
//             data: form_data,
//             type: 'post',
//             success: function (response) {
//                 var rs = JSON.parse(response);
//                 alert(rs.messenger);
//                 console.log(rs);
//             }
//         });
//     } else {
//         alert("chỉ được upload file ảnh");
//         $('#file').val('');
//     }
//     return false;
// }