  MySQL
һ�����
   ���ݣ� data
   ���ݿ⣺ DB
   ���ݿ����ϵͳ��DBMS
   ���ݿ�ϵͳ��DBS
   MySQL�����ݿ�  
   mysql���ͻ�������������ӷ������sqlָ�
   SQL���ṹ����ѯ���� ������MySQL֧�������
   SQL���Է�Ϊ4�����֣�DDL��DML��DQL��DCL
   
�����������ݿ⣺
   mysql -h ������ -u �û���  -p����  ����
   
   C:\>mysql  --���������˺ź������½��������
   C:\>mysql -h localhost -u root -proot   --����root�˺ź�root�����½��������
   C:\>mysql -u root -p   --�Ƽ���ʽĬ�ϵ�½����
	 Enter password: ****

   C:\>mysql -u root -p lamp61  --ֱ�ӽ���lamp61���ݿ�ķ�ʽ��½
   
������Ȩ��
	��ʽ��grant ������� on ����.���� to �˺�@��Դ identified by '����';
	
	--ʵ��������zhangsan�˺ţ�����123����Ȩlamp61�������б����/ɾ/��/������,��Դ�ز���
	mysql> grant select,insert,update,delete on lamp61.* to zhangsan@'%' identified by '123';
	Query OK, 0 rows affected (0.00 sec)
	

�ġ�SQL�Ļ�������
	mysql>show databases; 	--�鿴��ǰ�û��µ��������ݿ�
	mysql>create database [if not exists] ���ݿ���; --�������ݿ�
	mysql> use test;	--ѡ�����test���ݿ�
	mysql> drop database ���ݿ���;  --ɾ��һ�����ݿ� 
	
	mysql> show tables; --�鿴��ǰ���µ����б��
	mysql> select database();  --�鿴��ǰ���ڵ����ݿ�
	mysql> desc tb1;  --�鿴tb1�ı�ṹ��                                                                      
	mysql> create table demo(	--����demo���
		-> id int unsigned auto_increment primary key,
		-> name varchar(16) not null,
		-> age int,
		-> sex enum('w','m') not null default 'm');
	Query OK, 0 rows affected (0.05 sec)

	mysql> desc demo;  --�鿴��ṹ
	+-------+---------------+------+-----+---------+-------+
	| Field | Type          | Null | Key | Default | Extra |
	+-------+---------------+------+-----+---------+-------+
	| name  | varchar(16)   | NO   |     | NULL    |       |
	| age   | int(11)       | YES  |     | NULL    |       |
	| sex   | enum('w','m') | NO   |     | m       |       |
	+-------+---------------+------+-----+---------+-------+
	3 rows in set (0.00 sec)
	
	mysql>drop table if exists mytab;  -- ����ɾ��mytab���
	
	
	--���һ������
	mysql> insert into demo(name,age,sex) values('zhangsan',20,'w');
	Query OK, 1 row affected (0.00 sec)
	
	mysql> insert into demo values('lisi',22,'m'); --��ָ���ֶ������������
	Query OK, 1 row affected (0.00 sec)
	
	mysql> insert into demo(name,age) values('wangwu',23); --ָ�������ֶ������������
	Query OK, 1 row affected (0.00 sec)
	
	--�����������
	mysql> insert into demo(name,age,sex) values('aaa',21,'w'),("bbb",22,'m');
	Query OK, 2 rows affected (0.00 sec)
	Records: 2  Duplicates: 0  Warnings: 0
	
	mysql> select * from demo; --��ѯ����
	
	mysql> update demo set age=24 where name='aaa';  --�޸�
	Query OK, 1 row affected (0.02 sec)
	Rows matched: 1  Changed: 1  Warnings: 0
		
	mysql> delete from demo where name='bbb';  --ɾ��
	Query OK, 1 row affected (0.00 sec)
	
	
	mysql>\h   -- ��ݰ���
	mysql>\c   -- ȡ����������
	mysql>\s   -- �鿴��ǰ���ݿ��״̬
	mysql>\q   -- �˳�mysql������
	
�塢 MySQL���ݿ���������ͣ�

	MySQL���������ͷ�Ϊ�Ĵ��ࣺ��ֵ���͡��ִ����͡��������͡�NULL��
	
	5.1 ��ֵ���ͣ�
		*tinyint(1�ֽ�)
		smallint(2�ֽ�)
		mediumint(3�ֽ�)
		*int(4�ֽ�)
		bigint(8�ֽ�)
		*float(4�ֽ�)   float(6,2)
		*double(8�ֽ�)  
		decimal(�Զ���)�ִ�����ֵ
		
	 5.2 �ִ�����
		��ͨ�ִ�
		*char  �����ִ�   	 char(8)  
		*varchar �ɱ��ִ� varchar(8)
		
		����������
		tinyblob
		blob
		mediumblob
		longblob
		
		�ı�����
		tinytext
		*text      ������<textarea></textarea>
		mediumtext
		longtext
		
		*enumö��
		set����
		
	5.3 ʱ����������ͣ�
		date  ������
		time  ʱ����
		datatime ������ʱ����
		timestamp ʱ���
		year ��
	
	5.4 NULLֵ
		NULL��ζ�š�û��ֵ����δֵ֪��
		���Բ���ĳ��ֵ�Ƿ�ΪNULL
		���ܶ�NULLֵ������������
		��NULLֵ�����������㣬��������NULL
		0��NULL����ζ�ż٣�����ֵ����ζ����

	MySQL���������
		�����������+ - * / % 
		�Ƚ��������= > < >= <= <> != 
		���ݿ����еıȽϣ�in,not in, is null,is not null,like, between and 
		�߼��������and or not
	
 ���� ����ֶ�Լ����
		unsigned �޷���(����)
		zerofill ǰ�������
		auto_increment  ����
		default	Ĭ��ֵ
		not null  �ǿ�
		PRIMARY KEY ���� ����null�����ظ���
		unique Ψһ��   ������Ϊnull�����ظ���
		index ��������
		
��: ��������ʽ��
	 create table ����(
	   �ֶ��� ���� [�ֶ�Լ��],
	   �ֶ��� ���� [�ֶ�Լ��],
	   �ֶ��� ���� [�ֶ�Լ��],
	   ...
	  );

	mysql> create table stu(
		-> id int unsigned not null auto_increment primary key,
		-> name varchar(8) not null unique,
		-> age tinyint unsigned,
		-> sex enum('m','w') not null default 'm',
		-> classid char(6)
		-> );
	Query OK, 0 rows affected (0.05 sec)

	
	mysql> desc stu;
	+---------+---------------------+------+-----+---------+----------------+
	| Field   | Type                | Null | Key | Default | Extra          |
	+---------+---------------------+------+-----+---------+----------------+
	| id      | int(10) unsigned    | NO   | PRI | NULL    | auto_increment |
	| name    | varchar(8)          | NO   | UNI | NULL    |                |
	| age     | tinyint(3) unsigned | YES  |     | NULL    |                |
	| sex     | enum('m','w')       | NO   |     | m       |                |
	| classid | char(6)             | YES  |     | NULL    |                |
	+---------+---------------------+------+-----+---------+----------------+
	5 rows in set (0.00 sec)

	mysql> show create table stu\G  --�鿴��������
	*************************** 1. row ***************************
		   Table: stu
	Create Table: CREATE TABLE `stu` (
	  `id` int(10) unsigned NOT NULL auto_increment,
	  `name` varchar(8) NOT NULL,
	  `age` tinyint(3) unsigned default NULL,
	  `sex` enum('m','w') NOT NULL default 'm',
	  `classid` char(6) default NULL,
	  PRIMARY KEY  (`id`),
	  UNIQUE KEY `name` (`name`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8
	1 row in set (0.00 sec)

	mysql>
	mysql> insert into stu(id,name,age,sex,classid) values(1,'zhangsan',20,'m','lamp
	61');
	Query OK, 1 row affected (0.00 sec)

	mysql> insert into stu(name,age,sex,classid) values('lisi',22,'w','lamp61');
	Query OK, 1 row affected (0.00 sec)

	mysql> insert into stu(name,age,classid) values('wangwu',21,'lamp61');
	Query OK, 1 row affected (0.00 sec)

	mysql> insert into stu values(null,'qq',24,'w','lamp62');
	Query OK, 1 row affected (0.00 sec)

	mysql> insert into stu values(null,'aa',20,'m','lamp62'),(null,'bb',25,'m','lamp
	63');
	Query OK, 2 rows affected (0.00 sec)
	Records: 2  Duplicates: 0  Warnings: 0

	mysql> select * from stu;
	+----+----------+------+-----+---------+
	| id | name     | age  | sex | classid |
	+----+----------+------+-----+---------+
	|  1 | zhangsan |   20 | m   | lamp61  |
	|  2 | lisi     |   22 | w   | lamp61  |
	|  3 | wangwu   |   21 | m   | lamp61  |
	|  4 | qq       |   24 | w   | lamp62  |
	|  5 | aa       |   20 | m   | lamp62  |
	|  6 | bb       |   25 | m   | lamp63  |
	+----+----------+------+-----+---------+
	6 rows in set (0.00 sec)
	
	
�ˡ��޸ı�ṹ
-------------------------------------
    ��ʽ�� alter table ���� action������ѡ�;
     ����ѡ�
        1. ����ֶΣ�alter table ���� add �ֶ�����Ϣ
            ���磺
                -- ��user������׷��һ��num�ֶ� ����Ϊint not null
                mysql> alter table user add num int not null;
                
                -- ��user���email�ֶκ����һ��age�ֶΣ�����int not null default 20��
                mysql> alter table user add age int not null default 20 after email;

                -- ��user�����ǰ�����һ��aa�ֶ�����Ϊint����
                mysql> alter table user add aa int first;

        2. ɾ���ֶΣ�alter table ���� drop ��ɾ�����ֶ���
            ���磺-- ɾ��user���aa�ֶ�
                 mysql> alter table user drop aa;
	
        3. �޸��ֶΣ�alter table ���� change[modify] ���޸ĺ���ֶ���Ϣ
            ���У�change�����޸��ֶ����� modify ���޸�
            ���磺
            -- �޸�user����age�ֶ���Ϣ�����ͣ�����ʹ��modify�ؼ��ֵ�Ŀ�Ĳ��޸��ֶ�����
            mysql> alter table user modify age tinyint unsigned not null default 20;
            -- �޸�user���num�ֶθ�Ϊmm�ֶβ������Ĭ��ֵ��ʹ��change���Ը��ֶ�����
            mysql> alter table user change num mm int not null default 10;
        
        4. ��Ӻ�ɾ������
            -- Ϊuser���е�name�ֶ����Ψһ��������������Ϊuni_name;
            mysql> alter table user add unique uni_name(name);
            -- Ϊuser���е�email�ֶ������ͨ������������Ϊindex_eamil
            mysql> alter table user add index index_email(email);
            -- ��user����index_email������ɾ��
            mysql> alter table user drop index index_email;
	
        5. ���ı����ƣ�
            ALTER TABLE �ɱ��� RENAME AS �±���

        6. ����AUTO_INCREMENT��ʼֵ:
            ALTER TABLE ������ AUTO_INCREMENT=1
        
        7. ���ı����ͣ�
            ALTER TABLE ������ ENGINE="InnoDB"
        
    MySQL���ݿ��еı�����һ�㳣�����֣�MyISAM��InnoDB
    ����MyISAM���͵������ļ�������frm(�ṹ)��MYD�����ݣ���MYI��������
          MyISAM�����еı������� ɾ ���ٶȿ죬��֧������û��InnoDB��ȫ��
          
          InnoDB���͵������ļ�ֻ��һ�� .frm
          InnoDB���͵ı������� ɾ ���ٶ�û��MyISAM�Ŀ죬��֧��������԰�ȫ��
        
�š����ݵ�DML������������ݣ��޸����ݣ�ɾ������
----------------------------------------------------------
    1. �������
        ��ʽ�� insert into ����[(�ֶ��б�)] values(ֵ�б�...);
        --��׼��ӣ�ָ�������ֶΣ��������е�ֵ��
        mysql> insert into stu(id,name,age,sex,classid) values(1,'zhangsan',20,'m','lamp93');
        Query OK, 1 row affected (0.13 sec)

        mysql>
        --ָ�������ֶ����ֵ
        mysql> insert into stu(name,classid) value('lisi','lamp93');
        Query OK, 1 row affected (0.11 sec)

        -- ��ָ���ֶ����ֵ
        mysql> insert into stu value(null,'wangwu',21,'w','lamp93');
        Query OK, 1 row affected (0.22 sec)

        -- �������ֵ
        mysql> insert into stu values
            -> (null,'zhaoliu',25,'w','lamp94'),
            -> (null,'uu01',26,'m','lamp94'),
            -> (null,'uu02',28,'w','lamp92'),
            -> (null,'qq02',24,'m','lamp92'),
            -> (null,'uu03',32,'m','lamp93'),
            -> (null,'qq03',23,'w','lamp94'),
            -> (null,'aa',19,'m','lamp93');
        Query OK, 7 rows affected (0.27 sec)
        Records: 7  Duplicates: 0  Warnings: 0
        
    2. �޸Ĳ�����
        ��ʽ��update ���� set �ֶ�1=ֵ1,�ֶ�2=ֵ2,�ֶ�n=ֵn... where ���� 
        
        -- ��idΪ11��age��Ϊ35��sex��Ϊmֵ
        mysql> update stu set age=35,sex='m' where id=11;
        Query OK, 1 row affected (0.16 sec)
        Rows matched: 1  Changed: 1  Warnings: 0

        -- ��idֵΪ12��14������ֵsex��Ϊm��classid��Ϊlamp92
        mysql> update stu set sex='m',classid='lamp92' where id=12 or id=14 --�ȼ�������
        mysql> update stu set sex='m',classid='lamp92' where id in(12,14);
        Query OK, 2 rows affected (0.09 sec)
        Rows matched: 2  Changed: 2  Warnings: 0
        
    3. ɾ������
         ��ʽ��delete from ���� [where ����]
         -- ɾ��stu����idֵΪ100������
        mysql> delete from stu where id=100;
        Query OK, 0 rows affected (0.00 sec)

        -- ɾ��stu����idֵΪ20��30������
        mysql> delete from stu where id>=20 and id<=30;
        Query OK, 0 rows affected (0.00 sec)

        -- ɾ��stu����idֵΪ20��30�����ݣ��ȼ�������д����
        mysql> delete from stu where id between 20 and 30;
        Query OK, 0 rows affected (0.00 sec)

        -- ɾ��stu����idֵ����200������
        mysql> delete from stu where id>200;
        Query OK, 0 rows affected (0.00 sec)
       
ʮ�����ݵ�DQL���������ݲ�ѯ
==============================================
    ��ʽ��
        select [�ֶ��б�]|* from ����
        [where ��������]
        [group by ��֧�ֶ� [having ������]]
        [order by ���� asc|desc]
        [limit ��ҳ����]
        
    mysql> select * from stu;
    +----+----------+-----+-----+---------+
    | id | name     | age | sex | classid |
    +----+----------+-----+-----+---------+
    |  1 | zhangsan |  20 | m   | lamp93  |
    |  2 | lisi     |  20 | m   | lamp93  |
    |  3 | wangwu   |  21 | w   | lamp93  |
    |  4 | zhaoliu  |  25 | w   | lamp94  |
    |  5 | uu01     |  26 | m   | lamp94  |
    |  6 | uu02     |  28 | w   | lamp92  |
    |  7 | qq02     |  24 | m   | lamp92  |
    |  8 | uu03     |  32 | m   | lamp93  |
    |  9 | qq03     |  23 | w   | lamp94  |
    | 10 | aa       |  19 | m   | lamp93  |
    | 11 | sad      |  35 | m   | lamp94  |
    | 12 | tt       |  25 | m   | lamp92  |
    | 13 | wer      |  25 | w   | lamp94  |
    | 14 | xx       |  25 | m   | lamp92  |
    | 15 | kk       |   0 | w   | lamp94  |
    +----+----------+-----+-----+---------+
    15 rows in set (0.00 sec)
    
    1. where������ѯ
    1. ��ѯ�༶Ϊlamp93�ڵ�ѧ����Ϣ
    mysql> select * from stu where classid='lamp93';
    
    2. ��ѯlamp93�ڵ�������Ϣ��sexΪm��
    mysql> select * from stu where classid='lamp93' and sex='m';
    
    3. ��ѯid��ֵ��10���ϵ�ѧ����Ϣ
    mysql> select * from  stu where id>10;
    
    4. ��ѯ������20��25���ѧ����Ϣ
    mysql> select * from stu where age>=20 and age<=25;
    mysql> select * from stu where age between 20 and 25;
    
    5. ��ѯ���䲻��20��25���ѧ����Ϣ
    mysql> select * from stu where age not between 20 and 25;
    mysql> select * from stu where age<20 or age>25;
    
    6. ��ѯidֵΪ1,8,4,10,14��ѧ����Ϣ
    select * from stu where id in(1,8,4,10,14);
    mysql> select * from stu where id=1 or id=8 or id=4 or id=10 or id=14;
    
    7. ��ѯlamp93��lamp94�ڵ�Ů����Ϣ
    mysql> select * from stu where classid in('lamp93','lamp94') and sex='w';
    mysql> select * from stu where (classid='lamp93' or classid='lamp94') and sex='w'
 

  2. MySQL�е�ͳ�Ʋ�ѯ��
  ----------------------------------------
     ͳ�ƺ������ۺϺ�������count()  sum()  max()  min()  avg();

    --ͳ��stu���е����������������ܺͣ�������䣬��С�����ƽ������
    mysql> select count(*),sum(age),max(age),min(age),avg(age) from stu;
    +----------+----------+----------+----------+----------+
    | count(*) | sum(age) | max(age) | min(age) | avg(age) |
    +----------+----------+----------+----------+----------+
    |       15 |      348 |       35 |        0 |  23.2000 |
    +----------+----------+----------+----------+----------+
    1 row in set (0.00 sec)
    
    --ͳ��lamp93�ڵ�ѧ�������������С���䣻   
    mysql> select count(*),max(age),min(age) from stu where classid="lamp93";
    +----------+----------+----------+
    | count(*) | max(age) | min(age) |
    +----------+----------+----------+
    |        5 |       32 |       19 |
    +----------+----------+----------+
    1 row in set (0.00 sec)
    
  3. ���飺group by  �ͷ�����������having
  ------------------------------------------------
    -- ���Ա����鿴
    mysql> select sex from stu group by sex;
    +-----+
    | sex |
    +-----+
    | m   |
    | w   |
    +-----+
    2 rows in set (0.00 sec)

    -- �鿴���༶����
    mysql> select classid from stu group by classid;
     
    -- ���Ա���鲢ͳ������
    mysql> select sex,count(*) from stu group by sex;

    -- ���༶���鲢ͳ������
    mysql> select classid,count(*) from stu group by classid;

    -- ͳ��lamp93�ڵ���Ů���������ˡ�
    mysql> select sex,count(*) from stu where classid='lamp93' group by sex;
   
    -- ���༶����ͳ��ÿ���༶��������Ҫ��ֻ���������4�����ϵ�
    mysql> select classid,count(*) from stu group by classid having count(*)>4;
  
    -- ���༶����ͳ��ÿ���༶��������Ҫ��ֻ���������4�����ϵģ�����ʹ��num������
    mysql> select classid,count(*) num from stu group by classid having num>4; 
    
    
  4. ����order by �ֶ���[asc|desc]   asc����Ĭ�ϣ�  desc����
  -------------------------------------------------------------------
    -- ��������������Ĭ��asc��
    mysql> select * from stu order by age;
    
    -- ����������������
    mysql> select * from stu order by age desc;
    
    -- ��������������
    mysql> select * from stu order by age asc;
    
    -- ���Ա���������
    mysql> select * from stu order by sex;
    
    --�������򣺰��Ա���������������ͬ��������������
    mysql> select * from stu order by sex,age;
    
    -- ���༶����������ͬ�İ༶������������
    mysql> select * from stu order by classid desc,age asc;
    
    
  5. limit ��ҳ��䣨��ȡ�������ݣ�
  -----------------------------------------------------
  ��ʽ��....  limit m  ��ȡǰm��
        ....  limit m,n  ��m����ʼ��ȡǰn��
        
    -- ��ȡǰ5����Ϣ
    mysql> select * from stu limit 5;
    
    -- ��ȡǰ3����Ϣ
    mysql> select * from stu limit 3;

    -- ��ȡǰ5����Ϣ
    mysql> select * from stu limit 0,5;
    
    -- �ų�ǰ5������ȡ��5����Ϣ
    mysql> select * from stu limit 5,5;

    -- �ų�ǰ10������ȡ��5����Ϣ
    mysql> select * from stu limit 10,5;
    
    --��ȡ��������3��
    mysql> select * from stu order by age desc limit 3;
    
    --��ȡidΪ10����һ��
    mysql> select * from stu where id>10 order by id limit 1;
    
    --��ȡidΪ10����һ��
    mysql> select * from stu where id<10 order by id desc limit 1;
    
    --���ȡ3����
    mysql> select * from stu order by rand() limit 3;
    
    -- ��ȡ��������ѧ����Ϣ�����õ�Ƕ�ײ�ѯ��
    mysql> select * from stu where age=(select max(age) from stu);
    mysql> select * from stu where age in(select max(age) from stu);
    +----+------+-----+-----+---------+
    | id | name | age | sex | classid |
    +----+------+-----+-----+---------+
    | 11 | sad  |  35 | m   | lamp94  |
    | 15 | kk   |  35 | w   | NULL    |
    +----+------+-----+-----+---------+
    2 rows in set (0.00 sec)
    

ʮһ������͵���
-----------------------------------
-- ��lamp93�⵼��
D:\>mysqldump -u root -p lamp93 >lamp93.sql
Enter password:

---- ��lamp93���е�stu����
D:\>mysqldump -u root -p lamp93 stu >lamp93_stu.sql
Enter password:

-- ��lamp93�⵼��
D:\>mysql -u root -p lamp93<lamp93.sql
Enter password:

-- ��lamp93����stu����
D:\>mysql -u root -p lamp93<lamp93_stu.sql
Enter password:



 //�������->���ܣ�ģ�飩->���ݿ����->��ʵ�塢�����ԡ��ҹ�ϵ
 
 
 
-- ��ṹ����ɾ�Ĳ�

-- ��user������׷��һ��num�ֶ� ����Ϊint not null
mysql> alter table user add num int not null;
Query OK, 0 rows affected (0.33 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- ��user���email�ֶκ����һ��age�ֶΣ�����int not null default 20��
mysql> alter table user add age int not null default 20 after email;
Query OK, 0 rows affected (0.30 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- ��user�����ǰ�����һ��aa�ֶ�����Ϊint����
mysql> alter table user add aa int first;
Query OK, 0 rows affected (0.39 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- ɾ��user���aa�ֶ�
mysql> alter table user drop aa;
Query OK, 0 rows affected (0.27 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- �޸�user����age�ֶ���Ϣ�����ͣ�����ʹ��modify�ؼ��ֵ�Ŀ�Ĳ��޸��ֶ�����
mysql> alter table user modify age tinyint unsigned not null default 20;
Query OK, 0 rows affected (0.27 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- �޸�user���num�ֶθ�Ϊmm�ֶβ������Ĭ��ֵ��ʹ��change���Ը��ֶ�����
mysql> alter table user change num mm int not null default 10;
Query OK, 0 rows affected (0.25 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- Ϊuser���е�name�ֶ����Ψһ��������������Ϊuni_name;
mysql> alter table user add unique uni_name(name);
Query OK, 0 rows affected (0.27 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- Ϊuser���е�email�ֶ������ͨ������������Ϊindex_eamil
mysql> alter table user add index index_email(email);
Query OK, 0 rows affected (0.31 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- ��user����index_email������ɾ��
mysql> alter table user drop index index_email;
Query OK, 0 rows affected (0.25 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- ��user��ı����͸�ΪMyiSAM
mysql> alter table user engine="myisam";
Query OK, 0 rows affected (0.28 sec)
Records: 0  Duplicates: 0  Warnings: 0


 =========================================================================
 =========================================================================
 =========================================================================
 
 
 
 -- ��¼mysql���ݿ�
C:\Documents and Settings\Administrator>mysql -u root -p
Enter password:
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 11
Server version: 5.5.25a MySQL Community Server (GPL)

Copyright (c) 2000, 2011, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show databases;  --�鿴��ǰ�û��������������ݿ�
+--------------------+
| Database           |
+--------------------+
| information_schema |
| lamp93             |
| lamp_summer        |
| mysql              |
| performance_schema |
| test               |
+--------------------+
6 rows in set (0.00 sec)

mysql> create database mydb; --�������ݿ�mydb
Query OK, 1 row affected (0.13 sec)

mysql> create database mydb; --�������ݿ�mydb ����ԭ�������ݿ��Ѵ���
ERROR 1007 (HY000): Can''t create database 'mydb'; database exists
mysql>
-- ��mydb���ݿⲻ�����򴴽�
mysql> create database if not exists mydb;
Query OK, 1 row affected, 1 warning (0.00 sec)

-- ����ɾ��mydb���ݿ⣨��������ɾ����
mysql> drop database if exists mydb;
Query OK, 0 rows affected (0.14 sec)

mysql>
mysql> use lamp93; --ѡ��lamp93���ݿ�
Database changed

mysql> select database(); --�鿴��ǰ���ĸ����ݿ���
+------------+
| database() |
+------------+
| lamp93     |
+------------+
1 row in set (0.00 sec)


--======MySQL�еı����========================

--1. �������ݱ�
     create table ����(
          �ֶ��� ���� [�ֶ�Լ��],
          �ֶ��� ���� [�ֶ�Լ��],
          ...
      );


mysql>
mysql> --����tb1�����������ֶΣ�id��name��
mysql> create table tb1(id int,name varchar(8));
Query OK, 0 rows affected (0.31 sec)

-- ����tb2������4���ֶ�
mysql> create table tb2(
    -> id int,
    -> name varchar(8),
    -> age tinyint,
    -> sex char(1)
    -> );
Query OK, 0 rows affected (0.13 sec)

mysql> show tables; --�鿴��ǰ���ݿ������б�
+------------------+
| Tables_in_lamp93 |
+------------------+
| tb1              |
| tb2              |
+------------------+
2 rows in set (0.08 sec)

mysql> desc tb1; --�鿴tb1�ı�ṹ
+-------+------------+------+-----+---------+-------+
| Field | Type       | Null | Key | Default | Extra |
+-------+------------+------+-----+---------+-------+
| id    | int(11)    | YES  |     | NULL    |       |
| name  | varchar(8) | YES  |     | NULL    |       |
+-------+------------+------+-----+---------+-------+
2 rows in set (0.11 sec)

mysql> desc tb2; --�鿴tb2�ı�ṹ
+-------+------------+------+-----+---------+-------+
| Field | Type       | Null | Key | Default | Extra |
+-------+------------+------+-----+---------+-------+
| id    | int(11)    | YES  |     | NULL    |       |
| name  | varchar(8) | YES  |     | NULL    |       |
| age   | tinyint(4) | YES  |     | NULL    |       |
| sex   | char(1)    | YES  |     | NULL    |       |
+-------+------------+------+-----+---------+-------+
4 rows in set (0.00 sec)

mysql>
-- �鿴tb1��Ľ������
mysql> show create table tb1\G
*************************** 1. row ***************************
       Table: tb1
Create Table: CREATE TABLE `tb1` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
1 row in set (0.00 sec)

mysql> show create table tb2\G
*************************** 1. row ***************************
       Table: tb2
Create Table: CREATE TABLE `tb2` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `sex` char(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
1 row in set (0.00 sec)

mysql>
mysql> drop table tb1; --ɾ�����ݱ�tb1
Query OK, 0 rows affected (0.09 sec)


---=========�������ݿ����=================
--�������
--insert into ����[(�ֶ��б�)] values(ֵ�б�);

mysql> insert into tb1(id,name) value(2,'lisi');
Query OK, 1 row affected (0.20 sec)

mysql> insert into tb1(id,name) value(3,'wangwu');
Query OK, 1 row affected (0.13 sec)

mysql> insert into tb1(id,name) value(4,'zhaoliu');
Query OK, 1 row affected (0.09 sec)

mysql> select * from tb1;
+------+----------+
| id   | name     |
+------+----------+
|    1 | zhangsan |
|    2 | lisi     |
|    3 | wangwu   |
|    4 | zhaoliu  |
+------+----------+
4 rows in set (0.00 sec)

-- һ������Ӷ�������
mysql> insert into tb1(id,name) values(5,'aa'),(6,"bb"),(7,"cc");
Query OK, 3 rows affected (0.08 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> select * from tb1;
+------+----------+
| id   | name     |
+------+----------+
|    1 | zhangsan |
|    2 | lisi     |
|    3 | wangwu   |
|    4 | zhaoliu  |
|    5 | aa       |
|    6 | bb       |
|    7 | cc       |
+------+----------+
7 rows in set (0.00 sec)

--2. �鿴����
-- select �ֶ����б�|*  from ���� [����][����][����][��ҳ]
mysql> select * from tb1;
+------+----------+
| id   | name     |
+------+----------+
|    1 | zhangsan |
|    2 | lisi     |
|    3 | wangwu   |
|    4 | zhaoliu  |
|    5 | aa       |
|    6 | bb       |
|    7 | cc       |
+------+----------+
7 rows in set (0.00 sec)

-- ============�޸ı�������=============
-- update ���� set �ֶ���1=�޸�ֵ[,�ֶ���2=�޸�ֵ,...] where ��������Щ����ִ���޸ģ�

mysql> update tb1 set name='mm' where id=5;
Query OK, 1 row affected (0.19 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> select * from tb1;
+------+----------+
| id   | name     |
+------+----------+
|    1 | zhangsan |
|    2 | lisi     |
|    3 | wangwu   |
|    4 | zhaoliu  |
|    5 | mm       |
|    6 | bb       |
|    7 | cc       |
+------+----------+
7 rows in set (0.00 sec)

mysql>

-- =======����ɾ��============
-- delete from ���� where ���� 

mysql> delete from tb1 where id=7;
Query OK, 1 row affected (0.22 sec)

mysql> select * from tb1;
+------+----------+
| id   | name     |
+------+----------+
|    1 | zhangsan |
|    2 | lisi     |
|    3 | wangwu   |
|    4 | zhaoliu  |
|    5 | mm       |
|    6 | bb       |
+------+----------+
6 rows in set (0.00 sec)

mysql>




--======================================
-- ʹ�ñ����ͺ�Լ��������
--======================================
mysql> create table stu(
    -> id int unsigned auto_increment primary key,
    -> name varchar(8) not null unique,
    -> age tinyint unsigned not null default 20,
    -> sex enum('m','w') not null default 'm',
    -> classid char(6)
    -> );
Query OK, 0 rows affected (0.23 sec)
-- ����ѧ��stu��
-- id�ֶ� int���� �޷��� ���� ����
-- ����name�ֶ� ����varchar��8�� �ǿ� Ψһ��
-- age�ֶ� ���� �޷��� �ǿ� Ĭ��ֵ20
-- sex�ֶ� ö������


mysql> desc stu;
+---------+---------------------+------+-----+---------+----------------+
| Field   | Type                | Null | Key | Default | Extra          |
+---------+---------------------+------+-----+---------+----------------+
| id      | int(10) unsigned    | NO   | PRI | NULL    | auto_increment |
| name    | varchar(8)          | NO   | UNI | NULL    |                |
| age     | tinyint(3) unsigned | NO   |     | 20      |                |
| sex     | enum('m','w')       | NO   |     | m       |                |
| classid | char(6)             | YES  |     | NULL    |                |
+---------+---------------------+------+-----+---------+----------------+
5 rows in set (0.08 sec)

mysql> show create table stu\G
*************************** 1. row ***************************
       Table: stu
Create Table: CREATE TABLE `stu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `age` tinyint(3) unsigned NOT NULL DEFAULT '20',
  `sex` enum('m','w') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'm',
  `classid` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
1 row in set (0.00 sec)

mysql>



--======���ݿ�ĵ����͵���==========

--����
D:\xampp\htdocs\lamp93\lesson26_mysql>mysqldump -u root -p lamp93>lamp93.sql
Enter password:

--���� �����������ݿ�lamp93�����ڣ�
D:\xampp\htdocs\lamp93\lesson26_mysql>mysql -u root -p lamp93<lamp93.sql
Enter password:


--=====================================================


-- �����û���Ϣ��
mysql> create table user(
    -> id int unsigned not null auto_increment primary key,
    -> name varchar(16) not null,
    -> pass char(32) not null,
    -> email varchar(32) not null,
    -> phone varchar(11),
    -> addtime datetime
    -> );
Query OK, 0 rows affected (0.28 sec)

-- �鿴��ṹ
mysql> desc user;
+---------+------------------+------+-----+---------+----------------+
| Field   | Type             | Null | Key | Default | Extra          |
+---------+------------------+------+-----+---------+----------------+
| id      | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| name    | varchar(16)      | NO   |     | NULL    |                |
| pass    | char(32)         | NO   |     | NULL    |                |
| email   | varchar(32)      | NO   |     | NULL    |                |
| phone   | varchar(11)      | YES  |     | NULL    |                |
| addtime | datetime         | YES  |     | NULL    |                |
+---------+------------------+------+-----+---------+----------------+
6 rows in set (0.08 sec)

mysql>
-- ��user������׷��һ��num�ֶ� ����Ϊint not null
mysql> alter table user add num int not null;
Query OK, 0 rows affected (0.33 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> desc user;
+---------+------------------+------+-----+---------+----------------+
| Field   | Type             | Null | Key | Default | Extra          |
+---------+------------------+------+-----+---------+----------------+
| id      | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| name    | varchar(16)      | NO   |     | NULL    |                |
| pass    | char(32)         | NO   |     | NULL    |                |
| email   | varchar(32)      | NO   |     | NULL    |                |
| phone   | varchar(11)      | YES  |     | NULL    |                |
| addtime | datetime         | YES  |     | NULL    |                |
| num     | int(11)          | NO   |     | NULL    |                |
+---------+------------------+------+-----+---------+----------------+
7 rows in set (0.00 sec)

-- ��user���email�ֶκ����һ��age�ֶΣ�����int not null default 20��
mysql> alter table user add age int not null default 20 after email;
Query OK, 0 rows affected (0.30 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> desc user;
+---------+------------------+------+-----+---------+----------------+
| Field   | Type             | Null | Key | Default | Extra          |
+---------+------------------+------+-----+---------+----------------+
| id      | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| name    | varchar(16)      | NO   |     | NULL    |                |
| pass    | char(32)         | NO   |     | NULL    |                |
| email   | varchar(32)      | NO   |     | NULL    |                |
| age     | int(11)          | NO   |     | 20      |                |
| phone   | varchar(11)      | YES  |     | NULL    |                |
| addtime | datetime         | YES  |     | NULL    |                |
| num     | int(11)          | NO   |     | NULL    |                |
+---------+------------------+------+-----+---------+----------------+
8 rows in set (0.00 sec)

-- ��user�����ǰ�����һ��aa�ֶ�����Ϊint����
mysql> alter table user add aa int first;
Query OK, 0 rows affected (0.39 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> desc user;
+---------+------------------+------+-----+---------+----------------+
| Field   | Type             | Null | Key | Default | Extra          |
+---------+------------------+------+-----+---------+----------------+
| aa      | int(11)          | YES  |     | NULL    |                |
| id      | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| name    | varchar(16)      | NO   |     | NULL    |                |
| pass    | char(32)         | NO   |     | NULL    |                |
| email   | varchar(32)      | NO   |     | NULL    |                |
| age     | int(11)          | NO   |     | 20      |                |
| phone   | varchar(11)      | YES  |     | NULL    |                |
| addtime | datetime         | YES  |     | NULL    |                |
| num     | int(11)          | NO   |     | NULL    |                |
+---------+------------------+------+-----+---------+----------------+
9 rows in set (0.00 sec)

mysql>
-- ɾ��user���aa�ֶ�
mysql> alter table user drop aa;
Query OK, 0 rows affected (0.27 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> desc user;
+---------+------------------+------+-----+---------+----------------+
| Field   | Type             | Null | Key | Default | Extra          |
+---------+------------------+------+-----+---------+----------------+
| id      | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| name    | varchar(16)      | NO   |     | NULL    |                |
| pass    | char(32)         | NO   |     | NULL    |                |
| email   | varchar(32)      | NO   |     | NULL    |                |
| age     | int(11)          | NO   |     | 20      |                |
| phone   | varchar(11)      | YES  |     | NULL    |                |
| addtime | datetime         | YES  |     | NULL    |                |
| num     | int(11)          | NO   |     | NULL    |                |
+---------+------------------+------+-----+---------+----------------+
8 rows in set (0.00 sec)

-- �޸�user����age�ֶ���Ϣ�����ͣ�����ʹ��modify�ؼ��ֵ�Ŀ�Ĳ��޸��ֶ�����
mysql> alter table user modify age tinyint unsigned not null default 20;
Query OK, 0 rows affected (0.27 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> desc user;
+---------+---------------------+------+-----+---------+----------------+
| Field   | Type                | Null | Key | Default | Extra          |
+---------+---------------------+------+-----+---------+----------------+
| id      | int(10) unsigned    | NO   | PRI | NULL    | auto_increment |
| name    | varchar(16)         | NO   |     | NULL    |                |
| pass    | char(32)            | NO   |     | NULL    |                |
| email   | varchar(32)         | NO   |     | NULL    |                |
| age     | tinyint(3) unsigned | NO   |     | 20      |                |
| phone   | varchar(11)         | YES  |     | NULL    |                |
| addtime | datetime            | YES  |     | NULL    |                |
| num     | int(11)             | NO   |     | NULL    |                |
+---------+---------------------+------+-----+---------+----------------+
8 rows in set (0.02 sec)

-- �޸�user���num�ֶθ�Ϊmm�ֶβ������Ĭ��ֵ��ʹ��change���Ը��ֶ�����
mysql> alter table user change num mm int not null default 10;
Query OK, 0 rows affected (0.25 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> desc user;
+---------+---------------------+------+-----+---------+----------------+
| Field   | Type                | Null | Key | Default | Extra          |
+---------+---------------------+------+-----+---------+----------------+
| id      | int(10) unsigned    | NO   | PRI | NULL    | auto_increment |
| name    | varchar(16)         | NO   |     | NULL    |                |
| pass    | char(32)            | NO   |     | NULL    |                |
| email   | varchar(32)         | NO   |     | NULL    |                |
| age     | tinyint(3) unsigned | NO   |     | 20      |                |
| phone   | varchar(11)         | YES  |     | NULL    |                |
| addtime | datetime            | YES  |     | NULL    |                |
| mm      | int(11)             | NO   |     | 10      |                |
+---------+---------------------+------+-----+---------+----------------+
8 rows in set (0.00 sec)

mysql>

-- Ϊuser���е�name�ֶ����Ψһ��������������Ϊuni_name;
mysql> alter table user add unique uni_name(name);
Query OK, 0 rows affected (0.27 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> desc user;
+---------+---------------------+------+-----+---------+----------------+
| Field   | Type                | Null | Key | Default | Extra          |
+---------+---------------------+------+-----+---------+----------------+
| id      | int(10) unsigned    | NO   | PRI | NULL    | auto_increment |
| name    | varchar(16)         | NO   | UNI | NULL    |                |
| pass    | char(32)            | NO   |     | NULL    |                |
| email   | varchar(32)         | NO   |     | NULL    |                |
| age     | tinyint(3) unsigned | NO   |     | 20      |                |
| phone   | varchar(11)         | YES  |     | NULL    |                |
| addtime | datetime            | YES  |     | NULL    |                |
| mm      | int(11)             | NO   |     | 10      |                |
+---------+---------------------+------+-----+---------+----------------+
8 rows in set (0.00 sec)

mysql> show create table user\G
*************************** 1. row ***************************
       Table: user
Create Table: CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `pass` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `age` tinyint(3) unsigned NOT NULL DEFAULT '20',
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `mm` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
1 row in set (0.00 sec)

mysql>

-- Ϊuser���е�email�ֶ������ͨ������������Ϊindex_eamil
mysql> alter table user add index index_email(email);
Query OK, 0 rows affected (0.31 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> desc user;
+---------+---------------------+------+-----+---------+----------------+
| Field   | Type                | Null | Key | Default | Extra          |
+---------+---------------------+------+-----+---------+----------------+
| id      | int(10) unsigned    | NO   | PRI | NULL    | auto_increment |
| name    | varchar(16)         | NO   | UNI | NULL    |                |
| pass    | char(32)            | NO   |     | NULL    |                |
| email   | varchar(32)         | NO   | MUL | NULL    |                |
| age     | tinyint(3) unsigned | NO   |     | 20      |                |
| phone   | varchar(11)         | YES  |     | NULL    |                |
| addtime | datetime            | YES  |     | NULL    |                |
| mm      | int(11)             | NO   |     | 10      |                |
+---------+---------------------+------+-----+---------+----------------+
8 rows in set (0.01 sec)

mysql> show create table user\G
*************************** 1. row ***************************
       Table: user
Create Table: CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `pass` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `age` tinyint(3) unsigned NOT NULL DEFAULT '20',
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `mm` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_name` (`name`),
  KEY `index_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
1 row in set (0.00 sec)

-- ��user����index_email������ɾ��
mysql> alter table user drop index index_email;
Query OK, 0 rows affected (0.25 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql>
-- ��user��ı����͸�ΪMyiSAM
mysql> alter table user engine="myisam";
Query OK, 0 rows affected (0.28 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> show create table user\G
*************************** 1. row ***************************
       Table: user
Create Table: CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `pass` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `age` tinyint(3) unsigned NOT NULL DEFAULT '20',
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `mm` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
1 row in set (0.00 sec)

mysql>

--============================================
    -- ���ݵ������ġ�ɾ���Ȳ���
--============================================
-- �鿴��ṹ
mysql> desc stu;
+---------+---------------------+------+-----+---------+----------------+
| Field   | Type                | Null | Key | Default | Extra          |
+---------+---------------------+------+-----+---------+----------------+
| id      | int(10) unsigned    | NO   | PRI | NULL    | auto_increment |
| name    | varchar(8)          | NO   | UNI | NULL    |                |
| age     | tinyint(3) unsigned | NO   |     | 20      |                |
| sex     | enum('m','w')       | NO   |     | m       |                |
| classid | char(6)             | YES  |     | NULL    |                |
+---------+---------------------+------+-----+---------+----------------+
5 rows in set (0.00 sec)

--��׼��ӣ�ָ�������ֶΣ��������е�ֵ��
mysql> insert into stu(id,name,age,sex,classid) values(1,'zhangsan',20,'m','lamp93');
Query OK, 1 row affected (0.13 sec)

mysql>
--ָ�������ֶ����ֵ
mysql> insert into stu(name,classid) value('lisi','lamp93');
Query OK, 1 row affected (0.11 sec)

-- ��ָ���ֶ����ֵ
mysql> insert into stu value(null,'wangwu',21,'w','lamp93');
Query OK, 1 row affected (0.22 sec)

-- �������ֵ
mysql> insert into stu values
    -> (null,'zhaoliu',25,'w','lamp94'),
    -> (null,'uu01',26,'m','lamp94'),
    -> (null,'uu02',28,'w','lamp92'),
    -> (null,'qq02',24,'m','lamp92'),
    -> (null,'uu03',32,'m','lamp93'),
    -> (null,'qq03',23,'w','lamp94'),
    -> (null,'aa',19,'m','lamp93');
Query OK, 7 rows affected (0.27 sec)
Records: 7  Duplicates: 0  Warnings: 0

mysql>
mysql> select * from stu;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
|  6 | uu02     |  28 | w   | lamp92  |
|  7 | qq02     |  24 | m   | lamp92  |
|  8 | uu03     |  32 | m   | lamp93  |
|  9 | qq03     |  23 | w   | lamp94  |
| 10 | aa       |  19 | m   | lamp93  |
+----+----------+-----+-----+---------+
10 rows in set (0.00 sec)


-- ��idΪ11��age��Ϊ35��sex��Ϊmֵ
mysql> update stu set age=35,sex='m' where id=11;
Query OK, 1 row affected (0.16 sec)
Rows matched: 1  Changed: 1  Warnings: 0

-- ��idֵΪ12��14������ֵsex��Ϊm��classid��Ϊlamp92
mysql> update stu set sex='m',classid='lamp92' where id=12 or id=14 --�ȼ�������
mysql> update stu set sex='m',classid='lamp92' where id in(12,14);
Query OK, 2 rows affected (0.09 sec)
Rows matched: 2  Changed: 2  Warnings: 0

mysql> select * from stu;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
|  6 | uu02     |  28 | w   | lamp92  |
|  7 | qq02     |  24 | m   | lamp92  |
|  8 | uu03     |  32 | m   | lamp93  |
|  9 | qq03     |  23 | w   | lamp94  |
| 10 | aa       |  19 | m   | lamp93  |
| 11 | sad      |  35 | m   | lamp94  |
| 12 | tt       |  25 | m   | lamp92  |
| 13 | wer      |  25 | w   | lamp94  |
| 14 | xx       |  25 | m   | lamp92  |
| 15 | kk       |   0 | w   | lamp94  |
+----+----------+-----+-----+---------+
15 rows in set (0.00 sec)

mysql>

mysql>
-- ɾ��stu����idֵΪ100������
mysql> delete from stu where id=100;
Query OK, 0 rows affected (0.00 sec)

-- ɾ��stu����idֵΪ20��30������
mysql> delete from stu where id>=20 and id<=30;
Query OK, 0 rows affected (0.00 sec)

-- ɾ��stu����idֵΪ20��30�����ݣ��ȼ�������д����
mysql> delete from stu where id between 20 and 30;
Query OK, 0 rows affected (0.00 sec)

-- ɾ��stu����idֵ����200������
mysql> delete from stu where id>200;
Query OK, 0 rows affected (0.00 sec)

mysql>

-- ���ݵĲ�ѯ
============================================
-- ��ѯ�����ֶ����е�������Ϣ
mysql> select * from stu;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
|  6 | uu02     |  28 | w   | lamp92  |
|  7 | qq02     |  24 | m   | lamp92  |
|  8 | uu03     |  32 | m   | lamp93  |
|  9 | qq03     |  23 | w   | lamp94  |
| 10 | aa       |  19 | m   | lamp93  |
| 11 | sad      |  35 | m   | lamp94  |
| 12 | tt       |  25 | m   | lamp92  |
| 13 | wer      |  25 | w   | lamp94  |
| 14 | xx       |  25 | m   | lamp92  |
| 15 | kk       |   0 | w   | lamp94  |
+----+----------+-----+-----+---------+
15 rows in set (0.00 sec)

--��ѯid��name��classid�ֶε���Ϣ
mysql> select id,name,classid from stu;
+----+----------+---------+
| id | name     | classid |
+----+----------+---------+
|  1 | zhangsan | lamp93  |
|  2 | lisi     | lamp93  |
|  3 | wangwu   | lamp93  |
|  4 | zhaoliu  | lamp94  |
|  5 | uu01     | lamp94  |
|  6 | uu02     | lamp92  |
|  7 | qq02     | lamp92  |
|  8 | uu03     | lamp93  |
|  9 | qq03     | lamp94  |
| 10 | aa       | lamp93  |
| 11 | sad      | lamp94  |
| 12 | tt       | lamp92  |
| 13 | wer      | lamp94  |
| 14 | xx       | lamp92  |
| 15 | kk       | lamp94  |
+----+----------+---------+
15 rows in set (0.00 sec)

-- ��ѯ�����ֶ���Ϣ������name�ֶ�����Ϊstuname��ʹ��as�ؼ��֣�
mysql> select id,name as stuname,classid from stu;
+----+----------+---------+
| id | stuname  | classid |
+----+----------+---------+
|  1 | zhangsan | lamp93  |
|  2 | lisi     | lamp93  |
|  3 | wangwu   | lamp93  |
|  4 | zhaoliu  | lamp94  |
|  5 | uu01     | lamp94  |
|  6 | uu02     | lamp92  |
|  7 | qq02     | lamp92  |
|  8 | uu03     | lamp93  |
|  9 | qq03     | lamp94  |
| 10 | aa       | lamp93  |
| 11 | sad      | lamp94  |
| 12 | tt       | lamp92  |
| 13 | wer      | lamp94  |
| 14 | xx       | lamp92  |
| 15 | kk       | lamp94  |
+----+----------+---------+
15 rows in set (0.00 sec)

-- ��ѯ�����ֶ���Ϣ������name�ֶ�����Ϊstuname��ʡ��as�ؼ��֣�
mysql> select id,name stuname,classid from stu;
+----+----------+---------+
| id | stuname  | classid |
+----+----------+---------+
|  1 | zhangsan | lamp93  |
|  2 | lisi     | lamp93  |
|  3 | wangwu   | lamp93  |
|  4 | zhaoliu  | lamp94  |
|  5 | uu01     | lamp94  |
|  6 | uu02     | lamp92  |
|  7 | qq02     | lamp92  |
|  8 | uu03     | lamp93  |
|  9 | qq03     | lamp94  |
| 10 | aa       | lamp93  |
| 11 | sad      | lamp94  |
| 12 | tt       | lamp92  |
| 13 | wer      | lamp94  |
| 14 | xx       | lamp92  |
| 15 | kk       | lamp94  |
+----+----------+---------+
15 rows in set (0.02 sec)

--��ѯ�����ֶ���Ϣ����׷��һ���ֶ���Ϣ��ֵΪbeijing
mysql> select id,name stuname,classid,"beijing" from stu;
+----+----------+---------+---------+
| id | stuname  | classid | beijing |
+----+----------+---------+---------+
|  1 | zhangsan | lamp93  | beijing |
|  2 | lisi     | lamp93  | beijing |
|  3 | wangwu   | lamp93  | beijing |
|  4 | zhaoliu  | lamp94  | beijing |
|  5 | uu01     | lamp94  | beijing |
|  6 | uu02     | lamp92  | beijing |
|  7 | qq02     | lamp92  | beijing |
|  8 | uu03     | lamp93  | beijing |
|  9 | qq03     | lamp94  | beijing |
| 10 | aa       | lamp93  | beijing |
| 11 | sad      | lamp94  | beijing |
| 12 | tt       | lamp92  | beijing |
| 13 | wer      | lamp94  | beijing |
| 14 | xx       | lamp92  | beijing |
| 15 | kk       | lamp94  | beijing |
+----+----------+---------+---------+
15 rows in set (0.00 sec)

-- Ϊ׷�ӵ��ֶΣ�����һ������city
mysql> select id,name stuname,classid,"beijing" city from stu;
+----+----------+---------+---------+
| id | stuname  | classid | city    |
+----+----------+---------+---------+
|  1 | zhangsan | lamp93  | beijing |
|  2 | lisi     | lamp93  | beijing |
|  3 | wangwu   | lamp93  | beijing |
|  4 | zhaoliu  | lamp94  | beijing |
|  5 | uu01     | lamp94  | beijing |
|  6 | uu02     | lamp92  | beijing |
|  7 | qq02     | lamp92  | beijing |
|  8 | uu03     | lamp93  | beijing |
|  9 | qq03     | lamp94  | beijing |
| 10 | aa       | lamp93  | beijing |
| 11 | sad      | lamp94  | beijing |
| 12 | tt       | lamp92  | beijing |
| 13 | wer      | lamp94  | beijing |
| 14 | xx       | lamp92  | beijing |
| 15 | kk       | lamp94  | beijing |
+----+----------+---------+---------+
15 rows in set (0.00 sec)

mysql>
-- ��ѯ�����ֶΣ������һ��age2�ֶΣ�ֵΪ��ǰ��age+4
mysql> select id,name,age,age+4 age2 from stu;
+----+----------+-----+------+
| id | name     | age | age2 |
+----+----------+-----+------+
|  1 | zhangsan |  20 |   24 |
|  2 | lisi     |  20 |   24 |
|  3 | wangwu   |  21 |   25 |
|  4 | zhaoliu  |  25 |   29 |
|  5 | uu01     |  26 |   30 |
|  6 | uu02     |  28 |   32 |
|  7 | qq02     |  24 |   28 |
|  8 | uu03     |  32 |   36 |
|  9 | qq03     |  23 |   27 |
| 10 | aa       |  19 |   23 |
| 11 | sad      |  35 |   39 |
| 12 | tt       |  25 |   29 |
| 13 | wer      |  25 |   29 |
| 14 | xx       |  25 |   29 |
| 15 | kk       |   0 |    4 |
+----+----------+-----+------+
15 rows in set (0.09 sec)

-- ��ѯһ���ֶΣ����ظ���
mysql> select classid from stu;
+---------+
| classid |
+---------+
| lamp93  |
| lamp93  |
| lamp93  |
| lamp94  |
| lamp94  |
| lamp92  |
| lamp92  |
| lamp93  |
| lamp94  |
| lamp93  |
| lamp94  |
| lamp92  |
| lamp94  |
| lamp92  |
| lamp94  |
+---------+
15 rows in set (0.00 sec)

-- ȥ���ظ��Ĳ�ѯһ���ֶ���Ϣ
mysql> select distinct classid from stu;
+---------+
| classid |
+---------+
| lamp93  |
| lamp94  |
| lamp92  |
+---------+
3 rows in set (0.06 sec)

mysql>


-- where������ѯ
================================

mysql> select * from stu where classid='lamp93';
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  8 | uu03     |  32 | m   | lamp93  |
| 10 | aa       |  19 | m   | lamp93  |
+----+----------+-----+-----+---------+
5 rows in set (0.00 sec)

mysql> select * from stu where classid='lamp93' and sex='m';
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  8 | uu03     |  32 | m   | lamp93  |
| 10 | aa       |  19 | m   | lamp93  |
+----+----------+-----+-----+---------+
4 rows in set (0.00 sec)

mysql> select * from  stu where id>10;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
| 11 | sad  |  35 | m   | lamp94  |
| 12 | tt   |  25 | m   | lamp92  |
| 13 | wer  |  25 | w   | lamp94  |
| 14 | xx   |  25 | m   | lamp92  |
| 15 | kk   |   0 | w   | lamp94  |
+----+------+-----+-----+---------+
5 rows in set (0.00 sec)

mysql> select * from stu where age>=20 and age<=25;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  7 | qq02     |  24 | m   | lamp92  |
|  9 | qq03     |  23 | w   | lamp94  |
| 12 | tt       |  25 | m   | lamp92  |
| 13 | wer      |  25 | w   | lamp94  |
| 14 | xx       |  25 | m   | lamp92  |
+----+----------+-----+-----+---------+
9 rows in set (0.00 sec)

mysql> select * from stu where age between 20 and 25;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  7 | qq02     |  24 | m   | lamp92  |
|  9 | qq03     |  23 | w   | lamp94  |
| 12 | tt       |  25 | m   | lamp92  |
| 13 | wer      |  25 | w   | lamp94  |
| 14 | xx       |  25 | m   | lamp92  |
+----+----------+-----+-----+---------+
9 rows in set (0.00 sec)

mysql> select * from stu where age not between 20 and 25;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
|  5 | uu01 |  26 | m   | lamp94  |
|  6 | uu02 |  28 | w   | lamp92  |
|  8 | uu03 |  32 | m   | lamp93  |
| 10 | aa   |  19 | m   | lamp93  |
| 11 | sad  |  35 | m   | lamp94  |
| 15 | kk   |   0 | w   | lamp94  |
+----+------+-----+-----+---------+
6 rows in set (0.00 sec)

mysql> select * from stu where age<20 or age>25;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
|  5 | uu01 |  26 | m   | lamp94  |
|  6 | uu02 |  28 | w   | lamp92  |
|  8 | uu03 |  32 | m   | lamp93  |
| 10 | aa   |  19 | m   | lamp93  |
| 11 | sad  |  35 | m   | lamp94  |
| 15 | kk   |   0 | w   | lamp94  |
+----+------+-----+-----+---------+
6 rows in set (0.09 sec)

mysql>


mysql> select * from stu where id in(1,8,4,10,14);
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  8 | uu03     |  32 | m   | lamp93  |
| 10 | aa       |  19 | m   | lamp93  |
| 14 | xx       |  25 | m   | lamp92  |
+----+----------+-----+-----+---------+
5 rows in set (0.00 sec)

mysql> select * from stu where id=1 or id=8 or id=4 or id=10 or id=14;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  8 | uu03     |  32 | m   | lamp93  |
| 10 | aa       |  19 | m   | lamp93  |
| 14 | xx       |  25 | m   | lamp92  |
+----+----------+-----+-----+---------+
5 rows in set (0.00 sec)

mysql> select * from stu where classid in('lamp93','lamp94') and sex='w';
+----+---------+-----+-----+---------+
| id | name    | age | sex | classid |
+----+---------+-----+-----+---------+
|  3 | wangwu  |  21 | w   | lamp93  |
|  4 | zhaoliu |  25 | w   | lamp94  |
|  9 | qq03    |  23 | w   | lamp94  |
| 13 | wer     |  25 | w   | lamp94  |
| 15 | kk      |   0 | w   | lamp94  |
+----+---------+-----+-----+---------+
5 rows in set (0.02 sec)

mysql> select * from stu where (classid='lamp93' or classid='lamp94') and sex='w
';
+----+---------+-----+-----+---------+
| id | name    | age | sex | classid |
+----+---------+-----+-----+---------+
|  3 | wangwu  |  21 | w   | lamp93  |
|  4 | zhaoliu |  25 | w   | lamp94  |
|  9 | qq03    |  23 | w   | lamp94  |
| 13 | wer     |  25 | w   | lamp94  |
| 15 | kk      |   0 | w   | lamp94  |
+----+---------+-----+-----+---------+
5 rows in set (0.00 sec)

mysql>


==================================================
==================================================
==================================================



mysql> select * from stu;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
|  6 | uu02     |  28 | w   | lamp92  |
|  7 | qq02     |  24 | m   | lamp92  |
|  8 | uu03     |  32 | m   | lamp93  |
|  9 | qq03     |  23 | w   | lamp94  |
| 10 | aa       |  19 | m   | lamp93  |
| 11 | sad      |  35 | m   | lamp94  |
| 12 | tt       |  25 | m   | lamp92  |
| 13 | wer      |  25 | w   | lamp94  |
| 14 | xx       |  25 | m   | lamp92  |
| 15 | kk       |   0 | w   | lamp94  |
+----+----------+-----+-----+---------+
15 rows in set (0.00 sec)

mysql> select count(id) from stu;
+-----------+
| count(id) |
+-----------+
|        15 |
+-----------+
1 row in set (0.08 sec)

mysql> update stu set classid=null where id=15;
Query OK, 1 row affected (0.08 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> select * from stu;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
|  6 | uu02     |  28 | w   | lamp92  |
|  7 | qq02     |  24 | m   | lamp92  |
|  8 | uu03     |  32 | m   | lamp93  |
|  9 | qq03     |  23 | w   | lamp94  |
| 10 | aa       |  19 | m   | lamp93  |
| 11 | sad      |  35 | m   | lamp94  |
| 12 | tt       |  25 | m   | lamp92  |
| 13 | wer      |  25 | w   | lamp94  |
| 14 | xx       |  25 | m   | lamp92  |
| 15 | kk       |   0 | w   | NULL    |
+----+----------+-----+-----+---------+
15 rows in set (0.00 sec)

mysql> select count(classid) from stu;
+----------------+
| count(classid) |
+----------------+
|             14 |
+----------------+
1 row in set (0.00 sec)

mysql> select count(id) from stu;
+-----------+
| count(id) |
+-----------+
|        15 |
+-----------+
1 row in set (0.00 sec)

mysql> select count(*) from stu;
+----------+
| count(*) |
+----------+
|       15 |
+----------+
1 row in set (0.00 sec)

mysql> select count(*),sum(age),max(age),min(age),avg(age) from stu;
+----------+----------+----------+----------+----------+
| count(*) | sum(age) | max(age) | min(age) | avg(age) |
+----------+----------+----------+----------+----------+
|       15 |      348 |       35 |        0 |  23.2000 |
+----------+----------+----------+----------+----------+
1 row in set (0.00 sec)

mysql> select count(*),max(age),min(age) from stu where classid="lamp93";
+----------+----------+----------+
| count(*) | max(age) | min(age) |
+----------+----------+----------+
|        5 |       32 |       19 |
+----------+----------+----------+
1 row in set (0.00 sec)

mysql>


--=====================================
--2. ����
--=====================================
-- ���Ա����鿴
mysql> select sex from stu group by sex;
+-----+
| sex |
+-----+
| m   |
| w   |
+-----+
2 rows in set (0.00 sec)

-- �鿴���༶����
mysql> select classid from stu group by classid;
+---------+
| classid |
+---------+
| NULL    |
| lamp92  |
| lamp93  |
| lamp94  |
+---------+
4 rows in set (0.00 sec)

mysql>
-- ���Ա���鲢ͳ������
mysql> select sex,count(*) from stu group by sex;
+-----+----------+
| sex | count(*) |
+-----+----------+
| m   |        9 |
| w   |        6 |
+-----+----------+
2 rows in set (0.00 sec)

-- ���༶���鲢ͳ������
mysql> select classid,count(*) from stu group by classid;
+---------+----------+
| classid | count(*) |
+---------+----------+
| NULL    |        1 |
| lamp92  |        4 |
| lamp93  |        5 |
| lamp94  |        5 |
+---------+----------+
4 rows in set (0.00 sec)

-- ͳ��lamp93�ڵ���Ů���������ˡ�
mysql> select sex,count(*) from stu where classid='lamp93' group by sex;
+-----+----------+
| sex | count(*) |
+-----+----------+
| m   |        4 |
| w   |        1 |
+-----+----------+
2 rows in set (0.00 sec)

mysql>
-- ���༶����ͳ��ÿ���༶��������Ҫ��ֻ���������4�����ϵ�
mysql> select classid,count(*) from stu group by classid having count(*)>4;
+---------+----------+
| classid | count(*) |
+---------+----------+
| lamp93  |        5 |
| lamp94  |        5 |
+---------+----------+
2 rows in set (0.00 sec)
-- ���༶����ͳ��ÿ���༶��������Ҫ��ֻ���������4�����ϵģ�����ʹ��num������
mysql> select classid,count(*) num from stu group by classid having num>4;
+---------+-----+
| classid | num |
+---------+-----+
| lamp93  |   5 |
| lamp94  |   5 |
+---------+-----+
2 rows in set (0.00 sec)

mysql>

--============================
--=== ���� ===
--============================
-- ��������������Ĭ��asc��
mysql> select * from stu order by age;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
| 15 | kk       |   0 | w   | NULL    |
| 10 | aa       |  19 | m   | lamp93  |
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  9 | qq03     |  23 | w   | lamp94  |
|  7 | qq02     |  24 | m   | lamp92  |
| 14 | xx       |  25 | m   | lamp92  |
| 13 | wer      |  25 | w   | lamp94  |
| 12 | tt       |  25 | m   | lamp92  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
|  6 | uu02     |  28 | w   | lamp92  |
|  8 | uu03     |  32 | m   | lamp93  |
| 11 | sad      |  35 | m   | lamp94  |
+----+----------+-----+-----+---------+
15 rows in set (0.01 sec)

-- ����������������
mysql> select * from stu order by age desc;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
| 11 | sad      |  35 | m   | lamp94  |
|  8 | uu03     |  32 | m   | lamp93  |
|  6 | uu02     |  28 | w   | lamp92  |
|  5 | uu01     |  26 | m   | lamp94  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
| 14 | xx       |  25 | m   | lamp92  |
| 13 | wer      |  25 | w   | lamp94  |
| 12 | tt       |  25 | m   | lamp92  |
|  7 | qq02     |  24 | m   | lamp92  |
|  9 | qq03     |  23 | w   | lamp94  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
| 10 | aa       |  19 | m   | lamp93  |
| 15 | kk       |   0 | w   | NULL    |
+----+----------+-----+-----+---------+
15 rows in set (0.00 sec)

-- ��������������
mysql> select * from stu order by age asc;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
| 15 | kk       |   0 | w   | NULL    |
| 10 | aa       |  19 | m   | lamp93  |
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  9 | qq03     |  23 | w   | lamp94  |
|  7 | qq02     |  24 | m   | lamp92  |
| 14 | xx       |  25 | m   | lamp92  |
| 13 | wer      |  25 | w   | lamp94  |
| 12 | tt       |  25 | m   | lamp92  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
|  6 | uu02     |  28 | w   | lamp92  |
|  8 | uu03     |  32 | m   | lamp93  |
| 11 | sad      |  35 | m   | lamp94  |
+----+----------+-----+-----+---------+
15 rows in set (0.00 sec)

-- ���Ա���������
mysql> select * from stu order by sex;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
| 14 | xx       |  25 | m   | lamp92  |
| 12 | tt       |  25 | m   | lamp92  |
| 11 | sad      |  35 | m   | lamp94  |
| 10 | aa       |  19 | m   | lamp93  |
|  8 | uu03     |  32 | m   | lamp93  |
|  7 | qq02     |  24 | m   | lamp92  |
|  5 | uu01     |  26 | m   | lamp94  |
|  2 | lisi     |  20 | m   | lamp93  |
|  6 | uu02     |  28 | w   | lamp92  |
|  9 | qq03     |  23 | w   | lamp94  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  3 | wangwu   |  21 | w   | lamp93  |
| 13 | wer      |  25 | w   | lamp94  |
| 15 | kk       |   0 | w   | NULL    |
+----+----------+-----+-----+---------+
15 rows in set (0.00 sec)

--�������򣺰��Ա���������������ͬ��������������
mysql> select * from stu order by sex,age;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
| 10 | aa       |  19 | m   | lamp93  |
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  7 | qq02     |  24 | m   | lamp92  |
| 14 | xx       |  25 | m   | lamp92  |
| 12 | tt       |  25 | m   | lamp92  |
|  5 | uu01     |  26 | m   | lamp94  |
|  8 | uu03     |  32 | m   | lamp93  |
| 11 | sad      |  35 | m   | lamp94  |
| 15 | kk       |   0 | w   | NULL    |
|  3 | wangwu   |  21 | w   | lamp93  |
|  9 | qq03     |  23 | w   | lamp94  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
| 13 | wer      |  25 | w   | lamp94  |
|  6 | uu02     |  28 | w   | lamp92  |
+----+----------+-----+-----+---------+
15 rows in set (0.00 sec)

-- ���༶����������ͬ�İ༶������������
mysql> select * from stu order by classid desc,age asc;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  9 | qq03     |  23 | w   | lamp94  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
| 13 | wer      |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
| 11 | sad      |  35 | m   | lamp94  |
| 10 | aa       |  19 | m   | lamp93  |
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  8 | uu03     |  32 | m   | lamp93  |
|  7 | qq02     |  24 | m   | lamp92  |
| 12 | tt       |  25 | m   | lamp92  |
| 14 | xx       |  25 | m   | lamp92  |
|  6 | uu02     |  28 | w   | lamp92  |
| 15 | kk       |   0 | w   | NULL    |
+----+----------+-----+-----+---------+
15 rows in set (0.00 sec)

mysql>


-- ��ҳlimit�Ӿ�
--===============================================
mysql> select * from stu;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
|  6 | uu02     |  28 | w   | lamp92  |
|  7 | qq02     |  24 | m   | lamp92  |
|  8 | uu03     |  32 | m   | lamp93  |
|  9 | qq03     |  23 | w   | lamp94  |
| 10 | aa       |  19 | m   | lamp93  |
| 11 | sad      |  35 | m   | lamp94  |
| 12 | tt       |  25 | m   | lamp92  |
| 13 | wer      |  25 | w   | lamp94  |
| 14 | xx       |  25 | m   | lamp92  |
| 15 | kk       |   0 | w   | NULL    |
+----+----------+-----+-----+---------+
15 rows in set (0.00 sec)

-- ��ȡǰ5����Ϣ
mysql> select * from stu limit 5;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
+----+----------+-----+-----+---------+
5 rows in set (0.00 sec)

-- ��ȡǰ3����Ϣ
mysql> select * from stu limit 3;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
+----+----------+-----+-----+---------+
3 rows in set (0.00 sec)

-- ��ȡǰ5����Ϣ
mysql> select * from stu limit 0,5;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
+----+----------+-----+-----+---------+
5 rows in set (0.00 sec)

-- �ų�ǰ5������ȡ��5����Ϣ
mysql> select * from stu limit 5,5;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
|  6 | uu02 |  28 | w   | lamp92  |
|  7 | qq02 |  24 | m   | lamp92  |
|  8 | uu03 |  32 | m   | lamp93  |
|  9 | qq03 |  23 | w   | lamp94  |
| 10 | aa   |  19 | m   | lamp93  |
+----+------+-----+-----+---------+
5 rows in set (0.00 sec)

-- �ų�ǰ10������ȡ��5����Ϣ
mysql> select * from stu limit 10,5;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
| 11 | sad  |  35 | m   | lamp94  |
| 12 | tt   |  25 | m   | lamp92  |
| 13 | wer  |  25 | w   | lamp94  |
| 14 | xx   |  25 | m   | lamp92  |
| 15 | kk   |   0 | w   | NULL    |
+----+------+-----+-----+---------+
5 rows in set (0.00 sec)

mysql>
--

mysql> select * from stu order by age desc limit 3;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
| 11 | sad  |  35 | m   | lamp94  |
|  8 | uu03 |  32 | m   | lamp93  |
|  6 | uu02 |  28 | w   | lamp92  |
+----+------+-----+-----+---------+
3 rows in set (0.00 sec)

mysql> select * from stu where id>10 order by id limit 1;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
| 11 | sad  |  35 | m   | lamp94  |
+----+------+-----+-----+---------+
1 row in set (0.00 sec)

mysql> select * from stu where id<10 order by id desc limit 1;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
|  9 | qq03 |  23 | w   | lamp94  |
+----+------+-----+-----+---------+
1 row in set (0.00 sec)



-- �����

mysql> select rand();
+---------------------+
| rand()              |
+---------------------+
| 0.26680692868941175 |
+---------------------+
1 row in set (0.00 sec)

mysql> select rand();
+--------------------+
| rand()             |
+--------------------+
| 0.6335931258588965 |
+--------------------+
1 row in set (0.00 sec)

mysql> select *,rand() from stu;
+----+----------+-----+-----+---------+----------------------+
| id | name     | age | sex | classid | rand()               |
+----+----------+-----+-----+---------+----------------------+
|  1 | zhangsan |  20 | m   | lamp93  |   0.3675448739598923 |
|  2 | lisi     |  20 | m   | lamp93  |    0.936945022956417 |
|  3 | wangwu   |  21 | w   | lamp93  |   0.5820905236360528 |
|  4 | zhaoliu  |  25 | w   | lamp94  |  0.09961758004465847 |
|  5 | uu01     |  26 | m   | lamp94  |   0.7518163600487787 |
|  6 | uu02     |  28 | w   | lamp92  |  0.46022909084356306 |
|  7 | qq02     |  24 | m   | lamp92  | 0.045696404805124186 |
|  8 | uu03     |  32 | m   | lamp93  |   0.8477947822285767 |
|  9 | qq03     |  23 | w   | lamp94  |  0.10188472746115618 |
| 10 | aa       |  19 | m   | lamp93  |   0.9660393213536956 |
| 11 | sad      |  35 | m   | lamp94  |   0.5245424551186547 |
| 12 | tt       |  25 | m   | lamp92  |   0.7245943422658316 |
| 13 | wer      |  25 | w   | lamp94  |  0.04934437670683896 |
| 14 | xx       |  25 | m   | lamp92  |  0.07293888747034491 |
| 15 | kk       |   0 | w   | NULL    |  0.21666133796485265 |
+----+----------+-----+-----+---------+----------------------+
15 rows in set (0.00 sec)

mysql> select *,rand() from stu;
+----+----------+-----+-----+---------+---------------------+
| id | name     | age | sex | classid | rand()              |
+----+----------+-----+-----+---------+---------------------+
|  1 | zhangsan |  20 | m   | lamp93  |  0.8644900581468735 |
|  2 | lisi     |  20 | m   | lamp93  |  0.6724663075734547 |
|  3 | wangwu   |  21 | w   | lamp93  |  0.7688613941602981 |
|  4 | zhaoliu  |  25 | w   | lamp94  |  0.8269080788147711 |
|  5 | uu01     |  26 | m   | lamp94  |  0.8279562423266063 |
|  6 | uu02     |  28 | w   | lamp92  |  0.6590570059223632 |
|  7 | qq02     |  24 | m   | lamp92  |  0.8114163333656419 |
|  8 | uu03     |  32 | m   | lamp93  | 0.07991067979476478 |
|  9 | qq03     |  23 | w   | lamp94  |  0.9653044296105433 |
| 10 | aa       |  19 | m   | lamp93  |  0.5867901394020674 |
| 11 | sad      |  35 | m   | lamp94  | 0.03803743891235203 |
| 12 | tt       |  25 | m   | lamp92  | 0.42981680708920283 |
| 13 | wer      |  25 | w   | lamp94  | 0.03497174944260321 |
| 14 | xx       |  25 | m   | lamp92  |  0.8854083566790525 |
| 15 | kk       |   0 | w   | NULL    |  0.3221265658010976 |
+----+----------+-----+-----+---------+---------------------+
15 rows in set (0.00 sec)

mysql> select *,rand() from stu;
+----+----------+-----+-----+---------+----------------------+
| id | name     | age | sex | classid | rand()               |
+----+----------+-----+-----+---------+----------------------+
|  1 | zhangsan |  20 | m   | lamp93  |   0.9544077897019757 |
|  2 | lisi     |  20 | m   | lamp93  |   0.8056592818402306 |
|  3 | wangwu   |  21 | w   | lamp93  |  0.16507307082887093 |
|  4 | zhaoliu  |  25 | w   | lamp94  |  0.40838753935730787 |
|  5 | uu01     |  26 | m   | lamp94  |   0.5467185150335715 |
|  6 | uu02     |  28 | w   | lamp92  |    0.508429987829579 |
|  7 | qq02     |  24 | m   | lamp92  |   0.9019944247808256 |
|  8 | uu03     |  32 | m   | lamp93  |   0.9846821911490357 |
|  9 | qq03     |  23 | w   | lamp94  |  0.21742771213634657 |
| 10 | aa       |  19 | m   | lamp93  |  0.13309201796827094 |
| 11 | sad      |  35 | m   | lamp94  | 0.013176984165959978 |
| 12 | tt       |  25 | m   | lamp92  |   0.6666088976586321 |
| 13 | wer      |  25 | w   | lamp94  |   0.2935135665289253 |
| 14 | xx       |  25 | m   | lamp92  |  0.46774117040237523 |
| 15 | kk       |   0 | w   | NULL    |   0.4581651831587452 |
+----+----------+-----+-----+---------+----------------------+
15 rows in set (0.00 sec)

mysql> select *,rand() as m from stu order by m;
+----+----------+-----+-----+---------+----------------------+
| id | name     | age | sex | classid | m                    |
+----+----------+-----+-----+---------+----------------------+
|  6 | uu02     |  28 | w   | lamp92  | 0.011622778150833006 |
|  2 | lisi     |  20 | m   | lamp93  |  0.06351665785863685 |
|  4 | zhaoliu  |  25 | w   | lamp94  |  0.08333012748819787 |
|  9 | qq03     |  23 | w   | lamp94  |   0.2508714704316775 |
| 13 | wer      |  25 | w   | lamp94  |   0.4107896754618638 |
|  5 | uu01     |  26 | m   | lamp94  |   0.4523226259763563 |
| 11 | sad      |  35 | m   | lamp94  |   0.4562438227760082 |
|  8 | uu03     |  32 | m   | lamp93  |   0.4708619140748511 |
|  3 | wangwu   |  21 | w   | lamp93  |   0.6547760140660926 |
| 15 | kk       |   0 | w   | NULL    |    0.698809705394143 |
|  7 | qq02     |  24 | m   | lamp92  |    0.701146043558741 |
| 12 | tt       |  25 | m   | lamp92  |   0.7559042226112487 |
| 14 | xx       |  25 | m   | lamp92  |   0.7862357402092178 |
| 10 | aa       |  19 | m   | lamp93  |   0.8417716406674791 |
|  1 | zhangsan |  20 | m   | lamp93  |   0.8876024353202455 |
+----+----------+-----+-----+---------+----------------------+
15 rows in set (0.00 sec)

mysql> select *,rand() as m from stu order by m;
+----+----------+-----+-----+---------+---------------------+
| id | name     | age | sex | classid | m                   |
+----+----------+-----+-----+---------+---------------------+
| 14 | xx       |  25 | m   | lamp92  | 0.09364021019417812 |
| 10 | aa       |  19 | m   | lamp93  |  0.1100751609635308 |
|  1 | zhangsan |  20 | m   | lamp93  |  0.1353413370767062 |
|  5 | uu01     |  26 | m   | lamp94  | 0.19384460728042258 |
|  7 | qq02     |  24 | m   | lamp92  |  0.2247716423354779 |
| 15 | kk       |   0 | w   | NULL    | 0.25666068518223306 |
|  3 | wangwu   |  21 | w   | lamp93  | 0.49536401917726175 |
|  9 | qq03     |  23 | w   | lamp94  |  0.5260600154530816 |
| 12 | tt       |  25 | m   | lamp92  |  0.5307534938033237 |
|  2 | lisi     |  20 | m   | lamp93  |   0.580277599934747 |
|  4 | zhaoliu  |  25 | w   | lamp94  |  0.7359873268157126 |
| 13 | wer      |  25 | w   | lamp94  |  0.7371801321741008 |
|  6 | uu02     |  28 | w   | lamp92  |  0.7612610866886201 |
|  8 | uu03     |  32 | m   | lamp93  |  0.8400749823451741 |
| 11 | sad      |  35 | m   | lamp94  |  0.9721957891920542 |
+----+----------+-----+-----+---------+---------------------+
15 rows in set (0.00 sec)

mysql> select *,rand() as m from stu order by m;
+----+----------+-----+-----+---------+----------------------+
| id | name     | age | sex | classid | m                    |
+----+----------+-----+-----+---------+----------------------+
|  1 | zhangsan |  20 | m   | lamp93  | 0.002382826062275866 |
|  3 | wangwu   |  21 | w   | lamp93  |   0.2025120800384433 |
|  9 | qq03     |  23 | w   | lamp94  |  0.22253554148835647 |
|  2 | lisi     |  20 | m   | lamp93  |  0.24193210549832517 |
|  6 | uu02     |  28 | w   | lamp92  |   0.2711295013047098 |
|  4 | zhaoliu  |  25 | w   | lamp94  |  0.28676411443088584 |
| 11 | sad      |  35 | m   | lamp94  |  0.33702552443093203 |
| 13 | wer      |  25 | w   | lamp94  |   0.4006653673953054 |
| 10 | aa       |  19 | m   | lamp93  |   0.4009264236324713 |
| 12 | tt       |  25 | m   | lamp92  |   0.4823483819908913 |
| 14 | xx       |  25 | m   | lamp92  |   0.5562817217374981 |
|  8 | uu03     |  32 | m   | lamp93  |   0.5705837715143187 |
| 15 | kk       |   0 | w   | NULL    |   0.5794125372352196 |
|  5 | uu01     |  26 | m   | lamp94  |   0.8262843627727445 |
|  7 | qq02     |  24 | m   | lamp92  |   0.8767944489389606 |
+----+----------+-----+-----+---------+----------------------+
15 rows in set (0.00 sec)

mysql> select *,rand() as m from stu order by m;
+----+----------+-----+-----+---------+---------------------+
| id | name     | age | sex | classid | m                   |
+----+----------+-----+-----+---------+---------------------+
| 11 | sad      |  35 | m   | lamp94  | 0.03629378698421064 |
|  5 | uu01     |  26 | m   | lamp94  | 0.20840931237527105 |
|  1 | zhangsan |  20 | m   | lamp93  | 0.22821755169724817 |
|  3 | wangwu   |  21 | w   | lamp93  |  0.3295982632130368 |
| 12 | tt       |  25 | m   | lamp92  | 0.36188785020437825 |
|  2 | lisi     |  20 | m   | lamp93  | 0.40285017751422725 |
| 14 | xx       |  25 | m   | lamp92  |  0.4171260841350314 |
|  4 | zhaoliu  |  25 | w   | lamp94  |  0.4394408142561473 |
| 10 | aa       |  19 | m   | lamp93  |    0.60652703848344 |
| 13 | wer      |  25 | w   | lamp94  |  0.7005579208029042 |
|  6 | uu02     |  28 | w   | lamp92  |  0.7237241498415583 |
|  8 | uu03     |  32 | m   | lamp93  |  0.7957917952870873 |
| 15 | kk       |   0 | w   | NULL    |  0.9839566890000894 |
|  7 | qq02     |  24 | m   | lamp92  |  0.9933928428156235 |
|  9 | qq03     |  23 | w   | lamp94  |  0.9987804787222114 |
+----+----------+-----+-----+---------+---------------------+
15 rows in set (0.00 sec)

mysql> select * from stu order by rand() limit 3;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
|  6 | uu02 |  28 | w   | lamp92  |
| 11 | sad  |  35 | m   | lamp94  |
| 13 | wer  |  25 | w   | lamp94  |
+----+------+-----+-----+---------+
3 rows in set (0.00 sec)

mysql> select * from stu order by rand() limit 3;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
| 10 | aa   |  19 | m   | lamp93  |
|  9 | qq03 |  23 | w   | lamp94  |
|  8 | uu03 |  32 | m   | lamp93  |
+----+------+-----+-----+---------+
3 rows in set (0.00 sec)

mysql> select * from stu order by rand() limit 3;
+----+--------+-----+-----+---------+
| id | name   | age | sex | classid |
+----+--------+-----+-----+---------+
|  3 | wangwu |  21 | w   | lamp93  |
| 13 | wer    |  25 | w   | lamp94  |
|  2 | lisi   |  20 | m   | lamp93  |
+----+--------+-----+-----+---------+
3 rows in set (0.00 sec)

mysql> select * from stu order by rand() limit 3;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
| 13 | wer  |  25 | w   | lamp94  |
|  8 | uu03 |  32 | m   | lamp93  |
| 12 | tt   |  25 | m   | lamp92  |
+----+------+-----+-----+---------+
3 rows in set (0.00 sec)

mysql>

mysql> select max(age) from stu;
+----------+
| max(age) |
+----------+
|       35 |
+----------+
1 row in set (0.00 sec)

mysql> select * from stu where age=35;
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
| 11 | sad  |  35 | m   | lamp94  |
| 15 | kk   |  35 | w   | NULL    |
+----+------+-----+-----+---------+
2 rows in set (0.00 sec)

mysql> select * from stu where age=(select max(age) from stu);
+----+------+-----+-----+---------+
| id | name | age | sex | classid |
+----+------+-----+-----+---------+
| 11 | sad  |  35 | m   | lamp94  |
| 15 | kk   |  35 | w   | NULL    |
+----+------+-----+-----+---------+
2 rows in set (0.00 sec)



===============================================================
-- ����ѯ

-- ����ѯ��
--  1. where������
--  2. ���Ƕ�ײ�
--  3. Join ���Ӳ飺 ���� left join  ���� right join  ���� inner join
--=========================================================================
-- ѧ����Ϣ��
mysql> select * from stu;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
|  4 | zhaoliu  |  25 | w   | lamp94  |
|  5 | uu01     |  26 | m   | lamp94  |
|  6 | uu110    |  28 | w   | lamp93  |
|  7 | qq02     |  24 | m   | lamp92  |
|  8 | uu03     |  32 | m   | lamp93  |
|  9 | qq03     |  23 | w   | lamp94  |
| 10 | aa       |  19 | m   | lamp93  |
| 11 | sad      |  35 | m   | lamp94  |
| 14 | xx       |  25 | m   | lamp92  |
| 16 | cc01     |  22 | w   | lamp93  |
+----+----------+-----+-----+---------+
13 rows in set (0.00 sec)

-- ѧ�����Գɼ���
mysql> select * from grade;
+----+------+------+-------+
| id | sid  | php  | mysql |
+----+------+------+-------+
|  1 |    3 |   80 |    90 |
|  2 |    2 |   92 |    89 |
|  3 |    4 |   58 |    68 |
|  4 |    1 |   96 |    98 |
|  5 |    8 |   42 |    59 |
|  6 |    7 |   88 |    89 |
|  7 |    9 |   89 |    58 |
|  8 |   11 |   65 |    78 |
|  9 |   12 |   88 |    89 |
+----+------+------+-------+
9 rows in set (0.00 sec)

mysql>
-- ��ѯstuѧ���ͳɼ�grade����Ϣ����ʾ�����ֶ�
mysql> select * from stu,grade where stu.id = grade.sid;
+----+----------+-----+-----+---------+----+------+------+-------+
| id | name     | age | sex | classid | id | sid  | php  | mysql |
+----+----------+-----+-----+---------+----+------+------+-------+
|  3 | wangwu   |  21 | w   | lamp93  |  1 |    3 |   80 |    90 |
|  2 | lisi     |  20 | m   | lamp93  |  2 |    2 |   92 |    89 |
|  4 | zhaoliu  |  25 | w   | lamp94  |  3 |    4 |   58 |    68 |
|  1 | zhangsan |  20 | m   | lamp93  |  4 |    1 |   96 |    98 |
|  8 | uu03     |  32 | m   | lamp93  |  5 |    8 |   42 |    59 |
|  7 | qq02     |  24 | m   | lamp92  |  6 |    7 |   88 |    89 |
|  9 | qq03     |  23 | w   | lamp94  |  7 |    9 |   89 |    58 |
| 11 | sad      |  35 | m   | lamp94  |  8 |   11 |   65 |    78 |
+----+----------+-----+-----+---------+----+------+------+-------+
8 rows in set (0.06 sec)

-- ��ѯѧ���ͳɼ���Ĺ�����Ϣ��ֻ��ʾ�����ֶΡ�
mysql> select stu.id,name,classid,php,mysql from stu,grade where stu.id=grade.si
d;
+----+----------+---------+------+-------+
| id | name     | classid | php  | mysql |
+----+----------+---------+------+-------+
|  3 | wangwu   | lamp93  |   80 |    90 |
|  2 | lisi     | lamp93  |   92 |    89 |
|  4 | zhaoliu  | lamp94  |   58 |    68 |
|  1 | zhangsan | lamp93  |   96 |    98 |
|  8 | uu03     | lamp93  |   42 |    59 |
|  7 | qq02     | lamp92  |   88 |    89 |
|  9 | qq03     | lamp94  |   89 |    58 |
| 11 | sad      | lamp94  |   65 |    78 |
+----+----------+---------+------+-------+
8 rows in set (0.02 sec)
-- Ϊ���������
mysql> select s.id,s.name,s.classid,g.php,g.mysql from stu s,grade g where s.id=
g.sid;
+----+----------+---------+------+-------+
| id | name     | classid | php  | mysql |
+----+----------+---------+------+-------+
|  3 | wangwu   | lamp93  |   80 |    90 |
|  2 | lisi     | lamp93  |   92 |    89 |
|  4 | zhaoliu  | lamp94  |   58 |    68 |
|  1 | zhangsan | lamp93  |   96 |    98 |
|  8 | uu03     | lamp93  |   42 |    59 |
|  7 | qq02     | lamp92  |   88 |    89 |
|  9 | qq03     | lamp94  |   89 |    58 |
| 11 | sad      | lamp94  |   65 |    78 |
+----+----------+---------+------+-------+
8 rows in set (0.00 sec)

mysql>
-- ��ѯѧ���ͳɼ�����Ϣ����������ѧ��Ϊlamp93�ڵ�
mysql> select s.id,s.name,s.classid,g.php,g.mysql from stu s,grade g
    -> where s.id = g.sid and s.classid='lamp93';
+----+----------+---------+------+-------+
| id | name     | classid | php  | mysql |
+----+----------+---------+------+-------+
|  3 | wangwu   | lamp93  |   80 |    90 |
|  2 | lisi     | lamp93  |   92 |    89 |
|  1 | zhangsan | lamp93  |   96 |    98 |
|  8 | uu03     | lamp93  |   42 |    59 |
+----+----------+---------+------+-------+
4 rows in set (0.05 sec)

--ʹ��Ƕ�ײ�php�ɼ���ߵ�ѧ����Ϣ��
mysql> select * from stu where id in(select sid from grade where php=(select max
(php) from grade));
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
+----+----------+-----+-----+---------+
1 row in set (0.06 sec)

mysql>

mysql> select s.id,s.name,g.php,g.mysql from stu s,grade g where s.id=g.sid;
+----+----------+------+-------+
| id | name     | php  | mysql |
+----+----------+------+-------+
|  3 | wangwu   |   80 |    90 |
|  2 | lisi     |   92 |    89 |
|  4 | zhaoliu  |   58 |    68 |
|  1 | zhangsan |   96 |    98 |
|  8 | uu03     |   42 |    59 |
|  7 | qq02     |   88 |    89 |
|  9 | qq03     |   89 |    58 |
| 11 | sad      |   65 |    78 |
+----+----------+------+-------+
8 rows in set (0.00 sec)

-- ��������ʽ��ѯѧ���ͳɼ���Ϣ������������ѧ��Ϊ����û�еĳɼ���null��
mysql> select s.id,s.name,g.php,g.mysql from stu s left join grade g
    -> on s.id=g.sid;
+----+----------+------+-------+
| id | name     | php  | mysql |
+----+----------+------+-------+
| 10 | aa       | NULL |  NULL |
| 16 | cc01     | NULL |  NULL |
|  2 | lisi     |   92 |    89 |
|  7 | qq02     |   88 |    89 |
|  9 | qq03     |   89 |    58 |
| 11 | sad      |   65 |    78 |
|  5 | uu01     | NULL |  NULL |
|  8 | uu03     |   42 |    59 |
|  6 | uu110    | NULL |  NULL |
|  3 | wangwu   |   80 |    90 |
| 14 | xx       | NULL |  NULL |
|  1 | zhangsan |   96 |    98 |
|  4 | zhaoliu  |   58 |    68 |
+----+----------+------+-------+
13 rows in set (0.00 sec)

-- ��������ʽ��ѯѧ���ͳɼ���Ϣ�����������Գɼ�Ϊ����û�е�ѧ����null��
mysql> select s.id,s.name,g.php,g.mysql from grade g left join stu s
    -> on s.id=g.sid;
+------+----------+------+-------+
| id   | name     | php  | mysql |
+------+----------+------+-------+
|    3 | wangwu   |   80 |    90 |
|    2 | lisi     |   92 |    89 |
|    4 | zhaoliu  |   58 |    68 |
|    1 | zhangsan |   96 |    98 |
|    8 | uu03     |   42 |    59 |
|    7 | qq02     |   88 |    89 |
|    9 | qq03     |   89 |    58 |
|   11 | sad      |   65 |    78 |
| NULL | NULL     |   88 |    89 |
+------+----------+------+-------+
9 rows in set (0.00 sec)

mysql>

--��ѯlamp93��ѧ��������Ϣ
mysql> select s.id,s.name,s.classid,g.php,g.mysql from stu s left join grade g
    -> on s.id=g.sid where s.classid='lamp93';
+----+----------+---------+------+-------+
| id | name     | classid | php  | mysql |
+----+----------+---------+------+-------+
|  1 | zhangsan | lamp93  |   96 |    98 |
|  2 | lisi     | lamp93  |   92 |    89 |
|  3 | wangwu   | lamp93  |   80 |    90 |
|  6 | uu110    | lamp93  | NULL |  NULL |
|  8 | uu03     | lamp93  |   42 |    59 |
| 10 | aa       | lamp93  | NULL |  NULL |
| 16 | cc01     | lamp93  | NULL |  NULL |
+----+----------+---------+------+-------+
7 rows in set (0.00 sec)

mysql> select s.id,s.name,s.classid,g.php,g.mysql from stu s left join grade g
    -> on s.id=g.sid where s.classid='lamp93' order by g.php desc;
+----+----------+---------+------+-------+
| id | name     | classid | php  | mysql |
+----+----------+---------+------+-------+
|  1 | zhangsan | lamp93  |   96 |    98 |
|  2 | lisi     | lamp93  |   92 |    89 |
|  3 | wangwu   | lamp93  |   80 |    90 |
|  8 | uu03     | lamp93  |   42 |    59 |
| 16 | cc01     | lamp93  | NULL |  NULL |
|  6 | uu110    | lamp93  | NULL |  NULL |
| 10 | aa       | lamp93  | NULL |  NULL |
+----+----------+---------+------+-------+
7 rows in set (0.00 sec)

mysql>


--��ѯ����student_id��kind_id�����ֶζ���ͬ����������Щ
select * from (select count(*) num,student_id,kind_id from student_speciality_item a group by a.student_id,a.kind_id) t where t.num>1


