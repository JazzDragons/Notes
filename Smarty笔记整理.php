Smarty模版引擎技术
================================================================
一、什么是smarty模版引擎？
--------------------------------------------------------
 	什么是smarty？
		Smarty是采用php写的一个模版引擎，设计的目的是要将php代码与html代码分离，
		使php程序员只专注于php代码的编写，网页美工只专注于网页的美化
 	没有模版引擎时出现的问题？
		html中php代码比重越来越大
		页面的数量越来越多
		程序设计与美工设计分工不明确
 	传统的php文件:
		1. php代码跟html混编在一起，不利于程序员和美工的分工，程序员和美工不能同时修改一个文件
		2.数据的传递同一页面传递，php数据在页面中的显示需要使用php标记
			比如：<?php  echo $username?>
			index.php

 
 	采用模版引擎后:
		1.	php代码与html代码分离开了，php代码放在一个单独的php文件中，html代码放在一个单独的html文件中
		2.	数据的传递首现php中的数据先给了模版引擎，然后模版引擎再把接收到的数据给模版文件显示。
		3.  模版文件中不再有php代码或者说php标记的出现，模版中显示的数据都是通过模版引擎的标记显示出来的
			index.php    smarty模版引擎    index.html
		 
 	目前php的模版引擎很多，为什么要使用smarty模版引擎？
		1.	一般的模版引擎，如，phplib   都是在建立模版对象时取得要解析的模版，然后把变量套入后，再通过parse()这个方法来解析模版，最后再将网页输出，总结成一句话，那句是每次执行的时候都要重新解析一遍
		2.	对于smarty模版引擎来说，不必在程序里再做parse()这样的操作了，smarty会自动帮我们做，而且已经编译过的网页，如果在没有改动的情况下，smarty会跳过重新编译的动作而直接去执行编译过的网页，以节省编译时间。
 	
	Smarty的其它优点:
		1.	速度快：相对于其它的模版引擎而言的
		2.	编译型：采用smarty编写的程序在运行时会编译成一个非模版技术的php文件。这个文件采用了php与html混合的方式，在下一次访问模版时将web请求直接转换到这个文件中，而无需重新编译(在模版文件没有改动的情况下)
		3.	缓存技术：它可以将用户最终看到的html网页缓存成一个静态的html网页。当用户开启缓存时，可以设置缓存时间，在缓存文件没到期之前，将用户的请求直接转换到这个静态的缓存文件，相当于调用了一个静态的html文件。
		4.	模版中可以使用流程控制语句。
 	
	不适合使用smarty的地方
		1.	需要实时更新的内容，例如：股票显示，它需要经常对数据进行更新
		2.	小项目。
	
	Smarty模版引擎运作流程。
		①在php程序运行时，初始化smarty模版引擎
		②smarty模版引擎读取模版文件(.html或tpl文件)
		③在读取模版文件的时候，smarty模版引擎会自动判断该模版文件是否需要重新编译。
		④如果不需要重新编译，则直接进行模版变量替换。
		⑤如果是第一次执行此程序文件或者说模版被改动了，那么就需要重新编译后再进行模版变量替换。
		⑥最终执行的是编译后的php文件。
		⑦输出结果到浏览器。

二、一个简单的使用smarty模版引擎技术的小例子
----------------------------------------------------------
 	到官方网站去下载smarty模版引擎压缩包
		官网：http://www.smarty.net 
				 
 	解压此压缩包，发现其下有一个libs文件夹，将libs文件夹重命名为smarty，
		并移动到网站根目录下的libs文件夹
 
 	打开smarty引擎libs文件夹，里面有如下文件：
		sysplugins:系统插件目录
		plugins：外部插件
		debug.tpl：输出debug调试信息输出的模板
		Smarty.class.php: smarty模版引擎核心类文件，要使用smarty模版引擎，首先要引入该文件
		SmartyBC.class.php:
	
	搭建Smarty模板示例：
		1. 将libs库目录复制过来。
		2. 创建一个模板目录templates模板文件存放目录
			创建一个configs配置文件目录
		3. 编写index.php文件（入口文件）做Smarty导入和创建
			//1.导入Smarty类
			require("libs/Smarty.class.php");

			//2.创建对象
			$smarty = new Smarty();

			//3.初始化信息
			$smarty->left_delimiter="{";	//重新定义Smarty模板的左定界符
			$smarty->right_delimiter="}";	//重新定义Smarty模板的右定界符
			//静态缓存
			$smarty->caching=true; //是否开启静态缓存 true(开启)
			$smarty->cache_lifetime=5; //设置缓存时间 （5表示缓存5秒钟）

			//4.放置变量：
			$smarty->assign("name","zhangsan");//向Smarty模板中放置变量name值为张三
			$smarty->assign("date",date("Y-m-d H:i:s"));//为模板放一个时间
			
			//5.加载模板：
			$smarty->display("index.html");

		4.使用浏览器访问index.php，将会创建目录templates_c和cache目录
		
		5. 最后的结构：
			根目录
			 |--libs 		//Smarty库
			 |   |--Smarty.class.php
			 |--templates 	//模板目录
			 |   |--index.html
			 |--templates_c //模板编译目录
			 |--cache		//模板静态缓存目录（注意需开启缓存）
			 |--configs		//配置文件目录
			 |--index.php   //php文件（入口）
			 
			 
		
 	简单的分析一下Smarty.class.php核心类文件
		它是一个类文件：类是由属性(变量)和方法构成
		类的名称：Smarty
		主要属性或变量：
			$template_dir:		模版目录，主要用来存放模版文件，如：.html文件、.tpl文件
			$compile_dir:		编译目录，主要用来存放编译后的php文件，即混编方式的文件
			$config_dir:		配置目录，主要用来存放公共的配置文件
			$cache_dir:			缓存目录，主要用来存放缓存文件
			$left_delimiter:	左边界符
			$right_delimiter:	右边界符
			$caching			是否开启缓存
			$cache_lifetime		定制缓存时间
			
		主要方法：
		assign():主要用来将php中的标量类型的数据赋值给模版变量。
		display():主要用来显示指定的模版文件

 	在使用smarty之前，首现需要对核心类文件(Smarty.class.php)进行配置

		//1.首现要引入核心类文件
		include_once “libs/smarty/Smarty.class.php”;
		//2.使用new关键字创建一个核心类实例对象
		$smarty=new Smarty();
		
		//3.配置
		
		$smarty->template_dir=”./templates”;//设置模版目录
		
		$smarty->compile_dir=”./templates_c”;//设置编译目录
		
		$smarty->config_dir=”./configs”;//设置公共配置文件目录
		
		$smarty->caching=false;//设置缓存,在项目调试期间一般不开启缓存
		
		$smarty->cache_dir=”./cache”;//设置缓存目录
		/*1.设置左右边界符,默认的左右边界符是一对大括号，实际应用中一般不使用默认的边界符，因为容易与javascript中函数的定义相冲突
		 2.以后模版中模版变量都要放在此左右边界符中
		*/
		$smarty->left_delimiter=”{”;
		$smarty->right_delimiter=”}”;

		//配置完成之后进行如下操作
		//4.将php中标量类型的值赋值给模版变量
		$smarty->assign(“username”,$username);
		//5.显示对应的模版文件，会根据$smarty->template_dir=”./templates”去当前目录下的templates文件夹下去寻找index.html文件
		$smarty->display(“index.html”);
			如上配置，我们需要确保当前文件夹下有如下目录，如果没有的话就手工建立
		templates     //存放模版文件
		templates_c   //存放编译目录
		configs       //存放公共配置文件
		cache        //存放缓存文件

1.	此时整个项目的文件部署:
		  根目录
			 |--libs
			 |   |--Smarty.class.php
			 |--templates
			 |   |--a.html
			 |--templates_c
			 |--cache
			 |--configs
			 |--init.inc.php
			 |--a.php
			 | 
			

2.	相对路径：在程序文件中引入外部文件或设置目录时都是以本文件为基础的
	比如：要在index.php文件中引入Smarty.class.php文件，因为Smarty.class.php文件位于libs/smarty文件夹下，而index.php文件又跟libs文件夹同级，所以应该这样引入：
		include_once “libs/smarty/Smarty.class.php”;
 	一个简单的使用smarty的小例子:

三、使用smarty模版引擎的步骤:
===========================================================
 	第一步:引入smarty核心类文件并创建一个smarty实例对象:
		include_once “libs/smarty/Smarty.class.php”;
		$smarty=new Smarty();

 	第二步:对核心类中属性或变量的配置 
		$smarty->template_dir=”./templates”;
		$smarty->compile_dir=”./templates_c”;
		$smarty->config_dir=”./configs”;
		$smarty->caching=false;
		$smarty->cache_dir=”./cache”;
		$smarty->left_delimiter=”{”;
		$smarty->right_delimiter=”}”;
		
 	第三步:给模版变量赋值
		$smarty->assign(“模版变量”,”值(变量|数组)”);
		比如:$smarty->assign(“username”,”张三”);

 	第四步:显示对应的模版文件
		$smarty->display(“模版文件名”);
		比如:$smarty->display(“index.html”);

 	第五步:在模版文件中使用smarty的左右边界符将模版变量显示出来
		<html>
			<head></head>
			<body>
				用户名:{$username}
			</body>
		</html>
		
四、Smarty应用之模版变量:分三种来源
===================================================================
 	从php中分配的变量
		1.	格式：$smarty->assign(“模版变量”,”值(变量|数组)”);
		2.	例如：$username=”小三”;
				//将php变量分配给模版变量
		$smarty->assign(“username”,$username);
		3.	在模版文件中通过左右边界符来显示模版变量
		例如：{$username}
 	
	{$smarty}保留变量
		1.使用保留变量可访问页面请求变量：get、post、server、request、session等
			例如：页面请求变量:
			{$smarty.get.username}    //相当于在php文件中访问$_GET[‘username’]
			{$smarty.post.username}   //相当于在php文件中访问$_POST[‘username’]
			{$smarty.session.username}//相当于在php文件中访问
			$_SESSION[‘username’]
			{$smarty.cookie.username}//相当于在php文件中访问$_COOKIE[‘username’]
			{$smarty.request.username}              //相当于在php文件中访问
			$_REQUEST[‘username’]
			{$smarty.server.REMOTE_ADDR}        //相当于在php文件中访问
			$_SERVER[‘REMOTE_ADDR’]

		2.使用保留变量可访问常量：const
			{$smarty.const.__FILE__}
		3.使用保留变量可读取配置文件的变量：config
			{$smarty.config.username}
			读取配置文件中的变量
				1.	配置文件应放在$smarty->config_dir=”./configs”指定的目录下面
				2.	配置文件的后缀名为 .conf
				3.	配置文件：myself.conf
		#全局配置变量
			title=“调用配置文件”    
			bgcolor=“red”
			border=5
			type=“计算机”
			name=“php从入门到精通”
		#局部变量
		[login]
			username=“用户名”
			password=“密  码”
4. 	一个配置变量占一行，并且后面没有以分号结尾
5.	模版中引用配置文件中的变量
			首先要加载配置文件：
			//加载配置文件，但是只能将全局变量加载进来
			{config_load file=“my.conf”}
			//如果要加载局部变量，需要使用section属性指定特定的节
			{config_load file=“my.conf” section=“login”}

			模版文件中引用配置文件中变量的方法：
			//第一种:需要使用两个#
			比如:{#title#}
        //使用{$smarty}保留变量
			比如:{$smarty.config.bgcolor}
			

=============================================================================================


=============================
    Smarty模板的使用
==============================
一、安装与测试：

1. 将Smarty-2.6.25.zip包中的libs文件拷出来。在创建一些目录：
   
  根目录
     |--libs
     |   |--Smarty.class.php
     |--templates
     |   |--a.tpl
     |--templates_c
     |--cache
     |--configs
     |--init.inc.php
     |--a.php
     | 
     |--admin
         |--aa.php

2.在init.inc.php文件中： 	
   <?php
	//Smarty的核心配置（安装配置）：

	require_once("./libs/Smarty.class.php");

	$tpl = new Smarty();

	$tpl->template_dir = "./templates"; //指定模板路径

	$tpl->compile_dir  = "./templates_c";//指定编译后路径

	$tpl->config_dir = "./configs"; //指定配置文件路径

	$tpl->caching = 0;	//是否释放采用静态缓存，建议开发时为0(不采用)，运行时为1.

	$tpl->cache_lifetime = 60*60*24*7; //保存静态缓存时间。(一周)

	$tpl->left_delimiter = "<{"; //指定模板开始定界符

	$tpl->right_delimiter= "}>"; //指定模板结束定界符

    ?>
 3. 在a.php中写入
    <?php
	require_once("init.inc.php");

	  //做内容替换
	$tpl->assign("title","第一个Smarty模板测试");
	$tpl->assign("content","欢迎使用Smarty模板！");

	//导入
	$tpl->display("a.tpl");

     ?>
 4. 在a.tpl文件中
        <html>
	   <head>
		   <title><{$title}></title>
	   </head>
	   <body>
		   <h2><{$title}></h2>
		   <{$content}>
	   <body>
	</html>

  5.测试：使用浏览器访问a.php文件。


 注意事项：
   1. 图片导入路径的使用，要以访问的php文件为相对路径。
   2. Smarty模板（tpl文件）文件存在模板路径的子目录下。如：tmplates/aa/b.tpl
       那么就是在a.php中，使用$tpl->display("aa/b.tpl");
   3. 当tpl模板页被分割成几个小tpl页时，可以使用include导入：
       如 <{include file="aa/head.tpl"}>

   4. 当使用Smarty模板的php页面分目录存储时：

    使用绝对路径：
    在init.inc.php文件中：
    
	$path="D:/Program Files/AppServ/www/lamp10/php_smarty";

	require_once($path."/libs/Smarty.class.php");

	$tpl = new Smarty();

	$tpl->template_dir = $path."/templates"; //指定模板路径

	$tpl->compile_dir  = $path."/templates_c";//指定编译后路径

	$tpl->config_dir = $path."/configs"; //指定配置文件路径

	$tpl->caching = 0;	//是否释放采用静态缓存，建议开发时为0(不采用)，运行时为1.

	$tpl->cache_lifetime = 60*60*24*7; //保存静态缓存时间。(一周)

	$tpl->left_delimiter = "<{"; //指定模板开始定界符

	$tpl->right_delimiter= "}>"; //指定模板结束定界符

	      


二、模板设计者篇
  1、基本语法
    a、模板注释被*号包围,例如 {* this is a comment *} ,而且客户不可见

  2、变量：
    a、从PHP分配的变量 ：
	Table of Contents[内容列表]	Hello {$firstname}
	Associative arrays[关联数组]	{$Contacts.phone.home}<br>
	Array indexes[数组下标]		{$Contacts[2][0]}<br>
	Objects[对象]  email:		{$person->email}<br>

    b、从配置文件引用的变量：
       # 在配置文件定义变量：
          如:在configs目录下创建一个配置文件foo.conf.
	  在文件中写入：
		;以下是全局配置信息
		mytitle=我的Smarty模板练习
		bodycolor=#cccccc

		;以下局部配置信息（区块）
		[one]
		aa=11111111
		bb=22222222
		[two]
		cc=33333333
		dd=44444444
       # 在tpl模板页（如1.tpl）中使用<{config_load file="foo.conf" section="two"}>
         即可使用标签输出　<{#mytitle#}> 输出："我的Smarty模板练习".
			   <{#cc#}>
       # {$smarty}保留变量可以被用于访问一些特殊的模板变量.
	  例如：<{$smarty.get.id}>  <==> $_GET["id"];  (PHP中)
	        <{$smarty.session.loginuser}> <==> $_SESSION["loginuser"];
	   还有：env、cookie request 
	        <{$smarty.now}> 时间戳
		当前系统时间：<{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}>	
	   在php中定义：define("WTO","国际世贸组织");
	   可在tpl中： 输出常量：<{$smarty.const.WTO}>
	   输出配置文件信息：<{$smarty.config.mytitle}>相当于：<{#mytitle#}>
	   
	   
	   
	   
--------------------------------------------------------------------------------------------

<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
        <style>
            h3{
                color:blue;
              }
        </style>
    </head>
    <body>
        <h3>{$title}</h3>
        <p style="color:{$color}">{$content}</p>
    </body>
</html>


<?php
//使用Smarty模板引擎

//1. 导入Smarty类
require("./libs/Smarty.class.php");

//2. 实例化
$smarty = new Smarty();

//3. 初始化（以下为常用smarty的默认配置）
$smarty->template_dir = "./templates"; //指定模板目录
$smarty->compile_dir = "./templates_c"; //指定模板编译目录（自动会创建）
$smarty->config_dir = "./configs";      //指定配置文件目录

$smarty->cache_dir = "./cache";      //模板静态缓存目录（自动会创建）
$smarty->caching = false;       //是否开启模板静态缓存
$smarty->cache_lifetime = -1;   //设置模板静态缓存时间（-1表示永不过期）

$smarty->left_delimiter = "{";   //模板左定界符变量
$smarty->right_delimiter = "}";   //模板右定界符变量

//4. 放置信息
$smarty->assign("title","Smarty模板引擎搭建实例");
$smarty->assign("content","自定义使用Smarty模板引擎实例");
$smarty->assign("color","red");

//5. 加载模板输出
$smarty->display("1.html");
?>


-------------------------------------------------------------------------------------------


<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
        <style>
            {literal} {* 忽略Smarty的解释 *}
            h3{color:blue;}
            h4{color:#666;}
            {/literal}
        </style>
    </head>
    <body>
        <h3>{$title}</h3>
        <a href="index.php">返回</a>
        <h4>输出整数：{$id}</h4>
        <h4>模板中的数值可以继续计算：{$id*2+60}</h4>
        <h4>输出字串：{$str}</h4>
        <h4>输出字串还可使用函数：{$str}的长度：{strlen($str)}</h4>
        <h4>输出数组：{$a}：{$a[0]}、{$a[1]}、{$a[2]}</h4>
        <h4>输出关联数组：{$stu}：{$stu['name']}、{$stu.age}</h4>
        <h4>输出对象中的属性和方法：{$ob->name}、{$ob->age} {$ob->getInfo()}</h4>
        <h4>{*模板中的注释：{$ob->name}、{$ob->age} {$ob->getInfo()}*}</h4>
        
    </body>
</html>


<?php
//使用Smarty模板引擎

//1.导入smarty的初始化文件
require("init.php");

//2. 放置信息
$smarty->assign("title","Smarty模板实例--基本语法：在模板中输出各种属性和变量信息");
//在模板中放置各种变量信息
$smarty->assign("id",100);
$smarty->assign("str","hello smarty!");
$smarty->assign("a",array(10,20,30,40));
$smarty->assign("stu",array("name"=>"张三","age"=>20,"sex"=>"男"));

$smarty->assign("ob",new Person());
class Person{
    public $name="qq";
    public $age=23;
    public function getInfo(){
        return $this->name.":".$this->age;
    }
}



//3. 加载模板输出
$smarty->display("1.html");
?>


--------------------------------------------------------------------------------------------
{myconfig.ini}
	name = zhangsan
	age = 22
	sex = man
{/myconfig.ini}



<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
       
    </head>
    <body>
        <h3>{$title}</h3>
        <a href="index.php">返回</a>
        
        <h3>使用smarty读取myconfig.ini配置文件中的信息</h3>
        {config_load file="myconfig.ini"}
        
        <h4>使用#号方式输出：{#name#}</h4>
        <h4>使用$smarty.config输出：{$smarty.config.sex}</h4>
        <h4>使用$smarty.config输出：{$smarty.config.age}</h4>
    </body>
</html>


<?php
//使用Smarty模板引擎

//1.导入smarty的初始化文件
require("init.php");

//2. 放置信息
$smarty->assign("title","在Smarty中读取配置文件信息");

//3. 加载模板输出
$smarty->display("2.html");
?>


-------------------------------------------------------------------------------------------
{lg.conf}
	[cn]
	title = 添加学生信息
	name = 姓名
	sex = 性别
	man = 男
	woman = 女
	age = 年龄
	classid = 班级
	submit = 提交
	reset = 重置

	[en]
	title = Add Student information
	name = name
	sex = sex
	man = man
	woman = woman
	age = age
	classid = classid
	submit = submit
	reset = reset
{/lg.conf}


{config_load file="lg.conf" section="{$lg}"}

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>{#title#}</title>
	</head>
	<body>
		<center>
			<h3>{#title#}</h3>
			<form action="action.php?a=insert" method="post">
			<table width="280" border="0">
				<tr>
					<td align="right">{#name#}：</td>
					<td><input type="text" name="name"/></td>
				</tr>
				<tr>
					<td align="right">{#age#}：</td>
					<td><input type="text" name="age"/></td>
				</tr>
				<tr>
					<td align="right">{#sex#}：</td>
					<td><input type="radio" name="sex" value="m"/>{#man#} 
					<input type="radio" name="sex" value="w"/>{#woman#}</td>
				</tr>
				<tr>
					<td align="right">{#classid#}：</td>
					<td><input type="text" name="classid"/></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="{#submit#}"/>
						<input type="reset" value="{#reset#}"/>
					</td>
				</tr>
			</table>
			</form>
            <br/>
            <a href="3.php?lg=cn">中文</a>
            <a href="3.php?lg=en">English</a>
		</center>
	</body>
</html>


<?php
//使用Smarty模板引擎

//1.导入smarty的初始化文件
require("init.php");

//2. 放置信息
$smarty->assign("title","使用Smarty读取配置文件信息来实现网页的国际化");
//处理语言选择
$lg = isset($_GET['lg'])?$_GET['lg']:"cn";
$smarty->assign("lg",$lg);

//3. 加载模板输出
$smarty->display("3.html");
?>


===========================================================================================
五、Smarty变量操作符或变量调节器
-------------------------------------------------
 	什么是smarty的变量操作符？
		1.	smarty模版引擎中有内置的一些函数，这些函数主要用来修饰或调节变量,
			我们称之为变量操作符或变量调节器,变量操作符主要用于操作变量，
			它可以帮助我们完成许多比较实用的功能，
			比如:首字母大写、拆分、替换、截取等等，
			这些功能通过smarty模版引擎可以很容易的在模版文件中实现，
			而不必再在php文件中通过php的内置函数去处理，这样的话就减少了php的代码量

 	如何使用smarty的变量操作符？
		1.语法中使用  “|”  来应用变量操作符,多个参数用   ”:”   分隔开来
				比如: 在模版文件中使用变量操作符截取前十个字符
                {$name|truncate:10}

		2.常见的smarty变量操作符
				capitalize [首字母大写] 
				count_characters [计算字符数] 
				cat [连接字符串] 
				count_paragraphs [计算段落数]
				count_sentences [计算句数]
				count_words [计算词数]
				date_format [时间格式]
				default [默认]
				escape [转码]
				indent[缩进]
				lower[小写 ]
				nl2br[换行符替换成<br />]
				regex_replace[正则替换]
				replace[替换]
				spacify[插空]
				string_format[字符串格式化]
				strip[去除(多余空格)]
				strip_tags[去除html标签]
				truncate[截取]
				upper[大写]
				wordwrap[行宽约束]
		3.使用smarty变量操作符的例子
			例如:
				日期:{$smarty.new|date_format:”%Y-%m-%d”}
				变量中的字符数(包括空格):{$str|count_characters:true}
				多个变量操作符修饰一个变量:{$str|nl2br|upper|cat:”张三”}
				模版变量+“张三”:{$str1|cat:”张三”}
				缩进四个空白字符，并使用*来代替:{$str2|indent:4:”*”}
				把变量中的”hello”替换为“world”:{$str3|replace:”hello”,”world”}


六、Smarty模版引擎的内置函数(或标记)
--------------------------------------------------------------------------
 	foreach标记
		1.foreach标记处理数组
			在模版中必须使用成对的foreach标签遍历数组中的数据，
			而且必须设置from和item两个属性
			格式:{foreach from=$users item=user key=key}
		2.foreach标记的属性
			(1)from:待循环数组的名称
			(2)item:当前元素的变量名称
			(3)key:当前元素的键名
			(4)name:该循环的名称
		3.foreachelse子标记
			(1)当from属性指定的数组为空时,则输出foreachelse区域中的内容
			(2)foreachelse必须与foreach一起使用
			(3)foreachelse没有结束标记
		4.使用案例：
			//循环一维数组:aaa为数组中当前元素的变量名称
			{foreach from=$user item=aaa}
					{$aaa}
			{/foreach}

			//循环二维数组:如果users代表多个用户，那么user就代表当前用户
			{foreach from=$users item=user}
						姓名:{$user.username}
						性别:{$user.sex}
			{/foreach}

			//foreachelse子标记的用法:
			{foreach from=$users item=user}
						姓名:{$user.username}
						性别:{$user.sex}
			{foreachelse}
					暂时没有数据
			{/foreach}


 	include标记
		1.在模版文件中包含子模版
			格式:{include file=“模版文件路径”}
		2.例如
			(1)包含公共头部文件: {include file=“header.html”}
			(2)包含公共尾部文件: {include file=“footer.html”}
		3.两个比较使用的特性：
			(1)可在include标记中传入可选的assign属性，将导入的子模版内容不再当
				前模版中输出，而是赋值给assign属性指定的变量。
				例如:{include file=“header.html”  assign=“header”}
			(2)可以在引入子模版的同时向其传递各种属性
				例如:{include file=“header.html” title=“头部文件”}

 	if标记
		1.常跟条件修饰符一块使用
		2.常见的条件修饰符
			(1) eq:相等                neq:不等
			(2) mod:求模               gt:大于
			(3) is even:是否是偶数     not:非
			(4) ge:大于等于            lt:小于                       
			(5) lte:小于等于                           
			(6) ==:相等                !=:不相等
			(7) >:大于                 <:小于
			(8)<=:小于等于             >=:大于等于
        3.使用
				(1)模版文件中使用smarty模版引擎的if条件语句
					{if $name eq ‘admin’}
						<font color=“red”>管理员登录</font>
					{else}
						<font color=“red”>你没有登录权限</font>
					{/if}
				(2)模版文件中使用smarty模版引擎的if条件语句
					{if $quanxian eq ‘admin’}
						<font color=“red”>管理员登录</font>
					{elseif $name eq ‘xiaosan’}
						<font color=“red”>普通会员登录</font>
					{else}
						<font color=“red”>你没有登录权限</font>
					{/if}


 	literal标记
1.	literal文本的处理技巧
literal中的数据将被当作文本处理，此时模版将忽略其内部的所有字符信息
该特性用于显示有可能包含大括号等字符信息的javascript脚本
2.	例如:literal标记中的所以字符信息将被当作文本来处理
	{literal}<script>…</script>{/literal}

 	section标记
1.	section标记处理数组
在模版中必须使用成对的section标签遍历数组中的数据，而且必须设置name和loop两个属性
		格式:{section name=i step=2 start=2 max=10 loop=$users}
2.	section标记的属性：
(1)name:指定该循环的名称，当需要在section循环内输出变量时，必须在变量后加上中括号，中括号中必须包含name变量
	(2)loop:循环变量的名称
	(3)start:循环执行的初始索引位置
	(4)step:该值决定循环的步长，例如:step=2将之遍历下标为0、2
		、4等元素
	(5)max:设定最大循环次数，比如:max=2,代表最多循环2次
	(6)show:决定是否显示该循环，默认值为1-显示循环   0-禁止循环
           3. 	section循环区域中可以调用的变量
在section循环中有一些可供调用的变量名，用来访问该循环中一些特殊的值，而且在循环中必须通过smarty保留变量$smarty进行访问
					格式:{$smarty.foreach.foreachname.varname}
					(1)first:当前section循环在第一次执行时该变量的值为true
					(2)last:当前section循环在最后一次执行时该变量的值为true
					(3)rownum:循环的行数，与iteration变量差不多
					(4)index:显示当前循环的索引
					(5)iteration:显示循环的次数
           4.	sectionelse字标记
				(1)当loop属性指定的数组为空时,则输出sectionelse区域中的内容
				(2)sectionelse必须与section一起使用
				(3)sectionelse没有结束标记

				格式：
				{section name=i loop=$users}
					{$users[i].username}
				{sectionelse}
					<div><font color=“red”>暂时没有数据</font></div>
				{/section}
				
				
========================================================================================

三、 变量调节器：
-------------------------------------------------------------------------------
	1. 系统提供的调节器：
			capitalize [首字符大写] 
			cat [连接字符串] 
			count_characters [字符计数] 
			count_paragraphs [计算段数] 
			count_sentences [计算句数] 
			count_words [计算词数] 
			*date_format [格式化日期] 
			*default [默认值] 
			escape [转义] 
			indent [缩进] 
			*lower [小写] 
			*nl2br [换行符替换成 <br />] 
			regex_replace [正则替换] 
			*replace [替换] 
			spacify [插空] 
			string_format [字符串格式化] 
			strip [去除(多余空格)] 
			strip_tags [去除html标签] 
			*truncate [截取] 
			*upper [大写] 
			wordwrap [行宽约束] 

	2. 自定义调节器(采用插件文件方式):
		2.1 在smarty模板的libs/plugins/目录下创建调节器：
			调节器文件名：modifier.调节器名.php
			
			注意：若是自定义的的调节器不在libs/plugins/目录下，需要使用下面Smarty的方法追加。
				  如： smarty->addPluginsDir("./libs/myplugins");//追加一个插件目录的方式
				  注意清除编译缓存目录
		2.2 在这个文件里的函数名：
				function smarty_modifier_调节器函数名(参数列表...){ //..... }
	 
			例如：	
			/**
			 * 自定义调节器：字符串截取函数
			 * 参数：
			 *    $str:表示被截取的字符串
			 *    $len:保留字串的长度值。默认值：10
			 */
			function smarty_modifier_mystr($str,$len=10){
				if(strlen($str)>$len){
				   return substr($str,0,$len)."...";
				}else{
				   return $str;
				}
			}
			注意：在使用是，要按函数的参数顺序来。
		2.3 使用{$str|调节器名}

	 练习：自定义一个调节器：myfont（$str,$size,$color）
			如：{$str|myfont:7:"red"}  =>输出： <font size="7" color="red">$str</font>
	
	3. 自定义调节器(采用注册调节器方式)：
		除了上面的方法外还有一个方式可以定义一个变量的调节器
		使用Smarty的一个方法：registerPlugin("modifier","调节器名", "被指定的函数名");
		例如：$smarty->registerPlugin("modifier","mystrlen","strlen");//注册一个调节器的函数。
			  使用：{$str|mystrlen} //输出str字串的长度

	4. 组合调节器：
		{$articleTitle}
		{$articleTitle|upper|spacify}
		{$articleTitle|lower|spacify|truncate}
		{$articleTitle|lower|truncate:30|spacify}
		{$articleTitle|lower|spacify|truncate:30:". . ."}


四、Smarty的函数		  
----------------------------------------------------------------
	格式：{函数名 属性1="值1" 属性2="值2" }
		  {/函数名}
	
	1. Smarty内置的函数
		*{$var=}  简写模板中定义变量（同assign），{$name='Bob'}{$user.name="Bob"}{$users[]="Bob"} 
		{append} 在模板执行期间建立或追加模板变量数组。
		*{assign} 在模板中定义并变量，并赋值
		{block} 用来定义一个命名的模板继承源区域。
		{call} 用来调用{function}标签定义的模板函数
		{capture} 用来捕获模板输出的数据并将其存储到一个变量里，而不是将它们输出到页面。
		*{config_load} 载入配置文件：用来从配置文件中加载config变量（#variables#）到模版。 
		{debug} 跳转到调试控制页面。
		{extends} 标签用在模板继承中子模版对父模板的继承。
		*{for} 简单的循环
		*{foreach},{foreachelse} 
			格式：{foreach $list as [$k=>]$v}
						//输出$k / $v
					
				  {/foreach}
		{function} 用来在模板中创建函数，可以像调用插件函数一样调用它们。
		*{if},{elseif},{else} 
		*{include} 包含其他模板
		{include_php} 在Smarty新版本中已被废弃，还是用你自己编写的php脚本或插件函数来代替它吧！
		{insert} 标签类似于{include}标签，不同之处是即使打开caching，{insert}所包含的内容也不会被缓存，每次调用模板都会执行{insert}。 
			该特性可以广泛应用于广告条、投票、实时天气预报、搜索结果、反馈信息等区域。
		{ldelim},{rdelim} 用来转义模版定界符，默认值为“{”和“}”。
		*{literal} 标签区域内的数据将按字面意思处理，代表性地是用在javascript/css语块周围
		{nocache} 用来禁止模版块缓存，每个{nocache}应与{/nocache}成对出现。
		{php} 已被Smarty弃用，不应再使用。还是用你自己编写的php脚本或插件函数来代替它吧！
		*{section},{sectionelse} 
		{while} 

	
	2. Smarty扩展函数（Smarty自定义的）
		{counter} 
		{cycle} 
		{eval} 
		{fetch} 
		{html_checkboxes} 
		{html_image} 
		{html_options} 
		{html_radios} 
		{html_select_date} 
		{html_select_time} 
		{html_table} 
		{mailto} 
		{math} 
		{textformat} 

	3. 自定义函数
		3.1 使用定义函数插件使用
			
			
		3.2 使用注册函数方式
			//注册
			格式：$smarty->registerPlugin("function","注册别名","函数名");
			如：
			$smarty->registerPlugin("function","fundemo","demo");  
			function demo(){
				return "<h3>注册式自定义函数测试</h3>";
			}
			$smarty->registerPlugin("function","mytime","time"); 
			使用：
			<{fundemo}>
			<{mytime}>
	
	  4. 如何在模板中使用自定义的函数：
		第一种：使用register_function注册函数的方式：特点针对于某些模板的使用
		   在PHP文件中：
			//自定义函数
			function myfun($a){
			  if(empty($a[color])){
				$a[color]="#FFFFFF";
			  }
			  if(empty($a[size])){
				$a[size]=4;
			  }
			  echo "<font color='{$a[color]}' size='{$a[size]}'>#####################</font><br/>";
			}
				//注册函数
			$tpl->register_function("fun","myfun");
			在模板中：使用
			<{fun color="red" size=7 }>
			<{fun color="blue" size=5 }>
			<{fun color="green" size=3 }>
			<{fun}>
		
		 第二种方式：采用Samrty插件式的定义函数。特点不用注册，而且所有模板页都可以使用。
		在Samrty模板的libs/plugins/目录下定义：
		   注意：1.文件名必须是: function.自定义函数名.php
				如：function.mytable.php
				 2.在文件里：函数名必须是： funciton smarty_function_自定义函数名(参数名,&$smarty){...}
			如：
				<?php
				   /**
					* 自定义绘制表格函数mytable，
					* 参数$p数组中
					*   rows：表的行数. 默认2行
					*   cols：表的列数。默认2列
					*   content：表格填充内容：默认："*"
					*/
				   function smarty_function_mytable($p,&$smarty){
					   if(empty($p[rows])){
					  $p[rows]=2;
					   }
					   if(empty($p[cols])){
					  $p[cols]=2;
					   }
					   if(empty($p[content])){
					  $p[content]="*";
					   }
					   //开始绘制表格
					   $table ="<table width=60% border=1>";
					   for($i=0;$i<$p[rows];$i++){ //循环行
					  $table.="<tr>";
					  for($j=0;$j<$p[cols];$j++){ //循环列
						 $table.="<td>{$p[content]}</td>";
					  }
					  $table.="</tr>";
					   }
					   $table.="</table>";

					   return $table;
				   }
				?>

			   3. 使用：<{mytable rows="10" cols="10" content="###"}><br/>
					<{mytable}>
          
	5. 自定义块状函数：
		<?php
			//定义块状函数：
			function do_translation ($params, $content, $smarty, &$repeat, $template){
				if (isset($content)){    
					$lang = $params["lang"];    // do some translation with $content
					return $translation;  
				}
			}
			
			//注册到Smarty模板中
			$smarty->registerPlugin("block","translate", "do_translation");
		?>   
		
		使用
		Where the template is:{translate lang="br"}Hello, world!{/translate}
		
------------------------------------------------------------------------------------------

<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
    </head>
    <body>
        {capture name="mycapture"}
            这是一段被捕获的信息
        {/capture}
        <h2>{$title}</h2>
        <h4>当前时间戳：{$smarty.now} : {time()}</h4>
        <h4>当前时间戳的日期格式：{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"} : {date("Y-m-d H:i:s",time())}</h4>
        <h4>在模板中输出常量：{$smarty.const.PI}</h4>
        <h4>在模板中输出GET中的id：{$smarty.get.id}</h4>
        <h4>在模板中输出POST中的name：{$smarty.post.name}</h4>
        <h4>在模板中输出coookie中的loginuser：{$smarty.cookies.loginuser}</h4>
        <h4>在模板中输出session中的vipuser：{$smarty.session.vipuser}</h4>
        <h4>输出被捕获的信息：{$smarty.capture.mycapture}</h4>
        <br/>
        <h4>当前模板名：{$smarty.template}</h4>
        <h4>当前模板目录名：{$smarty.current_dir}</h4>
        <h4>当前Smarty模板版本号：{$smarty.version}</h4>
        <h4>当前Smarty模板的左右定界符：{$smarty.ldelim} {$smarty.rdelim}</h4>
    </body>
</html>

<?php
session_start(); //开启session会话
//Smarty实例的主文件

//1.导入Smarty的初始化文件
require("init.php");

//2. 向smarty中放置信息
$smarty->assign("title","Smarty模板实例--保留变量");

//定义一个常量
define("PI",3.14); 
//向get中放信息
$_GET['id']=100;
//向POST中放置信息
$_POST['name']="zhangsan";
//向Cookie中放置信息
setCookie("loginuser","王五",time()+1200,"/");
//向Session放置信息
$_SESSION['vipuser']="赵六";


//3. 加载模板并输出
$smarty->display("1.html");
?>


----------------------------------------------------------------------------------------

<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
    </head>
    <body>

        <h2>{$title}</h2>
        {* 定义一个字串 *}
        {$str = "this is used to capitalize the first letter of all words in a variable"}
        {$name = "zhangsan"} 
		{$content="<b><a href='2.php'>我的html信息</a></b>"}
        <ul>
            <li>原字串值：{$str}</li>
            <li>首字符大写：{$str|capitalize}</li>
            <li>统计字符数：{$str|count_characters}</li>
            <li>统计字符长度：{strlen($str)}</li>
            <li>计算单词个数：{$str|count_words}</li>
            <li>连接字串：{$name|cat:"你好！"}</li>
            <li>连接字串：{$name}你好！</li>
            <li>日期格式化：{$smarty.now|date_format:"%Y-%m-%d"}</li>
            <li>默认值：你好！{$name|default:"游客"}</li> 
            <li>格式化输出HTML内容：{$content|escape}</li> 
            <li>缩进6空格输出：{$name|indent:6:"&nbsp;"}</li> 
			{$str="Hello World!"}
            <li>原字串：{$str}</li>
            <li>大写：{$str|upper}</li>
            <li>小写：{$str|lower}</li>  
            <li>去除空格后大写：{$str|replace:" ":""|upper}</li> 
            {$str='<font color="red">This strips out markup tags, basically anything between </font>'}
            <li>原字串：{$str}</li>
            <li>删除标记后再字串截取：{$str|strip_tags|truncate:14:"..."}</li>
			
        </ul>
    
    </body>
</html>

<?php
session_start(); //开启session会话
//Smarty实例的主文件

//1.导入Smarty的初始化文件
require("init.php");

//2. 向smarty中放置信息
$smarty->assign("title","Smarty模板实例--变量调节器");

//3. 加载模板并输出
$smarty->display("2.html");
?>

----------------------------------------------------------------------------------------
{自定义Smarty插件 libs/plugins/modifier.mysubstr.php}
<?php
//自定义变量调节器实现中文字串截取

function smarty_modifier_mysubstr($string, $length){
    return mb_substr($string,0,$length,"utf-8");
}
?>
{/直接放到插件库里的}

<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
    </head>
    <body>
        <h2>{$title}</h2>
        {*使用自定义的变量调节器，实现数据的下拉框输出*}
        请选择:{$citydata|outselect:"cid":3}
        <br/><br/>
        
        {*使用自定义变量调节器输出文字长度*}
        {$str="自定义变量调节器"}
        长度：{$str|mystrlen:"utf-8"} <br/>
        长度：{$str|count_characters} <br/>
        
        <br/><br/>
        {*使用自定义的变量调节器实现中文字串截取*}
        {$str="自定义变量调节器实现中文字串截取"}
        原字串：{$str} <br/>
        截8个：{$str|mysubstr:8} <br/>
        
    </body>
</html>

<?php
session_start(); //开启session会话
//Smarty实例的主文件

//1.导入Smarty的初始化文件
require("init.php");

//2. 向smarty中放置信息
$smarty->assign("title","Smarty模板实例--自定义变量调节器");

//将信息放置到模板中
$smarty->assign("citydata",array(1=>"北京",2=>"上海",3=>"广州",4=>"深圳"));

//将下面自定义的fun函数以outselect名注册模板中作为调节使用
$smarty->registerPlugin("modifier","outselect","fun");

//将系统mb_strlen函数以mystrlen名注册到模板中作为变量调节器使用
$smarty->registerPlugin("modifier","mystrlen","mb_strlen");

//3. 加载模板并输出
$smarty->display("3.html");


//自定义输出下拉框函数
function fun($data,$name,$id=0){
    $str="<select name=\"{$name}\">";
    foreach($data as $k=>$v){
        $select="";
        if($id==$k){
            $select="selected";
        }
        $str.="<option value=\"{$k}\" {$select} >{$v}</option>";
    }
    $str.="</select>";
    return $str;
}
?>

-----------------------------------------------------------------------------------------

<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
    </head>
    <body>
        <h2>{$title}</h2>
        {*append使用(实现数组定义和追加值)*}
        {append var="stu" value="zhangsan" index="name"}
        {append "stu" 20 index="age"}
        输出数组stu的值：{$stu.name}:{$stu.age}
        
        <br/><br/>
        {*在模板中实现向模板放置变量操作*}
        {$name="lisi"} {*简写*} 
        取值：{$name}
        {assign var="id" value="200"} {*标准写*}
        取值：{$id}
        
        <br/><br/>
        {function name="fun"}
            我的自定义function函数
        {/function}
        
        {call "fun"}
        
        
    </body>
</html>

<?php
session_start(); //开启session会话
//Smarty实例的主文件

//1.导入Smarty的初始化文件
require("init.php");

//2. 向smarty中放置信息
$smarty->assign("title","Smarty模板实例--内置函数");
//$smarty->assign("name","lisi");

//3. 加载模板并输出
$smarty->display("4.html");
?>


===========================================================================================
七、Smarty缓存的应用
 	设置缓存
(1)$smarty->caching=true;          //开启缓存
(2)$smarty->cache_dir=“./cache”;//设置缓存目录
(3)$smarty->cache_lifetime=7*24*60*60;//设置缓存时间
(4)$smarty->display(“index.html”); 

 	每个页面多个缓存
比如:发布文章的时候，使用同一模版时会生成不同的页面显示。如果开启缓存，则通过同一个模版生成的多篇文章(多个实例)都需要被缓存，smarty实现这个比较容易，只需要在调用display()方法时，通过在第二个可选参数中提供一个值，这个值是为每一篇文章(或实例)指定的一个唯一的标识符，有几个不同的标识符就有几个不同的缓存。
    比如：$smarty->display(“news.html”,$_GET[‘newid’]);

 	怎样判断某个文件被缓存了？
(1) $smarty->is_cached(“index.html”);
(2) $smarty->is_cached(“news.html”,$_GET[‘newsid’]);

 	缓存的清除
(1) $smarty->clear_all_cache(); //清除所有缓存
(2) $smarty->clear_cache(‘index.tpl’); // 清除某一模版的缓存
(3) $smarty->clear_cache(‘index.tpl’,cache_id); // 清除指定缓存号的缓存

 	局部缓存
1.	insert函数默认是不缓存的,并且这个属性不能修改
2.	模版文件中：
<div>{insert name=“get_time”}</div>
3.	php文件中：
function insert_get_time(){
		return date(“Y-m-d H:i:s”);
}
4.	注意:方法的前缀必须是insert


-----------------------------------------------------------------------------------------


五、Smarty的缓存技术
----------------------------------------------
	1. 缓存的基本操作（整个缓存）
		$smarty->caching=true; //开启缓存
		$smarty->cache_lifetime =5;//缓存时间5秒
	
	2. 局部不缓存
		使用{nocache}函数
		
		<h3>缓存时间：<{$smarty.now}><h3>
		<{nocache}>
			<h3>不缓存时间：<{$smarty.now}><h3>
		<{/nocache}>
		<h3>缓存时间：<{$smarty.now}><h3>
		
	3. 优化缓存（不操作底层来使用缓存）
		
		 //获取数据库信息并缓存5秒。(当6.html不是很有效缓存文件时才执行数据查询)
		 if(!$smarty->isCached("6.html")){
			$m = new Model("stu");
			$stulist = $m->findAll(); //获取所有学生信息
			$smarty->assign("stulist",$stulist);
			$smarty->assign("time",time());
		  }
 
 $smarty->display("6.html");
		
	4. 同一个模板，产生不同缓存（解决内容详情页的缓存（因为模板只有一个））

	 //获取数据库信息并缓存5秒。(当6.html不是很有效缓存文件时才执行数据查询)
	 if(!$smarty->isCached("6.html",$_SERVER["REQUEST_URI"])){
		$m = new Model("stu");
		$stulist = $m->findAll(); //获取所有学生信息
		$smarty->assign("stulist",$stulist);
		$smarty->assign("time",time());
	  }
	 
	 $smarty->display("6.html",$_SERVER["REQUEST_URI"]);
	 
	 
----------------------------------------------------------------------------------------
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
    </head>
    <body>
        <h2>{$title}</h2>
        {*模板调试 debug*}
        使用模板中的for循环输出1到10的值：
        {for $i=1 to 10}
            {$i}
        {/for}
        <br/><br/>
        使用模板中的for循环输出0到10的偶数值：
        {for $i=0 to 10 step 2}
            {$i}
        {/for}
        
        <hr/>
        使用foreach遍历数据a数组的值：
        {foreach $a as $v}
            {$v}
        {/foreach}
        <br/>
        使用foreach遍历模板中的二维数组:<br/>
        {foreach $list as $stu}
            {$stu@iteration}:{$stu.name}:{$stu.age}:{$stu.sex}<br/>
        {foreachelse}
            没有数据
        {/foreach}
        <br/>共计输出总数据{$stu@total}条；

        <hr/>
        使用section遍历数据：
        {section name="i" loop=$a}
            {$a[i]}
        {/section}
        <br/>
        使用section遍历模板中的二维数组:<br/>
        {section name='sid' loop=$list}
            {$smarty.section.sid.iteration}:
            {$list[sid].name}:
            {$list[sid].age}:
            {$list[sid].sex}<br/>
        {/section}
    </body>
</html>

<?php
//主入口文件

//1.导入smarty初始化文件
require("init.php");

//2. 向模板中放置信息
$smarty->assign("title","Smarty模板实例--内置函数");

$smarty->assign("a",array(10,20,30,40));

$list = array(
    array("name"=>"zhangsan","age"=>20,"sex"=>"man"),
    array("name"=>"lisi","age"=>21,"sex"=>"woman"),
    array("name"=>"wangwu","age"=>22,"sex"=>"woman"),
    array("name"=>"zhaoliu","age"=>23,"sex"=>"man"),
);
$smarty->assign("list",$list);


//3. 加载模板输出
$smarty->display("1.html");
?>

----------------------------------------------------------------------------------------

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
    </head>
    <body>
        <h2>{$title}</h2>
        使用php中的函数获取时间戳：{time()}<br/>
        使用自定的模板函数获取时间戳：{mytime}<br/>
        <hr/>
        
        使用自定义模板函数实现数据输出:
        <br/><br/>
        {mytable name="$list" a="b" c="d"}
    </body>
</html>

<?php
//主入口文件

//1.导入smarty初始化文件
require("init.php");

//2. 向模板中放置信息
$smarty->assign("title","Smarty模板实例--自定义模板中的函数");

//将系统函数time以mytime名注册到模板中作为模板函数使用
$smarty->registerPlugin("function","mytime","time");

$list = array(
    array("name"=>"zhangsan","age"=>20,"sex"=>"man"),
    array("name"=>"lisi","age"=>21,"sex"=>"woman"),
    array("name"=>"wangwu","age"=>22,"sex"=>"woman"),
    array("name"=>"zhaoliu","age"=>23,"sex"=>"man"),
);
$smarty->assign("list",$list);

//将自定义函数fun以mytable名注册到模板中作为模板函数使用
$smarty->registerPlugin("function","mytable","fun");

//3. 加载模板输出
$smarty->display("2.html");


//自定义一个模板函数实现数据的表格输出
function fun($dd){
   $str="<table width=\"600\" border=\"1\">";
   foreach($dd['name'] as $v){
        $str.="<tr>";
        $str.="<td>{$v['name']}</td>";
        $str.="<td>{$v['sex']}</td>";
        $str.="<td>{$v['age']}</td>";
        $str.="</tr>";
   }
   $str.="</table>";
   
   return $str;
}
?>

----------------------------------------------------------------------------------------

extends file="top.html"}

{block name="body"}
    {foreach $list as $v}
        {$v.name}:{$v.sex}:{$v.age}<br/>
    {/foreach}
{/block}

<?php
//主入口文件

//1.导入smarty初始化文件
require("init.php");

//2. 向模板中放置信息
$smarty->assign("title","Smarty模板实例--模板继承");

$list = array(
    array("name"=>"zhangsan","age"=>20,"sex"=>"man"),
    array("name"=>"lisi","age"=>21,"sex"=>"woman"),
    array("name"=>"wangwu","age"=>22,"sex"=>"woman"),
    array("name"=>"zhaoliu","age"=>23,"sex"=>"man"),
);
$smarty->assign("list",$list);

//3. 加载模板输出
$smarty->display("3.html");
?>

---------------------------------------------------------------------------------------
修改HTML
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
    </head>
    <body>
        <center>
            {include file="stu2/menu.html"}
            
            <h3>编辑信息</h3>
            <form action="stu2.php?a=update" method="post">
                <input type="hidden" name="id" value="{$ob.id}"/>
            <table width="280" border="0">
                <tr>
                    <td align="right">姓名：</td>
                    <td><input type="text" name="name" value="{$ob.name}"/></td>
                </tr>
                <tr>
                    <td align="right">年龄：</td>
                    <td><input type="text" name="age" value="{$ob.age}"/></td>
                </tr>
                <tr>
                    <td align="right">性别：</td>
                    <td><input type="radio" name="sex" value="m" {if $ob.sex=="m"}checked{/if}/>男
                        <input type="radio" name="sex" value="w" {if $ob.sex=="w"}checked{/if}/>女</td>
                </tr>
                <tr>
                    <td align="right">班级：</td>
                    <td><input type="text" name="classid"  value="{$ob.classid}"/></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" value="提交"/>
                        <input type="reset" value="重置"/>
                    </td>
                </tr>
            </table>
            </form>
        </center>
    </body>
</html>

<?php
//学生信息控制文件(本文件就是将来框架中的控制器C)

//1. 导入各种信息
require("init.php");
require("./configs/config.php");
require("./model/Model.class.php");

//2. 实例化Model类
$mod = new Model("stu");
$smarty->assign("title","学生信息管理");
//3. 根据参数a的值执行对应的操作
switch($_GET['a']){
    case "insert":  //执行添加
        $m = $mod->insert();
        if($m>0){
            $smarty->assign("info","添加成功！");
        }else{
            $smarty->assign("info","添加失败！");
        }
        $smarty->display("stu2/info.html");
        //清除缓存
        $smarty->clearCache("stu2/index.html");
        break;
    case "del": //执行删除
        $m = $mod->delete($_GET['id']);
        $smarty->assign("info","成功删除{$m}条数据！");
        $smarty->display("stu2/info.html");
        //清除缓存
        $smarty->clearCache("stu2/index.html");
        $smarty->clearCache("stu2/edit.html",$_GET['id']); //清除被修改信息缓存
        break;
    case "update":  //执行修改
        $m = $mod->update();
        if($m>0){
            $smarty->assign("info","修改成功！");
        }else{
            $smarty->assign("info","修改失败！");
        }
        $smarty->display("stu2/info.html");
        //清除缓存
        $smarty->clearCache("stu2/index.html"); //浏览页缓存
        $smarty->clearCache("stu2/edit.html",$_POST['id']); //清除被修改信息缓存
        break;
    case "add": //加载添加表单
        $smarty->display("stu2/add.html");
        break;
    case "edit": //加载修改表单
        //开启smarty缓存
        $smarty->caching=true;
        //判断是否已有缓存
        if(!$smarty->isCached("stu2/edit.html",$_GET['id'])){
            //获取修改信息
            $ob = $mod->find($_GET['id']);
            $smarty->assign("ob",$ob);
        }
        $smarty->display("stu2/edit.html",$_GET['id']);
        break;
    case "index": //浏览
    default:
        //开启smarty缓存
        $smarty->caching=true;
        //判断是否已有缓存
        if(!$smarty->isCached("stu2/index.html")){
            $list = $mod->select();
            $smarty->assign("list",$list); //将查询结果放置到模板中
        }
        $smarty->display("stu2/index.html");
        break;
}   
?>