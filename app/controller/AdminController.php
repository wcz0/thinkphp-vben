<?php
declare (strict_types = 1);

namespace app\controller;

use app\BaseController;
use app\model\Admin;
use app\model\Role;
use stdClass;
use tauthz\facade\Enforcer;
use thans\jwt\facade\JWTAuth;
use think\facade\Validate;
use think\Request;

class AdminController extends BaseController
{
    public function login(Request $request)
    {
        $validate = Validate::rule([
            'username' => 'require',
            'password' => 'require',
        ]);
        if (!$validate->check($request->param())) {
            return $this->fails($validate->getError());
        }
        $admin = Admin::where('username', $request->param('username'))->find();
        if (!$admin) {
            return $this->fails('用户不存在');
        }
        if (!password_verify($request->param('password'), $admin->password)) {
            return $this->fails('密码错误');
        }
        $roles = Enforcer::getRolesForUser($admin->id);
        $roles = Role::where('status', '1')
            ->whereIn('id', $roles)
            ->select(['name', 'value']);
        $result = new stdClass();
        $result->id = $admin->id;
        $result->username = $admin->username;
        $result->name = $admin->name;
        $result->avatar = $admin->avatar;
        $result->email = $admin->email;
        $result->phone = $admin->phone;
        $result->token = JWTAuth::builder(['id' => $admin->id]);
        $result->roles = $roles;
        return $this->success('登录成功', [

        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
