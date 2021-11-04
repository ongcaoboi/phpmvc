$(document).ready(function() {
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
    }
});