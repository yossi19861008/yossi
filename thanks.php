<?php session_start();
$name = $_SESSION['form']['name'];
unset($_SESSION['form']);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require('head.php'); ?>
  <title>サンクスページ</title>
</head>

<body>
  <div class="header">
  <div class="global_ttl_wrap wrapper">
        <h2 class="global_ttl"><span>T</span>HANKS</h2>
      </div>
    <div class="main_visual contact">
      <div class="ttl_box">
      <div class="body_desc">
          <div class="fukidashi">
            <h1>お問い合わせありがとうございます!!</h1>
            <span class="ityped" id="msg"></span>
          </div>
          <div class="nav_container">
          <nav class="contact_nav">
                <div>
                  <a onclick="history.back()" class="button">戻る</a>
                </div>
            </nav>
          </div>
        </div>
        <figure>
          <img src="img/yossi.svg" alt="ありがとうございます">
        </figure>
      </div>
    </div>
    </div>
  </div>
  <script src="https://unpkg.com/ityped@1.0.3"></script>
  　　<script>
    ityped.init(document.querySelector("#msg"), {
      strings: ['<?php echo $name; ?>様へ自動返信メールをお送り致しましたので、ご確認下さい。'],
      startDelay: 200,
      typeSpeed: 50,
      loop: false,
      backSpeed: 30,
      backDelay: 1000,
      showCursor: true,
      cursorChar: "｜",
    })
    </script>
    
</body>

</html>