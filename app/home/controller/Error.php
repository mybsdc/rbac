<?php
/**
 * 错误页面
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/8/1
 * @time 8:37
 */

namespace app\home\controller;

use think\Controller;

class Error extends Controller
{
    /**
     * 403
     * @return mixed
     */
    public function index()
    {
        return $this->fetch('error/index');
    }
}