<?php
namespace Mouf\Html\Widgets\BaseWidget;
use Mouf\MoufManager;

/**
 * Class to enable or disable the widget edition mode for the application.
 *
 */
class BaseWidgetUtils {
	
	/**
	 * Enables widget edition.
	 * This will add an "edit" link close to all widget that will enable widget edition.
	 *
	 */
	public static function enableWidgetEdition() {
		self::sessionStart();
		$_SESSION["WIDGET_EDITION_MODE"] = true;
	}
	
	/**
	 * Disables widget edition.
	 *
	 */
	public static function disableWidgetEdition() {
		self::sessionStart();
		$moufManager = MoufManager::getMoufManager();
		if ($sessionManager = $moufManager->instanceExists("sessionManager")) {
			$sessionManager->start();
		}
		unset($_SESSION["WIDGET_EDITION_MODE"]);
	}
	
	/**
	 * Returns true if widget edition is enabled.
	 *
	 * @return bool
	 */
	public static function isWidgetEditionEnabled() {
		self::sessionStart();
		if (!isset($_SESSION["WIDGET_EDITION_MODE"]))
			return false;
		else 
			return $_SESSION["WIDGET_EDITION_MODE"];
	}
	
	/**
	 * Returns the parameter to append to the "edit" link in order to be able to go back directly to the page.
	 * The parameter is available only if the request is a "GET" request.
	 *
	 * @return string
	 */
	public static function getBackToParameter() {
		self::sessionStart();
		if ($_SERVER["REQUEST_METHOD"] != "GET") {
			return null;
		} else {
			return '&backto='.urlencode($_SERVER['REQUEST_URI']);
		}
	}
	
	/**
	 * Starts the Session if not starter already using the 'sessionManager' instance
	 */
	private static function sessionStart(){
		$moufManager = MoufManager::getMoufManager();
		if ($sessionManager = $moufManager->instanceExists("sessionManager")) {
			$sessionManager->start();
		}
	}
}
?>