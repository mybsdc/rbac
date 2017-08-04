<?php
/**
 * 该模型对应llf_user_role表
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/7/28
 * @time 10:47
 */

namespace app\home\model;

use think\Model;
use think\Db;

class UserRole extends Model
{
    // 设置当前模型对应的完整数据表名称 - 实际上无需此步
    protected $table = 'llf_user_role';

    /**
     * 添加或编辑用户与角色对应关系
     * @param int $uid
     * @param array $data
     */
    public function setUserRole($uid, $data = [])
    {
        foreach ($data as $v) { // tp5在一个实例里多次新增数据一定要是下面这种格式才行
            $this->data(['uid' => $uid, 'role_id' => $v, 'create_time' => time()], true)->isUpdate(false)->save();
        }
    }

    /**
     * 获取某用户的所有所属角色信息
     * @param $uid
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getUserRoleList($uid)
    {
        return Db::name('user_role')->where(['uid' => $uid])->field('role_id')->order(['role_id' => 'desc'])->select();
    }

    /**
     * 同上 - 获取某用户的所有所属角色 - 仅一列
     * @param int $uid
     * @return array
     */
    public function getUserAllRole($uid = 0)
    {
        return Db::name('user_role')->where(['uid' => $uid])->field('role_id')->column('role_id');
    }

    /**
     * 删除某用户的某个角色
     * @param int $uid 用户id
     * @param int $role_id 角色id
     * @return int 影响条数
     */
    public function deleteUserRole($uid = 0, $role_id = 0)
    {
        return Db::name('user_role')->where(['uid' => $uid, 'role_id' => $role_id])->delete();
    }
}