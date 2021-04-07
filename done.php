<?php session_start();
if (!empty($_SESSION['form'])) {
  $name = $_SESSION['form']['name'];
  $email = $_SESSION['form']['email'];
  $body = $_SESSION['form']['body'];
  $name = htmlspecialchars($name, ENT_QUOTES);
  $email = htmlspecialchars($email, ENT_QUOTES);
  $body = htmlspecialchars($body, ENT_QUOTES);
} else {
  header('Location:/portfolio');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require('head.php'); ?>
  <title>確認ページ</title>
</head>

<body>
  <div class="header">
  <div class="global_ttl_wrap wrapper">
        <h2 class="global_ttl"><span>C</span>HECK</h2>
      </div>
    <div class="main_visual contact">
      <div class="ttl_box">
        <div class="body_desc">
          <div class="fukidashi">
            <h1>【入力内容確認】</h1>
          <span class="ityped" id="done"></span>
          <hr>
            <div class="done_block" style="padding: 20px 0;">
              <p>お名前「<?php echo $name; ?>」</p>
              <hr>
              <p>アドレス「<?php echo $email; ?>」</p>
              <hr>
              お問い合わせ内容
              <p><?php echo $body; ?></p>
              <hr>
            </div>
          </div>
          <div class="nav_container">
            <nav class="contact_nav">
                <div>
                  <a onclick="history.back()" class="button">戻る</a>
                </div>
                <form action="mail.php" method="post">
                  <input type="hidden" value="$_SESSION[''form]">
                  <input type="submit" value="送信" class="button">
                </form>
                </nav>
          </div>
        </div>
        <figure>
          <img src="img/yossi.svg" alt="よろしいですか？">
        </figure>
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/ityped@1.0.3"></script>
  　　<script>
    ityped.init(document.querySelector("#done"), {
      strings: ['<?php echo $name; ?>様、下記内容で送信しますか？'],
      startDelay: 1000,
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