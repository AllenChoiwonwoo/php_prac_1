<?php
  $caption = "쵁쵁쵀ᇼ왝쵀 엄마가 저 신화의 애릭 닮았다고해서, 애릭 팬이셨던 음악선생님께 맞았던 기억이나네요";

 ?>

    <div class="">
      <div class="card mb-4 box-s">

          <!-- <a href="post_detail.php"><img class="card-img-top" src="<?php echo $feed_img_src; ?>" alt="trip_pic3"></a> -->
          <form class="d-flex justify-content-between align-items-center" action="post_detail.php" method="post">

            <input class="card-img-top img" type="image" onclick="addCookie();" src="<?php echo $feed_img_src; ?>">

            <!-- 이미지 클릭시 상새페이지로 넘어간다. -->
            <input type="hidden" name="post_id" value="<?php echo $feed_post_id; ?>"><!-- 댓글달 글의 번호 -->
            <input type="hidden" name="img_src" value="<?php echo $feed_img_src; ?>">
            <input type="hidden" name="writer_mail" value="<?php echo $feed_writer_mail; ?>">
            <input type="hidden" name="caption" value="<?php echo $feed_caption; ?>">
          </form>

          <hr>
        <div class="card-body">
          <p class="card-text"> <?php echo $feed_caption; ?> </p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <form class="" action="like_event.php" method="post">
                  <input type="hidden" name="like" value="<?php echo $feed_post_id; ?>">
                  <!-- 현제 포스트의 post_id , 좋아요 누름 여부, 를 보낸다 -->
                  <input type="hidden" name="yn" value="<?php echo $yn; ?>">
                  <button type="submit" id="좋아요"  class="<?php echo $btn_col; ?>">좋아요</button>
               </form>


              <form class="" action="index.html" method="post">
                <input type="hidden" name="" value="">
                <button type="button" class="btn btn-sm btn-outline-secondary"><?php echo $feed_likecount; ?></button>
              </form>
            </div>
            <form class="form-inline my-2 my-lg-0" action="register_comm.php" method="post">
              <input class="form-control mr-sm-2" type="text" name="comment" placeholder="댓글 입력">
              <input class="form-control mr-sm-2" type="hidden" name="post_id" value="<?php echo $feed_post_id; ?>">
              <input class="form-control mr-sm-2" type="hidden" name="parent_comm_id" value="not">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">등록</button>
            </form>
            <!-- <small class="text-muted">27 mins</small> -->

        </div>
      </div>
    </div>
