<?php require_once 'Views/includes/header.php' ?>

<link rel="stylesheet" href="public/css/post.css" />
<link rel="stylesheet" href="public/css/question.css"/>

<div class="top">
    <div class="question_header">
        <h1>Hỏi Đáp</h1>
        <p>Chia sẻ kiến thức , cùng nhau phát triển</p>
    </div>
    <div class="header_button">
        <button class="btn--success-1"><a href="Questions/questionWrite">Đặt câu hỏi</a></button>
    </div>
</div>
<div class="question__content">
    <div class="left">
        <div class="question_list_menu">
            <ul>
                <li><a href="/Questions">Tất cả</a></li>
            </ul>
            <!-- <div>
           <p>Sắp xếp</p>
           <select name="" id="select_page">
             <?php
               $mode = $this->dl['select'];
               //if($mode =='views'){
                 echo'
                 <option value="news">Mới nhất</option>
                 <option value="views" selected>Lượt xem</option>
                 ';
               //}else {
                 echo '
                 <option value="news" selected>Mới nhất</option>
                 <option value="views">Lượt xem</option>
                 ';
               //}
             ?>
           </select>
         </div> -->
           
        </div>
        <div class="question_list_content" id="listQuestion">
            <?php
            $arr = $this->dl['noiDung'];
            $page = $this->dl['page'];
            $soTrang = $this->dl['soTrang'];
            if($page > $soTrang){
              echo '
              <div class="content">
                Không có bài viết nào
              </div>';
            }else{
                for($i = 0; $i < count($arr); $i++){
                    $idQuestion = $arr[$i]['id'];
                    $idUser = $arr[$i]['id_user'];
                    $img = $arr[$i]['user_image'] == null?'public\img\user.png':$arr[$i]['user_image'] ;
                    $name = $arr[$i]['displayName'] == null? $arr[$i]['nameTK']:$arr[$i]['displayName'];
                    $title = $arr[$i]['title'];
                    $content = substr($arr[$i]['question_conntent'],0,200)."...";
                    $content = strip_tags($content);
                    $like = $arr[$i]['slLikes'];
                    $comment = $arr[$i]['slTraLoi'];
                    $view = $arr[$i]['views'];
                    $time = $arr[$i]['date']; 
                    $linkDetalis = getLinkPostDetails($title.' '.$idQuestion);  
                    
                echo '
                    <div class="content--question">
                    <div class="media">
                        <a href="profile/user/'.$idUser.'" class="media-left">
                        <img src="'.$img.'" alt="ảnh">
                        </a>
                        <div class="media-body">
                            <a href="profile/user/'.$idUser.'" class="user">
                            '.$name.'
                            </a>
                            <a href="Questions/details/'.$linkDetalis.'" class="question">
                            <div class="ques">
                                <a href="Questions/details/'.$linkDetalis.'">
                                    <div class="title--ques">'.$title.' </div>
                                    <p class="content">'.$content.'</p>
                                </a>
                            </div>
                            <div class="question__status">
                                <div class="status-list">
                                    <i class="fas fa-thumbs-up"></i>
                                    <p>'.$like.'</p>
                                </div>
                                <div class="status-list">
                                    <i class="far fa-comments"></i>
                                    <p>'.$comment.'</p>
                                </div>
                                <div class="status-list">
                                    <i class="far fa-eye"></i>
                                    <p>'.$view.'</p>
                                </div>
                                <div class="status-list-img">
                                    <img src="'.$img.'" alt="ảnh">
                                    <p>'.$time.'</p>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                ';
            } 
            }?>
        
        </div>
        <div class="post__list-page">
        <?php
        if($page <= $soTrang){
          if($page > 1){
            echo '
          <div class="prev-page">
            <a href="Questions/page/'.$mode.'/'.($page-1).'">Prev</a>
          </div>
          ';
          }else {
            echo '<div></div>';
          }
          echo '
          <div class="prev-page">
          ';
          for($i = 1; $i <= $soTrang; $i++){
            if($i == $page){
              echo '<a href="Questions/page/'.$mode.'/'.$page.'" class="pages-index_light">'.$page.'</a> ';
              continue;
            }
            echo '<a href="Questions/page/'.$mode.'/'.$i.'" class="pages-index">'.$i.'</a> ';
          }

          echo '</div>';

          if($page < $soTrang){
            echo '
          <div class="next-page">
            <a href="Questions/page/'.$mode.'/'.($page+1).'">Next</a>
          </div>
          ';
          }else {
            echo '<div></div>';
          }
        }
        ?>
      </div>

    </div>
    <div class="right">
        <?php require_once 'Views/includes/postSlider.php' ?>
    </div>  
</div>
<?php require_once 'Views/includes/footer.php' ?>