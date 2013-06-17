<?php
/**
 * User: luckymancvp
 * Date: 6/17/13
 * Time: 2:33 AM
 */

class SetController extends Controller
{
    public function actionIndex(){
        $this->render('index');
    }

    /**
     * Render create set page
     * @author luckymancvp
     * @date 20130616
     */
    public function actionCreate()
    {
        $this->render('create');
    }

    /**
     * Render create set page by type list
     * @author luckymancvp
     * @date 20130616
     */
    public function actionList()
    {
        $this->render('list');
    }
}