$(document).ready(function() {
    window.onscroll = function() {scrollFunction()};
    // khai báo hàm scrollFunction
    function scrollFunction() {
        // Kiểm tra vị trí hiện tại của con trỏ so với nội dung trang
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            //nếu lớn hơn 20px thì hiện button
            document.getElementById("btn_go_to_top").style.display = "block";
        } else {
             //nếu nhỏ hơn 20px thì ẩn button
            document.getElementById("btn_go_to_top").style.display = "none";
        }
    }
    //gán sự kiện click cho button
    document.getElementById('btn_go_to_top').addEventListener("click", function(){
        //Nếu button được click thì nhảy về đầu trang
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
    var btnMenu = document.querySelector("#btn-menu");
    var containerSidebar = document.querySelector(".container__sidebar");
    var containerMain = document.querySelector(".container__main");
    btnMenu.addEventListener("click", function() {
        containerSidebar.classList.toggle("acctive-nav");
        containerMain.classList.toggle("acctive-main");
    });
    let arr = window.location.href.split('/');
    let a =arr[3].toLowerCase();
    if(a === ''){
        var con = document.querySelector("#nav-link1");
        con.classList.toggle("active-menu");
        var con = document.querySelector("#nav-link_1");
        con.classList.toggle("active-menu");
        return;
    }
    switch (a) {
        case "home":
            var con = document.querySelector("#nav-link_1");
            con.classList.toggle("active-menu");
            var con = document.querySelector("#nav-link1");
            con.classList.toggle("active-menu");
            break;
        case "post":
            var con = document.querySelector("#nav-link2");
            con.classList.toggle("active-menu");
            var con = document.querySelector("#nav-link_2");
            con.classList.toggle("active-menu");
            break;
        case "questions":var con = document.querySelector("#nav-link3");
            con.classList.toggle("active-menu");
            var con = document.querySelector("#nav-link_3");
            con.classList.toggle("active-menu");
            break;
        case "about":
            var con = document.querySelector("#nav-link4");
            con.classList.toggle("active-menu");
            var con = document.querySelector("#nav-link_4");
            con.classList.toggle("active-menu");
            break;
        case "feedback":
            var con = document.querySelector("#nav-link5");
            con.classList.toggle("active-menu");
            var con = document.querySelector("#nav-link_5");
            con.classList.toggle("active-menu");
            break;
        case "admin":
            var con = document.querySelector("#nav-link6");
            con.classList.toggle("active-menu");
            var con = document.querySelector("#nav-link_6");
            con.classList.toggle("active-menu");
            break;
    }
    $('#write-post').on('click', function () {
        return confirm('Vui lòng đăng nhập để sử dụng chức năng này!');
    });
});