<?php
/**
 * MyWikis
 * Hardy-Weinberg Calculator
 * @author Jeffrey Wang
 * @license (c) 2015 Jeffrey Wang
*/
?>
<html lang="en">
	<head>
		<title>Hardy-Weinberg Calculator by MyWikis</title>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
<?php
if ( $_REQUEST['submit'] ) {
	// failsafes
	if ( $_REQUEST['q2'] > 1 || $_REQUEST['q2'] < 0 ) {
		echo "<p>ERROR: Frequency must be between 0 and 1. The following information is inaccurate.</p><hr />";
	}
	// do some Hardy-Weinberg math ;)
	$q2 = $_REQUEST['q2'];
	$q = sqrt ( $q2 );
	$p = ( 1 - $q );
	$p2 = pow ( $p, 2 );
	$tpq = ( 2 * $p * $q );
	?>
	<h2>Hardy-Weinberg Calculator</h2>
	<p>by Jeffrey Wang for MyWikis</p>
	<hr />
	<p><b>Note:</b> Unless otherwise listed, the below values are the frequencies of the respective values.</p>
	<hr />
	<p>p (dominant alleles) is <b><?php printf ( "%0.4f" , $p ); ?> / <?php printf ( "%0.2f" , $p * 100 );?>%</b>.</p>
	<p>p&sup2; (homozygous dominant) is <b><?php printf ( "%0.4f" , $p2 ); ?> / <?php printf ( "%0.2f" , $p2 * 100 );?>%</b>.</p>
	<p>q (recessive alleles) is <b><?php printf ( "%0.4f" , $q ); ?> / <?php printf ( "%0.2f" , $q * 100 );?>%</b>.</p>
	<p>q&sup2; (homozygous recessive) is <b><?php printf ( "%0.4f" , $q2 ); ?> / <?php printf ( "%0.2f" , $q2 * 100 );?>%</b>.</p>
	<p>2pq (heterozygous) is <b><?php printf ( "%0.4f" , $tpq ); ?> / <?php printf ( "%0.2f" , $tpq * 100 );?>%</b>.</p>
	<p>Heterozygous and homozygous dominant combined is <b><?php printf ( "%0.4f" , $tpq + $p2 ); ?> / <?php printf ( "%0.2f" , ( $tpq + $p2 ) * 100 );?>%</b>.</p>
	<p>Heterozygous and homozygous recessive combined is <b><?php printf ( "%0.4f" , $tpq + $q2 ); ?> / <?php printf ( "%0.2f" , ( $tpq + $q2 ) * 100 );?>%</b>.</p>
	<?php
} else {
	?>
	<h2>Hardy-Weinberg Calculator</h2>
	<p>by Jeffrey Wang for MyWikis</p>
	<hr />
	<form method="post" action="hardyweinberg.php">
	Homozygous recessive frequency in a population (q&sup2;): <input type="text" name="q2" /><br />
	<input type="hidden" name="submit" value="true" />
	<input type="hidden" name="numberofclasses" value="<?php echo $_REQUEST['numofclasses']; ?>" />
	<button class="btn btn-primary" type="submit">Calculate Hardy-Weinberg</button>
	</form>
	<hr />
	<p>We do not log your data.</p>
	<?php
}
  ?>
		</div>
	</body>
</html>
