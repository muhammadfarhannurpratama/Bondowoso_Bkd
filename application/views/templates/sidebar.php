    <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url('admin/')?>" class="site_title"><i class="fa fa-institution"></i> <span> Arsip Surat</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <?php if ( $this->userdata['jenis'] === 'admin') :?>
                <img src="<?= base_url('assets/backend/')?>images/admin/<?= $this->userdata['gambar']; ?>" height="55" width="55" alt="" class="img-circle profile_img">
              <?php elseif ($this->userdata['jenis'] === 'bagian') :?>
                <img src="<?= base_url('assets/backend/bagian/'.$this->userdata['gambar'])?>" height="55" width="55" alt="" class="img-circle profile_img">
              <?php endif;?>
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?= $this->userdata['nama']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-file-text"></i> Kategori Surat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('admin/surat_masuk') ?>"><i class="fa  fa-inbox"></i>Surat Masuk</a></li>
                      <li><a href="<?= base_url('admin/surat_keluar') ?>"><i class="fa fa-send"></i>Surat Keluar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Bagian <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('admin/bagian') ?>"><i class="fa  fa-inbox"></i>Data Bagian</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>