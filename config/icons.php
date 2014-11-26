<?php
function getIcon($page){
	$icon = "";
	switch($page){
		case "dashboard":
			$icon = "dashboard";break;
		case "backups":
			$icon = "save";break;
		case "ip_plan":
			$icon = "sitemap";break;
		case "hardware":
			$icon = "cogs";break;
		case "services":
			$icon = "database";break;
		case "office_alarm":
			$icon = "unlock-alt";break;
		default:
			$icon = "circle-o";break;
	}
	return $icon;
}