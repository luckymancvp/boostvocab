<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=jap',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => 'fyfm',
                'charset' => 'utf8',
            ),
            'clientScript'=>array(
                'class'=>'ext.minScript.components.ExtMinScript',
            ),
		),
        'controllerMap'=>array(
            'min'=>array(
                'class'=>'ext.minScript.controllers.ExtMinScriptController',
            ),
        ),
	)
);
