<?php require_once 'Views/includes/header.php' ?>

<link rel="stylesheet" href="public/css/post.css" />
<link rel="stylesheet" href="public/css/question.css"/>

<div class="top">
    <div class="question_header">
        <h1>Hỏi Đáp</h1>
        <p>Chia sẻ kiến thức , cùng nhau phát triển</p>
    </div>
    <div class="header_button">
        <button class="question_button btn--success-1"><h3>Đặt câu hỏi</h3></button>
    </div>
</div>
<div class="question__content">
    <div class="left">
        <div class="question_list_menu">
            <ul>
                <li><a href="">Tất cả</a></li>
                <?php
                    if(isset($_SESSION['user'])){
                        echo '
                        <li><a href="">Bài viết của tôi</a></li>';
                      }
                ?>
            </ul>
            <div>
           <p>Sắp xếp</p>
           <select name="" id="select_page">
             <?php
               $mode = $this->dl['select'];
               if($mode =='views'){
                 echo'
                 <option value="news">Mới nhất</option>
                 <option value="views" selected>Lượt xem</option>
                 ';
               }else {
                 echo '
                 <option value="news" selected>Mới nhất</option>
                 <option value="views">Lượt xem</option>
                 ';
               }
             ?>
           </select>
         </div>
            <!--<div>
                <p>Sắp xếp</p>
                <select name="" id="">
                    <option value="1">Mới nhất</option>
                    <option value="2">Lượt xem</option>
                </select>
            </div>-->
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
                                    <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
                                    <p>'.$time.'</p>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                ';
            } 
            }?>
            

            <!-- <div class="content">
                <div class="media">
                    <a href="" class="media-left">
                        <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
                    </a>
                    <div class="media-body">
                        <a href="" class="user">
                            <h3>Tên tài khoản</h3>
                        </a>
                        <div class="ques">
                            <a href="">
                                <div class="title--ques">Tiêu đề câu hỏi </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure veniam fugit at officiis modi, quidem corrupti, quis quibusdam aliquid quo laborum autem eligendi beatae ea quam ratione,Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum odit atque corrupti praesentium consectetur adipisci quam incidunt veritatis perferendis soluta nisi, inventore molestias vel beatae impedit quia. Quos, dolor nemo.lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores magnam ratione accusantium sapiente. Beatae quae, ducimus sit quo assumenda soluta aspernatur amet vel vitae tenetur molestias sequi, nam quia ea. inlorventore eveniet.</p>
                            </a>
                        </div>
                        <div class="question__status">
                            <div class="status-list">
                                <i class="fas fa-thumbs-up"></i>
                                <p>9</p>
                            </div>
                            <div class="status-list">
                                <i class="far fa-comments"></i>
                                <p>9</p>
                            </div>
                            <div class="status-list">
                                <i class="far fa-eye"></i>
                                <p>9</p>
                            </div>
                            <div class="status-list-img">
                                <img src="public/img/e61df3c3768380ddd992.jpg" alt="ảnh">
                                <p>9 giờ trước</p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="content">
                <div class="media">
                    <a href="" class="media-left">
                        <img src="public/img/img_user_admin.png" alt="ảnh">
                    </a>
                    <div class="media-body">
                        <a href="" class="user">
                            <h3>Tên tài khoản</h3>
                        </a>
                        <div class="ques">
                            <a href="">
                                <div class="title--ques">Tiêu đề câu hỏi </div>
                                <p>Loriis modi, quidem corrupti, quis quibusdam aliquid quo laborum autem eligendi beatae ea quam ratione, inventore eveniet.</p>
                            </a>
                        </div>
                        <div class="question__status">
                            <div class="status-list">
                                <i class="fas fa-thumbs-up"></i>
                                <p>9</p>
                            </div>
                            <div class="status-list">
                                <i class="far fa-comments"></i>
                                <p>9</p>
                            </div>
                            <div class="status-list">
                                <i class="far fa-eye"></i>
                                <p>9</p>
                            </div>
                            <div class="status-list-img">
                                <img src="public/img/img_user_admin.png" alt="ảnh">
                                <p>9 giờ trước</p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> -->
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
        <!-- <div class="slider__questions">
            <div class="questions__header-">
                 <h2>Câu hỏi mới nhất </h2>
            </div>
            <div class="questions-list">
                <a href="" class="questions-list__items">
                    <h3>Đây là tên</h3>
                    <div class="status">
                        <div class="status-list">
                            <i class="fas fa-thumbs-up"></i>
                            <p>10</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-comments"></i>
                            <p>2</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-eye"></i>
                            <p>10.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="questions-list">
                <a href="" class="questions-list__items">
                    <h3>Đây là tên</h3>
                    <div class="status">
                        <div class="status-list">
                            <i class="fas fa-thumbs-up"></i>
                            <p>10</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-comments"></i>
                            <p>2</p>
                        </div>
                        <div class="status-list">
                            <i class="far fa-eye"></i>
                            <p>10.000</p>
                        </div>
                    </div>
                </a>
            </div>
        </div> -->
        <?php require_once 'Views/includes/postSlider.php' ?>
    </div>  
</div>
<?php require_once 'Views/includes/footer.php' ?>