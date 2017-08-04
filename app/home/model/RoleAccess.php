<?php
/**
 * 该模型对应llf_role_access表
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/7/29
 * @time 23:15
 */

namespace app\home\model;

use think\Model;
use think\Db;

class RoleAccess extends Model
{
    /**
     * 取出某个角色的所有权限信息
     * @param int $role_id
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getRoleAccess($role_id = 0)
    {
        return $this->where(['role_id' => $role_id])->field('id, role_id, access_id')->select();
    }

    /**
     * 获取某个角色的所有权限id - 只返回一列
     * @param array $role_id
     * @return array 去重后的access_id_array
     */
    public function getRoleAllAccess($role_id_array = [])
    {
        $access_id_array = [];
        foreach ($role_id_array as $role_id) {
            $temp = Db::name('role_access')->where(['role_id' => $role_id])->column('access_id');
            $access_id_array = array_merge($access_id_array, $temp);
        }
        return array_unique($access_id_array);
    }

    /**
     * 删除某个角色的多个对应权限
     * @param int $role_id
     * @param array $access_id_array 需要删除的access_id集合
     * @return $i 循环次数
     */
    public function deleteRoleAccess($role_id = 0, $access_id_array = [])
    {
        $i = 0;
        foreach ($access_id_array as $access_id) {
            Db::name('role_access')->where(['role_id' => $role_id, 'access_id' => $access_id])->delete();
            $i ++;
        }
        return $i;
    }

    /**
     * 为某个角色添加多个对应权限
     * @param int $role_id
     * @param array $access_id_array
     * @return $i 循环次数
     */
    public function addRoleAccess($role_id = 0, $access_id_array = [])
    {
        $i = 0;
        foreach ($access_id_array as $access_id) {
            $this->data(['role_id' => $role_id, 'access_id' => $access_id, 'create_time' => time()], true)->isUpdate(false)->save();
            $i ++;
        }
        return $i;
    }
}