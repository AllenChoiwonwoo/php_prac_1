

      <tr>
        <?php if ($del == 0){ ?>

          <!-- $comm_id = $record['comm_id'];
          $mail = $record['mail'];
          $for_tag = $mail;
          $comment = $record['comment'];
          $createdate = $record['createdate'];
          $a_comment = $mail." : ".$comment."   ".$createdate;//댓글내용 -->
          <form class="" action="edit_comm.php" method="post">

            <td><?php echo $mail; ?></td>
             <td> <?php echo $comment; ?></td>
             <input type="hidden" name="comm_id" value="<?php echo $comm_id; ?>">
             <input type="hidden" name="mail" value="<?php echo $mail; ?>">
            <input type="hidden" name="comment" value="<?php echo $comment; ?>">
            <td><input type="submit" name="" value="수정하기"></td>
          </form>


        <form class="" action="post_detail.php" method="post">
          <td>
            <input type="hidden" name="add_cocomm" value="<?php echo $comm_id; ?>">
            <input type="hidden" name="post_id"  value="<?php echo $_SESSION['post_id']; ?>">
            <button type="submit" id="값값" class="btn btn-xs btn-primary">답글달기</button>
            <!-- <input type="submit" onclick="change_button()" name="" value=""> -->
          </td>
        </form>
      <td>
        <form class="" action="comm_delete.php" method="post">
          <input type="hidden" name="mail" value="<?php echo $id; ?>">
          <input type="hidden" name="comm_id" value="<?php echo $comm_id; ?>">
          <input class="btn btn-xs btn-warning" type="submit" name="" value="삭제">
        </form>
      </td>

    <?php }else {
      ?>
        <td align="center" colspan="6" style="background:gray;">삭제된 댓글입니다.</td>
      <?php
    } ?>

      </tr>
