<?php
declare(strict_types=1);
namespace MyPlot\subcommand;

use MyPlot\MyPlot;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginDescription;
use pocketmine\plugin\PluginLoader;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
use pocketmine\network\mcpe\protocol\ModalFormResponsePacket;

class RandSubCommand extends SubCommand
{

    protected $pl;
	/**
	 * @param CommandSender $sender
	 *
	 * @return bool
	 */

    /**
     * @param CommandSender $sender
     *
     * @return bool
     */
    public function canUse(CommandSender $sender): bool
    {
        return ($sender instanceof Player) and $sender->hasPermission("myplot.admin.rand");
    }
	/**
	 * @param Player $sender
	 * @param string[] $args
	 *
	 * @return bool
	 */
	public function execute(CommandSender $sender, array $args) : bool {
		$plot = MyPlot::getInstance()->getPlotByPosition($sender);
		if($plot === null) {
			$sender->sendMessage(TextFormat::RED . $this->translateString("notinplot"));
			return true;
		}
        if($plot->owner !== $sender->getName() and !$sender->hasPermission("myplot.admin.rand")) {
            $sender->sendMessage(TextFormat::RED.$this->translateString("notowner"));
            return true;
        }

        if ($sender->hasPermission("myplot.rand")) {

            $fdata = [];

            $fdata['title'] = '§cCityBuild§8│§c Wähle aus';
            $fdata['buttons'] = [];
            $fdata['content'] = "§7";
            $fdata['type'] = 'form';

            $fdata['buttons'][] = ['text' => '§cZurück'];
            $fdata['buttons'][] = ['text' => '§7Diamant'];
            $fdata['buttons'][] = ['text' => '§7Leuchtfeuer'];
            $fdata['buttons'][] = ['text' => '§7Gold'];
            $fdata['buttons'][] = ['text' => '§7Leer'];
            $fdata['buttons'][] = ['text' => '§7DrachenEi'];
            $fdata['buttons'][] = ['text' => '§7Bücherregal'];
            $fdata['buttons'][] = ['text' => '§7Spawner'];
            $fdata['buttons'][] = ['text' => '§7Enderportalrahmen'];
            $fdata['buttons'][] = ['text' => '§7Seelaterne'];
            $fdata['buttons'][] = ['text' => '§7Glowstone'];
            $fdata['buttons'][] = ['text' => '§7TNT'];
            $fdata['buttons'][] = ['text' => '§7Bruchsteinstufe'];
            $fdata['buttons'][] = ['text' => '§7Eichenholzstufe'];
            $fdata['buttons'][] = ['text' => '§7Fichtenholzstufe'];
            $fdata['buttons'][] = ['text' => '§7Birkenholzstufe'];
            $fdata['buttons'][] = ['text' => '§7Tropenholzstufe'];
            $fdata['buttons'][] = ['text' => '§7Quarzstufe'];
            $fdata['buttons'][] = ['text' => '§7Schwarzeichenholzstufe'];
            $fdata['buttons'][] = ['text' => '§7Ziegelstufe'];
            $fdata['buttons'][] = ['text' => '§7Kohleblock'];
            $fdata['buttons'][] = ['text' => '§7Eisen'];
            $fdata['buttons'][] = ['text' => '§7Smaragd'];
            $fdata['buttons'][] = ['text' => '§7Lapisblock'];
            $fdata['buttons'][] = ['text' => '§7GlatteSteinstufe'];


            $pk = new ModalFormRequestPacket();
            $pk->formId = 35335;
            $pk->formData = json_encode($fdata);

            $sender->sendDataPacket($pk);

            return true;
        }else{
            $sender->sendMessage("Du brauchst einen Rang!");
        }
        return true;
	}
}
