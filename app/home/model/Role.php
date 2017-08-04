<?php
/**
 * 该模型对应llf_role表
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/7/25
 * @time 18:15
 */

namespace app\home\model;

use think\Model;
use think\Db;

class Role extends Model
{
    /**
     * 添加角色名
     * @param array $data
     * @return int|string 影响条数
     */
    public function addRoleName($data = [])
    {
        return $this->allowField(true)->insert($data);
    }

    /**
     * 获取角色列表
     * @return object
     */
    public function roleList()
    {
        return $this->order(['id' => 'desc'])->select();
    }

    /**
     * 获取某条角色记录
     * @param $id
     * @return array|false|\PDOStatement|string|Model
     */
    public function getRoleInfo($id)
    {
        return Db::name('role')->where(['id' => $id])->find();
    }

    /**
     * 更新某条角色记录
     * @param array $data
     * @return int 影响条数
     */
    public function updateRoleName($data = [])
    {
        return $this->update($data); // 数据中含主键字段，无需where
    }

    /**
     * 获取所有角色列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getAllRole()
    {
        return Db::name('role')->where(['status' => 1])->field('id, name')->order(['id' => 'desc'])->select();
    }
}