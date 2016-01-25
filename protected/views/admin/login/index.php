
<!-- content -->
<div class="container">
  <h2 class="form-signin-heading text-center"><?php $this->launch(Yii::app()->name); ?></h2>
  <form id="loginform" class="form-signin" method="POST" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/login/login" success="<?php echo Yii::app()->request->baseUrl; ?>/admin/dashboard/" autocomplete="off">

    <label for="username" class="sr-only">用户名</label>
    <input type="text" class="form-control" value="" autocomplete="off" id="username" name="username" tabindex="1" placeholder="用户名" required autofocus/>
    <label for="password" class="sr-only">密  码</label>
    <input type="password" class="form-control"  tabindex="2" id="password" name="password" placeholder="密码" autocomplete="off" required/>

    <label for="captcha" class="sr-only">验证码</label>
    <div class="row" style="margin-bottom:10px;">
      <div class="col-md-4">
        <input type="text" class="form-control" tabindex="3" id="captcha" name="captcha" placeholder="验证码" required/>
      </div>
      <div class="col-md-8" >
        <img id="vcode" style="vertical-align:middle;margin:5px 5px 0 -10px;" src="<?php echo Yii::app()->request->baseUrl; ?>/admin/login/captcha?r=<?php echo rand(1000, 9999); ?>" alt="验证码" />
        <a id="vcodeTip"  href="javascript:void(0)">看不清？换一张</a>
      </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" style="max-width:330px;">登 录</button>

  </form>
</div>
<!-- content end -->

<!-- footer -->
<?php include(Yii::app()->basePath."/views/layouts/footer.php");?>
<!-- footer end -->

<script src="js/bootstrap/bootstrap.min.js"></script>

<script type="text/javascript">
<!--
function refreshCaptcha(dom){

	var rand = parseInt(new Date().valueOf()/1000);
	var src = "<?php echo Yii::app()->request->baseUrl; ?>/admin/login/captcha?r=" + rand;
	$(dom).attr("src", src);
}

$().ready(function(){

	$("#vcode, #vcodeTip").click(function(){
		refreshCaptcha($("#vcode"));
	});

  $('form').on('submit',function(){
    var username = $('#username').val();
    var password = $('#password').val();
    password = $.md5(password);
    var captcha = $('#captcha').val();
    $(this).ajaxSubmit({
      data : {
        'username' : username,
        'password' : password,
        'captcha' : captcha
      },
      success : function(R){

          if (R.errcode === 0) {
              // alert(R.errmsg);
              location.href = $('form').attr('success');
          }else{
            $('#password').val('');
            $('#captcha').val('');
            refreshCaptcha($("#vcode"));//刷新验证码
            alert(R.errmsg);

          }

      }
    });
    return false;
  });

});



//-->
</script>
