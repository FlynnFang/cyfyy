<ul id="left-nav" class="nav nav-sidebar">
  <?php foreach ($this->menuGroup as $key => $value) { ?>
      <?php echo $key != '0' ? '<li class="nav-header">'.Yii::app()->params['group'][$key].'</li>' : '';?>
      <?php foreach ($this->menus as $k => $menu) {
        if($menu['group'] == $key){
          echo $this->currentMenu == $menu['code'] ?  '<li class="active"> <a href="'.$menu['url'].'">'.$menu['name'].'</a></li>' : '<li><a href="'.$menu['url'].'">'.$menu["name"].'</a></li>';
        }
      }
  ?>
  <?php } ?>
  <!-- <li class="active"><a href="/admin/dashboard/">Home </span></a></li>
  <li><a href="/admin/patient">病历管理</a></li>
  <li><a href="#">随访记录</a></li>
  <li><a href="#">数据分析</a></li>
  <li><a href="#">系统管理</a></li> -->
</ul>
