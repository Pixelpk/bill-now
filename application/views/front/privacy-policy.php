<!--Header-->
<section class="section section--first">
  <div class="background background--wave">
    <div class="container">
      <div class="row">
        <div class="col-12 justify-content-center">
          <h2 class="header-home__title">Our Privacy Policy</h2>
            <div class="privacy__content">
                <p><?php echo settings()->terms_service; ?></p>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Header-->

<!--Download-->
<section class="section section--last">
    <div class="container download">
        <div class="row">
            <div class="col-12">
                <h3 class="download__title">Start Using Bill Now today</h3>
                <h3>and get started with a free trial for your business</h3>
            </div>
        </div>
        <div class="row download__btns justify-content-center">
            <div class="">
                <a href="<?php echo base_url('register?trial=start') ?>"
                   class="site-btn site-btn--accent site-btn--right download__btn-first">
                    Start Using for Free</a>
            </div>
        </div>
    </div>
    <img alt="" class="section__img" src="<?php echo base_url() ?>assets/assets/img/img_backgroud_footer.png">
</section>
<!--Download-->