<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="" />

    <!-- Bootstrap core CSS -->
   <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
   <link href="/css/signin.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common/jquery/jquery.form.js" charset="gb2312"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common/jquery/jquery.validate.min.js" charset="gb2312"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common/jquery/jQuery.md5.js"></script>
    <!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/login.js"></script>-->
</head>
<body>
<?php echo $content; ?>
</body>
</html>
