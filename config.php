<?php
date_default_timezone_set('Asia/Jakarta');
$title           = "Enditha Frozen Food | ";
$nama_perusahaan = "Enditha Frozen Food";
?>
<script type="text/javascript">
    var txt="<?php echo $title; ?>";
    var speed=150;
    var SULE_SS=null;
    function move() { 
    	document.title=txt;
    	txt=txt.substring(1,txt.length)+txt.charAt(0);
    	fresh=setTimeout("move()",speed);
    }
    move();
</script>