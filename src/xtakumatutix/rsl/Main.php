<?php

namespace xtakumatutix\rsl;

use pocketmine\block\RedstoneLamp;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

	public function onEnable() :void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onPlace(PlayerInteractEvent $event) {
		$block = $event->getBlock();
		if ($block instanceof RedstoneLamp) {
			$power = $block->isPowered();
			$block->setPowered(!$power);
			$event->getPlayer()->sendPopup("§bレッドストーンランプを" . ($power ? "消したよ！" : "つけたよ！"));
		}
	}
}
