Smartyģ�����漼��
================================================================
һ��ʲô��smartyģ�����棿
--------------------------------------------------------
 	ʲô��smarty��
		Smarty�ǲ���phpд��һ��ģ�����棬��Ƶ�Ŀ����Ҫ��php������html������룬
		ʹphp����Աֻרע��php����ı�д����ҳ����ֻרע����ҳ������
 	û��ģ������ʱ���ֵ����⣿
		html��php�������Խ��Խ��
		ҳ�������Խ��Խ��
		���������������Ʒֹ�����ȷ
 	��ͳ��php�ļ�:
		1. php�����html�����һ�𣬲����ڳ���Ա�������ķֹ�������Ա����������ͬʱ�޸�һ���ļ�
		2.���ݵĴ���ͬһҳ�洫�ݣ�php������ҳ���е���ʾ��Ҫʹ��php���
			���磺<?php  echo $username?>
			index.php

 
 	����ģ�������:
		1.	php������html������뿪�ˣ�php�������һ��������php�ļ��У�html�������һ��������html�ļ���
		2.	���ݵĴ�������php�е������ȸ���ģ�����棬Ȼ��ģ�������ٰѽ��յ������ݸ�ģ���ļ���ʾ��
		3.  ģ���ļ��в�����php�������˵php��ǵĳ��֣�ģ������ʾ�����ݶ���ͨ��ģ������ı����ʾ������
			index.php    smartyģ������    index.html
		 
 	Ŀǰphp��ģ������ܶ࣬ΪʲôҪʹ��smartyģ�����棿
		1.	һ���ģ�����棬�磬phplib   �����ڽ���ģ�����ʱȡ��Ҫ������ģ�棬Ȼ��ѱ����������ͨ��parse()�������������ģ�棬����ٽ���ҳ������ܽ��һ�仰���Ǿ���ÿ��ִ�е�ʱ��Ҫ���½���һ��
		2.	����smartyģ��������˵�������ڳ���������parse()�����Ĳ����ˣ�smarty���Զ����������������Ѿ����������ҳ�������û�иĶ�������£�smarty���������±���Ķ�����ֱ��ȥִ�б��������ҳ���Խ�ʡ����ʱ�䡣
 	
	Smarty�������ŵ�:
		1.	�ٶȿ죺�����������ģ��������Ե�
		2.	�����ͣ�����smarty��д�ĳ���������ʱ������һ����ģ�漼����php�ļ�������ļ�������php��html��ϵķ�ʽ������һ�η���ģ��ʱ��web����ֱ��ת��������ļ��У����������±���(��ģ���ļ�û�иĶ��������)
		3.	���漼���������Խ��û����տ�����html��ҳ�����һ����̬��html��ҳ�����û���������ʱ���������û���ʱ�䣬�ڻ����ļ�û����֮ǰ�����û�������ֱ��ת���������̬�Ļ����ļ����൱�ڵ�����һ����̬��html�ļ���
		4.	ģ���п���ʹ�����̿�����䡣
 	
	���ʺ�ʹ��smarty�ĵط�
		1.	��Ҫʵʱ���µ����ݣ����磺��Ʊ��ʾ������Ҫ���������ݽ��и���
		2.	С��Ŀ��
	
	Smartyģ�������������̡�
		����php��������ʱ����ʼ��smartyģ������
		��smartyģ�������ȡģ���ļ�(.html��tpl�ļ�)
		���ڶ�ȡģ���ļ���ʱ��smartyģ��������Զ��жϸ�ģ���ļ��Ƿ���Ҫ���±��롣
		���������Ҫ���±��룬��ֱ�ӽ���ģ������滻��
		������ǵ�һ��ִ�д˳����ļ�����˵ģ�汻�Ķ��ˣ���ô����Ҫ���±�����ٽ���ģ������滻��
		������ִ�е��Ǳ�����php�ļ���
		�����������������

����һ���򵥵�ʹ��smartyģ�����漼����С����
----------------------------------------------------------
 	���ٷ���վȥ����smartyģ������ѹ����
		������http://www.smarty.net 
				 
 	��ѹ��ѹ����������������һ��libs�ļ��У���libs�ļ���������Ϊsmarty��
		���ƶ�����վ��Ŀ¼�µ�libs�ļ���
 
 	��smarty����libs�ļ��У������������ļ���
		sysplugins:ϵͳ���Ŀ¼
		plugins���ⲿ���
		debug.tpl�����debug������Ϣ�����ģ��
		Smarty.class.php: smartyģ������������ļ���Ҫʹ��smartyģ�����棬����Ҫ������ļ�
		SmartyBC.class.php:
	
	�Smartyģ��ʾ����
		1. ��libs��Ŀ¼���ƹ�����
		2. ����һ��ģ��Ŀ¼templatesģ���ļ����Ŀ¼
			����һ��configs�����ļ�Ŀ¼
		3. ��дindex.php�ļ�������ļ�����Smarty����ʹ���
			//1.����Smarty��
			require("libs/Smarty.class.php");

			//2.��������
			$smarty = new Smarty();

			//3.��ʼ����Ϣ
			$smarty->left_delimiter="{";	//���¶���Smartyģ����󶨽��
			$smarty->right_delimiter="}";	//���¶���Smartyģ����Ҷ����
			//��̬����
			$smarty->caching=true; //�Ƿ�����̬���� true(����)
			$smarty->cache_lifetime=5; //���û���ʱ�� ��5��ʾ����5���ӣ�

			//4.���ñ�����
			$smarty->assign("name","zhangsan");//��Smartyģ���з��ñ���nameֵΪ����
			$smarty->assign("date",date("Y-m-d H:i:s"));//Ϊģ���һ��ʱ��
			
			//5.����ģ�壺
			$smarty->display("index.html");

		4.ʹ�����������index.php�����ᴴ��Ŀ¼templates_c��cacheĿ¼
		
		5. ���Ľṹ��
			��Ŀ¼
			 |--libs 		//Smarty��
			 |   |--Smarty.class.php
			 |--templates 	//ģ��Ŀ¼
			 |   |--index.html
			 |--templates_c //ģ�����Ŀ¼
			 |--cache		//ģ�徲̬����Ŀ¼��ע���迪�����棩
			 |--configs		//�����ļ�Ŀ¼
			 |--index.php   //php�ļ�����ڣ�
			 
			 
		
 	�򵥵ķ���һ��Smarty.class.php�������ļ�
		����һ�����ļ�������������(����)�ͷ�������
		������ƣ�Smarty
		��Ҫ���Ի������
			$template_dir:		ģ��Ŀ¼����Ҫ�������ģ���ļ����磺.html�ļ���.tpl�ļ�
			$compile_dir:		����Ŀ¼����Ҫ������ű�����php�ļ�������෽ʽ���ļ�
			$config_dir:		����Ŀ¼����Ҫ������Ź����������ļ�
			$cache_dir:			����Ŀ¼����Ҫ������Ż����ļ�
			$left_delimiter:	��߽��
			$right_delimiter:	�ұ߽��
			$caching			�Ƿ�������
			$cache_lifetime		���ƻ���ʱ��
			
		��Ҫ������
		assign():��Ҫ������php�еı������͵����ݸ�ֵ��ģ�������
		display():��Ҫ������ʾָ����ģ���ļ�

 	��ʹ��smarty֮ǰ��������Ҫ�Ժ������ļ�(Smarty.class.php)��������

		//1.����Ҫ����������ļ�
		include_once ��libs/smarty/Smarty.class.php��;
		//2.ʹ��new�ؼ��ִ���һ��������ʵ������
		$smarty=new Smarty();
		
		//3.����
		
		$smarty->template_dir=��./templates��;//����ģ��Ŀ¼
		
		$smarty->compile_dir=��./templates_c��;//���ñ���Ŀ¼
		
		$smarty->config_dir=��./configs��;//���ù��������ļ�Ŀ¼
		
		$smarty->caching=false;//���û���,����Ŀ�����ڼ�һ�㲻��������
		
		$smarty->cache_dir=��./cache��;//���û���Ŀ¼
		/*1.�������ұ߽��,Ĭ�ϵ����ұ߽����һ�Դ����ţ�ʵ��Ӧ����һ�㲻ʹ��Ĭ�ϵı߽������Ϊ������javascript�к����Ķ������ͻ
		 2.�Ժ�ģ����ģ�������Ҫ���ڴ����ұ߽����
		*/
		$smarty->left_delimiter=��{��;
		$smarty->right_delimiter=��}��;

		//�������֮��������²���
		//4.��php�б������͵�ֵ��ֵ��ģ�����
		$smarty->assign(��username��,$username);
		//5.��ʾ��Ӧ��ģ���ļ��������$smarty->template_dir=��./templates��ȥ��ǰĿ¼�µ�templates�ļ�����ȥѰ��index.html�ļ�
		$smarty->display(��index.html��);
			�������ã�������Ҫȷ����ǰ�ļ�����������Ŀ¼�����û�еĻ����ֹ�����
		templates     //���ģ���ļ�
		templates_c   //��ű���Ŀ¼
		configs       //��Ź��������ļ�
		cache        //��Ż����ļ�

1.	��ʱ������Ŀ���ļ�����:
		  ��Ŀ¼
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
			

2.	���·�����ڳ����ļ��������ⲿ�ļ�������Ŀ¼ʱ�����Ա��ļ�Ϊ������
	���磺Ҫ��index.php�ļ�������Smarty.class.php�ļ�����ΪSmarty.class.php�ļ�λ��libs/smarty�ļ����£���index.php�ļ��ָ�libs�ļ���ͬ��������Ӧ���������룺
		include_once ��libs/smarty/Smarty.class.php��;
 	һ���򵥵�ʹ��smarty��С����:

����ʹ��smartyģ������Ĳ���:
===========================================================
 	��һ��:����smarty�������ļ�������һ��smartyʵ������:
		include_once ��libs/smarty/Smarty.class.php��;
		$smarty=new Smarty();

 	�ڶ���:�Ժ����������Ի���������� 
		$smarty->template_dir=��./templates��;
		$smarty->compile_dir=��./templates_c��;
		$smarty->config_dir=��./configs��;
		$smarty->caching=false;
		$smarty->cache_dir=��./cache��;
		$smarty->left_delimiter=��{��;
		$smarty->right_delimiter=��}��;
		
 	������:��ģ�������ֵ
		$smarty->assign(��ģ�������,��ֵ(����|����)��);
		����:$smarty->assign(��username��,��������);

 	���Ĳ�:��ʾ��Ӧ��ģ���ļ�
		$smarty->display(��ģ���ļ�����);
		����:$smarty->display(��index.html��);

 	���岽:��ģ���ļ���ʹ��smarty�����ұ߽����ģ�������ʾ����
		<html>
			<head></head>
			<body>
				�û���:{$username}
			</body>
		</html>
		
�ġ�SmartyӦ��֮ģ�����:��������Դ
===================================================================
 	��php�з���ı���
		1.	��ʽ��$smarty->assign(��ģ�������,��ֵ(����|����)��);
		2.	���磺$username=��С����;
				//��php���������ģ�����
		$smarty->assign(��username��,$username);
		3.	��ģ���ļ���ͨ�����ұ߽������ʾģ�����
		���磺{$username}
 	
	{$smarty}��������
		1.ʹ�ñ��������ɷ���ҳ�����������get��post��server��request��session��
			���磺ҳ���������:
			{$smarty.get.username}    //�൱����php�ļ��з���$_GET[��username��]
			{$smarty.post.username}   //�൱����php�ļ��з���$_POST[��username��]
			{$smarty.session.username}//�൱����php�ļ��з���
			$_SESSION[��username��]
			{$smarty.cookie.username}//�൱����php�ļ��з���$_COOKIE[��username��]
			{$smarty.request.username}              //�൱����php�ļ��з���
			$_REQUEST[��username��]
			{$smarty.server.REMOTE_ADDR}        //�൱����php�ļ��з���
			$_SERVER[��REMOTE_ADDR��]

		2.ʹ�ñ��������ɷ��ʳ�����const
			{$smarty.const.__FILE__}
		3.ʹ�ñ��������ɶ�ȡ�����ļ��ı�����config
			{$smarty.config.username}
			��ȡ�����ļ��еı���
				1.	�����ļ�Ӧ����$smarty->config_dir=��./configs��ָ����Ŀ¼����
				2.	�����ļ��ĺ�׺��Ϊ .conf
				3.	�����ļ���myself.conf
		#ȫ�����ñ���
			title=�����������ļ���    
			bgcolor=��red��
			border=5
			type=���������
			name=��php�����ŵ���ͨ��
		#�ֲ�����
		[login]
			username=���û�����
			password=����  �롱
4. 	һ�����ñ���ռһ�У����Һ���û���ԷֺŽ�β
5.	ģ�������������ļ��еı���
			����Ҫ���������ļ���
			//���������ļ�������ֻ�ܽ�ȫ�ֱ������ؽ���
			{config_load file=��my.conf��}
			//���Ҫ���ؾֲ���������Ҫʹ��section����ָ���ض��Ľ�
			{config_load file=��my.conf�� section=��login��}

			ģ���ļ������������ļ��б����ķ�����
			//��һ��:��Ҫʹ������#
			����:{#title#}
        //ʹ��{$smarty}��������
			����:{$smarty.config.bgcolor}
			

=============================================================================================


=============================
    Smartyģ���ʹ��
==============================
һ����װ����ԣ�

1. ��Smarty-2.6.25.zip���е�libs�ļ����������ڴ���һЩĿ¼��
   
  ��Ŀ¼
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

2.��init.inc.php�ļ��У� 	
   <?php
	//Smarty�ĺ������ã���װ���ã���

	require_once("./libs/Smarty.class.php");

	$tpl = new Smarty();

	$tpl->template_dir = "./templates"; //ָ��ģ��·��

	$tpl->compile_dir  = "./templates_c";//ָ�������·��

	$tpl->config_dir = "./configs"; //ָ�������ļ�·��

	$tpl->caching = 0;	//�Ƿ��ͷŲ��þ�̬���棬���鿪��ʱΪ0(������)������ʱΪ1.

	$tpl->cache_lifetime = 60*60*24*7; //���澲̬����ʱ�䡣(һ��)

	$tpl->left_delimiter = "<{"; //ָ��ģ�忪ʼ�����

	$tpl->right_delimiter= "}>"; //ָ��ģ����������

    ?>
 3. ��a.php��д��
    <?php
	require_once("init.inc.php");

	  //�������滻
	$tpl->assign("title","��һ��Smartyģ�����");
	$tpl->assign("content","��ӭʹ��Smartyģ�壡");

	//����
	$tpl->display("a.tpl");

     ?>
 4. ��a.tpl�ļ���
        <html>
	   <head>
		   <title><{$title}></title>
	   </head>
	   <body>
		   <h2><{$title}></h2>
		   <{$content}>
	   <body>
	</html>

  5.���ԣ�ʹ�����������a.php�ļ���


 ע�����
   1. ͼƬ����·����ʹ�ã�Ҫ�Է��ʵ�php�ļ�Ϊ���·����
   2. Smartyģ�壨tpl�ļ����ļ�����ģ��·������Ŀ¼�¡��磺tmplates/aa/b.tpl
       ��ô������a.php�У�ʹ��$tpl->display("aa/b.tpl");
   3. ��tplģ��ҳ���ָ�ɼ���Сtplҳʱ������ʹ��include���룺
       �� <{include file="aa/head.tpl"}>

   4. ��ʹ��Smartyģ���phpҳ���Ŀ¼�洢ʱ��

    ʹ�þ���·����
    ��init.inc.php�ļ��У�
    
	$path="D:/Program Files/AppServ/www/lamp10/php_smarty";

	require_once($path."/libs/Smarty.class.php");

	$tpl = new Smarty();

	$tpl->template_dir = $path."/templates"; //ָ��ģ��·��

	$tpl->compile_dir  = $path."/templates_c";//ָ�������·��

	$tpl->config_dir = $path."/configs"; //ָ�������ļ�·��

	$tpl->caching = 0;	//�Ƿ��ͷŲ��þ�̬���棬���鿪��ʱΪ0(������)������ʱΪ1.

	$tpl->cache_lifetime = 60*60*24*7; //���澲̬����ʱ�䡣(һ��)

	$tpl->left_delimiter = "<{"; //ָ��ģ�忪ʼ�����

	$tpl->right_delimiter= "}>"; //ָ��ģ����������

	      


����ģ�������ƪ
  1�������﷨
    a��ģ��ע�ͱ�*�Ű�Χ,���� {* this is a comment *} ,���ҿͻ����ɼ�

  2��������
    a����PHP����ı��� ��
	Table of Contents[�����б�]	Hello {$firstname}
	Associative arrays[��������]	{$Contacts.phone.home}<br>
	Array indexes[�����±�]		{$Contacts[2][0]}<br>
	Objects[����]  email:		{$person->email}<br>

    b���������ļ����õı�����
       # �������ļ����������
          ��:��configsĿ¼�´���һ�������ļ�foo.conf.
	  ���ļ���д�룺
		;������ȫ��������Ϣ
		mytitle=�ҵ�Smartyģ����ϰ
		bodycolor=#cccccc

		;���¾ֲ�������Ϣ�����飩
		[one]
		aa=11111111
		bb=22222222
		[two]
		cc=33333333
		dd=44444444
       # ��tplģ��ҳ����1.tpl����ʹ��<{config_load file="foo.conf" section="two"}>
         ����ʹ�ñ�ǩ�����<{#mytitle#}> �����"�ҵ�Smartyģ����ϰ".
			   <{#cc#}>
       # {$smarty}�����������Ա����ڷ���һЩ�����ģ�����.
	  ���磺<{$smarty.get.id}>  <==> $_GET["id"];  (PHP��)
	        <{$smarty.session.loginuser}> <==> $_SESSION["loginuser"];
	   ���У�env��cookie request 
	        <{$smarty.now}> ʱ���
		��ǰϵͳʱ�䣺<{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}>	
	   ��php�ж��壺define("WTO","������ó��֯");
	   ����tpl�У� ���������<{$smarty.const.WTO}>
	   ��������ļ���Ϣ��<{$smarty.config.mytitle}>�൱�ڣ�<{#mytitle#}>
	   
	   
	   
	   
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
//ʹ��Smartyģ������

//1. ����Smarty��
require("./libs/Smarty.class.php");

//2. ʵ����
$smarty = new Smarty();

//3. ��ʼ��������Ϊ����smarty��Ĭ�����ã�
$smarty->template_dir = "./templates"; //ָ��ģ��Ŀ¼
$smarty->compile_dir = "./templates_c"; //ָ��ģ�����Ŀ¼���Զ��ᴴ����
$smarty->config_dir = "./configs";      //ָ�������ļ�Ŀ¼

$smarty->cache_dir = "./cache";      //ģ�徲̬����Ŀ¼���Զ��ᴴ����
$smarty->caching = false;       //�Ƿ���ģ�徲̬����
$smarty->cache_lifetime = -1;   //����ģ�徲̬����ʱ�䣨-1��ʾ�������ڣ�

$smarty->left_delimiter = "{";   //ģ���󶨽������
$smarty->right_delimiter = "}";   //ģ���Ҷ��������

//4. ������Ϣ
$smarty->assign("title","Smartyģ������ʵ��");
$smarty->assign("content","�Զ���ʹ��Smartyģ������ʵ��");
$smarty->assign("color","red");

//5. ����ģ�����
$smarty->display("1.html");
?>


-------------------------------------------------------------------------------------------


<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
        <style>
            {literal} {* ����Smarty�Ľ��� *}
            h3{color:blue;}
            h4{color:#666;}
            {/literal}
        </style>
    </head>
    <body>
        <h3>{$title}</h3>
        <a href="index.php">����</a>
        <h4>���������{$id}</h4>
        <h4>ģ���е���ֵ���Լ������㣺{$id*2+60}</h4>
        <h4>����ִ���{$str}</h4>
        <h4>����ִ�����ʹ�ú�����{$str}�ĳ��ȣ�{strlen($str)}</h4>
        <h4>������飺{$a}��{$a[0]}��{$a[1]}��{$a[2]}</h4>
        <h4>����������飺{$stu}��{$stu['name']}��{$stu.age}</h4>
        <h4>��������е����Ժͷ�����{$ob->name}��{$ob->age} {$ob->getInfo()}</h4>
        <h4>{*ģ���е�ע�ͣ�{$ob->name}��{$ob->age} {$ob->getInfo()}*}</h4>
        
    </body>
</html>


<?php
//ʹ��Smartyģ������

//1.����smarty�ĳ�ʼ���ļ�
require("init.php");

//2. ������Ϣ
$smarty->assign("title","Smartyģ��ʵ��--�����﷨����ģ��������������Ժͱ�����Ϣ");
//��ģ���з��ø��ֱ�����Ϣ
$smarty->assign("id",100);
$smarty->assign("str","hello smarty!");
$smarty->assign("a",array(10,20,30,40));
$smarty->assign("stu",array("name"=>"����","age"=>20,"sex"=>"��"));

$smarty->assign("ob",new Person());
class Person{
    public $name="qq";
    public $age=23;
    public function getInfo(){
        return $this->name.":".$this->age;
    }
}



//3. ����ģ�����
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
        <a href="index.php">����</a>
        
        <h3>ʹ��smarty��ȡmyconfig.ini�����ļ��е���Ϣ</h3>
        {config_load file="myconfig.ini"}
        
        <h4>ʹ��#�ŷ�ʽ�����{#name#}</h4>
        <h4>ʹ��$smarty.config�����{$smarty.config.sex}</h4>
        <h4>ʹ��$smarty.config�����{$smarty.config.age}</h4>
    </body>
</html>


<?php
//ʹ��Smartyģ������

//1.����smarty�ĳ�ʼ���ļ�
require("init.php");

//2. ������Ϣ
$smarty->assign("title","��Smarty�ж�ȡ�����ļ���Ϣ");

//3. ����ģ�����
$smarty->display("2.html");
?>


-------------------------------------------------------------------------------------------
{lg.conf}
	[cn]
	title = ���ѧ����Ϣ
	name = ����
	sex = �Ա�
	man = ��
	woman = Ů
	age = ����
	classid = �༶
	submit = �ύ
	reset = ����

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
					<td align="right">{#name#}��</td>
					<td><input type="text" name="name"/></td>
				</tr>
				<tr>
					<td align="right">{#age#}��</td>
					<td><input type="text" name="age"/></td>
				</tr>
				<tr>
					<td align="right">{#sex#}��</td>
					<td><input type="radio" name="sex" value="m"/>{#man#} 
					<input type="radio" name="sex" value="w"/>{#woman#}</td>
				</tr>
				<tr>
					<td align="right">{#classid#}��</td>
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
            <a href="3.php?lg=cn">����</a>
            <a href="3.php?lg=en">English</a>
		</center>
	</body>
</html>


<?php
//ʹ��Smartyģ������

//1.����smarty�ĳ�ʼ���ļ�
require("init.php");

//2. ������Ϣ
$smarty->assign("title","ʹ��Smarty��ȡ�����ļ���Ϣ��ʵ����ҳ�Ĺ��ʻ�");
//��������ѡ��
$lg = isset($_GET['lg'])?$_GET['lg']:"cn";
$smarty->assign("lg",$lg);

//3. ����ģ�����
$smarty->display("3.html");
?>


===========================================================================================
�塢Smarty���������������������
-------------------------------------------------
 	ʲô��smarty�ı�����������
		1.	smartyģ�������������õ�һЩ��������Щ������Ҫ�������λ���ڱ���,
			���ǳ�֮Ϊ���������������������,������������Ҫ���ڲ���������
			�����԰�������������Ƚ�ʵ�õĹ��ܣ�
			����:����ĸ��д����֡��滻����ȡ�ȵȣ�
			��Щ����ͨ��smartyģ��������Ժ����׵���ģ���ļ���ʵ�֣�
			����������php�ļ���ͨ��php�����ú���ȥ���������Ļ��ͼ�����php�Ĵ�����

 	���ʹ��smarty�ı�����������
		1.�﷨��ʹ��  ��|��  ��Ӧ�ñ���������,���������   ��:��   �ָ�����
				����: ��ģ���ļ���ʹ�ñ�����������ȡǰʮ���ַ�
                {$name|truncate:10}

		2.������smarty����������
				capitalize [����ĸ��д] 
				count_characters [�����ַ���] 
				cat [�����ַ���] 
				count_paragraphs [���������]
				count_sentences [�������]
				count_words [�������]
				date_format [ʱ���ʽ]
				default [Ĭ��]
				escape [ת��]
				indent[����]
				lower[Сд ]
				nl2br[���з��滻��<br />]
				regex_replace[�����滻]
				replace[�滻]
				spacify[���]
				string_format[�ַ�����ʽ��]
				strip[ȥ��(����ո�)]
				strip_tags[ȥ��html��ǩ]
				truncate[��ȡ]
				upper[��д]
				wordwrap[�п�Լ��]
		3.ʹ��smarty����������������
			����:
				����:{$smarty.new|date_format:��%Y-%m-%d��}
				�����е��ַ���(�����ո�):{$str|count_characters:true}
				�����������������һ������:{$str|nl2br|upper|cat:��������}
				ģ�����+��������:{$str1|cat:��������}
				�����ĸ��հ��ַ�����ʹ��*������:{$str2|indent:4:��*��}
				�ѱ����еġ�hello���滻Ϊ��world��:{$str3|replace:��hello��,��world��}


����Smartyģ����������ú���(����)
--------------------------------------------------------------------------
 	foreach���
		1.foreach��Ǵ�������
			��ģ���б���ʹ�óɶԵ�foreach��ǩ���������е����ݣ�
			���ұ�������from��item��������
			��ʽ:{foreach from=$users item=user key=key}
		2.foreach��ǵ�����
			(1)from:��ѭ�����������
			(2)item:��ǰԪ�صı�������
			(3)key:��ǰԪ�صļ���
			(4)name:��ѭ��������
		3.foreachelse�ӱ��
			(1)��from����ָ��������Ϊ��ʱ,�����foreachelse�����е�����
			(2)foreachelse������foreachһ��ʹ��
			(3)foreachelseû�н������
		4.ʹ�ð�����
			//ѭ��һά����:aaaΪ�����е�ǰԪ�صı�������
			{foreach from=$user item=aaa}
					{$aaa}
			{/foreach}

			//ѭ����ά����:���users�������û�����ôuser�ʹ���ǰ�û�
			{foreach from=$users item=user}
						����:{$user.username}
						�Ա�:{$user.sex}
			{/foreach}

			//foreachelse�ӱ�ǵ��÷�:
			{foreach from=$users item=user}
						����:{$user.username}
						�Ա�:{$user.sex}
			{foreachelse}
					��ʱû������
			{/foreach}


 	include���
		1.��ģ���ļ��а�����ģ��
			��ʽ:{include file=��ģ���ļ�·����}
		2.����
			(1)��������ͷ���ļ�: {include file=��header.html��}
			(2)��������β���ļ�: {include file=��footer.html��}
		3.�����Ƚ�ʹ�õ����ԣ�
			(1)����include����д����ѡ��assign���ԣ����������ģ�����ݲ��ٵ�
				ǰģ������������Ǹ�ֵ��assign����ָ���ı�����
				����:{include file=��header.html��  assign=��header��}
			(2)������������ģ���ͬʱ���䴫�ݸ�������
				����:{include file=��header.html�� title=��ͷ���ļ���}

 	if���
		1.�����������η�һ��ʹ��
		2.�������������η�
			(1) eq:���                neq:����
			(2) mod:��ģ               gt:����
			(3) is even:�Ƿ���ż��     not:��
			(4) ge:���ڵ���            lt:С��                       
			(5) lte:С�ڵ���                           
			(6) ==:���                !=:�����
			(7) >:����                 <:С��
			(8)<=:С�ڵ���             >=:���ڵ���
        3.ʹ��
				(1)ģ���ļ���ʹ��smartyģ�������if�������
					{if $name eq ��admin��}
						<font color=��red��>����Ա��¼</font>
					{else}
						<font color=��red��>��û�е�¼Ȩ��</font>
					{/if}
				(2)ģ���ļ���ʹ��smartyģ�������if�������
					{if $quanxian eq ��admin��}
						<font color=��red��>����Ա��¼</font>
					{elseif $name eq ��xiaosan��}
						<font color=��red��>��ͨ��Ա��¼</font>
					{else}
						<font color=��red��>��û�е�¼Ȩ��</font>
					{/if}


 	literal���
1.	literal�ı��Ĵ�����
literal�е����ݽ��������ı�������ʱģ�潫�������ڲ��������ַ���Ϣ
������������ʾ�п��ܰ��������ŵ��ַ���Ϣ��javascript�ű�
2.	����:literal����е������ַ���Ϣ���������ı�������
	{literal}<script>��</script>{/literal}

 	section���
1.	section��Ǵ�������
��ģ���б���ʹ�óɶԵ�section��ǩ���������е����ݣ����ұ�������name��loop��������
		��ʽ:{section name=i step=2 start=2 max=10 loop=$users}
2.	section��ǵ����ԣ�
(1)name:ָ����ѭ�������ƣ�����Ҫ��sectionѭ�����������ʱ�������ڱ�������������ţ��������б������name����
	(2)loop:ѭ������������
	(3)start:ѭ��ִ�еĳ�ʼ����λ��
	(4)step:��ֵ����ѭ���Ĳ���������:step=2��֮�����±�Ϊ0��2
		��4��Ԫ��
	(5)max:�趨���ѭ������������:max=2,�������ѭ��2��
	(6)show:�����Ƿ���ʾ��ѭ����Ĭ��ֵΪ1-��ʾѭ��   0-��ֹѭ��
           3. 	sectionѭ�������п��Ե��õı���
��sectionѭ������һЩ�ɹ����õı��������������ʸ�ѭ����һЩ�����ֵ��������ѭ���б���ͨ��smarty��������$smarty���з���
					��ʽ:{$smarty.foreach.foreachname.varname}
					(1)first:��ǰsectionѭ���ڵ�һ��ִ��ʱ�ñ�����ֵΪtrue
					(2)last:��ǰsectionѭ�������һ��ִ��ʱ�ñ�����ֵΪtrue
					(3)rownum:ѭ������������iteration�������
					(4)index:��ʾ��ǰѭ��������
					(5)iteration:��ʾѭ���Ĵ���
           4.	sectionelse�ֱ��
				(1)��loop����ָ��������Ϊ��ʱ,�����sectionelse�����е�����
				(2)sectionelse������sectionһ��ʹ��
				(3)sectionelseû�н������

				��ʽ��
				{section name=i loop=$users}
					{$users[i].username}
				{sectionelse}
					<div><font color=��red��>��ʱû������</font></div>
				{/section}
				
				
========================================================================================

���� ������������
-------------------------------------------------------------------------------
	1. ϵͳ�ṩ�ĵ�������
			capitalize [���ַ���д] 
			cat [�����ַ���] 
			count_characters [�ַ�����] 
			count_paragraphs [�������] 
			count_sentences [�������] 
			count_words [�������] 
			*date_format [��ʽ������] 
			*default [Ĭ��ֵ] 
			escape [ת��] 
			indent [����] 
			*lower [Сд] 
			*nl2br [���з��滻�� <br />] 
			regex_replace [�����滻] 
			*replace [�滻] 
			spacify [���] 
			string_format [�ַ�����ʽ��] 
			strip [ȥ��(����ո�)] 
			strip_tags [ȥ��html��ǩ] 
			*truncate [��ȡ] 
			*upper [��д] 
			wordwrap [�п�Լ��] 

	2. �Զ��������(���ò���ļ���ʽ):
		2.1 ��smartyģ���libs/plugins/Ŀ¼�´�����������
			�������ļ�����modifier.��������.php
			
			ע�⣺�����Զ���ĵĵ���������libs/plugins/Ŀ¼�£���Ҫʹ������Smarty�ķ���׷�ӡ�
				  �磺 smarty->addPluginsDir("./libs/myplugins");//׷��һ�����Ŀ¼�ķ�ʽ
				  ע��������뻺��Ŀ¼
		2.2 ������ļ���ĺ�������
				function smarty_modifier_������������(�����б�...){ //..... }
	 
			���磺	
			/**
			 * �Զ�����������ַ�����ȡ����
			 * ������
			 *    $str:��ʾ����ȡ���ַ���
			 *    $len:�����ִ��ĳ���ֵ��Ĭ��ֵ��10
			 */
			function smarty_modifier_mystr($str,$len=10){
				if(strlen($str)>$len){
				   return substr($str,0,$len)."...";
				}else{
				   return $str;
				}
			}
			ע�⣺��ʹ���ǣ�Ҫ�������Ĳ���˳������
		2.3 ʹ��{$str|��������}

	 ��ϰ���Զ���һ����������myfont��$str,$size,$color��
			�磺{$str|myfont:7:"red"}  =>����� <font size="7" color="red">$str</font>
	
	3. �Զ��������(����ע���������ʽ)��
		��������ķ����⻹��һ����ʽ���Զ���һ�������ĵ�����
		ʹ��Smarty��һ��������registerPlugin("modifier","��������", "��ָ���ĺ�����");
		���磺$smarty->registerPlugin("modifier","mystrlen","strlen");//ע��һ���������ĺ�����
			  ʹ�ã�{$str|mystrlen} //���str�ִ��ĳ���

	4. ��ϵ�������
		{$articleTitle}
		{$articleTitle|upper|spacify}
		{$articleTitle|lower|spacify|truncate}
		{$articleTitle|lower|truncate:30|spacify}
		{$articleTitle|lower|spacify|truncate:30:". . ."}


�ġ�Smarty�ĺ���		  
----------------------------------------------------------------
	��ʽ��{������ ����1="ֵ1" ����2="ֵ2" }
		  {/������}
	
	1. Smarty���õĺ���
		*{$var=}  ��дģ���ж��������ͬassign����{$name='Bob'}{$user.name="Bob"}{$users[]="Bob"} 
		{append} ��ģ��ִ���ڼ佨����׷��ģ��������顣
		*{assign} ��ģ���ж��岢����������ֵ
		{block} ��������һ��������ģ��̳�Դ����
		{call} ��������{function}��ǩ�����ģ�庯��
		{capture} ��������ģ����������ݲ�����洢��һ������������ǽ����������ҳ�档
		*{config_load} ���������ļ��������������ļ��м���config������#variables#����ģ�档 
		{debug} ��ת�����Կ���ҳ�档
		{extends} ��ǩ����ģ��̳�����ģ��Ը�ģ��ļ̳С�
		*{for} �򵥵�ѭ��
		*{foreach},{foreachelse} 
			��ʽ��{foreach $list as [$k=>]$v}
						//���$k / $v
					
				  {/foreach}
		{function} ������ģ���д�����������������ò������һ���������ǡ�
		*{if},{elseif},{else} 
		*{include} ��������ģ��
		{include_php} ��Smarty�°汾���ѱ����������������Լ���д��php�ű������������������ɣ�
		{insert} ��ǩ������{include}��ǩ����֮ͬ���Ǽ�ʹ��caching��{insert}������������Ҳ���ᱻ���棬ÿ�ε���ģ�嶼��ִ��{insert}�� 
			�����Կ��Թ㷺Ӧ���ڹ������ͶƱ��ʵʱ����Ԥ�������������������Ϣ������
		{ldelim},{rdelim} ����ת��ģ�涨�����Ĭ��ֵΪ��{���͡�}����
		*{literal} ��ǩ�����ڵ����ݽ���������˼���������Ե�������javascript/css�����Χ
		{nocache} ������ֹģ��黺�棬ÿ��{nocache}Ӧ��{/nocache}�ɶԳ��֡�
		{php} �ѱ�Smarty���ã���Ӧ��ʹ�á����������Լ���д��php�ű������������������ɣ�
		*{section},{sectionelse} 
		{while} 

	
	2. Smarty��չ������Smarty�Զ���ģ�
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

	3. �Զ��庯��
		3.1 ʹ�ö��庯�����ʹ��
			
			
		3.2 ʹ��ע�ắ����ʽ
			//ע��
			��ʽ��$smarty->registerPlugin("function","ע�����","������");
			�磺
			$smarty->registerPlugin("function","fundemo","demo");  
			function demo(){
				return "<h3>ע��ʽ�Զ��庯������</h3>";
			}
			$smarty->registerPlugin("function","mytime","time"); 
			ʹ�ã�
			<{fundemo}>
			<{mytime}>
	
	  4. �����ģ����ʹ���Զ���ĺ�����
		��һ�֣�ʹ��register_functionע�ắ���ķ�ʽ���ص������ĳЩģ���ʹ��
		   ��PHP�ļ��У�
			//�Զ��庯��
			function myfun($a){
			  if(empty($a[color])){
				$a[color]="#FFFFFF";
			  }
			  if(empty($a[size])){
				$a[size]=4;
			  }
			  echo "<font color='{$a[color]}' size='{$a[size]}'>#####################</font><br/>";
			}
				//ע�ắ��
			$tpl->register_function("fun","myfun");
			��ģ���У�ʹ��
			<{fun color="red" size=7 }>
			<{fun color="blue" size=5 }>
			<{fun color="green" size=3 }>
			<{fun}>
		
		 �ڶ��ַ�ʽ������Samrty���ʽ�Ķ��庯�����ص㲻��ע�ᣬ��������ģ��ҳ������ʹ�á�
		��Samrtyģ���libs/plugins/Ŀ¼�¶��壺
		   ע�⣺1.�ļ���������: function.�Զ��庯����.php
				�磺function.mytable.php
				 2.���ļ�������������ǣ� funciton smarty_function_�Զ��庯����(������,&$smarty){...}
			�磺
				<?php
				   /**
					* �Զ�����Ʊ����mytable��
					* ����$p������
					*   rows���������. Ĭ��2��
					*   cols�����������Ĭ��2��
					*   content�����������ݣ�Ĭ�ϣ�"*"
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
					   //��ʼ���Ʊ��
					   $table ="<table width=60% border=1>";
					   for($i=0;$i<$p[rows];$i++){ //ѭ����
					  $table.="<tr>";
					  for($j=0;$j<$p[cols];$j++){ //ѭ����
						 $table.="<td>{$p[content]}</td>";
					  }
					  $table.="</tr>";
					   }
					   $table.="</table>";

					   return $table;
				   }
				?>

			   3. ʹ�ã�<{mytable rows="10" cols="10" content="###"}><br/>
					<{mytable}>
          
	5. �Զ����״������
		<?php
			//�����״������
			function do_translation ($params, $content, $smarty, &$repeat, $template){
				if (isset($content)){    
					$lang = $params["lang"];    // do some translation with $content
					return $translation;  
				}
			}
			
			//ע�ᵽSmartyģ����
			$smarty->registerPlugin("block","translate", "do_translation");
		?>   
		
		ʹ��
		Where the template is:{translate lang="br"}Hello, world!{/translate}
		
------------------------------------------------------------------------------------------

<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
    </head>
    <body>
        {capture name="mycapture"}
            ����һ�α��������Ϣ
        {/capture}
        <h2>{$title}</h2>
        <h4>��ǰʱ�����{$smarty.now} : {time()}</h4>
        <h4>��ǰʱ��������ڸ�ʽ��{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"} : {date("Y-m-d H:i:s",time())}</h4>
        <h4>��ģ�������������{$smarty.const.PI}</h4>
        <h4>��ģ�������GET�е�id��{$smarty.get.id}</h4>
        <h4>��ģ�������POST�е�name��{$smarty.post.name}</h4>
        <h4>��ģ�������coookie�е�loginuser��{$smarty.cookies.loginuser}</h4>
        <h4>��ģ�������session�е�vipuser��{$smarty.session.vipuser}</h4>
        <h4>������������Ϣ��{$smarty.capture.mycapture}</h4>
        <br/>
        <h4>��ǰģ������{$smarty.template}</h4>
        <h4>��ǰģ��Ŀ¼����{$smarty.current_dir}</h4>
        <h4>��ǰSmartyģ��汾�ţ�{$smarty.version}</h4>
        <h4>��ǰSmartyģ������Ҷ������{$smarty.ldelim} {$smarty.rdelim}</h4>
    </body>
</html>

<?php
session_start(); //����session�Ự
//Smartyʵ�������ļ�

//1.����Smarty�ĳ�ʼ���ļ�
require("init.php");

//2. ��smarty�з�����Ϣ
$smarty->assign("title","Smartyģ��ʵ��--��������");

//����һ������
define("PI",3.14); 
//��get�з���Ϣ
$_GET['id']=100;
//��POST�з�����Ϣ
$_POST['name']="zhangsan";
//��Cookie�з�����Ϣ
setCookie("loginuser","����",time()+1200,"/");
//��Session������Ϣ
$_SESSION['vipuser']="����";


//3. ����ģ�岢���
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
        {* ����һ���ִ� *}
        {$str = "this is used to capitalize the first letter of all words in a variable"}
        {$name = "zhangsan"} 
		{$content="<b><a href='2.php'>�ҵ�html��Ϣ</a></b>"}
        <ul>
            <li>ԭ�ִ�ֵ��{$str}</li>
            <li>���ַ���д��{$str|capitalize}</li>
            <li>ͳ���ַ�����{$str|count_characters}</li>
            <li>ͳ���ַ����ȣ�{strlen($str)}</li>
            <li>���㵥�ʸ�����{$str|count_words}</li>
            <li>�����ִ���{$name|cat:"��ã�"}</li>
            <li>�����ִ���{$name}��ã�</li>
            <li>���ڸ�ʽ����{$smarty.now|date_format:"%Y-%m-%d"}</li>
            <li>Ĭ��ֵ����ã�{$name|default:"�ο�"}</li> 
            <li>��ʽ�����HTML���ݣ�{$content|escape}</li> 
            <li>����6�ո������{$name|indent:6:"&nbsp;"}</li> 
			{$str="Hello World!"}
            <li>ԭ�ִ���{$str}</li>
            <li>��д��{$str|upper}</li>
            <li>Сд��{$str|lower}</li>  
            <li>ȥ���ո���д��{$str|replace:" ":""|upper}</li> 
            {$str='<font color="red">This strips out markup tags, basically anything between </font>'}
            <li>ԭ�ִ���{$str}</li>
            <li>ɾ����Ǻ����ִ���ȡ��{$str|strip_tags|truncate:14:"..."}</li>
			
        </ul>
    
    </body>
</html>

<?php
session_start(); //����session�Ự
//Smartyʵ�������ļ�

//1.����Smarty�ĳ�ʼ���ļ�
require("init.php");

//2. ��smarty�з�����Ϣ
$smarty->assign("title","Smartyģ��ʵ��--����������");

//3. ����ģ�岢���
$smarty->display("2.html");
?>

----------------------------------------------------------------------------------------
{�Զ���Smarty��� libs/plugins/modifier.mysubstr.php}
<?php
//�Զ������������ʵ�������ִ���ȡ

function smarty_modifier_mysubstr($string, $length){
    return mb_substr($string,0,$length,"utf-8");
}
?>
{/ֱ�ӷŵ���������}

<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
    </head>
    <body>
        <h2>{$title}</h2>
        {*ʹ���Զ���ı�����������ʵ�����ݵ����������*}
        ��ѡ��:{$citydata|outselect:"cid":3}
        <br/><br/>
        
        {*ʹ���Զ������������������ֳ���*}
        {$str="�Զ������������"}
        ���ȣ�{$str|mystrlen:"utf-8"} <br/>
        ���ȣ�{$str|count_characters} <br/>
        
        <br/><br/>
        {*ʹ���Զ���ı���������ʵ�������ִ���ȡ*}
        {$str="�Զ������������ʵ�������ִ���ȡ"}
        ԭ�ִ���{$str} <br/>
        ��8����{$str|mysubstr:8} <br/>
        
    </body>
</html>

<?php
session_start(); //����session�Ự
//Smartyʵ�������ļ�

//1.����Smarty�ĳ�ʼ���ļ�
require("init.php");

//2. ��smarty�з�����Ϣ
$smarty->assign("title","Smartyģ��ʵ��--�Զ������������");

//����Ϣ���õ�ģ����
$smarty->assign("citydata",array(1=>"����",2=>"�Ϻ�",3=>"����",4=>"����"));

//�������Զ����fun������outselect��ע��ģ������Ϊ����ʹ��
$smarty->registerPlugin("modifier","outselect","fun");

//��ϵͳmb_strlen������mystrlen��ע�ᵽģ������Ϊ����������ʹ��
$smarty->registerPlugin("modifier","mystrlen","mb_strlen");

//3. ����ģ�岢���
$smarty->display("3.html");


//�Զ��������������
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
        {*appendʹ��(ʵ�����鶨���׷��ֵ)*}
        {append var="stu" value="zhangsan" index="name"}
        {append "stu" 20 index="age"}
        �������stu��ֵ��{$stu.name}:{$stu.age}
        
        <br/><br/>
        {*��ģ����ʵ����ģ����ñ�������*}
        {$name="lisi"} {*��д*} 
        ȡֵ��{$name}
        {assign var="id" value="200"} {*��׼д*}
        ȡֵ��{$id}
        
        <br/><br/>
        {function name="fun"}
            �ҵ��Զ���function����
        {/function}
        
        {call "fun"}
        
        
    </body>
</html>

<?php
session_start(); //����session�Ự
//Smartyʵ�������ļ�

//1.����Smarty�ĳ�ʼ���ļ�
require("init.php");

//2. ��smarty�з�����Ϣ
$smarty->assign("title","Smartyģ��ʵ��--���ú���");
//$smarty->assign("name","lisi");

//3. ����ģ�岢���
$smarty->display("4.html");
?>


===========================================================================================
�ߡ�Smarty�����Ӧ��
 	���û���
(1)$smarty->caching=true;          //��������
(2)$smarty->cache_dir=��./cache��;//���û���Ŀ¼
(3)$smarty->cache_lifetime=7*24*60*60;//���û���ʱ��
(4)$smarty->display(��index.html��); 

 	ÿ��ҳ��������
����:�������µ�ʱ��ʹ��ͬһģ��ʱ�����ɲ�ͬ��ҳ����ʾ������������棬��ͨ��ͬһ��ģ�����ɵĶ�ƪ����(���ʵ��)����Ҫ�����棬smartyʵ������Ƚ����ף�ֻ��Ҫ�ڵ���display()����ʱ��ͨ���ڵڶ�����ѡ�������ṩһ��ֵ�����ֵ��Ϊÿһƪ����(��ʵ��)ָ����һ��Ψһ�ı�ʶ�����м�����ͬ�ı�ʶ�����м�����ͬ�Ļ��档
    ���磺$smarty->display(��news.html��,$_GET[��newid��]);

 	�����ж�ĳ���ļ��������ˣ�
(1) $smarty->is_cached(��index.html��);
(2) $smarty->is_cached(��news.html��,$_GET[��newsid��]);

 	��������
(1) $smarty->clear_all_cache(); //������л���
(2) $smarty->clear_cache(��index.tpl��); // ���ĳһģ��Ļ���
(3) $smarty->clear_cache(��index.tpl��,cache_id); // ���ָ������ŵĻ���

 	�ֲ�����
1.	insert����Ĭ���ǲ������,����������Բ����޸�
2.	ģ���ļ��У�
<div>{insert name=��get_time��}</div>
3.	php�ļ��У�
function insert_get_time(){
		return date(��Y-m-d H:i:s��);
}
4.	ע��:������ǰ׺������insert


-----------------------------------------------------------------------------------------


�塢Smarty�Ļ��漼��
----------------------------------------------
	1. ����Ļ����������������棩
		$smarty->caching=true; //��������
		$smarty->cache_lifetime =5;//����ʱ��5��
	
	2. �ֲ�������
		ʹ��{nocache}����
		
		<h3>����ʱ�䣺<{$smarty.now}><h3>
		<{nocache}>
			<h3>������ʱ�䣺<{$smarty.now}><h3>
		<{/nocache}>
		<h3>����ʱ�䣺<{$smarty.now}><h3>
		
	3. �Ż����棨�������ײ���ʹ�û��棩
		
		 //��ȡ���ݿ���Ϣ������5�롣(��6.html���Ǻ���Ч�����ļ�ʱ��ִ�����ݲ�ѯ)
		 if(!$smarty->isCached("6.html")){
			$m = new Model("stu");
			$stulist = $m->findAll(); //��ȡ����ѧ����Ϣ
			$smarty->assign("stulist",$stulist);
			$smarty->assign("time",time());
		  }
 
 $smarty->display("6.html");
		
	4. ͬһ��ģ�壬������ͬ���棨�����������ҳ�Ļ��棨��Ϊģ��ֻ��һ������

	 //��ȡ���ݿ���Ϣ������5�롣(��6.html���Ǻ���Ч�����ļ�ʱ��ִ�����ݲ�ѯ)
	 if(!$smarty->isCached("6.html",$_SERVER["REQUEST_URI"])){
		$m = new Model("stu");
		$stulist = $m->findAll(); //��ȡ����ѧ����Ϣ
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
        {*ģ����� debug*}
        ʹ��ģ���е�forѭ�����1��10��ֵ��
        {for $i=1 to 10}
            {$i}
        {/for}
        <br/><br/>
        ʹ��ģ���е�forѭ�����0��10��ż��ֵ��
        {for $i=0 to 10 step 2}
            {$i}
        {/for}
        
        <hr/>
        ʹ��foreach��������a�����ֵ��
        {foreach $a as $v}
            {$v}
        {/foreach}
        <br/>
        ʹ��foreach����ģ���еĶ�ά����:<br/>
        {foreach $list as $stu}
            {$stu@iteration}:{$stu.name}:{$stu.age}:{$stu.sex}<br/>
        {foreachelse}
            û������
        {/foreach}
        <br/>�������������{$stu@total}����

        <hr/>
        ʹ��section�������ݣ�
        {section name="i" loop=$a}
            {$a[i]}
        {/section}
        <br/>
        ʹ��section����ģ���еĶ�ά����:<br/>
        {section name='sid' loop=$list}
            {$smarty.section.sid.iteration}:
            {$list[sid].name}:
            {$list[sid].age}:
            {$list[sid].sex}<br/>
        {/section}
    </body>
</html>

<?php
//������ļ�

//1.����smarty��ʼ���ļ�
require("init.php");

//2. ��ģ���з�����Ϣ
$smarty->assign("title","Smartyģ��ʵ��--���ú���");

$smarty->assign("a",array(10,20,30,40));

$list = array(
    array("name"=>"zhangsan","age"=>20,"sex"=>"man"),
    array("name"=>"lisi","age"=>21,"sex"=>"woman"),
    array("name"=>"wangwu","age"=>22,"sex"=>"woman"),
    array("name"=>"zhaoliu","age"=>23,"sex"=>"man"),
);
$smarty->assign("list",$list);


//3. ����ģ�����
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
        ʹ��php�еĺ�����ȡʱ�����{time()}<br/>
        ʹ���Զ���ģ�庯����ȡʱ�����{mytime}<br/>
        <hr/>
        
        ʹ���Զ���ģ�庯��ʵ���������:
        <br/><br/>
        {mytable name="$list" a="b" c="d"}
    </body>
</html>

<?php
//������ļ�

//1.����smarty��ʼ���ļ�
require("init.php");

//2. ��ģ���з�����Ϣ
$smarty->assign("title","Smartyģ��ʵ��--�Զ���ģ���еĺ���");

//��ϵͳ����time��mytime��ע�ᵽģ������Ϊģ�庯��ʹ��
$smarty->registerPlugin("function","mytime","time");

$list = array(
    array("name"=>"zhangsan","age"=>20,"sex"=>"man"),
    array("name"=>"lisi","age"=>21,"sex"=>"woman"),
    array("name"=>"wangwu","age"=>22,"sex"=>"woman"),
    array("name"=>"zhaoliu","age"=>23,"sex"=>"man"),
);
$smarty->assign("list",$list);

//���Զ��庯��fun��mytable��ע�ᵽģ������Ϊģ�庯��ʹ��
$smarty->registerPlugin("function","mytable","fun");

//3. ����ģ�����
$smarty->display("2.html");


//�Զ���һ��ģ�庯��ʵ�����ݵı�����
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
//������ļ�

//1.����smarty��ʼ���ļ�
require("init.php");

//2. ��ģ���з�����Ϣ
$smarty->assign("title","Smartyģ��ʵ��--ģ��̳�");

$list = array(
    array("name"=>"zhangsan","age"=>20,"sex"=>"man"),
    array("name"=>"lisi","age"=>21,"sex"=>"woman"),
    array("name"=>"wangwu","age"=>22,"sex"=>"woman"),
    array("name"=>"zhaoliu","age"=>23,"sex"=>"man"),
);
$smarty->assign("list",$list);

//3. ����ģ�����
$smarty->display("3.html");
?>

---------------------------------------------------------------------------------------
�޸�HTML
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>{$title}</title>
    </head>
    <body>
        <center>
            {include file="stu2/menu.html"}
            
            <h3>�༭��Ϣ</h3>
            <form action="stu2.php?a=update" method="post">
                <input type="hidden" name="id" value="{$ob.id}"/>
            <table width="280" border="0">
                <tr>
                    <td align="right">������</td>
                    <td><input type="text" name="name" value="{$ob.name}"/></td>
                </tr>
                <tr>
                    <td align="right">���䣺</td>
                    <td><input type="text" name="age" value="{$ob.age}"/></td>
                </tr>
                <tr>
                    <td align="right">�Ա�</td>
                    <td><input type="radio" name="sex" value="m" {if $ob.sex=="m"}checked{/if}/>��
                        <input type="radio" name="sex" value="w" {if $ob.sex=="w"}checked{/if}/>Ů</td>
                </tr>
                <tr>
                    <td align="right">�༶��</td>
                    <td><input type="text" name="classid"  value="{$ob.classid}"/></td>
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

<?php
//ѧ����Ϣ�����ļ�(���ļ����ǽ�������еĿ�����C)

//1. ���������Ϣ
require("init.php");
require("./configs/config.php");
require("./model/Model.class.php");

//2. ʵ����Model��
$mod = new Model("stu");
$smarty->assign("title","ѧ����Ϣ����");
//3. ���ݲ���a��ִֵ�ж�Ӧ�Ĳ���
switch($_GET['a']){
    case "insert":  //ִ�����
        $m = $mod->insert();
        if($m>0){
            $smarty->assign("info","��ӳɹ���");
        }else{
            $smarty->assign("info","���ʧ�ܣ�");
        }
        $smarty->display("stu2/info.html");
        //�������
        $smarty->clearCache("stu2/index.html");
        break;
    case "del": //ִ��ɾ��
        $m = $mod->delete($_GET['id']);
        $smarty->assign("info","�ɹ�ɾ��{$m}�����ݣ�");
        $smarty->display("stu2/info.html");
        //�������
        $smarty->clearCache("stu2/index.html");
        $smarty->clearCache("stu2/edit.html",$_GET['id']); //������޸���Ϣ����
        break;
    case "update":  //ִ���޸�
        $m = $mod->update();
        if($m>0){
            $smarty->assign("info","�޸ĳɹ���");
        }else{
            $smarty->assign("info","�޸�ʧ�ܣ�");
        }
        $smarty->display("stu2/info.html");
        //�������
        $smarty->clearCache("stu2/index.html"); //���ҳ����
        $smarty->clearCache("stu2/edit.html",$_POST['id']); //������޸���Ϣ����
        break;
    case "add": //������ӱ�
        $smarty->display("stu2/add.html");
        break;
    case "edit": //�����޸ı�
        //����smarty����
        $smarty->caching=true;
        //�ж��Ƿ����л���
        if(!$smarty->isCached("stu2/edit.html",$_GET['id'])){
            //��ȡ�޸���Ϣ
            $ob = $mod->find($_GET['id']);
            $smarty->assign("ob",$ob);
        }
        $smarty->display("stu2/edit.html",$_GET['id']);
        break;
    case "index": //���
    default:
        //����smarty����
        $smarty->caching=true;
        //�ж��Ƿ����л���
        if(!$smarty->isCached("stu2/index.html")){
            $list = $mod->select();
            $smarty->assign("list",$list); //����ѯ������õ�ģ����
        }
        $smarty->display("stu2/index.html");
        break;
}   
?>