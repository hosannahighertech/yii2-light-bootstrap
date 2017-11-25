<?php 

/**
 *  Creates To Navigation Bar with some Links
 *
 * Copyright (c) 2017 Hosanna Higher Technologies Co. Ltd
 * Dar es Salaam, Tanzania. http://hosannahighertech.co.tz
 * Check Copyright file included with this extension for 
 * Legal details.
*/

namespace hosannahighertech\lbootstrap\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\base\InvalidParamException;
use hosannahighertech\lbootstrap\MainAsset;
/**
 * This is just an example.
 */
class NavBar extends  \yii\base\Widget
{
	/**
	 * Brand the Navbar with two options: label and url
	*/
	public $brand = [];

	/**
	 * The actual navigation links
	 * Array with labe; and url
	*/
	public $links = [];

	/**
	 * Navigation Theme color
	*/
	public $theme; 


	public function init()
	{
		parent::init();

		if(!isset($this->brand['label']))
			$this->brand['label'] = Yii::$app->name;

		if(!isset($this->brand['url']))
			$this->brand['url'] = Yii::$app->homeUrl;

		if(empty($this->theme))
			$this->theme = 'default';
		else
			$this->theme = "ct-{$this->theme}";
	}

	
    public function run()
    {
    	MainAsset::register($this->getView()); 

    	\yii\bootstrap\NavBar::begin([
                'brandLabel' =>$this->brand['label'] ,
                'brandUrl' => $this->brand['url'],
                'options' => [
                    'class' => "navbar navbar-{$this->theme} navbar-fixed",
                ],
                'innerContainerOptions'=>[
                	'tag'=>'div',
                	'class'=>'contrainer-fluid'
                ]
            ]);

    		echo Nav::widget([
    			'options' => ['class' => 'nav navbar-nav navbar-right'],
    			'items' => $this->links
    		]);

    	\yii\bootstrap\NavBar::end();
    }
}
