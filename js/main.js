$(function () {
  $('a[href^="#"]').click(function () {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top;
    $("html, body").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
  $(window).scroll(function () {
    var windowY = $(this).scrollTop();
    var content = $(".about").offset().top;
    var activeConts = $(".action").offset().top;
    if (windowY > content - 100) {
      $(".scroll_top_wrap").addClass("show");
      $(".side_nav").addClass("side_fixed");
      if (windowY > content - 1) {
        $(".side_nav").addClass("show_down");
      } else {
        $(".side_nav").removeClass("show_down");
      }
    } else {
      $(".scroll_top_wrap").removeClass("show");
      $(".side_nav").removeClass("side_fixed");
      $(".side_nav").removeClass("show_down");
    }
    if (windowY > activeConts - 500) {
      $(".action").addClass("current_active");
    } else {
      $(".action").removeClass("current_active");
    }

    $(".action,.side_left_action,.side_right_action").each(function () {
      var elemPos = $(this).offset().top,
        scroll = $(window).scrollTop(),
        windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight + 50) {
        $(this).addClass("scrollin");
      }
    });
  });
  $(".scroll_button").on("click", function () {
    $("body, html").animate({ scrollTop: 0 }, 500);
    return false;
  });
  $(".product img").click(function () {
    var imgSrc=$(this).attr("src");
    $('#display img').attr('src',imgSrc);
    $("#display").fadeIn(200);
    $("body,html").css("overflow-y", "hidden");
    return false;
  });
  $("#display img").click(function () {
    $("#display").fadeOut(200);
    $("body,html").css("overflow-y", "visible");
    return false;
  });

  $(window).scroll(function () {
    $(".myprogressBar:not(.fire)").each(function () {
      //eachで同一クラスmyprogressBarをそれぞれ取得
      var position = $(this).offset().top;
      //それぞれ要素の位置を取得
      var scroll = $(window).scrollTop();
      //スクロール値を取得
      var windowHeight = $(window).height();
      //画面サイズの高さを取得

      var element = $(this);
      //barの長さに反映するために用意
      var prorate = $(this).next();
      //指定要素の2番目の要素<div class="prorate"></div>をnext()で指定。
      var value = prorate.data("value");
      //barの値を取得
      var width = 1;
      //初期値を1に設定

      if (scroll > position - windowHeight + 250) {
        //可視領域設定。※高さを変えたい場合はwindowHeightの後ろを調整。+ 100 にすると画面下から100pxの高さで表示設定できる。
        var identity = setInterval(scene, 10);
        //setIntervalで関数を制御。バーの動きを遅くしたい場合は第２引数の数字を増やす。
        function scene() {
          if (width >= value) {
            clearInterval(identity);
            //value値まで数字が到達すればintervalをストップ。
          } else {
            $(element).addClass("fire");
            //それぞれの要素にfireクラスを付与。「一度だけ」行う関数の制御にはaddClassが有効。
            width++;
            element.width(width + "%");
            //barの長さ。value値の分だけ伸びる設定
            prorate.html(width * 1 + "%");
            //value値のカウント※html()でindex.htmlのテキスト「1%」を上書き)
          }
        }
      }
    });
  });
  $(".mob_nav_btn,.bg,.links").on("click", function () {
    if ($("body").hasClass("open")) {
      $("body").removeClass("open");
    } else {
      $("body").addClass("open");
    }
  });
});
