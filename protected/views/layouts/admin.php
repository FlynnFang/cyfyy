<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap/datepicker/bootstrap-datepicker.css" rel="stylesheet">
    <link href="/css/bootstrap/fileinput/fileinput.css" rel="stylesheet"/>
    <link href="/css/main.css" rel="stylesheet">

    <!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/flaty/bootstrap.v3.0.2.min.css?<?php echo $this->version;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/flaty/flaty-responsive.css?<?php echo $this->version;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/flaty/datepicker.css?<?php echo $this->version;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/flaty/daterangepicker.css?<?php echo $this->version;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/flaty/font-awesome.min.css?<?php echo $this->version;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/flaty/flaty.css?<?php echo $this->version;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery/jquery.fancybox.css?<?php echo $this->version;?>" /> -->

    <!-- <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common/jquery.min.js?<?php echo $this->version;?>"></script>-->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>


    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common/jquery/jquery.cookie.js?<?php echo $this->version;?>" charset="gb2312"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common/jquery/jquery.form.js" charset="gb2312"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common/jquery/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common/jquery/localization/messages_zh.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common/jquery/jQuery.md5.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap/bootstrap.min.js?<?php echo $this->version;?>"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap/datepicker/bootstrap-datepicker.js?<?php echo $this->version;?>"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap/locales/bootstrap-datepicker.zh-CN.min.js?<?php echo $this->version;?>" charset="UTF-8"></script>
    <script type="text/javascript" src="/js/bootstrap/fileinput/fileinput.min.js" ></script>
    <script type="text/javascript" src="/js/bootstrap/fileinput/fileinput_locale_zh.js"></script>
    <script type="text/javascript" src="/js/bootstrap/chart/Chart.js"></script>


</head>
<body>
    <!-- header -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php $this->launch(Yii::app()->name); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">欢迎<?php echo $this->username; ?></a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/">退出</a></li>
          </ul>

        </div>
      </div>
    </nav>
    <!-- \\header -->

    <!-- main -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <!-- 左侧菜单 -->
          <?php include(Yii::app()->basePath."/views/layouts/menu.php");?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php echo $content; ?>
        </div>
      </div>
    </div>

    <!-- footer -->
    <?php //include(Yii::app()->basePath."/views/layouts/footer.php");?>
</body>
</html>
<script type="text/javascript">

</script>
