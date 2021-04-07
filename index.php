<?php
session_start();
require('list.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
  $body = htmlspecialchars($_POST['body'], ENT_QUOTES);
  $error = [];
  if ($name === "") {
    $error['name'] = 'blank';
  }
  if ($email === "") {
    $error['email'] = 'blank';
  }
  if ($body === "") {
    $error['body'] = 'blank';
  }
  if (empty($error)) {
    $_SESSION['form']=$_POST;
    header('Location:done.php');
    exit();
  }
}
if(!empty($_SESSION['form'])){
  $_POST=$_SESSION['form'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require('head.php');?>
  <title>myportfolio</title>
</head>

<body>
  <div class="scroll_top_wrap">
    <button class="scroll_button"><span><i class="fas fa-chevron-up"></span></i>TOP</button>
  </div>
  <?php require('header.php');?>
  <section class="about" id="about">
    <div class="global_ttl_wrap wrapper">
      <h2 class="global_ttl"><span>A</span>BOUT</h2>
    </div>
    <div class="about_wrap wrapper">
      <figure class="side_left_action">
        <img src="img/icon.png" alt="">
      </figure>
      <div class="about_desc side_right_action delay">
        <h3>吉田一生</h3>
        <small>ヨシダ カズキ</small>
        <small>1986年10月8日生まれ</small>
        <br>
        <br>
        <p class="main_txt">
          web制作に興味をもち、長年務めた職場を退職し、独学で現在も勉強し続けています。<br class="mob_hidden">
          html,css,php,javascriptなど、現在はフレームワークのlaravelを勉強しています。<br class="mob_hidden">
          初歩的な、掲示板webアプリ等は理解して作成できます。<br class="mob_hidden">
          今はlaravelでのマッチングアプリの開発を勉強中です。<br class="mob_hidden">
          実務経験こそ浅いですが、やる気とコミュニケーションには自信があります。<br class="mob_hidden">
          コーダーとしてだけではなく、WEBシステム関連など活躍していきたいです。
        </p>
      </div>
    </div>
  </section>
  <div id="display">
  <img src="" alt="">
  </div>
  <section class="product bg_dark right_cube" id="product">
    <div class="global_ttl_wrap wrapper">
      <h2 class="global_ttl"><span>P</span>RODUCT</h2>
    </div>
    <div class="sliderArea action">
      <div class="full-screen slider">
        <div><img src="img/work1.png" alt=""></div>
        <div><img src="img/work2.png" alt=""></div>
        <div><img src="img/work3.png" alt=""></div>
        <div><img src="img/work4.png" alt=""></div>
      </div>
    </div>
    <div class="product_desc action wrapper">
      <p class="main_txt">
        現在WEBの制作実績は乏しいです。<br class="mob_hidden">もっと制作物を増やしていくため作成中です。<br class="mob_hidden">
        laravelでのマッチングアプリの開発を勉強中です。
      </p>
    </div>
    <div class="product_list wrapper action">
      <ul>
      <?php foreach($all as $list):?>
        <li>
        <h3 class="caption_box"><?php echo $list['name'];?></h3>
        <img src="img/<?php echo $list['img'];?>.jpg" alt="">
        <?php if($list['url']==="開発中"||$list['url']==="グラフィック"):?>
          <div class="caption_box reverse"><?php echo $list['url'];?></div>
        <?php else:?>
          <a class="caption_box reverse" href="<?php echo $list['url'];?>" target="_blank"><i class="fas fa-external-link-alt"></i>　WEBページへ</a>
        <?php endif;?>
        <p class="main_txt small"><?php echo $list['desc'];?></p>
        </li>
        <?php endforeach;?>
      </ul>
    </div>
  </section>

  <section class="skill left_cube" id="skill">
    <div class="global_ttl_wrap wrapper">
      <h2 class="global_ttl"><span>S</span>KILL</h2>
      <div class="skill_box">
        <div class="detail action">
          <div class="detail_flex">
            <div class="name">HTML5 <i class="fab fa-html5"></i></div>
            <div class="Progress_Status">
              <div class="myprogressBar"></div>
              <div class="prorate" data-value="80">0%</div>
            </div>
          </div>
          <p class="desc">
            2019年5月から勉強を開始して現在に至ります。
            現在はコーダーとして2社で働いています。
          </p>
        </div>
        <div class="detail action delay">
          <div class="detail_flex">
            <div class="name">CSS3 <i class="fab fa-css3-alt"></i></div>
            <div class="Progress_Status">
              <div class="myprogressBar"></div>
              <div class="prorate" data-value="80">0%</div>
            </div>
          </div>
          <p class="desc">
            HTMLと同じ時期に学び、現在ではデザインをもとに思い通りに扱えるようになりました。
          </p>
        </div>
        <div class="detail action">
          <div class="detail_flex">
            <div class="name">Saas <i class="fab fa-sass"></i></div>
            <div class="Progress_Status">
              <div class="myprogressBar"></div>
              <div class="prorate" data-value="60">0%</div>
            </div>
          </div>
          <p class="desc">
            現在は職場で主にsassを使用してコーディングしています。
          </p>
        </div>
        <div class="detail action delay">
          <div class="detail_flex">
            <div class="name">Javascript <i class="fab fa-js"></i></div>
            <div class="Progress_Status">
              <div class="myprogressBar"></div>
              <div class="prorate" data-value="50">0%</div>
            </div>
          </div>
          <p class="desc">
            ブラウザ上での表現はある程度実装できます。
          </p>
        </div>
        <div class="detail action">
          <div class="detail_flex">
            <div class="name">jQuery</div>
            <div class="Progress_Status">
              <div class="myprogressBar"></div>
              <div class="prorate" data-value="60">0%</div>
            </div>
          </div>
          <p class="desc">
            主にjQueryを使用していますが、現在はvie.jsを勉強しています。
          </p>
        </div>
        <div class="detail action delay">
          <div class="detail_flex">
            <div class="name">vue.js <i class="fab fa-vuejs"></i></div>
            <div class="Progress_Status">
              <div class="myprogressBar"></div>
              <div class="prorate" data-value="30">0%</div>
            </div>
          </div>
          <p class="desc">
            まだまだ勉強中のフレームワークですが、新しいことを学ぶのが好きなので、
            楽しみながら成長中です。
          </p>
        </div>
        <div class="detail action">
          <div class="detail_flex">
            <div class="name">PHP <i class="fab fa-php"></i></div>
            <div class="Progress_Status">
              <div class="myprogressBar"></div>
              <div class="prorate" data-value="60">0%</div>
            </div>
          </div>
          <p class="desc">
            まだまだ修行中ですが、PHPは大好きです。
            簡単なCRUDを使用した掲示板WEBアプリは作成できます。
          </p>
        </div>
        <div class="detail action delay">
          <div class="detail_flex">
            <div class="name">Laravel <i class="fab fa-laravel"></i></div>
            <div class="Progress_Status">
              <div class="myprogressBar"></div>
              <div class="prorate" data-value="50">0%</div>
            </div>
          </div>
          <p class="desc">
            初めてフレームワークを勉強したのがLaravelです。
            SNS風WEBアプリ「YossiBoardss」を作成しました。
            いいね機能やフォロー機能、ユーザーログイン機能、画像投稿機能など、
            非同期通信を使用していないので、ページがリフレッシュされてしまうのが欠点です。
            現在はマッチングアプリ「YossiMatch」を作成しています。
          </p>
        </div>
        <div class="detail action">
          <div class="detail_flex">
            <div class="name">WordPress <i class="fab fa-wordpress"></i></div>
            <div class="Progress_Status">
              <div class="myprogressBar"></div>
              <div class="prorate" data-value="60">0%</div>
            </div>
          </div>
          <p class="desc">
            現在働いている2社で使用しています。
            自作テーマ、カスタマイズはwordpressで作成できます。
          </p>
        </div>
        <div class="detail action delay">
          <div class="detail_flex">
            <div class="name">Illustrator</div>
            <div class="Progress_Status">
              <div class="myprogressBar"></div>
              <div class="prorate" data-value="60">0%</div>
            </div>

          </div>
          <p class="desc">
            前職で使用していました。
            4年ほど使用し、飲食業界のPOPや看板、メニューなどを作成していました。
            現在も依頼を受けて作成しています。
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="contact bg_none right_cube" id="contact">
    <div class="global_ttl_wrap wrapper">
      <h2 class="global_ttl"><span>C</span>ONTACT</h2>
    </div>
    <div class="contact_form wrapper action">
      <form action="" method="post">
        <table>
          <tr>
            <th><label for="name">お名前</label> <small style="color: crimson;">※必須</small>
              <?php if ($error['name'] === "blank") : ?>
                <div class="alert">お名前入力は必須です</div>
              <?php endif; ?>
            </th>
            <td>
              <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>">
            </td>
          </tr>
          <tr>
            <th><label for="email">メールアドレス</label> <small style="color: crimson;">※必須</small>
              <?php if ($error['email'] === "blank") : ?>
                <div class="alert">メールアドレス入力は必須です</div>
              <?php endif; ?>
            </th>
            <td>
              <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>">
            </td>
          </tr>
          <tr>
            <th><label for="body">お問い合わせ内容</label> <small style="color: crimson;">※必須</small>
              <?php if ($error['body'] === "blank") : ?>
                <div class="alert">お問い合わせ内容入力は必須です</div>
              <?php endif; ?>
            </th>
            <td>
              <textarea name="body" id="body" cols="30" rows="10"><?php echo htmlspecialchars($_POST['body'], ENT_QUOTES); ?></textarea>
            </td>
          </tr>
          <tr>
            <th colspan="2"><input type="submit" value="内容確認へ" class="button"></th>
          </tr>
        </table>
        <input type="hidden" name="error_form" value="" class="error_form">
      </form>
    </div>
  </section>
  <script type="text/javascript">
    // エラー時フォームジャンプ
    $('form').submit(function() {
      var scroll_top = $(window).scrollTop();
      $('.error_form').prop('value', scroll_top - 10);
    });
    window.onload = function() {
      $(window).scrollTop(<?php echo $_POST['error_form']; ?>);
    }
    $(".full-screen").slick({
      centerMode: true,
      centerPadding: '5%',
      dots: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 1800,
      infinite: true,
    });
  </script>
  <script src="https://unpkg.com/ityped@1.0.3"></script>
　　<script>
     ityped.init(document.querySelector("#ityped"), {
       strings: ['Welcome to my portfolio...','KAZUKI YOSHIDA'],
       startDelay: 300, 
       typeSpeed: 80,
       loop: false,
       backSpeed:  30,
       backDelay:  1000,
       showCursor: false,
     })
     ityped.init(document.querySelector("#seconde"), {
       strings: ['PORTFOLIO'],
       startDelay: 5600, 
       typeSpeed: 80,
       loop: false,
       backSpeed:  30,
       backDelay:  1000,
       showCursor: false,
     })
   </script>
   <?php require('footer.php');?>
</body>
</html>