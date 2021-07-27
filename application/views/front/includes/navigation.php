<?php if (isset($page_title) && $page_title != 'Register'): ?>
<!--Main menu-->
<div class="menu">
    <div class="container menu__wrapper">
        <div class="row align-content-center">
            <div class="menu__logo menu__item" style="align-self:center">
                <a href="home">
                    <img class="menu__logo-img" src="<?php echo base_url($settings->logo) ?>" width="200px">
                    <!--                    <p class="menu__logo-title"> Bill Now</p>-->
                </a>
            </div>
            <div class="menu__item d-t-none " style="align-self:center">
                <nav class="menu__center-nav">
                    <ul>
                        <li>
                            <a class="link link--gray <?php if(isset($page_title) && $page_title == 'Home'){echo 'active';} ?>" href="<?php echo base_url() ?>"><?php echo trans('home') ?></a>
                        </li>

                        <li>
                            <a class="link link--gray " href="<?php echo base_url() ?>#features"><?php echo trans('features') ?></a>
                        </li>

                        <li>
                            <a class="link link--gray " href="<?php echo base_url() ?>#pricing"><?php echo trans('pricing') ?></a>
                        </li>

                        <li>
                            <a class="link link--gray <?php if(isset($page_title) && $page_title == 'Contact'){echo 'active';} ?>" href="<?php echo base_url('contact') ?>"><?php echo trans('contact') ?> </a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="menu__item align-self-center" style="align-self:center">
                <nav class="menu__right-nav d-l-none">
                    <ul>
                        <?php if (is_admin()): ?>
                            <li><a class="site-btn site-btn--accent" href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> <?php echo trans('logout') ?></a></li>

                            <li><a class="site-btn site-btn--accent" href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> <?php echo trans('dashboard') ?></a></li>
                        <?php elseif(is_user()): ?>
                            <li><a class="site-btn site-btn--accent" href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> <?php echo trans('logout') ?></a></li>

                            <li><a class="site-btn site-btn--accent" href="<?php echo base_url('admin/dashboard/business') ?>"><i class="fa fa-dashboard"></i> <?php echo trans('dashboard') ?></a></li>
                        <?php else: ?>
                            <li><a class="site-btn site-btn--accent" href="<?php echo base_url('login') ?>"><?php echo trans('sign-in') ?></a></li>
                            <li><a class="site-btn site-btn--accent" href="<?php echo base_url('register') ?>"><?php echo trans('create-account') ?></a></li>
                        <?php endif ?>


                        <?php if (settings()->enable_multilingual == 1): ?>
                            <li>
                                <div class="menu__dropdown d-t-none">
                                    <a class="link link--gray menu__dropdown-btn"><?php echo lang_short_form(); ?>
                                        <span><i class="mdi mdi-chevron-down"></i></span>
                                    </a>
                                    <div class="menu__dropdown-content">
                                        <?php foreach (get_language() as $lang): ?>
                                            <a class="link link--gray" href="<?php echo base_url('home/switch_lang/'.$lang->slug) ?>"><?php echo html_escape($lang->name) ?></a>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
                <div class="d-lg-none d-md-block">
                    <button type="button" class="menu__mobile-button">
                        <span><i class="mdi mdi-menu" aria-hidden="true"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Main menu-->

<!--Mobile menu-->
<div class="mobile-menu d-lg-none d-md-block">
    <div class="container">
        <div class="mobile-menu__logo">
            <img class="menu__logo-img" src="<?php echo base_url($settings->logo) ?>" width="200px">
        </div>
        <button type="button" class="mobile-menu__close">
            <span><i class="mdi mdi-close" aria-hidden="true"></i></span>
        </button>
        <nav class="mobile-menu__wrapper">
            <ul class="mobile-menu__ul">
                <li>
                    <a class="link link--dark-gray  <?php if(isset($page_title) && $page_title == 'Home'){echo "active";} ?>" href="<?php echo base_url() ?>"><?php echo trans('home') ?></a>
                </li>

                <li>
                    <a class="link link--dark-gray " href="<?php echo base_url() ?>#features"><?php echo trans('features') ?></a>
                </li>

                <li>
                    <a class="link link--dark-gray" href="<?php echo base_url() ?>#pricing"><?php echo trans('pricing') ?></a>
                </li>

                <li>
                    <a class="link link--dark-gray <?php if(isset($page_title) && $page_title == 'Contact'){echo "active";} ?>" href="<?php echo base_url('contact') ?>"><?php echo trans('contact') ?> </a>
                </li>

                <ul>
                    <?php if (is_admin()): ?>
                        <li><a class="site-btn site-btn--accent" href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> <?php echo trans('logout') ?></a></li>

                        <li><a class="site-btn site-btn--accent" href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> <?php echo trans('dashboard') ?></a></li>
                    <?php elseif(is_user()): ?>
                        <li><a class="site-btn site-btn--accent" href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> <?php echo trans('logout') ?></a></li>

                        <li><a class="site-btn site-btn--accent" href="<?php echo base_url('admin/dashboard/business') ?>"><i class="fa fa-dashboard"></i> <?php echo trans('dashboard') ?></a></li>
                    <?php else: ?>
                        <li><a class="site-btn site-btn--accent" href="<?php echo base_url('login') ?>"><?php echo trans('sign-in') ?></a></li>
                        <li><a class="site-btn site-btn--accent" href="<?php echo base_url('register') ?>"><?php echo trans('create-account') ?></a></li>
                    <?php endif ?>
                </ul>

            </ul>
        </nav>
    </div>
</div>
<!--Mobile menu-->
<?php endif; ?>
