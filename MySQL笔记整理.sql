  MySQL
一、概念：
   数据： data
   数据库： DB
   数据库管理系统：DBMS
   数据库系统：DBS
   MySQL：数据库  
   mysql：客户端命令（用来连接服务或发送sql指令）
   SQL：结构化查询语言 ，其中MySQL支持这个。
   SQL语言分为4个部分：DDL、DML、DQL、DCL
   
二、连接数据库：
   mysql -h 主机名 -u 用户名  -p密码  库名
   
   C:\>mysql  --采用匿名账号和密码登陆本机服务
   C:\>mysql -h localhost -u root -proot   --采用root账号和root密码登陆本机服务
   C:\>mysql -u root -p   --推荐方式默认登陆本机
	 Enter password: ****

   C:\>mysql -u root -p lamp61  --直接进入lamp61数据库的方式登陆
   
三、授权：
	格式：grant 允许操作 on 库名.表名 to 账号@来源 identified by '密码';
	
	--实例：创建zhangsan账号，密码123，授权lamp61库下所有表的增/删/改/查数据,来源地不限
	mysql> grant select,insert,update,delete on lamp61.* to zhangsan@'%' identified by '123';
	Query OK, 0 rows affected (0.00 sec)
	

四、SQL的基本操作
	mysql>show databases; 	--查看当前用户下的所有数据库
	mysql>create database [if not exists] 数据库名; --创建数据库
	mysql> use test;	--选择进入test数据库
	mysql> drop database 数据库名;  --删除一个数据库 
	
	mysql> show tables; --查看当前库下的所有表格
	mysql> select database();  --查看当前所在的数据库
	mysql> desc tb1;  --查看tb1的表结构。                                                                      
	mysql> create table demo(	--创建demo表格
		-> id int unsigned auto_increment primary key,
		-> name varchar(16) not null,
		-> age int,
		-> sex enum('w','m') not null default 'm');
	Query OK, 0 rows affected (0.05 sec)

	mysql> desc demo;  --查看表结构
	+-------+---------------+------+-----+---------+-------+
	| Field | Type          | Null | Key | Default | Extra |
	+-------+---------------+------+-----+---------+-------+
	| name  | varchar(16)   | NO   |     | NULL    |       |
	| age   | int(11)       | YES  |     | NULL    |       |
	| sex   | enum('w','m') | NO   |     | m       |       |
	+-------+---------------+------+-----+---------+-------+
	3 rows in set (0.00 sec)
	
	mysql>drop table if exists mytab;  -- 尝试删除mytab表格
	
	
	--添加一条数据
	mysql> insert into demo(name,age,sex) values('zhangsan',20,'w');
	Query OK, 1 row affected (0.00 sec)
	
	mysql> insert into demo values('lisi',22,'m'); --不指定字段名来添加数据
	Query OK, 1 row affected (0.00 sec)
	
	mysql> insert into demo(name,age) values('wangwu',23); --指定部分字段名来添加数据
	Query OK, 1 row affected (0.00 sec)
	
	--批量添加数据
	mysql> insert into demo(name,age,sex) values('aaa',21,'w'),("bbb",22,'m');
	Query OK, 2 rows affected (0.00 sec)
	Records: 2  Duplicates: 0  Warnings: 0
	
	mysql> select * from demo; --查询数据
	
	mysql> update demo set age=24 where name='aaa';  --修改
	Query OK, 1 row affected (0.02 sec)
	Rows matched: 1  Changed: 1  Warnings: 0
		
	mysql> delete from demo where name='bbb';  --删除
	Query OK, 1 row affected (0.00 sec)
	
	
	mysql>\h   -- 快捷帮助
	mysql>\c   -- 取消命令输入
	mysql>\s   -- 查看当前数据库的状态
	mysql>\q   -- 退出mysql命令行
	
五、 MySQL数据库的数据类型：

	MySQL的数据类型分为四大类：数值类型、字串类型、日期类型、NULL。
	
	5.1 数值类型：
		*tinyint(1字节)
		smallint(2字节)
		mediumint(3字节)
		*int(4字节)
		bigint(8字节)
		*float(4字节)   float(6,2)
		*double(8字节)  
		decimal(自定义)字串形数值
		
	 5.2 字串类型
		普通字串
		*char  定长字串   	 char(8)  
		*varchar 可变字串 varchar(8)
		
		二进制类型
		tinyblob
		blob
		mediumblob
		longblob
		
		文本类型
		tinytext
		*text      常用于<textarea></textarea>
		mediumtext
		longtext
		
		*enum枚举
		set集合
		
	5.3 时间和日期类型：
		date  年月日
		time  时分秒
		datatime 年月日时分秒
		timestamp 时间戳
		year 年
	
	5.4 NULL值
		NULL意味着“没有值”或“未知值”
		可以测试某个值是否为NULL
		不能对NULL值进行算术计算
		对NULL值进行算术运算，其结果还是NULL
		0或NULL都意味着假，其余值都意味着真

	MySQL的运算符：
		算术运算符：+ - * / % 
		比较运算符：= > < >= <= <> != 
		数据库特有的比较：in,not in, is null,is not null,like, between and 
		逻辑运算符：and or not
	
 六、 表的字段约束：
		unsigned 无符号(正数)
		zerofill 前导零填充
		auto_increment  自增
		default	默认值
		not null  非空
		PRIMARY KEY 主键 （非null并不重复）
		unique 唯一性   （可以为null但不重复）
		index 常规索引
		
七: 建表语句格式：
	 create table 表名(
	   字段名 类型 [字段约束],
	   字段名 类型 [字段约束],
	   字段名 类型 [字段约束],
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

	mysql> show create table stu\G  --查看建表的语句
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
	
	
八、修改表结构
-------------------------------------
    格式： alter table 表名 action（更改选项）;
     更改选项：
        1. 添加字段：alter table 表名 add 字段名信息
            例如：
                -- 在user表的最后追加一个num字段 设置为int not null
                mysql> alter table user add num int not null;
                
                -- 在user表的email字段后添加一个age字段，设置int not null default 20；
                mysql> alter table user add age int not null default 20 after email;

                -- 在user表的最前面添加一个aa字段设置为int类型
                mysql> alter table user add aa int first;

        2. 删除字段：alter table 表名 drop 被删除的字段名
            例如：-- 删除user表的aa字段
                 mysql> alter table user drop aa;
	
        3. 修改字段：alter table 表名 change[modify] 被修改后的字段信息
            其中：change可以修改字段名， modify 不修改
            例如：
            -- 修改user表中age字段信息（类型），（使用modify关键字的目的不修改字段名）
            mysql> alter table user modify age tinyint unsigned not null default 20;
            -- 修改user表的num字段改为mm字段并添加了默认值（使用change可以改字段名）
            mysql> alter table user change num mm int not null default 10;
        
        4. 添加和删除索引
            -- 为user表中的name字段添加唯一性索引，索引名为uni_name;
            mysql> alter table user add unique uni_name(name);
            -- 为user表中的email字段添加普通索引，索引名为index_eamil
            mysql> alter table user add index index_email(email);
            -- 将user表中index_email的索引删除
            mysql> alter table user drop index index_email;
	
        5. 更改表名称：
            ALTER TABLE 旧表名 RENAME AS 新表名

        6. 更改AUTO_INCREMENT初始值:
            ALTER TABLE 表名称 AUTO_INCREMENT=1
        
        7. 更改表类型：
            ALTER TABLE 表名称 ENGINE="InnoDB"
        
    MySQL数据库中的表类型一般常用两种：MyISAM和InnoDB
    区别：MyISAM类型的数据文件有三个frm(结构)、MYD（数据）、MYI（索引）
          MyISAM类型中的表数据增 删 改速度快，不支持事务，没有InnoDB安全。
          
          InnoDB类型的数据文件只有一个 .frm
          InnoDB类型的表数据增 删 改速度没有MyISAM的快，但支持事务，相对安全。
        
九、数据的DML操作：添加数据，修改数据，删除数据
----------------------------------------------------------
    1. 添加数据
        格式： insert into 表名[(字段列表)] values(值列表...);
        --标准添加（指定所有字段，给定所有的值）
        mysql> insert into stu(id,name,age,sex,classid) values(1,'zhangsan',20,'m','lamp93');
        Query OK, 1 row affected (0.13 sec)

        mysql>
        --指定部分字段添加值
        mysql> insert into stu(name,classid) value('lisi','lamp93');
        Query OK, 1 row affected (0.11 sec)

        -- 不指定字段添加值
        mysql> insert into stu value(null,'wangwu',21,'w','lamp93');
        Query OK, 1 row affected (0.22 sec)

        -- 批量添加值
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
        
    2. 修改操作：
        格式：update 表名 set 字段1=值1,字段2=值2,字段n=值n... where 条件 
        
        -- 将id为11的age改为35，sex改为m值
        mysql> update stu set age=35,sex='m' where id=11;
        Query OK, 1 row affected (0.16 sec)
        Rows matched: 1  Changed: 1  Warnings: 0

        -- 将id值为12和14的数据值sex改为m，classid改为lamp92
        mysql> update stu set sex='m',classid='lamp92' where id=12 or id=14 --等价于下面
        mysql> update stu set sex='m',classid='lamp92' where id in(12,14);
        Query OK, 2 rows affected (0.09 sec)
        Rows matched: 2  Changed: 2  Warnings: 0
        
    3. 删除操作
         格式：delete from 表名 [where 条件]
         -- 删除stu表中id值为100的数据
        mysql> delete from stu where id=100;
        Query OK, 0 rows affected (0.00 sec)

        -- 删除stu表中id值为20到30的数据
        mysql> delete from stu where id>=20 and id<=30;
        Query OK, 0 rows affected (0.00 sec)

        -- 删除stu表中id值为20到30的数据（等级于上面写法）
        mysql> delete from stu where id between 20 and 30;
        Query OK, 0 rows affected (0.00 sec)

        -- 删除stu表中id值大于200的数据
        mysql> delete from stu where id>200;
        Query OK, 0 rows affected (0.00 sec)
       
十、数据的DQL操作：数据查询
==============================================
    格式：
        select [字段列表]|* from 表名
        [where 搜索条件]
        [group by 分支字段 [having 子条件]]
        [order by 排序 asc|desc]
        [limit 分页参数]
        
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
    
    1. where条件查询
    1. 查询班级为lamp93期的学生信息
    mysql> select * from stu where classid='lamp93';
    
    2. 查询lamp93期的男生信息（sex为m）
    mysql> select * from stu where classid='lamp93' and sex='m';
    
    3. 查询id号值在10以上的学生信息
    mysql> select * from  stu where id>10;
    
    4. 查询年龄在20至25岁的学生信息
    mysql> select * from stu where age>=20 and age<=25;
    mysql> select * from stu where age between 20 and 25;
    
    5. 查询年龄不在20至25岁的学生信息
    mysql> select * from stu where age not between 20 and 25;
    mysql> select * from stu where age<20 or age>25;
    
    6. 查询id值为1,8,4,10,14的学生信息
    select * from stu where id in(1,8,4,10,14);
    mysql> select * from stu where id=1 or id=8 or id=4 or id=10 or id=14;
    
    7. 查询lamp93和lamp94期的女生信息
    mysql> select * from stu where classid in('lamp93','lamp94') and sex='w';
    mysql> select * from stu where (classid='lamp93' or classid='lamp94') and sex='w'
 

  2. MySQL中的统计查询：
  ----------------------------------------
     统计函数（聚合函数）：count()  sum()  max()  min()  avg();

    --统计stu表中的数据条数，年龄总和，最大年龄，最小年龄和平均年龄
    mysql> select count(*),sum(age),max(age),min(age),avg(age) from stu;
    +----------+----------+----------+----------+----------+
    | count(*) | sum(age) | max(age) | min(age) | avg(age) |
    +----------+----------+----------+----------+----------+
    |       15 |      348 |       35 |        0 |  23.2000 |
    +----------+----------+----------+----------+----------+
    1 row in set (0.00 sec)
    
    --统计lamp93期的学生人数和最大最小年龄；   
    mysql> select count(*),max(age),min(age) from stu where classid="lamp93";
    +----------+----------+----------+
    | count(*) | max(age) | min(age) |
    +----------+----------+----------+
    |        5 |       32 |       19 |
    +----------+----------+----------+
    1 row in set (0.00 sec)
    
  3. 分组：group by  和分组后的子条件having
  ------------------------------------------------
    -- 对性别分组查看
    mysql> select sex from stu group by sex;
    +-----+
    | sex |
    +-----+
    | m   |
    | w   |
    +-----+
    2 rows in set (0.00 sec)

    -- 查看按班级分组
    mysql> select classid from stu group by classid;
     
    -- 按性别分组并统计人数
    mysql> select sex,count(*) from stu group by sex;

    -- 按班级分组并统计人数
    mysql> select classid,count(*) from stu group by classid;

    -- 统计lamp93期的男女生各多少人。
    mysql> select sex,count(*) from stu where classid='lamp93' group by sex;
   
    -- 按班级分组统计每个班级的人数，要求只输出人数在4人以上的
    mysql> select classid,count(*) from stu group by classid having count(*)>4;
  
    -- 按班级分组统计每个班级的人数，要求只输出人数在4人以上的（人数使用num别名）
    mysql> select classid,count(*) num from stu group by classid having num>4; 
    
    
  4. 排序：order by 字段名[asc|desc]   asc升序（默认）  desc降序
  -------------------------------------------------------------------
    -- 按年龄升序排序（默认asc）
    mysql> select * from stu order by age;
    
    -- 按年龄做降序排序
    mysql> select * from stu order by age desc;
    
    -- 按年龄升序排序
    mysql> select * from stu order by age asc;
    
    -- 按性别升序排序
    mysql> select * from stu order by sex;
    
    --多列排序：按性别排序升序排序，相同按年龄升序排序
    mysql> select * from stu order by sex,age;
    
    -- 按班级降序排序，相同的班级按年龄升序排
    mysql> select * from stu order by classid desc,age asc;
    
    
  5. limit 分页语句（提取部分数据）
  -----------------------------------------------------
  格式：....  limit m  提取前m条
        ....  limit m,n  从m条后开始提取前n条
        
    -- 提取前5条信息
    mysql> select * from stu limit 5;
    
    -- 提取前3条信息
    mysql> select * from stu limit 3;

    -- 提取前5条信息
    mysql> select * from stu limit 0,5;
    
    -- 排除前5条，提取后5条信息
    mysql> select * from stu limit 5,5;

    -- 排除前10条，提取后5条信息
    mysql> select * from stu limit 10,5;
    
    --提取年龄最大的3条
    mysql> select * from stu order by age desc limit 3;
    
    --获取id为10的下一条
    mysql> select * from stu where id>10 order by id limit 1;
    
    --获取id为10的上一条
    mysql> select * from stu where id<10 order by id desc limit 1;
    
    --随机取3条。
    mysql> select * from stu order by rand() limit 3;
    
    -- 获取年龄最大的学生信息（采用的嵌套查询）
    mysql> select * from stu where age=(select max(age) from stu);
    mysql> select * from stu where age in(select max(age) from stu);
    +----+------+-----+-----+---------+
    | id | name | age | sex | classid |
    +----+------+-----+-----+---------+
    | 11 | sad  |  35 | m   | lamp94  |
    | 15 | kk   |  35 | w   | NULL    |
    +----+------+-----+-----+---------+
    2 rows in set (0.00 sec)
    

十一：导入和导出
-----------------------------------
-- 将lamp93库导出
D:\>mysqldump -u root -p lamp93 >lamp93.sql
Enter password:

---- 将lamp93库中的stu表导出
D:\>mysqldump -u root -p lamp93 stu >lamp93_stu.sql
Enter password:

-- 将lamp93库导入
D:\>mysql -u root -p lamp93<lamp93.sql
Enter password:

-- 将lamp93库中stu表导入
D:\>mysql -u root -p lamp93<lamp93_stu.sql
Enter password:



 //需求分析->功能（模块）->数据库设计->找实体、找属性、找关系
 
 
 
-- 表结构的增删改查

-- 在user表的最后追加一个num字段 设置为int not null
mysql> alter table user add num int not null;
Query OK, 0 rows affected (0.33 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- 在user表的email字段后添加一个age字段，设置int not null default 20；
mysql> alter table user add age int not null default 20 after email;
Query OK, 0 rows affected (0.30 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- 在user表的最前面添加一个aa字段设置为int类型
mysql> alter table user add aa int first;
Query OK, 0 rows affected (0.39 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- 删除user表的aa字段
mysql> alter table user drop aa;
Query OK, 0 rows affected (0.27 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- 修改user表中age字段信息（类型），（使用modify关键字的目的不修改字段名）
mysql> alter table user modify age tinyint unsigned not null default 20;
Query OK, 0 rows affected (0.27 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- 修改user表的num字段改为mm字段并添加了默认值（使用change可以改字段名）
mysql> alter table user change num mm int not null default 10;
Query OK, 0 rows affected (0.25 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- 为user表中的name字段添加唯一性索引，索引名为uni_name;
mysql> alter table user add unique uni_name(name);
Query OK, 0 rows affected (0.27 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- 为user表中的email字段添加普通索引，索引名为index_eamil
mysql> alter table user add index index_email(email);
Query OK, 0 rows affected (0.31 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- 将user表中index_email的索引删除
mysql> alter table user drop index index_email;
Query OK, 0 rows affected (0.25 sec)
Records: 0  Duplicates: 0  Warnings: 0

-- 将user表的表类型改为MyiSAM
mysql> alter table user engine="myisam";
Query OK, 0 rows affected (0.28 sec)
Records: 0  Duplicates: 0  Warnings: 0


 =========================================================================
 =========================================================================
 =========================================================================
 
 
 
 -- 登录mysql数据库
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

mysql> show databases;  --查看当前用户下允许看到的数据库
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

mysql> create database mydb; --创建数据库mydb
Query OK, 1 row affected (0.13 sec)

mysql> create database mydb; --创建数据库mydb 报错原因是数据库已存在
ERROR 1007 (HY000): Can''t create database 'mydb'; database exists
mysql>
-- 若mydb数据库不存在则创建
mysql> create database if not exists mydb;
Query OK, 1 row affected, 1 warning (0.00 sec)

-- 尝试删除mydb数据库（若存在则删除）
mysql> drop database if exists mydb;
Query OK, 0 rows affected (0.14 sec)

mysql>
mysql> use lamp93; --选择lamp93数据库
Database changed

mysql> select database(); --查看当前在哪个数据库里
+------------+
| database() |
+------------+
| lamp93     |
+------------+
1 row in set (0.00 sec)


--======MySQL中的表操作========================

--1. 创建数据表
     create table 表名(
          字段名 类型 [字段约束],
          字段名 类型 [字段约束],
          ...
      );


mysql>
mysql> --创建tb1表，内有两个字段（id，name）
mysql> create table tb1(id int,name varchar(8));
Query OK, 0 rows affected (0.31 sec)

-- 创建tb2表，内有4个字段
mysql> create table tb2(
    -> id int,
    -> name varchar(8),
    -> age tinyint,
    -> sex char(1)
    -> );
Query OK, 0 rows affected (0.13 sec)

mysql> show tables; --查看当前数据库中所有表
+------------------+
| Tables_in_lamp93 |
+------------------+
| tb1              |
| tb2              |
+------------------+
2 rows in set (0.08 sec)

mysql> desc tb1; --查看tb1的表结构
+-------+------------+------+-----+---------+-------+
| Field | Type       | Null | Key | Default | Extra |
+-------+------------+------+-----+---------+-------+
| id    | int(11)    | YES  |     | NULL    |       |
| name  | varchar(8) | YES  |     | NULL    |       |
+-------+------------+------+-----+---------+-------+
2 rows in set (0.11 sec)

mysql> desc tb2; --查看tb2的表结构
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
-- 查看tb1表的建表语句
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
mysql> drop table tb1; --删除数据表tb1
Query OK, 0 rows affected (0.09 sec)


---=========表中数据库操作=================
--添加数据
--insert into 表名[(字段列表)] values(值列表);

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

-- 一次性添加多条数据
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

--2. 查看数据
-- select 字段名列表|*  from 表名 [条件][分组][排序][分页]
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

-- ============修改表中数据=============
-- update 表名 set 字段名1=修改值[,字段名2=修改值,...] where 条件（哪些数据执行修改）

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

-- =======数据删除============
-- delete from 表名 where 条件 

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
-- 使用表类型和约束创建表
--======================================
mysql> create table stu(
    -> id int unsigned auto_increment primary key,
    -> name varchar(8) not null unique,
    -> age tinyint unsigned not null default 20,
    -> sex enum('m','w') not null default 'm',
    -> classid char(6)
    -> );
Query OK, 0 rows affected (0.23 sec)
-- 创建学生stu表
-- id字段 int类型 无符号 自增 主键
-- 姓名name字段 类型varchar（8） 非空 唯一性
-- age字段 年龄 无符号 非空 默认值20
-- sex字段 枚举类型


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



--======数据库的导出和导入==========

--导出
D:\xampp\htdocs\lamp93\lesson26_mysql>mysqldump -u root -p lamp93>lamp93.sql
Enter password:

--导入 （条件是数据库lamp93必须在）
D:\xampp\htdocs\lamp93\lesson26_mysql>mysql -u root -p lamp93<lamp93.sql
Enter password:


--=====================================================


-- 创建用户信息表
mysql> create table user(
    -> id int unsigned not null auto_increment primary key,
    -> name varchar(16) not null,
    -> pass char(32) not null,
    -> email varchar(32) not null,
    -> phone varchar(11),
    -> addtime datetime
    -> );
Query OK, 0 rows affected (0.28 sec)

-- 查看表结构
show full fields from user; 
					    
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
-- 在user表的最后追加一个num字段 设置为int not null
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

-- 在user表的email字段后添加一个age字段，设置int not null default 20；
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

-- 在user表的最前面添加一个aa字段设置为int类型
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
-- 删除user表的aa字段
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

-- 修改user表中age字段信息（类型），（使用modify关键字的目的不修改字段名）
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

-- 修改user表的num字段改为mm字段并添加了默认值（使用change可以改字段名）
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

-- 为user表中的name字段添加唯一性索引，索引名为uni_name;
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

-- 为user表中的email字段添加普通索引，索引名为index_eamil
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

-- 将user表中index_email的索引删除
mysql> alter table user drop index index_email;
Query OK, 0 rows affected (0.25 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql>
-- 将user表的表类型改为MyiSAM
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
    -- 数据的增、改、删除等操作
--============================================
-- 查看表结构
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

--标准添加（指定所有字段，给定所有的值）
mysql> insert into stu(id,name,age,sex,classid) values(1,'zhangsan',20,'m','lamp93');
Query OK, 1 row affected (0.13 sec)

mysql>
--指定部分字段添加值
mysql> insert into stu(name,classid) value('lisi','lamp93');
Query OK, 1 row affected (0.11 sec)

-- 不指定字段添加值
mysql> insert into stu value(null,'wangwu',21,'w','lamp93');
Query OK, 1 row affected (0.22 sec)

-- 批量添加值
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


-- 将id为11的age改为35，sex改为m值
mysql> update stu set age=35,sex='m' where id=11;
Query OK, 1 row affected (0.16 sec)
Rows matched: 1  Changed: 1  Warnings: 0

-- 将id值为12和14的数据值sex改为m，classid改为lamp92
mysql> update stu set sex='m',classid='lamp92' where id=12 or id=14 --等价于下面
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
-- 删除stu表中id值为100的数据
mysql> delete from stu where id=100;
Query OK, 0 rows affected (0.00 sec)

-- 删除stu表中id值为20到30的数据
mysql> delete from stu where id>=20 and id<=30;
Query OK, 0 rows affected (0.00 sec)

-- 删除stu表中id值为20到30的数据（等级于上面写法）
mysql> delete from stu where id between 20 and 30;
Query OK, 0 rows affected (0.00 sec)

-- 删除stu表中id值大于200的数据
mysql> delete from stu where id>200;
Query OK, 0 rows affected (0.00 sec)

mysql>

-- 数据的查询
============================================
-- 查询所有字段所有的数据信息
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

--查询id、name和classid字段的信息
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

-- 查询部分字段信息，并将name字段名改为stuname（使用as关键字）
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

-- 查询部分字段信息，并将name字段名改为stuname（省略as关键字）
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

--查询部分字段信息，并追加一个字段信息，值为beijing
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

-- 为追加的字段，设置一个别名city
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
-- 查询部分字段，并添加一个age2字段，值为当前的age+4
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

-- 查询一个字段（有重复）
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

-- 去除重复的查询一个字段信息
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


-- where条件查询
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
--2. 分组
--=====================================
-- 对性别分组查看
mysql> select sex from stu group by sex;
+-----+
| sex |
+-----+
| m   |
| w   |
+-----+
2 rows in set (0.00 sec)

-- 查看按班级分组
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
-- 按性别分组并统计人数
mysql> select sex,count(*) from stu group by sex;
+-----+----------+
| sex | count(*) |
+-----+----------+
| m   |        9 |
| w   |        6 |
+-----+----------+
2 rows in set (0.00 sec)

-- 按班级分组并统计人数
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

-- 统计lamp93期的男女生各多少人。
mysql> select sex,count(*) from stu where classid='lamp93' group by sex;
+-----+----------+
| sex | count(*) |
+-----+----------+
| m   |        4 |
| w   |        1 |
+-----+----------+
2 rows in set (0.00 sec)

mysql>
-- 按班级分组统计每个班级的人数，要求只输出人数在4人以上的
mysql> select classid,count(*) from stu group by classid having count(*)>4;
+---------+----------+
| classid | count(*) |
+---------+----------+
| lamp93  |        5 |
| lamp94  |        5 |
+---------+----------+
2 rows in set (0.00 sec)
-- 按班级分组统计每个班级的人数，要求只输出人数在4人以上的（人数使用num别名）
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
--=== 排序 ===
--============================
-- 按年龄升序排序（默认asc）
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

-- 按年龄做降序排序
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

-- 按年龄升序排序
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

-- 按性别升序排序
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

--多列排序：按性别排序升序排序，相同按年龄升序排序
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

-- 按班级降序排序，相同的班级按年龄升序排
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


-- 分页limit子句
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

-- 提取前5条信息
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

-- 提取前3条信息
mysql> select * from stu limit 3;
+----+----------+-----+-----+---------+
| id | name     | age | sex | classid |
+----+----------+-----+-----+---------+
|  1 | zhangsan |  20 | m   | lamp93  |
|  2 | lisi     |  20 | m   | lamp93  |
|  3 | wangwu   |  21 | w   | lamp93  |
+----+----------+-----+-----+---------+
3 rows in set (0.00 sec)

-- 提取前5条信息
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

-- 排除前5条，提取后5条信息
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

-- 排除前10条，提取后5条信息
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



-- 随机数

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
-- 多表查询

-- 多表查询：
--  1. where关联查
--  2. 多表嵌套查
--  3. Join 连接查： 左联 left join  右联 right join  内联 inner join
--=========================================================================
-- 学生信息表
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

-- 学生考试成绩表
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
-- 查询stu学生和成绩grade表信息，显示所有字段
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

-- 查询学生和成绩表的关联信息，只显示部分字段。
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
-- 为表起个别名
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
-- 查询学生和成绩表信息，附加条件学生为lamp93期的
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

--使用嵌套查php成绩最高的学生信息。
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

-- 以左联方式查询学生和成绩信息，（左联是以学生为主，没有的成绩补null）
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

-- 以左联方式查询学生和成绩信息，（左联是以成绩为主，没有的学生补null）
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

--查询lamp93期学生考试信息
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


--查询表中student_id和kind_id两个字段都相同的数据有哪些
select * from (select count(*) num,student_id,kind_id from student_speciality_item a group by a.student_id,a.kind_id) t where t.num>1


