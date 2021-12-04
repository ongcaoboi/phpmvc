console.log("đã nhận");


function doimatkhau(){
    
    console.log("đã click");
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
    console.log("đã click");
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
    
    console.log("đã click");
    var a = document.querySelector("#container_chgImage");
    a.classList.toggle("container_show");
}
function chgImage1(){
    
        // còn thiếu

}


function quit2(){
    console.log("đã click");
    var a = document.querySelector("#container_pass");
    a.classList.toggle("container_show");
}
function quit1(){
    console.log("đã click");
    var a = document.querySelector("#container_chgImage");
    a.classList.toggle("container_show");
}
function quit(){
    console.log("đã click");
    var a = document.querySelector("#container_chgDisplayName");
    a.classList.toggle("container_show");
}