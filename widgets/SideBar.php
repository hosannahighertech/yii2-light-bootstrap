<?php 

/**
 *  Creates Sidebar with some Links
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
use yii\base\InvalidParamException;
use hosannahighertech\lbootstrap\MainAsset;
/**
 * This is just an example.
 */
class SideBar extends \yii\base\Widget
{

	/**
   	 * @var array $links  Contains links for the sidebar.
   	 * Attributes includes :
   	 * title: The title to appear on the link
   	 * url: Valid Yii2 URL
   	 * icon: optional, 7 stroke image ignoring pe-7s-. For example pass diamond to mean pe-7s-diamond. see http://themes-pixeden.com/font-demos/7-stroke/
   	*/
	public $links = [];  

	/**
	 * optional sidebar backgroundg image.
	*/
	public $bgImage = false;

	/**
	 * Header for the sidebar
	 * Pass null/false to disable it
	 * Attributes: title for the title and url for respective URL
	*/
	public $header = [];

	/**
 	 * Theme color.
	*/
	public $theme = 'black'; //values available: blue | azure | green | orange | red | purple


	private function packIntoContainer($content)
	{
		$options = [
			'class'=>'sidebar',
			'data-color'=>$this->theme,
		];

		if(!empty($this->bgImage))
			$options['data-image'] = Yii::getAlias($this->bgImage);

		return  Html::tag('div', $content, $options);
	}

	private function buildHeader()
	{
		$header = '';
		if(isset($this->header['title']))
		{
			if(!isset($this->header['url']))
				$header = $header.'<h3>'.$this->header['title'].'</h3>';
			else
			{
				$title = $this->header['title'];
				$url = Url::to($this->header['url']);

				$header = Html::a($title, $url, ['class'=>'simple-text']);
			}

			//pack it into divs
			$header = Html::tag('div', $header, ['class'=>'logo']);
		}

		return $header;
	}

    public function run()
    {
        MainAsset::register($this->getView()); 

        $content = Html::beginTag('div', ['class'=>'sidebar-wrapper']);

        $content.= $this->buildHeader();

        $content = $content.Html::beginTag('ul', ['class'=>'nav']);

        //add links
        foreach ($this->links as $link)
        {
         	if(!isset($link['url']) || !isset($link['title']))
         		throw new InvalidParamException('Parameter url or title is missing');
         	else
         	{
                if(isset($link['visible']) && $link['visible']===false)
                    continue;
                    
         		$icon = isset($link['icon']) ? "<i class='pe-7s-{$link['icon']}'></i>" : '';
         		$url = Html::a("{$icon} <p>{$link['title']}</p>", $link['url'], isset($link['options']) ? $link['options'] : []);

         		$content.= Html::tag('li', $url);
         	}
        } 
        $content.= Html::endTag('ul');
        $content.= Html::endTag('div');
        
        return $this->packIntoContainer($content);
    }
}
