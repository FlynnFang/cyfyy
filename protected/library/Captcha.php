<?php 
class Captcha
{
    private $width;
    private $height;
    private $codeNum;
    private $code;
    private $im;
    private $pre;
    
    function __construct($pre="dayuw_")
    {
    	$this->pre = $pre;
    }
 
    function showImg($width=80, $height=20, $codeNum=4)
    {
        $this->width = $width;
        $this->height = $height;
        $this->codeNum = $codeNum;
            	
        //创建图片
        $this->createImg();
        //设置干扰元素
        $this->setDisturb();
        //设置验证码
        $this->setCaptcha();
        //输出图片
        $this->outputImg();
    }
 
    function getCaptcha()
    {
        return $this->code;
    }
 
    //创建图片
    private function createImg()
    {
        $this->im = imagecreatetruecolor($this->width, $this->height);
        $bgColor = imagecolorallocate($this->im, 0, 0, 0);
        imagefill($this->im, 0, 0, $bgColor);
    }
 
    //设置干扰元素
    private function setDisturb()
    {
        $area = ($this->width * $this->height) / 50;
        $disturbNum = ($area > 150) ? 150 : $area;
        //加入点干扰
        for ($i = 0; $i < $disturbNum; $i++) {
            $color = imagecolorallocate($this->im, rand(0, 255), rand(0, 255), rand(0, 255));
            imagesetpixel($this->im, rand(1, $this->width - 2), rand(1, $this->height - 2), $color);
        }
        //加入弧线
        for ($i = 0; $i <= 5; $i++) {
            $color = imagecolorallocate($this->im, rand(128, 255), rand(125, 255), rand(100, 255));
            imagearc($this->im, rand(0, $this->width), rand(0, $this->height), rand(30, 300), rand(20, 200), 50, 30, $color);
        }
    }
 
    //验证码
    private function createCode()
    {
        $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKMNPQRSTWXY";
 
        for ($i = 0; $i < $this->codeNum; $i++) {
            $this->code .= $str{rand(0, strlen($str) - 1)};
        }
        
        //保存验证码以便验证
        $code = md5($this->pre.strtolower($this->code));
        setcookie('captcha', $code, time() + 600);
    }
 
    //生成图片
    private function setCaptcha()
    {
        $this->createCode();
 
        for ($i = 0; $i < $this->codeNum; $i++) {
            $color = imagecolorallocate($this->im, rand(50, 250), rand(100, 250), rand(128, 250));
            $size = rand(floor($this->height / 1.5), floor($this->height / 1));
            $x = floor($this->width / $this->codeNum) * $i + 5;
            $y = rand(0, $this->height - 20);
            imagechar($this->im, $size, $x, $y, $this->code{$i}, $color);
        }
    }
 
    //输出图片
    private function outputImg()
    {
        if (imagetypes() & IMG_JPG) {
            header('Content-type:image/jpeg');
            imagejpeg($this->im);
        } elseif (imagetypes() & IMG_GIF) {
            header('Content-type: image/gif');
            imagegif($this->im);
        } elseif (imagetype() & IMG_PNG) {
            header('Content-type: image/png');
            imagepng($this->im);
        } else {
            die("对不起，系统不支持该图片类型!");
        }
    }
    
    //校验验证码
    public function validCaptcha()
    {
    	$cookieCode = isset($_COOKIE['captcha']) ? $_COOKIE['captcha'] : '';
    	$postCode = isset($_POST['captcha']) ? $_POST['captcha'] : '';
    	$code = md5($this->pre . strtolower($postCode));
    	
    	if ($cookieCode && $postCode && ( $code == $cookieCode)) 
    	{
    		return true;
    	}
    	
    	return false;
    }
}