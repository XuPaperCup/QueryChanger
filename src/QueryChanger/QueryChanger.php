<?php
namespace QueryChanger;
use pocketmine\plugin\PluginBase;
use pocketmine\event\server\QueryRegenerateEvent;
use pocketmine\Player;
use pocketmine\entity\Effect;
use pocketmine\utils\Config;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
	
	private $config;
	
	public function onEnable() {
		@mkdir($this->getDataFolder());
		$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array("players-count" => 93, "max-players-count" => 927329));
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onQueryRegenerate(QueryRegenerateEvent $event) {
		$event->setPlayerCount($this->config->get("players-online"));
		$event->setMaxPlayerCount($this->config->get("max-players"));
	}
}
