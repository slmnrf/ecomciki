<div class="container">

            <div class="row">

                <!-- <div class="col-md-3">
                    <p class="lead">Shop Name</p>
                    <div class="list-group">
                        <a href="#" class="list-group-item">List 1</a>
                        <a href="#" class="list-group-item">List 2</a>
                        <a href="#" class="list-group-item">List 3</a>
                    </div>
                </div> -->
                
    <div class="col-md-12"> 
      <div class="row carousel-holder"> 
        <div class="col-md-12"> 
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner"> 
              <div class="item active"> <img class="slide-image" src="assets/images/slide-image1.png" alt=""> 
              </div>
              <div class="item"> <img class="slide-image" src="assets/images/slide-image2.png" alt=""> 
              </div>
              <div class="item"> <img class="slide-image" src="assets/images/slide-image3.png" alt=""> 
              </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> 
            <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> 
            <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
        </div>
      </div>
	  <div class="row">
	  <nav class="navbar navbar-default" role="navigation">
	  

            <!-- Input cari
            ================================================ -->
            <form id="form_cari" method="get" class="navbar-form navbar-left" action="produk" style="padding-top: 2px">
            <div class="form-group has-feedback">
                <input id="input_cari" type="text" placeholder="Cari Produk Disini.." class="form-control input-sm" name="cari_barang" style="width: 500px">
                <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true" style="color: #AAAAAA"></span>
            </div>
            </form>
            <script type="text/javascript">
                $('#input_cari').keypress(function(event){
                    var kata_kunci = $('#input_cari').val()
                    var keycode = (event.keyCode ? event.keyCode : event.which);
                    if(keycode == '13'){
                        document.form_cari.submit()
                    }
                event.stopPropagation();
                });
            </script>

            <!-- Menu kanan -->
            <ul class="nav navbar-nav">

                <!-- Jika pelanggan belum login -->
                <?php if(!isset($_SESSION['pelanggan'])): ?>
                <!-- Tombol daftar
                ======================================================= -->
                <li><a href="daftar">Daftar</a></li>

                <!-- Tombol masuk
                ====================================================== -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Masuk</a>
                    <ul class="dropdown-menu">
                        <form name="form-login" method="POST" action="login" id="form-login">
                            <div class="modal-body" style="width: 300px">
                                <div class="form-group" id="f-username">
                                    <div class="input-group col-xs-12" data-validate="email">
                                        <input type="email" class="form-control" id="username" name="username" placeholder="email" autocomplete="off" required autofocus>
                                        <span class="input-group-addon danger" style="display: none;"></span>
                                    </div>
                                </div>
                                <div class="form-group" id="f-password">
                                    <div class="input-group col-xs-12">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required>
                                        <span class="input-group-addon danger" style="display: none;"></span>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-success btn-block" id="tombollogin" disabled>Masuk</button>
                            </div>
                            <input type="hidden" name="flogin" value="y" />
                        </form>
                    </ul>
                </li>
				
                <!-- Pelanggan sudah login -->
                <?php else: ?>
                <?php
                    $id = $_SESSION['pelanggan'];
                    $sql_pelanggan = $con->query("SELECT * FROM pelanggan WHERE email_plg = '$id' ");
                    $row_pelanggan = $sql_pelanggan->fetch(PDO::FETCH_LAZY);
                    $trow_pelanggan = $sql_pelanggan->rowCount();
                ?>
                <!-- Tombol pesan masuk
                ============================= -->
                <li style="margin-right: 20px">
                    <?php
                        $sql_inboxHeader = $con->query("SELECT a.*, b.* FROM inbox_detail as a, inbox as b WHERE a.kd_inbox=b.kd_inbox AND b.pengirim='$id' AND a.status='N' AND  a.userid!='$id' ORDER BY a.tgl ASC");
                        $row_inboxHeader = $sql_inboxHeader->fetch(PDO::FETCH_LAZY);
                        $trow_inboxHeader = $sql_inboxHeader->rowCount();
                    ?>
                    <a href="inbox" style="padding-bottom: 15px;padding-top: 20px">
                        <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                        <?php if (!empty($trow_inboxHeader)): ?>
                            <span class="label label-warning jml_beli"><?php echo $trow_inboxHeader; ?></span>
                        <?php endif ?>
                    </a>
                </li>

                <!-- Tombol keranjang belanja
                ==================================== -->
                <li style="margin-right: 20px">
                    <?php
                        $kd_faktur = $_SESSION['kd_faktur'];
                        $sql_keranjang = $con->query("SELECT * FROM penjualan WHERE kd_faktur='$kd_faktur' ");
                        $row_keranjang = $sql_keranjang->fetch(PDO::FETCH_LAZY);
                        $trow_keranjang = $sql_keranjang->rowCount();
                    ?>
                    <a href="daftar_pembelian" style="padding-bottom: 15px;padding-top: 20px">
                        <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                        <?php if (!empty($trow_keranjang)): ?>
                            <span class="label label-warning jml_beli"><?php echo $trow_keranjang; ?></span>
                        <?php endif ?>
                    </a>
                </li>

                <!-- Tombol transaksi
                ==================================== -->
                <?php
                    $sql_cariTransaksi = $con->query("SELECT * FROM faktur WHERE userid='$id' AND konfirm!='Belum'");
                    $row_cariTransaksi = $sql_cariTransaksi->fetch(PDO::FETCH_LAZY);
                    $trow_cariTransaksi = $sql_cariTransaksi->rowCount();
                ?>
                <?php if (!empty($trow_cariTransaksi)): ?>
                <li style="margin-right: 20px">
                    <a href="transaksi" style="padding-bottom: 15px;padding-top: 20px">
                        <i class="fa fa-exchange fa-lg" aria-hidden="true"></i>
                    </a>
                </li>
                <?php endif ?>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        <span><?php echo $row_pelanggan['nama_plg'] ?> <i class="caret"></i></span>
                    </a>
                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                    <!-- <li class="dropdown-header text-center">Akun</li> -->
                    <!-- <li>
                        <a href="setting_akun">
                        <i class="fa fa-cog fa-fw pull-right"></i>
                        Setting Akun
                        </a>
                    </li> -->

                    <!-- <li class="divider"></li> -->

                    <li>
                        <a href="<?php echo $logoutAction ?>"><i class="fa fa-ban fa-fw pull-right"></i> Keluar</a>
                    </li>
                </ul>
            </li>

            <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
		</div>
		</div>
		<div class="row"> 
		<p>&nbsp;</p>
		</div>
		</div>