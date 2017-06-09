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
            $result = M("Article_type")->where("is_show != 0")->field("id,name")->select();
            $this->assign("Article_type",$result);
            $this->display();
        }else{
            $array[title] = $_POST['name'];
            $array[content] = $_POST['content'];
            $array[cid] = $_POST['cid'];
            $array[is_show] = $_POST['is_show'];
            $array[price] = $_POST['price'];
            $array[create_time] = time();
            $path = $_FILES['path'];
            if(!empty($path[tmp_name])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;//设置附件上传大小
                $upload->exts = array("jpg","png","gif","jpeg");//设置上传附件类型
//                $upload->savePath = './Upload/image/';//设置附件上传目录
                $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
                $upload->savePath  =      ''; // 设置附件上传（子）目录
                $info = $upload->upload();//上传文件
                if(!$info){//上传错误提示错误信息
                    $this->error($upload->getError());
                }else{
                    foreach($info as $file){
                        $array[path] =   $file['savepath'].$file['savename'];
                    }
                }
            }
            $result = M("goods")->add($array);
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
            $result = M("goods")->where("id = $id")->find();
            $type_id=$result[cid];
            $this->assign("type_id",$type_id);
//            $result[cid]=M("article_type")->where("id = '$result[cid]'")->getField("name");
            $this->assign("result",$result);
            $result1 = M("Article_type")->where("is_show != 0")->field("id,name")->select();
            $this->assign("Article_type",$result1);
            $this->assign("action","edit");
            $this->display("add");
        }else{
            $array[title] = $_POST['name'];
            $array[content] = $_POST['content'];
            $array[cid] = $_POST['cid'];
            $array[is_show] = $_POST['is_show'];
            $array[price] = $_POST['price'];
            $array[update_time] = time();
            $path = $_FILES['path'];
            if(!empty($path[tmp_name])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;//设置附件上传大小
                $upload->exts = array("jpg","png","gif","jpeg");//设置上传附件类型
//                $upload->savePath = './Upload/image/';//设置附件上传目录
                $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
                $upload->savePath  =      ''; // 设置附件上传（子）目录
                $info = $upload->upload();//上传文件
                if(!$info){//上传错误提示错误信息
                    $this->error($upload->getError());
                }else{
                    foreach($info as $file){
                        $array[path] =   $file['savepath'].$file['savename'];
                    }
                }
            }
            $result = M("goods")->where("id = $_POST[id]")->save($array);
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