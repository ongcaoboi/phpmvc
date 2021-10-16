</div>
<footer class="footer">

    <div class="footer__container">
        <div class="noi-dung about">
            <h2>Về Chúng Tôi</h2>
            <p>Đây là trang web nói dóc</p>
            <ul class="social-icon">
                <li><a href=""><i class="fab fa-facebook"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                <li><a href=""><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
        <div class="noi-dung links">
            <h2>Đường Dẫn</h2>
            <ul>
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Về Chúng Tôi</a></li>
                <li><a href="#">Thông Tin Liên Lạc</a></li>
                <li><a href="#">Dịch Vụ</a></li>
                <li><a href="#">Điều Kiện Chính Sách</a></li>
            </ul>
        </div>
        <div class="noi-dung contact">
            <h2>Thông Tin Liên Hệ</h2>
            <ul class="info">
                <li>
                    <span><i class="fa fa-map-marker"></i></span>
                    <span>170 An Dương Vương<br />
                        Nguyễn Văn Cừ, Tp.Quy Nhơn<br />
                        Bình Định, Việt Nam</span>
                </li>
                <li>
                    <span><i class="fa fa-phone"></i></span>
                    <p><a href="#">+84 123 456 789</a>
                        <br />
                        <a href="#">+84 987 654 321</a>
                    </p>
                </li>
                <li>
                    <span><i class="fa fa-envelope"></i></span>
                    <p><a href="#">diachiemail@gmail.com</a></p>
                </li>
                <li>
                    <form class="form">
                        <input type="email" class="form__field" placeholder="Đăng kí ngay!" />
                        <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</footer>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
        var btnMenu = document.querySelector("#btn-menu");
        var containerSidebar = document.querySelector(".container__sidebar");
        var containerMain = document.querySelector(".container__main");
        btnMenu.addEventListener("click", function() {
            console.log("abc");
            containerSidebar.classList.toggle("acctive-nav");
            containerMain.classList.toggle("acctive-main");
        });
    });
</script>
</body>

</html>