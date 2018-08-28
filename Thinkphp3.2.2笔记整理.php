//项目配置，来自demo1\ThinkPHP\Conf\convention.php
<?php
return array(
	//'配置项'=>'配置值'
	
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql', // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'lamp93_mist',    // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
	
	// 显示页面Trace信息
	'SHOW_PAGE_TRACE' =>true, 
);
?>


--------------------------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>学生信息管理</title>
	</head>
	<body>
		<center>
			<include file="Stu/menu"/>
			
			<h3>浏览学生信息</h3>
			<table width="700" border="1">
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>年龄</th>
					<th>性别</th>
					<th>班级</th>
					<th>操作</th>
				</tr>
				<foreach name="list" item="vo">
					<tr>
						<td>{$vo.id}</td>
						<td>{$vo.name}</td>
						<td>{$vo.age}</td>
						<td>{$vo.sex}</td>
						<td>{$vo.classid}</td>
						<td>
							<a href="__MODULE__/Stu/del/id/{$vo.id}">删除</a> 
							<a href="__MODULE__/Stu/edit/id/{$vo.id}">编辑</a>
						</td>
					</tr>
				</foreach>
			</table>
		</center>
	</body>
</html>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>学生信息管理</title>
    </head>
    <body>
        <center>
            <include file="Stu/menu"/>
            
            <h3>添加信息</h3>
            <form action="__MODULE__/Stu/insert" method="post">
            <table width="280" border="0">
                <tr>
                    <td align="right">姓名：</td>
                    <td><input type="text" name="name"/></td>
                </tr>
                <tr>
                    <td align="right">年龄：</td>
                    <td><input type="text" name="age"/></td>
                </tr>
                <tr>
                    <td align="right">性别：</td>
                    <td><input type="radio" name="sex" value="m"/>男
                        <input type="radio" name="sex" value="w"/>女</td>
                </tr>
                <tr>
                    <td align="right">班级：</td>
                    <td><input type="text" name="classid"/></td>
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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>学生信息管理</title>
    </head>
    <body>
        <center>
            <include file="Stu/menu"/>
            
            <h3>编辑学生信息</h3>
            <form action="__MODULE__/Stu/update" method="post">
			<input type="hidden" name="id" value="{$vo.id}"/>
            <table width="280" border="0">
                <tr>
                    <td align="right">姓名：</td>
                    <td><input type="text" name="name" value="{$vo.name}"/></td>
                </tr>
                <tr>
                    <td align="right">年龄：</td>
                    <td><input type="text" name="age" value="{$vo.age}"/></td>
                </tr>
                <tr>
                    <td align="right">性别：</td>
                    <td><input type="radio" name="sex" value="m" <if condition="$vo.sex eq 'm'">checked</if> />男
                        <input type="radio" name="sex" value="w" <if condition="$vo.sex eq 'w'">checked</if>/>女</td>
                </tr>
                <tr>
                    <td align="right">班级：</td>
                    <td><input type="text" name="classid"  value="{$vo.classid}"/></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" value="修改"/>
                        <input type="reset" value="重置"/>
                    </td>
                </tr>
            </table>
            </form>
        </center>
    </body>
</html>

//学生信息控制器，来自demo1\Myweb\Home\Controller\StuController.class.php
<?php
//学生信息控制类
namespace Home\Controller;
use Think\Controller;
//use Think\Model;
class StuController extends Controller {
    //浏览学生信息  
	public function index(){
       $mod = new \Think\Model("Stu"); //实例化Model类
	   $list = $mod->select(); //获取所有信息
	   $this->assign("list",$list); //放置到模板中
	   $this->display("index"); //加载模板输出
    }
	
	//添加学生信息表单
	public function add(){
		$this->display("add");
	}
	
	//执行添加学生信息
	public function insert(){
		$mod = new \Think\Model("Stu"); //实例化Model类
		//初始化添加信息(就是从post中获取信息并添加到$mod对象中)
		$mod->create();
		//执行添加,并判断
		if($mod->add()){
			$this->success('添加成功', U('Stu/index'));
		}else{
			$this->error("添加失败！");
		}
	}
	
	//执行学生信息的删除
	public function del(){
		$mod = new \Think\Model("Stu"); //实例化Model类
		//执行执行,并判断
		if($mod->delete($_GET['id'])){
			$this->success('删除成功', U('Stu/index'));
		}else{
			$this->error("删除失败！");
		}
	}
	
	//加载学生信息编辑表单
	public function edit(){
		$mod = new \Think\Model("Stu"); //实例化Model类
		//获取要修改的信息
		$stu = $mod->find($_GET['id']);
		//将要修改的信息放置到模板中
		$this->assign("vo",$stu);
		//加载编辑模板输出修改信息
		$this->display("edit");
	}
	
	//执行学生信息修改
	public function update(){
		$mod = new \Think\Model("Stu"); //实例化Model类
		//初始化编辑信息(就是从post中获取信息并添加到$mod对象中)
		$mod->create();
		//执行修改,并判断
		if($mod->save()){
			$this->success('修改成功', U('Stu/index'));
		}else{
			$this->error("修改失败！");
		}
	}
	
}
?>

---------------------------------------------------------------------------------------
//Demo信息控制器，来自demo1\web\Home\Controller\DemoController.class.php
<?php
namespace Home\Controller; //定义空间
use Think\Controller; //使用空间中的类

class DemoController extends Controller{
	
	public function index(){
		echo "<h2>欢迎使用自定义控制类Demo</h2>";
	}
	
	//前置
	public function _before_add(){
		echo "调用add方法前.....<br/>";
	}
	
	public function add(){
		echo "调用add方法中.....<br/>";
	}
	
	//后置
	public function _after_add(){
		echo "调用add方法后.....<br/>";
	}
	
	//参数绑定
	public function del($id=0){
		echo "删除数据id号为{$id}的值！";
	}
	
	//负责Ajax的数据响应
	public function select(){
		$mod = new \Think\Model("Stu");
		$this->ajaxReturn($mod->select(),"json");
		//$this->ajaxReturn($mod->select(),"xml");
	}
	
	//控制器中的跳转
	public function demo2(){
		$this->success("成功跳！",U("Index/index"),8);
		
		//重定向：
		//$this->redirect('Demo/add');
	}
	
	//当加载当前控制器中不存在的方法时，自动调用不存在！
	public function _empty(){
		echo "你调用的".CONTROLLER_NAME."控制器中的".ACTION_NAME."方法不存在！";
	}
}
?>

--------------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>文件上传实例</title>
	</head>
	<body>
		<h2>单文件上传实例</h2>
		<form action="__URL__/upload" enctype="multipart/form-data" method="post">
			<input type="file" name="mypic" />
			<input type="submit" value="提交" >
	    </form>
		
		<h2>多文件上传实例:HTML5</h2>
		<form action="__URL__/upload" enctype="multipart/form-data" method="post">
			<input type="file" multiple name="mypic[]" />
			<input type="submit" value="提交" >
	    </form>
	</body>
</html>

//图片上传信息控制器，来自demo1\web\Home\Controller\PicController.class.php
<?php
//图片上传控制器实例
namespace Home\Controller;
use Think\Controller;
class PicController extends Controller {
    //加载上传表单页
	public function index(){
		$this->display("index");
	}
	
	//执行图片上传
	public function upload(){
		//实例化上传类
		$upload = new \Think\Upload();// 实例化上传类
		//初始化上传信息
		$upload->maxSize = 3145728;//设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Public/Uploads/'; // 设置附件上传目录
		
		//执行上传文件 
		$info = $upload->upload(); 
		
		//判断上传是否成功
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{
			// 上传成功 
			//$this->success('上传成功！');
			foreach($info as $file){
				//获取图片名及路径和地址信息
				$picurl = __ROOT__."/Public/Uploads/".$file['savepath'].$file['savename'];
			
				//输出
				echo "<img src='{$picurl}' width='200'/>";
			}
		}
	}
}
?>

----------------------------------------------------------------------------------------
//设置session和cookie
<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //在当前位置设置cookie和session信息
		//setCookie("name","zhangsan",time()+3600,"/");
		cookie("name","zhangsan",3600);
		
		//$_SESSION['loginuser']="李四";
		session("loginuser","李四");
    }
}
?>

-----------------------------------------------------------------------------------------
//获取发送来的参数
<?php
//控制器中的实例
namespace Home\Controller;
use Think\Controller;
class DemoController extends Controller {
    public function index(){
       
    }
	
	//输入变量实例
	public function fun1(){
		echo "输出get中id 的值：".$_GET['id']."<br/>";
		echo "输出get中id 的值：".I("get.id")."<br/>";
		echo "输出cookie中name 的值：".$_COOKIE['name']."<br/>";
		echo "输出cookie中name 的值：".cookie('name')."<br/>";
		echo "输出cookie中name 的值：".I('cookie.name')."<br/>";
		echo "输出session中loginuser的值：".$_SESSION["loginuser"]."<br/>";
		echo "输出session中loginuser的值：".session('loginuser')."<br/>";
		echo "输出session中loginuser的值：".I('session.loginuser')."<br/>";
	}
	
	//Model的实例化和使用方法
	public function stu(){
		//实例化Model的方式：
		//1.通过new
		$mod = new \Think\Model("Stu");
		$stu = $mod->find(); //获取一条
		dump($stu); //格式化输出
		
		//2. 通过M()函数实例化
		$mod = M("Stu"); //就是等价于第一步new Model()
		$stu = $mod->find();
		dump($stu);
		
		//3. 通过D()函数实例化
		$mod = D("Stu"); //先尝试实例化自定义的Model如StuModel，若没有则会等于M()
		$stu = $mod->find();
		$mod->dd(); //调用自定义model类中的方法。
		dump($stu);
	}
	
	//自定义Model类
	public function stu2(){
		//实例化自定义StuModel类
		//$mod = new \Home\Model\StuModel();
		$mod = D("Stu");
		
		dump($mod->select());
	}
	
	//model的连贯操作
	public function stu3(){
		$m = M("Stu");
		//获取所有学生信息
		$list = $m->select();
		
		//获取所有男生信息
		//$list = $m->where("sex='m'")->select();
		
		//获取年龄在20到30之间的学生信息，并按年龄排序降序
		//$list = $m->where("age>=20 and age<=30")->order("age desc")->select();
		
		//$map['age'] = array('between','20,30');
		//$list = $m->where($map)->order("age desc")->select();
		
		//查询年龄最小5位信息
		//$list = $m->order("age asc")->limit(5)->select();
		
		//查询id,name,age字段的学生信息
		//$list = $m->field("id,name,age")->select();
		
		dump($list);
		
		//添加数据
		//$data=array("name"=>"uu666",'age'=>28,'sex'=>"m",'classid'=>'lamp93');
		//执行添加
		//echo $m->data($data)->add();
		
		//执行修改(执行数据修改)
		//$data=array("age"=>20,"sex"=>"w","id"=>10);
		//$m->data($data)->save();
		
		//通过查询后修改
		//$m->find(6);
		//$m->name="uu120";
		//$m->save();
		
		
	}

}
?>

---------------------------------------------------------------------------------------
//来自EmptyController.class.php
<?php
//空控制器，默认调用一个不存在的控制器会自动调用当前控制器
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller {
    //空方法
	public function _empty(){
		die("你调用".CONTROLLER_NAME."控制器和方法不存在！");
	}
}
?>

-----------------------------------------------------------------------------------------
//来自UserController.class.php
<?php
//用户信息控制类
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
   //数据浏览
   public function index(){
		$this->assign("list",M("User")->select());
		$this->display("index");
   }
   //加载添加表单
   public function add(){
		$this->display("add");
   }
   
   //执行添加
   public function insert(){
		$mod = D("User");
		//$_POST['addtime']=time();
		if(!$mod->create()){
			$this->error($mod->getError());
		}
		//$mod->addtime=time();
		
		if($mod->add()){
			$this->success("添加成功",U("User/index"));
		}else{
			$this->error("添加失败！");
		}
   }
   
   //加载修改表单
   public function edit($id=0){
		$this->assign("vo",M("User")->find($id));
		$this->display("edit");
   }
   
   //执行修改
   public function update(){
		$mod = D("User");
		$mod->create();
		
		if($mod->save()){
			$this->success("修改成功",U("User/index"));
		}else{
			$this->error("修改失败！");
		}
   }
   
   //执行删除
    public function del($id=0){
		$mod = D("User");
		//执行删除
		if($mod->delete($id)){
			$this->success("删除成功",U("User/index"));
		}else{
			$this->error("删除失败！");
		}
   }
}
?>

-------------------------------------------------------------------------------------
//Web\Home\Model\StuModel.class.php
<?php
//自定义Stu信息表的Model类
namespace Home\Model;
use Think\Model;

class StuModel extends Model{
	//protected $tablePrefix=""; //设置表前缀
	//protected $tableName ="stu"; //当前表面
	protected $trueTableName="stu"; //含表前缀的表名
	protected $dbName="lamp93"; //指定当前数据库名
	
	//定义当前表中的字段
	protected $fields = array('id','name','age','sex','classid','_pk'=>'id');
	
	public function dd(){
		echo "hello stumodel!";
	}
}
?>

------------------------------------------------------------------------------------
//Web\Home\Model\UserModel.class.php
<?php
//自定义用户信息表的Model类
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	//自定验证
	protected $_validate = array(
		array('name','require','账号必须！'), 
		array('repass','pass','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
		array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一     
	);
	
	//自动完成
	protected $_auto = array ( 
		array('pass','md5',1,'function'), //为密码加密
		array('addtime','time',1,'function'),//添加时间
	);
	
}
?>

----------------------------------------------------------------------------------
//Web\Home\Controller\DemoController.class.php ,作用于数据库的各种查询
<?php
namespace Home\Controller;
use Think\Controller;
class DemoController extends Controller {
    public function index(){
		
	}
	
	//Model的连贯操作实例
	public function stu(){
		//链接学生和成绩表的信息查询
		//$list = M("Stu")->join("grade on stu.id=grade.sid")->field("stu.id,name,sex,php,mysql")->select();
		//dump($list);
		
		//统计每个班级人数。
		//$list = M("Stu")->field("classid,count(*) as num")->group("classid")->select();
		//dump($list);
		
		//查询Stu表中的班级信息(distinct(true)表示去除重复)
		//$list = M("Stu")->distinct(true)->field("classid")->select();
		//dump($list);
		
		//查询单条数据
		//$data = M("Stu")->where("id=5")->select();
		//dump($data[0]);
		//$data = M("Stu")->where("id=5")->find();
		//$data = M("Stu")->find(5);
		//dump($data);

	}
	
	//Model中的查询操作
	public function stu2(){
		//$mod = M("Stu");
		//1.where查询
		//$list = $mod->where("sex='m' and age>20")->select();
		//dump($list);
		//echo $mod->getLastSql(); //获取刚刚执行sql语句
		//echo $mod->getDbError(); //获取sql执行的错误信息
		
		//$where['sex']='m';
		//$where['age']=array("gt",20);
		//$list = $mod->where($where)->select();
		//dump($list);
		
		//或的查询
		//$list = $mod->where("classid='lamp95' or age>30")->select();
		//dump($list);
		
		//或查询
		//$where['classid']='lamp95';
		//$where['age']=array("gt",30);
		//$where['_logic']="OR"; //执行或查询
		//$list = $mod->where($where)->select();
		//dump($list);
		
		//直接执行sql查询
		$mod = M();
		$list = $mod->query("select * from stu");
		dump($list);
	}
	
	//模板的使用
	public function stu3(){
		//向模板中放置信息
		$this->assign("name","zhangsan");
		$this->id=100;
		$this->mytime=time();
		$this->assign(array("aa"=>"bb","cc"=>"dd"));
		
		//加载模板
		//$this->display();
		$this->display("stu3");
		//$this->display("Demo2:stu3"); //渲染Demo2目录下的模板stu3.html
	}
}
?>

//来自于Web\Home\View\Demo\Stu3，直接调用函数
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>模板实例</title>
    </head>
    <body>
        <h3>模板实例:Demo/stu3.html</h3>
        {$name}:{$id}:{$aa}:{$cc}<br/>
        <hr/>
		使用函数（格式化日期）：{$mytime|date="Y-m-d H:i:s",###}<br/>
		统计长度：{$name}的长度 {$name|strlen}<br/>
		字串替换：将字串中的a字母换成A： {$name|str_replace="a","A",###}
		<hr/>
		独立使用函数：{:time()}
		
    </body>
</html>

------------------------------------------------------------------------------------
//Web\Home\Controller\UserController.class.php ,用户信息控制类
<?php
//用户信息控制类
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
   //数据浏览
   public function index(){
		$this->assign("list",M("User")->select());
		$this->display("index");
   }
   //加载添加表单
   public function add(){
		$this->display("add");
   }
   
   //执行添加
   public function insert(){
		$mod = D("User");
		//$_POST['addtime']=time();
		if(!$mod->create()){
			$this->error($mod->getError());
		}
		//$mod->addtime=time();
		
		if($mod->add()){
			$this->success("添加成功",U("User/index"));
		}else{
			$this->error("添加失败！");
		}
   }
   
   //加载修改表单
   public function edit($id=0){
		$this->assign("vo",M("User")->find($id));
		$this->display("edit");
   }
   
   //执行修改
   public function update(){
		$mod = D("User");
		$mod->create();
		
		if($mod->save()){
			$this->success("修改成功",U("User/index"));
		}else{
			$this->error("修改失败！");
		}
   }
   
   //执行删除
    public function del($id=0){
		$mod = D("User");
		//执行删除
		if($mod->delete($id)){
			$this->success("删除成功",U("User/index"));
		}else{
			$this->error("删除失败！");
		}
   }
}
?>

-------------------------------------------------------------------------------
//Web\Home\Model\UserModel.class.php ,用户信息自定义
<?php
//自定义用户信息处理的Model类
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	//表中具体属性信息（默认省略）
	
	//字段映射信息 （默认省略）
	protected $_map = array(
		'username' =>'name', // 把表单中username映射到数据表的name字段
		'mail'  =>'email', // 把表单中的mail映射到数据表的email字段     );
	);
	
	//自动验证设置
	protected $_validate = array(
		array(name,'/^\w{6,12}$/','账号必须为6-12位的有效字符！',0), //正则验证
		array('name','','帐号名称已经存在！',0,'unique',1), //唯一性验证
		array('pass','repass','确认密码不正确',0,'confirm'), //重复密码验证
		array('email','email','邮箱地址不正确',0), //邮箱验证
		array('age','checkAge','年龄必须在16周岁以上',0,'callback',3), //邮箱验证
	);
	
	//自定义验证年龄方法
	public function checkAge($age=0){
		if($age<=16){
			return false;
		}
		return true;
	}
	
	//自动数据填充设置
	protected $_auto = array(
		array("addtime","time",1,'function'), //添加时间
		array("pass","makePass",1,"callback"), //密码加密
	);
	
	//自定义数据填充方法
	public function makePass($pass){
		return md5(md5($pass)."my.com");
	}
	
}
?>

-----------------------------------------------------------------------------
<?php
//PHP操作数据库事物
//  在User模型中启动事务
$User->startTrans();
// 进行相关的业务逻辑操作
$Info = M("Info"); // 实例化Info对象
$Info->save($User); // 保存用户信息
if (操作成功){
	// 提交事务
	$User->commit(); 
}else{
   // 事务回滚
   $User->rollback(); 
}
?>