<?php

namespace xtakumatutix\rsl;

use pocketmine\plugin\PluginBase;

use pocketmine\block\Block;
use pocketmine\block\VanillaBlocks;
use pocketmine\block\BlockFactory;
use pocketmine\math\Vector3;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;

Class Main extends PluginBase implements Listener
{
    public function onEnable() :void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onPlace(PlayerInteractEvent $event)
    {
        $block = $event->getBlock();
        if ($block->getID() == 123){
            $factory = BlockFactory::getInstance();
            $player = $event->getPlayer();
            $vector = $block->getPosition()->asVector3();
            $world = $player->getPosition()->getWorld();
            $lamp = $factory->get(124,0);
            $world->setBlock($vector, $lamp);
            $player->sendPopup("§bレッドストーンランプをつけたよ！");
        }
    }
}