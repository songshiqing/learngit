<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    //分类列表
    public function index(){
        $result = M("Article_type")->where("is_show != 0")->field("id,name,is_show,info,create_time")->select();
        $this->assign("result",$result);
        $this->display();
    }
    //添加分类
    public function add(){
        if(empty($_POST)){
            $this->assign("action","add");
            $this->display();
        }else{
            $array[name] = $_POST['name'];
            $array[info] = $_POST['info'];
            $array[is_show] = $_POST['is_show'];
            $array[create_time] = time();
            $result = M("article_type")->add($array);
            if($result){
                $this->assign('jumpUrl',"index");
                $this->success("添加成功");
            }else{
                $this->error("添加失败");
            }
        }
    }
    //编辑
    public function edit(){
        $id = $_GET['id'];
        if(empty($_POST)){
            $result = M("article_type")->where("id = $id")->field("id,name,is_show,info")->find();
            $this->assign("result",$result);
            $this->assign("action","edit");
            $this->display("add");
        }else{
            $array[name] = $_POST['name'];
            $array[is_show] = $_POST['is_show'];
            $array[info] = $_POST['info'];
            $array[update_time] = time();
            $result = M("article_type")->where("id = $_POST[id]")->save($array);
            if($result){
                $this->assign('jumpUrl',"index");
                $this->success("编辑成功");
            }else{
                $this->error("编辑失败");
            }
        }
    }
//    //删除
//    public function delete(){
//        $id = $_GET['id'];
//        if(empty($_GET)){
//            $this->display("index");
//        }else{
//            $array[is_show] = 2;
//            $result = M("article_type")->where("id = $id")->save($array);
//            if($result){
//                $this->assign('jumpUrl',"index");
//                $this->success("编辑成功");
//            }else{
//                $this->error("编辑失败");
//            }
//        }
//    }



}