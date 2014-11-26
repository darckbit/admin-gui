<?php
require '../vendor/autoload.php';
include_once __DIR__.'/../config/includes.php';
$_pages = glob("${dir}/pages/*.php");
$pages = array ();
foreach ($_pages as $_page){
	$shortname = end(explode("/",$_page));
	$_page = explode ( ".", $shortname );
	$page = $_page [1];
	$pages [$shortname] = $page;
	if (isset ( $_GET ['page'] )) {
		if ($_GET ['page'] == $page) {
			$active_page = $page;
		}
	}
}

// for($i =2; $i < count($pages); $i++){
// $page = explode(".",$pages[$i])[1];
// $activeString = "";
// if($active == $page){
// $activeString = ' class="active"';
// }
// $string .= '<li'.$activeString.'><a href="?page='.$page.'">'.ucfirst(str_replace("_"," ",$page)).'</a></li>';
// }
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="libs/uikit/css/uikit.min.css" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="libs/uikit/js/uikit.min.js"></script>
</head>
<body>
	<br>
	<div class="uk-container uk-container-center">
		<nav class="uk-navbar">
			<div class="uk-navbar-brand"><?php echo ucfirst ( $_SERVER['SERVER_NAME'] ) ;?></div>
			<div class="uk-navbar-content uk-navbar-flip">
				<ul class="uk-navbar-nav">
					<li class="uk-parent"><a href="logout.php"><i
							class="uk-icon-power-off"></i> Logout</a></li>
				</ul>
			</div>
		</nav>

		<br>
		<div class="uk-grid">
			<div class="uk-width-1-6">
				<div class="uk-panel uk-panel-box">
					<h3 class="uk-panel-title">Menu</h3>
					<ul class="uk-nav uk-nav-side">
						<?php
						if (isset ( $active_page )) {
							foreach ( $pages as $file => $page ) {
								$icon = getIcon($page);
								if ($active_page == $page) {
									echo "<li class=\"uk-parent uk-active\"><a href=\"?page=${page}\"><i class=\"uk-icon-${icon}\"></i> " . ucfirst ( str_replace ( "_", " ", $page ) ) . "</a></li>";
								} else {
									echo "<li class=\"uk-parent\"><a href=\"?page=${page}\"><i class=\"uk-icon-${icon}\"></i> " . ucfirst ( str_replace ( "_", " ", $page ) ) . "</a></li>";
								}
							}
						} else {
							$first = true;
							foreach ( $pages as $file => $page ) {
								$icon = getIcon($page);
								if ($first) {
									$first = false;
									echo "<li class=\"uk-parent uk-active\"><a href=\"?page=${page}\"><i class=\"uk-icon-${icon}\"></i> " . ucfirst ( str_replace ( "_", " ", $page ) ) . "</a></li>";
								} else {
									echo "<li class=\"uk-parent\"><a href=\"?page=${page}\"><i class=\"uk-icon-${icon}\"></i> " . ucfirst ( str_replace ( "_", " ", $page ) ) . "</a></li>";
								}
							}
						}
						?>
					</ul>
				</div>
			</div>
			<div class="uk-width-5-6">
				<div class="uk-panel uk-panel-box">
					<h3 class="uk-panel-title"><?php echo ucfirst ( str_replace ( "_", " ", $active_page ) );?></h3>
					
					<?php 
					foreach ( $pages as $file => $page ) {
						if($page==$active_page){
							include_once "${dir}/pages/${file}";
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>