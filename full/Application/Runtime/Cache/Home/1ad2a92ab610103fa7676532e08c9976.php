<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加表单</title>
</head>
<body>
<center>
    <div class="location">Go位置: <a href="/2017-6-1/learngit/full/index.php/Home/Index/index">首页</a> >  <a href="/2017-6-1/learngit/full/index.php/Home/Good/index">商品列表</a>  > <a href="/2017-6-1/learngit/full/index.php/Home/Good/add">商品添加</a>  </div>
    <h2 class="t2"><?php if($action == 'add'): ?>新增<?php else: ?>编辑<?php endif; ?>商品</h2>
    <form enctype="multipart/form-data" action="/2017-6-1/learngit/full/index.php/Home/Good/<?php echo ($action); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo ($result["id"]); ?>">
        <table  border="0"  cellspacing="0">
            <tr>
                <td><label for="txtname">商品名称：</label></td>
                <td><input type="text" id="txtname" name="name"  value="<?php echo ($result["title"]); ?>"/></td>
            </tr>
            <tr>
                <td><label for="txtname">商品价格：</label></td>
                <td><input type="text"  name="price"  value="<?php echo ($result["price"]); ?>"/></td>
            </tr>
            <tr>
                <td><label>所属分类：</label></td>
                <td>
                    <select name="cid" id="cid">
                        <?php if(is_array($Article_type)): $i = 0; $__LIST__ = $Article_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo["id"] == $type_id): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="title">商品图片：</td>
                <td><input type="file" name="path" id="accessory" value="" >
                    <?php if($action == 'banner_edit'): ?><a href="/Uploads/<?php echo ($result["path"]); ?>" target="_blank"><?php echo ($result["path"]); ?></a><?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><label for="txtpswd">描述：</label></td>
                <td><textarea  id="txtpswd" cols="20" rows="5" name="content"  ><?php echo ($result["content"]); ?></textarea></td>
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