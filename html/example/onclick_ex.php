<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <script type="text/javascript">
    function delchk(val){

      // location.href = "post_1.php";

      document.getElementById('text').innerHTML = "<?php
       echo "string";
       


       ?>";
    }
    @RequestMapping(value = "logout.do", method = RequestMethod.POST)

    public String handleRequestlogout(MemberVO memberVO, Model model,RedirectAttributes redirectAttrs, HttpServletRequest request) {
    HttpSession sess = request.getSession(false);
    request.getSession(true).invalidate();

    return "redirect:/list.do";
    }

    </script>

  </head>
  <body>
    <a href="#" id="text" onclick="delchk('뭐');">삭제하기</a>

  </body>
</html>
