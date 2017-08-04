<?php
/**
 * 该模型对应llf_user表
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/7/27
 * @time 7:53
 */

namespace app\home\model;

use think\Model;
use think\Db;

class User extends Model
{
    /**
     * 获取所有有效用户数据
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getAllUser()
    {
        return $this->name('user')->where(['status' => 1])->order(['id' => 'desc'])->select();
    }

    /**
     * 获取某一条用户信息
     * @param $id
     * @return array|false|\PDOStatement|string|Model
     */
    public function getUserInfo($id)
    {
        return Db::name('user')->where(['id' => $id])->find();
    }

    /**
     * 更新某条用户信息记录
     * @param array $data
     * @return int 影响条数
     */
    public function updateUserInfo($data = [])
    {
        return $this->allowField(true)->save($data, ['id' => $data['id']]); // 数据中含主键字段，无需where
    }

    /**
     * 添加用户
     * @param array $data
     * @return int|string|bool 自增id
     */
    public function addUserInfo($data = [])
    {
        $this->allowField(true)->save($data); // 由于只有save方法中支持allowField字段过滤，故这里就不用insert方法了
        if ($this->id) {
            return $this->id;
        } else {
            return false;
        }

    }

    /**
     * 判断邮箱是否存在
     * @param string $email
     * @return int|string
     */
    public function haveEmail($email = '')
    {
        return $this->where(['email' => $email])->count();
    }

    /**
     * 检查用户邮箱密码输入是否正确
     * @param string $email
     * @param string $pwd
     * @return array|false|\PDOStatement|string|Model
     */
    public function checkUser($email = '', $pwd = '')
    {
        return Db::name('user')->where(['email' => $email, 'pwd' => md5($pwd)])->find();
    }
}