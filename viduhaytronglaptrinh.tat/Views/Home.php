<?php require_once 'Views/includes/header.php' ?>

đây là home wiew <br>
<button id=btn-1>haha</button>

<script>
    $(document).ready(function(){
        var btn = document.getElementById('btn-1');
        btn.onclick = function(){
            alert('Đã click');
            window.location.href = "/Post/";
        };
    });
</script>


<?php require_once 'Views/includes/footer.php' ?>