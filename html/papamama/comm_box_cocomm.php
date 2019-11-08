
      <tr bgcolor="lightgrey">
        <?php if ($del == 0) { ?>
          <form class="" action="edit_comm.php" method="post">
            <td>-></td>
            <td><i> <?php echo $parrent_tag; ?> </i></td>
            <input type="hidden" name="comm_id" value="<?php echo $comm_id; ?>">
            <td><?php echo $mail; ?></td>
            <input type="hidden" name="mail" value="<?php echo $mail; ?>">
             <td> <?php echo $comment; ?></td>
             <input type="hidden" name="comment" value="<?php echo $comment; ?>">

            <td><input type="submit" name="" value="수정하기"></td>
          </form>

        <form class="" action="post_detail.php" method="post">
            <input type="hidden" id="parent_comm<?php echo $parent_comm_numb; ?>" name="add_cocomm" value="<?php echo $comm_id; ?>">
            <!-- <input type="button" name="" id="change" value=""> -->
            <!-- <input type="hidden" id="값값" ></button> -->
            <!-- <input type="submit" onclick="change_button()" name="" value=""> -->

        </form>
        <td>
          <form class="" action="comm_delete.php" method="post">
            <input type="hidden" name="mail" value="<?php echo $id; ?>">
            <input type="hidden" name="comm_id" value="<?php echo $comm_id; ?>">
            <input type="submit" name="" value="삭제">
          </form>
        </td>
          <?php
        }else {
          ?>
          <td align="center" colspan="6" style="background:gray;">삭제된 대댓글입니다.</td>
          <?php
        } ?>

          <!-- $comm_id = $record['comm_id'];
          $mail = $record['mail'];
          $for_tag = $mail;
          $comment = $record['comment'];
          $createdate = $record['createdate'];
          $a_comment = $mail." : ".$comment."   ".$createdate;//댓글내용 -->


      </tr>
