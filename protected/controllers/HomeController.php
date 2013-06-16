<?php
/**
 * User: luckymancvp
 * Date: 6/17/13
 * Time: 2:33 AM
 */

class HomeController extends Controller
{
    public function actionIndex(){
        $this->render('index');
    }
}