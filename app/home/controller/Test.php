<?php
/**
 * 所有测试页面
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/7/23
 * @time 19:22
 */

namespace app\home\controller;

use app\home\controller\common\Base;

class Test extends Base
{
    public function test1()
    {
        return $this->fetch('page1');
    }

    public function test2()
    {
        return $this->fetch('page2');
    }

    public function test3()
    {
        return $this->fetch('page3');
    }

    public function test4()
    {
        return $this->fetch('page4');
    }
}