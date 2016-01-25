<!-- page顶部 -->
<?php include(Yii::app()->basePath."/views/layouts/top.php");?>

<a role="button" class="btn btn-primary" style="margin-bottom:10px;" href="<?php echo Yii::app()->request->baseUrl; ?>/admin/hospital/add">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 新增
</a>

<div class="table-responsive">
  <table class="table  table-striped table-hover ">
    <thead>
      <tr>
        <th>医院代码</th>
        <th>医院名称</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list as $key => $value) {?>
      <tr>
        <th><?php echo $key;?></th>
        <th><?php echo $value;?></th>
        <th>
          <div class="btn-group" role="group" aria-label="...">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/hospital/edit?op=edit&code=<?php echo $key; ?>" role="button" class="btn btn-primary">编辑</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/hospital/edit?op=view&code=<?php echo $key; ?>" role="button" class="btn btn-info">查看</a>
          </div>
        </th>
      </tr>
      <?php }?>

    </tbody>
  </table>
  </div>
</div>
