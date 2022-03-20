<?
require_once("config.class.php");
class Monitoring{
	private $config;
	private $onlinePlayers;
	
	public function __construct(){
		$this->config = new Config();
		$this->mysqli = new mysqli($this->config->host, $this->config->user,$this->config->password,$this->config->db);
		$this->mysqli->query("SET NAMES 'utf8'");
	}
	public function getStats(){
		$result = $this->mysqli->query("SELECT username FROM authme WHERE isLOgged='1'");	//Запрос к БД
		$i = 0;
		while($row = $result->fetch_assoc()){
			$data[$i] = $row;
			$i++;
		}
		return $data;
	}
}
?>