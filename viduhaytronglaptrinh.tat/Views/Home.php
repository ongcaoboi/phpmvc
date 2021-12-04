<?php require_once 'Views/includes/header.php' ?>
<link rel="stylesheet" href="public/css/post.css" />
<link rel="stylesheet" href="public/css/home.css">


<div class="slideshow-container">

    <div class="mySlides fade">
        <img src="public\img\px-action-athlete-athletes-848618-image.jpg">
        <a href="Topic" class="text">Các chủ đề hay và nổi bật</a>
    </div>

    <div class="mySlides fade">
        <img src="public\img\px-beach-daylight-fun-1430675-image.jpg">
        <a href="Post" class="text">Những bài viết chất lượng cao</a>
    </div>

    <div class="mySlides fade">
        <img src="public\img\px-fun-man-person-2361598-image.jpg">
        <a href="Questions" class="text">Danh sách câu hỏi thảo luận</a>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div class="slide_dot">
    <div class="dot" onclick="currentSlide(1)"></div>
    <div class="dot" onclick="currentSlide(2)"></div>
    <div class="dot" onclick="currentSlide(3)"></div>
</div>

<?php require_once 'Views/includes/postSlider.php' ?>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>

<?php require_once 'Views/includes/footer.php' ?>