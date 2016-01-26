<!-- page顶部 -->
<?php include(Yii::app()->basePath."/views/layouts/top.php");?>

<!-- <a role="button" class="btn btn-primary" style="margin-bottom:10px;" href="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/add">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 新增
</a> -->

<div class="panel panel-default">
  <div class="panel-body">
    <form class="navbar-form navbar-left" role="search" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/list" method="get">
      <div class="form-group">
        <label for="hospital">建档医院</label>
        <select class="form-control" name='hospital' select>
          <?php foreach ($hospitals as $key=>$value) {?>
            <option value="<?php echo $key; ?>"<?php echo $key == Yii::app()->request->getParam('hospital', '') ? ' selected="selected"':''; ?>><?php echo $value; ?></option>
            <?php }?>
          </select>
        </div>
        <div class="form-group">
          <label for="name">姓名</label>
          <input name="name" type="text" class="form-control" placeholder="姓名" value="<?php echo Yii::app()->request->getParam('name', ''); ?>">
        </div>

        <button type="submit" class="btn btn-default">检索</button>
      </form>
</div>

<div class="table-responsive">
  <table class="table  table-striped table-hover ">
    <thead>
      <tr>
        <th>编号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>联系电话</th>
        <th>建档医院</th>
        <th>建档日期</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list as $item) {?>
      <tr>
        <th><?php echo $item['CODE'];?></th>
        <th><?php echo $item['NAME'];?></th>
        <th><?php echo Yii::app()->params['sex'][$item['SEX']];?></th>
        <th><?php echo $item['TEL1'];?></th>
        <th><?php echo $hospitals[$item['HOSPITAL']];?></th>
        <th><?php echo date('Y-m-d',$item['CREATE_TIME']);?></th>
        <th>
          <div class="btn-group" role="group" aria-label="">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/edit?op=edit&code=<?php echo $item['CODE']; ?>" role="button" class="btn btn-primary" <?php echo $this->role == 0 || ( $shareSet[$item['HOSPITAL']] && in_array(1,$shareSet[$item['HOSPITAL']])) ? '' : 'style="display:none;"';?>>编辑</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/del?code=<?php echo $item['CODE']; ?>" role="button" class="btn btn-danger" onclick="return confirm('确定删除此病历吗？');" <?php echo $this->role == 0 || ( $shareSet[$item['HOSPITAL']] && in_array(2,$shareSet[$item['HOSPITAL']])) ? '' : 'style="display:none;"';?>>删除</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/edit?op=view&code=<?php echo $item['CODE']; ?>" role="button" class="btn btn-info" <?php echo $this->role == 0 || ( $shareSet[$item['HOSPITAL']] && in_array(0,$shareSet[$item['HOSPITAL']])) ? '' : 'style="display:none;"';?>>查看</a>
          </div>
        </th>
      </tr>
      <?php }?>

    </tbody>
  </table><article class="">

  </article>
  </div>
</div>
  <nav>
    <?php $this->widget('BootLinkPager',array('pages' => $pages));?>
  </nav>
