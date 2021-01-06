<?php
include 'logout.php'; 
$sql_halaman = $con->query("SELECT * FROM halaman");
$row_halaman = $sql_halaman->fetch(PDO::FETCH_LAZY);
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><?php echo $nama_perusahaan; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <!-- Menu kiri -->
            <ul class="nav navbar-nav">

                <!-- Tombol produk custom 
                ============================================ 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produk Custom <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php //do{ ?>
                        <li><a href="produk_custom?kategori=<?php //echo str_replace(" ","_",$row_prd_custom['nama_kategori']); ?>"><?php //echo $row_prd_custom['nama_kategori']; ?></a></li>
                        <?php// }while($row_prd_custom = $sql_prd_custom->fetch()); ?>
                    </ul>
                </li>
                 --> 
                <!-- Tombol kategori
                ============================================ -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php do{ ?>
                        <li><a href="produk?kategori=<?php echo str_replace(" ","_",$row_list_kategori['nama_kategori']); ?>"><?php echo $row_list_kategori['nama_kategori']; ?></a></li>
                        <?php }while($row_list_kategori = $sql_list_kategori->fetch()); ?>
                    </ul>
                </li>
				<!--<li><a href="hubungi">Hubungi Kami</a></li>
				<li><a href="rekening">Rekening Pembayaran</a></li>-->
				<?php do{ ?>
                    <li><a href="halaman?kd_halaman=<?php echo $row_halaman['kd_halaman']; ?>"><?php echo $row_halaman['nama_halaman']; ?></a></li>
                    <?php }while($row_halaman = $sql_halaman->fetch()); ?>
			<li><a href="hubungi">Hubungi Kami</a></li>
			<li><a href="rekening">Rekening Kami</a></li>
            </ul>
			
            
        </div>
        <!-- /.navbar-collapse -->
    <!-- /.container -->
</nav>