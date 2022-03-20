<head>
	<link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<?
	require_once("monitoring.class.php");
	$stats = new Monitoring();
	$config = new Config();
	$result = $stats->getStats();
	$onlinePlayers = count($result);
	
	echo '<div class="name_server">'.$config->nameServer.'</div><div class="monitor_back"><div class="monitor" style="background-position: '.(-167+167*$onlinePlayers/$config->maxPlayers).'px 0;"><p class="status">'.$onlinePlayers.'/'.$config->maxPlayers.'</p></div></div>';
	//-165+165 - Размеры картинки monitor.png и блока div.monitor
	
	if(!$onlinePlayers || $config->hidePlayersOnline == '0') return false;
	else{
		echo '<div class="online"><p class="center"><b>Сейчас онлайн:</b></p><ol>';
		for($i = 0;$i < $onlinePlayers;$i++){
			echo '<li>'.$result[$i]['username'].'</li>';
		}
		echo '</ol></div>';
	}
?>