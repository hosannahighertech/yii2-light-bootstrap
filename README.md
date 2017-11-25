Light Bootstrap Admin Template
==============================
Yii2 Extension for Free Bootstrap Admin Template by Tim Creative. More details at https://www.creative-tim.com/product/light-bootstrap-dashboard

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist hosannahighertech/yii2-light-bootstrap "*"
```

or add

```
"hosannahighertech/yii2-light-bootstrap": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your layout code as you wish. Below is an example that can be copied and pasted into your `views/layouts/main.php` of Yii2 Basic Template.

```php
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrapper">

    <?= \hosannahighertech\lbootstrap\widgets\SideBar::widget([
        'bgImage'=>'@web/img/sidebar-5.jpg', //Don't define it if there is none
        'header'=>[
            'title'=>'Hosanna is Great!',
            'url'=>['/default/index']
        ],
        'links'=>[
            ['title'=>'Some URL', 'url'=>['/controller/action'], 'icon'=>'users']
        ]
    ]) ?>
    
    <div class="main-panel">
		 <?= \hosannahighertech\lbootstrap\widgets\NavBar::widget([
				'theme'=>'red',
				'brand'=>[
					'label'=>'Nasafiri'
				],
				'links'=>[
					['label' => 'Home', 'url' => ['/site/index']],
					['label' => 'About', 'url' => ['/site/about']],
				],
			]) ?>
                
		<div class="content">
			<div class="container-fluid">
				<?= $content ?>
			</div>
		</div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <?= date('Y') ?> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

```

###To-Do-List
1. Convert footer to a widget
2. Convert Panel to Container widget with sidebar, navbar and, content and footer as attributes.
