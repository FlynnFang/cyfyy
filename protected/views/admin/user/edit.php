<!-- page顶部 -->
<?php include(Yii::app()->basePath."/views/layouts/top.php");?>
<form class="form-horizontal" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/user/update?op=<?php echo $op;?>" method="post">
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="username" placeholder="用户名" value="<?php echo $user['username'];?>" required autofocus>
    </div>
    <div class="col-sm-2">
      <button id="modify_pwd" type="button" class="btn btn-default">修改密码</button>
    </div>
  </div>
  <div id="pwd_panel">
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">新密码</label>
      <div class="col-sm-2">
        <input type="password" class="form-control" id="password"  placeholder="新密码" value="<?php echo $user['password'];?>" required>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">确认密码</label>
      <div class="col-sm-2">
        <input type="password" class="form-control" id="confirm_password" name="password" placeholder="确认密码" value="<?php echo $user['password'];?>" required>
      </div>
    </div>
  </div>
  <div class="form-group ">
    <label for="hospital" class="col-sm-2 control-label">所属医院</label>
    <div class="col-sm-4">
      <select class="form-control" id="hospital" name="hospital" required>
        <?php foreach ($hospitals as $key => $value) { ?>
        <option value="<?php echo $key;?>" <?php echo $user['hospital']==$key ? 'selected' : "";?>><?php echo $value;?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group ">
    <label for="role" class="col-sm-2 control-label">角色</label>
    <div class="col-sm-2">
      <select class="form-control" id="role" name="role" required>
        <?php foreach (Yii::app()->params['role'] as $key => $value) { ?>
        <option value="<?php echo $key;?>" <?php echo $user['role']==$key ? 'selected' : "";?>><?php echo $value;?></option>
        <?php } ?>
      </select>
    </div>
  </div>

<input name="id" type="hidden" value="<?php echo $user['id']; ?>">

<button id="submit" type="submit" class="col-sm-offset-2 btn btn-default">提交</button>
</form>

<script type="text/javascript">
$(document).ready(function(){
  var op = '<?php echo $op;?>';
  var isEditPwd = false;
  $('#modify_pwd').hide();
  $('#pwd_panel').show();
  if (op == 'edit') {
      $('#modify_pwd').show();
      $('#pwd_panel').hide();
  }

  $('form').on('submit',function(){
    if (op == 'add' || (op == 'edit' && isEditPwd)) {
      var pwd = $('#password').val();
      var confirmPwd = $('#confirm_password').val();
      if (pwd != confirmPwd) {
        alert('两次密码输入不正确');
        $('#password').val('');
        $('#confirm_password').val('');
        return false;
      }
      $('#confirm_password').val($.md5(confirmPwd));
    }

    return true;
  });
  $('#modify_pwd').click(function(){
    isEditPwd = true;
    $('#password').val('');
    $('#confirm_password').val('');
    $('#pwd_panel').show();
  });
});


</script>
