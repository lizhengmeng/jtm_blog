<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 管理员管理
 */
class AdminController extends AdminBaseController{
    // 定义数据表
    private $db;
    private $viewDb;

    // 构造函数 实例化ArticleModel表
    public function __construct(){
        parent::__construct();
        $this->db=D('Admin');
    }

    //管理员列表
    public function index(){
        $data=$this->db->select();
        $this->assign('data',$data);
        $this->display();
    }

    //管理员添加
    public function add(){

        if (IS_POST) {

        }else{
            $this->display();
        }



    }

}
