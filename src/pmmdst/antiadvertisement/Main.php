<?php
/*
_          _   _      _       _                _   _                               _   
    / \   _ __ | |_(_)    / \   __| |_   _____ _ __| |_(_)___  ___ _ __ ___   ___ _ __ | |_ 
   / _ \ | '_ \| __| |   / _ \ / _` \ \ / / _ \ '__| __| / __|/ _ \ '_ ` _ \ / _ \ '_ \| __|
  / ___ \| | | | |_| |  / ___ \ (_| |\ V /  __/ |  | |_| \__ \  __/ | | | | |  __/ | | | |_ 
 /_/   \_\_| |_|\__|_| /_/   \_\__,_| \_/ \___|_|   \__|_|___/\___|_| |_| |_|\___|_| |_|\__|
                                                                                             
*/

namespace pmmdst\antiadvertisement;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {
  
  const VERSION = "0.0.1"; //Don't change
  const AUTHOR = "PMMD_ST"; //Don't change
  
  public $prefix = "§e[§6 ANTI-ADS §e]";
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info("
    _          _   _      _       _                _   _                               _   
    / \   _ __ | |_(_)    / \   __| |_   _____ _ __| |_(_)___  ___ _ __ ___   ___ _ __ | |_ 
   / _ \ | '_ \| __| |   / _ \ / _` \ \ / / _ \ '__| __| / __|/ _ \ '_ ` _ \ / _ \ '_ \| __|
  / ___ \| | | | |_| |  / ___ \ (_| |\ V /  __/ |  | |_| \__ \  __/ | | | | |  __/ | | | |_ 
 /_/   \_\_| |_|\__|_| /_/   \_\__,_| \_/ \___|_|   \__|_|___/\___|_| |_| |_|\___|_| |_|\__|
                                                                                            ");
                                                                                            $this->getLogger()->info("Plugin Version: " . self::VERSION);
                                                                                            $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
                                                                        if(!$this->config->exists("words")){
                          $this->config->set("words", "ex1.net, ex2.net");
                          $this->config->save();
                          }
  }
  
  public function onDisable(){
    $this->getLogger()->info("
    _          _   _      _       _                _   _                               _   
    / \   _ __ | |_(_)    / \   __| |_   _____ _ __| |_(_)___  ___ _ __ ___   ___ _ __ | |_ 
   / _ \ | '_ \| __| |   / _ \ / _` \ \ / / _ \ '__| __| / __|/ _ \ '_ ` _ \ / _ \ '_ \| __|
  / ___ \| | | | |_| |  / ___ \ (_| |\ V /  __/ |  | |_| \__ \  __/ | | | | |  __/ | | | |_ 
 /_/   \_\_| |_|\__|_| /_/   \_\__,_| \_/ \___|_|   \__|_|___/\___|_| |_| |_|\___|_| |_|\__|
                                                                                            ");
                                                                                            $this->getLogger()->info("Plugin Author: " . self::AUTHOR);
  }
  
  public function onChat(PlayerChatEvent $event){
    $player = $event->getPlayer();
    $message = $event->getMessage();
    $ex = explode(", ", $this->config->get("words"));
    foreach($ex as $words){
      if($message === $words){
        $event->setCancelled();
        $player->sendMessage($this->prefix . "§c Don't advertise here !");
      }
    }
  }
}
