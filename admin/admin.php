<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="/style/common.css"/>
</head>

<body>
<a href="add.php">添加笑话</a>
<!--引入头-->
<?php require '../inc/head.php'?>
<!--显示笑话-->
<?php
	$titleid=isset($_GET['titleid'])?$_GET['titleid']:1;  //获取笑话类别编号
	$sql="select * from contents where title=$titleid order by id desc";
	$rs=mysql_query($sql);
?>
<table>
<tr>
	<th>编号</th><th>内容</th><th>作者</th><th>修改</th><th>删除</th>
</tr>
<?php while($rows=mysql_fetch_assoc($rs)):?>
<tr>
	<td><?php echo $rows['Id']?></td>
    <td><?php echo $rows['Contents']?></td>
    <td><?php echo $rows['Author']?></td>
    <td><input type="button" value="修改" onclick="location.href='update.php?id=<?php echo $rows['Id']?>'" /></td>
    <td><input type="button" value="删除" onclick="if(confirm('确定要删除吗'))location.href='del.php?id=<?php echo $rows['Id']?>&titleid=<?php echo $rows['Title']?>'" /></td>
</tr>
<?php endwhile?>
</table>
</body>
</html>