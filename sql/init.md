mysql> desc dept;
+--------+-------------+------+-----+---------+-------+
| Field  | Type        | Null | Key | Default | Extra |
+--------+-------------+------+-----+---------+-------+
| deptno | int(3)      | NO   | PRI | NULL    |       |
| dname  | varchar(14) | YES  |     | NULL    |       |
| loc    | varchar(13) | YES  |     | NULL    |       |
+--------+-------------+------+-----+---------+-------+
3 rows in set (0.04 sec)

mysql> desc emp;
+----------+-------------+------+-----+---------+-------+
| Field    | Type        | Null | Key | Default | Extra |
+----------+-------------+------+-----+---------+-------+
| empno    | int(4)      | NO   | PRI | NULL    |       |
| ename    | varchar(10) | YES  |     | NULL    |       |
| job      | varchar(10) | YES  |     | NULL    |       |
| mgr      | int(4)      | YES  |     | NULL    |       |
| hiredate | datetime    | YES  |     | NULL    |       |
| sal      | double      | YES  |     | NULL    |       |
| comm     | double      | YES  |     | NULL    |       |
| deptno   | int(3)      | YES  | MUL | NULL    |       |
+----------+-------------+------+-----+---------+-------+
8 rows in set (0.00 sec)

mysql> desc salgrade;
+-------+--------+------+-----+---------+-------+
| Field | Type   | Null | Key | Default | Extra |
+-------+--------+------+-----+---------+-------+
| grade | int(3) | NO   | PRI | NULL    |       |
| losal | int(3) | YES  |     | NULL    |       |
| hisal | int(3) | YES  |     | NULL    |       |
+-------+--------+------+-----+---------+-------+
3 rows in set (0.00 sec)