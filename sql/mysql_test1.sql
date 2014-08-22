1.建库建表

--create database company

create database company;

use company;

--create tables

--部门表
create table dept
(
    deptno int(3) primary key,
    dname varchar(14),
    loc varchar(13)
);

--雇员表
create table emp
(
    empno int(4) not null primary key,
    ename varchar(10),
    job varchar(10),
    mgr int(4),
    hiredate datetime,
    sal double,
    comm double,
    deptno int(3),
    foreign key(deptno) references dept(deptno)
);

--工资级别表
create table salgrade
(
    grade int(3) primary key,
    losal int(3),
    hisal int(3)
); 

----------------------------------------------------------------------------------------------------------------------------------------

2.插入数据（进行初始化）

use company;

--往部门表中查数据
insert into dept values(10,'Accounting','New York');
insert into dept values(20,'Research','Dallas');
insert into dept values(30,'Sales','Chicago');
insert into dept values(40,'Operations','Boston');
insert into dept values(50,'Admin','Washing');

--往雇员表中插数据
insert into emp values(7369,'Smith','Clerk',7902,'1980-12-17',800,0,20);
insert into emp values(7499,'Allen','Salesman',7698,'1981-2-20',1600,300,30);
insert into emp values(7844,'Turner','Salesman',7499,'1981-9-8',1500,0,30);
insert into emp values(7698,'Tom','Manager',0,'1981-9-8',6100,600,40);
insert into emp values(7876,'Adams','Clerk',7900,'1987-5-23',1100,0,20);
insert into emp values(7900,'James','Clerk',7698,'1981-12-3',2400,0,30);
insert into emp values(7902,'Ford','Analyst',7698,'1981-12-3',3000,null,20);
insert into emp values(7901,'Kik','Clerk',7900,'1981-12-3',1900,0,30);

--往工资级别表中插数据
insert into salgrade values(1,700,1200);
insert into salgrade values(2,1201,1400);
insert into salgrade values(3,1401,2000);
insert into salgrade values(4,2001,3000);
insert into salgrade values(5,3001,5000);
insert into salgrade values(6,5001,10000);

------------------------------------------------------------------------------------------------------------------------------------

3.必会的5个组函数：max,min,avg,sum,count 要牢牢记住

-----------------------------------------------------------------------------------------------------------------------------------

4.练习：

①查询雇员表中工资最高的雇员的员工号、员工姓名、工资和部门号。
select empno,ename,sal,deptno from emp
where sal = (select max(sal) from emp);

②单条查询语句综合练习题：
薪水大于1200的雇员，按照部门编号进行分组，分组后的平均薪水必须大于1500，查询各分组的平均工资，按照工资的倒序进行排列。
select avg(sal) avg_sal, deptno
from emp
where sal > 1200
group by deptno
having avg_sal > 1500
order by avg_sal desc;
说明：此句基本上包含了SQL语句的子语句和排列顺序：select（要查询的字段）->from（从哪一张或哪几张表或视图）->where（过滤条件）->group by(having)（分组及条件）->order by（按哪个或哪几个字段进行升序或降序排列）。
注意：SqlServer4.1中可能不支持在order语句中使用组函数avg，报错说：invalid use of group function（错误提示和现象有点对不上）
解决办法：给avg(sal)起个别名avg_sal，这样在order语句中就直接使用这个别名

③等值连接：
查询每个雇员和其所在的部门名
select ename,dname from emp,dept where (emp.deptno = dept.deptno);
或者（推荐）(on中就写连接条件，where中就写过滤条件，各司其职)
select ename,dname from emp join dept on(emp.deptno = dept.deptno);

④非等值连接：
查询每个雇员姓名及其工资所在的等级
select ename,grade from emp e join salgrade s on(e.sal between s.losal and s.hisal);

⑤查询雇员名第2个字母不是a的雇员的姓名、所在的组名、工资所在的等级。
三张表的连接查询（先连接，再加上where语句进行过滤）
select ename,dname,grade
from emp e join dept d on(e.deptno = d.deptno)
join salgrade s on(e.sal between s.losal and s.hisal)
where ename not like '_a%';

⑥查询每个雇员和其经理的姓名
自连接：（事实上只有一张表，但把它当成两张表来用，使用别名来进行区分）
select e1.ename,e2.ename from emp e1,emp e2 where (e1.mgr = e2.empno);
或者：（推荐用join语句）
select e1.ename,e2.ename from emp e1 join emp e2 on(e1.mgr = e2.empno);

⑦查询每个雇员和其经理的姓名（包括公司老板本身（他上面没有经理））
左外连接（会把左表中不符合连接条件的记录也显示出来）：
select e1.ename,e2.ename from emp e1 left join emp e2 on(e1.mgr = e2.empno);

⑧查询每个雇员的姓名及其所在部门的部门名（包括没有雇员的部门）
右外连接（会把右表中不符合连接条件的记录也显示出来）：
select ename,dname from emp e right join dept d on(e.deptno = d.deptno);

⑨子查询1：查询每个部门中工资最高的人的姓名、薪水和部门编号
先求出每个部门中的最高工资：
select max(sal) max_sal,deptno from emp group by deptno
在使用连接查询：
select ename,sal,e.deptno
from emp e join
(select max(sal) max_sal,deptno from emp group by deptno) t
on(e.sal = t.max_sal and e.deptno = t.deptno);

⑩子查询2：查询每个部门平均工资所在的等级
select deptno,avg_sal,grade from salgrade
join(select deptno,avg(sal) avg_sal from emp group by deptno) t
on(t.avg_sal between salgrade.losal and salgrade.hisal);
或者：
select deptno,avg_sal,grade from
(select deptno,avg(sal) avg_sal from emp group by deptno) t
join salgrade s on(t.avg_sal between s.losal and s.hisal);

?子查询3：查询每个部门内平均的薪水等级
先求每个人的薪水等级
select ename,deptno,grade from emp join salgrade s 
on(emp.sal between s.losal and s.hisal);
再按组进行分组求平均
select deptno,avg(grade) from
(select ename,deptno,grade from emp join salgrade s 
    on(emp.sal between s.losal and s.hisal)) t
group by deptno;

?子查询4：查询雇员中有哪些人是经理人：
select ename from emp where empno in(select distinct mgr from emp);
或者：
select ename from emp join
(select distinct mgr from emp) t
on(emp.empno=t.mgr);

?子查询5：不准用库函数，求雇员表中薪水的最高值。
思路：两张完全相同的雇员表，左边一张，右边一张。拿左表中的薪水和右表中的薪水进行比较，左表中的最高薪水值必定不可能小于右表中的某一薪水值。
先求出emp表中最高薪水以下的所有薪水值
select distinct e1.sal from emp e1 join emp e2 on(e1.sal < e2.sal);
不在此列的薪水值即为最高薪水值
select distinct sal from emp where sal not in(select distinct e1.sal from emp e1 join emp e2 on(e1.sal < e2.sal));



?子查询6：平均薪水最高的部门的部门编号
　①：先求出每个部门的平均薪水和部门号（把这个看成一张表）
select avg(sal) avg_sal,deptno from emp group by deptno;
　②：再求出平均薪水最高值（把这个看成一个值）
select max(avg_sal) from (select avg(sal) avg_sal,deptno from emp group by deptno) t;

　③：对①表使用②条件进行查询即可
select avg_sal,deptno from
(select avg(sal) avg_sal,deptno from emp group by deptno) t1
where avg_sal=
(select max(avg_sal) from (select avg(sal) avg_sal,deptno from emp group by deptno) t2);

说明:在Oracle中可以使用组函数嵌套来稍微简化SQL语句的复杂程度（最多是两层嵌套）：
select max(avg(sal)) from emp group by deptno;来求出平均薪水最高值
注意：这种组函数嵌套在MySQL中不可以用


?子查询7：求平均薪水最高的部门的部门名称（在子查询6的基础之上）
说明：在实际应用中，达到这种程度的SQL语句已经算比较复杂了。
select dname from dept where deptno = 
( select deptno from
    (select avg(sal) avg_sal,deptno from emp group by deptno) t1
    where avg_sal=
    (select max(avg_sal) from (select avg(sal) avg_sal,deptno from emp group by deptno) t2)
);

或者：

select d.dname, avg(sal) avg_sal from emp e join dept d where e.deptno = d.deptno 
group by e.sal order by avg_sal desc limit 1;

-------------------------------------------------------------------------------------------------------------------------------------------------

?子查询8：查询平均薪水的等级最低的部门名称
说明：在实际应用中，很少使用到如此复杂的SQL语句。但要掌握一步步的思路，本例是为了锻炼逻辑能力。

①求平均薪水
select avg(sal) avg_sal,deptno from emp group by deptno;

②求平均薪水的等级
select avg_sal,deptno,grade from
(select avg(sal) avg_sal,deptno from emp group by deptno) t
join salgrade s on(t.avg_sal between s.losal and hisal);

③求平均薪水的等级最低的那个值
select min(grade) from
(  select avg_sal,deptno,grade from
    (select avg(sal) avg_sal,deptno from emp group by deptno) t
    join salgrade s on(t.avg_sal between s.losal and hisal)
) t3;

④平均薪水的等级最低的部门的部门编号(将②和③组合起来，将②看成要查询的表，将③看成查询条件)
select deptno from
(   select avg_sal,deptno,grade from
    (select avg(sal) avg_sal,deptno from emp group by deptno) t
    join salgrade s on(t.avg_sal between s.losal and hisal)
) t2
where grade=
(   select min(grade) from
    (   select avg_sal,deptno,grade from
        (select avg(sal) avg_sal,deptno from emp group by deptno) t
        join salgrade s on(t.avg_sal between s.losal and hisal)
    ) t3
);

⑤平均薪水的等级最低的部门名称
select dname from dept where deptno=
(  select deptno from
    (   select avg_sal,deptno,grade from
        (select avg(sal) avg_sal,deptno from emp group by deptno) t
        join salgrade s on(t.avg_sal between s.losal and hisal)
    ) t2
    where grade=
    (   select min(grade) from
        (   select avg_sal,deptno,grade from
            (select avg(sal) avg_sal,deptno from emp group by deptno) t
            join salgrade s on(t.avg_sal between s.losal and hisal)
        ) t3
    )
);


或者：还有种思路，使用join连接多张表（效果同上面的④和⑤，但比上面的稍微简单些）
④查询平均薪水的等级最低的部门的部门名、部门编号、平均工资和等级
(将②和③组合起来，将②和dept表join起来，将③看成查询条件)
select dname,t2.deptno,avg_sal,grade from
(   select avg_sal,deptno,grade from
    (select avg(sal) avg_sal,deptno from emp group by deptno) t
    join salgrade s on(t.avg_sal between s.losal and hisal)
) t2
join dept on(t2.deptno=dept.deptno)
where t2.grade=
(   select min(grade) from
    (   select avg_sal,deptno,grade from
        (select avg(sal) avg_sal,deptno from emp group by deptno) t
        join salgrade s on(t.avg_sal between s.losal and hisal)
    ) t3
);

说明：本例中有个待改进的地方，就是有重复的语句段（出现了两次）：
select avg_sal,deptno,grade from
(select avg(sal) avg_sal,deptno from emp group by deptno) t
join salgrade s on(t.avg_sal between s.losal and hisal)


改进1：
在Oracle中使用创建视图，可以简化上面的SQL语句
（视图也是一张表，不过是虚表（实际数据仍然存在表emp和表salgrade中）、子查询）：
create view v$_dept_avg_sal_info as
select avg_sal,deptno,grade from
(select avg(sal) avg_sal,deptno from emp group by deptno) t
join salgrade s on(t.avg_sal between s.losal and hisal);
将上例简化如下：
select dname,t2.deptno,avg_sal,grade from
v$_dept_avg_sal_info t2
join dept on(t2.deptno=dept.deptno)
where t2.grade=
(   select min(grade) from v$_dept_avg_sal_info
);

改进2：
MySQL5.0中创建视图(MySQL5新特点(视图))：
待运行验证：
create view v_dept_avg_sal_info as
select avg_sal,deptno,grade from
(select avg(sal) avg_sal,deptno from emp group by deptno) t
join salgrade s on(t.avg_sal between s.losal and hisal);
将上例简化为：
select dname,v2.deptno,avg_sal,grade from
v_dept_avg_sal_info v2
join dept on(v2.deptno=dept.deptno)
where v2.grade=
(   select min(grade) from v_dept_avg_sal_info
);
