<?php
/**
 * 该模型对应llf_access表
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/7/29
 * @time 11:35
 */

namespace app\home\model;

use think\Db;
use think\Model;

class Access extends Model
{
    /**
     * 获取所有有效权限列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getAllAccess()
    {
        return $this->where(['status' => 1])->order(['id' => 'desc'])->select();
    }

    /**
     * 根据权限id获取所有权限对应的url地址
     * @param array $accessIdList
     * @return array
     */
    public function getAllAccessLink($accessIdList = [])
    {
        $urlArray = [];
        foreach ($accessIdList as $access_id) {
            $temp = Db::name('access')->where(['status' => 1, 'id' => $access_id])->field('url')->column('url');
            $temp[0] = json_decode($temp[0], true); // 解析json，返回的是一个数组
            $temp[0] = str_replace("\r", '', $temp[0]); // 去除换行符，方便权限对比，"\r"一定用双引号才能正确解析
            $urlArray = array_merge($urlArray, $temp[0]);
        }
        return array_unique($urlArray);
    }

    /**
     * 获取某条权限信息
     * @param int $id
     * @return array|false|\PDOStatement|string|Model
     */
    public function accessInfo($id = 0)
    {
        return $this->where(['status' => 1, 'id' => $id])->field('id, title, url')->find();
    }

    /**
     * 添加权限信息
     * @param array $data
     * @return false|int
     */
    public function addAccess($data = [])
    {
        return $this->allowField(true)->save($data);
    }

    /**
     * 更新某条权限信息
     * @param array $data
     * @return int 影响条数
     */
    public function updateAccess($data = [])
    {
        return $this->update($data); // 包含主键id，直接更新
    }
}