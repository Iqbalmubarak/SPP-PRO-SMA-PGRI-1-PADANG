<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar bg-aqua">
      <!-- Sidebar user panel -->
      <div class="user-panel bg-green">
        <div class="pull-left image">
          <?php if ($this->session->userdata('user_image') != null) { ?>
          <img src="<?php echo upload_url().'/users/'.$this->session->userdata('user_image'); ?>" class="img-responsive">
          <?php } else { ?>
          <img src="<?php echo media_url() ?>img/user.png" class="img-responsive">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($this->session->userdata('ufullname')); ?></p>
          <a href="#"><i class="fa fa-circle bg-green text-success"></i> Online</a>
        </div>
        <br>
        <br>
        <br>
        <script type='text/javascript'>
			<!--
			var months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
			var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
			var date = new Date();
			var day = date.getDate();
			var month = date.getMonth();
			var thisDay = date.getDay(),
			    thisDay = myDays[thisDay];
			var yy = date.getYear();
			var year = (yy < 1000) ? yy + 1900 : yy;
			document.write(day+'/'+months[month] +'/'+year);
			//-->
		</script>
	<!-- Menampilkan Jam (Aktif) -->
	<div id="clock"></div>
		<script type="text/javascript">
		<!--
		function showTime() {
		    var a_p = "";
		    var today = new Date();
		    var curr_hour = today.getHours();
		    var curr_minute = today.getMinutes();
		    var curr_second = today.getSeconds();
		    if (curr_hour < 12) {
		        a_p = "AM";
		    } else {
		        a_p = "PM";
		    }
		    if (curr_hour == 0) {
		        curr_hour = 12;
		    }
		    if (curr_hour > 12) {
		        curr_hour = curr_hour - 12;
		    }
		    curr_hour = checkTime(curr_hour);
		    curr_minute = checkTime(curr_minute);
		    curr_second = checkTime(curr_second);
		 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
		    }

		function checkTime(i) {
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		}
		setInterval(showTime, 500);
		//-->
		</script>
		
		</div>

      <div style="margin-top: 20px"></div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>

        <li class="<?php echo ($this->uri->segment(2) == 'dashboard' OR $this->uri->segment(2) == NULL) ? 'active' : '' ?>">
          <a href="<?php echo site_url('manage'); ?>">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'payout') ? 'active' : '' ?>">
          <a href="<?php echo site_url('manage/payout'); ?>">
            <i class="fa fa-credit-card"></i> <span>Pembayaran Siswa</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <?php if ($this->session->userdata('uroleid') == USER) { ?>
        <li class="<?php echo ($this->uri->segment(2) == 'student') ? 'active' : '' ?>">
          <a href="<?php echo site_url('manage/student'); ?>">
            <i class="fa fa-users"></i> <span>Siswa</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <?php } ?>

        <?php if ($this->session->userdata('uroleid') == SUPERUSER) { ?>
        <li class="<?php echo ($this->uri->segment(2) == 'pos' OR $this->uri->segment(2) == 'payment') ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-money text-stock"></i> <span>Keuangan Sekolah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->uri->segment(2) == 'pos') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/pos') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'pos') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Daftar Pembayaran Sekolah </a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'payment') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/payment') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'payment') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Jenis Tagihan Siswa</a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <li class="<?php echo ($this->uri->segment(2) == 'kredit' OR $this->uri->segment(2) == 'debit') ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-edit text-stock"></i> <span>Jurnal Umum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->uri->segment(2) == 'kredit') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/kredit') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'kredit') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> kas keluar</a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'debit') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/debit') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'debit') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Kas Masuk</a>
            </li>
          </ul>
        </li>

        <?php if ($this->session->userdata('uroleid') == SUPERUSER) { ?>
        <li class="<?php echo ($this->uri->segment(2) == 'student' OR $this->uri->segment(2) == 'class' OR $this->uri->segment(2) == 'majors' OR $this->uri->segment(2) == 'period') ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-users text-stock"></i> <span>Manajemen Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->uri->segment(2) == 'period') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/period') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'period') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Daftar Tahun Ajaran</a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'class') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/class') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'class') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Daftar Kelas</a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'student' AND $this->uri->segment(3) != 'pass' AND $this->uri->segment(3) != 'upgrade') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/student') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'student' AND $this->uri->segment(3) != 'pass' AND $this->uri->segment(3) != 'upgrade') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Daftar Siswa</a>
            </li>
            <?php if (majors() == 'senior') { ?>
            <li class="<?php echo ($this->uri->segment(2) == 'majors') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/majors') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'majors') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Bidang Studi</a>
            </li>
            <?php } ?>
            <li class="<?php echo ($this->uri->segment(3) == 'pass') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/student/pass') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'pass') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Kelulusan Siswa</a>
            </li>
            <li class="<?php echo ($this->uri->segment(3) == 'upgrade') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/student/upgrade') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'upgrade') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Kenaikan Kelas Siswa</a>
            </li>
          </ul>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'report' OR $this->uri->segment(3) == 'report_bill') ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-file-text-o text-stock"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->uri->segment(2) == 'report' AND $this->uri->segment(3) != 'report_bill') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/report') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'report' AND $this->uri->segment(3) != 'report_bill') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Laporan Keuangan</a>
            </li>
            <li class="<?php echo ($this->uri->segment(3) == 'report_bill') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/report/report_bill') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'report_bill') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Rekapitulasi</a>
            </li>
          </ul>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'information') ? 'active' : '' ?>">
          <a href="<?php echo site_url('manage/information'); ?>">
            <i class="fa fa-bullhorn"></i> <span>Informasi</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'setting' OR $this->uri->segment(2) == 'month') ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-gear text-stock"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->uri->segment(2) == 'setting') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/setting') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'setting') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Sekolah</a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'month') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('manage/month') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'month') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Bulan</a>
            </li>
          </ul>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'users') ? 'active' : '' ?>">
          <a href="<?php echo site_url('manage/users'); ?>">
            <i class="fa fa-user"></i> <span>Manajemen Pengguna</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        
        <li class="<?php echo ($this->uri->segment(2) == 'logs') ? 'active' : '' ?>">
          <a href="<?php echo site_url('manage/logs'); ?>">
            <i class="fa fa-university"></i> <span>Activity Logs</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

      
        <li class="<?php echo ($this->uri->segment(2) == 'maintenance') ? 'active' : '' ?>">
          <a href="<?php echo site_url('manage/maintenance'); ?>">
            <i class=""></i> <span></span>
            <span class=""></span>
          </a>
        </li>
        <?php } ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>