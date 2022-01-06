<?php require_once 'Views/includes/header.php' ?>
<link rel="stylesheet" href="public/css/admin.css">

<h1>Trang quản trị</h1>
<div class="admin">
    <div class="post__manager">
        <h2>Report bài viết</h2>
        <!-- <div class="manager__header">
            <p>Chọn chủ đề</p>
            <select name="" id="">

            </select>
        </div> -->
        <div class="post__table">
            <table>
                <thead>
                    <tr>
                        <th>Chủ đề</th>
                        <th>Tên bài viết</th>
                        <th>Người viết bài</th>
                        <th>Người report</th>
                        <th>Nội dung report</th>
                    </tr>
                </thead>
                <tbody id="ct_rp_post">
                <?php
                        $arrPost = $this->dl['post'];
                        for($i = 0; $i<count($arrPost); $i++){
                            
                            $linkDetalis = getLinkPostDetails($arrPost[$i]['topic_name'].' '.$arrPost[$i]['id_topic']);
                            echo '
                    <tr>
                        <td>
                            <a href="Topic/details/'.$linkDetalis.'">'.$arrPost[$i]['topic_name'].'</a>
                        </td>
                        <td>'.$arrPost[$i]['post_title'].'</td>
                        <td>
                            <a href="profile/user/'.$arrPost[$i]['id_user'].'">'.$arrPost[$i]['user_report'].'</a>
                        </td>
                        <td>
                            <a href="profile/user/'.$arrPost[$i]['id_user_post'].'">'.$arrPost[$i]['user_name_post'].'</a>
                        </td>
                        <td>'.$arrPost[$i]['report_content'].'</td>
                    </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="question__manager">
        <h2>Report câu hỏi</h2>
        <div class="post__table">
            <table>
                <thead>
                    <tr>
                        <th>Tên câu hỏi</th>
                        <th>Người đặt câu hỏi</th>
                        <th>Người report</th>
                        <th>Nội dung report</th>
                    </tr>
                </thead>
                <tbody id="ct_rp_post">
                    <?php
                        $arrQuestion = $this->dl['question'];
                        for($i = 0; $i<count($arrQuestion); $i++){
                            echo '
                    <tr>
                        <td>'.$arrQuestion[$i]['question_title'].'</td>
                        <td>
                            <a href="profile/user/'.$arrQuestion[$i]['id_user'].'">'.$arrQuestion[$i]['user_report'].'</a>
                        </td>
                        <td>
                            <a href="profile/user/'.$arrQuestion[$i]['id_user_question'].'">'.$arrQuestion[$i]['user_name_question'].'</a>
                        </td>
                        <td>'.$arrQuestion[$i]['report_content'].'</td>
                    </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="feedback__manager">
        <h2>Phản hồi</h2>
        <div class="post__table">
            <table>
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Ngày</th>
                    </tr>
                </thead>
                <tbody id="ct_rp_post">
                    <?php
                        $arrFb = $this->dl['feedback'];
                        for($i = 0; $i<count($arrFb); $i++){
                            echo '
                    <tr>
                        <td>'.$arrFb[$i]['name'].'</td>
                        <td>'.$arrFb[$i]['email'].'</td>
                        <td>'.$arrFb[$i]['sdt'].'</td>
                        <td>'.$arrFb[$i]['title'].'</td>
                        <td>'.$arrFb[$i]['content'].'</td>
                        <td>'.$arrFb[$i]['date'].'</td>
                    </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once 'Views/includes/footer.php' ?>