<!-- page顶部 -->
<?php include(Yii::app()->basePath."/views/layouts/top.php");?>
<form id="patientForm" class="form-horizontal" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/update?op=<?php echo $op;?>" method="post">
  <ul class="nav nav-tabs" role="tablist" id="main-tablist">
      <li role="presentation" class="active"><a href="#patient" aria-controls="patient" role="tab" data-toggle="tab">基本信息</a></li>
      <li role="presentation"><a href="#jwbs" aria-controls="jwbs" role="tab" data-toggle="tab">既往病史</a></li>
      <li role="presentation"><a href="#yws" aria-controls="yws" role="tab" data-toggle="tab">药物史</a></li>
      <li role="presentation"><a href="#sysjc" aria-controls="sysqk" role="tab" data-toggle="tab">实验室检查</a></li>
      <li role="presentation"><a href="#zyqk" aria-controls="zyqk" role="tab" data-toggle="tab">住院情况</a></li>
      <li role="presentation"><a href="#dbz" aria-controls="dbz" role="tab" data-toggle="tab">单病种</a></li>
      <li role="presentation"><a href="#sfzdsj" aria-controls="zdsfsj" role="tab" data-toggle="tab">随访终点事件</a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="patient">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="panel-group" id="jcxx" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#jcxx" href="#jcxx-gjxx" aria-expanded="true" aria-controls="jcxx-gjxx">
                      关键信息
                    </a>
                  </h4>
                </div>
                <div id="jcxx-gjxx" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">姓名</label>
                      <div class="col-sm-2" >
                        <input type="text" class="form-control" id="name" name="name" placeholder="姓名" value="<?php echo $patient['name'];?>" required autofocus>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ZJLX" class="col-sm-2 control-label">证件类型</label>
                      <div class="col-sm-2">
                        <select class="form-control" id="ZJLX" name="ZJLX" required>
                          <?php foreach ($ZJLX as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $patient['ZJLX']==$key ? 'selected' : "";?>><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ZJHM" class="col-sm-2 control-label">证件号码</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="ZJHM" name="ZJHM" placeholder="证件号码" value="<?php echo $patient['ZJHM'];?>" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ZYH" class="col-sm-2 control-label">住院号</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="ZYH" name="ZYH" placeholder="住院号" value="<?php echo $patient['ZYH'];?>" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="RYSJ" class="col-sm-2 control-label">入院时间</label>
                      <div class="col-sm-3">
                        <div class="input-group date">
                          <input class="form-control" type="text"  name="RYSJ" id="RYSJ" value="<?php echo $patient['RYSJ'] ? date('Y-m-d',$patient['RYSJ']) :'';?>" required >
                          <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="CYSJ" class="col-sm-2 control-label">出院时间</label>
                      <div class="col-sm-3">
                        <div class="input-group date">
                          <input class="form-control" type="text"  name="CYSJ" id="CYSJ" value="<?php echo $patient['CYSJ'] ? date('Y-m-d',$patient['CYSJ']) :'';?>" required >
                          <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="jcxx-rkxtz-heading">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#jcxx" href="#jcxx-rkxtz" aria-expanded="false" aria-controls="jcxx-rkxtz">
                      人口学特征
                    </a>
                  </h4>
                </div>
                <div id="jcxx-rkxtz" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jcxx-rkxtz-heading">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="SEX" class="col-sm-2 control-label">性别</label>
                      <div class="col-sm-2">
                        <?php foreach (Yii::app()->params['sex'] as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="SEX" id="SEX" value="<?php echo $key;?>" <?php echo $patient['SEX'] == $key || (!$patient['SEX'] && $key=='1') ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="AGE" class="col-sm-2 control-label">年龄</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                          <input type="number" class="form-control" id="AGE" name="AGE" placeholder="年龄" aria-describedby="basic-addon-height" value="<?php echo $patient['AGE'];?>">
                          <span class="input-group-addon" id="basic-addon-height">cm</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="HEIGHT" class="col-sm-2 control-label">身高</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                          <input type="number" class="form-control" id="HEIGHT" name="HEIGHT" placeholder="身高" aria-describedby="basic-addon-height" value="<?php echo $patient['HEIGHT'];?>">
                          <span class="input-group-addon" id="basic-addon-height">cm</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="WEIGHT" class="col-sm-2 control-label">体重</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                          <input type="number" class="form-control" id="WEIGHT" name="WEIGHT" placeholder="体重" aria-describedby="basic-addon-weight" value="<?php echo $patient['WEIGHT'];?>">
                          <span class="input-group-addon" id="basic-addon-weight">kg</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="BMI" class="col-sm-2 control-label">BMI</label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" id="BMI" name="BMI" placeholder="BMI" value="<?php echo $patient['BMI'];?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="jcxx-shxtz-heading">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#jcxx" href="#jcxx-shxtz" aria-expanded="false" aria-controls="jcxx-shxtz">
                      社会学特征
                    </a>
                  </h4>
                </div>
                <div id="jcxx-shxtz" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jcxx-shxtz-heading">
                  <div class="panel-body">
                    <div class="form-group ">
                      <label for="TEL1" class="col-sm-2 control-label">联系电话1</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="TEL1" name="TEL1" placeholder="联系电话1" value="<?php echo $patient['TEL1'];?>" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="TEL2" class="col-sm-2 control-label">联系电话2</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="TEL2" name="TEL2" placeholder="联系电话2" value="<?php echo $patient['TEL2'];?>" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="HOME_ADDR" class="col-sm-2 control-label">家庭地址</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="HOME_ADDR" name="HOME_ADDR" placeholder="家庭地址" value="<?php echo $patient['HOME_ADDR'];?>" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="COMPANY_ADDR" class="col-sm-2 control-label">工作单位</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="COMPANY_ADDR" name="COMPANY_ADDR" placeholder="工作单位" value="<?php echo $patient['COMPANY_ADDR'];?>" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="XL" class="col-sm-2 control-label">学历</label>
                      <div class="col-sm-2">
                        <select class="form-control" id="XL" name="XL" required>
                          <?php foreach ($XL as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $patient['XL']==$key ? 'selected' : "";?>><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="jwbs">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="panel-group" id="jwbs-collapse" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="jwbs-collapse-wxys-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#jwbs-collapse" href="#jwbs-collapse-wxys" aria-expanded="true" aria-controls="jwbs-collapse-wxys">
                      危险因素/生活习惯
                    </a>
                  </h4>
                </div>
                <div id="jwbs-collapse-wxys" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="jwbs-collapse-wxys-heading">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="XYS_OPTION" class="col-sm-2 control-label">吸烟史</label>
                      <div class="col-sm-2">
                        <select class="form-control" id="XYS_OPTION" name="XYS_OPTION">
                          <?php foreach ($XYS as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $diagnostic['XYS_OPTION'] == $key ? 'selected' : '';?> ><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="XYS_N" class="col-sm-2 control-label">吸烟时长</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XYS_N" name="XYS_N" placeholder="吸烟多少年" value="<?php echo $patient['XYS_N'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="XYS_ZT" class="col-sm-2 control-label">吸烟量</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XYS_ZT" name="XYS_ZT" placeholder="吸烟量" value="<?php echo $patient['XYS_ZT'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="YJS_OPTION" class="col-sm-2 control-label">饮酒史</label>
                      <div class="col-sm-2">
                        <select class="form-control" id="YJS_OPTION" name="YJS_OPTION">
                          <?php foreach ($YJS as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $diagnostic['YJS_OPTION'] == $key ? 'selected' : '';?> ><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="YJS_N" class="col-sm-2 control-label">饮酒时长</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="YJS_N" name="YJS_N" placeholder="饮酒多少年" value="<?php echo $patient['YJS_N'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="YJS_PT" class="col-sm-2 control-label">饮酒量</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="YJS_PT" name="YJS_PT" placeholder="饮酒量" value="<?php echo $patient['YJS_PT'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="YJSFDH_OPTION" class="col-sm-2 control-label">夜间是否打鼾</label>
                      <div class="col-sm-2">
                        <select class="form-control" id="YJSFDH_OPTION" name="YJSFDH_OPTION">
                          <?php foreach ($notquite as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $diagnostic['YJSFDH_OPTION'] == $key ? 'selected' : '';?> ><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="jwbs-collapse-jwbs-heading">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#jwbs-collapse" href="#jwbs-collapse-jwbs" aria-expanded="false" aria-controls="jwbs-collapse-jwbs">
                      既往病史
                    </a>
                  </h4>
                </div>
                <div id="jwbs-collapse-jwbs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jwbs-collapse-jwbs-heading">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="GXY_OPTION" class="col-sm-2 control-label">高血压</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="GXY_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['GXY_OPTION'] == $key) || (!$diagnostic['GXY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="GXY_HBNS" class="col-sm-2 control-label">患病年数</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="GXY_HBNS" name="GXY_HBNS" placeholder="患病年数" value="<?php echo $patient['GXY_HBNS'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="GXY_ZL_OPTION" class="col-sm-2 control-label">治疗</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="GXY_ZL_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['GXY_ZL_OPTION'] == $key) || (!$diagnostic['GXY_ZL_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="GXY_ZLYW" class="col-sm-2 control-label">治疗药物</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="GXY_ZLYW" name="GXY_ZLYW" placeholder="治疗药物" value="<?php echo $patient['GXY_ZLYW'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="TLB_OPTION" class="col-sm-2 control-label">糖尿病</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="TLB_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['TLB_OPTION'] == $key) || (!$diagnostic['TLB_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="TLB_HBNS" class="col-sm-2 control-label">患病年数</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="TLB_HBNS" name="TLB_HBNS" placeholder="患病年数" value="<?php echo $patient['TLB_HBNS'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="TLB_ZL_OPTION" class="col-sm-2 control-label">治疗</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="TLB_ZL_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['TLB_ZL_OPTION'] == $key) || (!$diagnostic['TLB_ZL_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="TLB_ZLYW" class="col-sm-2 control-label">治疗药物</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="TLB_ZLYW" name="TLB_ZLYW" placeholder="治疗药物" value="<?php echo $patient['TLB_ZLYW'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ZDXWL_OPTION" class="col-sm-2 control-label">脂代谢紊乱</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ZDXWL_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['ZDXWL_OPTION'] == $key) || (!$diagnostic['ZDXWL_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ZDXWL_LX" class="col-sm-2 control-label">紊乱类型</label>
                      <div class="col-sm-2">
                        <select class="form-control" id="ZDXWL_LX" name="ZDXWL_LX">
                          <?php foreach ($WLLX as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $diagnostic['ZDXWL_LX'] == $key ? 'selected' : '';?> ><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ZDXWL_HBN" class="col-sm-2 control-label">患病年数</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="ZDXWL_HBN" name="ZDXWL_HBN" placeholder="患病年数" value="<?php echo $patient['ZDXWL_HBN'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ZDXWL_ZL_OPTION" class="col-sm-2 control-label">治疗</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ZDXWL_ZL_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['ZDXWL_ZL_OPTION'] == $key) || (!$diagnostic['ZDXWL_ZL_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ZDXWL_YW" class="col-sm-2 control-label">治疗药物</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="ZDXWL_YW" name="ZDXWL_YW" placeholder="治疗药物" value="<?php echo $patient['ZDXWL_YW'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="FC_OPTION" class="col-sm-2 control-label">房颤</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="FC_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['FC_OPTION'] == $key) || (!$diagnostic['FC_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="FC_HBN" class="col-sm-2 control-label">患病年数</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="FC_HBN" name="FC_HBN" placeholder="患病年数" value="<?php echo $patient['FC_HBN'];?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="FC_ZL_OPTION" class="col-sm-2 control-label">治疗</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="FC_ZL_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['FC_ZL_OPTION'] == $key) || (!$diagnostic['FC_ZL_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="FC_YW" class="col-sm-2 control-label">治疗药物</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="FC_YW" name="FC_YW" placeholder="治疗药物" value="<?php echo $patient['FC_YW'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="DZXNQXFZ_OPTION" class="col-sm-2 control-label">短暂性脑缺血发作</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="DZXNQXFZ_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['DZXNQXFZ_OPTION'] == $key) || (!$diagnostic['DZXNQXFZ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ZZ_OPTION" class="col-sm-2 control-label">卒中</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ZZ_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['ZZ_OPTION'] == $key) || (!$diagnostic['ZZ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ZZ_LX" class="col-sm-2 control-label">类型</label>
                      <div class="col-sm-2">
                        <select class="form-control" id="ZZ_LX" name="ZZ_LX">
                          <?php foreach ($ZZLX as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $diagnostic['ZZ_LX'] == $key ? 'selected' : '';?> ><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="WZXGB_OPTION" class="col-sm-2 control-label">外周血管病</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="WZXGB_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['WZXGB_OPTION'] == $key) || (!$diagnostic['WZXGB_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XJGS_OPTION" class="col-sm-2 control-label">心肌梗死</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XJGS_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['XJGS_OPTION'] == $key) || (!$diagnostic['XJGS_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="MXSGNBQ_OPTION" class="col-sm-2 control-label">慢性肾功能不全</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="MXSGNBQ_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['MXSGNBQ_OPTION'] == $key) || (!$diagnostic['MXSGNBQ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="MXZSXFBJB_OPTION" class="col-sm-2 control-label">慢性阻塞性肺部疾病</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="MXZSXFBJB_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['MXZSXFBJB_OPTION'] == $key) || (!$diagnostic['MXZSXFBJB_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XHDCX_OPTION" class="col-sm-2 control-label">消化道出血</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XHDCX_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['XHDCX_OPTION'] == $key) || (!$diagnostic['XHDCX_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XLSJ_OPTION" class="col-sm-2 control-label">心力衰竭</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XLSJ_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['XLSJ_OPTION'] == $key) || (!$diagnostic['XLSJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="JWGMJRZL_OPTION" class="col-sm-2 control-label">既往冠脉介入治疗</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="JWGMJRZL_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['JWGMJRZL_OPTION'] == $key) || (!$diagnostic['JWGMJRZL_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="JWGMJRZL_BW" class="col-sm-2 control-label">部位</label>
                      <div class="col-sm-2">
                        <select class="form-control" id="JWGMJRZL_BW" name="JWGMJRZL_BW">
                          <?php foreach ($GMBW as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $diagnostic['JWGMJRZL_BW'] == $key ? 'selected' : '';?> ><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="JWGMDQZL_OPTION" class="col-sm-2 control-label">既往冠脉搭桥治疗</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="JWGMDQZL_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['JWGMDQZL_OPTION'] == $key) || (!$diagnostic['JWGMDQZL_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div role="tabpanel" class="tab-pane" id="yws">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="panel-group" id="yws-tablist" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="yws-aspl-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#yws-tablist" href="#yws-aspl" aria-expanded="true" aria-controls="yws-aspl">
                      阿司匹林
                    </a>
                  </h4>
                </div>
                <div id="yws-aspl" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="yws-aspl-heading">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="ASPL_JWFY_OPTION" class="col-sm-2 control-label">既往服用</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ASPL_JWFY_OPTION" value="<?php echo $key;?>" <?php echo ($patient['ASPL_JWFY_OPTION'] == $key) || (!$patient['ASPL_JWFY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ASPL_ZYQJ_OPTION" class="col-sm-2 control-label">住院期间</label>
                      <div class="col-sm-4">
                        <?php foreach ($stop as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ASPL_ZYQJ_OPTION" value="<?php echo $key;?>" <?php echo ($patient['ASPL_ZYQJ_OPTION'] == $key) || (!$patient['ASPL_ZYQJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ASPL_ZYQJ_WCL" class="col-sm-2 control-label">维持量  </label>
                      <div class="col-sm-4">
                        <div class="input-group">
                        <input type="number" class="form-control" id="ASPL_ZYQJ_WCL" name="ASPL_ZYQJ_WCL" placeholder="维持量" aria-describedby="basic-addon-ASPL_ZYQJ_WCL" value="<?php echo $patient['ASPL_ZYQJ_WCL'];?>" required>
                        <span class="input-group-addon" id="basic-addon-ASPL_ZYQJ_WCL">mg/d</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ASPL_ZYQJ_WYHTYYY" class="col-sm-2 control-label">未用或停药原因（多选）</label>
                      <div class="col-sm-10">
                        <?php foreach ($TYYY as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="ASPL_ZYQJ_WYHTYYY[]" value="<?php echo $key; ?>" <?php echo $diagnostic['ASPL_ZYQJ_WYHTYYY'] && in_array($key,$diagnostic['ASPL_ZYQJ_WYHTYYY']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ASPL_ZYQJ_HYTY_FY" class="col-sm-2 control-label">服药</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                        <input type="number" class="form-control" id="ASPL_ZYQJ_HYTY_FY" name="ASPL_ZYQJ_HYTY_FY" placeholder="服药" value="<?php echo $patient['ASPL_ZYQJ_HYTY_FY'];?>" required>
                        <span class="input-group-addon" >天</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ASPL_ZYQJ_HYTY_YY" class="col-sm-2 control-label">未用或停药原因（多选）</label>
                      <div class="col-sm-10">
                        <?php foreach ($TYYY as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="ASPL_ZYQJ_HYTY_YY[]" value="<?php echo $key; ?>" <?php echo $diagnostic['ASPL_ZYQJ_HYTY_YY'] && in_array($key,$diagnostic['ASPL_ZYQJ_HYTY_YY']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="yws-lbgl-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#yws-tablist" href="#yws-lbgl" aria-expanded="true" aria-controls="yws-lbgl">
                      氯吡格雷
                    </a>
                  </h4>
                </div>
                <div id="yws-lbgl" class="panel-collapse collapse" role="tabpanel" aria-labelledby="yws-lbgl-heading">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="LBGL_JWFY_OPTION" class="col-sm-2 control-label">既往服用</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="LBGL_JWFY_OPTION" value="<?php echo $key;?>" <?php echo ($patient['LBGL_JWFY_OPTION'] == $key) || (!$patient['LBGL_JWFY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="LBGL_ZYQJ_OPTION" class="col-sm-2 control-label">住院期间</label>
                      <div class="col-sm-2">
                        <?php foreach ($stop as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="LBGL_ZYQJ_OPTION" value="<?php echo $key;?>" <?php echo ($patient['LBGL_ZYQJ_OPTION'] == $key) || (!$patient['LBGL_ZYQJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="LBGL_ZYQJ_WCL" class="col-sm-2 control-label">维持量</label>
                      <div class="col-sm-4">
                        <div class="input-group">
                        <input type="number" class="form-control" id="LBGL_ZYQJ_WCL" name="LBGL_ZYQJ_WCL" placeholder="维持量" value="<?php echo $patient['LBGL_ZYQJ_WCL'];?>" required>
                        <span class="input-group-addon">mg/d</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="LBGL_ZYQJ_WYHTYYY" class="col-sm-2 control-label">未用或停药原因（多选）</label>
                      <div class="col-sm-10">
                        <?php foreach ($TYYY as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="LBGL_ZYQJ_WYHTYYY[]" value="<?php echo $key; ?>" <?php echo $diagnostic['LBGL_ZYQJ_WYHTYYY'] && in_array($key,$diagnostic['LBGL_ZYQJ_WYHTYYY']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="LBGL_ZYQJ_HYTY_FY" class="col-sm-2 control-label">服药</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                        <input type="number" class="form-control" id="LBGL_ZYQJ_HYTY_FY" name="LBGL_ZYQJ_HYTY_FY" placeholder="服药" value="<?php echo $patient['LBGL_ZYQJ_HYTY_FY'];?>" required>
                        <span class="input-group-addon">天</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="LBGL_ZYQJ_HYTY_YY" class="col-sm-2 control-label">未用或停药原因（多选）</label>
                      <div class="col-sm-10">
                        <?php foreach ($TYYY as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="LBGL_ZYQJ_HYTY_YY[]" value="<?php echo $key; ?>" <?php echo $diagnostic['LBGL_ZYQJ_HYTY_YY'] && in_array($key,$diagnostic['LBGL_ZYQJ_HYTY_YY']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="yws-zsyknyw-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#yws-tablist" href="#yws-zsyknyw" aria-expanded="false" aria-controls="yws-zsyknyw">
                      注射用抗凝药物
                    </a>
                  </h4>
                </div>
                <div id="yws-zsyknyw" class="panel-collapse collapse" role="tabpanel" aria-labelledby="yws-zsyknyw-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="ZSYKNYW_OPTION" class="col-sm-2 control-label">注射用抗凝药物</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ZSYKNYW_OPTION" value="<?php echo $key;?>" <?php echo ($operation['ZSYKNYW_OPTION'] == $key) || (!$operation['ZSYKNYW_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ZSYKNYW_YWMC" class="col-sm-2 control-label">药物名称（多选）</label>
                      <div class="col-sm-10">
                        <?php foreach ($ZSYKNY as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="ZSYKNYW_YWMC[]" value="<?php echo $key; ?>" <?php echo $diagnostic['ZSYKNYW_YWMC'] && in_array($key,$diagnostic['ZSYKNYW_YWMC']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ZSYKNYW_JL" class="col-sm-2 control-label">剂量</label>
                      <div class="col-sm-10">
                        <?php foreach ($ZSYKNY_JL as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="ZSYKNYW_JL" value="<?php echo $key;?>" <?php echo ($operation['ZSYKNYW_JL'] == $key) || (!$operation['ZSYKNYW_JL'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ZSYKNYW_YYCXSJ" class="col-sm-2 control-label">应用持续时间</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="ZSYKNYW_YYCXSJ" placeholder="应用持续时间" value="<?php echo $operation['ZSYKNYW_YYCXSJ'];?>">
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="yws-kfkny-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#yws-tablist" href="#yws-kfkny" aria-expanded="false" aria-controls="yws-kfkny">
                      手术并发症
                    </a>
                  </h4>
                </div>
                <div id="yws-kfkny" class="panel-collapse collapse" role="tabpanel" aria-labelledby="yws-kfkny-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="KFKNY_JWFY_OPTION" class="col-sm-2 control-label">既往服用</label>
                      <div class="col-sm-6">
                        <?php foreach ($notquite as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="KFKNY_JWFY_OPTION" value="<?php echo $key;?>" <?php echo ($operation['KFKNY_JWFY_OPTION'] == $key) || (!$operation['KFKNY_JWFY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="KFKNY_ZYQJ_OPTION" class="col-sm-2 control-label">住院期间</label>
                      <div class="col-sm-6">
                        <?php foreach ($fhl as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="KFKNY_ZYQJ_OPTION" value="<?php echo $key;?>" <?php echo ($operation['KFKNY_ZYQJ_OPTION'] == $key) || (!$operation['KFKNY_ZYQJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="KFKNY_ZYQJ_YWZL" class="col-sm-2 control-label">药物种类（多选）</label>
                      <div class="col-sm-10">
                        <?php foreach ($KFKNY as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="KFKNY_ZYQJ_YWZL[]" value="<?php echo $key; ?>" <?php echo $diagnostic['KFKNY_ZYQJ_YWZL'] && in_array($key,$diagnostic['KFKNY_ZYQJ_YWZL']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="KFKNY_ZYQJ_ZZ" class="col-sm-2 control-label">指征（多选）</label>
                      <div class="col-sm-10">
                        <?php foreach ($KFKNYZZ as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="KFKNY_ZYQJ_ZZ[]" value="<?php echo $key; ?>" <?php echo $diagnostic['KFKNY_ZYQJ_ZZ'] && in_array($key,$diagnostic['KFKNY_ZYQJ_ZZ']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="yws-ttlyw-headind">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#yws-tablist" href="#yws-ttlyw" aria-expanded="false" aria-controls="yws-ttlyw">
                      他汀类药物
                    </a>
                  </h4>
                </div>
                <div id="yws-ttlyw" class="panel-collapse collapse" role="tabpanel" aria-labelledby="yws-ttlyw-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="TTLYW_OPTION" class="col-sm-2 control-label">他汀类药物</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="TTLYW_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['TTLYW_OPTION'] == $key) || (!$diagnostic['TTLYW_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="TTLYW_FHYW" class="col-sm-2 control-label">负荷药物</label>
                      <div class="col-sm-10">
                        <?php foreach ($TTLYY as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="TTLYW_FHYW[]" value="<?php echo $key; ?>" <?php echo $diagnostic['TTLYW_FHYW'] && in_array($key,$diagnostic['TTLYW_FHYW']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="TTLYW_WCL" class="col-sm-2 control-label">维持剂量</label>
                      <div class="col-sm-4">
                        <div class="input-group">
                        <input type="number" class="form-control" name="TTLYW_WCL" placeholder="维持剂量" value="<?php echo $operation['TTLYW_WCL'];?>">
                        <span class="input-group-addon">mg/d</span>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="yws-jyyw-headind">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#yws-tablist" href="#yws-jyyw" aria-expanded="false" aria-controls="yws-jyyw">
                      降压药物
                    </a>
                  </h4>
                </div>
                <div id="yws-jyyw" class="panel-collapse collapse" role="tabpanel" aria-labelledby="yws-jyyw-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="JYYW_OPTION" class="col-sm-2 control-label">降压药物</label>
                      <div class="col-sm-10">
                        <?php foreach ($JYYY as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="JYYW_OPTION[]" value="<?php echo $key; ?>" <?php echo $diagnostic['JYYW_OPTION'] && in_array($key,$diagnostic['JYYW_OPTION']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="yws-qt-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#yws-tablist" href="#yws-qt" aria-expanded="true" aria-controls="yws-qt">
                      其他
                    </a>
                  </h4>
                </div>
                <div id="yws-qt" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="yws-qt-heading">
                  <div class="panel-body">
                    <table class="table table-hover">
                      <thead>
                        <th>药品名</th>
                        <th>既往服用</th>
                        <th>住院期间</th>
                        <th>种类</th>
                      </thead>
                      <tr>
                        <td>硝酸酯类药物</td>
                        <td><?php foreach ($boolean as $key => $value) { ?><input type="radio" name="QT_XSZLYW_JWFY_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['QT_XSZLYW_JWFY_OPTION'] == $key) || (!$diagnostic['QT_XSZLYW_JWFY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?><?php } ?></td>
                        <td><?php foreach ($boolean as $key => $value) { ?><input type="radio" name="QT_XSZLYW_ZYQJ_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['QT_XSZLYW_ZYQJ_OPTION'] == $key) || (!$diagnostic['QT_XSZLYW_ZYQJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?><?php } ?></td>
                        <td><input type="text" class="form-control" name="QT_XSZLYW_MC" placeholder="种类" value="<?php echo $operation['QT_XSZLYW_MC'];?>"></td>
                      </tr>
                      <tr>
                        <td>抗心律失常药物</td>
                        <td><?php foreach ($boolean as $key => $value) { ?><input type="radio" name="QT_KXLSCYW_JWFY_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['QT_KXLSCYW_JWFY_OPTION'] == $key) || (!$diagnostic['QT_KXLSCYW_JWFY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?><?php } ?></td>
                        <td><?php foreach ($boolean as $key => $value) { ?><input type="radio" name="QT_KXLSCYW_ZYQJ_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['QT_KXLSCYW_ZYQJ_OPTION'] == $key) || (!$diagnostic['QT_KXLSCYW_ZYQJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?><?php } ?></td>
                        <td><input type="text" class="form-control" name="QT_KXLSCYW_MC" placeholder="种类" value="<?php echo $operation['QT_KXLSCYW_MC'];?>"></td>
                      </tr>
                      <tr>
                        <td>醛固酮拮抗剂</td>
                        <td><?php foreach ($boolean as $key => $value) { ?><input type="radio" name="QT_QGTJKJ_JWFY_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['QT_QGTJKJ_JWFY_OPTION'] == $key) || (!$diagnostic['QT_QGTJKJ_JWFY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?><?php } ?></td>
                        <td><?php foreach ($boolean as $key => $value) { ?><input type="radio" name="QT_QGTJKJ_ZYQJ_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['QT_QGTJKJ_ZYQJ_OPTION'] == $key) || (!$diagnostic['QT_QGTJKJ_ZYQJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?><?php } ?></td>
                        <td><input type="text" class="form-control" name="QT_QGTJKJ_MC" placeholder="种类" value="<?php echo $operation['QT_QGTJKJ_MC'];?>"></td>
                      </tr>
                      <tr>
                        <td>利尿剂</td>
                        <td><?php foreach ($boolean as $key => $value) { ?><input type="radio" name="QT_LLJ_JWFY_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['QT_LLJ_JWFY_OPTION'] == $key) || (!$diagnostic['QT_LLJ_JWFY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?><?php } ?></td>
                        <td><?php foreach ($boolean as $key => $value) { ?><input type="radio" name="QT_LLJ_ZYQJ_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['QT_LLJ_ZYQJ_OPTION'] == $key) || (!$diagnostic['QT_LLJ_ZYQJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?><?php } ?></td>
                        <td><input type="text" class="form-control" name="QT_LLJ__MC" placeholder="种类" value="<?php echo $operation['QT_LLJ__MC'];?>"></td>
                      </tr>
                      <tr>
                        <td>胃酸抑制剂</td>
                        <td><?php foreach ($boolean as $key => $value) { ?><input type="radio" name="QT_WSYZJ_JWFY_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['QT_WSYZJ_JWFY_OPTION'] == $key) || (!$diagnostic['QT_WSYZJ_JWFY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?><?php } ?></td>
                        <td><?php foreach ($boolean as $key => $value) { ?><input type="radio" name="QT_WSYZJ_ZYQJ_OPTION" value="<?php echo $key;?>" <?php echo ($diagnostic['QT_WSYZJ_ZYQJ_OPTION'] == $key) || (!$diagnostic['QT_WSYZJ_ZYQJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?><?php } ?></td>
                        <td><input type="text" class="form-control" name="QT_WSYZJ_MC" placeholder="种类" value="<?php echo $operation['QT_WSYZJ_MC'];?>"></td>
                      </tr>
                    </table>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div role="tabpanel" class="tab-pane" id="sysjc">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="panel-group" id="sysjc-tablist" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sysjc-xcg-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#sysjc-tablist" href="#sysjc-xcg" aria-expanded="true" aria-controls="sysjc-xcg">
                      血常规
                    </a>
                  </h4>
                </div>
                <div id="sysjc-xcg" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="sysjc-xcg-heading">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="XCG_XX" class="col-sm-2 control-label">血型</label>
                      <div class="col-sm-6">
                        <?php foreach ($XX as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XCG_XX" value="<?php echo $key;?>" <?php echo ($patient['XCG_XX'] == $key) || (!$patient['XCG_XX'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XCG_WBC" class="col-sm-2 control-label">白细胞计数（WBC）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XCG_WBC" name="XCG_WBC" placeholder="白细胞计数（WBC）" value="<?php echo $patient['XCG_WBC'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XCG_NEUT" class="col-sm-2 control-label">其中中性粒细胞（NEUT%）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XCG_NEUT" name="XCG_NEUT" placeholder="其中中性粒细胞（NEUT%）" value="<?php echo $patient['XCG_NEUT'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XCG_HGB" class="col-sm-2 control-label">血红蛋白(HGB)</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XCG_HGB" name="XCG_HGB" placeholder="血红蛋白(HGB)" value="<?php echo $patient['XCG_HGB'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XCG_LYM" class="col-sm-2 control-label">淋巴细胞比例(LYM%)</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XCG_LYM" name="XCG_LYM" placeholder="淋巴细胞比例(LYM%)" value="<?php echo $patient['XCG_LYM'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XCG_PLT" class="col-sm-2 control-label">血小板(PLT)</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XCG_PLT" name="XCG_PLT" placeholder="血小板(PLT)" value="<?php echo $patient['XCG_PLT'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XCG_HCT" class="col-sm-2 control-label">红细胞压积(HCT)</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XCG_HCT" name="XCG_HCT" placeholder="红细胞压积(HCT)" value="<?php echo $patient['XCG_HCT'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sysjc-xsh-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#sysjc-tablist" href="#sysjc-xsh" aria-expanded="true" aria-controls="sysjc-xsh">
                      血生化
                    </a>
                  </h4>
                </div>
                <div id="sysjc-xsh" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sysjc-xsh-heading">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="XSH_CRP" class="col-sm-2 control-label">CRP（单位Mg/L）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_CRP" name="XSH_CRP" placeholder="CRP（单位Mg/L）" value="<?php echo $patient['XSH_CRP'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_AST" class="col-sm-2 control-label">谷草转氨酶（AST）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_AST" name="XSH_AST" placeholder="谷草转氨酶（AST）" value="<?php echo $patient['XSH_AST'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_ALT" class="col-sm-2 control-label">谷丙转氨酶（ALT）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_ALT" name="XSH_ALT" placeholder="谷丙转氨酶（ALT）" value="<?php echo $patient['XSH_ALT'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_TBIL" class="col-sm-2 control-label">总胆红素（TBIL）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_TBIL" name="XSH_TBIL" placeholder="总胆红素（TBIL）" value="<?php echo $patient['XSH_TBIL'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_DBIL" class="col-sm-2 control-label">直接胆红素（DBIL）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_DBIL" name="XSH_DBIL" placeholder="直接胆红素（DBIL）" value="<?php echo $patient['XSH_DBIL'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_UA" class="col-sm-2 control-label">尿酸（UA）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_UA" name="XSH_UA" placeholder="尿酸（UA）" value="<?php echo $patient['XSH_UA'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_BUN" class="col-sm-2 control-label">尿素氮（BUN）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_BUN" name="XSH_BUN" placeholder="尿素氮（BUN）" value="<?php echo $patient['XSH_BUN'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_CR" class="col-sm-2 control-label">肌酐（Cr）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_CR" name="XSH_CR" placeholder="肌酐（Cr）" value="<?php echo $patient['XSH_CR'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_GYS" class="col-sm-2 control-label">胱抑素</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_GYS" name="XSH_GYS" placeholder="胱抑素" value="<?php echo $patient['XSH_GYS'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_TG" class="col-sm-2 control-label">甘油三脂（TG）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_TG" name="XSH_TG" placeholder="甘油三脂（TG）" value="<?php echo $patient['XSH_TG'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_HDLC" class="col-sm-2 control-label">高密度脂蛋白（HDLC）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_HDLC" name="XSH_HDLC" placeholder="高密度脂蛋白（HDLC）" value="<?php echo $patient['XSH_HDLC'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_LDLC" class="col-sm-2 control-label">低密度脂蛋白（LDLC）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_LDLC" name="XSH_LDLC" placeholder="低密度脂蛋白（LDLC）" value="<?php echo $patient['XSH_LDLC'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XSH_ZDGC" class="col-sm-2 control-label">总胆固醇</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSH_ZDGC" name="XSH_ZDGC" placeholder="总胆固醇" value="<?php echo $patient['XSH_ZDGC'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sysjc-qtshzb-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#sysjc-tablist" href="#sysjc-qtshzb" aria-expanded="false" aria-controls="sysjc-qtshzb">
                      其他生化指标
                    </a>
                  </h4>
                </div>
                <div id="sysjc-qtshzb" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sysjc-qtshzb-heading">
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="QTSHZB_ALB" class="col-sm-2 control-label">白蛋白（Alb）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="QTSHZB_ALB" name="QTSHZB_ALB" placeholder="白蛋白（Alb）" value="<?php echo $patient['QTSHZB_ALB'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QTSHZB_THXHDB" class="col-sm-2 control-label">糖化血红蛋白</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="QTSHZB_THXHDB" name="QTSHZB_THXHDB" placeholder="糖化血红蛋白" value="<?php echo $patient['QTSHZB_THXHDB'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QTSHZB_XT" class="col-sm-2 control-label">血糖</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="QTSHZB_XT" name="QTSHZB_XT" placeholder="血糖" value="<?php echo $patient['QTSHZB_XT'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QTSHZB_DEJT" class="col-sm-2 control-label">D-二聚体</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="QTSHZB_DEJT" name="QTSHZB_DEJT" placeholder="D-二聚体" value="<?php echo $patient['QTSHZB_DEJT'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QTSHZB_FDP" class="col-sm-2 control-label">纤维蛋白降解产物（FDP）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="QTSHZB_FDP" name="QTSHZB_FDP" placeholder="纤维蛋白降解产物（FDP）" value="<?php echo $patient['QTSHZB_FDP'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QTSHZB_XC" class="col-sm-2 control-label">血沉</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="QTSHZB_XC" name="QTSHZB_XC" placeholder="血沉" value="<?php echo $patient['QTSHZB_XC'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sysjc-djz-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#sysjc-tablist" href="#sysjc-djz" aria-expanded="false" aria-controls="sysjc-djz">
                      电解质
                    </a>
                  </h4>
                </div>
                <div id="sysjc-djz" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sysjc-djz-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="DJZ_K" class="col-sm-2 control-label">K+</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="DJZ_K" name="DJZ_K" placeholder="K+" value="<?php echo $patient['DJZ_K'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="DJZ_NA" class="col-sm-2 control-label">Na+</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="DJZ_NA" name="DJZ_NA" placeholder="Na+" value="<?php echo $patient['DJZ_NA'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sysjc-jg-headind">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#sysjc-tablist" href="#sysjc-jg" aria-expanded="false" aria-controls="sysjc-jg">
                      甲功
                    </a>
                  </h4>
                </div>
                <div id="sysjc-jg" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sysjc-jg-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="JG_FT3" class="col-sm-2 control-label">游离T3（FT3）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="JG_FT3" name="JG_FT3" placeholder="游离T3（FT3）" value="<?php echo $patient['JG_FT3'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="JG_TT3" class="col-sm-2 control-label">血清总三碘甲状原氨酸（TT3）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="JG_TT3" name="JG_TT3" placeholder="血清总三碘甲状原氨酸（TT3）" value="<?php echo $patient['JG_TT3'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="JG_TSH" class="col-sm-2 control-label">促甲状腺激素（TSH）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="JG_TSH" name="JG_TSH" placeholder="促甲状腺激素（TSH）" value="<?php echo $patient['JG_TSH'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sysjc-n-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#sysjc-tablist" href="#sysjc-n" aria-expanded="true" aria-controls="sysjc-n">
                      尿
                    </a>
                  </h4>
                </div>
                <div id="sysjc-n" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="sysjc-n-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="N_NWLBDB" class="col-sm-2 control-label">尿微量白蛋白</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="N_NWLBDB" name="N_NWLBDB" placeholder="尿微量白蛋白" value="<?php echo $patient['N_NWLBDB'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="N_NDB" class="col-sm-2 control-label">尿蛋白/肌酐比值</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="N_NDB" name="N_NDB" placeholder="尿蛋白/肌酐比值" value="<?php echo $patient['N_NDB'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sysjc-dbyx-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#sysjc-tablist" href="#sysjc-dbyx" aria-expanded="true" aria-controls="sysjc-dbyx">
                      大便隐血
                    </a>
                  </h4>
                </div>
                <div id="sysjc-dbyx" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="sysjc-dbyx-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="DBYX_DBYXSFYX" class="col-sm-2 control-label">大便隐血是否阳性</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="DBYX_DBYXSFYX" name="DBYX_DBYXSFYX" placeholder="大便隐血是否阳性" value="<?php echo $patient['DBYX_DBYXSFYX'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sysjc-xjssbzw-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#sysjc-tablist" href="#sysjc-xjssbzw" aria-expanded="true" aria-controls="sysjc-xjssbzw">
                      心肌损伤标志物
                    </a>
                  </h4>
                </div>
                <div id="sysjc-xjssbzw" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="sysjc-xjssbzw-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="XJSSBZW_CKMB" class="col-sm-2 control-label">CK-MB</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XJSSBZW_CKMB" name="XJSSBZW_CKMB" placeholder="CK-MB" value="<?php echo $patient['XJSSBZW_CKMB'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XJSSBZW_TNT" class="col-sm-2 control-label">TnT</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XJSSBZW_TNT" name="XJSSBZW_TNT" placeholder="TnT" value="<?php echo $patient['XJSSBZW_TNT'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XJSSBZW_TNI" class="col-sm-2 control-label">TnI</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XJSSBZW_TNI" name="XJSSBZW_TNI" placeholder="TnI" value="<?php echo $patient['XJSSBZW_TNI'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sysjc-xszb-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#sysjc-tablist" href="#sysjc-xszb" aria-expanded="true" aria-controls="sysjc-xszb">
                      心衰指标
                    </a>
                  </h4>
                </div>
                <div id="sysjc-xszb" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="sysjc-xszb-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="XSZB_BNP" class="col-sm-2 control-label">脑钠肽前体（Pro-BNP）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XSZB_BNP" name="XSZB_BNP" placeholder="脑钠肽前体（Pro-BNP）" value="<?php echo $patient['XSZB_BNP'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="sysjc-xzcc-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#sysjc-tablist" href="#sysjc-xzcc" aria-expanded="true" aria-controls="sysjc-xzcc">
                      心脏彩超
                    </a>
                  </h4>
                </div>
                <div id="sysjc-xzcc" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="sysjc-xzcc-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="XZCC_LVEF" class="col-sm-2 control-label">LVEF值</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XZCC_LVEF" name="XZCC_LVEF" placeholder="LVEF值" value="<?php echo $patient['XZCC_LVEF'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XZCC_ZSSZMNJZ" class="col-sm-2 control-label">左室舒张末内径值</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XZCC_ZSSZMNJZ" name="XZCC_ZSSZMNJZ" placeholder="左室舒张末内径值" value="<?php echo $patient['XZCC_ZSSZMNJZ'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XZCC_YS" class="col-sm-2 control-label">右室</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XZCC_YS" name="XZCC_YS" placeholder="右室" value="<?php echo $patient['XZCC_YS'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XZCC_ZF" class="col-sm-2 control-label">左房</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XZCC_ZF" name="XZCC_ZF" placeholder="左房" value="<?php echo $patient['XZCC_ZF'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XZCC_YF" class="col-sm-2 control-label">右房</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XZCC_YF" name="XZCC_YF" placeholder="右房" value="<?php echo $patient['XZCC_YF'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XZCC_FS" class="col-sm-2 control-label">左室短轴缩短率（FS）</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XZCC_FS" name="XZCC_FS" placeholder="左室短轴缩短率（FS）" value="<?php echo $patient['XZCC_FS'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XZCC_FDMSSY" class="col-sm-2 control-label">肺动脉收缩压</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XZCC_FDMSSY" name="XZCC_FDMSSY" placeholder="肺动脉收缩压" value="<?php echo $patient['XZCC_FDMSSY'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div>

      <div role="tabpanel" class="tab-pane" id="zyqk">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="panel-group" id="zyqk-tablist" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="zyqk-rytz-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#zyqk-tablist" href="#zyqk-rytz" aria-expanded="true" aria-controls="zyqk-rytz">
                      入院体征
                    </a>
                  </h4>
                </div>
                <div id="zyqk-rytz" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="zyqk-rytz-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="RYTZ_XY_SSY" class="col-sm-2 control-label">血压 收缩压 </label>
                      <div class="col-sm-4">
                        <div class="input-group">
                        <input type="number" class="form-control" id="RYTZ_XY_SSY" name="RYTZ_XY_SSY" placeholder="收缩压" value="<?php echo $patient['RYTZ_XY_SSY'];?>" required>
                        <span class="input-group-addon">mmHg</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="RYTZ_XY_SZY" class="col-sm-2 control-label">血压 舒张压</label>
                      <div class="col-sm-4">
                        <div class="input-group">
                        <input type="number" class="form-control" id="RYTZ_XY_SZY" name="RYTZ_XY_SZY" placeholder="舒张压" value="<?php echo $patient['RYTZ_XY_SZY'];?>" required>
                        <span class="input-group-addon">mmHg</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="RYTZ_XL_JXXL" class="col-sm-2 control-label">静息心率</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                        <input type="number" class="form-control" id="RYTZ_XL_JXXL" name="RYTZ_XL_JXXL" placeholder="静息心率" value="<?php echo $patient['RYTZ_XL_JXXL'];?>" required>
                        <span class="input-group-addon">次/分</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="RYTZ_XL_FC_OPTION" class="col-sm-2 control-label">是否是房颤</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="RYTZ_XL_FC_OPTION" value="<?php echo $key;?>" <?php echo ($patient['RYTZ_XL_FC_OPTION'] == $key) || (!$patient['RYTZ_XL_FC_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="zyqk-cyzt-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#zyqk-tablist" href="#zyqk-cyzt" aria-expanded="true" aria-controls="zyqk-cyzt">
                      出院状态
                    </a>
                  </h4>
                </div>
                <div id="zyqk-cyzt" class="panel-collapse collapse" role="tabpanel" aria-labelledby="zyqk-cyzt-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="CYZT_OPTION" class="col-sm-2 control-label">出院状态</label>
                      <div class="col-sm-2">
                        <?php foreach ($alive as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="CYZT_OPTION" value="<?php echo $key;?>" <?php echo ($patient['CYZT_OPTION'] == $key) || (!$patient['CYZT_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="zyqk-zyts-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#zyqk-tablist" href="#zyqk-zyts" aria-expanded="false" aria-controls="zyqk-zyts">
                      住院天数
                    </a>
                  </h4>
                </div>
                <div id="zyqk-zyts" class="panel-collapse collapse" role="tabpanel" aria-labelledby="zyqk-zyts-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="ZYTS" class="col-sm-2 control-label">住院天数</label>
                      <div class="col-sm-2">
                        <input type="number" class="form-control" name="ZYTS" placeholder="住院天数" value="<?php echo $operation['ZYTS'];?>">
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="zyqk-cyzd-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#zyqk-tablist" href="#zyqk-cyzd" aria-expanded="false" aria-controls="zyqk-cyzd">
                      出院诊断
                    </a>
                  </h4>
                </div>
                <div id="zyqk-cyzd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="zyqk-cyzd-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="CYZD_OPTION" class="col-sm-2 control-label">出院诊断</label>
                      <div class="col-sm-4">
                        <select class="form-control" id="CYZD_OPTION" name="CYZD_OPTION">
                          <?php foreach ($CYZD as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $info['CYZD_OPTION'] == $key ? 'selected' : "";?>><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="CYZD_QT" class="col-sm-2 control-label">其他</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="CYZD_QT" placeholder="其他" value="<?php echo $operation['CYZD_QT'];?>">
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="zyqk-cydy-headind">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#zyqk-tablist" href="#zyqk-cydy" aria-expanded="false" aria-controls="zyqk-cydy">
                      出院带药
                    </a>
                  </h4>
                </div>
                <div id="zyqk-cydy" class="panel-collapse collapse" role="tabpanel" aria-labelledby="zyqk-cydy-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="CYDY_OPTION" class="col-sm-2 control-label">出院带药</label>
                      <div class="col-sm-10">
                        <?php foreach ($CYDY as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="CYDY_OPTION[]" value="<?php echo $key; ?>" <?php echo $diagnostic['CYDY_OPTION'] && in_array($key,$diagnostic['CYDY_OPTION']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="CYDY_MC" class="col-sm-2 control-label">药物名称</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="CYDY_MC" placeholder="药物名称" value="<?php echo $operation['CYDY_MC'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="CYDY_YF" class="col-sm-2 control-label">用法</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="CYDY_YF" placeholder="用法" value="<?php echo $operation['CYDY_YF'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="CYDY_SFQJYWBH" class="col-sm-2 control-label">随访期间的药物变化</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="CYDY_SFQJYWBH" placeholder="随访期间的药物变化" value="<?php echo $operation['CYDY_SFQJYWBH'];?>">
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div role="tabpanel" class="tab-pane" id="dbz">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="panel-group" id="dbz-tablist" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="dbz-xs-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#dbz-tablist" href="#dbz-xs" aria-expanded="true" aria-controls="dbz-xs">
                      心衰
                    </a>
                  </h4>
                </div>
                <div id="dbz-xs" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="dbz-xs-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="XS_BY_OPTION" class="col-sm-2 control-label">病因</label>
                      <div class="col-sm-10">
                        <?php foreach ($XSBY as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XS_BY_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_BY_OPTION'] == $key) || (!$patient['XS_BY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XS_BY_QT" class="col-sm-2 control-label">其他</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="XS_BY_QT" name="XS_BY_QT" placeholder="其他" value="<?php echo $patient['XS_BY_QT'];?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XS_LX_OPTION" class="col-sm-2 control-label">类型</label>
                      <div class="col-sm-4">
                        <?php foreach ($XSLX as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XS_LX_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_LX_OPTION'] == $key) || (!$patient['XS_LX_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XS_OPTION" class="col-sm-2 control-label">心衰</label>
                      <div class="col-sm-6">
                        <?php foreach ($XS as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XS_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_OPTION'] == $key) || (!$patient['XS_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XS_XGN_OPTION" class="col-sm-2 control-label">心功能</label>
                      <div class="col-sm-6">
                        <?php foreach ($XGN as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XS_XGN_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_XGN_OPTION'] == $key) || (!$patient['XS_XGN_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XS_YWSY_LNJ_OPTION" class="col-sm-2 control-label">利尿剂 </label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XS_YWSY_LNJ_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_YWSY_LNJ_OPTION'] == $key) || (!$patient['XS_YWSY_LNJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XS_YWSY_B_OPTION" class="col-sm-2 control-label">B受体阻滞剂</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XS_YWSY_B_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_YWSY_B_OPTION'] == $key) || (!$patient['XS_YWSY_B_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XS_YWSY_ACEI_OPTION" class="col-sm-2 control-label">ACEI/AEB</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XS_YWSY_ACEI_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_YWSY_ACEI_OPTION'] == $key) || (!$patient['XS_YWSY_ACEI_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XS_YWSY_LNZ_OPTION" class="col-sm-2 control-label">螺内酯</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XS_YWSY_LNZ_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_YWSY_LNZ_OPTION'] == $key) || (!$patient['XS_YWSY_LNZ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XS_YWSY_DGX_OPTION" class="col-sm-2 control-label">地高辛 </label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XS_YWSY_DGX_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_YWSY_DGX_OPTION'] == $key) || (!$patient['XS_YWSY_DGX_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XS_YWSY_GLZJKJ_OPTIONv" class="col-sm-2 control-label">钙离子拮抗剂</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XS_YWSY_GLZJKJ_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_YWSY_GLZJKJ_OPTION'] == $key) || (!$patient['XS_YWSY_GLZJKJ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="dbz-xg-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#dbz-tablist" href="#dbz-xg" aria-expanded="true" aria-controls="dbz-xg">
                      心梗
                    </a>
                  </h4>
                </div>
                <div id="dbz-xg" class="panel-collapse collapse" role="tabpanel" aria-labelledby="dbz-xg-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="XG_KILLIP_OPTION" class="col-sm-2 control-label">killip分级</label>
                      <div class="col-sm-6">
                        <?php foreach ($KILLIP as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XG_KILLIP_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XG_KILLIP_OPTION'] == $key) || (!$patient['XG_KILLIP_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XG_BW" class="col-sm-2 control-label">心梗部位</label>
                      <div class="col-sm-10">
                        <?php foreach ($XGBW as $key => $value) { ?>
                        <label class="checkbox-inline">
                          <input type="checkbox" name="XG_BW[]" value="<?php echo $key; ?>" <?php echo $diagnostic['XG_BW'] && in_array($key,$diagnostic['XG_BW']) ? 'checked' : '';?>><?php echo $value; ?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XG_LX" class="col-sm-2 control-label">类型</label>
                      <div class="col-sm-6">
                        <?php foreach ($XGLX as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XG_LX" value="<?php echo $key;?>" <?php echo ($patient['XG_LX'] == $key) || (!$patient['XG_LX'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XG_SFJZJRZL_OPTION" class="col-sm-2 control-label">是否急诊介入治疗</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="XG_SFJZJRZL_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XG_SFJZJRZL_OPTION'] == $key) || (!$patient['XG_SFJZJRZL_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XG_MZSJ" class="col-sm-2 control-label">门-球时间</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                        <input type="number" class="form-control" id="XG_MZSJ" name="XG_MZSJ" placeholder="门-球时间" value="<?php echo $patient['XG_MZSJ'];?>" required>
                        <span class="input-group-addon">分钟</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="XG_FMC" class="col-sm-2 control-label">首次医疗接触时间（FMC）时间</label>
                      <div class="col-sm-2">
                        <div class="input-group">
                        <input type="number" class="form-control" id="XG_FMC" name="XG_FMC" placeholder="首次医疗接触时间（FMC）时间" value="<?php echo $patient['XG_FMC'];?>" required>
                        <span class="input-group-addon">分钟</span>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="dbz-ss-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#dbz-tablist" href="#dbz-ss" aria-expanded="false" aria-controls="dbz-ss">
                      手术
                    </a>
                  </h4>
                </div>
                <div id="dbz-ss" class="panel-collapse collapse" role="tabpanel" aria-labelledby="dbz-ss-heading">
                  <div class="panel-body">

                    <table class="table table-hover">
                      <thead>
                        <th>狭窄部位</th>
                        <th>程度</th>
                        <th>支架类型</th>
                        <th>大小</th>
                      </thead>
                      <tr>
                        <td>LM 左主干</td>
                        <td><input type="text" class="form-control" name="XG_SS_LM_CD" value="<?php echo $operation['XG_SS_LM_CD'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_LM_ZJLX" value="<?php echo $operation['XG_SS_LM_ZJLX'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_LM_DX" value="<?php echo $operation['XG_SS_LM_DX'];?>"></td>
                      </tr>
                      <tr>
                        <td>LAD 前降支</td>
                        <td><input type="text" class="form-control" name="XG_SS_LAD_CD" value="<?php echo $operation['XG_SS_LAD_CD'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_LAD_ZJLX" value="<?php echo $operation['XG_SS_LAD_ZJLX'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_LAD_DX" value="<?php echo $operation['XG_SS_LAD_DX'];?>"></td>
                      </tr>
                      <tr>
                        <td>RCA 右冠</td>
                        <td><input type="text" class="form-control" name="XG_SS_RCA_CD" value="<?php echo $operation['XG_SS_RCA_CD'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_RCA_ZJLX" value="<?php echo $operation['XG_SS_RCA_ZJLX'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_RCA_DX" value="<?php echo $operation['XG_SS_RCA_DX'];?>"></td>
                      </tr>
                      <tr>
                        <td>LCX 回旋支</td>
                        <td><input type="text" class="form-control" name="XG_SS_LCX_CD" value="<?php echo $operation['XG_SS_LCX_CD'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_LCX_ZJLX" value="<?php echo $operation['XG_SS_LCX_ZJLX'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_LCX_DX" value="<?php echo $operation['XG_SS_LCX_DX'];?>"></td>
                      </tr>
                      <tr>
                        <td>Dia 对角支</td>
                        <td><input type="text" class="form-control" name="XG_SS_DIA_CD" value="<?php echo $operation['XG_SS_DIA_CD'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_DIA_ZJLX" value="<?php echo $operation['XG_SS_DIA_ZJLX'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_DIA_DX" value="<?php echo $operation['XG_SS_DIA_DX'];?>"></td>
                      </tr>
                      <tr>
                        <td>OM 钝缘支</td>
                        <td><input type="text" class="form-control" name="XG_SS_OM_CD" value="<?php echo $operation['XG_SS_OM_CD'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_OM_ZJLX" value="<?php echo $operation['XG_SS_OM_ZJLX'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_OM_DX" value="<?php echo $operation['XG_SS_OM_DX'];?>"></td>
                      </tr>
                      <tr>
                        <td>PDA 后降支</td>
                        <td><input type="text" class="form-control" name="XG_SS_PDA_CD" value="<?php echo $operation['XG_SS_PDA_CD'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_PDA_ZJLX" value="<?php echo $operation['XG_SS_PDA_ZJLX'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_PDA_DX" value="<?php echo $operation['XG_SS_PDA_DX'];?>"></td>
                      </tr>
                      <tr>
                        <td>PLA 左室后支</td>
                        <td><input type="text" class="form-control" name="XG_SS_PLA_CD" value="<?php echo $operation['XG_SS_PLA_CD'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_PLA_ZJLX" value="<?php echo $operation['XG_SS_PLA_ZJLX'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_PLA_DX" value="<?php echo $operation['XG_SS_PLA_DX'];?>"></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="XG_SS_QT_TEXT" placeholder="其他" value="<?php echo $operation['XG_SS_QT_TEXT'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_QT_CD" value="<?php echo $operation['XG_SS_QT_CD'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_QT_ZJLX" value="<?php echo $operation['XG_SS_QT_ZJLX'];?>"></td>
                        <td><input type="text" class="form-control" name="XG_SS_QT_DX" value="<?php echo $operation['XG_SS_QT_DX'];?>"></td>
                      </tr>
                    </table>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="dbz-sp-heading">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#dbz-tablist" href="#dbz-sp" aria-expanded="false" aria-controls="dbz-sp">
                      射频
                    </a>
                  </h4>
                </div>
                <div id="dbz-sp" class="panel-collapse collapse" role="tabpanel" aria-labelledby="dbz-sp-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="SP_LX_OPTION" class="col-sm-2 control-label">类型</label>
                      <div class="col-sm-6">
                        <?php foreach ($SPLX as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="SP_LX_OPTION" value="<?php echo $key;?>" <?php echo ($operation['SP_LX_OPTION'] == $key) || (!$operation['SP_LX_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="SP_SSSJ" class="col-sm-2 control-label">手术时间</label>
                      <div class="col-sm-4">
                        <div class="input-group date">
                        <input class="form-control" type="text"  name="SP_SSSJ" id="SP_SSSJ" value="<?php echo $info['SP_SSSJ'] ? date('Y-m-d',$info['CSRQ']) :'';?>" required >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="SP_SSFF_OPTION" class="col-sm-2 control-label">随访复发</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="SP_SSFF_OPTION" value="<?php echo $key;?>" <?php echo ($patient['SP_SSFF_OPTION'] == $key) || (!$patient['SP_SSFF_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="SP_YYWC_OPTION" class="col-sm-2 control-label">用药维持</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="SP_YYWC_OPTION" value="<?php echo $key;?>" <?php echo ($patient['SP_YYWC_OPTION'] == $key) || (!$patient['SP_YYWC_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="SP_YYWC_YW" class="col-sm-2 control-label">药物</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="SP_YYWC_YW" name="SP_YYWC_YW" placeholder="药物" value="<?php echo $patient['SP_YYWC_YW'];?>" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="dbz-qbq-headind">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#dbz-tablist" href="#dbz-qbq" aria-expanded="false" aria-controls="dbz-qbq">
                      起搏器
                    </a>
                  </h4>
                </div>
                <div id="dbz-qbq" class="panel-collapse collapse" role="tabpanel" aria-labelledby="dbz-qbq-heading">
                  <div class="panel-body">

                    <div class="form-group">
                      <label for="QBQ_ZRYY_OPTION" class="col-sm-2 control-label">植入起搏器原因</label>
                      <div class="col-sm-4">
                        <select class="form-control" id="QBQ_ZRYY_OPTION" name="QBQ_ZRYY_OPTION">
                          <?php foreach ($ZRQBQYY as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $info['QBQ_ZRYY_OPTION'] == $key ? 'selected' : "";?>><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QBQ_LX_OPTION" class="col-sm-2 control-label">起搏器类型</label>
                      <div class="col-sm-4">
                        <select class="form-control" id="QBQ_LX_OPTION" name="QBQ_LX_OPTION">
                          <?php foreach ($QBQLX as $key => $value) { ?>
                          <option value="<?php echo $key;?>" <?php echo $info['QBQ_LX_OPTION'] == $key ? 'selected' : "";?>><?php echo $value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QBQ_SSSJ" class="col-sm-2 control-label">手术时间</label>
                      <div class="col-sm-4">
                        <div class="input-group date">
                        <input class="form-control" type="text"  name="QBQ_SSSJ" id="QBQ_SSSJ" value="<?php echo $info['QBQ_SSSJ'] ? date('Y-m-d',$info['QBQ_SSSJ']) :'';?>" required >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QBQ_CQSFYY" class="col-sm-2 control-label">长期随访用药</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="QBQ_CQSFYY" placeholder="长期随访用药" value="<?php echo $operation['QBQ_CQSFYY'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QBQ_SFQJ_YJFZ_OPTION" class="col-sm-2 control-label">是否有黑矇、晕厥发作</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="QBQ_SFQJ_YJFZ_OPTION" value="<?php echo $key;?>" <?php echo ($patient['QBQ_SFQJ_YJFZ_OPTION'] == $key) || (!$patient['QBQ_SFQJ_YJFZ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QBQ_SFQJ_ICD_OPTION" class="col-sm-2 control-label">如是ICD 是否有放电</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="QBQ_SFQJ_ICD_OPTION" value="<?php echo $key;?>" <?php echo ($patient['QBQ_SFQJ_ICD_OPTION'] == $key) || (!$patient['QBQ_SFQJ_ICD_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QBQ_SFQJ_GNYC_OPTION" class="col-sm-2 control-label">起搏器功能异常</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="QBQ_SFQJ_GNYC_OPTION" value="<?php echo $key;?>" <?php echo ($patient['QBQ_SFQJ_GNYC_OPTION'] == $key) || (!$patient['QBQ_SFQJ_GNYC_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="QBQ_SFQJ_SFGZ_OPTION" class="col-sm-2 control-label">是否感知起搏器功能异常</label>
                      <div class="col-sm-2">
                        <?php foreach ($boolean as $key => $value) { ?>
                        <label class="radio-inline">
                          <input type="radio" name="QBQ_SFQJ_SFGZ_OPTION" value="<?php echo $key;?>" <?php echo ($patient['QBQ_SFQJ_SFGZ_OPTION'] == $key) || (!$patient['QBQ_SFQJ_SFGZ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                        </label>
                        <?php } ?>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div role="tabpanel" class="tab-pane" id="sfzdsj">
        <div class="panel panel-default">
          <div class="panel-body">

            <div class="form-group">
              <label for="SW_OPTION" class="col-sm-2 control-label">死亡</label>
              <div class="col-sm-2">
                <?php foreach ($boolean as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="SW_OPTION" value="<?php echo $key;?>" <?php echo ($patient['SW_OPTION'] == $key) || (!$patient['SW_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="SW_YY_OPTION" class="col-sm-2 control-label">死亡原因</label>
              <div class="col-sm-6">
                <?php foreach ($SWFS as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="SW_YY_OPTION" value="<?php echo $key;?>" <?php echo ($patient['SW_YY_OPTION'] == $key) || (!$patient['SW_YY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>


            <div class="form-group">
              <label for="ZZ_OPTION" class="col-sm-2 control-label">卒中/栓塞</label>
              <div class="col-sm-2">
                <?php foreach ($boolean as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="ZZ_OPTION" value="<?php echo $key;?>" <?php echo ($patient['ZZ_OPTION'] == $key) || (!$patient['ZZ_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="ZZ_YY_OPTION" class="col-sm-2 control-label">卒中/栓塞 原因</label>
              <div class="col-sm-6">
                <?php foreach ($ZZSS as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="ZZ_YY_OPTION" value="<?php echo $key;?>" <?php echo ($patient['ZZ_YY_OPTION'] == $key) || (!$patient['ZZ_YY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="XS_OPTION" class="col-sm-2 control-label">心衰</label>
              <div class="col-sm-2">
                <?php foreach ($boolean as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="XS_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XS_OPTION'] == $key) || (!$patient['XS_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="CX_OPTION" class="col-sm-2 control-label">出血</label>
              <div class="col-sm-2">
                <?php foreach ($boolean as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="CX_OPTION" value="<?php echo $key;?>" <?php echo ($patient['CX_OPTION'] == $key) || (!$patient['CX_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="CX_LX_OPTION" class="col-sm-2 control-label">类型</label>
              <div class="col-sm-6">
                <?php foreach ($cx as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="CX_LX_OPTION" value="<?php echo $key;?>" <?php echo ($patient['CX_LX_OPTION'] == $key) || (!$patient['CX_LX_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="CX_BW" class="col-sm-2 control-label">部位</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="CX_BW" placeholder="部位" value="<?php echo $operation['CX_BW'];?>">
              </div>
            </div>

            <div class="form-group">
              <label for="CX_SFSX_OPTION" class="col-sm-2 control-label">处理（输血）</label>
              <div class="col-sm-2">
                <?php foreach ($boolean as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="CX_SFSX_OPTION" value="<?php echo $key;?>" <?php echo ($patient['CX_SFSX_OPTION'] == $key) || (!$patient['CX_SFSX_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="XJGS_OPTION" class="col-sm-2 control-label">心肌梗死</label>
              <div class="col-sm-2">
                <?php foreach ($boolean as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="XJGS_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XJGS_OPTION'] == $key) || (!$patient['XJGS_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="ZZY_OPTION" class="col-sm-2 control-label">再住院</label>
              <div class="col-sm-2">
                <?php foreach ($boolean as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="ZZY_OPTION" value="<?php echo $key;?>" <?php echo ($patient['ZZY_OPTION'] == $key) || (!$patient['ZZY_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label for="ZZY_ZYCS" class="col-sm-2 control-label">住院次数</label>
              <div class="col-sm-2">
                <input type="number" class="form-control" name="ZZY_ZYCS" placeholder="住院次数" value="<?php echo $operation['ZZY_ZYCS'];?>">
              </div>
            </div>

            <div class="form-group">
              <label for="XLSC_OPTION" class="col-sm-2 control-label">心律失常</label>
              <div class="col-sm-2">
                <?php foreach ($boolean as $key => $value) { ?>
                <label class="radio-inline">
                  <input type="radio" name="XLSC_OPTION" value="<?php echo $key;?>" <?php echo ($patient['XLSC_OPTION'] == $key) || (!$patient['XLSC_OPTION'] && $key=='0')   ? 'checked' : '';?>> <?php echo $value;?>
                </label>
                <?php } ?>
              </div>
            </div>

          </div>
        </div>

      </div>

  </div>




<input name="code" type="hidden" value="<?php echo $patient['patient_code']; ?>">

<button id="submit" type="button" class="btn btn-default">下一步</button>
</form>
<button id="back" class="btn btn-default" onclick="javascript:history.back(-1);">返回</button>

<script type="text/javascript">

  $.validator.setDefaults({
		submitHandler: function(form) {
			// alert("submitted!");
      form.submit();
		}
	});
  $.validator.addMethod("isPhone", function(value, element) {
    var tel = /^1\d{10}$/;
    return this.optional(element) || (tel.test(value));
  }, "请正确填写您的手机号码");

  var validator;

  $(document).ready(function(){
    // 验证
    validator = $('#patientForm').validate({
     rules: {
       name: "required",
       born: {
         required: true,
         date: true
       },
       place: "required",
       phone: {
         required: true,
         isPhone: true
       },
       address: "required",
       height: {
         number: true
       },
       weight: {
         number: true
       },
       jpcysz_shou_1: {
         required: true,
         number: true
       },
       jpcysz_yz_1: {
         required: true,
         number: true
       }
     },
     errorPlacement: function(error, element) {
        error.addClass('form-control-static');
        error.addClass('text-danger');
        error.appendTo(element.parents('.form-group:first'));
			},
      success: function(label,element) {
				// set &nbsp; as text for IE
				label.html("&nbsp;");
			},
      // highlight: function(element, errorClass, validClass) {
      //   $(element).parent().parent().addClass('has-error');
      // },
      // unhighlight: function(element, errorClass, validClass) {
      //   $(element).parent().parent().removeClass('has-error');
      // }
   });

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

    $('#height').bind('keyup',function(){
      var height = $(this).val();
      var weight = $('#weight').val();

      $('#BMI').val(getBMI(height,weight));
    });

    $('#weight').bind('keyup',function(){
      var weight = $(this).val();
      var height = $('#height').val();

      $('#BMI').val(getBMI(height,weight));
    });

  });


  $('#born').datepicker({
    format: "yyyy-mm-dd",
    clearBtn: true,
    language: "zh-CN"
  });
  $('#sssj').datepicker({
    format: "yyyy-mm-dd",
    clearBtn: true,
    language: "zh-CN"
  });
  $('#shsf_date').datepicker({
    format: "yyyy-mm-dd",
    clearBtn: true,
    language: "zh-CN"
  });

  $('#shcs_image').fileinput({
      language: 'zh',
      uploadAsync: true,
      uploadUrl: '<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/upload',
      maxFileCount: 1,
      initialPreviewShowDelete: false,
      <?php echo $operation['shcs_image'] ? 'initialPreview: ["<img src=\''.$operation['shcs_image'].'\' class=\'file-preview-image\'>",],initialPreviewConfig: [  {caption: "超声影像.jpg", width: "120px", url: "'.Yii::app()->request->baseUrl.'/admin/patient/uploadDel", key: 1},],' : ''; ?>

  });
  $('#shcs_image').on('fileuploaded', function(event, data, previewId, index) {
    if (data.response.code == 0) {
      $('#shcs_image_value').val(data.response.url)
    }else {
      alert('图片上传失败，请稍候再试');
    }
  });
  $('#shcs_image').on('filecleared', function(event) {
    $('#shcs_image_value').val('');
  });


  $('#shsf_cs_image').fileinput({
      language: 'zh',
      uploadAsync: true,
      uploadUrl: '<?php echo Yii::app()->request->baseUrl; ?>/admin/patient/upload',
      maxFileCount: 1,
      initialPreviewShowDelete: false,
      <?php echo $operation['shsf_cs_image'] ? 'initialPreview: ["<img src=\''.$operation['shsf_cs_image'].'\' class=\'file-preview-image\'>",],initialPreviewConfig: [  {caption: "超声影像.jpg", width: "120px", url: "'.Yii::app()->request->baseUrl.'/admin/patient/uploadDel", key: 1},],' : ''; ?>
  });

  $('#shsf_cs_image').on('fileuploaded', function(event, data, previewId, index) {
    if (data.response.code == 0) {
      $('#shsf_cs_image_value').val(data.response.url)
    }else {
      alert('图片上传失败，请稍候再试');
    }
  });

  $('#shsf_cs_image').on('filecleared', function(event) {
    $('#shsf_cs_image_value').val('');
  });

  // 打开图片预览
  $('.file-preview-image').each(function() {
    $(this).click(function(){
      window.open($(this).attr('src'));
    });

  });

  $('#submit').click(function(){
    var href = $('#main-tablist li[class="active"] a').attr('href');
    if (href == '#patient') {
      //验证元素
      if(!validator.element('#name') || !validator.element('#born') || !validator.element('#place') || !validator.element('#phone') || !validator.element('#address') || !validator.element('#height')){
        return true;
      }
      $('#submit').text('下一步');
      $('#submit').attr('type','button');
      $('#main-tablist a[href="#diagnostic"]').tab('show');
      return false;
    }
    if (href == '#diagnostic') {
      if( !validator.element('#jpcysz_shou_1') || !validator.element('#jpcysz_yz_1')){
        return true;
      }
      $('#main-tablist a[href="#operation"]').tab('show');
      $('#submit').text('提交');
      $('#submit').attr('type','submit');
      return false;
    }

  });

  $('#main-tablist a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    var href = $(this).attr('href');
    if (href == '#patient') {
      $('#submit').text('下一步');
      $('#submit').attr('type','button');
    }
    if (href == '#diagnostic') {
      $('#submit').text('下一步');
      $('#submit').attr('type','button');
    }
    if (href == '#operation') {
      $('#submit').text('提交');
      $('#submit').attr('type','submit');
    }
  });

  //计算BMI
  function getBMI(height,weight){
    if (!isNaN(height) && !isNaN(weight) && height != 0) {
      // toFixed
      return weight / Math.pow(height/100,2);
    }
    return 0;
  }


</script>
