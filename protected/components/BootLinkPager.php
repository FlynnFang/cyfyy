<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13-12-2
 * Time: 上午10:00
 */
class BootLinkPager extends CLinkPager{

    public function init()
    {
        if($this->maxButtonCount===null) $this->maxButtonCount=7;
        if($this->firstPageLabel===null) $this->firstPageLabel=Yii::t('yii','&laquo;');
        if($this->lastPageLabel===null) $this->lastPageLabel=Yii::t('yii','&raquo;');
        // if($this->nextPageLabel===null) $this->nextPageLabel=Mod::t('yii','>');
        // if($this->prevPageLabel===null) $this->prevPageLabel=Mod::t('yii','<');

        $this->htmlOptions['class']='pagination';
    }

    public function run()
    {
        $this->registerClientScript();
        $buttons = $this->createPageButtons();
        $page = $this->getCurrentPage(false) + 1;
        if(empty($buttons)) return;
        if($this->getPageCount() > 1) {
            echo $this->header;
            echo CHtml::tag('ul',$this->htmlOptions,implode("\n",$buttons));
            echo $this->footer;
        }
    }

    protected function createPageButton($label,$page,$class,$hidden,$selected)
    {
        // if($hidden || $selected)
  			//     $class.=' '.($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
        if ($selected) {
          $class = 'active';
        }else {
          $class = '';
        }
  		  return '<li class="'.$class.'">'.CHtml::link($label,$this->createPageUrl($page)).'</li>';
    }

    protected function createPageButtons()
    {
        if(($pageCount=$this->getPageCount())<=1)
            return array();
        list($beginPage,$endPage)=$this->getPageRange();
        $currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
        $buttons=array();

        // first page
        $buttons[]=$this->createPageButton($this->firstPageLabel,0,$this->firstPageCssClass,$currentPage<=0,false);

        // prev page
        // if(($page=$currentPage-1)<0)
        //     $page=0;
        // $buttons[]=$this->createPageButton($this->prevPageLabel,$page,$this->previousPageCssClass,$currentPage<=0,false);

        // internal pages
        for($i=$beginPage;$i<=$endPage;++$i)
            $buttons[]=$this->createPageButton($i+1,$i,$this->internalPageCssClass,false,$i==$currentPage);

        // next page
        // if(($page=$currentPage+1)>=$pageCount-1)
        //     $page=$pageCount-1;
        // $buttons[]=$this->createPageButton($this->nextPageLabel,$page,$this->nextPageCssClass,$currentPage>=$pageCount-1,false);

        // last page
        $buttons[]=$this->createPageButton($this->lastPageLabel,$pageCount-1,$this->lastPageCssClass,$currentPage>=$pageCount-1,false);

        return $buttons;
    }

}
