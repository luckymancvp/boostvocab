<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define('ERROR_CATEGORY_LOG', 'ERROR_LOG');
define('WARNING_CATEGORY_LOG', 'WARNING_LOG');
class ErrorHandler extends CErrorHandler
{
	
	/**
	 * ユーザに表示されないエラー
	 * @param string $msg
	 * @throws CException
	 */
	public static function raiseError($msg)
	{
		throw new CException($msg);
	}
	/**
	 * ユーザに表示されるエラー
	 * @param type $code
	 * @param type $msg
	 * @throws CHttpException
	 */
	public static function raiseUserError($msg)
	{
		$code = 200;
		throw new CHttpException($code, $msg);
	}
	/**
	 * Handles the exception.
	 * @param Exception $exception the exception captured
	 */
	protected function handleException($exception)
	{
		$app = Yii::app();
		if($app instanceof CWebApplication)
		{
			if(($trace = $this->getExactTrace($exception)) === null)
			{
				$fileName = $exception->getFile();
				$errorLine = $exception->getLine();
			}
			else
			{
				$fileName = $trace['file'];
				$errorLine = $trace['line'];
			}

			$trace = $exception->getTrace();

			foreach($trace as $i => $t)
			{
				if(!isset($t['file']))
					$trace[$i]['file'] = 'unknown';

				if(!isset($t['line']))
					$trace[$i]['line'] = 0;

				if(!isset($t['function']))
					$trace[$i]['function'] = 'unknown';

				unset($trace[$i]['object']);
			}

			$this->_error = $data = array(
			    'code' => ($exception instanceof CHttpException) ? $exception->statusCode : 500,
			    'type' => get_class($exception),
			    'errorCode' => $exception->getCode(),
			    'message' => $exception->getMessage(),
			    'file' => $fileName,
			    'line' => $errorLine,
			    'trace' => $exception->getTraceAsString(),
			    'traces' => $trace,
			);

			if(!headers_sent())
				header("HTTP/1.0 {$data['code']} " . $this->getHttpHeader($data['code'], get_class($exception)));
			//render error page when throw CHttpException !YII_DEBUG
			if($exception instanceof CHttpException && !YII_DEBUG)
			{
				$msg = $this->_error['file'].'_'.$this->_error['line'].'_'.$this->_error['message'];
				Yii::log($msg, CLogger::LEVEL_WARNING, WARNING_CATEGORY_LOG);
				$this->render('error', $data);
			}
			else if(!YII_DEBUG){
				$this->_error['message'] = "何か起こった";
				$this->render('error', $data);
			}
			else
			{
				if($this->isAjaxRequest())
					$app->displayException($exception);
				else
					$this->render('exception', $data);
			}
		}
		//dont show nothing in YII_DEBUG
		else
		{
			$app->displayException($exception);
		}
	}

}
