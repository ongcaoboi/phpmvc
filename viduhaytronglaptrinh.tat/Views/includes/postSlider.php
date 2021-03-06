
    <div class="post__slider">
      <div class="slider__topics">
        <div class="topics__header">
          <h3> Chủ đề nổi bật</h3>
        </div>
        <div class="topic-list"">
        <?php
          $arrTopic = $this->dl['listTopic'];
          for($i = 0; $i < count($arrTopic); $i++){
            $id = $arrTopic[$i]['id_topic'];
            $link = getLinkPostDetails($arrTopic[$i]['topic_name'].' '.$id);
            echo '
            <a href="topic/details/'.$link.'" class="topic-list__items">
              <p>'.$arrTopic[$i]['topic_name'].'</p>
            </a>';  
          }
        ?>
        </div>
      </div>
      <div class="slider__questions">
        <div class="post__header1">
          <h3>Bài viết nổi bật </h3>
        </div>
          <div class="post-list">
          <?php
            $arrPost = $this->dl['listPost'];
            for($i = 0 ; $i < count($arrPost); $i++){
              $idPost = $arrPost[$i]['id_post'];
              $name = $arrPost[$i]['post_title'];
              $cm = $arrPost[$i]['slComment'];
              $views = $arrPost[$i]['post_views'];
              $likes = $arrPost[$i]['slLikes'];
              $idTopic = $arrPost[$i]['id_topic'];
              $linkPostDetails = getLinkPostDetails($name.' '.$idPost);
              echo '
            <a href="post/details/'.$linkPostDetails.'" class="post-list__items">
              <h3>'.$name.'</h3>
                <div class="status">
                  <div class="status-list">
                    <i class="fas fa-thumps-up"></i>
                    <p>'.$likes.'</p>
                  </div>
                  <div class="status-list">
                    <i class="fas fa-fw fa-reply"></i>
                    <p>'.$cm.'</p>
                  </div>
                  <div class="status-list">
                    <i class="far fa-eye"></i>
                    <p>'.$views.'</p>
                  </div>
                </div>
            </a>
          ';
            }
          ?>
        </div>
      </div>
      <div class="slider__questions">
        <div class="questions__header">
          <h3>Câu hỏi mới nhất </h3>
        </div>
          <div class="questions-list">
          <?php
            $arrQuestion = $this->dl['listQuestion'];
            for($i = 0 ; $i < count($arrQuestion); $i++){
              $name = $arrQuestion[$i]['title'];
              $cm = $arrQuestion[$i]['slTraLoi'];
              $views = $arrQuestion[$i]['views'];
              $idQuestion = $arrQuestion[$i]['id'];
              $linkQuestionDetails = getLinkPostDetails($name.' '.$idQuestion);
              echo '
            <a href="/Questions/details/'.$linkQuestionDetails.'" class="questions-list__items">
              <h3>'.$name.'</h3>
                <div class="status">
                  <div class="status-list">
                    <i class="fas fa-fw fa-reply"></i>
                    <p>'.$cm.'</p>
                  </div>
                  <div class="status-list">
                    <i class="far fa-eye"></i>
                    <p>'.$views.'</p>
                  </div>
                </div>
            </a>
          ';
            }
          ?>
        </div>
      </div>
    </div>