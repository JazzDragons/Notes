<?php
PHP笔记整理
	
	PHP是什么？
	 PHP是超文本预处理器，在服务器端执行的，是嵌入到HTML中的脚本程序。
	 PHP是解释型语言（非编译型）。
	
	PHP的安装方式：
		1. window下：集成安装和分别安装(一个个单独安装)。
		2. linux系统下：rpm包的安装，源码包安装，yum源安装。
		
	每个软件的配置文件和日志文件：

	使用phpinfo测试（查看）php运行环境。

	一、LAMP环境：
-----------------------------------------------
	1. 在window系统下开发php，所以我们安装的软件是XAMP/WAMP等等集成环境。

	2. 安装成功后会有两个服务：Apache2.2 （端口：80）、MySQL5（端口：3306）
		还有一个php：脚本解释引擎
	
	3. 开发环境中只有两个服务：apache（web服务）和MySQL（数据库服务）
		 其中php不是服务，是一个解释引擎。故没有启动和停止。
		 
		启动和关闭服务：
			1. 通过窗口（图形界面）
		 
			2. 通过系统服务来去启动和停止。
				右键【我的电脑】->【管理】->【系统服务】
		 
			3. 是命令行（在开始->运行->中输入cmd回车）
				在xamp中：
					net stop apache2.4   //停止apache服务
					net start apache2.4  //启动apache服务
					net stop mysql	//停止MySQL服务
					net stop mysql  //启动MySQL服务
					
				在wamp中：
					net stop wampapache   //停止apache服务
					net start wampapache  //启动apache服务
					net stop wampmysql	//停止MySQL服务
					net stop wampmysql  //启动MySQL服务
	
	4.查看每个服务配置文件：
	   php配置文件：
			xamp： D:\xampp\php\php.ini 
			wamp： D:\wamp\bin\apache\apache2.4.4\bin\php.ini
	   
	   apache配置文件：
			xamp:  D:\xampp\apache\conf\httpd.conf
			wamp： D:\wamp\bin\apache\apache2.4.4\conf\httpd.conf
			
			其中：DocumentRoot "D:/xampp/htdocs" 表示web根目录
			其他：DocumentRoot "D:/wamp/www" 表示web根目录
	   
	   mysql配置文件：
			xamp： D:\xampp\mysql\bin\my.ini
			wamp： D:\wamp\bin\MySQL\my.ini
					
	xamp软件的安装，我们的web根目录：D:\xamp\htdocs\...
	wamp软件的安装，我们的web根目录：D:\wamp\www\...
	访问方式：使用浏览器：http://localhost/
	
	二、基础应用
-------------------------------------------
	1. 在www的web目录下，创建一个php文件
		在里面输入: <?php
						phpinfo();
					?>
		之后通过浏览器访问（走http协议）此文件
		
	2. 什么是php？	php是超文本预处理器，是在服务器端执行，一种嵌入到html标签中的脚本程序
					php是解释性语言，不是编译性语言。
                    
	
三、php的基本语法
----------------------------------------------
	1. php嵌入到html中的方式：
		*1. <?php ... ?> 标准风格（推荐）
		2. <script language="php">....</script>  长风格
		3. <? ... ?> 短风格  需要在php.ini配置文件中开启short_open_tag选项才可以。
		4. <% ... %> 兼容ASP风格（默认不支持）  
					需要在php.ini配置文件中开启asp_tags选项才可以。
	
	2. 在php中每条语句使用分号结束的。也就是分号是php语句之间的分割符。
		 注意: 在每个脚本中，最后一条语句后可以没有分号结束。
		 
	*3. 在php中注释（3种）：
			// 单行注释 (来自其他程序中的注释)
			#  单行注释 (来自脚本程序的注释)
			/* ...  */  多行注释  注意：不可以嵌套使用。
			
            
            
			/** .... */ 文档注释
			
	*4. 变量
		php是一个弱类型语言。
		变量的命名规范：
			变量是以$符开始定义的，
			变量名的规则：由字母、数字、下划线构成，不可以使用数字开头。
		在php中变量名是区分大小写
		
		8种变量类型
			4种标量类型
				1.整数 int/integer
				2.浮点数 float/double
				3.布尔值 bool/boolean
				4.字符串 string
			2种符合类型
				1.数组 array
				2.对象 object
			2种特殊类型
				1.资源 resource
				2.空 null
			伪类型
				mixed number callback...
				
		错误类型：
			Notice:Undefined variable:...输出或使用一个不存在的变量
			
			在PHP.ini 配置文件中，将error_reporting注释掉，在error_reporting=E_ALL_&_~E_NOTICE(取出默认的报错)
			
			var_dump(); 输出并定义类型
			echo 输出
			
			布尔：true 真（1） false 假（0）
			
			var_dump((bool)$n) 强行测试$n的布尔值
			
			PHP的整数范围是4个字节32位
			
			定义PHP的编码格式：
				header("Content-Type:text/html;charset=utf-8");
				
			定义整数和浮点可直接写数值
			定义字符串要在引号或定界符中写数
			数组要在[]中输入
			
			数值为0/0.0/空 布尔值为假（false） 字符串的0.0除外
			
			1.2e4=1.2*10的4次方，1234e-3=1234/10的3次方
			
			字符串定义：
				单引号：不支持变量解析
				双引号：支持变量解析
				heredoc定界符：<<<myn....
myn;   支持变量解析，结束符必须单设一行，并顶头
				nowdoc定界符：<<<'myn'...
myn;   不支持变量解析

			大括号可以把变量和内容隔开
			
			echo ‘hello’.$n.‘!’;单引号的变量解析方式
			
			数组可以储存多个值
			
			对象是对先前设定的一个对象
			
			资源是读取文件和打开文件
			
			unset（$n）;为销毁变量
			
			常量（不可覆盖）
				define("x","n",ture/false); 定义一个常量x为n,是否区分大小写 
				const PI=3.14; 定义一个常量PI为3.14
				
				系统默认常用常量：
					._FILE.		输出当前文件名
					.PHP_OS.	输出当前系统
					.PHP_VERSION输出当前版本
					._LINE_.	输出当前行号
					
			PHP运算符：+ - * / % ++ --
				%：取模（求余） 
				++：$b=$a++  先把$a赋予$b,在把$a+1
					$b=++$a  先把$a+1,在把+1后的$a赋予$b
				--：同上
				
			PHP字符串连接符：.  .=
				.:将两个字符串连接成一个 $a."+".$b."=".($a+$b)."<br/>" 引号里不支持运算符
				.=:$a.="aaa"  ($a=$a."aaa")
				
			PHP赋值运算符：= += -= *= /= %= .= 总是先计算右边的
				$a+=20;  ($a=$a+20;)
				
			PHP比较运算符 > < >= <= !=或<> == === !==
				如果比较的不是整数或浮点数，大小则参照阿斯玛值
				==:值的比较
				===:值和类型的比较
				！==:不相等的值和类型比较
				
			PHP逻辑运算符：&&/and ||/or !/not xor
				&&:逻辑与 都为真则为真。其他为假
				||:逻辑或 只要有一个为真则为真，都为假才假
				not:逻辑非 真的为假，假的为真
				xor:逻辑异或 真假都一样则为假，不一样为真
				
			PHP位运算符： & | ~ ^ << >>
				将值转为二进制，做对应位上的布尔值比较在换算回去
				
			PHP其他运算符：？：
				？： 是简单的如果否则
				ps：echo ($a>$b)?$a:$b; 如果a>b则输出啊，否则输出b
					echo (isset($x)?x:"aa"); 如果x有值，则输出值，否则输出aa
					
			``(反引号)：可输出系统命令
			@ 可为抑制错误输出
			
			$m1=$_GET['aa']; 从get请求中获取参数aa的值，并赋予变量m1
			
			可变变量
				$$a
				
			引用赋值
				值传递 $a=10; $b=$a; $a=20; (将$a的值赋予$b，但不关联$a和$b)
						echo $b  （$b=10;）
				引用专递 $a=10; $b=&$a; $a=20; (将$a的值赋予$b，并关联$a和$b)
						echo $b  ($b=20;)
						
			分支结构
				单一结构：if(){echo ...}; 如果（），则输出...
				双向分支结构：if(){echo ...}else{echo ...}; 如果()则输出...否则输入...
				嵌套分支结构：if(){if()echo ...}else{if()echo ...};
				多项分支结构：if(){echo ...}elseif{echo ...}elseif{echo ...}else{echo ...};
							  swtich(){case x:$n="aa";break;
									   case y:$n="bb";break;
									   default:$n="cc";break;
										}当()为x时，$n="aa"....
										
			循环结构
				1.for($a=x;$a<=y.$a++){echo $a;}        顺序执行，x为初始值，y为结束目标，$a++为如何循环
				2.$a=x; while($a<y){$a++;}		先定义初始值，在循环里定义过程
				3.do{...}while($a<10){...}		无论是否达到循环条件，都先输出初始值
				4.特殊流程控制语句：break; 退出循环
									continue; 结束本次循环进入下一次 ps：for($a=1;$a<10;$a++){if($a==2||$a==3){continue;}echo $a;}
									exid/die 终止程序
			函数
				自定义函数：function mysum($a){...} 先定义一个函数mysum（$a）
							mysum($a) 输出定义的函数
							ps：function ww($a,$b){....return $a+$b;} echo ww(10,20)+ww(30,40);  return是返还调用，使函数里不执行需要echo来输出
								function ww($a,$b){....echo $a+$b;}  ww(10,20); 直接在函数里输出，不需要再用echo来输出了
								
				判断函数是否存在：if(function_exists("ww")){echo ww(10,20);}else{
				die("不存在")；｝
				
				全局变量：在函数外定义的变量，函数内外都可使用，但在函数内使用需先键入 global $x;  调用，在输出
				
				局部变量：在函数内定义的变量，只在函数内有效
				
				静态变量：用atatic标注的变量是静态变量。在多次调用函数时，静态变量一直有效，且初始化只执行一次
				ps：function fun(){
									static $m=0;  //在函数内受用static关键字修饰的变量称静态变量
									$m++;
									echo $m."<br/>";
								}

								fun(); //值为0
								fun(); //值为1
								fun(); //值为2
								fun(); //值为3
								
			函数参数
				普通类参数：普通类参数函数：就是函数中的参数类型是php的标准类型
				伪类参数：mixed(任意类型)、number(int或float) 和 callback(可用的函数名)
				引用类参数：function fun(&$a){$a=200;}
							$x=100; fun($x); echo $x; //$x=200 
							&使$a变为引用参数，当把$x带入后，和$x关联
				默认类参数：指的是在函数定义时对函数中的参数赋上值，在调用时没有给值时则会采用默认值ps：function fun($a=1,$b){...}
				可变长度参数：func_get_args();//以数组的方式返回所有的参数信息
							  func_get_arg($index) //获取指定参数位置（index：从0开始的整数）的信息
							  func_num_args()//获取参数的个数。
							  ps：function add(){
									echo "本次函数调用共计参数：".func_num_args()."<br/>";
									
									$m = func_num_args(); //获取参数的数量
									$sum=0;
									for($i=0;$i<$m;$i++){
										$sum += func_get_arg($i); //获取指定位置上的参数，并累加
									}
									return $sum;
								}


								echo add(10,20,30,40,60,70);
				回调函数参数：此函数定义的参数要求传入的不是普通参数，而是一个有效函数名
							ps：function demo($name){
								//判断$name函数是否存在
								if(function_exists($name)){
									$name();
								}else{
									die("{$name}函数不存在！");
								}
							}

							//使用（此处调用为回调函数参数使用）
							demo("aa"); //将函数aa作为参数传给demo函数使用
							demo("bb"); //将函数bb作为参数传给demo函数使用
							demo("cc"); //将函数cc作为参数传给demo函数使用


							function aa(){
								echo "aaaaaaaaa<br/>";
							}
							function bb(){
								echo "bbbbbbbbb<br/>";
							}
							
				可变函数：调用函数时使用的函数名还是一个变量时称可变函数
						ps：function add($a,$b){
												return $a+$b;
											}

											echo add(10,20); //30

											$name="add";
											echo $name(30,40); //70
				递归函数：就是函数内出现了调用自己的代码。
						ps：//使用递归定义一求累计的函数
							function sum($m){
								if($m==1){
									return 1;
								}
								return $m+sum($m-1);
							}

							echo sum(100);
				
				匿名函数：允许创建一个没有指定名称的函数
						ps: //1. 匿名函数变量赋值
								$a = function(){
									echo "aaaaaaa<br/>";
								};
								//使用
								$a(); //变量a中的函数


								echo "<hr/>"; 


								//2. 匿名函数在实际中的应用

								//定义一个数组
								$a=[10,30,20,60,40,24,90,46];
								//输出数组
								print_r($a);
								echo "<br/>";
								//对数组进行排序(此处使用匿名函数实现数组排序)
								usort($a,function($x,$y){
									return $x-$y;
								}); //自定义排序，需要fun这个函数来提供排序规则。
								//排序后输出
								print_r($a);
												
				print_r  输出方式，比echo详细，比var_dump简短
				
				自定义函数库：
					include("...");  导入外部php函数文件（失败也继续运行之后的页面）
					require("...");  导入外部php函数文件（失败则停止运行之后的页面）
					include_once("...");  导入外部php函数文件，去除导入重复（运行速度会变慢）
					require_once("...");  导入外部php函数文件，去除导入重复（运行速度会变慢）
					
				数组：
					索引式数组：数组下标都是整数的， 默认数组的索引下标是从0开始
					关联式数组：数组下标是以字串表示的 (在其他强类型语言中有的称这个叫集合)
					
					1.$a[0]=10; $a[1]=20; $a[2]=30; 基本式
						print_r($a); //Array ([0]=>10 [1]=>20 [2]=>30)
					2.$b[]=10; $b[]=20; $b[]=30; 基本式默认值
						print_r($b); //Array ([0]=>10 [1]=>20 [2]=>30)
					3.$c[0]=10; $c[10]=20; $c[]=30; 索引式
						print_r($c); //Array ([0]=>10 [10]=>20 [11]=>30)
					4.$stu['name']='lisi'; $stu['sex']='man'; $stu['age']=20; 关联式
						print_r($stu); //Array ([name]=>lisi [sex]=>man [age]=>20)
					5.￥stu['name']='lisi'; $stu['sex']=>'man'; $stu['age']=20; $stu[]=100;
						print_r($stu); //Array([name]=>lisi [sex]=>man [age]=>20 [0]=100)
					6.$a=array(10,20,30); $b=array(0=>10.1=>20,2=>30); $c=array("name"=>"zhangsan","age"=>20);
					7.$a=[10,20,30]; $b=[0=>10,1=>20,2=>30];
					
					foreach($a as $v){echo $v." ";} 把$a的值一个一个的赋给$v并输出
					foreach($a as $k=>$v){echo $k=>$v;} 把$a和$a的标注值一个一个的赋给$k和$v并输出
					
				多维数组：当一个数组中的元素单位还是一个数组时，就是多维数组
					基本格式:
						$a[0][0]=10; $a[0][1]=20; $a[1][0]=30; $a[1][1]=40;
					    $b=array(array(10,20),array(30,40));
						
					常用格式：
						$lisi=array{
							array("name"=>"张三","sex"=>"男"，"age"=>20;),
							array("name"=>"王五","sex"=>"男"，"age"=>17;),
						};
					
				数组遍历方式：
					for/while/do...while:
						for($i=0;$i<count($a);$i++){
							echo $a[$i]." ";
						}
					ps:count(); 可以定义数组的个数
					循环遍历数组方式，适合数组下表从0开始连续递增索引式数组
					ps:在输出时加上 array_values 可使数组标号变为默认的从0开始
						$b=array(10,20,6=>30,40,10=>50);
						print_r (array_values($b)); 
						
					foreach:
						foreach($a as $v){echo $v." ";}
						foreach($a as $k=>$v){echo "{$k}=>{$v}";}
						
					联合while each() reset() list() 遍历数组
						each(); 提交数组中当前键/值，并将数组指针向后移动一步 
						reset(); 将数组指针回零到首位
						ps:reset($h);
							while($a=each($h)){
								echo $a['key']."=>".$a['value']."<br/>";
							}
						list(); 把数组中的值赋给一些变量，只能默认从标号0开始给
						ps:reset($h);
							while(list($k,$v)=each($h)){
								echo $k."=>".$v."<br/>";
							}
					
					通过 reset() end() next() prev() current() key() 遍历数组
						reset() 将数组指针回零到首位
						end() 将数组指针移动到最后一位
						next() 将数组指针向后移动一位
						prev() 将数组指针向前移动一位
						current() 提交当前指针的值
						key() 获取键
						ps:reset($h);
							do{
								echo key($h)."=>".current($h)."<br/>";
							}while(next($h));
							
				超全局数组/预定义变量
					$GLOBALS 包含以下所有信息
					*$_SERVER 服务器和执行环境信息
					*$_GET  通过 URL 参数传递给当前脚本的变量的数组。 
					*$_POST 通过 HTTP POST 方法传递给当前脚本的变量的数组。
					*$_FILES 保存文件上传信息（在文件处理章节中细讲）
					（cookie和session在会话跟踪章节中细讲）
					*$_COOKIE 通过 HTTP Cookies 方式传递给当前脚本的变量的数组（用于储存论坛、文库、博客等登陆信息）
					*$_SESSION 当前脚本可用 SESSION 变量的数组。（用于网站购物车等的信息存储）
					*$_REQUEST 包含get、post和cookie
					$_ENV 存储的是系统环境变量信息（被禁了）
					
					 *$_SERVER["HTTP_REFERER"]--上一页面的url地址
					 $_SERVER["SERVER_NAME"]--服务器的主机名
					 *$_SERVER["SERVER_ADDR"]--服务器端的IP地址
					 $_SERVER["SERVER_PORT"]--服务器端的端口
					 *$_SERVER["REMOTE_ADDR"]--客户端的IP
					 $_SERVER["DOCUMENT_ROOT"]--服务器的web目录路径
					 *$_SERVER["REQUEST_URI"];//--URL地址
					 echo $_GET["name"];
					 echo $_REQUEST["name"]; //获取信息比上面get的会慢一些

					 
					 form表单的get提交方式：url地址可见，相对不安全，长度受限，可以做为标签连接使用。
					 form表单的post提交方式：url地址不可见，相对安全，长度不受限。
									
				数组函数
					1.键和值的操作函数
						*array_values — 返回数组中所有的值
						array_keys — 返回数组中所有的键名
						array_flip — 交换数组中的键和值
						*in_array — 检查数组中是否存在某个值
						array_reverse — 返回一个单元顺序相反的数组
						*is_array() --判断是否是数组
					
					ps：echo "从\$_GET中获取信息:<br/>";
						echo "账号：".$_GET['uname']."<br/>";
						echo "密码：".$_GET['upass']."<br/>";

						echo "<br/><br/><br/>";

						echo "从\$_POST中获取信息:<br/>";
						echo "账号：".$_POST['uname']."<br/>";
						echo "密码：".$_POST['upass']."<br/>";

						echo "<br/><br/><br/>";

						echo "从\$_REQUEST中获取信息:<br/>";
						echo "账号：".$_REQUEST['uname']."<br/>";
						echo "密码：".$_REQUEST['upass']."<br/>";



						echo "<pre>";
						print_r($GLOBALS);
					
						$a = array("a"=>"AAA","b"=>"BBB","c"=>"CCC");
 
						 echo "原数组：";
						 print_r($a);
						 echo "<br/>";
						 
						 echo "使用array_values()后：";
						 print_r(array_values($a));
						 echo "<br/>";
						 
						 echo "使用array_keys()后：";
						 print_r(array_keys($a));
						 echo "<br/>";
						 
						 
						 echo "<hr/>";
						 
						 $a = array(10,20,30,10);
						 $b = array_flip($a); //将数组的键和值进行交换，并返回新数组
						 print_r($b);
						 
						echo "<hr/>";

						$a=array(10,20,30,40);
						var_dump(in_array('10',$a)); //判断10是否在数组a中  
						var_dump(in_array('10',$a,true)); //判断10是否在数组a中 (要判断类型) 
						print_r(array_reverse($a)); //将数组颠倒。
					
						//自定义array_flip函数
							 function myarray_flip($arr){
								$res=array();
								foreach($arr as $k=>$v){
									$res[$v]=$k; //将键和值交换后放到新数组中
								}
								return $res; //返回结果
							 }
							 
							 
							$a = array("a"=>"AAA","b"=>"BBB","c"=>"CCC","d"=>"AAA");
							print_r(myarray_flip($a));
							
							//php中数组函数count的使用

								$a =array(10,"aaa",30,array(50,60),array(70,array(80)));

								echo "数组a的长度(无递归统计)：".count($a)."<br/>";
								echo "数组a的长度(使用递归统计)：".count($a,COUNT_RECURSIVE)."<br/>";

								echo "<hr/>";
								echo "数组a的长度(无递归统计)：".mycount($a)."<br/>";
								echo "数组a的长度(使用递归统计)：".mycount($a,COUNT_RECURSIVE)."<br/>";


								//自定义数组统计函数count（）
								function mycount($arr,$mode=0){
									$m=0; //定义一个计数的变量
									foreach($arr as $v){
										$m++;
										//判断是否采用递归统计,并且此时的v还是一个数组
										if($mode===1 && is_array($v)){
											$m+=mycount($v,$mode); //递归调用
										}
									}
									return $m;
								}

							
					2.数组的统计函数
						*count -- 计算数组中的单元数目或对象中的属性个数
						array_count_values -- 统计数组中所有的值出现的次数
						array_unique -- 移除数组中重复的值
					ps:$a = array(10,20,30,40,30,40,20,40,30,40,30);

						echo "数组单元个数：".count($a)."<br/>";
						echo "统计数组中每个值的个数:<br/>";
						echo "<pre>";
						print_r(array_count_values($a));

						echo "移除数组中的重复的值：<br/>";
						print_r(array_unique($a));
						
					3.回调函数
						array_filter --  用回调函数过滤数组中的单元 	
						array_walk -- 对数组中的每个成员应用用户函数
						array_map --  将回调函数作用到给定数组的单元上 
				
					ps:$a =array(58,90,68,80,59,87,45,82);
						//使用array_filter，将上面数组中的不及格的过滤掉

						$b = array_filter($a,"fun");

						print_r($b);

						//自定义过滤规则函数
						function fun($m){
							return $m>=60;
						}

						/*
						echo "<hr/>";
						sort($a); //升序 把数组从小到大排列
						print_r($a);
						echo "<hr/>";
						rsort($a); //降序 把数组从大到小排列
						print_r($a);
						*/
						
						$a =array(58,90,68,80,59,87,45,82);
						//使用array_walk将数组a中的值不及格的加2分

						array_walk($a,"fun");

						print_r($a);

						
						*//定义处理函数，将不及格的成绩加2分
						function fun(&$v){
							if($v<60){
								$v+=2;
							}
						}

						//array_filter --  用回调函数过滤数组中的单元 	
						//采用匿名函数

						$a = array(58,98,90,76,59,80,88,45,92);
						//将上面数组中不及格过滤掉

						//返回过滤后的内容
						$b = array_filter($a,function($m){
								  return $m>=60;
							});
							
						//输出结果
						print_r($b);

					
					
					4. 数组的排序
						*sort -- 对数组排序(升序)
						rsort -- 对数组逆向排序（降序）
						asort -- 对数组进行排序并保持索引关系（关联数组排序）
						arsort --  对数组进行逆向排序并保持索引关系 
						*usort --  使用用户自定义的比较函数对数组中的值进行排序
						uasort --  使用用户自定义的比较函数对数组中的值进行排序并保持索引关联
						ksort -- 对数组按照键名排序
						krsort -- 对数组按照键名逆向排序
						uksort --  使用用户自定义的比较函数对数组中的键名进行排序
						*natsort --  用“自然排序”算法对数组排序
						natcasesort --  用“自然排序”算法对数组进行不区分大小写字母的排序 
						array_multisort -- 对多个数组或多维数组进行排序（了解）

						array_slice -- 从数组中取出一段
						array_splice --  把数组中的一部分去掉并用其它值取代 
						array_combine --  创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值 
						*array_merge -- 合并一个或多个数组
						array_intersect -- 计算数组的交集
						array_diff -- 计算数组的差集
					
					==========================================
					
						file_put_contents();//文件的写操作 
						file_get_contents();//文件的读操作
						
						ps:$a=array(10,50,30,60,20,90,70,80);


							echo "排序前：";
							print_r($a);
							echo "<br/>";

							//sort($a); //升序（不保持下标）
							//asort($a); //升序（保持住下标）
							krsort($a); //按键值做降序排序（保持住值）

							echo "排序后：";
							print_r($a);
							echo "<br/>";
							
							
							*$list = array(
										array("name"=>"张三疯","age"=>28,"sex"=>"男"),
										array("name"=>"张无忌","age"=>22,"sex"=>"男"),
										array("name"=>"张翠山","age"=>26,"sex"=>"男"),
										array("name"=>"张真人","age"=>45,"sex"=>"男"),
									);

							echo "<pre>";
							print_r($list);

							usort($list,"fun"); 



							//自定义一个排序规则处理函数(按年龄降序)
							//返回大于0的交换顺序，小于0的或等于0的不交换。
							function fun($a,$b){
								return $b['age']-$a['age'];
								/*
								if($a['age']<$b['age']){
									return 1;
								}else{
									return -1;
								}
								*/
							}


							print_r($list);
							
							
							
							//数组自然排序natsort

							$a = array("id8","id100","id23");

							//sort($a); //按字串大小排序（升序）
							natsort($a); //按自然排序（升序）

							print_r($a);
							
							
							
							//array_slice -- 从数组中取出一段
							//array_splice --  把数组中的一部分去掉并用其它值取代

							$a = array("aa","b"=>"bb","cc","dd","ee","ff");

							//将数组a中cc dd和ee取出
							$b = array_slice($a,2,3);
							//$b = array_slice($a,2,3,true); //保持住原来的下标
							print_r($b); //Array ( [0] => cc [1] => dd [2] => ee ) 


							echo "<hr/>";

							//将上面数组a中的bb和cc换成10,20,30

							$c = array_splice($a,1,2,array(10,20,30));

							//输出替换后的结果
							print_r($a);
							//输出替换掉的内容
							print_r($c);
							
							
							
							//数组合并
							//array_combine --  创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值 
							//array_merge -- 合并一个或多个数组

							$a=array(10,20);
							$b=array("aa","bb");

							$c = array_combine($a,$b); //将数组a作为下标，将数组b作为值合并成一个新数组返回
							//注意：两个参数的数组长度一致
							print_r($c);
							//Array ( [10] => aa [20] => bb ) 

							echo "<hr/>";

							$c = array_merge($a,$b); //将两个参数的数组首尾相连合并数组
							print_r($c);
							
							
							
							//数组结构操作
							//array_pop — 将数组最后一个单元弹出（出栈）
							//array_push — 将一个或多个单元压入数组的末尾（入栈） 
							//array_shift — 将数组开头的单元移出数组 
							//array_unshift — 在数组开头插入一个或多个单元  

							$a = array(10,20,30,40);

							echo array_pop($a); //从数组a的最后一个单元弹出一个

							print_r($a);


							echo "<hr/>";

							array_push($a,"60"); //从数组a最后压入一个。
							print_r($a);
							
							header("Location:".$_SERVER["HTTP_REFERER"]);
							//跳转到发送来的页面（从哪来回哪去）

							
				字符串：
					
					字符串输出：
						echo "hello world!<br/>";
						echo("hello world!<br/>");
						print("hello world!<br/>");
						print "hello world!<br/>";

						//echo和print的区别：
						// echo是来自脚本语言的输出语句，而print是来自C语言的输出输出语句
						//echo和print的主要区别是echo支持多个变量一起输出，而print不支持。

						$a=10;
						$b=20;
						$c=30;

						echo $a,$b,$c; //102030
						//print $a,$b,$c; //不支持
						
					字符串格式化处理函数：
						printf与sprintf都是格式化字串：
							字符串转换格式：
							%% 返回半分比符号
							%b 二进制数
							$c 依照ASCII值的字符
							%d 带符号十进制数
							%e 可续计数法（如1.5e3）
							%u 无符号十进制数
							%f或%F 浮点数
							%o 八进制数
							%s 字符串
							%x或%X 十六进制数
							
					一、字串的定义
					-----------------------------
						1. 单引号: ''  不支持变量的解析，转义符: \\ \''
						2. 双引号: ""  支持变量的解析，转义符： \n \r \t \"" \$ \\ ...
						
						3. 定界符: <<< 注意结束符的使用。
						
						$str = <<<mystr
							......
mystr;
					

					二、 常用字串的输出函数
					-------------------------------------
						1. echo() 支持多个变量同时输出 如： echo $s1,$s2;
						2. print()  不支持多个变量。
						3. die() 别名exit() 终止当期脚本执行，可以顺便输出内容
						4. print_r() 与var_dump（）函数类似，都是格式化变量并直接输出，可以解析数组，对象等类型
							常用于开发时的临时输出使用（测试）
						5. printf() 格式化字串并输出
						6. sprintf() 格式化字串并返回
						
						chr()和ord()是实现ASCII码值和字符之间的转换
						
						命名：驼峰命名法
						函数名： strDel()
								 userNameAdd()
								 
						类名：	UserAction（）
						

					三、常用字串中的处理函数（格式化）
					------------------------------------
						ltrim() 去除左侧多余字符（默认删空格）
						rtrim() 去除右侧多余字符（默认删空格）
					*	trim()  去除两侧多余字符（默认删空格）
						str_pad() 使用另一个字符串填充字符串为指定长度
					*	函数: strtolower( ) 
							语法: string strtolower(string str);
							本函数将字符串 str 全部变小写字符串。 
					*	函数: strtoupper( ) 
							语法: string strtoupper(string str); 
							本函数将字符串 str 全部变大写字符串。 	
						函数:ucfirst( ) 
							将字符串第一个字符改大写。 
							语法: string ucfirst(string str); 
							本函数返回字符串 str 第一个字的字首字母改成大写。
						函数:ucwords( ) 
							将字符串每个字第一个字母改大写。 
							语法: string ucwords(string str); 
							本函数返回字符串 str 每个字的字首字母全都改成大写。

						int ord(string $string ) — 返回字符的 ASCII 码值
						string chr(int $ascii ) — 返回指定的字符
							
						网页输出格式化函数
						nl2br--将字串中\n换成<br/>标签，实现换行输出。
					*	htmlspecialchars--格式换字串中的html标签
						htmlentities--
					*	strip_tags -- 删除html标签函数
						
						strrev -- 将字串颠倒返回
					*	strlen -- 求字串长度： 字母：一个算一个长度，汉字：utf-8编码是每个汉字3个长度，其他是2长度
					*	mb_strlen(str,"utf-8");获取中文字的长度
						number_format -- 格式化数字的
					*	md5 --  单向加密的（不可逆的（不能解密的））。

						strcmp -- 整个比较是否相同
						strncmp --指定长度的比较
						strcasecmp-- 不区分大小写比较

						strnatcmp -- 按自然顺序比较
						similar_text -- 模糊比较

					*	explode -- 字符串拆分函数
					*	implode -- 字符串组合函数

					*	substr --  截取字串 a.txt  a.rm a.rmvb  a.b.txt 
						string返回值 substr(
							string string被截字串,
							int start起始位置 
							[, int length长度] )
							
					*	mb_substr() --截取指定编码的字串
						
					*	strstr -- 字串查找并截取
						strchr  -- 是上面的strstr的别名找并截取
						strrchr -- 从后面做字串查找。找并截取


					*	strpos --寻早一个字符出现位置（从前开始。第三个参数为查找起始位置）
						strrpos --寻早一个字符出现位置（从后面开始找。）

						
					*	换成字串 str_replace(被换字串，换成的字串，原字串,[数量])；字符串替换
						

						file_get_contents("文件名") // 获取指定文件的内容
						file_put_contents("文件名","内容")//将内容写入(覆盖写)到指定文件中
						
						file_put_contents("文件名","内容",FILE_APPEND)
						//将内容写入(追加写)到指定文件中
						
						
						
						//php中字串的格式化输出:printf()  sprintf()

						printf("账号余额：人民币：%0.2f元，美元%0.2f <br/>",12345.6789,3451.567);  //将数值保留小数2位后替换掉%0.2f

						$a=1234;
						printf("{$a}的二进制：%b; 八进制：0%o ; 十六进制：0X%x <br/>",$a,$a,$a);
						
						
				        //字串处理函数
						/*
							ltrim() 去除左侧多余字符（默认删空格）
							rtrim() 去除右侧多余字符（默认删空格）
						*	trim()  去除两侧多余字符（默认删空格）
						*/

						$s = " hello ";
						echo "原字串：#{$s}#<br/>";
						echo "ltrim：#".ltrim($s)."#<br/>";
						echo "rtrim：#".rtrim($s)."#<br/>";
						echo "trim：#".trim($s)."#<br/>";

						echo "<hr/>";

						echo rtrim("10,20,30,40,,,,,",","); //去除右侧,号
						
						
				        //str_pad() 使用另一个字符串填充字符串为指定长度

						for($i=1;$i<=100;$i++){
							//将输出的数值使用左侧填充0的方式补够4位
							echo "201493".str_pad($i,4,"0",STR_PAD_LEFT)."<br/>";
							
							
				     	/*
							函数: strtolower( ) 
								语法: string strtolower(string str);
								本函数将字符串 str 全部变小写字符串。 
						*	函数: strtoupper( ) 
								语法: string strtoupper(string str); 
								本函数将字符串 str 全部变大写字符串。 	
							函数:ucfirst( ) 
								将字符串第一个字符改大写。 
								语法: string ucfirst(string str); 
								本函数返回字符串 str 第一个字的字首字母改成大写。
							函数:ucwords( ) 
								将字符串每个字第一个字母改大写。 
								语法: string ucwords(string str); 
								本函数返回字符串 str 每个字的字首字母全都改成大写。
								
						*/
						$s = "Hello World!";
						echo $s."<br/>";
						echo strtolower($s)."<br/>"; //小写转换
						echo strtoupper($s)."<br/>"; //大写转换

						$str="you can use trim functions for clearpad string";
						echo $str."<br/>";
						echo ucfirst($str)."<br/>"; //将此句首字符大写
						echo ucwords($str)."<br/>"; //将每个单词首字母大写
						
						
				        /*
						   int ord(string $string ) — 返回字符的 ASCII 码值
						string chr(int $ascii ) — 返回指定的字符
						*/

						echo ord("a"); //97

						echo chr(97); //a

						echo "<hr/>";

						for($i=0;$i<=128;$i++){
							echo $i."=>".chr($i)."<br/>";
							
							
							
				        /*
						网页输出格式化函数
							nl2br--将字串中\n换成<br/>标签，实现换行输出。
						*	htmlspecialchars--格式换字串中的html标签
							htmlentities--
						*	strip_tags -- 删除html标签函数
						*/

						$s = "aaa\nbbb\ncccc\ndddd\n";
						echo nl2br($s);  //将字串中的换行符替换成html中的<br/>标签

						echo "<hr/>";
						echo "<pre>";
						$str = "<ul class='cc'>
							<li>篮球</li>
							<li>足球</li>
							<li>羽毛球</li>
							<li>ddddd</li>
						</ul>";

						//格式化html标签        
						echo htmlspecialchars($str);
						echo htmlentities($str);

						echo "</pre><hr/>";
						//删除html标签函数
						echo strip_tags($str);	


				        /*
						strrev -- 将字串颠倒返回
						*	strlen -- 求字串长度： 字母：一个算一个长度，汉字：utf-8编码是每个汉字3个长度，其他是2长度
						*	mb_strlen(str,"utf-8");获取中文字的长度
							number_format -- 格式化数字的
						*	md5 --  单向加密的（不可逆的（不能解密的））。
						*/

						$str="zhangsan";
						echo "字串：".$str."<br/>";
						echo "颠倒：".strrev($str)."<br/>";
						echo "长度：".strlen($str)."<br/>";

						$name = "张三";
						echo "汉字长度:".strlen($name)."<br/>";
						echo "使用mb_strlen求汉字长度:".mb_strlen($name,"utf-8")."<br/>";


						echo  "<hr/>";

						$m = 123456789.5678;
						echo number_format($m,2)."<br/>";
						echo number_format($m,2,",",".")."<br/>";

						echo  "<hr/>";

						echo "123456的md5值：".md5(md5("123456")."abc");
				
				
				
				
				        /*
							//比较结果：前面大返回1，后面大返回-1，相等返回0
							strcmp -- 整个比较是否相同
							strncmp --指定长度的比较
							strcasecmp-- 不区分大小写比较

							strnatcmp -- 按自然顺序比较
							similar_text -- 模糊比较
						*/

						var_dump("abc">"abd"); //bool(false)  使用比较运算符比较字串

						var_dump(strcmp("abc","abd")); //int(-1) 使用函数比较

						var_dump(strncmp("abc","abd",2)); // int(0) 比较前2位字串是否相等。

						var_dump(strcasecmp("aBc","AbC")); //int(0) 不区分大小写比较

						var_dump(strcmp("id8","id10")); //int(1) 前面大，按字串比较
						var_dump(strnatcmp("id8","id10")); //int(-1) 后面大，按自然顺序比较

						echo "<hr/>";

						//百分比字串比较

						$s1 ="Please note that this function calculates a 
							similarity of 0 (zero) for two empty strings";
							
						$s2 ="Please note that this function calculates a 
							similarity at 0 (zero) for  two empty strings";
							
						similar_text($s1,$s2,$f);

						echo "相似度：".$f."%";
						
						
				        /*
						  *	explode -- 字符串拆分函数
						  *	implode -- 字符串组合函数
						*/

						$s = "10,20,30,40,50,60";

						//将上面字串按","作为分隔符，将字串拆分成数组
						$a = explode(",",$s);

						echo "<pre>";
						print_r($a);

						//将数组a以":"作为分割符，将数组拼装称字串
						$str = implode(":",$a);

						echo $str;
						
						
						
									
				        /*
						  substr --  截取字串 a.txt  a.rm a.rmvb  a.b.txt 
							string返回值 substr(
								string string被截字串,
								int start起始位置 
								[, int length长度] )
								
						*	mb_substr() --截取指定编码的字串

						*/

						$str = "zhangsan";
						//使用字串截取函数将上面字串中的ang截取出来
						echo substr($str,2,3)."<br/>"; //从字串的索引位置2开始，截取3个长度的内容。
						echo substr($str,2,-3)."<br/>"; //从字串的索引位置2开始截取到最后，再去除后3个。
						echo substr($str,-6,3)."<br/>"; //从字串的倒数第6个位置开始截取3个长度的内容。
						echo substr($str,-6,-3)."<br/>"; //从字串的倒数第6个位置开始截取最后，再去除后3个。


						echo "<br/>";

						$s = "字串截取函数";
						//中文字串截取
						echo mb_substr($s,0,5,"utf-8");  //指定编码截取字串。
						
						
						
						
				        /*
						  *	strstr -- 字串查找并截取
							strchr  -- 是上面的strstr的别名找并截取
							strrchr -- 从后面做字串查找。找并截取
						*/

						$url = "www.baidu.com";

						echo $url."<br/>";
						echo strstr($url,".")."<br/>"; //从字串前开始查找.出现的位置并截取到最后
						echo strstr($url,".",true)."<br/>"; //从字串前开始查找.出现的位置并向前截取
						echo strrchr($url,".")."<br/>"; //从字串后面开始查找.出现的位置并截取到最后
						
						
						
						
				        /*
						  strpos --寻早一个字符出现位置（从前开始。第三个参数为查找起始位置）
						  strrpos --寻早一个字符出现位置（从后面开始找。）
						*/

						$url = "www.baidu.com";

						echo "获取字串中点首次出现位置：".strpos($url,".")."<br/>";
						echo "获取字串中点最后出现位置：".strrpos($url,".")."<br/>";


						echo "<br/>";


						$name="a.txt";
						$name="b.a.rmvb";
						$name="a.rm";
						//请将上面文件名的后缀名取出来。

						$i = strrpos($name,"."); //获取最后一次点出现的位置
						echo substr($name,$i+1); //从此位置截取
						
						
						
						
				        /*
						  换成字串 str_replace(被换字串，换成的字串，原字串,[&数量])；字符串替换
						*/

						//1. 一对一换
						$s = "10,20,30,40,50";
						//将上面字串中的逗号换成冒号
						echo str_replace(",",":",$s);

						echo "<hr/>";

						//2. 多对一换
						$s = "10,20;30,40;50";
						//将上面字串中的逗号和分号都换成冒号
						echo str_replace(array(",",";"),":",$s);

						echo "<hr/>";

						//3. 多对多的对应换
						$s = "10,20;30,40;50";
						//将上面字串中的逗号换成冒号；分号换成井号
						echo str_replace(array(",",";"),array(":","#"),$s);

						echo "<hr/>";
						
						
						
						
				        /*
							file_get_contents("文件名") // 获取指定文件的内容
							file_put_contents("文件名","内容")//将内容写入(覆盖写)到指定文件中
							
							file_put_contents("文件名","内容",FILE_APPEND)
							//将内容写入(追加写)到指定文件中
						*/


						//将文件a.txt中的内容读取出来并输出
						$str =  file_get_contents("a.txt"); //将a.txt文件内容读取出来并赋给变量str
						echo $str;

						//将字串"hello"追加写到文件中
						file_put_contents("a.txt","hello",FILE_APPEND);
						
						
						
						
				正则表达式
					一、正则表达式的介绍：
----------------------------------------------------
							正则表达式是用于描述字符排列和匹配模式的一种语法规则。
							它主要用于字符串的模式分割、匹配、查找及替换操作。
						1. 用途：匹配、查找、替换、分割
						2. php提供了两套正则表达式函数库
						   *1. Perl 兼容正则表达式函数（推荐使用）
							2. POSIX 扩展正则表达式函数
						
					二、 语法：
					----------------------------------------------------
						1. 表达式的格式： "/表达式/[修正符]"
							解释：其中"/"表示正则表达式的定界符，但是也可以是其他符号：如”#“，”！“
								   注意：定界符不可以是字母、数字和斜线\。
									像“#”、“|”、“!”等都可以的
									如：/.../   #...#  |....|
							
							其中修正符是可选的，表示对表达式做额外的修饰。
							


					三、 正则表达式的组成部分：
					----------------------------------------------------
						1. 原子是组成正则表达式的基本单位,在分析正则表达式时，应作为一个整体。
						   原子包括以下内容:
							> 单个字符、数字，如a-z，A-Z，0-9。
							> 模式单元，如（ABC）可以理解为由多个原子组成的大的原子。
							> 原子表，如 [ABC]。
							> 重新使用的模式单元，如：\\1
							> 普通转义字符，如：\d， \D， \w
							> 转义元字符，如：\*，\.
							*> 元字符

						*2. 元字符（具有特殊意义字符）：
							[] 表示单个字符的原子表
								例如：[aoeiu] 表示任意一个元音字母
									  [0-9] 表示任意一位数字
									  [a-z][0-9]表示小写字和一位数字构成的两位字符
									  [a-zA-Z0-9] 表示任意一位大小字母或数字
							[^] 表示除中括号内原子之外的任何字符 是[]的取反
								例如：[^0-9] 表示任意一位非数字字符
									  [^a-z] 表示任意一位非小写字母

							{m}	表示对前面原子的数量控制，表示是m次
								例如：[0-9]{4} 表示4位数字
									  [1][3-8][0-9]{9} 手机号码
							{m,} 表示对前面原子的数量控制，表示是至少m次		  
								例如： [0-9]{2,} 表示两位及以上的数字
								
							{m,n}表示对前面原子的数量控制，表示是m到n次
								例如： [a-z]{6,8} 表示6到8位的小写字母
								
							* 表示对前面原子的数量控制，表示是任意次，等价于{0,}
							+ 表示对前面原子的数量控制，表示至少1次，等价于{1,}
							? 表示对前面原子的数量控制，表示0次或1次（可有可无） 等价于{0,1}
								例如：正整数：[1-9][0-9]*
										整数：[\-]?[0-9]+
										email: 
						
							() 表示一个整体原子，【还有一个子存储单元的作用】。
									也可以使用?:来拒绝子存储。 （?:.*?）
								例如：（red） 字串red
									   (red|blue) 字串red或blue
									   (abc){2} 表示两个abc
							|  表示或的意思
									(rea|blue) 字串red或blue
							
							^  用在正则单元块的开头处，表示必须以指定的开头
							
							$  用在正则单元块的结尾处，表示必须以指定的结尾
							
							.  表示任意一个除换行符之外的字符
									常用组合： .*? 或 .+? 表示最小匹配所有字符（拒绝贪婪匹配）
								  
						3. 普通转义字符:
							*\d		匹配一个数字；等价于[0-9]
							*\D		匹配除数字以外任何一个字符；等价于[^0-9]
							*\w		匹配一个英文字母、数字或下划线；等价于[0-9a-zA-Z_]
							*\W		匹配除英文字母、数字和下划线以外任何一个字符；等价于[^0-9a-zA-Z_]
							*\s		匹配一个空白字符；等价于[\f\n\r\t\v]
							*\S		匹配除空白字符以外任何一个字符；等价于[^\f\n\r\t\v]
							
							\f		匹配一个换页符等价于 \x0c 或 \cL
							*\n		匹配一个换行符；等价于 \x0a 或 \cJ
							*\r		匹配一个回车符等价于\x0d 或 \cM
							*\t		匹配一个制表符；等价于 \x09\或\cl
							\v		匹配一个垂直制表符；等价于\x0b或\ck
							\oNN	匹配一个八进制数字
							\xNN	匹配一个十六进制数字
							\cC		匹配一个控制字符
							
							
							/^-?\d+$|^-?0[xX][\da-fA-F]+$/   表示十进制和十六进制的一个数字
							
							^-?\d+$    ^-?0[xX][\da-fA-F]+$
							
							//表示一个邮箱地址
							/^[0-9a-zA-Z_-]+@[0-9a-zA-Z_-]+(\.[0-9a-zA-Z_-]+){0,3}$/

							
							
							
						4. 模式修整符
							i 表示不区分大小写；
								"/[a-zA-Z]/" <==>"/[a-z]/i"
							s 表示匹配视为单行（就是可以让点.支持换行）
								
							U 表示拒绝贪婪匹配
							
							
					 四、 正则表达式的函数：
					 --------------------------------------------------
						preg_grep --  返回与模式匹配的数组单元 
						* preg_match_all -- 进行全局正则表达式匹配 , 返回共计匹配的个数。
							和下面的一样，不同的是匹配到最后（全局匹配）
						
						* preg_match -- 进行正则表达式匹配，只匹配一次，返回1，否则0，
							格式：preg_match("正则表达式","被匹配的字串",存放结果的变量名,PREG_OFFSET_CAPTURE,起始偏移量)
							其中：PREG_OFFSET_CAPTURE表示获取匹配索引位置
								  起始偏移量：从指定位置开始匹配
							
						preg_quote -- 转义正则表达式字符
						preg_replace_callback -- 用回调函数执行正则表达式的搜索和替换
						*preg_replace -- 执行正则表达式的搜索和替换
						*preg_split -- 用正则表达式分割字符串
						
						
						ps:
						//preg_match() -- 执行正则单次匹配。返回1或0的匹配次数
						//int preg_match(正则，被匹配字串[,匹配结果]);

						//if(preg_match("/a/","wertyuiiuytre")){ //匹配字串中是否包含a字母
						//if(preg_match("/[0123456789]/","wertyuiiuytre")){ //匹配字串中是否包含一位数字
						//if(preg_match("/[0-9]/","wertyui8iuytre")){ //匹配字串中是否包含一位数字
						//if(preg_match("/[0-9][0-9]/","we2rt54yuii8uyt9re")){ //匹配字串中是否包含两位数字
						if(preg_match("/[^0-9]/","21345678654")){ //匹配字串中是否包含一位非数字
							echo "匹配，包含！";
						}else{
							echo "不匹配！";
						}



						//描述正则表达的意思

						//[a-z]     表示一位小写字母
						//[a-z][a-z] 表示两位的小写字母
						//[^a-z]    表示一位非小写字母
						//[a-z0-9A-Z] 表示一位数字或大小写字母
						//[0-9][0-9][0-9] 表示任意3位数字
						//[0-9]{3}  表示任意3位数字
						//[a-z]{6,10}  表示6至10位的小写字母
						//[0-9]{4,} 表示至少4位数字

						//[0-9]?  表示0位或1位数字 等价于[0-9]{0,1}
						// -?[0-9]{1,}  表示整数（负整数、0、正整数）

						//[0-9]{0,}  任意位整数 等价于 [0-9]*
						//[0-9]{1,}  至少1位整数 等价于 [0-9]+

						//[0-9]{8}
						//[1][3456789][0-9]{9}
						

						--------------------------------------------------


						//preg_match() -- 执行正则单次匹配。返回1或0的匹配次数
						//int preg_match(正则，被匹配字串[,匹配结果]);

						//包含匹配
						//if(preg_match("/[0-9]{3}/","re4wtewr568dsfa78sd9f")){ //判断字串中是否包含3位连续数字

						//精确匹配（绝对匹配）
						//if(preg_match("/^[0-9]{3}/","689dsfa78sd9f")){ //匹配3位数字开头的字串
						//if(preg_match("/[0-9]{3}$/","asdfdsfa789")){ //匹配3位数字结束的字串
						//if(preg_match("/^[0-9]{3}$/","289")){ //绝对匹配3位数字
						//if(preg_match("/^[1][0-9]{10}$/","12893242345")){ //绝对匹配1开头的11位数字（手机号码验证）
						//if(preg_match("/^[1]\d{10}$/","12893242345")){ //绝对匹配1开头的11位数字（手机号码验证）
						if(preg_match("/^[01][0-9]|[2][0-3]$/","21")){ //绝对匹配00-23的位数字（24小时）
							echo "匹配，包含！";
						}else{
							echo "不匹配！";
						}

						echo  "<hr/>";

						//获取匹配结果
						preg_match("/[0-9]{3,6}/","re4wtewr56843254dsfa78sd9f",$a);
						echo "匹配结果";
						print_r($a);



						/*
							//写出时间的正则：
							   [0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2}
							   
							//写出00-23的正则：
								([01][0-9]|[2][0-3])

							/^-?\d+$|^-?0[xX][\da-fA-F]+$/ 匹配一个十进制或十六进制的整数，不分正负。
						   
							 ^-?\d+$  等价于 ^-?[0-9]{1,}$  表示任意十进制整数
							 
							^-?0[xX][\da-fA-F]+$ 表示任意十六进制数
							
							
							//Email地址的正则
							/^[0-9a-zA-Z_-]+@[0-9a-zA-Z_-]+(\.[0-9a-zA-Z_-]+){1,3}$/

							z@163.com
							z@163.com.cn
							z@163.com.cn.net

						*/
						
						
						--------------------------------------------------
						
						
						//正则表达式实例： .*?的使用

						//preg_match() -- 执行正则单次匹配。返回1或0的匹配次数
						//int preg_match(正则，被匹配字串[,匹配结果]);



						$str="#asdfas#asdfa#";

						//preg_match("/#.*#/",$str,$a); //其中.*为最大匹配
						preg_match("/#.*?#/",$str,$a); //其中.*?为最小匹配

						echo "<pre>";
						print_r($a);
						
						
						
						--------------------------------------------------
						
						
						
						/*
							* preg_match_all -- 进行全局正则表达式匹配 , 返回共计匹配的个数。
								和下面的一样，不同的是匹配到最后（全局匹配）
							
							* preg_match -- 进行正则表达式匹配，只匹配一次，返回1，否则0，

						*/

						$str='<div><img src="./a.jpg" /></div>';
						//将上面字串中的图片标签信息匹配出来

						preg_match("/<img src=\"(.*?)\" \/>/",$str,$a);
						// 正则中的小括号具有子存储的功能

						print_r($a);


						echo "<hr/>";

						$str=<<<mystr
							 <dd>
								<div><a target="_blank" href="http://mobile.jd.com/index.do">京东通信</a></div>
								<div><a href="http://jdstar.jd.com/" target="_blank">校园之星</a></div>
								<div><a target="_blank" href="http://my.jd.com/personal/guess.html">为我推荐</a></div>
								<div><a target="_blank" href="http://shipingou.jd.com/">视频购物</a></div>
								<div><a target="_blank" href="http://club.jd.com/">京东社区</a></div>
								<div><a target="_blank" href="http://read.jd.com/">在线读书</a></div>
								<div><a target="_blank" href="http://diy.jd.com/">装机大师</a></div>
								<div><a target="_blank" href="http://giftcard.jd.com/market/index.action">京东E卡</a></div>
								<div><a target="_blank" href="http://channel.jd.com/jiazhuang.html">家装城</a></div>
								<div><a target="_blank" href="http://dapeigou.jd.com/">搭配购</a></div>
								<div><a target="_blank" href="http://xihuan.jd.com/">我喜欢</a></div>
							</dd>
mystr;

						//读取京东首页的网页信息
						//$str = file_get_contents("http://www.jd.com/");

						//将上面字串中的超级链接信息匹配处理
						preg_match_all("/<a.*?href=\"(.*?)\".*?>(.*?)<\/a>/",$str,$a);

						//输出匹配的信息
						//print_r($a);
						echo "<table width='600' border='1'>";
						echo "<tr><th>超级链接地址</th><th>url地址</th><th>链接名称</th></tr>";
						foreach($a[0] as $k=>$v){
							echo "<tr>";
							echo "<td>{$v}</td>";
							echo "<td>{$a[1][$k]}</td>";
							echo "<td>{$a[2][$k]}</td>";
							echo "</tr>";
						}
						echo "</table>";
						
						
						
						--------------------------------------------------
						
						
						
						/*
						   preg_replace -- 执行正则表达式的搜索和替换
						 */
						 
						$s = "10,3;14:32,4;5!2#3:45,23:45;34:5";

						//请将上面字串中的分割符都替换成空格。

						//echo str_replace(array(",",";",":")," ",$s);

						echo preg_replace("/[^0-9]/"," ",$s);

						echo "<hr/>";

						$str = "<b>aaa</b><b>bbbb</b><b>ccc</b><b>b>a</b>";
						//将上面字串中b标签换成i标签
						//echo preg_replace("/<b>(.*?)<\/b>/","<i>\\1</i>",$str);
						echo preg_replace("/<b>(.*?)<\/b>/",'<i>$1</i>',$str);



						echo "<hr/>";
						$str = "09/26/2014"; 
						//请将上面字串换成：“2014-09-26”;
						//echo preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","\\3-\\1-\\2",$str);
						echo preg_replace("/(\d{2})\/(\d{2})\/(\d{4})/","\$3-\$1-\$2",$str);
						
						
						
						--------------------------------------------------
						
						
						
						/*
						   preg_grep — 返回匹配模式的数组条目
							array preg_grep ( string $pattern , array $input [, int $flags = 0 ] )
						 */
						 
						 $list = array("zhangsan@126.com","lisi@sohu.com","wangwu","zhaoliu@aa.com.cn");
						 
						 //请将上面数组中正确的Email地址匹配出来
						 
						 $res = preg_grep("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+(\.[a-z]+){1,2}$/",$list); 
						 
						 print_r($res);
						 
						 echo "<hr/>";
						 
						 //匹配查询sql语句的正则
						 $list = "select * from aa";
						 preg_match("/\*\s+from\s+[\w\[\]\<\>\(\)]*\.?[\w\[\]\<\>\(\)]*\.?\[?(\b\w+)\]?[\r\n\s]*/",$list);
						 
						 
						 $a = array("2014-12-24","2014/09-26","2014/09/28","2014-10/01");
						 
						 //请将上面数组中格式正确的日期匹配出来
						 //重复模式单元\\1
						 $res = preg_grep("/^\d{4}([\-\/])\d{2}\\1\d{2}$/",$a);
						 
						  print_r($res);
						  
						  
						  
						  --------------------------------------------------
						  
						  
						  
						  /*
							preg_quote — 转义正则表达式字符
						   
							preg_split — 通过一个正则表达式分隔字符串

						 */
						 
						//按正则格式转义字串内容
						echo preg_quote("[2014-12-20]");


						$s = "10,3;14:32,4;5!2#3:45,23:45;34:5";
						//将上面字串按非数字分割符进行拆分。
						$res = preg_split("/[^0-9]/",$s);

						print_r($res);
						
						
						
						--------------------------------------------------
						
						
						
						/*
							模式修整符
								i 表示不区分大小写；
									"/[a-zA-Z]/" <==>"/[a-z]/i"
								s 表示匹配视为单行（就是可以让点.支持换行）
									
								U 表示拒绝贪婪匹配

						 */
						 
						//不区分大小匹配
						//preg_match("/[a-zA-Z]+/","124asdfSDFSDads3123412",$a); 
						preg_match("/[a-z]+/i","124asdfSDFSDads3123412",$a); 

						print_r($a);

						echo "<hr/>";

						//s 表示匹配视为单行（就是可以让点.支持换行）
						preg_match("/.+/s","asdf\nasdf",$a); 

						print_r($a);


						echo "<hr/>";
						//U 表示拒绝贪婪匹配,采用最小匹配
						//preg_match("/#.*#/U","#asdf#asdf#",$a); 
						preg_match("/#.*?#/","#asdf#asdf#",$a); 

						print_r($a);
						
						
						
						
				PHP中常用功能块
				
				一、 *php中错误分类：
					1. 语法错误：echo "aaaaaaa<br/>" //缺少分号为语法错误（特点程序尚未执行）
					2. 运行时错误：abc(); //调用一个不能存在的函数为运行时错误（特点是程序执行到此位置才报错）
					3. 逻辑错误：
						
						
				二、 *在php.ini配置文件中，常用的错误和日志的配置。
						error_reporting：错误等级
						display_errors：在浏览器中是否显示错误信息
						log_errors=On； 是否启动日志记录
						
					ini_set() //php.ini配置信息临时设置函数
					ini_set("display_errors","On"); //通过函数设置，实现当前脚本临时关闭错误输出。
					error_reporting(E_ALL & ~E_NOTICE); //临时设置错误输出级别。


					ps:ini_set("display_errors","on"); //临时：开启或关闭浏览器错误输出
						//error_reporting(E_ALL & ~E_NOTICE); //临时设置错误输出等级
						error_reporting(E_ALL); //临时设置错误输出等级


						//$a=10;
						echo $a;  //输出一个未定义的变量属于notice注意错误
						strlen(); //函数缺少参数报一个警告错误

						//人为自定义一个错误来去代替die
						trigger_error("登录错误！",E_USER_WARNING);

						abc();    //调用一个不存在的函数报致命错误

						//strlen();
						echo "aaaaaa";
						
						
						
						--------------------------------------------------
						
						自定义函数报错
						
						//用户自定义错误处理，使用set_error_handler()；
						/**
							定义Error_Handler函数，
						   作为set_error_handler()的第一个参数"回调"
							@param  int     $error_level  错误级别
							@param string $error_message  错误信息
							@param  string  $file            错误所在文件
							@param  int     $lin               错误所在行数
						*/
						function error_handler($error_level,
						 $error_message, $file, $line) {
							  $EXIT = FALSE;
							  switch( $error_level ) {
								  //提醒级别
								  case E_NOTICE:
								  case E_USER_NOTICE :
									   $error_type = 'Notice'; break;
							
								   //警告级别
								  case E_WARNING:
								  case E_USER_WARNING:
									   $error_type = 'Warning'; break;
									//错误级别
								   case E_ERROR:
								   case E_USER_ERROR:
										  $error_type = 'Fatal Error';
										  $EXIT = TRUE; break;
								   
								   //其他末知错误
								   default:
										  $error_type = 'Unknown';
										  $EXIT = TRUE; break;
							}
							//直接打印错误信息，也可以写文件或数据库
							printf ("<font color='#ff0000'><b>%s</b></font>: %s in <font color='blue'><b>%s</b> on line <b>%d</b></font><br>\n", $error_type, $error_message, $file, $line);
							
							//若出现错误则跳转到友好错误提示页面
							if(TRUE === $EXIT) {
							   echo '<script>location="er.html" </script>';
							}
						}

						//使用下面函数设置系统错误由error_handler函数处理。
						set_error_handler("error_handler");

						strlen();


						trigger_error("请输入正确的账号信息！",E_USER_NOTICE);


						echo 10/0;
						
						
						
				三、 PHP的日志记录方式：
					---------------------------
						*1. 采用文件记录，
						2. 依靠系统的服务信息帮助记录

					**1.采用文件记录日志
						1、配置：在php.ini配置文件中配置如下信息
							error_reporting = E_ALL //将向PHP发送每个错误
							display_errors=Off //不显示错误报告
							  * log_errors=On //决定日志语句记录的位置。
							log_errors_max_log=1024 // 每个日志项的最大长度
							  *	error_log=G:/myerror.log //指定错误写进的文件
						2、使用函数：在php文件中使用error_log()来记录日志,就可以将
							  信息写入到myerror.log文件中
							  如：error_log("登录失败了！");//人为的记录错误信息
						 注意：当前php程序保错时，信息也会自动写入到myerror.log

					 2. 依靠系统的服务信息帮助记录日志
						1、先配置PHP.ini文件中
						error_reporting = E_ALL 	//将向PHP发送每个错误
						* display_errors=Off 		//不显示错误报告
						* log_errors=On 			//决定日志语句记录的位置。
						log_errors_max_log=1024 	// 每个日志项的最大长度
						* error_log=syslog 		//指定到系统日志中。
						2、使用四个函数来记录日志：
						  define_syslog_variables(); //为系统日志初始化配置
						  openlog();		    //打开一个日志链接
						  syslog();		    //发送一条日志记录
						  closelog();	   	    //关闭日志链接
						  
						  
						ps://使用下面函数可以实现日志记录，但不输出到浏览器
							error_log("zhangsan登录失败！在文件：".__FILE__."的第".__LINE__."行"); //人为记录日志
						  
						  
						  
				四、 日期／时间函数
				========================================
					checkdate -- 验证一个格里高里日期
					date_default_timezone_get -- 取得一个脚本中所有日期时间函数所使用的默认时区
					*date_default_timezone_set -- 设定用于一个脚本中所有日期时间函数的默认时区
					date_sunrise -- 返回给定的日期与地点的日出时间
					date_sunset -- 返回给定的日期与地点的日落时间
					**date -- 格式化一个本地时间／日期
					getdate -- 取得日期／时间信息
					gettimeofday -- 取得当前时间
					gmdate -- 格式化一个 GMT/UTC 日期／时间
					gmmktime -- 取得 GMT 日期的 UNIX 时间戳
					gmstrftime --  根据区域设置格式化 GMT/UTC 时间／日期 
					idate -- 将本地时间日期格式化为整数
					localtime -- 取得本地时间
					*microtime -- 返回当前 Unix 时间戳和微秒数
					*mktime -- 取得一个日期的 Unix 时间戳
					strftime -- 根据区域设置格式化本地时间／日期
					strptime -- 解析由 strftime() 生成的日期／时间
					**strtotime -- 将任何英文文本的日期时间描述解析为 Unix 时间戳
					**time -- 返回当前的 Unix 时间戳
					
					
					
					ps://使用系统函数获取时间戳
					ps://使用系统函数获取时间戳

						//设置时区：
						date_default_timezone_set("PRC");  //中国时区


						echo "当前系统时间戳：".time().":".strtotime("now")."<br/>";
						echo "2012-12-24 10:20:30的时间戳：".mktime(10,20,30,12,24,2012)."<br/>";
						echo "2012-12-24 10:20:30的时间戳：".strtotime("2012-12-24 10:20:30")."<br/>";
						echo "3天前此时的时间戳：".strtotime("-3 day")."<br/>";
						echo "1周后的时间戳：".strtotime("+1 week")."<br/>";



						echo "<br/>";

						$date = getdate();
						echo "<pre>";
						print_r($date);
						
						
						
						--------------------------------------------------
						
						
						
						//使用系统函数date

						echo "当前默认时区：".date_default_timezone_get()."<br/>";

						//设置时区：
						date_default_timezone_set("PRC");  //中国时区


						echo "当前日期：".date("Y-m-d H:i:s")."<br/>";
						echo "当前日期：".date("Y年m月d日 H时i分s秒 星期w")."<br/>";
						echo "一周前的日期：".date("Y-m-d H:i:s",strtotime("-1 week"))."<br/>";
						echo "三天前的日期：".date("Y-m-d H:i:s",strtotime("-3 day"))."<br/>";
						
						
						
						
						--------------------------------------------------
						
						
						
						
						//使用系统时间微秒函数microtime()
						//设置时区：
						date_default_timezone_set("PRC");  //中国时区


						echo "当前微妙：".microtime()."<br/>";
						echo "当前微妙：".microtime(true)."<br/>";

						echo "计算程序执行的损耗时间：";

						$time1 = microtime(true);

						for($i=0;$i<1000000;$i++){
							if("123">"124"){
							
							}
						}

						echo microtime(true)-$time1;
						
						
						
				
				文件处理系统
				
				一、概述:
				 -------------------------
					1.1 文件类型：
							文件在windows系统下分为3种不同：文件、目录、未知
							在linux/unix系统下分为7种不同：block、char、dir、fifo、file、link和unknown七种类型
							
					1.2 文件的常用函数：
						* filetype() --获取文件类型的函数：
						
						* is_dir( ) -- 判断给定文件名是否是一个目录
							语法结构：bool is_dir（名称）
							返回类型：如果文件名存在并且是一个目录则返回 true，否则返回 false。
						
						is_executable( ) -- 判断给定文件名是否可执行
							语法结构：bool is_executable（名称）
							返回类型：如果文件存在且可执行则返回 true ，否则返回 false 。	
						
						* is_file( ) -- 判断给定文件名是否为一个正常的文件
							语法结构：bool is_file(名称)	
							返回类型：如果文件存在且为正常的文件则返回 true 。
						
						is_link( ) -- 判断给定文件名是否为一个符号连接
							语法结构：bool is_link(名称) 	
							返回类型：如果文件存在并且是一个符号连接则返回 true。
						
						is_readable( ) -- 判断给定文件名是否可读
							语法结构：bool is_readable（文件名称）	
							返回类型：如果文件存在并且可读则返回 true 。
							
						* is_writable( ) -- 判断给定的文件名是否可写
							语法结构：bool is_writable(文件名称)	
							返回类型：如果文件存在并且可写则返回 true 。
						
						*file_exists( )	检查文件或目录是否存在
						*filesize()	取得文件大小（不能获取目录大小）
						is_readable()	判断文件是否可读
						is_writable()	判断文件是否可写
						*filectime()	获取文件的创建时间
						filemtime()	获取文件的修改时间
						fileatime()	获取文件的访问时间
						stat()	获取文件大部分属性
						
				二、目录的相关操作
				----------------------------------------------
					2.1 路经的方式：
						windows系统：D:/a/b/c.php 或 D:\a\b\c.php
						linux/unix系统： /a/b/c.php
						
						为统一建议使用"/"作为目录之间的分割符
					
					2.2 路径的相关函数(4个)：
						1. basename("url地址"[，去除部分]) -- 获取指定url的文件名
						2. dirname("url地址") -- 获取地址的路径值
						示例：
							$url = "http://www.baidu.com/a/b/c.php";

							echo $url."<br/>";				//http://www.baidu.com/a/b/c.php
							echo basename($url)."<br/>";	//c.php
							echo basename($url,".php")."<br/>";	//c (去掉".php")
							echo dirname($url)."<br/>";		//http://www.baidu.com/a/b
						
						*3. pathinfo（文件路径[,需要的下标]）--获取文件路径的详细信息,返回一个关联数组
									结果：下标：dirname 路径名
												basename 文件名
												extension 后缀名
												filename 文件名（去掉后缀的）
						示例：
							$url = "http://www.baidu.com/a/b/c.php";
							*echo pathinfo($url,PATHINFO_DIRNAME); //http://www.baidu.com/a/b
							*echo pathinfo($url,PATHINFO_EXTENSION); //php 后缀名
							*echo pathinfo($url,PATHINFO_BASENAME); //c.php 文件名
							$a = pathinfo($url); 
								$a结果：
									array(4) {
										  ["dirname"]=>
										  string(24) "http://www.baidu.com/a/b"
										  ["basename"]=>
										  string(5) "c.php"
										  ["extension"]=>
										  string(3) "php"
										  ["filename"]=>
										  string(1) "c"
										}
						4. realpath()--获取指定文件的绝对路径
							示例： echo realpath("1.php"); //D:\AppServ\www\lamp45\09_file_dir\1.php
							
					
					2.3 目录的遍历函数：
						*opendir("") -- 打开一个目录，返回此目录的资源句柄
						*readdir(资源句柄) -- 从目中读取一个目录或文件，并指针向下移动一位。
						*closedir(资源句柄)-- 关闭打开的目录
						rewinddir（资源句柄） -- 倒回目录指针（移至首位）
						
						
					2.4 统计空间的大小
							echo "当前磁盘可用大小：".(disk_free_space("./")/1024/1024/1024)."G<br/>";
							echo "当前磁盘共计大小：".(disk_total_space("./")/1024/1024/1024)."G<br/>";
							
					2.5 目录的操作
						*mkdir（） -- 创建一个目录
						*rmdir() -- 删除一个目录（只支持删除空目录）
						*unlink() -- 删除一个文件
						
					2.6 复制文件：
						copy() --- 复制文件。不支持目录复制
						
				三、文件基本操作
				----------------------------------------------------
					*1. fopen(文件名，打开模式) ---打开一个文件
							模式：读（r、r+）、 清空写（w/w+）， 追加写（a/a+）、 创建模式(x,x+)
						*打开模式：	*r： 只读模式打开文件，文件指针执行首位。
									r+: 可读可写模式打开文件，文件指针执行首位,若文件指针不是在最后，则是覆盖写。
									*w:	以写方式打开文件，文件内容清空，若文件不存在，则尝试创建。
									w+: 以写和读方式打开文件，文件内容清空，若文件不存在，则尝试创建。(也会覆盖写)
									*a:	以追加内容方式打开文件，指针移至最后，若文件不存在，则尝试创建。
									a+: 以追加内容和可读方式打开文件，指针移至最后，若文件不存在，则尝试创建。
									x:	以创建方式打开文件，可写。若文件已存在，则报错。
									x+: 以创建方式打开文件，可写可读。若文件已存在，则报错。
						附加模式：	
									t: txt文本模式(字符流)
									b: byte字节模式（二进制）默认 （字节流）
									如：fopen("a.txt","rb");
									
						文件的读写操作也叫流操作，其中流分为字符流(t)和字节流(b 二进制)
								
					*2. fread(打开的文件资源，读取的长度) -- 读取文件内容。

					*3. fwrite(打开的文件资源，被写入的字串[，长度]) -- 向文件写入内容。
					
					*4. fclose(打开的文件资源) -- 关闭文件
					
					5. fgets() -- 从文件资源中读取一行
					
					6. fgetc() -- 读取一个字符
					
				------------不用打开文件可直接操作文件的函数-----------------------
					*7. file() 将文件读出（内容是数组格式），并返回
					*8. readfile() 将文件内容读出，并输出
					9. file_get_contents() 读取文件内容
					10.file_put_contents() 将指定内容写入文件
						
				---------------------文件指针的操作--------------------------------
					11. ftell（） --返回文件指针的位置
					12. fseek（） --设置文件指针的位置
						 示例：
						 fseek($f,-2,SEEK_CUR); 	//从当前指针位置开始，向前移动2位
						 fseek($f,2,SEEK_SET);  	//从文件指针开始位置，向后移动2位
						 fseek($f,-5,SEEK_END);	  	//从文件指针的最后位置开始，向前移动5位
					13. rewind()  --将文件指针移至首位
					
				------------文件锁（了解）---------------------------
					14. bool flock ( int $handle , int $operation [, int &$wouldblock ] )
						轻便的咨询文件锁定
					  operation参数：
						要取得共享锁定（读取的程序），将 operation 设为 LOCK_SH（PHP 4.0.1 以前的版本设置为 1）。 
						要取得独占锁定（写入的程序），将 operation 设为 LOCK_EX（PHP 4.0.1 以前的版本中设置为 2）。 
						要释放锁定（无论共享或独占），将 operation 设为 LOCK_UN（PHP 4.0.1 以前的版本中设置为 3）。 
						如果不希望 flock() 在锁定时堵塞，则给 operation 加上 LOCK_NB（PHP 4.0.1 以前的版本中设置为 4）。 
					示例：
						<?php

							$fp = fopen("/tmp/lock.txt", "w+");
							if(flock($fp, LOCK_EX)) { // 进行排它型锁定
								fwrite($fp, "Write something here\n");
								flock($fp, LOCK_UN); // 释放锁定
							} else {
								echo "Couldn't lock the file !";
							}
							fclose($fp);

						?> 
				----------------------------------------------
					*15. rename() --修改文件名
					16. ftruncate() — 将文件截断到给定的长度
					
					
					ps://绝对路径和相对路径

						echo "<img src='./images/11.jpg' width='200'/>";  //使用的是相对路径
						echo "<img src='/lamp93/lesson23_file/images/11.jpg' width='200'/>";  
						//使用web根目录路径（绝对）

						echo "<img src='http://localhost/lamp93/lesson23_file/images/11.jpg' width='200'/>"; 
						//使用URL地址（绝对路径）


						echo  "<hr/>路径的相关函数：<br/>";

						$url = "http://localhost/lamp93/lesson23_file/images/11.jpg";
						echo "当前url地址：".$url."<br/>";
						echo "使用basename（）后：".basename($url)."<br/>";
						echo "使用dirname（）后：".dirname($url)."<br/>";
						echo "使用realpath（）获取当前位置的绝对路径：".realpath(".")."<br/>";
						echo "使用pathinfo（）获取文件名的后缀：".pathinfo($url,PATHINFO_EXTENSION)."<br/>";
						echo "使用pathinfo（）后：";
						echo "<pre>";
						print_r(pathinfo($url));
						
						
						
						----------------------------------------------
						
						
						
						//使用目录函数，遍历指定目录中的文件

						$path="./images/"; //指定被遍历的目录

						echo "<h3>指定目录的遍历</h3>";



						//1. 打开指定的目录
						$dd = opendir($path);

						//2. 开始遍历目录中的文件
						while(false !== ($f = readdir($dd))){
							//3. 输出信息
							echo $f."<br/>";
						}

						//4. 关闭目录 
						closedir($dd);
						
						
						
						----------------------------------------------
						
						
						
						//使用目录函数，遍历指定目录中的文件

						$path="./images"; //指定被遍历的目录

						echo "<h3>指定目录的遍历</h3>";

						echo "<table width='850' border='1'>";
						echo "<tr>";
						echo "<th>文件名</th><th>类型</th><th>大小</th>";
						echo "<th>创建时间</th><th>修改时间</th><th>访问时间</th>";
						echo "</tr>";
						//1. 打开指定的目录
						$dd = opendir($path);

						//2. 开始遍历目录中的文件
						while(false !== ($f = readdir($dd))){
							//为遍历出来的文件加上路径
							$file = rtrim($path,"/")."/".$f;
							
							//3. 输出信息
							echo "<tr>";
							echo "<td>{$f}</td>";
							echo "<td>".filetype($file)."</td>";
							echo "<td>".filesize($file)."</td>";
							echo "<td>".date("Y-m-d H:i:s",filectime($file))."</td>";
							echo "<td>".date("Y-m-d H:i:s",filemtime($file))."</td>";
							echo "<td>".date("Y-m-d H:i:s",fileatime($file))."</td>";
							echo "</tr>";

						}

						//4. 关闭目录 
						closedir($dd);
						
						
						
						----------------------------------------------
						
						
						
						//检测当前磁盘大小数据
						echo "当前磁盘可用大小：".(disk_free_space("./")/1024/1024/1024)."G<br/>";
						echo "当前磁盘共计大小：".(disk_total_space("./")/1024/1024/1024)."G<br/>";
						
						
						
						----------------------------------------------
						
						
						
						//目录和文件的创建删除

						mkdir("aa"); //创建目录aa

						//rmdir("aa"); //删除目录aa (要求目录必须为空)

						//unlink("./aa/a.txt"); //删除文件a.txt

						rmdir("aa");
						
						
						
						----------------------------------------------
						
						
						
						//文件的读写操作

						//以只读模式打开a.txt文件
						$f = fopen("./a.txt","r"); 

						//读取20个字符
						echo fread($f,20)."<br/>";
						echo fread($f,5)."<br/>";

						rewind($f); //将文件指针移至首位
						echo fread($f,5);

						fclose($f); //关闭文件


						/*
						//以追加写模式打开a.txt文件
						$f = fopen("./a.txt","a"); 

						//将自定义字串写入文件
						fwrite($f,"hello php!\n");
						fwrite($f,"hello php!\n");

						fclose($f); //关闭文件
						*/


						/*
						//以清空写模式打开a.txt文件
						$f = fopen("./a.txt","w"); 

						//将自定义字串写入文件
						fwrite($f,"hello php!\n");
						fwrite($f,"hello php!\n");

						fclose($f); //关闭文件
						*/


						echo "<hr/>";
						echo "<h4>使用file不用打开文件的读取操作：</h4>";
						$a = file("a.txt"); //直接将文件a.txt的内容读出，并赋给变量a
						echo "<pre>";
						print_r($a);

						echo "<hr/>";
						echo "<h4>使用readfile不用打开文件的读取并输出操作：</h4>";
						readfile("a.txt"); //不用打开，连读带输出。
						
						
						
						----------------------------------------------
						
						
						
						//自定义目录复制的函数

						function copyDir($srcdir,$dstdir){
							//判断目标目录是否存在
							if(!file_exists($dstdir)){
								mkdir($dstdir);
							}
							//判断参数是否有效
							if(!file_exists($srcdir) || !is_dir($srcdir) || !file_exists($dstdir) || !is_dir($dstdir)){
								die("被复制的或目标的目录不存在或无效！");
							}
							//1. 打开原目录（被复制目录）
							$dd = opendir($srcdir);
							//2. 遍历目录
							while(false !== ($f=readdir($dd))){
								//过滤掉特殊目录
								if($f=="." || $f==".."){
									continue;
								}
								//为遍历的文件或目录添加路径
								$srcfile = rtrim($srcdir,"/")."/".$f;
								$dstfile = rtrim($dstdir,"/")."/".$f;
								//3. 删除目录中的文件
								//判断若是文件，则复制
								if(is_file($srcfile)){
									copy($srcfile,$dstfile);
								}
								//判断若是目录则做递归复制
								if(is_dir($srcfile)){
									copyDir($srcfile,$dstfile); //递归复制
								}
							}
							//4. 关闭目录
							closedir($dd);
							return true;
						}


						//测试
						copyDir("./cc","./aa");
						
						
						
						----------------------------------------------
						
						
						
						//自定义一个文件复制copy函数

						function copyFile($file1,$file2){
							//分别打开两个文件
							$f1 = fopen($file1,"r");
							$f2 = fopen($file2,"w");
							//开始读并写操作
							while($c = fread($f1,1024)){
								//写
								fwrite($f2,$c);
							}
							//都关闭
							fclose($f1);
							fclose($f2);
						}


						//测试：
						//copyFile("11.jpg","22.jpg");
						copyFile("a.txt","b.txt");
						
						
						
						----------------------------------------------
						
						
						
						//自定义删除目录的函数

						function delDir($dir){
							//1. 打开目录
							$dd = opendir($dir);
							//2. 遍历目录
							while(false !== ($f=readdir($dd))){
								//过滤掉特殊目录
								if($f=="." || $f==".."){
									continue;
								}
								//为遍历的文件或目录添加路径
								$file = rtrim($dir,"/")."/".$f;
								//3. 删除目录中的文件
								//判断若是文件，则删除
								if(is_file($file)){
									unlink($file);
								}
								//判断若是目录则做递归删除
								if(is_dir($file)){
									delDir($file); //递归删除
								}
							}
							//4. 关闭目录
							closedir($dd);
							//5. 删除目录
							rmdir($dir);
						}


						//测试
						delDir("./bb");
						
						
						
						----------------------------------------------
						
						
						
						//自定义统计目录大小的函数

						function dirSize($dir){
							$sum=0;
							//1. 打开目录
							$dd = opendir($dir);
							//2. 遍历目录
							while(false !== ($f=readdir($dd))){
								//跳过特殊目录 .和..
								if($f=="." || $f==".."){
								   continue; 
								}
								//为遍历的文件加上路径
								$file = rtrim($dir,"/")."/".$f;
								//3. 统计文件大小
								//若是文件
								if(is_file($file)){
									$sum+=fileSize($file);
								}
								//若是目录则做递归统计
								if(is_dir($file)){
									$sum+= dirSize($file); //此处为递归调用
								}
							}
							
							//4. 关闭目录
							closedir($dd);
							//5. 返回结果
							return $sum;
						}

						//测试
						echo dirSize("./images");
						
						
						
						----------------------------------------------
						
						
						
						//文件指针操作

						//打开文件a.txt
						$f = fopen("a.txt","r");

						fread($f,6);

						echo "当前文件指针位置：".ftell($f)."<br/>";

						//移动指针
						//fseek($f,-4,SEEK_CUR);    //从当前位置向前移动4位。
						//fseek($f,2,SEEK_SET);    //从文件头位置向后移动2位。
						fseek($f,-6,SEEK_END);      //从文件结尾位置向前移动-6位。


						//读取三个字母是ang
						echo fread($f,3);
						
						
				文件的上传和下载
					一、 php.ini的配置信息
						file_uploads = On /Off   是否允许文件上传
						upload_max_filesize=2M 上传的文件的最大大小
						post_max_size = 8M       POST数据所允许的最大大小
						upload_tmp_dir           上传文件放置的临时目录
						
						注意配置：upload_max_filesize的大小一定要小于post_max_size的配置大小。
						
					二、（发送客户端）上传的form表单：
						1、 表单必须是post提交
						2、 上传的类型：enctype="multipart/form-data"
						3、上传使用的表单项
							<input type="file" name=".." />
						4.(可选)上传大小限制的表单隐藏域：MAX_FILE_SIZE，
							<input type="hidden" name="MAX_FILE_SIZE" value="大小字节"/>
							注意：此字段必须在文件输入字段之前（常放在form标签后面）
							
					三、（接收服务器端）：
						1. 使用$_FILES全局数组来接收上传信息
							在每个上传的文件里,$_FILES中都会有5个属性：
								error：上传的错误号：0--4
									0：表示没有发生任何错误。
									1：上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。
									2：表示上传文件大小超出了HTML表单隐藏域属性的MAX＿FILE＿SIZE元素所指定的最大值。
									3：表示文件只被部分上传。
									4：表示没有上传任何文件。
									6：找不到临时文件夹
									7：文件写入失败
								name：上传的文件名
								size：文件的大小
								type：文件类型
								tmp_name: 临时文件

						2：is_uploaded_file() //是否是上传文件
						3：move_uploaded_file（） //执行移动上传文件
						
							
					四、 下载设置：
						header("Content-Type:类型"); //指定响应类型
						header("Content-Disposition:attachment;filename=文件名"); //**执行下载文件名
						header("Content-Length:文件大小");

						readfile("./uploads/".$picname); //读取并输出图片内容；
						
						
						ps:
						//文件上传的完整处理

						//1. 初始化上传文件信息
						$upfile = $_FILES['pic']; //获取上传文件信息
						$path = "./uploads/"; //指定上传文件存储路径
						$typelist = array("image/jpeg","image/png","image/gif"); //设置允许上传文件的类型，空数组表示不限制
						$maxsize = 0; //设置允许上传文件大小，0表示不限制。

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
							die("上传失败! 原因：".$info);
						}

						//3. 判断上传文件类型
						if(is_array($typelist) && count($typelist)>0){
							if(!in_array($upfile['type'],$typelist)){
							   die("上传失败! 原因：上传文件类型不符。"); 
							}
						}

						//4. 判断上传文件大小
						if($maxsize>0){
							if($upfile['size']>$maxsize){
							   die("上传失败! 原因：上传文件大小超出。");   
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
								echo "上传文件成功!,文件名：".$newname;
							}else{
								die("上传失败! 原因：移动上传文件失败。");
							}
						}else{
							die("上传失败! 原因：无效的上传文件。"); 
						}
						
						
						
						----------------------------------------------
						
						
						
						//使用函数处理文件上传


						//使用下面自定义的函数处理文件上传
						$typelist = array("image/jpeg","image/png","image/gif");
						$data = uploadfile($_FILES["pic"],"./uploads/",$typelist);
						//判断是否上传成功
						if($data['error']){
							echo "上传成功！文件名：".$data['info'];
						}else{
							echo "上传失败！原因：".$data['info'];
						}





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
						function uploadfile($upfile,$path,$typelist=array(),$maxsize=0){
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
						
						
						
						----------------------------------------------
						
						
						
						//使用函数处理多文件上传

						echo "<pre>";
						print_r($_FILES);

						//使用函数实现上传

						require("functions.php"); //导入函数库
						$typelist = array("image/jpeg","image/png","image/gif"); //定义允许类型

						//使用foreach遍历上传信息并执行一个一个的上传处理
						foreach($_FILES as $upfile){
							//使用函数执行一个一个的文件上传
							$res = uploadFile($upfile,"./uploads/",$typelist);
							if($res['error']){
								echo "上传成功！文件名：".$res['info']."<br/>";
							}else{
								echo "上传失败！原因：".$res['info']."<br/>";
							}
						}
						
						
						
						----------------------------------------------
						
						
						
						//使用函数处理多文件上传

						echo "<pre>";
						print_r($_FILES);

						//将$_FILES数组进行转换
						$list =array();
						foreach($_FILES['pic']['name'] as $k=>$v){
							$list[$k]['name']=$v;
							$list[$k]['type']=$_FILES['pic']['type'][$k];
							$list[$k]['size']=$_FILES['pic']['size'][$k];
							$list[$k]['tmp_name']=$_FILES['pic']['tmp_name'][$k];
							$list[$k]['error']=$_FILES['pic']['error'][$k];
						}

						print_r($list);


						//使用函数实现上传
						require("functions.php"); //导入函数库
						$typelist = array("image/jpeg","image/png","image/gif"); //定义允许类型

						//使用foreach遍历上传信息并执行一个一个的上传处理
						foreach($list as $upfile){
							//使用函数执行一个一个的文件上传
							$res = uploadFile($upfile,"./uploads/",$typelist);
							if($res['error']){
								echo "上传成功！文件名：".$res['info']."<br/>";
							}else{
								echo "上传失败！原因：".$res['info']."<br/>";
							}
						}
												  
												  
												  
			--------------------------------------------------------
						
						
						
	===================================
		PHP_MySQL的操作
	===================================
	一、操作步骤：
		1. 连接MySQL数据库
		2. 判断是否连接成功
		3. 选择数据库
		4. 设置字符集
		5. 准备SQL语句
		6. 向MySQL服务发送SQL语句
		7. 解析处理结果集
		8. 释放结果集，关闭数据库连接
		
	二、常用操作：
	   1. mysql_connect();--连接数据库，并返回一个连接资源
		  格式： mysql_connect(主机名，用户，密码); 
			--其中参数可选，若不写则参考php.ini中默认配置
			
	   2. mysql_error(); --获取刚刚（最后）执行数据库操作的错误信息
	   
	   3. mysql_errno(); --获取刚刚（最后）执行数据库操作的错误号
			错误号为0表示没有错误
	   
	   4. mysql_select_db(数据库名[,数据库连接])； 
			选择一个数据库，等同于"use 库名"语句
			
	   5. mysql_set_charset(字符编码)；  --设置字符编码
		  例如：mysql_set_charset("utf8"); 等同于：mysql_query("set names utf8");
	   
	   6. mysql_query(sql语句[，数据库连接])； -- 发送一条sql语句
			 sql语句若是查询，则返回结果集，其他则返回boolean值表示执行是否成功。
			
	   7. 解析结果集函数：
			mysql_fetch_array();  --以关联和索引两种方式数组解析结果集
			  也可以指定第二参数来定义返回格式：
				 MYSQL_BOTH(0关联和索引)/MYSQL_NUM(2索引)/MYSQL_ASSOC(1关联)
				
			mysql_fetch_row();	  --以索引式数组解析结果集
			*mysql_fetch_assoc(); --以关联式数组解析结果集
			mysql_fetch_object(); --以对象方式解析结果集
		
	   8. mysql_free_result(结果集名)； --释放结果集
		
	   9. mysql_close(数据库连接); --关闭数据库连接
	   
	   10. mysql_num_rows(结果集); --获取结果集中的数据条数
	   
	   11. mysql_num_fields(结果集); --获取结果集中的列数（字段数量）
	   
	   12. mysql_result(); --定位取结果
				echo mysql_result($result,0,3)."<br/>"; //获取第1条数据的第4列中的值
				echo mysql_result($result,1,2)."<br/>"; //获取第2条数据的第3列中的值
				echo mysql_result($result,5,4)."<br/>"; //获取第6条数据的第5列中的值
				
	   13.mysql_affected_rows — 取得前一次 MySQL 操作所影响的记录行数
			关联的 INSERT，UPDATE 或 DELETE 查询所影响的记录行数。
			
	   14. mysql_insert_id — 取得上一步 INSERT 操作产生的 ID 
	   
		--------------------------------------------
	   //通过PHP程序操作数据库

		//连接mysql数据库
		$link = @mysql_connect("localhost","root","");
		//判断是否连接成功
		if(!$link){
			die("数据库连接失败！错误号：".mysql_errno()."; 原因：".mysql_error());
		}
		var_dump($link);

		//关闭数据库
		mysql_close($link);
		
		
		
		---------------------------------------------
		
		
		
		//通过PHP程序操作数据库

		//导入配置文件
		require("config.php");

		//连接mysql数据库，并判断
		$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败！");
		//var_dump($link);

		//选择数据库，并设置编码
		mysql_select_db(DBNAME,$link);
		mysql_set_charset("utf8");

		//定义sql语句并发送执行
		$sql = "select * from stu";
		$result = mysql_query($sql,$link);

		//解析结果(解析一条数据并输出)
		$row = mysql_fetch_row($result);
		print_r($row);

		//释放结果集，关闭数据库
		mysql_free_result($result);
		mysql_close($link);
		
		
		
		-----------------------------------------
		
		
		
		//通过PHP程序操作数据库的完整步骤
		//(六脉神剑)

		//第一剑：导入配置文件
		require("config.php");

		//第二剑：连接MySQL数据库并判断是否成功
		$link = @mysql_connect(HOST,USER,PASS)or die("数据库连接失败！"); 

		//第三剑：选择数据库并设置编码
		mysql_select_db(DBNAME,$link);
		mysql_set_charset("utf8");

		//第四剑：定义sql语句，并发送执行（若是查询则返回结果集，增删改返回的是是否成功）;
		$sql = "select * from stu";
		$result = mysql_query($sql,$link);

		//第五剑：处理sql执行结果(若是查询则是结果集解析)
		//以关联式数组解析结果集
		while($row = mysql_fetch_assoc($result)){
			echo $row['id'].":".$row['name'].":".$row['classid']."<br/>";

		}

		echo "本次查询数据".mysql_num_rows($result)."条<br/>";
		echo "本次查询数据的字段".mysql_num_fields($result)."列<br/>";

		echo "对结果集定位取值：".mysql_result($result,5,1);

		/*
		$row = mysql_fetch_row($result);  // 以索引数组解析
		print_r($row);
		echo "<hr/>";
		$row = mysql_fetch_assoc($result); //以关联式数组解析
		print_r($row);
		echo "<hr/>";
		$row = mysql_fetch_array($result); //以索引加关联解析
		print_r($row);
		echo "<hr/>";
		$row = mysql_fetch_object($result); //以对象结构解析
		print_r($row);
		echo "<hr/>";

		*/
		//第六剑：关闭数据库（若有查询则会有释放结果集）
		mysql_free_result($result);
		mysql_close($link);
						  
						  
						  
						  

						  
===================================================					  
   PHP的面向对象：
===================================================
	对象是客观存在的一个实体。
	类是对对象抽象的一个描述。
	
	概念：对象（实体）、类、 类与对象的关系。
	
	oop面向对象编程的特点：封装、继承、多态
	
	类和对象的关系：
		类的实例化结果就是一个对象（使用new关键字）
		对对象的抽象描述就是一个类

一、如何定义一个类，和使用
-------------------------------------
	1.1 语法格式：
		[修饰符] class 类名{
		   【成员属性】定义变量   

		   【成员方法】定义函数
		}

		[修饰符] class 类名 [extends 父类] [implements 接口1[,接口2...]]{
		   【成员属性】定义变量   

		   【成员方法】定义函数
		}

	1.2 其中成员属性格式：
			修饰符 $变量名[=默认值];  如：public $name="zhangsan";
			注意：成员属性不可以是带运算符的表达式、变量、方法或函数的调用。 如：
					public $var3 = 1+2;
					public $var4 = self::myStaticMethod();
					public $var5 = $myVar;
			正确定义方式：
					public $var6 = 100; //普通数值（4个标量：整数、浮点数、布尔、字串）
					public $var6 = myConstant; //常量
					public $var7 = self::classConstant; //静态属性
					public $var8 = array(true, false);  //数组
					
			常用属性的修饰符：public、protected、private、static、var
			
	1.3 其中成员方法格式：
			[修饰符] function 方法名(参数..){
				[方法体]
				[return 返回值]
			}
			
			常用的修饰符：public、protected、private、static、abstract、final
			
	1.4 对象： 他是通过new 类（）来产生的对象。其中new称为实例化
		也就是：类的实例化就会产生一个对象。
		如： $p = new Person();

	1.5 $this 关键字： 表示自己，表示当前使用对象。
	  我们在类中调用自己的成员属性或函数都是使用 $this->调用。
	  注意：非静态方法中可以使用this关键字  

二、构造函数和析构函数
------------------------------------------
	2.1. 构造方法（构造函数）：
		当我们通过new关键字来创建一个对象时，第一个自动执行的方法称为构造方法。
		方法名__construct();  主要用于初始化对象。
		（在php4.0时可使用与类名重名的方法作为构造方法）
		
	2.2. 析构方法：当这个对象被销毁时最后自动调用的方法,称为析构方法。
		 __destruct(); 目的是释放资源（如关闭连接、文件，释放资源）
		 
------------------------------------------
//类的定义和使用

//类的定义
class A{
    //成员属性（成员变量）
    public $a=10;
    public $b=20;
    
    //成员方法（成员函数）
    public function fun(){
        echo "aaaaaaaa<br/>";
    }
}


/*
//定义一个类
class AB{
    
    function aa(){
        echo "aaaaaaaaaa<br/>";
    }

    function bb(){
        echo "bbbbbbbbbb<br/>";
    }
}


$ab = new AB(); //将类实例化一个对象
//通过对象调用自己的方法（功能）
$ab->aa();
$ab->bb();
*/

------------------------------------------
//类的定义格式：
/*
    class 类名{
        成员属性
        成员方法
    }
*/
//PHP的8种类型中：对象和资源类型属于引用类型，其他都属于值类型。
//define("PI","3.14");


//定义一个demo类
class Demo{
    public $name="zhangsan";
    public $age=20;
    
    public function fun(){
        echo "demo";  
    }
}

//实例化一个类产生一个对象
$d1 = new Demo();
$d2 = $d1; //由于对象属于引用类型，故d2是d1别名
$d3 = new Demo();

$d1->name="lisi";

var_dump($d1);
echo "<br/>";
var_dump($d2); //此对象和d1对象时同一个对象
echo "<br/>";
var_dump($d3);

------------------------------------------

//对象中的属性和方法调用
class Person{
    //成员属性
    public $name;
    public $age;
    //成员方法
    public function getinfo(){
        return $this->name.":".$this->age;
    }
}

//实例化对象
$p = new Person();

$p->name="zhangsan"; //通过对象p调用自己的属性给赋值
$p->age=20; //通过对象p调用自己的属性给赋值

echo $p->name; //输出自己的属性
echo "<br/>";
echo $p->getinfo(); //通过对象调用自己方法。

------------------------------------------

//$this的使用

//定义一个demo类，内有一个属性和方法
class Demo{
    public $name;
    
    public function getName(){
        return $this->name;
        //此处的this表示当前对象，就是谁调用当前方法this就代表谁。
    }
}

//同一个类new出多个对象，都是各自独立，内部成员属性不会共享，各自独立。
$d1 = new Demo();
$d2 = new Demo();

$d1->name="zhangsan"; //为d1对象的name属性赋值
$d2->name="lisi"; //为d2对象的name属性赋值

echo $d1->getName()."<br/>"; //zhangsan  输出d1对象的name属性值

echo $d2->getName(); //lisi 输出d2对象的name属性值

------------------------------------------

//构造方法：就是在new 类产生一个对象时自动执行的方法，目的为了初始化对象。

//定义一个Person类
class Person{
    //成员属性
    public $name;
    public $sex;
    public $age;
    
    //构造方法，当实例化对象时自动调用此方法，初始化对象属性
    public function __construct($name,$sex,$age){
        //初始化
        $this->name = $name;
        $this->sex  = $sex;
        $this->age  = $age;
    }
    
    //普通成员方法
    public function getInfo(){
        return "我的信息:姓名：".$this->name."；sex:".$this->sex."; age:".$this->age."<br/>";
    }
    
}


//测试
$p1 = new Person("张三","男",20);
$p2 = new Person("张无忌","男",30);

echo $p1->getInfo();
echo $p2->getInfo();




/*
class Demo{
    //当实例化当前类时，此方法会自动调用
    public function __construct(){
        echo "aaaaa";
    }
}

$d = new Demo();

*/

------------------------------------------

//析构方法：__destruct();

class A{
    public $name;
    public function __construct($name){
       $this->name = $name;
       echo $this->name." 构造....<br/>"; 
    }
    //析构方法
    public function __destruct(){
        echo $this->name." 析构....<br/>";
    }
}

$a1 = new A("demo1");
$a1=null;
$a2 = new A("demo2");
$a3 = new A("demo3");

=================================================

三、封装（访问控制）
--------------------------------------------------------------------
	3.1 封装：就是将属性私有，并提供公有的setter放置与getter取值方法

			 public(公有)    protected(受保护)    private(私有)
	  ===========================================================
	   在本类中      Y               Y                   Y
	   在子类中      Y               Y                   N 
	   在类外边      Y               N                   N
	   
--------------------------------------------------

//类的封装：就是使用private protected public关键字修饰类中的成员属性和方法，已达到尽可能隐藏内部细节。

//定义一个demo类
class Demo{
    //定义成员属性
    public $x=10;  //公有属性
    protected $y=20; //受保护属性
    private $z=30;  //私有属性
    
    //定义成员属性
    public function fun1(){
        echo "公有方法fun1.... <br/>";
    }
    protected function fun2(){
        echo "受保护方法fun2.... <br/>";
    }
    private function fun3(){
        echo "私有方法fun3.... <br/>";
    }
    
    //在类的内部可以使用自己的属性和方法
    public function fun(){
        echo $this->x.":".$this->y.":".$this->z."<br/>";
        $this->fun1();
        $this->fun2();
        $this->fun3();
    }
}

//测试：
$d = new Demo(); //实例化Demo类产生一个对象d

echo $d->x; //10 使用公有属性
//echo $d->y; //报错，不可以在类外使用受保护属性
//echo $d->z; //报错，不可以在类外使用私有属性

//测试方法
$d->fun1(); //可以调用
//$d->fun2(); //报错，不可以在类外使用受保护方法
//$d->fun3();   //报错，不可以在类外使用私有方法
$d->fun();

--------------------------------------------------

//类的封装:属性私有化，并提供公有的属性和方法

class Person{
    private $name;
    private $age=20;
    private $sex;
    
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    
    public function setSex($sex){
        $this->sex = $sex;
    }
    public function getSex(){
        return $this->sex;
    }
    
    public function setAge($age){
        if($age<1){
            echo("年龄赋值错误");
        }else{
            $this->age = $age;
        }
    }
    
}

$p = new Person();

$p->setName("张三");
$p->setSex("男");
$p->setAge(-30);

echo $p->getName().":".$p->getSex().":".$p->getAge();

--------------------------------------------------

//魔术方法：__set()  __get()

//定义Person类
class Person{
    //成员私有属性
    private $name;
    private $age;
    private $sex;
    
    //构造方法
    public function __construct($name,$age,$sex){
        $this->name = $name;
        $this->sex  = $sex;
        $this->age  = $age;
    }
    
    //魔术get方法，当直接输出当前对象中非公有属性时自动调用此方法，并将属性名作为参数传入。
    public function __get($param){
        if($param=="age"){
            return "不告诉你！";
        }
        return $this->$param; //可变属性
    }
    
    //魔术set方法,当直接设置对象中非公有属性时自动调用此方法，并将属性名和值作为参数传入。
    public function __set($param,$value){
        $this->$param = $value;
    }
}
//使用Person类
$p = new Person("张三",20,"男");
$p->sex="女"; //修改属性值
echo $p->sex; //当我们直接输出对象中的非公有属性时会尝试调用魔术__get方法

------------------------------------------------

//魔术方法：__isset()和__unset();

class Demo{
    public $x=10;
    protected $y=20;
    private $z=30;
    
    //魔术方法，实现对象中非公有属性的判断是否存在
    public function __isset($param){
        return isset($this->$param);
    }
    //魔术方法，__unset(),实现非公有属性的销毁
    public function __unset($param){
        unset($this->$param);
    }
}

$d = new Demo();

echo "<pre>";
print_r($d);

//判断一个对象中的属性是否存在
var_dump(isset($d->x)); //bool(true)
var_dump(isset($d->a)); //bool(false)
var_dump(isset($d->y)); //bool(true)

echo "<hr/>";
//尝试删除对象中的属性
//unset($d->x);
unset($d->y);

print_r($d);

======================================================

四、 重载 
----------------------------------------------------------------
	4.1 属性重载中的四个魔术方法：__set() __get() __isset() __unset() 

	  * __get()：当我们直接输出一个对象中的非公有属性时会自动调用的方法，
				并将属性名以第一个参数传进去。
				__get($name){...}
				
	  * __set(); 当我们直接设置一个对象中的非公有属性时会自动调用的方法，
				并将属性名以第一个参数，值作为第二参数传进去。
				__set($name,$value){...}

	   __isset()当对未定义的变量调用isset() 或 empty()时，__isset() 会被调用。
		   //当isset判断一个对象的非公有属性是否存在时，自动调用此方法。
		   public function __isset($param){
			  return isset($this->$param);
		   }
		   
	   __unset()当对未定义的变量调用unset()时，__unset() 会被调用。
		   //当unset销毁一个对象的非公有属性时，自动调用此方法。
		   public function __unset($param){
			  unset($this->$param);
		   }
		   
	4.2 方法的重载:
		*  mixed __call ( string $name , array $arguments )
		  mixed __callStatic ( string $name , array $arguments )  php5.3.0支持

		当调用一个不可访问方法（如未定义，或者不可见）时，__call() 会被调用。 
		其中第一个参数表示方法名，第二参数表示调用时的参数列表（数组类型）

		当在静态方法中调用一个不可访问方法（如未定义，或者不可见）时，__callStatic() 会被调用。 

五、 继承
----------------------------------------------------------------------------
	5.1. 继承：extends
		 假如Ｂ类继承Ａ类，那么就继承了Ａ中所有非私有属性和方法（函数）。
		　　其中Ａ叫父类（基类）。　Ｂ叫子类（派生类）
		 class B extends A{ 
			....
		 }

		在php中类只支持【单一继承】，就是一类只能继承一个父类。

	    parent关键字：若子类出现覆盖父类的方法，那么有时还想调用被覆盖掉了的方法，
	    我们就是用关键字【parent::父类方法】还有使用类名
		
		
		class A{
			public function __construct(){
				//....
			}
		}
		class B extends A{
			public function __construct(){
				parent::__construct();//注意要调用一下父类的构造方法
				//....
			}
		}

六、 final、static和const
---------------------------------------------------------------
	6.1 final关键字:主要用于修饰类与成员方法（函数）
	   
	   使用final关键字修饰类，表示这个类不可以有子类。(一般是没有必要有子类的，防止有子类的覆盖)
	   使用final关键字修饰的方法，不可以在子类中被覆盖(重写)。
		目的：一是为了安全，二是没有必要
	*6.2 static关键字:表示静态的意思: 用于修饰类的属性和方法
	   *static关键字修饰方法称为静态方法，可以不用new（实例化）就可以直接使用方法：如 类名::方法名
			注意：静态方法在实例化后的对象也可以访问  //$对象名->静态方法名
		  
   	   static关键字修饰属性称为静态属性，可以不用new（实例化）就可以直接访问属性：如 类名::属性名
			 注意：静态属性在实例化后的对象不可以访问； //$对象名->静态属性名
	   
	   注意：静态属性是共享的。也就是new很多对象也是共用一个属性
			*在静态方法中不可以使用非静态的内容。就是不让使用$this
			 在类的方法中可以使用其他静态属性和静态方法，不过要使用self关键字：
				 如 【self::静态属性名】或【self::静态方法名】
			
			在一个类的方法中若没有出现$this的调用，默认此方法为静态方法。
				 
	*6.3. const关键字： 在类中修饰成员属性，将其定义成常量（不可修改的），
		一般要求常量名都是大写的,没有“$”符 没有其他修饰符（public）
		在其他方法中使用常量： 【self::常量名】
		定义格式:  const 成员常量名="值"; 
     使用：在类的方法中：   echo self::成员常量名;
	         在类的外部：   echo 类名::成员常量名;
	
	6.4. 检测当前对象是否是属性指定的类
		instanceof 用于确定一个 PHP 变量是否属于某一类 class 的实例：
			 
		is_a — 如果对象属于该类或该类是此对象的父类则返回 TRUE
		
--------------------------------------------------------

//类的继承：extends

class A{
    public $name="qq";
    public $num = 20;
    
    public function demo(){
        echo "aaaaaaaaaaaaa<br/>";
    }
}

//定义一个子类，子类会继承父类中的属性和方法
class B extends A{
    
}

//使用 子类
$b = new B();
echo $b->name;
echo $b->num;

$b->demo();

---------------------------------------------------------

//类的继承中的封装
class A{
    public $x=10;
    protected $y=20;
    private $z=30;
    public function getZ(){
        return $this->z."<br/>";
    }
}

class B extends A{
    public function info(){
        //其中私有属性z是获取不到的。
        echo $this->x.":".$this->y.":".$this->z."<br/>";
        echo $this->getZ();
    }
}


$b = new B();

$b->info();
//echo $b->y; //此处不可用，因为在类的外部。
var_dump($b);

---------------------------------------------------------

//子类的扩展

class A{
    public function fun1(){
        echo "class A fun1()...<br/>";
    }
    public function fun2(){
        echo "class A fun2()...<br/>";
    }
}

class B extends A{
    //在子类中定义一个父类没有的方法，称扩展
    public function fun3(){
        echo "class B fun3()...<br/>";
    }
    
    //在子类中定义一个和父类一样的方法（方法覆盖，重写），称升级（更新）。
    public function fun2(){
        echo "class B fun2()....<br/>";
    }
    
    public function old_fun2(){
        parent::fun2(); //调用被子类覆盖掉了的方法
    }
}

---------------------------------------------------------

//定义信息类和继承的使用

//人信息类
class Person{
    //私有属性
    private $name;
    private $age;
    
    //构造方法
    public function __construct($name,$age){
        $this->name = $name;
        $this->age = $age;
    }
    
    //获取信息方法
    public function getInfo(){
        return "姓名:".$this->name."; 年龄:".$this->age;
    }
}

//学生信息类
class Stu extends Person{
    //私有属性
    private $classid;
    //构造方法
    public function __construct($name,$age,$classid){
        parent::__construct($name,$age); //先构造父类
        $this->classid = $classid;
    }
    //获取信息方法
    public function getInfo(){
        return parent::getInfo()."; 班级:".$this->classid;
    }
}


//测试
$p = new Person("张三",20);
echo $p->getInfo();

echo "<br/>";

$stu = new Stu("李四",22,"lamp93");
echo $stu->getInfo();

---------------------------------------------------------

<?php
//继承中的其他写法

class A{
    //为子类使用准备
    public function demo(){
        echo $this->name;
        $this->fun();
    }
}

class B extends A{
    public $name="qq";
    
    public function fun(){
        echo "bbbbbbbbbb";
    }
}

$b = new B();
$b->demo();
						  
---------------------------------------------------------

//final关键字的使用
//final关键字是用来修饰方法和类，特点，就是修饰的方法不能被子类覆盖，修改的类不可以有子类。

//使用final修饰的类不可有子类。
final class A{
    //使用final修饰的方法不可被子类覆盖。
    public final function fun1(){
        echo "class A fun1()....<br/>";
    }
    
    public function fun2(){
        echo "class A fun2()....<br/>";
    }
    
    public final function max($a,$b){
        return ($a>$b)?$a:$b;
    }
}
 
/*
class B extends A{
    //不可以覆盖父类的方法
    //public function fun1(){
    //    echo "class B fun1()....<br/>";
    //}
}
*/

---------------------------------------------------------

//静态：static

class Demo{ 
	//使用static定义的方法称静态方法，不需要将类实例化，就可以通过类名::调用。
    public static function max($a,$b){
        return ($a>$b)?$a:$b;
    }
    
    public static function add($a,$b){
        return $a+$b;
    }
}

//使用静态方法
echo "10和30谁大？".Demo::max(10,30)."<br/>";
echo "100和300之和？".Demo::add(100,300)."<br/>";


/*
//方法没有使用静态的用法
$d = new Demo;
echo "10和30谁大？".$d->max(10,30)."<br/>";
echo "10和30之和？".$d->add(10,30)."<br/>";
*/

---------------------------------------------------------

//静态属性

class A{
    public static $name="zhangsan"; //静态属性只有一份，和对象数数量无关。
    public $age=10;
    //定义静态方法返回静态属性
    public static function fun(){
		//echo $this->age=20;
        return self::$name; //在类的内部使用self调用自己的静态属性或方法。
    }
}

echo A::$name; //输出类A中的静态属性name

echo A::fun(); //调用静态方法


$a = new A();

A::$name="lisi";

echo $a->fun();

echo $a::$name;

$a::$name="wangwu";

echo A::$name;

----------------------------------------------------------

//PHP中单例(单态)设计模式

class Demo{
    //定义私有静态属性用于维持住存放当前类的对象。
    private static $ob=null;
    //构造方法私有化，目的不让在外面new实例化。
    private function __construct(){
        
    }
    //提供公有的静态方法，来获取当前类的唯一对象
    public static function makeOb(){
        //判断当前类的对象是否没有实例化
        if(self::$ob==null){
            //实例化后放到当前类的静态属性中
            self::$ob=new Demo();
        }
        //返回静态属性，即当前类的唯一对象。
        return self::$ob;
    }
    
    //定义自己类中其他方法和属性
    
}

$d1 = Demo::makeOb();
$d2 = Demo::makeOb();

var_dump($d1);
var_dump($d2);

-------------------------------------------------------------

//类中常量定义：const

class Game{
    //此处定义常量是便于理解
    const UP=38;
    const DOWN=40;
    const LEFT=37;
    const RIGHT=39;
    
    public function move($m){
        switch($m){
            case 37: echo "向左移动5px...<br/>"; break;
            case 38: echo "向上移动5px...<br/>"; break;
            case 39: echo "向右移动5px...<br/>"; break;
            case 40: echo "向下移动5px...<br/>"; break;
        }
    }
}

$g = new Game();
$g->move(Game::LEFT);
$g->move(Game::UP);
$g->move(Game::RIGHT);
$g->move(Game::DOWN);
$g->move(Game::UP);

============================================================						  
						  
七、 类型约束
----------------------------------------------------
	1. 类型约束可以使用的类型是：数组或对象。
		若指定的一个类名，那么可传入本类及子类的对象进去。
		可以使用的约束类型：（复合类型）数组array，类名、抽象类名、接口名
	//如下面的类
	class MyClass
	{
		/**
		 * 测试函数
		 * 第一个参数必须为类OtherClass的一个对象
		 */
		public function test(OtherClass $otherclass) {
			echo $otherclass->var;
		}

	

		/**
		 * 另一个测试函数
		 * 第一个参数必须为数组 
		 */
		public function test_array(array $input_array) {
			print_r($input_array);
		}
	}
	
八、其他魔术方法：
-----------------------------------------------------------------
	1. 对象复制clone 克隆一个对象，因为对象属于引用类型，普通的“=”号属于引用赋值，
		所有需要clone来复制一份。
		魔术方法：__clone() 当执行clone克隆时会自动调用的方法。
	
	2. __toString()方法：魔术方法，当我们直接要输出一个对象时，如echo $a,print $a，
		那么会自动调用的方法。
		注意：__toString()方法必须返回一个字串类型的值。


	3. *自动加载类函数__autoload(类名): 
		当new 实例化一个对象时，这个类若不存在，则自动调用此函数，并将类名存入参数
		我可以使用这个实现类的自动加载。

		
九、 对象序列化(串行化)(webservice  XML)(在对象持久化存储、和传输中使用)
----------------------------------------------------------------------------------------------
	serialize() -- 串行化
	unserialize() -- 反串行化

	php里面的值都可以使用函数serialize()来返回一个包含字节流的字符串来表示。
	unserialize()函数能够重新把字符串变回php原来的值。 
	序列化一个对象将会保存对象的所有变量，但是不会保存对象的方法，只会保存类的名字。

	__sleep 和 __wakeup 
	
		__sleep(): 是执行串行化时自动调用的方法，目的是实现资源类型的属性实关闭操作。
			注意：sleep方法需要返回一个数组，其中数组中的值是串行化时要保留的属性名
			
		__wakeup():是在执行反串行化时自动调用的方法，目的是实现资源属性的打开（sleep方法关闭的资源）

	public function __seep(){
        return array('server', 'username', 'password', 'db');
		//此串行化要保留四个属性
    }

----------------------------------------------------------

//值传递和引用传递
/*
$a = 10;
$b = $a; //值传递
$b = 20;
echo $a; //10

$a = 10;
$b = &$a; //引用传递
$b=20;
echo $a; //20
*/

class A{
    public $name="aa";
}

$a = new A();
$b = $a; //对象的赋值属于引用赋值（因为对象默认属于引用类型）
$b->name="bb";
echo $a->name; //bb

//因为对象默认属于引用传递，所以为了实现复制操作。故使用克隆
$a1 = new A();
$b1 = clone $a1; //将a1对象克隆一份传给b1
$b1->name="bb";
echo $a1->name; //aa	
						  
----------------------------------------------------------						  
						  
//普通对象的复制（克隆）clone：
//普通对象的属性信息都是基本数据类型（标量、空或数组）
$s1 = new Stu("zhangsan",20);

//$s2 = $s1; //引用赋值
$s2 = clone $s1; //克隆一个对象

echo "<pre>";
var_dump($s1);
var_dump($s2);




class Stu{
    private $name;
    private $age;
    public function __construct($name,$age){
        $this->name = $name;
        $this->age = $age;
    }
    
    public function getInfo(){
        return $this->name.":".$this->age;
    }
}

----------------------------------------------------------						  
						  
//特殊对象的复制（克隆）clone：
//特殊对象就是对象中含有子对象后资源属性
//此对象在复制一份时，内部子对象和资源属性并没有复制一份。

//测试
$f = new File("a.txt");
echo $f->myread(40);
echo "<hr/>";
echo $f->myread(40);

$f2 = clone $f;
//$f=null;
echo $f2->myread(40);
echo "<pre>";
var_dump($f);
var_dump($f2);


//定义一个文件信息读取类
class File{
    private $filename;
    private $flink;
  
    public function __construct($filename){
        //初始化文件信息
        $this->filename = $filename;
        //打开文件
        $this->flink = fopen($filename,"r");
    }
    
    public function myread($m){
       return fread($this->flink,$m);
    }
    
    public function __clone(){
        $this->flink = fopen($this->filename,"r");
    }
    
    public function __destruct(){
        if($this->flink){
            fclose($this->flink);
        }
    }
}						  
						  
----------------------------------------------------------						  
						  
//魔术方法__toString()的定义和使用

//实例化stu类产生的对象：
$stu = new Stu("wangwu",22);

//当直接输出一个对象时，会自动调用__toString方法
echo $stu; 


class Stu{
    private $name;
    private $age;
    public function __construct($name,$age){
        $this->name = $name;
        $this->age = $age;
    }
    
    //此方法必须无参数，返回字串类型的值，当直接输出一个对象时自动调用。
    public function __toString(){
       return "名字：".$this->name."； 年龄:".$this->age; 
    }
}						  
						  
----------------------------------------------------------						  
						  
//魔术方法__call（）的使用

class Demo{
    public function fun1(){
        echo "fun1()....<br/>";
    }
    
    public function fun2(){
        echo "fun2()....<br/>";
    }
    
    //魔术方法
    public function __call($method,$params){
        //echo "aaaa";
        echo "你调用的方法{$method}不存在！<br/>";
        echo "参数：";
        print_r($params);
    }
}

//测试
$demo = new Demo();

$demo->fun1();
$demo->fun2();

//当调用一个不存在的方法时，会先尝试调用当前对象中的魔术方法__call()
$demo->fun3(10,20);						  
						  
----------------------------------------------------------						  
						  
//自动加载的使用

function __autoload($classname){
   //先判断类文件是否存在，再尝试调用。
   if(file_exists($classname.".class.php")){
     require($classname.".class.php");
   }
}

//require("Stu.class.php");

//当实例化一个不存在的类时，会尝试调用魔术方法__autoload()
$stu = new Stu("zhangsan",20);

echo $stu;						  
						  
----------------------------------------------------------						  
						  
//对象的串行化（序列化）：
//serialize() -- 串行化
//unserialize() -- 反串行化

//实例化类产生一个对象
$stu = new Stu("王五",20);
echo $stu."<br/>";

//将对象串行化
$str = serialize($stu);
echo $str."<br/>";

//将字串写入到一个文件中
file_put_contents("ob.txt",$str);

//将字串从文件ob.txt中读取出来
$info = file_get_contents("ob.txt");

//将字串info反串行化成对象。
$ob = unserialize($info);

echo $ob;


class Stu{
    private $name;
    private $age;
    public function __construct($name,$age){
        $this->name = $name;
        $this->age = $age;
    }
    
    //此方法必须无参数，返回字串类型的值，当直接输出一个对象时自动调用。
    public function __toString(){
       return "名字：".$this->name."； 年龄:".$this->age; 
    }
}						  
						  
----------------------------------------------------------						
				
//对象的串行化
//serialize() -- 串行化
//unserialize() -- 反串行化


$f = new File("a.txt");

echo $f->myread(40)."<br/>"; //可以使用

$str = serialize($f); //将对象f串行化

$ob =  unserialize($str); //反串行化

echo $ob->myread(40);


//定义一个文件信息读取类
class File{
    private $filename;
    private $flink;
    private $p;
  
    public function __construct($filename){
        //初始化文件信息
        $this->filename = $filename;
        //打开文件
        $this->flink = fopen($filename,"r");
    }
    
    public function myread($m){
       return fread($this->flink,$m);
    }
    
    //串行化魔术方法
    public function __sleep(){
        $this->p = ftell($this->flink);
        return array("filename","p"); //返回串行化时要保留的属性
    }
    
    //反串行化
    public function __wakeup(){
        //重新打开这个文件
        $this->flink = fopen($this->filename,"r");
        fseek($this->flink,$this->p,SEEK_SET);//定位指针位置。
    }
}

-----------------------------------------------------------

//类型约束：支持类型：数组和对象

//定义一个函数，要求参数必须为数组
function fun(array $a){
    foreach($a as $v){
        echo $v." ";
    }
}

//定义一个函数，要求参数必须为A类对象，或A类子类的对象。
function fun2(A $a){
  //.....
}

fun(array(10,20,30,40));

fun("asdfa");


class A{

}				
				
-----------------------------------------------------------

//类的其他使用技巧: 连贯调用

class Demo{
    public $str;
    
    public function append($s){
        $this->str.=$s; //追加字串
        return $this;
    }
}

$d = new Demo();
//使用连贯操作
echo $d->append("aa")->append("bb")->append("cc")->str;
//$d->append("bb");
//$d->append("cc");
//echo $d->str;

===========================================================

十、 抽象类：
-------------------------------------------------------------------------------------  
      当类中有一个方法，他没有方法体，也就是没有花括号，直接分号结束。
	如 public abstract function fun();
	象这种方法我们叫抽象方法，必须使用关键字abstract定义，
	包含这种方法的类必须是抽象类也要使用关键字abstract加以声明。
   
    抽象类的特点：
	不能实例化，也就new成对象
	若想使用抽象类，就必须定义一个类去继承这个抽象类，并定义覆盖父类的抽象方法(实现抽象方法)。

    其实抽象类对于子类（实现类），有一个约束的作用，

   含有抽象方法的类肯定是抽象类，但是不是所有的抽象类都必须包含抽象方法。

十一、 接口:
-------------------------------------------------------------------------------------------------
   假如一个抽象类中所有的方法都是抽象的，那么我们可以使用另外一种方式定义：接口
   接口使用关键字interface来定义，接口中只能有常量与抽象方法。
   格式：
	 interface 接口名{
		[常量定义]
		[抽象方法定义] //注意不要有abstract关键字
	 } 

   实现方式：class 类名  implements 接口名，接口名2{
		实现体。。
   }

   
十二、多态
-------------------------------------------------------------------------------------------
	*多态(使用方式)：对于同一个方法，传入不同对象，实现了不同的效果，这个就是多态的意思，
      需要使用的技术：继承或实现，方法的覆盖（重写）。

	实例：
	主板：mainboard   PCI插槽（规范接口）  

	第三方生产
	声卡: soundCard
	网卡: networkCard 
	
	设计模式：单例、单态设计模式



	http://localhost/.../index.php?m=类名&a=方法名&其他参数

	http://localhost/.../user/add.html

	http://news.sohu.com/web/123456.html

	http://news.sohu.com//find?id=123456

-----------------------------------------------------------

//抽象类：
abstract class Demo{
    public static function fun1(){
        echo "fun1....<br/>";
    }
    
    public function fun2(){
        echo "fun2....<br/>";
    }
    
    public abstract function fun3();
    
    /**
     * 求和抽象方法
     * 
     */
    public abstract function add($a,$b);
}

//实现类，定义A类继承Demo类，去实现里面的所有方法。
class A extends Demo{
    public function fun3(){
        echo "fun3....<br/>";
    }
    public function add($a,$b){
        return $a+$b;
    }
}

$a= new A();
$a->fun1();
$a->fun2();
$a->fun3();
echo $a->add(10,20);

---------------------------------------------------------------

//接口：
//定义一个Demo接口，内部只有抽象方法和常量定义
interface Demo{
    const PI=3.14; //定义常量属性
    public function fun1(); //定义抽象方法，而且抽象方法关键字abstract不用写
    
    public function fun2();
    
    public function fun3();
}

//定义一个类A去实现接口Demo
abstract class A implements Demo{
    public function fun1(){
        echo "fun1....<br/>";
    }
    
    public function fun2(){
        echo "fun2....<br/>";
    }
}

class B extends A{
    public function fun3(){
        echo "fun3....<br/>";
    }
}

//此时B类就可以实现了
$b = new B();
$b->fun1();
$b->fun2();
$b->fun3();

------------------------------------------------------------------

//1. 通过接口实现多态的应用

//主板：
//定义主板上PCI接口规范
interface PCI{
    public function start();
    public function stop();
}

//主板类
class MainBoard{
    //此处为多态的应用，方法要求传入一个PCI但是实际传入的是声卡或网卡等设备对象，导致执行效果的不同，即为多态效果。
    public function running(PCI $pci){
        $pci->start();
        $pci->stop();
    }
}

//声卡
class SoundCard implements PCI{
    public function start(){
        echo "声卡启动...<br/>";
    }
    public function stop(){
        echo "声卡停止...<br/>";
    }
}

//网卡
class NetworkCard implements PCI{
    public function start(){
        echo "网卡启动...<br/>";
    }
    public function stop(){
        echo "网卡停止...<br/>";
    }
}

//系统
$mb = new MainBoard();
$sc = new SoundCard();
$nc = new NetworkCard();

$mb->running($sc);
$mb->running($nc);

----------------------------------------------------------------

//1. 通过抽象类实现多态的应用

//主板：
//定义主板上抽象PCI类规范
abstract class PCI{
    public abstract function start();
    public abstract function stop();
}

//主板类
class MainBoard{
    //此处为多态的应用，方法要求传入一个PCI但是实际传入的是声卡或网卡等设备对象，导致执行效果的不同，即为多态效果。
    public function running(PCI $pci){
        $pci->start();
        $pci->stop();
    }
}

//声卡
class SoundCard extends PCI{
    public function start(){
        echo "声卡启动...<br/>";
    }
    public function stop(){
        echo "声卡停止...<br/>";
    }
}

//网卡
class NetworkCard extends PCI{
    public function start(){
        echo "网卡启动...<br/>";
    }
    public function stop(){
        echo "网卡停止...<br/>";
    }
}

//系统
$mb = new MainBoard();
$sc = new SoundCard();
$nc = new NetworkCard();

$mb->running($sc);
$mb->running($nc);

----------------------------------------------------------------

//1. 通过普通类实现多态的应用（不推荐）

//主板：
//定义主板上PCI类规范（此规范对子类没有约束能力）
class PCI{
    public function start(){
    
    }
    public function stop(){
    
    }
}

//主板类
class MainBoard{
    //此处为多态的应用，方法要求传入一个PCI但是实际传入的是声卡或网卡等设备对象，导致执行效果的不同，即为多态效果。
    public function running(PCI $pci){
        $pci->start();
        $pci->stop();
    }
}

//声卡
class SoundCard extends PCI{
    public function start(){
        echo "声卡启动...<br/>";
    }
    //此处没有按照父类的方法重写，导致声卡无法停止。
    public function stop2(){
        echo "声卡停止...<br/>";
    }
}

//网卡
class NetworkCard extends PCI{
    public function start(){
        echo "网卡启动...<br/>";
    }
    public function stop(){
        echo "网卡停止...<br/>";
    }
}

//系统
$mb = new MainBoard();
$sc = new SoundCard();
$nc = new NetworkCard();

$mb->running($sc);
$mb->running($nc);

===============================================================	
				
十三、异常处理：
--------------------------------------------------------------------------------
	在php5中有一种新的错误处理机制--异常处理：（采用面向对象方式的）
	涉及的类：Exception异常类
	结构：
		<?php
			class Exception
			{
				protected $message = 'Unknown exception';   // 异常信息
				protected $code = 0;                        // 用户自定义异常代码
				protected $file;                            // 发生异常的文件名
				protected $line;                            // 发生异常的代码行号

				function __construct($message = null, $code = 0);

				final function getMessage();                // 返回异常信息
				final function getCode();                   // 返回异常代码
				final function getFile();                   // 返回发生异常的文件名
				final function getLine();                   // 返回发生异常的代码行号
				final function getTrace();                  // backtrace() 数组
				final function getTraceAsString();          // 已格成化成字符串的 getTrace() 信息

				/* 可重载的方法 */
				function __toString();                       // 可输出的字符串
			}
		?> 
	
	
	使用：
		1. throw new Exception("年龄不可以为负数"); //异常抛出
		2. try{
				//捕获异常
				$s->age=30;
				$s->age=-40;
		3.	}catch(Exception $e){
				//异常处理
				echo $e->getmessage();
			}

--------------------------------------------------------------------

============================
	Classes/Object 函数 
============================
  参考手册中--与对象和类有关的扩展函数
1. class_alias — 为类创建一个别名
------------------------------------------------
	格式：bool class_alias ([ string $original [, string $alias ]] )
	示例：
		class foo { }
		class_alias('foo', 'bar');

		$a = new foo;
		$b = new bar;
		// the objects are the same
		var_dump($a == $b, $a === $b);  //bool(true)
		var_dump($a instanceof $b);		//bool(false)

		// the classes are the same
		var_dump($a instanceof foo);	//bool(true)
		var_dump($a instanceof bar);	//bool(true)

		var_dump($b instanceof foo);	//bool(true)
		var_dump($b instanceof bar);	//bool(true)

*2. class_exists — 检查类是否已定义
-----------------------------------------------------------
	格式： bool class_exists ( string $class_name [, bool $autoload ] )
		--如果由 class_name 所指的类已经定义，此函数返回 TRUE，否则返回 FALSE。
		
		默认将会尝试调用 __autoload，如果不想让 class_exists() 调用 __autoload，
		可以将 autoload 参数设为 FALSE。

3. get_called_class — the "Late Static Binding" class name
---------------------------------------------------------------------
	(PHP 5 >= 5.3.0)  获取调用者的类名

*4. get_class_methods — 返回由类的方法名组成的数组
----------------------------------------------------------------------
	格式：array get_class_methods ( mixed $class_name )
		返回由 class_name 指定的类中定义的方法名所组成的数组。如果出错，则返回 NULL。 
		
		从 PHP 4.0.6 开始，可以指定对象本身来代替 class_name

5. get_class_vars — 返回由类的默认公有属性组成的数组
-----------------------------------------------------------------------
	格式： array get_class_vars ( string $class_name )
		返回由类的默认公有属性组成的关联数组，此数组的元素以 varname => value 的形式存在。 

*6. get_class — 返回对象的类名
-----------------------------------------------------------------------
	格式： string get_class ([ object $obj ] )
		返回对象实例 obj 所属类的名字。如果 obj 不是一个对象则返回 FALSE。

7. get_declared_classes — 返回由已定义类的名字所组成的数组
--------------------------------------------------------------------------
	格式：array get_declared_classes ( void )
		返回由当前脚本中已定义类的名字组成的数组。 

8. get_declared_interfaces — 返回一个数组包含所有已声明的接口
--------------------------------------------------------------------------
	格式：array get_declared_interfaces ( void )
		本函数返回一个数组，其内容是当前脚本中所有已声明的接口的名字。 

9. get_object_vars — 返回由对象属性组成的关联数组
------------------------------------------------------------------
	格式：array get_object_vars ( object $obj )
		返回由 obj 指定的对象中定义的属性组成的关联数组。 

10. get_parent_class — 返回对象或类的父类名
------------------------------------------------------------------
	格式：string get_parent_class ([ mixed $obj ] )
		如果 obj 是对象，则返回对象实例 obj 所属类的父类名。

11. interface_exists — 检查接口是否已被定义
------------------------------------------------------------------
	格式：bool interface_exists ( string $interface_name [, bool $autoload ] )
		本函数在由 interface_name 给出的接口已定义时返回 TRUE，否则返回 FALSE。

*12. is_a — 如果对象属于该类或该类是此对象的父类则返回 TRUE
	我们可以使用运算符： instanceof代替上面的is_a操作
------------------------------------------------------------------
	格式：bool is_a ( object $object , string $class_name )
		如果对象是该类或该类是此对象的父类则返回 TRUE，否则返回 FALSE。 
		
13. is_subclass_of — 如果此对象是该类的子类，则返回 TRUE
------------------------------------------------------------------
	格式：bool is_subclass_of ( object $object , string $class_name )
		如果对象 object 所属类是类 class_name 的子类，则返回 TRUE，否则返回 FALSE。 

*14. method_exists — 检查类的方法是否存在
--------------------------------------------------------------------
	格式：bool method_exists ( object $object , string $method_name )
		如果 method_name 所指的方法在 object 所指的对象类中已定义，则返回 TRUE，否则返回 FALSE。

*15. property_exists — 检查对象或类是否具有该属性
--------------------------------------------------------------------
	格式：bool property_exists ( mixed $class , string $property )
		本函数检查给出的 property 是否存在于指定的类中（以及是否能在当前范围内访问）。

--------------------------------------------------------------------

//异常处理
echo "start...<br/>";

try{ //捕获异常
    
    //创建一个PDO对象，获取pdo的mysql数据库连接
    //数据库连接失败会抛出一个PDOException异常，连接MySQL失败。
    $pdo = new PDO("mysql:host=localhost;dbname=lamp93","root","");
    var_dump($pdo);
    
}catch(PDOException $e){ //异常处理
    echo "数据库连接失败！原因：".$e->getMessage()."<br/>";
}

echo "end...<br/>";

-------------------------------------------------------------------

//自定异常处理

class Demo{
    private $name="wuming";
    private $age=20;
    public function  __construct($name,$age){
        $this->name = $name;
        $this->age  = $age;
    }
    
    public function __set($param,$value){
        //判断在年龄赋值时是否有错误
        if($param=="age" && $value<1){
            //自定义抛出异常
            throw new Exception("年龄赋值非法！");
        }
        $this->$param = $value;
    }
    
    public function __get($param){
        return $this->$param;
    }
    
    public function __toString(){
        return $this->name.":".$this->age;
    }
}


$d = new Demo("zhangsan",20);
echo $d;
//为年龄赋值有可能会出现异常，故做异常处理
try{
    $d->age=-10;
}catch(Exception $e){
    echo $e->getMessage();
}
echo $d;

//throw new Exception("出错了！...."，100);

----------------------------------------------------------

//和类与对象相关的函数：

class Stu{
    public $name="zhangsan";
    protected $sex="man";
    private $age=20;
    
    public function getAge(){
        return $this->age;
    }
    
    protected function getSex(){
        return $this->sex;
    }
    
    public function getName(){
        return $this->name;
    }
}


//1. class_alias — 为类创建一个别名

class_alias("Stu","Demo"); //为类Stu起来一个别名Demo
$s = new Demo();
var_dump($s);


//2. class_exists — 检查类是否已定义
//先判断stu类是否存在，然后再执行
if(class_exists("Stu")){
    $s2 = new Stu();
}

//4.get_class_methods — 返回由类的方法名组成的数组
//获取Stu类中的所有方法（公有）
var_dump(get_class_methods("Stu"));
//array(1) { [0]=> string(6) "getAge" [1]=> string(7) "getName" } 


echo "<hr/>";

//5.get_class_vars — 返回由类的默认公有属性组成的数组
var_dump(get_class_vars("Stu"));
//array(1) { ["name"]=> string(8) "zhangsan" } 

echo "<hr/>";

//6. get_class — 返回对象的类名
echo "s2对象的类名：".get_class($s2);

echo "<hr/>";

//7. method_exists — 检查类的方法是否存在
//判读方法是否存在
if(method_exists($s2,"getAge")){
    echo $s2->getAge();
}

------------------------------------------------------------------

//method_exists — 检查类的方法是否存在


class A{
    public function fun(){
        echo "aaaaaaaa<br/>";
        //判断这个方法是否存在，若存在则调用执行
        if(method_exists($this,"myfun")){
            $this->myfun();
        }
    }
}

$a = new A();
$a->fun();

$b = new B();
$b->fun();

class B extends A{
    public function myfun(){
        echo "bbbbbbbb<br/>";
    }
}

==================================================================

PHP操作MySQL数据库方式有三种：
	*1. mysql 最原始的、纯过程化的 如连接： mysql_connect(主机名，账号，密码);
	   mysql_query();
       
	2. mysqli 改进版的、兼容过程化和面向对象化操作
		如：连接： mysqli_connect(主机名，账号，密码，库名) //过程化
				   new mysqli(主机名，账号，密码，库名)		//面向对象
				   
	*3. PDO 通用的，兼容其他数据库 ， 纯面向对象方式
		如： 连接： new PDO(DSN,账号，密码);
		
		选择PDO的原因：跨数据库，带预处理（防sql注入）、支持事务操作
        
        
=============================================================================
	PDO--PHP Data Objects
=============================================================================

	PDO的环境配置：开启支持PDO
		在php.ini配置文件中开启：
				extension=php_pdo.dll
				extension=php_pdo_mysql.dll
				
	在PDO操作中涉及到类：PDO、PDOStatement(预处理对象)、PDOException（异常类）

一、 PDO类的构造方法：
---------------------------------------------------------
  PDO __construct( string dsn 
		[, string username 
		[, string password 
		[, array driver_options]]] );
		
 其中:dsn数据库连接信息如“mysql:host=localhost;dbname=库名”
	  dsn的格式：”驱动名:host=主机名;dbname=库名“
      username：用户名
      password:密码
      driver_options：配置选项：
      如： PDO::ATTR_PERSISTENT=>true,是否开启持久链接
	   *PDO::ATTR_ERRMODE=>错误处理模式：(可以是以下三个)(3)
		PDO::ERRMODE_SILENT:不报错误（忽略）(0)
		PDO::ERRMODE_WARNING:以警告的方式报错(1)
		*PDO::ERRMODE_EXCEPTION：以异常的方式报错(推荐使用)。(2)

$pdo =  new PDO("mysql:host=localhost;dbname=lamp36db","root","root");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
其他方法：
--------------------------------------------------------
1. query($sql); 用于执行查询SQL语句。返回PDOStatement对象
2. exec($sql);  用于执行增、删、改操作，返回影响行数；
3. getAttribute(); 获取一个"数据库连接对象"属性。
4. setAttribute(); 设置一个"数据库连接对象"属性。
5. beginTransaction 开启一个事物（做一个回滚点）
6. commit	提交事务
7. rollBack	事务回滚操作。 
8. errorCode	获取错误码   
9. errorInfo	获取错误信息   
10.lastInsertId  获取刚刚添加的主键值。
11.prepare	创建SQL的预处理，返回PDOStatement对象
12.quote	为sql字串添加单引号。


预处理对象PDOStatement对象：
=============================================
我们可以通过PDO的方法来获取PDOStatement：
 1.PDO的query（查询sql）方法获取，用于解析结果集
 2.PDO的prepare(SQL)方法获取，用于处理参数式sql并执行操作。

PDOstatement对象的方法：
----------------------------------------------------------------
1、fetch() 返回结果集的下一行，结果指针下移，到头返回false 。
  	参数： 	PDO::FETCH_BOTH (default)、：索引加关联数组模式
	       	PDO::FETCH_ASSOC、	   ：关联数组模式
 	       	PDO::FETCH_NUM、		   ：索引数组模式
			PDO::FETCH_OBJ、		   ：对象模式
			PDO::FETCH_LAZY		   ：所有模式（SQL语句和对象）
			
2、fetchAll() 通过一次调用返回所有结果，结果是以数组形式保存
      	参数：PDO::FETCH_BOTH (default)、
		PDO::FETCH_ASSOC、
		PDO::FETCH_NUM、
		PDO::FETCH_OBJ、
		PDO::FETCH_COLUMN表示取指定某一列，
		如：$rslist = $stmt->fetchAll(PDO::FETCH_COLUMN,2);取第三列
3、execute() 	负责执行一个准备好了的预处理语句 
4. fetchColumn()返回结果集中下一行某个列的值
5. setFetchMode()设置需要结果集合的类型
6. rowCount()  	返回使用增、删、改、查操作语句后受影响的行总数
7. setAttribute()为一个预处理语句设置属性
8. getAttribute()获取一个声明的属性
9. errorCode() 	获取错误码
10. errorInfo() 获取错误信息
11. bindParam() 将参数绑定到相应的查询占位符上
    bool PDOStatement::bindParam ( mixed $parameter , mixed &$variable [, int $data_type [, int $length [, mixed $driver_options ]]] ) 其中： $parameter：占位符名或索引偏移量 &$variable:参数的值，需要按引用传递也就是必须放一个变量
    其中参数:$data_type:数据类型PDO::PARAM_BOOL/PDO::PARAM_NULL/PDO::PARAM_INT/PDO::PARAM_STR/
  	 				  PDO::PARAM_LOB/PDO::PARAM_STMT/PDO::PARAM_INPUT_OUTPUT
         $length：指数据类型的长度 $driver_options：驱动选项。
12. bindColumn() 用来匹配列名和一个指定的变量名，这样每次获取各行记录时，会自动将相应的值赋给变量。
13. bindValue() 将一值绑定到对应的一个参数中
14. nextRowset() 检查下一行集
15. columnCount() 在结果集中返回列的数目
16. getColumnMeta() 在结果集中返回某一列的属性信息
17. closeCursor() 关闭游标，使该声明再次执行


在PDO中参数式的SQL语句有两种(预处理sql)：
   1.insert into stu(id,name) value(?,?);	//？号式（适合参数少的）		
   2.insert into stu(id,name) value(:id,:name);		// 别名式(适合参数多的)
在PDO中为参数式SQL语句赋值有三种：
   1.使用数组 
	 $stmt->execute(array("lamp1404","qq2"));
 	 $stmt->execute(array("id"=>"lamp1404","name"=>"qq2"));	
   2.使用方法单个赋值
	 $stmt->bindValue(1,"lamp1901");	
	 $stmt->bindValue(2,"qq2");
	 $stmt->execute();

	 $stmt->bindValue(":id","lamp1901",PDO::PARAM_STR);	 //带指定类型
	 $stmt->bindValue(":name","qq2",PDO::PARAM_STR);
	 $stmt->execute();
	 
   3. 使用方法绑定变量
	 $stmt->bindParam(":id",$id);		
	 $stmt->bindParam(":name",$name);
	 $id="lamp1401";
	 $name="qq2";
     $stmt->execute();
	 
事务处理
-----------------------------------------------	
	事务：将多条sql操作（增删改）作为一个操作单元，要么都成功，要么都失败。-----
	
4.  PDO对事务的支持
		第一：被操作的表必须是innoDB类型的表（支持事务）
			MySQL常用的表类型：MyISAM(非事务)增删改速度快、InnodB（事务型）安全性高
			//更改表的类型为innoDB类型
			mysql> alter table stu engine=innodb;
				Query OK, 29 rows affected (0.34 sec)
				Records: 29  Duplicates: 0  Warnings: 0
			//查看表结构
			mysql> show create table stu\G;   
			   
		第二：使用PDO就可以操作数据库了
				使用到了PDO中的方法：
					beginTransaction 开启一个事物（做一个回滚点）
					commit		提交事务
					rollBack	事务回滚操作。 
		
		使用情况：当做多条sql语句处理时(增删改)，要求是都必须成功。
		
--------------------------------------------------------------

//使用PDO操作数据库：

//导入配置文件
require("config.php");

try{
    //创建PDO对象，实现数据库的连接
    $pdo = new PDO(DSN,USER,PASS);
    //设置pdo属性信息(PDO的报错模式)
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("数据库连接失败！原因：".$e->getMessage());
}

//var_dump($pdo);

//发送sql语句，获取5条数据
$stmt = $pdo->query("select * from stu limit 5");


//获取所有信息（以关联式数组）
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($list);

------------------------------------------------------------------

//使用PDO对象操作数据库的方法：

//导入配置文件
require("config.php");

try{
    //创建PDO对象，实现数据库的连接
    $pdo = new PDO(DSN,USER,PASS);
    //设置pdo属性信息(PDO的报错模式)
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("数据库连接失败！原因：".$e->getMessage());
}

//执行单条数据信息查询
$stmt = $pdo->query("select * from stu where id=1");
$ob = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($ob);

//执行一条数据删除
echo "删除一条数据".$pdo->exec("delete from stu where id =4");



//数值错误模式为关闭输出
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);

$pdo->exec("update stu2 set age=30 where id=6");
//通过PDO的错误号来判断sql语句执行是否有错误，并输出信息
if($pdo->errorCode()>0){
   //print_r($pdo->errorinfo());
   echo "刚刚执行的sql有错误！原因：".$pdo->errorinfo()[2];
}

-----------------------------------------------------------------

//PDO的预处理：1. ?问号式的参数sql语句，使用绑定值的方法做预处理。

//1.导入配置文件
require("config.php");

//2. 获取数据连接
try{
    //创建PDO对象，实现数据库的连接
    $pdo = new PDO(DSN,USER,PASS);
    //设置pdo属性信息(PDO的报错模式)
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("数据库连接失败！原因：".$e->getMessage());
}

//定义sql语句并进行预处理
$sql = "insert into stu values(null,?,?,?,?)";
$stmt = $pdo->prepare($sql); //预处理sql语句并返回PDOStatment预处理对象

//为sql语句中的参数绑定值
$stmt->bindValue(1,'mm01');  //绑定第一个问号的值
$stmt->bindValue(2,22);
$stmt->bindValue(3,'m');
$stmt->bindValue(4,'lamp93');

//执行
$stmt->execute(); //执行

echo "成功添加：".$stmt->rowCount();

---------------------------------------------------------------

//PDO的预处理：2. ?问号式的参数sql语句，使用绑定变量的方法做预处理。

//1.导入配置文件
require("config.php");

//2. 获取数据连接
try{
    //创建PDO对象，实现数据库的连接
    $pdo = new PDO(DSN,USER,PASS);
    //设置pdo属性信息(PDO的报错模式)
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("数据库连接失败！原因：".$e->getMessage());
}

//定义sql语句并进行预处理
$sql = "insert into stu values(null,?,?,?,?)";
$stmt = $pdo->prepare($sql); //预处理sql语句并返回PDOStatment预处理对象

//为sql语句中的参数绑定变量
$stmt->bindParam(1,$name); //绑定第一个问好的值
$stmt->bindParam(2,$age);
$stmt->bindParam(3,$sex);
$stmt->bindParam(4,$classid);

//为变量赋值
$name="mm02";
$age=21;
$sex="m";
$classid="lamp93";
//执行
$stmt->execute(); //执行

echo "成功添加：".$stmt->rowCount();

-----------------------------------------------------------------

//PDO的预处理：3. ?问号式的参数sql语句，使用索引数组来绑定值的预处理。

//1.导入配置文件
require("config.php");

//2. 获取数据连接
try{
    //创建PDO对象，实现数据库的连接
    $pdo = new PDO(DSN,USER,PASS);
    //设置pdo属性信息(PDO的报错模式)
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("数据库连接失败！原因：".$e->getMessage());
}

//定义sql语句并进行预处理
$sql = "insert into stu values(null,?,?,?,?)";
$stmt = $pdo->prepare($sql); //预处理sql语句并返回PDOStatment预处理对象

$data = array("mm03",23,'w','lamp94');
//执行（绑定值必须为索引式数组）
$stmt->execute($data); //在执行时，绑定值，并执行

echo "成功添加：".$stmt->rowCount();

-------------------------------------------------------------------

//PDO的预处理：4. 别名式的参数sql语句，使用绑定值的方法做预处理。

//1.导入配置文件
require("config.php");

//2. 获取数据连接
try{
    //创建PDO对象，实现数据库的连接
    $pdo = new PDO(DSN,USER,PASS);
    //设置pdo属性信息(PDO的报错模式)
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("数据库连接失败！原因：".$e->getMessage());
}

//定义sql语句并进行预处理
$sql = "insert into stu values(null,:n,:a,:s,:c)";
$stmt = $pdo->prepare($sql); //预处理sql语句并返回PDOStatment预处理对象

//为sql语句中的参数绑定值
$stmt->bindValue("n",'mm04'); //绑定第一个问好的值
$stmt->bindValue("a",22);
$stmt->bindValue("s",'m');
$stmt->bindValue("c",'lamp93');

//执行
$stmt->execute(); //执行

echo "成功添加：".$stmt->rowCount();

---------------------------------------------------------------

//PDO的预处理：5. 别名式的参数sql语句，使用绑定参数变量的方法做预处理。

//1.导入配置文件
require("config.php");

//2. 获取数据连接
try{
    //创建PDO对象，实现数据库的连接
    $pdo = new PDO(DSN,USER,PASS);
    //设置pdo属性信息(PDO的报错模式)
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("数据库连接失败！原因：".$e->getMessage());
}

//定义sql语句并进行预处理
$sql = "insert into stu values(null,:n,:a,:s,:c)";
$stmt = $pdo->prepare($sql); //预处理sql语句并返回PDOStatment预处理对象

//为sql语句中的参数绑定变量
$stmt->bindParam("n",$name); //绑定第一个问好的值
$stmt->bindParam("a",$age);
$stmt->bindParam("s",$sex);
$stmt->bindParam("c",$classid);

//为变量赋值
$name="mm05";
$age=26;
$sex="w";
$classid="lamp93";

//执行
$stmt->execute(); //执行

echo "成功添加：".$stmt->rowCount();

-----------------------------------------------------------------

//PDO的预处理：6. 别名式的参数sql语句，使用直接运行参数变量数组的方法做预处理。

//1.导入配置文件
require("config.php");

//2. 获取数据连接
try{
    //创建PDO对象，实现数据库的连接
    $pdo = new PDO(DSN,USER,PASS);
    //设置pdo属性信息(PDO的报错模式)
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("数据库连接失败！原因：".$e->getMessage());
}

//定义sql语句并进行预处理
$sql = "insert into stu values(null,:n,:a,:s,:c)";
$stmt = $pdo->prepare($sql); //预处理sql语句并返回PDOStatment预处理对象

$data=array("n"=>"mm06","a"=>26,"s"=>"w","c"=>"lamp94");
//执行
$stmt->execute($data); //执行

echo "成功添加：".$stmt->rowCount();

================================================================

==============================================
     php中的命名空间namespace
==============================================

一、命名空间概述：
    什么是命名空间？从广义上来说，命名空间是一种封装事物的方法。在很多地方都可以见到这种抽象概念。
    例如，在操作系统中目录用来将相关文件分组，对于目录中的文件来说，它就扮演了命名空间的角色。
    具体举个例子，如文件foo.txt 可以同时在目录/home/greg 和 /home/other 中存在，但在同一个目录中不能存在两个 foo.txt 文件。
    另外，在目录 /home/greg 外访问 foo.txt 文件时，我们必须将目录名以及目录分隔符放在文件名之前得到 /home/greg/foo.txt。
    这个原理应用到程序设计领域就是命名空间的概念。 
    
    
二、定义命名空间：
    1. 虽然任意合法的PHP代码都可以包含在命名空间中，但只有三种类型的代码受命名空间的影响，它们是：类，函数和常量。 
    2. 命名空间通过关键字namespace 来声明。如果一个文件中包含命名空间，它必须在其它所有代码之前声明命名空间。
    实例：
        <?php
            namespace MyProject;

            const CONNECT_OK = 1;
            class Connection { /* ... */ }
            function connect() { /* ... */  }

        ?>
      
     （了解）在声明命名空间之前唯一合法的代码是用于定义源文件编码方式的 declare 语句。declare(encoding='ISO-8859-1');

三、定义子命名空间：
    1. 与目录和文件的关系很象，PHP 命名空间也允许指定层次化的命名空间的名称。因此，命名空间的名字可以使用分层次的方式定义： 
    
        <?php
            namespace MyProject\Sub\Level;

            const CONNECT_OK = 1;
            class Connection { /* ... */ }
            function connect() { /* ... */  }
        ?>
        
四、在同一个文件中定义多个命名空间（不推荐）：
    1. 也可以在同一个文件中定义多个命名空间。在同一个文件中定义多个命名空间有两种语法形式。     
        <?php
        namespace MyProject;

        const CONNECT_OK = 1;
        class Connection { /* ... */ }
        function connect() { /* ... */  }

        namespace AnotherProject;

        const CONNECT_OK = 1;
        class Connection { /* ... */ }
        function connect() { /* ... */  }
        ?>

     2. 不建议使用上面实例1的这种语法在单个文件中定义多个命名空间。建议使用下面的大括号形式的语法。
        在实际的编程实践中，非常不提倡在同一个文件中定义多个命名空间。这种方式的主要用于将多个 PHP 脚本合并在同一个文件中。
            <?php
            namespace MyProject {

            const CONNECT_OK = 1;
            class Connection { /* ... */ }
            function connect() { /* ... */  }
            }

            namespace AnotherProject {

            const CONNECT_OK = 1;
            class Connection { /* ... */ }
            function connect() { /* ... */  }
            }
            
            //不包含在命名空间中的代码
            namespace { // 全局代码
            session_start();
            $a = MyProject\connect();
            echo MyProject\Connection::start();
            }
            ?>
			
----------------------------------------------------------------

/使用PDO数据库操作

//1. 导入配置文件
require("config.php");

//2.实例化PDO对象，获取一个面向对象数据库操作对象
try{
    $pdo = new PDO(DSN,USER,PASS);
    //设置pdo的执行错误模式为异常模式
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("PDO对象创建失败！原因：".$e->getMessage());
}


try{
    //采用预处理执行sql查询
    //3. 预处理sql语句
    $sql = "select * from stu where id>?";
    $stmt = $pdo->prepare($sql); //返回PDOStatment；

    //为sql中的参数绑定值
    $stmt->bindValue(1,10);

    //4. 执行操作
    $stmt->execute();

    //5. 解析结果
    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //
    echo "共计获取数据：".$stmt->rowCount();
    echo "<pre>";
    print_r($list);

}catch(PDOException $e){
    echo "执行sql错误！原因：".$e->getMessage();
}

------------------------------------------------------------

//命名空间的定义和使用
namespace my; //定义空间my

//在my空间中定义strlen函数。
function strlen($s){
    return $s;
}

//默认使用当前空间下的函数strlen
echo strlen("aaaa");

//使用my空间中的strlen函数
echo \my\strlen("bbbb");

//使用外空间的系统函数
echo \strlen("aaaa");

------------------------------------------------------------

//多个空间
//定义一个空间one
namespace one;

const NAME="空间ONE";

function fun(){
    echo "空间one<br/>";
}

//定义第二个空间
namespace two;

const NAME="空间TWO";

function fun(){
    echo "空间Two<br/>";
}


//使用测试
echo NAME; //默认下面的空间值
echo \one\NAME; //输出one空间值
echo \two\NAME; //输出two空间值

echo "<hr/>";

fun();
\one\fun();
\two\fun();

-------------------------------------------------------

//使用带有空间的类

use \org\xdl\shop\Stu; //使用空间中的stu类

//导入类文件
require("stu.class.php");（//定义空间
namespace org\xdl\shop;

class Stu{
    private $name;
    private $age;
    public function __construct($name,$age){
        $this->name = $name;
        $this->age = $age;
    }
    
    public function __toString(){
        return $this->name.":".$this->age;
    }
});

//使用绝对位置的方式使用
//$s = new \org\xdl\shop\Stu("lisi",20);

//在导入和指定使用空间类的方式
$s = new Stu("zhangsan",20);
echo $s;

-------------------------------------------------------

//定义一个空间one
namespace one\two\three;

function fun(){
    echo "空间one\two\three<br/>";
}

//定义第二个空间
namespace one\two;

function fun(){
    echo "空间one\two<br/>";
}


fun(); //当前空间下的函数： 相对函数（非限定名称）

three\fun(); //使用当前空间下的three空间中的内容：相对路径函数（限定名称）

\one\two\three\fun(); //使用绝对位置：绝对路径函数（完全限定名称）

--------------------------------------------------------

//魔术常量
/*
__LINE__ 文件中的当前行号。  
__FILE__ 文件的完整路径和文件名。如果用在被包含文件中，则返回被包含的文件名。自 PHP 4.0.2 起，__FILE__ 总是包含一个绝对路径（如果是符号连接，则是解析后的绝对路径），而在此之前的版本有时会包含一个相对路径。  
__DIR__ 文件所在的目录。如果用在被包括文件中，则返回被包括的文件所在的目录。它等价于 dirname(__FILE__)。除非是根目录，否则目录中名不包括末尾的斜杠。（PHP 5.3.0中新增） =  
__FUNCTION__ 函数名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该函数被定义时的名字（区分大小写）。在 PHP 4 中该值总是小写字母的。  
__CLASS__ 类的名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该类被定义时的名字（区分大小写）。在 PHP 4 中该值总是小写字母的。  
__METHOD__ 类的方法名（PHP 5.0.0 新加）。返回该方法被定义时的名字（区分大小写）。  
__NAMESPACE__ 当前命名空间的名称（大小写敏感）。这个常量是在编译时定义的（PHP 5.3.0 新增） 
*/

namespace org\xdl\demo;

class A{
    public function fun(){
        echo "当前所在的类名：".__CLASS__."<br/>";
        echo "当前所在的方法名：".__METHOD__."<br/>";
        echo "当前所在的文件名：".__FILE__."<br/>";
        echo "当前所在的文件行号：".__LINE__."<br/>";
        echo "当前所在的目录名：".__DIR__."<br/>";
        echo "当前所在的空间名：".__NAMESPACE__."<br/>";
    }
}

$a = new A();
$a->fun();



namespace my;

//使用空间中的A类
use \org\xdl\demo\A as B; //起别名
$b = new B();
$b->fun();

=====================================================================


		
				
				
				