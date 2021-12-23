<?php require_once 'Views/includes/header.php' ?>
<link rel="stylesheet" href="public/css/post.css" />
<link rel="stylesheet" href="public/css/detailQuestion.css"/>

<?php
$arr = $this->dl['questionDetails'];
$idQuestion = $arr['id_question'];
$title = $arr['question_title'];
$content = $arr['question_conntent'];
$like = $arr['slLike'];
$comment = $arr['slComment'];
$view = $arr['question_views'];
$time = $arr['question_date_created'];

$arrUser = $this->dl['infoUserQuestion'];
$idUserQuestion = $arrUser['id'];
$nameUserQuestion = $arrUser['dp_name'] == null ? $arrUser['name'] : $arrUser['dp_name'];
$imgUserQuestion = $arrUser['img'] == null ? 'public\img\user.png' : $arrUser['img'];
$postUserPost = $arrUser['post'];
$questionUserPost = $arrUser['question'];
$commentUserPost = $arrUser['comment'];

//$arrQuestion = $this->dl['questionLikeTitle'];



?>
<div class="question">
    <div class="top">
        <div class="question_header">
            <h1>Hỏi Đáp</h1>
            <p>Chia sẻ kiến thức , cùng nhau phát triển</p>
        </div>
        <div class="header_button">
        <button class="btn--success-1"><a href="">Đặt câu hỏi</a></button>
        </div>
    </div>

    <div class="question__content">
        <div class="left">
            <?php
            echo '
            <div class="title--question">
                <h2>' .$title. '</h2>
                <div class="status">
                    <div class="status-list">
                        <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
                        <p>'.$time.'</p>
                    </div>
                    <div class="status-list">
                        <i class="fas fa-thumbs-up"></i>
                        <p>'.$like.'</p>
                        <p>lượt thích</p>
                    </div>
                    <div class="status-list">
                        <i class="far fa-comments"></i>
                        <p>'.$comment.'</p>
                        <p>bình luận</p>
                    </div>
                    <div class="status-list">
                        <i class="far fa-eye"></i>
                        <p>'.$view.'</p>
                        <p>lượt xem</p>
                    </div>
                </div>
            </div>';
            ?>
            <div class="detail--content">
                <?php
                echo $content;
                echo '
                <div class="cmt--report">
                    <div></div>
                ';
                if(isset($_SESSION['user'])){
                    echo '
                      <button>
                        <i class="far fa-flag"></i>
                        Báo cáo
                      </button>
                      ';
                  }
                  ?>
                </div>
            </div>
            <div class="add--cmt">

                <h3>Bình luận</h3>

                <?php
                if(isset($_SESSION['user'])){
                    echo '
                <div class="your--cmt">
                    <div class="your--cmt-left">
                        <a href="" class="media-left">
                            <img src="'.$_SESSION['user']['img'].'" alt="ảnh">
                        </a>
                    </div>
                    <div class="cmt--write">
                        <textarea name="" id="comment_text_" cols="30" rows="10"></textarea>
                        <button id="btn_cmt_" class="btn btn--success-1">
                            <i class="fas fa-reply"></i>  
                            Nhận xét
                        </button>
                    </div>
                </div>';
                } else{
                    echo '
                    <div class="your__comment--not">
                    <p>Vui lòng <a href="Login">đăng nhập</a> để bình luận.</p>
                    
                  </div>
                    ';
                }
                ?>

                <?php
                $arrCmt = $this->dl['CommentInQuestion'];
                for($i = 0; $i < count($arrCmt); $i++){
                    $idQuestion = $arrCmt[$i]['id_question'];
                    $contentCmt = $arrCmt[$i]['content'];
                    $date = $arrCmt[$i]['date'];
                    $name = $arrCmt[$i]['name'];
                    $imgg = $arrCmt[$i]['img'];
                    $idUser = $arrCmt[$i]['id_user'];
                echo '    
                <div class="post__comment" id="post_comment">
                
                    <div class="post__comment--item">
                        <a href="profile/user/'.$idUser.'" class="post__comment-left">
                            <img src="'.$imgg.'" alt="ảnh">
                            
                        </a>
                        <div class="post__comment-body">
                            <div class="comment-body__user">
                            <a href="" class="user">'.$name.'</a>
                            <p>'.$date.'</p>
                            </div>
                            <div class="comment-body__content">
                            <p class="content">'.$contentCmt.'</p>
                            </div>
                            
                            <div class="comment__report">
                            <div></div>
                            <div>
                                <button>
                                <i class="far fa-flag"></i>
                                Báo cáo
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                ';
                }
                ?>
                
            </div>
            
        </div>

        <div class="right">
            <?php 
            echo '
            <div class="infor--user">
                <a href="profile/user/'.$idUserQuestion.'">
                    <img src="'.$imgUserQuestion.'" alt="ảnh">
                </a>
                <div class="detail">
                    <a href="profile/user/'.$idUserQuestion.'">'.$nameUserQuestion.'</a>
                    <div class="detail--list">
                        <div class="post">
                            <p>Bài viết</p>
                            <p>'.$postUserPost.'</p>
                        </div>
                        <div class="question">
                            <p>Câu hỏi</p>
                            <p>'.$questionUserPost.'</p>
                        </div>
                        <div class="cmt">
                            <p>Bình luận</p>
                            <p>'.$commentUserPost.'</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="slider__questions">
            </div>
            
        </div>  ';
        ?>
    </div>
</div>
<script>

$(document).ready(function(){

    $('#btn_cmt_').on('click', function(){
        var content = $('#comment_text_').val();
        if(content == ""){
            alert('Vui lòng nhập nội dung!');
            return;
        }
        
        var a = window.location.href.split("/");
        var a = a[a.length - 1].split("-");
        var id_question = a[a.length -1];

        if(id_question == ""){
            alert("Lỗi rồi");
            return;
        }

        $.ajax({
            url: 'Questions/Comment',
            type: 'POST',
            data: {
                'id': id_question,
                'content': content 
            },
            success: function(response){

                let rs = JSON.parse(response);
                if(rs.position == "0"){
                alert(rs.messenger);
                }else if(rs.position == "1"){
                location.reload();
                }
            }
        });
    });
    

});

</script>

<?php require_once 'Views/includes/footer.php' ?>