//��Ŀ���ã�����demo1\ThinkPHP\Conf\convention.php
<?php
return array(
	//'������'=>'����ֵ'
	
	/* ���ݿ����� */
    'DB_TYPE'               =>  'mysql', // ���ݿ�����
    'DB_HOST'               =>  'localhost', // ��������ַ
    'DB_NAME'               =>  'lamp93_mist',    // ���ݿ���
    'DB_USER'               =>  'root',      // �û���
    'DB_PWD'                =>  '',          // ����
    'DB_PORT'               =>  '',        // �˿�
    'DB_PREFIX'             =>  '',    // ���ݿ��ǰ׺
	
	// ��ʾҳ��Trace��Ϣ
	'SHOW_PAGE_TRACE' =>true, 
);
?>


--------------------------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>ѧ����Ϣ����</title>
	</head>
	<body>
		<center>
			<include file="Stu/menu"/>
			
			<h3>���ѧ����Ϣ</h3>
			<table width="700" border="1">
				<tr>
					<th>ѧ��</th>
					<th>����</th>
					<th>����</th>
					<th>�Ա�</th>
					<th>�༶</th>
					<th>����</th>
				</tr>
				<foreach name="list" item="vo">
					<tr>
						<td>{$vo.id}</td>
						<td>{$vo.name}</td>
						<td>{$vo.age}</td>
						<td>{$vo.sex}</td>
						<td>{$vo.classid}</td>
						<td>
							<a href="__MODULE__/Stu/del/id/{$vo.id}">ɾ��</a> 
							<a href="__MODULE__/Stu/edit/id/{$vo.id}">�༭</a>
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
        <title>ѧ����Ϣ����</title>
    </head>
    <body>
        <center>
            <include file="Stu/menu"/>
            
            <h3>�����Ϣ</h3>
            <form action="__MODULE__/Stu/insert" method="post">
            <table width="280" border="0">
                <tr>
                    <td align="right">������</td>
                    <td><input type="text" name="name"/></td>
                </tr>
                <tr>
                    <td align="right">���䣺</td>
                    <td><input type="text" name="age"/></td>
                </tr>
                <tr>
                    <td align="right">�Ա�</td>
                    <td><input type="radio" name="sex" value="m"/>��
                        <input type="radio" name="sex" value="w"/>Ů</td>
                </tr>
                <tr>
                    <td align="right">�༶��</td>
                    <td><input type="text" name="classid"/></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" value="�ύ"/>
                        <input type="reset" value="����"/>
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
        <title>ѧ����Ϣ����</title>
    </head>
    <body>
        <center>
            <include file="Stu/menu"/>
            
            <h3>�༭ѧ����Ϣ</h3>
            <form action="__MODULE__/Stu/update" method="post">
			<input type="hidden" name="id" value="{$vo.id}"/>
            <table width="280" border="0">
                <tr>
                    <td align="right">������</td>
                    <td><input type="text" name="name" value="{$vo.name}"/></td>
                </tr>
                <tr>
                    <td align="right">���䣺</td>
                    <td><input type="text" name="age" value="{$vo.age}"/></td>
                </tr>
                <tr>
                    <td align="right">�Ա�</td>
                    <td><input type="radio" name="sex" value="m" <if condition="$vo.sex eq 'm'">checked</if> />��
                        <input type="radio" name="sex" value="w" <if condition="$vo.sex eq 'w'">checked</if>/>Ů</td>
                </tr>
                <tr>
                    <td align="right">�༶��</td>
                    <td><input type="text" name="classid"  value="{$vo.classid}"/></td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <input type="submit" value="�޸�"/>
                        <input type="reset" value="����"/>
                    </td>
                </tr>
            </table>
            </form>
        </center>
    </body>
</html>

//ѧ����Ϣ������������demo1\Myweb\Home\Controller\StuController.class.php
<?php
//ѧ����Ϣ������
namespace Home\Controller;
use Think\Controller;
//use Think\Model;
class StuController extends Controller {
    //���ѧ����Ϣ  
	public function index(){
       $mod = new \Think\Model("Stu"); //ʵ����Model��
	   $list = $mod->select(); //��ȡ������Ϣ
	   $this->assign("list",$list); //���õ�ģ����
	   $this->display("index"); //����ģ�����
    }
	
	//���ѧ����Ϣ��
	public function add(){
		$this->display("add");
	}
	
	//ִ�����ѧ����Ϣ
	public function insert(){
		$mod = new \Think\Model("Stu"); //ʵ����Model��
		//��ʼ�������Ϣ(���Ǵ�post�л�ȡ��Ϣ����ӵ�$mod������)
		$mod->create();
		//ִ�����,���ж�
		if($mod->add()){
			$this->success('��ӳɹ�', U('Stu/index'));
		}else{
			$this->error("���ʧ�ܣ�");
		}
	}
	
	//ִ��ѧ����Ϣ��ɾ��
	public function del(){
		$mod = new \Think\Model("Stu"); //ʵ����Model��
		//ִ��ִ��,���ж�
		if($mod->delete($_GET['id'])){
			$this->success('ɾ���ɹ�', U('Stu/index'));
		}else{
			$this->error("ɾ��ʧ�ܣ�");
		}
	}
	
	//����ѧ����Ϣ�༭��
	public function edit(){
		$mod = new \Think\Model("Stu"); //ʵ����Model��
		//��ȡҪ�޸ĵ���Ϣ
		$stu = $mod->find($_GET['id']);
		//��Ҫ�޸ĵ���Ϣ���õ�ģ����
		$this->assign("vo",$stu);
		//���ر༭ģ������޸���Ϣ
		$this->display("edit");
	}
	
	//ִ��ѧ����Ϣ�޸�
	public function update(){
		$mod = new \Think\Model("Stu"); //ʵ����Model��
		//��ʼ���༭��Ϣ(���Ǵ�post�л�ȡ��Ϣ����ӵ�$mod������)
		$mod->create();
		//ִ���޸�,���ж�
		if($mod->save()){
			$this->success('�޸ĳɹ�', U('Stu/index'));
		}else{
			$this->error("�޸�ʧ�ܣ�");
		}
	}
	
}
?>

---------------------------------------------------------------------------------------
//Demo��Ϣ������������demo1\web\Home\Controller\DemoController.class.php
<?php
namespace Home\Controller; //����ռ�
use Think\Controller; //ʹ�ÿռ��е���

class DemoController extends Controller{
	
	public function index(){
		echo "<h2>��ӭʹ���Զ��������Demo</h2>";
	}
	
	//ǰ��
	public function _before_add(){
		echo "����add����ǰ.....<br/>";
	}
	
	public function add(){
		echo "����add������.....<br/>";
	}
	
	//����
	public function _after_add(){
		echo "����add������.....<br/>";
	}
	
	//������
	public function del($id=0){
		echo "ɾ������id��Ϊ{$id}��ֵ��";
	}
	
	//����Ajax��������Ӧ
	public function select(){
		$mod = new \Think\Model("Stu");
		$this->ajaxReturn($mod->select(),"json");
		//$this->ajaxReturn($mod->select(),"xml");
	}
	
	//�������е���ת
	public function demo2(){
		$this->success("�ɹ�����",U("Index/index"),8);
		
		//�ض���
		//$this->redirect('Demo/add');
	}
	
	//�����ص�ǰ�������в����ڵķ���ʱ���Զ����ò����ڣ�
	public function _empty(){
		echo "����õ�".CONTROLLER_NAME."�������е�".ACTION_NAME."���������ڣ�";
	}
}
?>

--------------------------------------------------------------------------------
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>�ļ��ϴ�ʵ��</title>
	</head>
	<body>
		<h2>���ļ��ϴ�ʵ��</h2>
		<form action="__URL__/upload" enctype="multipart/form-data" method="post">
			<input type="file" name="mypic" />
			<input type="submit" value="�ύ" >
	    </form>
		
		<h2>���ļ��ϴ�ʵ��:HTML5</h2>
		<form action="__URL__/upload" enctype="multipart/form-data" method="post">
			<input type="file" multiple name="mypic[]" />
			<input type="submit" value="�ύ" >
	    </form>
	</body>
</html>

//ͼƬ�ϴ���Ϣ������������demo1\web\Home\Controller\PicController.class.php
<?php
//ͼƬ�ϴ�������ʵ��
namespace Home\Controller;
use Think\Controller;
class PicController extends Controller {
    //�����ϴ���ҳ
	public function index(){
		$this->display("index");
	}
	
	//ִ��ͼƬ�ϴ�
	public function upload(){
		//ʵ�����ϴ���
		$upload = new \Think\Upload();// ʵ�����ϴ���
		//��ʼ���ϴ���Ϣ
		$upload->maxSize = 3145728;//���ø����ϴ���С
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// ���ø����ϴ�����
		$upload->rootPath = './Public/Uploads/'; // ���ø����ϴ�Ŀ¼
		
		//ִ���ϴ��ļ� 
		$info = $upload->upload(); 
		
		//�ж��ϴ��Ƿ�ɹ�
		if(!$info) {// �ϴ�������ʾ������Ϣ
			$this->error($upload->getError());
		}else{
			// �ϴ��ɹ� 
			//$this->success('�ϴ��ɹ���');
			foreach($info as $file){
				//��ȡͼƬ����·���͵�ַ��Ϣ
				$picurl = __ROOT__."/Public/Uploads/".$file['savepath'].$file['savename'];
			
				//���
				echo "<img src='{$picurl}' width='200'/>";
			}
		}
	}
}
?>

----------------------------------------------------------------------------------------
//����session��cookie
<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //�ڵ�ǰλ������cookie��session��Ϣ
		//setCookie("name","zhangsan",time()+3600,"/");
		cookie("name","zhangsan",3600);
		
		//$_SESSION['loginuser']="����";
		session("loginuser","����");
    }
}
?>

-----------------------------------------------------------------------------------------
//��ȡ�������Ĳ���
<?php
//�������е�ʵ��
namespace Home\Controller;
use Think\Controller;
class DemoController extends Controller {
    public function index(){
       
    }
	
	//�������ʵ��
	public function fun1(){
		echo "���get��id ��ֵ��".$_GET['id']."<br/>";
		echo "���get��id ��ֵ��".I("get.id")."<br/>";
		echo "���cookie��name ��ֵ��".$_COOKIE['name']."<br/>";
		echo "���cookie��name ��ֵ��".cookie('name')."<br/>";
		echo "���cookie��name ��ֵ��".I('cookie.name')."<br/>";
		echo "���session��loginuser��ֵ��".$_SESSION["loginuser"]."<br/>";
		echo "���session��loginuser��ֵ��".session('loginuser')."<br/>";
		echo "���session��loginuser��ֵ��".I('session.loginuser')."<br/>";
	}
	
	//Model��ʵ������ʹ�÷���
	public function stu(){
		//ʵ����Model�ķ�ʽ��
		//1.ͨ��new
		$mod = new \Think\Model("Stu");
		$stu = $mod->find(); //��ȡһ��
		dump($stu); //��ʽ�����
		
		//2. ͨ��M()����ʵ����
		$mod = M("Stu"); //���ǵȼ��ڵ�һ��new Model()
		$stu = $mod->find();
		dump($stu);
		
		//3. ͨ��D()����ʵ����
		$mod = D("Stu"); //�ȳ���ʵ�����Զ����Model��StuModel����û��������M()
		$stu = $mod->find();
		$mod->dd(); //�����Զ���model���еķ�����
		dump($stu);
	}
	
	//�Զ���Model��
	public function stu2(){
		//ʵ�����Զ���StuModel��
		//$mod = new \Home\Model\StuModel();
		$mod = D("Stu");
		
		dump($mod->select());
	}
	
	//model���������
	public function stu3(){
		$m = M("Stu");
		//��ȡ����ѧ����Ϣ
		$list = $m->select();
		
		//��ȡ����������Ϣ
		//$list = $m->where("sex='m'")->select();
		
		//��ȡ������20��30֮���ѧ����Ϣ����������������
		//$list = $m->where("age>=20 and age<=30")->order("age desc")->select();
		
		//$map['age'] = array('between','20,30');
		//$list = $m->where($map)->order("age desc")->select();
		
		//��ѯ������С5λ��Ϣ
		//$list = $m->order("age asc")->limit(5)->select();
		
		//��ѯid,name,age�ֶε�ѧ����Ϣ
		//$list = $m->field("id,name,age")->select();
		
		dump($list);
		
		//�������
		//$data=array("name"=>"uu666",'age'=>28,'sex'=>"m",'classid'=>'lamp93');
		//ִ�����
		//echo $m->data($data)->add();
		
		//ִ���޸�(ִ�������޸�)
		//$data=array("age"=>20,"sex"=>"w","id"=>10);
		//$m->data($data)->save();
		
		//ͨ����ѯ���޸�
		//$m->find(6);
		//$m->name="uu120";
		//$m->save();
		
		
	}

}
?>

---------------------------------------------------------------------------------------
//����EmptyController.class.php
<?php
//�տ�������Ĭ�ϵ���һ�������ڵĿ��������Զ����õ�ǰ������
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller {
    //�շ���
	public function _empty(){
		die("�����".CONTROLLER_NAME."�������ͷ��������ڣ�");
	}
}
?>

-----------------------------------------------------------------------------------------
//����UserController.class.php
<?php
//�û���Ϣ������
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
   //�������
   public function index(){
		$this->assign("list",M("User")->select());
		$this->display("index");
   }
   //������ӱ�
   public function add(){
		$this->display("add");
   }
   
   //ִ�����
   public function insert(){
		$mod = D("User");
		//$_POST['addtime']=time();
		if(!$mod->create()){
			$this->error($mod->getError());
		}
		//$mod->addtime=time();
		
		if($mod->add()){
			$this->success("��ӳɹ�",U("User/index"));
		}else{
			$this->error("���ʧ�ܣ�");
		}
   }
   
   //�����޸ı�
   public function edit($id=0){
		$this->assign("vo",M("User")->find($id));
		$this->display("edit");
   }
   
   //ִ���޸�
   public function update(){
		$mod = D("User");
		$mod->create();
		
		if($mod->save()){
			$this->success("�޸ĳɹ�",U("User/index"));
		}else{
			$this->error("�޸�ʧ�ܣ�");
		}
   }
   
   //ִ��ɾ��
    public function del($id=0){
		$mod = D("User");
		//ִ��ɾ��
		if($mod->delete($id)){
			$this->success("ɾ���ɹ�",U("User/index"));
		}else{
			$this->error("ɾ��ʧ�ܣ�");
		}
   }
}
?>

-------------------------------------------------------------------------------------
//Web\Home\Model\StuModel.class.php
<?php
//�Զ���Stu��Ϣ���Model��
namespace Home\Model;
use Think\Model;

class StuModel extends Model{
	//protected $tablePrefix=""; //���ñ�ǰ׺
	//protected $tableName ="stu"; //��ǰ����
	protected $trueTableName="stu"; //����ǰ׺�ı���
	protected $dbName="lamp93"; //ָ����ǰ���ݿ���
	
	//���嵱ǰ���е��ֶ�
	protected $fields = array('id','name','age','sex','classid','_pk'=>'id');
	
	public function dd(){
		echo "hello stumodel!";
	}
}
?>

------------------------------------------------------------------------------------
//Web\Home\Model\UserModel.class.php
<?php
//�Զ����û���Ϣ���Model��
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	//�Զ���֤
	protected $_validate = array(
		array('name','require','�˺ű��룡'), 
		array('repass','pass','ȷ�����벻��ȷ',0,'confirm'), // ��֤ȷ�������Ƿ������һ��
		array('name','','�ʺ������Ѿ����ڣ�',0,'unique',1), // ��������ʱ����֤name�ֶ��Ƿ�Ψһ     
	);
	
	//�Զ����
	protected $_auto = array ( 
		array('pass','md5',1,'function'), //Ϊ�������
		array('addtime','time',1,'function'),//���ʱ��
	);
	
}
?>

----------------------------------------------------------------------------------
//Web\Home\Controller\DemoController.class.php ,���������ݿ�ĸ��ֲ�ѯ
<?php
namespace Home\Controller;
use Think\Controller;
class DemoController extends Controller {
    public function index(){
		
	}
	
	//Model���������ʵ��
	public function stu(){
		//����ѧ���ͳɼ������Ϣ��ѯ
		//$list = M("Stu")->join("grade on stu.id=grade.sid")->field("stu.id,name,sex,php,mysql")->select();
		//dump($list);
		
		//ͳ��ÿ���༶������
		//$list = M("Stu")->field("classid,count(*) as num")->group("classid")->select();
		//dump($list);
		
		//��ѯStu���еİ༶��Ϣ(distinct(true)��ʾȥ���ظ�)
		//$list = M("Stu")->distinct(true)->field("classid")->select();
		//dump($list);
		
		//��ѯ��������
		//$data = M("Stu")->where("id=5")->select();
		//dump($data[0]);
		//$data = M("Stu")->where("id=5")->find();
		//$data = M("Stu")->find(5);
		//dump($data);

	}
	
	//Model�еĲ�ѯ����
	public function stu2(){
		//$mod = M("Stu");
		//1.where��ѯ
		//$list = $mod->where("sex='m' and age>20")->select();
		//dump($list);
		//echo $mod->getLastSql(); //��ȡ�ո�ִ��sql���
		//echo $mod->getDbError(); //��ȡsqlִ�еĴ�����Ϣ
		
		//$where['sex']='m';
		//$where['age']=array("gt",20);
		//$list = $mod->where($where)->select();
		//dump($list);
		
		//��Ĳ�ѯ
		//$list = $mod->where("classid='lamp95' or age>30")->select();
		//dump($list);
		
		//���ѯ
		//$where['classid']='lamp95';
		//$where['age']=array("gt",30);
		//$where['_logic']="OR"; //ִ�л��ѯ
		//$list = $mod->where($where)->select();
		//dump($list);
		
		//ֱ��ִ��sql��ѯ
		$mod = M();
		$list = $mod->query("select * from stu");
		dump($list);
	}
	
	//ģ���ʹ��
	public function stu3(){
		//��ģ���з�����Ϣ
		$this->assign("name","zhangsan");
		$this->id=100;
		$this->mytime=time();
		$this->assign(array("aa"=>"bb","cc"=>"dd"));
		
		//����ģ��
		//$this->display();
		$this->display("stu3");
		//$this->display("Demo2:stu3"); //��ȾDemo2Ŀ¼�µ�ģ��stu3.html
	}
}
?>

//������Web\Home\View\Demo\Stu3��ֱ�ӵ��ú���
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>ģ��ʵ��</title>
    </head>
    <body>
        <h3>ģ��ʵ��:Demo/stu3.html</h3>
        {$name}:{$id}:{$aa}:{$cc}<br/>
        <hr/>
		ʹ�ú�������ʽ�����ڣ���{$mytime|date="Y-m-d H:i:s",###}<br/>
		ͳ�Ƴ��ȣ�{$name}�ĳ��� {$name|strlen}<br/>
		�ִ��滻�����ִ��е�a��ĸ����A�� {$name|str_replace="a","A",###}
		<hr/>
		����ʹ�ú�����{:time()}
		
    </body>
</html>

------------------------------------------------------------------------------------
//Web\Home\Controller\UserController.class.php ,�û���Ϣ������
<?php
//�û���Ϣ������
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
   //�������
   public function index(){
		$this->assign("list",M("User")->select());
		$this->display("index");
   }
   //������ӱ�
   public function add(){
		$this->display("add");
   }
   
   //ִ�����
   public function insert(){
		$mod = D("User");
		//$_POST['addtime']=time();
		if(!$mod->create()){
			$this->error($mod->getError());
		}
		//$mod->addtime=time();
		
		if($mod->add()){
			$this->success("��ӳɹ�",U("User/index"));
		}else{
			$this->error("���ʧ�ܣ�");
		}
   }
   
   //�����޸ı�
   public function edit($id=0){
		$this->assign("vo",M("User")->find($id));
		$this->display("edit");
   }
   
   //ִ���޸�
   public function update(){
		$mod = D("User");
		$mod->create();
		
		if($mod->save()){
			$this->success("�޸ĳɹ�",U("User/index"));
		}else{
			$this->error("�޸�ʧ�ܣ�");
		}
   }
   
   //ִ��ɾ��
    public function del($id=0){
		$mod = D("User");
		//ִ��ɾ��
		if($mod->delete($id)){
			$this->success("ɾ���ɹ�",U("User/index"));
		}else{
			$this->error("ɾ��ʧ�ܣ�");
		}
   }
}
?>

-------------------------------------------------------------------------------
//Web\Home\Model\UserModel.class.php ,�û���Ϣ�Զ���
<?php
//�Զ����û���Ϣ�����Model��
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	//���о���������Ϣ��Ĭ��ʡ�ԣ�
	
	//�ֶ�ӳ����Ϣ ��Ĭ��ʡ�ԣ�
	protected $_map = array(
		'username' =>'name', // �ѱ���usernameӳ�䵽���ݱ��name�ֶ�
		'mail'  =>'email', // �ѱ��е�mailӳ�䵽���ݱ��email�ֶ�     );
	);
	
	//�Զ���֤����
	protected $_validate = array(
		array(name,'/^\w{6,12}$/','�˺ű���Ϊ6-12λ����Ч�ַ���',0), //������֤
		array('name','','�ʺ������Ѿ����ڣ�',0,'unique',1), //Ψһ����֤
		array('pass','repass','ȷ�����벻��ȷ',0,'confirm'), //�ظ�������֤
		array('email','email','�����ַ����ȷ',0), //������֤
		array('age','checkAge','���������16��������',0,'callback',3), //������֤
	);
	
	//�Զ�����֤���䷽��
	public function checkAge($age=0){
		if($age<=16){
			return false;
		}
		return true;
	}
	
	//�Զ������������
	protected $_auto = array(
		array("addtime","time",1,'function'), //���ʱ��
		array("pass","makePass",1,"callback"), //�������
	);
	
	//�Զ���������䷽��
	public function makePass($pass){
		return md5(md5($pass)."my.com");
	}
	
}
?>

-----------------------------------------------------------------------------
<?php
//PHP�������ݿ�����
//  ��Userģ������������
$User->startTrans();
// ������ص�ҵ���߼�����
$Info = M("Info"); // ʵ����Info����
$Info->save($User); // �����û���Ϣ
if (�����ɹ�){
	// �ύ����
	$User->commit(); 
}else{
   // ����ع�
   $User->rollback(); 
}
?>