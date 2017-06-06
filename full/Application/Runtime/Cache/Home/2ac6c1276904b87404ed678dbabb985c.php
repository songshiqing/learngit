<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类管理</title>
</head>
<body>
<center>
    <div class="location">当前位置: <a href="/2017-6-1/learngit/full/index.php/Home/Index/index">首页</a> >  <a href="/2017-6-1/learngit/full/index.php/Home/Article/index">分类列表</a>  > <a href="/2017-6-1/learngit/full/index.php/Home/Article/add">添加分类</a>  </div>
    <table border="1"  cellspacing="0">
        <tr>
            <th >ID</th>
            <th>分类名</th>
            <th>描述</th>
            <th >是否显示</th>
            <th >增加时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["info"]); ?></td>
                <!--<td><a href="/Uploads/<?php echo ($vo["path"]); ?>" target="_blank"><?php echo ($vo["path"]); ?></a></td>-->
                <td>
                    <?php if($vo["is_show"] == 1): ?>显示
                        <?php else: ?>不显示<?php endif; ?>
                </td>
                <td>
                    <?php if($vo["create_time"] == 0): ?>---
                        <?php else: echo (date("Y-m-d",$vo["create_time"])); endif; ?>
                </td>
                <td>
                    <a href="/2017-6-1/learngit/full/index.php/Home/Article/edit/id/<?php echo ($vo["id"]); ?>">编辑</a>
                    <!--<a href="/2017-6-1/learngit/full/index.php/Home/Article/delete/id/<?php echo ($vo["id"]); ?>">删除</a>-->
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</center>
</body>
</html>