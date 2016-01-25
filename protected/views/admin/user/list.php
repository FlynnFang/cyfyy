<!-- page顶部 -->
<?php include(Yii::app()->basePath."/views/layouts/top.php");?>

<a role="button" class="btn btn-primary" style="margin-bottom:10px;" href="<?php echo Yii::app()->request->baseUrl; ?>/admin/user/add">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 新增
</a>

<div class="table-responsive">
  <table class="table  table-striped table-hover ">
    <thead>
      <tr>
        <th>用户名</th>
        <th>所属医院</th>
        <th>角色</th>
        <th>创建日期</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list as $item) {?>
      <tr>
        <th><?php echo $item['username'];?></th>
        <th><?php echo $hospitals[$item['hospital']];?></th>
        <th><?php echo Yii::app()->params['role'][$item['role']];?></th>
        <th><?php echo date('Y-m-d',$item['create_time']);?></th>
        <th>
          <div class="btn-group" role="group" aria-label="...">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/user/edit?op=edit&id=<?php echo $item['id']; ?>" role="button" class="btn btn-primary">编辑</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/user/del?id=<?php echo $item['id']; ?>" role="button" class="btn btn-danger" onclick="return confirm('确定删除此用户吗？');" >删除</a>
          </div>
        </th>
      </tr>
      <?php }?>

    </tbody>
  </table>
  </div>
</div>
