<h1 class="page-header"><?php echo Yii::app()->params['group']['0'];?></h1>
<div class="row placeholders">
  <div class="col-xs-12 col-sm-6 placeholder">
    <canvas id="countChart" ></canvas>
    <h4><?php echo $total; ?></h4>
    <span class="text-muted">病历总数</span>
  </div>
</div>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">我的信息</h3>
  </div>
  <div class="panel-body">
    <p class="text-info">账号名称：<?php echo $userinfo['username'];?></p>
    <p class="text-info">所属医院：<?php echo $hospitals[$userinfo['hospital']];?></p>
    <p class="text-info">角色：<?php echo Yii::app()->params['role'][$userinfo['role']];?></p>
    <p class="text-info">最近一次登录时间：<?php echo date('Y-m-d H:i:s',$userinfo['last_login_time']);?></p>
  </div>
</div>



<script type="text/javascript">
  // var data = [
  //   {
  //       value: <?php echo $total; ?>,
  //       color:"#F7464A",
  //       highlight: "#FF5A5E",
  //       label: "总病历数"
  //   }
  // ];
  var data = <?php echo $data; ?>;
  var options = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke : true,

    //String - The colour of each segment stroke
    segmentStrokeColor : "#fff",

    //Number - The width of each segment stroke
    segmentStrokeWidth : 2,

    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout : 0, // This is 0 for Pie charts

    //Number - Amount of animation steps
    animationSteps : 100,

    //String - Animation easing effect
    animationEasing : "easeOutBounce",

    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate : true,

    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale : false,

    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

  };
  var ctx = $("#countChart").get(0).getContext("2d");
  var mPieChart = new Chart(ctx).Pie(data,options);
</script>
