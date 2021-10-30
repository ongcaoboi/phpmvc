$(document).ready(function() {
    var btnMenu = document.querySelector("#btn-menu");
    var containerSidebar = document.querySelector(".container__sidebar");
    var containerMain = document.querySelector(".container__main");
    btnMenu.addEventListener("click", function() {
        console.log("abc");
        containerSidebar.classList.toggle("acctive-nav");
        containerMain.classList.toggle("acctive-main");
    });
    var title = document.getElementById("title").innerText;
    title = nonAccentVietnamese(title);
    switch (title) {
        case "Trang chu":
            var con = document.querySelector("#nav-link1");
            con.classList.toggle("active-menu");
            break;
        case "Bai viet":
            var con = document.querySelector("#nav-link2");
            con.classList.toggle("active-menu");
            break;
        case "Cau hoi":var con = document.querySelector("#nav-link3");
            con.classList.toggle("active-menu");
            break;
        case "Thong tin":
            var con = document.querySelector("#nav-link4");
            con.classList.toggle("active-menu");
            break;
        case "Phan hoi":
            var con = document.querySelector("#nav-link5");
            con.classList.toggle("active-menu");
            break;
    }
});