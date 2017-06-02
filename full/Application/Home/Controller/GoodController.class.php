<?php
namespace Home\Controller;
use Think\Controller;
class GoodController extends Controller {
    //商品列表
    public function index(){
        $condition = $_GET['condition'];
        $keywords = trim($_GET['keywords']);
        $this->assign("keywords",$keywords);
        $this->assign("condition",$condition);
        $where="is_show = 1";
        if(!empty($keywords)){
            switch($condition){
                case 1:
                    $where .=" and title = '$keywords'";//根据商品名称
                    break;
                case 2:
                    $id = M("Article_type")->where("name = '$keywords'")->field("id")->find();
                    $id=$id['id'];
                    $where .=" and cid = '$id'";//根据商品分类
                    break;
                default:
            }
        }
        $mod = M("Goods");
        $total = $mod->where($where)->count();
//        echo $mod->getLastSql(); die;
        //实例化分页类
        $page = new \Think\Page($total,10);
        $show=$page->show();
        $this->assign("show",$show);
        $result = $mod->where($where)->limit($page->firstRow.",".$page->listRows)->order("id asc")->select();
        foreach($result as $k=>$v){
            $result[$k][cid] = M("article_type")->where("id = '$v[cid]'")->getField("name");
        }
        $this->assign("result",$result);
        $this->display();
    }
    //商品添加
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