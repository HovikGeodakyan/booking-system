    <section>
      <section class="hbox stretch">
        <aside class="bg-black aside-md hidden-print nav-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">

              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                             <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Menu</div>
                  <ul class="nav nav-main" data-ride="collapse">
                    <li  data-intro='Here you can see reservations scheduler...' data-step='1' data-position='right'>
                      <a href="<?php echo URL; ?>welcome" class="auto">
                        <i class="i i-statistics icon">
                        </i>
                        <span class="font-bold"><?php echo _daily_view ?></span>
                      </a>
                    </li>
                    <li   data-intro='Here you can see table of all reservations in the system' data-step='2' data-position='right'>
                      <a href="<?php echo URL; ?>reservations" class="auto">
                        <i class="i i-grid2 icon">
                        </i>
                        <span class="font-bold"><?php echo _reservations ?></span>
                      </a>
                    </li>
                   <?php if($this->session->userdata('user_role') == "1") { ?>
                    <li  class="">
                      <a href="<?php echo URL; ?>statistics" class="auto">
                        <i class="i i-docs icon">
                        </i>
                        <span class="font-bold"><?php echo _statistics ?></span>
                      </a>
                    </li>
                    <?php } ?>
                      <li  data-intro='Here you can change setings of outlets, users, emails and holidays...' data-step='4' data-position='right'>
                      <a href="<?php echo URL; ?>outlet" class="auto">
                        <i class="i i-lab icon">
                        </i>
                        <span class="font-bold"><?php echo _setup ?></span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
            <!--   <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
                <i class="i i-logout"></i>
              </a> -->
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs active">
                <i class="i i-circleleft text"></i>
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
    <section id="content">
      <section class="vbox">          
        <section class="scrollable padder">