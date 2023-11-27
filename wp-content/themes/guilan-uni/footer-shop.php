<footer class="site-footer">
    <div class="site-footer__inner container container--narrow">
        <div class="group">
            <div class="site-footer__col-one">
                <h1 class=" school-logo-text--alt-color">
                    <a href="#">دانشگاه <strong>گیلان</strong></a>
                </h1>
                <p><a class="site-footer__link" href="#">01333690274-8</a></p>
            </div>

            <div class="site-footer__col-two-three-group">

                <div class="site-footer__col-three">
                    <h3 class="headline headline--small">آموزش</h3>
                    <nav class="nav-list">
                        <ul>
                            <li><a href="#">تاریخ</a></li>
                            <li><a href="#">زیست شناسی</a></li>
                            <li><a href="#">شهرسازی </a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="site-footer__col-four">
                <h3 class="headline headline--small">با ما در ارتباط باشید</h3>
                <nav>
                    <ul class="min-list social-icons-list group">
                        <li>
                            <a href="#" class="social-color-facebook"><i class="fa fa-facebook"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-twitter"><i class="fa fa-twitter"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-youtube"><i class="fa fa-youtube"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-linkedin"><i class="fa fa-linkedin"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-instagram"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>
<div class="shopsearch-overlay">
    <div class="shopsearch-overlay__top">
        <div class="container">
            <i class='fa fa-search shopsearch-overlay__icon'aria-hidden='true'></i>
            <input type="text" class="shopsearch-term" placeholder="جستجو کنید" id="shopsearch-term">
            <i class='fa fa-window-close shopsearch-overlay__close'aria-hidden='true'></i>
        </div>
    </div>
    <div class="container">
        <div class="showshop-result"></div>
    </div>
</div>
<!-- اضافه کردن جاوااسکریپت SwiperJS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
  var mySwiper = new Swiper('.swiper-container', {
    // پارامترها
    loop:false,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    // ریسپانسیو breakpoints
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 5,
        spaceBetween: 50,
      },
    }
  });
});
</script>
<?php wp_footer() ?>


</body>

</html>