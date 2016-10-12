<?php
header("Content-type:text/html;charset=utf-8");
//php生成GUID
function getGuid() {
	 $charid = strtoupper(md5(uniqid(mt_rand(), true)));
	 $hyphen = chr(45);
	 $uuid = substr($charid, 0, 8).$hyphen
	 .substr($charid, 8, 4).$hyphen
	 .substr($charid,12, 4).$hyphen
	 .substr($charid,16, 4).$hyphen
	 .substr($charid,20,12);
	 return $uuid;
}
$file=$_FILES["file"];
if($file["error"]==0){
	$typeArr=explode("/", $file["type"]);	
	if($typeArr[0]=="image"){
		$imgType = ["png","jpeg","jpg"];
		if(in_array($typeArr[1], $imgType)){
			$imgName = getGuid().".".$typeArr[1];
			if(move_uploaded_file($file["tmp_name"], "../View/img/".$imgName)){
				//echo "上传成功";
			}else{
				echo "上传失败";
			}
		}else{
			echo "所选文件类型不匹配";
		}
	}else{
		echo "所选文件不是图片";
	}
}else{
	echo "上传出错！！！";
}
?>