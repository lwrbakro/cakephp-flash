# CakePhp flash plugin

> Use Cake's flash message with Twitter Bootstrap or Alertify



## Install

+ Clone/Copy plugin to your app/Plugin directory
+ Add `CakePlugin::load('Flash')` to your bootstrap.php

## Load FlashComponent
	Class AppController extends Controller {
		public $components = [
			'Flash.Flash'  => [
				'style' => 'AlertifyBootstrap', // Choose "TwitterBootstrap or AlertifyBootstrap"
			],
			];
	}


## Call FlashComponent from your Controller

	$this->Flash->success('Post created'); // Use default Component style (Flash's style setting)
	$this->Flash->twitter_success('Post created'); // Use TwitterBootstrap alert
