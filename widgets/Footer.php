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
class Footer extends  \yii\base\Widget
{
	/**
	 * Text for displaying in the footer
	*/
	public $footer;

	/**
	 * Optional footer links
	 * Array with label; and url
	*/
	public $links = [];


	public function init()
	{
		parent::init();

		if(!isset($this->footer))
			$this->footer = Yii::powered();
	}

	
    public function run()
    {
    	MainAsset::register($this->getView()); 
        $widget = Html::beginTag('footer', ['class'=>'footer']);
        $widget.= Html::beginTag('div', ['class'=>'container-fluid']);
        $widget.= Html::beginTag('nav', ['class'=>'pull-left']);
        //if there be links add them
        if(count($this->links)>0)
        {
            $widget.= Html::beginTag('ul');
            
            foreach($this->links as $link)
            {
                $widget.= Html::beginTag('li');
                $widget.= Html::a($link['label'], $link['url'], isset($link['options']) ? $link['options'] : []);
                $widget.= Html::endTag('li');
            }
            
            $widget.= Html::endTag('ul');
        }
        $widget.= Html::endTag('nav');
        
        $widget.= Html::tag('p', $this->footer, ['class'=>'copyright pull-right']); 
        $widget.= Html::endTag('div');
        $widget.= Html::endTag('footer');
        
        return $widget;
    }
}

