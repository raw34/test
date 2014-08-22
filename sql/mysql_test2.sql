--创建数据库
create database SQL50
--打开SQL50数据库
use SQL50
--创建雇员表
drop table Emp
drop table Dept
create table Emp
(  Empno numeric(5,0) not null,--雇员的编号
   Ename nvarchar(10), --雇员名字
   Job nvarchar(9),    --雇员的职位
   Mgr numeric(5,0),--上级主管的编号
   Hiredate datetime, --入职日期
   Sal numeric(7,2),--薪金
   Comm numeric(7,2),--佣金
   Deptno numeric(2,0) --部门编号
)
go

--创建部门表

create table Dept
(
   Deptno numeric(2),--部门编号
   Dname nvarchar(14),--部门名称
   Loc nvarchar(13)--部门所在地
)
go
--插入数据
insert into Emp values
(7369,'SMITH','CLERK',7902,'2000-12-17',800,NULL,20)
insert into Emp values
(7499,'allen','SALESMAN',7698,'2001-2-20',1600,300,30)
insert into Emp values
(7521,'WARD','SALESMAN',7698,'2001-2-22',1250,500,30)
insert into Emp values
(7566,'JONES','MANAGER',7839,'2001-4-2',2975,NULL,20)
insert into Emp values
(7654,'MARTIN','SALESMAN',7698,'2001-9-28',1250,1400,30)
insert into Emp values
(7698,'BLAKE','MANAGER',7839,'2001-5-1',2850,NULL,30)
insert into Emp values
(7782,'CLARK','MANAGER',7839,'2001-6-9',2450,NULL,10)
insert into Emp values
(7788,'scott','ANALYST',7566,'2002-12-9',3000,NULL,20)
insert into Emp values
(7839,'king','PRESIDENT',NULL,'2001-11-17',5000,NULL,10)
insert into Emp values
(7844,'TURNER','SALESMAN',7698,'2001-9-8',1500,0,30)
insert into Emp values
(7876,'ADAMS','CLERK',7788,'2003-1-12',1100,NULL,20)
insert into Emp values
(7900,'JAMES','CLERK',7698,'2001-3-12',950,NULL,30)
insert into Emp values
(7902,'FORD','ANALYST',7566,'2001-3-12',3000,NULL,20)
insert into Emp values
(7934,'MILLER','CLERK',7782,'2002-01-23',1300,NULL,10)
GO
--插入数据
insert into Dept values(10,'ACCOUNTING','NEW YORK')
insert into Dept values(20,'RESEARCH','DALLAS')
insert into Dept values(30,'SALEA','CHICAGO')
insert into Dept values(40,'OPERATIONS','BOSTON')
GO

--1、查询所有雇员

select  Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from  Emp 

--2、查询所有部门

select Deptno,Dname,Loc from Dept

--3、查询没有佣金（COMM）的所有雇员的信息

select Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from Emp 
where Comm is null

--4、查询薪金（sal）和佣金（COMM）总数大于2000的所有的雇员信息

select Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from Emp 
where (Sal+Comm)>2000 or sal>2000 or comm>2000

--5、选择部门30中的雇员

select Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from Emp
 where Deptno=30

--6、列出所有办事员（'clerk'）的姓名，编号和部门

select Ename,Empno ,deptno from Emp where Job='CLERK'

--7、找出佣金高于薪金的雇员

select Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from Emp
 where Comm>sal

--8、找出佣金高于薪金60%的雇员

select Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from Emp
 where Comm>(sal*0.6)

--9、找出部门10中所有经理和部门20中的所有办事员的详细资料

select Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from Emp 
where (Job='MANAGER' and deptno=10)or (Job='CLERK'and Deptno=20) 

--10、找出部门10中所有经理，部门20中所有办事员，既不是经理又不是办事员但其薪金>=2000的所有雇员的详细资料

select Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from Emp 
where (Job='MANAGER' and deptno=10) or (Job='CLERK'and Deptno=20) or(job not in('MANAGER','CLERK')and sal>=2000)

--11、找出收取佣金的雇员的不同工作

select Ename,Job from Emp where comm  is not null

--12、找出不收取佣金或收取佣金低于100的雇员

select Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from Emp
 where comm is null or comm<100

--13、找出早于8年之前受雇的雇员

select Empno ,Ename  from Emp
 where Hiredate<(dateadd(yy,-8,getdate()))

--14、显示首字母是大写的所有雇员的姓名

select Ename from Emp where Ename collate chinese_PRC_CS_AI like '[A-Z]%'


--15、显示正好为5个字符的雇员的姓名

select Ename from Emp where Ename like '_____'

--16、显示带有‘R’的雇员的姓名

select Ename from Emp where Ename like '%R%'

--17、显示不带有‘R’放入雇员的姓名

--select Ename from Emp where Ename like '%[^R]%'

select Ename from Emp where Ename not like '%R%'


--18、显示包含‘A’的所有雇员的姓名及‘A’在姓名中的位置

select Ename ,charindex('A',Ename) 索引 from Emp where Ename like '%A%'

--19、显示所有雇员的姓名，用“a”替换“A”

select replace(Ename,'A','a') from Emp

--20、显示所有雇员的姓名的前三个字符

select Ename, substring(Ename,1,3)as 姓名的前三个字符 from Emp

--21、显示雇员的详细资料，按名称排序

select Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from Emp order  by Ename

--22、显示雇员姓名，根据其服务年限，将最老的雇员排在最前面

select Empno ,Ename ,Job ,Mgr ,Hiredate ,Sal ,Comm , Deptno from Emp order  by Hiredate

--23、显示所有雇员的姓名，工作和薪金，按工作内的工作的降序顺序排序，而工作按薪金排序

select Ename ,Job, Sal from Emp order  by Job desc,sal

--24、显示在一个月为30天的情况下所有雇员的日薪金，忽略小数

select ceiling((sal/30)) from Emp

--25、找出在（任何年份的）2月受聘的所有雇员

select Ename ,Hiredate from emp where datepart(month,Hiredate)=2

--26、对每个雇员，显示其加入公司的天数

select Ename,datediff(d,Hiredate,getdate()) from emp 

--27、列出至少有一个雇员的所有部门

select Dname,count(E.deptno) 雇员人数 from dept D join Emp E 
on D.deptno=E.deptno group by Dname

--28、列出各种类别工作的最低工资

select job, min(sal) 最低工资  from Emp group by job

--29、列出各个部门的MANAGER(经理)的最低薪金

select deptno 部门编号, min(sal) 最低工资  from Emp 
where job='MANAGER' group by deptno

--30、列出薪金高于公司平均的所有雇员

select Ename  from Emp where sal>(select avg(sal) from Emp)  

--31、列出各种工作类别的最低薪金，并使最低薪金大于1500

select job,min(sal) 最低薪金 from Emp 
--where sal >1500
 group by job 
 having min(sal)>1500
 select * from Emp order by job

--32、显示所有雇员的姓名和加入公司的年份和月份，按雇员受雇日期所在月排序，将最早年份的项目排在最前面

select Ename ,datepart(year,Hiredate) 年份,datepart(month,Hiredate) 月份 from Emp 
order by datepart(year,Hiredate),datepart(month,Hiredate)

--33、显示所有雇员的姓名以及满8年服务年限的日期

select Ename ,dateadd(yy,8,Hiredate) 满8年服务年限的日期 from Emp 
order by dateadd(yy,8,Hiredate)

--34、显示所有雇员的服务年限：总的年数或总的月数或总的天数

select Ename,datediff(dd,hiredate,getdate())总的天数,datediff(mm,Hiredate,getdate()) 总的月数 ,
datediff(yy,Hiredate,getdate())总的年数 from emp 

--35、列出按计算的字段排序的所有雇员的年薪，即：按照年薪对雇员进行排序，年薪指雇员每月的总收入总共12个月的累加

--创建年薪视图
 create view  View_AnnualPay
 as
  select Ename 雇员 ,sal*12 年薪  from Emp where comm is null union 
  select Ename  雇员, ((sal+comm)*12) 年薪 from  Emp where comm is not null --order by (((sal+comm)*12)or(SAl*12))
 go
 
 select *  from View_AnnualPay order by 年薪 
 
--36、列出年薪前5名的雇员
 
select top 5 * from View_AnnualPay order by 年薪 desc

--37、列出年薪低于10000的雇员

select * from View_AnnualPay  where 年薪<10000

--38、列出雇员的平均月薪和平均年薪

select avg(年薪/12) 平均月薪,avg(年薪) 平均年薪  from  View_AnnualPay

--39、列出部门名称和这些部门的雇员，同时列出那些没有雇员的部门

select Ename,D.Deptno from Emp E right join Dept D on D.deptno=E.deptno

--40、列出每个部门的信息以及该部门中雇员的数量

select D.Deptno,Dname ,Loc  ,count(E.Deptno)部门人数 from  Dept D left join Emp E on D.Deptno=E.Deptno group by D.Deptno,Dname ,Loc

--41、列出薪金比“SMITH”多的所有雇员

select Ename,sal from Emp where sal>(select sal from emp where Ename='SMITH')

--42、列出所有雇员的姓名及其直接上级的姓名

select   E.Ename 雇员姓名,E.job,E1.Ename 上司姓名,E1.job from Emp E inner join Emp E1 on E1.mgr=E.Empno 
--错误，雇员和上级反了

--43、列出入职日期早于起直接上级的所有雇员

select   E.Ename 雇员姓名,E.job,E1.Ename 上司姓名,E1.job from Emp E inner join Emp E1 on E1.mgr=E.Empno 
where  E.job<>E1.job and E.Hiredate>E1.Hiredate
--错误，雇员和上级反了


--44、列出所有办事员（“CLERK”）的姓名及其部门名称

select Ename,Dname from Emp E join Dept D on D.deptno=E.deptno where job='CLERK'

--45、列出从事“SALES”(销售)工作的雇员的姓名，假定不知道销售部门编号

select Ename from Emp where job='SALESMAN'

--46、列出与“SCOTT”从事相同工作的所有雇员

select Ename From Emp where job=(select job from Emp where Ename='SCOTT')

--47、列出某些雇员的姓名和薪金，条件是他们的薪金等于部门30中任何一个雇员的薪金

select Ename,sal from Emp where sal in(select sal from Emp where deptno=30)and deptno <>30

--48、列出某些雇员的姓名和薪金，条件是他们的薪金等于部门30中所有雇员的薪金

select Ename,sal from Emp where sal=(select sum(Sal) from Emp where Deptno=30)

--49、列出从事同一种工作但是属于不同部门的雇员的不同组合

select E.Ename,E.job,E1.Ename,E1.job from Emp E inner join Emp E1 on E.Deptno<>E1.Deptno and E.job=E1.job


--50、列出所有雇员的雇员名称、部门名称和薪金

select Ename,Dname,sal from Emp E join Dept D on E.deptno=D.deptno
