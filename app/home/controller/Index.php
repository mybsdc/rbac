<?php
/**
 * 后台首页
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/7/23
 * @time 19:22
 */

namespace app\home\controller;

use app\home\controller\common\Base;

class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }
}