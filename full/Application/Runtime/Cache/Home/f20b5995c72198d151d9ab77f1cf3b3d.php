<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类管理</title>
</head>
<body>
<center>
    <div class="location">当前位置: <a href="/2017-6-1/learngit/full/index.php/Home/Index/index">首页</a> >  <a href="/2017-6-1/learngit/full/index.php/Home/Good/index">商品列表</a>  > <a href="/2017-6-1/learngit/full/index.php/Home/Good/add">商品添加</a>  </div>
    <h2>商品列表</h2>
    <form action="/2017-6-1/learngit/full/index.php/Home/Good/index" method="get" id="theForm" name="theForm">
				<span class="fr"><label>查询条件 :&nbsp;</label><select name="condition" id="condition"  onchange="select_condtion();">
                    <option value="1" <?php if(($condition) == "1"): ?>selected<?php endif; ?>>商品名称</option>
                    <option value="2" <?php if(($condition) == "2"): ?>selected<?php endif; ?>>商品分类</option>
                </select> <label id="tip_words">&nbsp;关键字 :&nbsp;</label><input type="text" class="stxt" name="keywords" id="keywords" value="<?php echo ($keywords); ?>">
        <input type="submit" value="搜索" class="sbtn" ></span>
    </form>
    <table border="0"  cellspacing="0">
        <tr>
            <th >ID</th>
            <th>商品名称</th>
            <th >商品分类</th>
            <th >价格</th>
            <th >路径</th>
            <th>描述</th>
            <th >是否显示</th>
            <th >增加时间</th>
            <th >修改时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["title"]); ?></td>
                <td><?php echo ($vo["cid"]); ?></td>
                <td><?php echo ($vo["price"]); ?></td>
                <td><a href="/Uploads/<?php echo ($vo["path"]); ?>" target="_blank"><?php echo ($vo["path"]); ?></a></td>
                <td><?php echo ($vo["content"]); ?></td>
                <td>
                    <?php if($vo["is_show"] == 1): ?>显示
                        <?php else: ?>不显示<?php endif; ?>
                </td>
                <td>
                    <?php if($vo["create_time"] == 0): ?>---
                        <?php else: echo (date("Y-m-d",$vo["create_time"])); endif; ?>
                </td>
                <td>
                    <?php if($vo["update_time"] == 0): ?>---
                        <?php else: echo (date("Y-m-d",$vo["update_time"])); endif; ?>
                </td>
                <td>
                    <a href="/2017-6-1/learngit/full/index.php/Home/Good/edit/id/<?php echo ($vo["id"]); ?>">编辑</a>
                    <!--<a href="/2017-6-1/learngit/full/index.php/Home/Good/delete/id/<?php echo ($vo["id"]); ?>">删除</a>-->
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div>
    <span class="fr"><?php echo ($show); ?></span>
    </div>
</center>
</body>
</html>