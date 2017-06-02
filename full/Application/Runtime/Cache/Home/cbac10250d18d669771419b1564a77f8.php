<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加表单</title>
</head>
<body>
<center>
    <div class="location">当前位置: <a href="/2017-6-1/full/index.php/Home/Index/index">首页</a> >  <a href="/2017-6-1/full/index.php/Home/Article/index">分类列表</a>  > <a href="/2017-6-1/full/index.php/Home/Article/add">添加分类</a>  </div>
    <h2 class="t2"><?php if($action == 'add'): ?>新增<?php else: ?>编辑<?php endif; ?>分类</h2>
    <form enctype="multipart/form-data" action="/2017-6-1/full/index.php/Home/Article/<?php echo ($action); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo ($result["id"]); ?>">
        <table  border="1"  cellspacing="0">
            <tr>
                <td><label for="txtname">名称：</label></td>
                <td><input type="text" id="txtname" name="name"  value="<?php echo ($result["name"]); ?>"/></td>
            </tr>
            <tr>
                <td><label for="txtpswd">描述：</label></td>
                <td><textarea  id="txtpswd" cols="20" rows="5" name="info"  ><?php echo ($result["info"]); ?></textarea></td>
            </tr>
            <tr>
                <td class="title">是否显示：</td>
                <td><label><input type="radio" name="is_show" value="1" <?php if($result["is_show"] == 1): ?>checked="checked"<?php endif; ?> checked="checked">是</label> &nbsp; <label><input type="radio" name="is_show" value="2" <?php if($result["is_show"] == 2): ?>checked="checked"<?php endif; ?>> 否</label></td>
            </tr>
            <tr>
                <td colspan=2>
                    <input type="reset"  value="重置"/>
                    <input type="submit"  value="提交"/>
                </td>
            </tr>
        </table>
    </form>
</center>
<div></div>
</body>
</html>