<?php
/**
 * 
 * 分页
 * @author admin
 * 
 * demo
 * 
 * $paginationSetting = array(
 *   'totalCount' => 100,//记录数
 *	 'currentPage'=> 1,//当前页码
 *	 'pageSize' => 30,//每页多少条记录
 *	 'pageRange' => 6,//显示页码数
 * );
 * 
 * $pagination = new Pagination($paginationSetting);
 */
class Pagination {

    const RANGE_STYLE_FIX = 1;

    const RANGE_STYLE_RELATIVE = 2;

    /**
     * Total Result Count
     *
     * @var int
     */
    private $_total_count;

    /**
     * Each Page Size
     *
     * @var int
     */
    private $_page_size;

    /**
     * Page Count
     *
     * @var int
     */
    private $_page_count;

    /**
     * Current Page Number
     *
     * @var int
     */
    private $_current_page;

    private $_range;

    /**
     * PageSet Constructor
     *
     * @param int $total_count
     * @param int $page_size
     * @param int $current_page
     */
    function __construct($params)
    {
        $this->_total_count = $params['totalCount'];
        $this->_page_size = $params['pageSize'];
        $this->_range = isset($params['pageRange']) ? $params['pageRange'] : 6;
        $this->_page_count = ceil($this->_total_count/$this->_page_size);

        $this->_current_page = $params['currentPage'] > 0 ? ($params['currentPage'] > $this->_page_count ? 1 : $params['currentPage']) : 1;
    }

    /**
     * Return Current Page Position
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->_current_page;
    }

    /**
     * Return Total Page Number
     *
     * @return int
     */
    public function getPageCount()
    {
        return $this->_page_count;
    }

    /**
     * Return MySQL Limit Offset
     *
     * @return int
     */
    public function getOffset()
    {
        return ($this->_current_page-1)*$this->_page_size;
    }

    /**
     * Return Page Size
     *
     * @return int
     */
    public function getPageSize()
    {
        return $this->_page_size;
    }

    /**
     * Return PageSet Range
     *
     * @return int
     */
    public function getRange()
    {
        return $this->_range;
    }

    /**
     * Return Range Start
     *
     * @param int $range
     * @return int
     */
    public function getRangeStart($style = 2)
    {
        $range = $this->_range;
        switch($style) {
            case self::RANGE_STYLE_FIX:
                if($this->_current_page%$range == 0)
                    return $this->_current_page - $range + 1;
                else
                    return $this->_current_page - $this->_current_page%$range + 1;
            case self::RANGE_STYLE_RELATIVE:
                $half_range = ceil($range/2);
                if($this->_current_page > $half_range) {
                    return $this->_current_page - $half_range;
                } else {
                    return 1;
                }
        }
    }

    /**
     * Return Rage End
     *
     * @param int $style
     * @return int
     */
    public function getRangeEnd($style = 2)
    {
        $start = $this->getRangeStart($style);
        $last = $start + $this->_range - 1;
        if($last > $this->_page_count) {
            return $this->_page_count;
        } else {
            return $last;
        }
    }
    
    /**
     * 
     * 打印需要模板页显示的html源码
     */
    public function printHtml($func = "goPage", $pageInputId = "m_page", $postFormId = "m_postForm")
    {
		$rangeStart = $this->getRangeStart();
		$rangeEnd = $this->getRangeEnd();
		$curPage = $this->getCurrentPage();
		$pageCount = $this->getPageCount();
            	
		$html .= "<div class=\"turnPage\">";
		$html .= "<span class=\"curTip\"><em class=\"cur\">{$curPage}</em>/<em class=\"cnt\">{$pageCount}</em></span>";

		if ($curPage == 1) 
		{
			$html .= "<span class=\"disabled\">&lt; 上一页</span>";
		}
		else 
		{
			$html .= "<a href=\"javascript:{$func}(" . intval($curPage-1) . ", '{$pageInputId}', '{$postFormId}');\">&lt; 上一页</a>";
		}
		
		for ($i = $rangeStart; $i <= $rangeEnd; $i++)
		{
			if ($i == $curPage)
			{
				$html .= "<span class=\"current\">{$curPage}</span>";
			}
			else 
			{
				$html .= "<a href=\"javascript:{$func}({$i}, '{$pageInputId}', '{$postFormId}');\">{$i}</a>";
			}			
		}
		
    	if ($curPage < $pageCount) 
		{
			$html .= "<a href=\"javascript:{$func}(" . intval($curPage+1) . ", '{$pageInputId}', '{$postFormId}');\">下一页  &gt;</a>";		
		}
		else 
		{
			$html .= "<span class=\"disabled\">下一页  &gt;</span>";
		}		
		
		return $html;
    }
}