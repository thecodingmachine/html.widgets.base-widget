<?php
namespace Mouf\Html\Widgets\BaseWidget\Controllers;

use Mouf\Html\Widgets\BaseWidget\BaseWidgetUtils;

use Mouf\Mvc\Splash\Controllers\Controller;

/**
 * The controller to turn on the widget edition mode.
 *
 * @Component
 */
class BaseWidgetController extends Controller {

	/**
	 * The default template to use for this controller (will be the mouf template)
	 *
	 * @Property
	 * @Compulsory 
	 * @var TemplateInterface
	 */
	public $template;
	
	/**
	 *
	 * @var HtmlBlock
	 */
	public $content;
	
	public $isWidgetEditionMode = false;
	
	/**
	 * Admin page used to enable or disable widget edition.
	 *
	 * @Action
	 * //@Admin
	 */
	public function editMode() {
		if (BaseWidgetUtils::isWidgetEditionEnabled()) {
			$this->isWidgetEditionMode = true;
		}
		$this->content->addFile(dirname(__FILE__)."/../../../../../views/enableDisableEdition.php", $this);
		$this->template->toHtml();
	}

	/**
	 * Action used to set the mode of label edition.
	 *
	 * @Action
	 * //@Admin
	 */
	public function setMode($mode) {
		$editMode = ($mode=="on")?true:false;
		//SessionUtils::setMessageEditionMode($editMode);
		if ($editMode) {
			BaseWidgetUtils::enableWidgetEdition();
			$this->isWidgetEditionMode = true;
		} else {
			BaseWidgetUtils::disableWidgetEdition();
		}

		$this->content->addFile(dirname(__FILE__)."/../../../../../views/enableDisableEdition.php", $this);
		$this->template->toHtml();
	}

}

?>
