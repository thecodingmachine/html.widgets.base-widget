<?php
use Mouf\MoufUtils;
use Mouf\MoufManager;

MoufUtils::registerMainMenu('htmlMainMenu', 'HTML', null, 'mainMenu');
MoufUtils::registerMenuItem('htmlBaseWidgetAdminSubMenu', 'Base Widget', null, 'htmlMainMenu', 55);
MoufUtils::registerMenuItem('htmlBaseWidgetSplashAdminApacheConfig2Item', 'Switch edit mode', 'mouf/baseWidget/editMode', 'htmlBaseWidgetAdminSubMenu', 10);

// Controller declaration
MoufManager::getMoufManager()->declareComponent('baseWidget', '\\Mouf\\Html\Widgets\\BaseWidget\\Controllers\\BaseWidgetController', true);
MoufManager::getMoufManager()->bindComponents('baseWidget', 'template', 'moufTemplate');
?>