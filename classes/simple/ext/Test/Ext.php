<?php

use Xajax\Response\Response;

class Ext
{
	use \Xajax\Request\FactoryTrait;
	use \Xajax\Response\FactoryTrait;

	public function sayHello($isCaps)
	{
		if ($isCaps)
			$text = 'HELLO WORLD!';
		else
			$text = 'Hello World!';
	
		$this->response->assign('div2', 'innerHTML', $text);
		$this->response->toastr->success("div2 text is now $text, after calling " . $this->request('sayHello', $isCaps));
	
		return $this->response;
	}
	
	public function setColor($sColor)
	{
		$this->response->assign('div2', 'style.color', $sColor);
		$this->response->toastr->success("div2 color is now $sColor");
	
		return $this->response;
	}
	
	public function showDialog()
	{
		$buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
		$width = 300;
		$this->response->bootstrap->modal("Modal Dialog", "This modal dialog is powered by Twitter Bootstrap!!", $buttons, $width);
	
		return $this->response;
	}
}
