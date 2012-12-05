<h1>Widget edition</h1>
<p>When navigating in your application, you can have links automatically added by Mouf to edit your widgets. By enabling 
the widget edition feature, you will be able to edit widgets directly into you web application.</p>
<p>Widget edition is <b><?php echo ($this->isWidgetEditionMode==true)?"enabled":"disabled" ?></b></p>
<p>Change widget edition status:</p>
<form action="setMode" method="post">
	<input type="radio" name="mode" value="on" <?php echo ($this->isWidgetEditionMode==true)?"checked":"" ?>>Enable<br/>
	<input type="radio" name="mode" value="off" <?php echo ($this->isWidgetEditionMode==true)?"":"checked" ?>>Disable<br/>
	<input type="submit" value="Save" />
</form>
