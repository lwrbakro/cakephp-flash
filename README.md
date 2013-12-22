CakePhp flash plugin

=============


## Install

1) Clone/Copy plugin to your app/Plugin directory
2) Add CakePlugin::load('Flash') to your bootstrap.php

## Load

1) Load FlashComponent:
	Class AppController extends Controller {
		public $components = [
			'Flash.Flash'  => [
				'style' => 'AlertifyBootstrap', // Choose "TwitterBootstrap or AlertifyBootstrap"
				],
		];

## Use
1) Call FlashComponent from your Controller:
	$this->Flash->success('Post created'); // Use default Component style (Flash's style setting)
	$this->Flash->twitter_success('Post created'); // Use TwitterBootstrap alert
