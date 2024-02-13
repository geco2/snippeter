<?php
/**
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Andreas Eisenreich <andi@nanuc.de>
 */


if (!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'action.php');
 
class action_plugin_snippeter extends DokuWiki_Action_Plugin {
 
    function register(Doku_Event_Handler $controller){
        $controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'toolbarEventHandler', array ());
    } 

	function toolbarEventHandler(&$event, $param) {
		global $conf;
	
		//find pages based on namespace configuration
		$snins = $this->getConf('namespace');
		$snipath  = $conf['datadir'] . "/" . $snins;
		$snifiles = scandir($snipath);
		
		//Initialize menu array
		$my_menu = array(
			'type'  => 'picker',
			'title' => $this->getLang('choose'),
			'icon'  => '../../plugins/snippeter/images/icon.png',
			'list'  => array(),
			'id' => 'Snippeter'
		);
		
		//create menu entries
		foreach ($snifiles as $file) {
			if ( preg_match('/^\./', $file) ){
				continue;
			}
			$title = explode('.', $file, 2);
			$iconstring = '';
			
			//Search for icon
			$snimediadir = '../../exe/fetch.php?media='.$snins.':';

			$lines = file($snipath.'/'.$file);
			foreach($lines as $line){
				if(strpos($line, "png") !== FALSE){
					$iconstringsafe = $line;
					$iconstring = str_replace(':',':',$line); //FIXME
					$iconstring = explode(":", $iconstring);
					$iconstring = $iconstring[2];
					$iconstring = explode(".", $iconstring);
					$iconstring = $iconstring[0].'.png';
				}
				if ( $iconstring === '' ) {
					$sniicon = '../../plugins/snippeter/images/icon.png';					
				} else {
					$sniicon = $snimediadir.$iconstring;
				}
			}
			
			//Get page content
			$content = file_get_contents($snipath.'/'.$file);
			$content = str_replace($iconstringsafe,'',$content);
			
			//Generate buttons per page
			$my_menu['list'] [] = array(
				'type'  => 'format',
				'title' => $title[0],
				'icon'  => $sniicon,
				'open'  => $content,
				'sample' => ' ',
				'close' => '\n',

			);
			
		}

		// find  way to paste more than a single line
		$event->data[] = $my_menu;
	}
 
}

?>
