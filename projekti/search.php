<?php
require_once ("navi.php");
?>
<!-- LOGIN MODALI TÄSSÄ TOISTAISEKSI -->

<?php
require_once ("modal.php");
?>

<header id="hakustreams">Popular streams in <?php echo $_GET['clipsearch']; ?></header>
<div>
<ul id="tulokset">

</ul>
</div>


<?php
require_once ("clips.php");
?>


<?php
require_once ("footer_search.php");
?>