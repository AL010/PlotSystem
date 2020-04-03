<?php
declare(strict_types=1);
namespace MyPlot;

use pocketmine\block\Sapling;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\BlockSpreadEvent;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\event\entity\EntityMotionEvent;
use pocketmine\event\level\LevelLoadEvent;
use pocketmine\event\level\LevelUnloadEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\ModalFormResponsePacket;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class EventListener implements Listener
{
	/** @var MyPlot $plugin */
	private $plugin;

	/**
	 * EventListener constructor.
	 *
	 * @param MyPlot $plugin
	 */
	public function __construct(MyPlot $plugin) {
		$this->plugin = $plugin;
	}


    public function onPacketReceive(DataPacketReceiveEvent $ev) {
        $pk = $ev->getPacket();
        $player = $ev->getPlayer();
        if ($pk instanceof ModalFormResponsePacket) {
            $id = $pk->formId;
            $data = json_decode($pk->formData);
            if ($id == 35335) {
                if ($data !== NULL) {
                    $plot =$this->plugin->getPlotByPosition($player);
                    switch($data){
                        case 0:
                            $player->sendMessage("§cPlot§8│§a prozess wird abgebrochen!");
                            break;
                        case 1:
                            if($this->plugin->newRandPlot($plot, 1,57,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 2:
                            if($this->plugin->newRandPlot($plot, 1,138,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 3:
                            if($this->plugin->newRandPlot($plot, 1,41,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 4:
                            if($this->plugin->newRandPlot($plot,1,0,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 5:
                        if($this->plugin->newRandPlot($plot,1,122,0)) {
                            $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                        }else{
                            $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                        }
                        break;
                        case 6:
                            if($this->plugin->newRandPlot($plot,1,47,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 7:
                            if($this->plugin->newRandPlot($plot,1,52,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 8:
                            if($this->plugin->newRandPlot($plot,1,120,1)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 9:
                            if($this->plugin->newRandPlot($plot,1,169,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 10:
                            if($this->plugin->newRandPlot($plot,1,89,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 11:
                            if($this->plugin->newRandPlot($plot,1,46,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 12:
                            if($this->plugin->newRandPlot($plot,1,44,3)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 13:
                            if($this->plugin->newRandPlot($plot,1,44,2)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 14:
                            if($this->plugin->newRandPlot($plot,1,158,1)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 15:
                            if($this->plugin->newRandPlot($plot,1,158,2)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 16:
                            if($this->plugin->newRandPlot($plot,1,158,3)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 17:
                            if($this->plugin->newRandPlot($plot,1,44,6)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 18:
                            if($this->plugin->newRandPlot($plot,1,158,5)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 19:
                            if($this->plugin->newRandPlot($plot,1,158,6)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 20:
                            if($this->plugin->newRandPlot($plot,1,173,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 21:
                            if($this->plugin->newRandPlot($plot,1,42,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 22:
                            if($this->plugin->newRandPlot($plot,1,133,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 23:
                            if($this->plugin->newRandPlot($plot,1,22,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                        case 24:
                            if($this->plugin->newRandPlot($plot, 1,44,0)) {
                                $player->sendMessage("§cPlot§8│§a Der Rand deines Grundstück wurde geändert!");
                            }else{
                                $player->sendMessage("§cPlot§8│§a Irgend was ist falsch gelaufen:(");
                            }
                            break;
                    }
                }
            }
        }
    }

	/**
	 * @priority LOWEST
	 *
	 * @param LevelLoadEvent $event
	 */
	public function onLevelLoad(LevelLoadEvent $event) : void {
		if(file_exists($this->plugin->getDataFolder()."worlds".DIRECTORY_SEPARATOR.$event->getLevel()->getFolderName().".yml")) {
			$this->plugin->getLogger()->debug("MyPlot level " . $event->getLevel()->getFolderName() . " loaded!");
			$settings = $event->getLevel()->getProvider()->getGeneratorOptions();
			if(!isset($settings["preset"]) or empty($settings["preset"])) {
				return;
			}
			$settings = json_decode($settings["preset"], true);
			if($settings === false) {
				return;
			}
			$levelName = $event->getLevel()->getFolderName();
			$filePath = $this->plugin->getDataFolder() . "worlds" . DIRECTORY_SEPARATOR . $levelName . ".yml";
			$config = $this->plugin->getConfig();
			$default = ["RestrictEntityMovement" => $config->getNested("DefaultWorld.RestrictEntityMovement", true), "RestrictPVP" => $config->get("DefaultWorld.RestrictPVP", false), "UpdatePlotLiquids" => $config->getNested("DefaultWorld.UpdatePlotLiquids", false), "ClaimPrice" => $config->getNested("DefaultWorld.ClaimPrice", 0), "ClearPrice" => $config->getNested("DefaultWorld.ClearPrice", 0), "DisposePrice" => $config->getNested("DefaultWorld.DisposePrice", 0), "ResetPrice" => $config->getNested("DefaultWorld.ResetPrice", 0)];
			$config = new Config($filePath, Config::YAML, $default);
			foreach(array_keys($default) as $key) {
				$settings[$key] = $config->get($key);
			}
			$this->plugin->addLevelSettings($levelName, new PlotLevelSettings($levelName, $settings));
		}
	}

	/**
	 * @ignoreCancelled false
	 * @priority MONITOR
	 *
	 * @param LevelUnloadEvent $event
	 */
	public function onLevelUnload(LevelUnloadEvent $event) : void {
		if($event->isCancelled()) {
			return;
		}
		$levelName = $event->getLevel()->getFolderName();
		if($this->plugin->unloadLevelSettings($levelName)) {
			$this->plugin->getLogger()->debug("Level " . $event->getLevel()->getFolderName() . " unloaded!");
		}
	}

	/**
	 * @ignoreCancelled false
	 * @priority LOWEST
	 *
	 * @param BlockPlaceEvent $event
	 */
	public function onBlockPlace(BlockPlaceEvent $event) : void {
		$this->onEventOnBlock($event);
	}

	/**
	 * @ignoreCancelled false
	 * @priority LOWEST
	 *
	 * @param BlockBreakEvent $event
	 */
	public function onBlockBreak(BlockBreakEvent $event) : void {
		$this->onEventOnBlock($event);
	}

	/**
	 * @ignoreCancelled false
	 * @priority LOWEST
	 *
	 * @param PlayerInteractEvent $event
	 */
	public function onPlayerInteract(PlayerInteractEvent $event) : void {
		$this->onEventOnBlock($event);
	}

	/**
	 * @ignoreCancelled false
	 * @priority LOWEST
	 *
	 * @param SignChangeEvent $event
	 */
	public function onSignChange(SignChangeEvent $event) : void {
		$this->onEventOnBlock($event);
	}

	/**
	 * @param BlockPlaceEvent|BlockBreakEvent|PlayerInteractEvent|SignChangeEvent $event
	 */
	private function onEventOnBlock($event) : void {
		if($event->isCancelled()) {
			return;
		}
		$levelName = $event->getBlock()->getLevel()->getFolderName();
		if(!$this->plugin->isLevelLoaded($levelName)) {
			return;
		}
		$plot = $this->plugin->getPlotByPosition($event->getBlock());
		if($plot !== null) {
			$username = $event->getPlayer()->getName();
			if($plot->owner == $username or $plot->isHelper($username) or $plot->isHelper("*") or $event->getPlayer()->hasPermission("myplot.admin.build.plot")) {
				if(!($event instanceof PlayerInteractEvent and $event->getBlock() instanceof Sapling))
					return;

				/*
				 * Prevent growing a tree near the edge of a plot
				 * so the leaves won't go outside the plot
				 */
				$block = $event->getBlock();
				$maxLengthLeaves = (($block->getDamage() & 0x07) == Sapling::SPRUCE) ? 3 : 2;
				$beginPos = $this->plugin->getPlotPosition($plot);
				$endPos = clone $beginPos;
				$beginPos->x += $maxLengthLeaves;
				$beginPos->z += $maxLengthLeaves;
				$plotSize = $this->plugin->getLevelSettings($levelName)->plotSize;
				$endPos->x += $plotSize - $maxLengthLeaves;
				$endPos->z += $plotSize - $maxLengthLeaves;
				if($block->x >= $beginPos->x and $block->z >= $beginPos->z and $block->x < $endPos->x and $block->z < $endPos->z) {
					return;
				}
			}
		}elseif($event->getPlayer()->hasPermission("myplot.admin.build.road"))
			return;
		$event->setCancelled();
		$this->plugin->getLogger()->debug("Block placement cancelled");
	}

	/**
	 * @ignoreCancelled false
	 * @priority LOWEST
	 *
	 * @param EntityExplodeEvent $event
	 */
	public function onExplosion(EntityExplodeEvent $event) : void {
		if($event->isCancelled()) {
			return;
		}
		$levelName = $event->getEntity()->getLevel()->getFolderName();
		if(!$this->plugin->isLevelLoaded($levelName))
			return;

		$plot = $this->plugin->getPlotByPosition($event->getPosition());
		if($plot === null) {
			$event->setCancelled();
			return;
		}
		$beginPos = $this->plugin->getPlotPosition($plot);
		$endPos = clone $beginPos;
		$plotSize = $this->plugin->getLevelSettings($levelName)->plotSize;
		$endPos->x += $plotSize;
		$endPos->z += $plotSize;
		$blocks = array_filter($event->getBlockList(), function($block) use ($beginPos, $endPos) {
			if($block->x >= $beginPos->x and $block->z >= $beginPos->z and $block->x < $endPos->x and $block->z < $endPos->z) {
				return true;
			}
			return false;
		});
		$event->setBlockList($blocks);
	}

	/**
	 * @ignoreCancelled false
	 * @priority LOWEST
	 *
	 * @param EntityMotionEvent $event
	 */
	public function onEntityMotion(EntityMotionEvent $event) : void {
		if($event->isCancelled()) {
			return;
		}
		$levelName = $event->getEntity()->getLevel()->getFolderName();
		if(!$this->plugin->isLevelLoaded($levelName))
			return;

		$settings = $this->plugin->getLevelSettings($levelName);
		if($settings->restrictEntityMovement and !($event->getEntity() instanceof Player)) {
			$event->setCancelled();
			$this->plugin->getLogger()->debug("Cancelled entity motion on " . $levelName);
		}
	}

	/**
	 * @ignoreCancelled false
	 * @priority LOWEST
	 *
	 * @param BlockSpreadEvent $event
	 */
	public function onBlockSpread(BlockSpreadEvent $event) : void {
		if($event->isCancelled()) {
			return;
		}
		$levelName = $event->getBlock()->getLevel()->getFolderName();
		if(!$this->plugin->isLevelLoaded($levelName))
			return;

		$settings = $this->plugin->getLevelSettings($levelName);
		if(!$settings->updatePlotLiquids) {
			$event->setCancelled();
			$this->plugin->getLogger()->debug("Cancelled block spread on " . $levelName);
		}
	}

	/**
	 * @ignoreCancelled false
	 * @priority LOWEST
	 *
	 * @param PlayerMoveEvent $event
	 */
	public function onPlayerMove(PlayerMoveEvent $event) : void {
		if($event->isCancelled()) {
			return;
		}
		if(!$this->plugin->getConfig()->get("ShowPlotPopup", true))
			return;
		$levelName = $event->getPlayer()->getLevel()->getFolderName();
		if(!$this->plugin->isLevelLoaded($levelName))
			return;

		$plot = $this->plugin->getPlotByPosition($event->getTo());
		if($plot !== null and $plot !== $this->plugin->getPlotByPosition($event->getFrom())) {
			if($plot->isDenied($event->getPlayer()->getName())) {
				$event->setCancelled();
				return;
			}
			if(strpos((string) $plot, "-0")) {
				return;
			}
			$popup = $this->plugin->getLanguage()->translateString("popup", [TextFormat::DARK_AQUA . $plot]);
			if($plot->owner !== "") {
				$owner = TextFormat::DARK_AQUA . $plot->owner;
				$ownerPopup = $this->plugin->getLanguage()->translateString("popup.owner", [$owner]);
				$paddingSize = (int) floor((strlen($popup) - strlen($ownerPopup)) / 2);
				$paddingPopup = str_repeat(" ", max(0, -$paddingSize));
				$paddingOwnerPopup = str_repeat(" ", max(0, $paddingSize));
				$popup = TextFormat::WHITE . $paddingPopup . $popup . "\n" . TextFormat::WHITE . $paddingOwnerPopup . $ownerPopup;
			}else{
				$ownerPopup = $this->plugin->getLanguage()->translateString("popup.available");
				$paddingSize = (int) floor((strlen($popup) - strlen($ownerPopup)) / 2);
				$paddingPopup = str_repeat(" ", max(0, -$paddingSize));
				$paddingOwnerPopup = str_repeat(" ", max(0, $paddingSize));
				$popup = TextFormat::WHITE . $paddingPopup . $popup . "\n" . TextFormat::WHITE . $paddingOwnerPopup . $ownerPopup;
			}
			$event->getPlayer()->sendTip($popup);
		}
	}

	/**
	 * @ignoreCancelled false
	 * @priority LOWEST
	 *
	 * @param EntityDamageEvent $event
	 */
	public function onEntityDamage(EntityDamageEvent $event) : void {
		if($event->isCancelled()) {
			return;
		}
		if($event instanceof EntityDamageByEntityEvent and $event->getEntity() instanceof Player and $event->getDamager() instanceof Player) {
			$levelName = $event->getEntity()->getLevel()->getFolderName();
			/** @noinspection PhpUndefinedMethodInspection */
			if(!$this->plugin->isLevelLoaded($levelName) or $event->getDamager()->hasPermission("myplot.admin.pvp.bypass")) {
				return;
			}
			$settings = $this->plugin->getLevelSettings($levelName);
			if($settings->restrictPVP) {
				$event->setCancelled();
				/** @noinspection PhpUndefinedMethodInspection */
				$event->getDamager()->sendMessage(TextFormat::RED.$this->plugin->getLanguage()->translateString("pvp.world"));
				$this->plugin->getLogger()->debug("Cancelled pvp event on ".$levelName);
			}
			$plot = $this->plugin->getPlotByPosition($event->getEntity());
			if($plot !== null and !$plot->pvp) {
				$event->setCancelled();
				/** @noinspection PhpUndefinedMethodInspection */
				$event->getDamager()->sendMessage(TextFormat::RED.$this->plugin->getLanguage()->translateString("pvp.plot"));
				$this->plugin->getLogger()->debug("Cancelled pvp event in plot ".$plot->X.";".$plot->Z." on level '".$levelName."'");
			}
		}
	}
}
