<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类管理</title>
</head>
<body>
    <center>
        <table border="1">
        <tr>
            <th >ID</th>
            <th>分类名</th>
            <th>描述</th>
            <th >是否显示</th>
            <th >增加时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($result1)): $i = 0; $__LIST__ = $result1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["info"]); ?></td>
                <!--<td><a href="/Uploads/<?php echo ($vo["path"]); ?>" target="_blank"><?php echo ($vo["path"]); ?></a></td>-->
                <td>
                    <?php if($vo["is_show"] == 1): ?>显示
                        <?php else: ?>不显示<?php endif; ?>
                </td>
                <td>
                    <?php if($vo["time"] == 0): ?>---
                        <?php else: echo (date("Y-m-d",$vo["time"])); endif; ?>
                </td>
                <td>
                    <a href="/2017-6-1/full/index.php/Home/Index/banner_edit/id/<?php echo ($vo["id"]); ?>">编辑</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </center>
</body>
</html>