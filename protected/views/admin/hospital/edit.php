<!-- page顶部 -->
<?php include(Yii::app()->basePath."/views/layouts/top.php");?>
<form class="form-horizontal" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/hospital/update?op=<?php echo $op;?>" method="post">
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">医院代码</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="code" name="code" placeholder="医院代码"s value="<?php echo $hospital['c_key'];?>" readonly required autofocus>
    </div>
    <div class="col-sm-2" <?php echo $op == 'edit' || $op == 'view' ? 'style="display:none"' : '';?>>
      <button id="create_code" type="button" class="btn btn-default">生成</button>
    </div>
  </div>
  <div class="form-group ">
    <label for="hospital" class="col-sm-2 control-label">医院名称</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="name" placeholder="医院名称"s value="<?php echo $hospital['c_value'];?>" required>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">病历共享权限分配</div>
    <div class="panel-body">
    </div>
    <table class="table  table-striped table-hover ">
      <thead>
        <tr>
          <th>医院名称</th>
          <th>操作权限</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($hospitals as $key => $value) {?>
        <tr>
          <th><?php echo $value;?></th>
          <th>
            <?php foreach (Yii::app()->params['permission'] as $k => $v) { ?>
            <label class="checkbox-inline">
              <input type="checkbox" name="permission_<?php echo $key;?>[]" value="<?php echo $k ?>" <?php echo $shares[$key] && in_array($k, $shares[$key]) ? 'checked' : ''; ?>><?php echo $v; ?>
            </label>
            <?php } ?>
          </th>
        </tr>
        <?php }?>

      </tbody>
    </table>
  </div>


  <input name="id" type="hidden" value="<?php echo $hospital['id']; ?>">
  <button id="submit" type="submit" class="btn btn-default">提交</button>
</form>
<button id="back" class="btn btn-default" onclick="javascript:history.back(-1);">返回</button>

<script type="text/javascript">
  $(document).ready(function(){
    //查看模式
    $('#back').hide();
    var op = '<?php echo $op;?>';
    if (op == 'view') {
      $('input,select').each(function(){
        $(this).attr('disabled','disabled');
      });
      $('#submit').hide();
      $('#back').show();
    }

  });
  $('#create_code').click(function(){
    $.get("/admin/hospital/getCode",function(data,status){
      $('#code').val(data.code);
    },'json');
  });
</script>
