<?php
//公共函数库文件



/**
 *自定义一个文件上传处理函数
 *@param array $upfile 上传文件信息参数，如$_FILES['pic']。
 *@param string $path 指定上传文件存储路径
 *@param array $typelist 允许上传文件类型，默认值为array()表示不限制
 *      如：array("image/jpeg","image/png","image/gif") 表示只允许上传图片
 *@param int $maxsize 上传文件大小限制，默认值为0表示不限制大小
 *@return array 返回一个数组，内有两个数组成员
 *      第一个下标为error：值为true表示成功，false表示失败
 *      第二个下个为info：成功是放文件名，失败时放错误信息
 */
function uploadFile($upfile,$path,$typelist=array(),$maxsize=0){
    //1. 初始化上传文件信息
    $path = rtrim($path,"/")."/"; //处理一下上传文件存储路径
    $res = array("error"=>false,"info"=>""); //定义一个返回信息变量
    
    //2. 根据上传错误号判断上传是否成功
    if($upfile['error']>0){
        //判断对应错误信息
        switch($upfile['error']){
            case 1: $info = "上传的文件超过了php.ini中upload_max_filesize限制"; break;
            case 2: $info = "上传文件大小超过了表单中MAX_FILE_SIZE的限制"; break;
            case 3: $info = "文件只有部分被上传"; break;
            case 4: $info = "没有文件被上传"; break;
            case 6: $info = "找不到临时文件夹"; break;
            case 7: $info = "上传文件写入失败"; break;
            default: $info = "未知错误！"; break;
        }
        $res['info']=$info;
        return $res;
    }

    //3. 判断上传文件类型
    if(is_array($typelist) && count($typelist)>0){
        if(!in_array($upfile['type'],$typelist)){
           $res['info']="上传文件类型不符。";
           return $res;
        }
    }

    //4. 判断上传文件大小
    if($maxsize>0){
        if($upfile['size']>$maxsize){
           $res['info']="上传文件大小超出。";
           return $res;
        }
    }

    //5. 随机上传文件名
      $ext = pathinfo($upfile['name'],PATHINFO_EXTENSION); //获取上传文件的后缀名
      do{
        //随机文件名(并加上后缀)
        $newname = time().rand(10000,99999).".".$ext;
      }while(file_exists($path.$newname));
      
    //6. 执行上传文件处理
    //先判断是否是有效上传文件
    if(is_uploaded_file($upfile['tmp_name'])){
        //移动上传文件
        if(move_uploaded_file($upfile['tmp_name'],$path.$newname)){
            $res['info']=$newname; //保存上传后的文件名
            $res['error']=true; //设置上传成功标识
        }else{
            $res['info']="移动上传文件失败。";
        }
    }else{
        $res['info']="无效的上传文件。"; 
    }
    
    return $res; //返回结果
}


/**
 * 图片等比缩放函数(支持：gif、jpeg和png格式的图片)
 *
 * @param String $pic 被缩放的源图片名
 * @param String $path 被缩放图片的存储路径
 * @param int $width 缩放后的最大宽度
 * @param int $height 缩放后的最大高度
 * @param String $pre 缩放后的图片名前缀，默认值：s_
 * @return boolean 返回值 true表示成功！ false表示失败
 */
 function imageZoom($pic,$path,$width=100,$height=100,$pre="s_"){
	$path = rtrim($path,"/")."/";
	//获取原图片信息
	$info = getImageSize($path.$pic);
	$w = $info[0]; //宽度
	$h = $info[1]; //高度
	//根据原图片类型来创建图片资源画布
	switch($info[2]){
		case 1: //GIF
			$srcim = imagecreatefromgif($path.$pic);
			break;
		case 2: //JPG
			$srcim = imagecreatefromjpeg($path.$pic);
			break;
		case 3: //PNG
			$srcim = imagecreatefrompng($path.$pic);
			break;
		default:
			die("未知图片格式！");
	}
	//计算图片缩放后的大小
	if($width/$w<$height/$h){
		$dw=$width;
		$dh=$h*($width/$w);
	}else{
		$dw=$w*($height/$h);
		$dh=$height;
	}
	//创建模板图片画布
	$dstim = imagecreatetruecolor($dw,$dh);
	
	//执行缩放
	imagecopyresampled($dstim,$srcim,0,0,0,0,$dw,$dh,$w,$h);
	
	//输出图片
	switch($info[2]){
		case 1: //GIF
			imagegif($dstim,$path.$pre.$pic);
			break;
		case 2: //JPG
			imagejpeg($dstim,$path.$pre.$pic);
			break;
		case 3: //PNG
			imagepng($dstim,$path.$pre.$pic);
			break;
		default:
			die("未知图片格式！");
	}
	//销毁资源
	imagedestroy($dstim);
	imagedestroy($srcim);
	
	return true;
 }
