<?php 
require 'namespace1.php';
require 'namespace6.php';

echo Foo\Bar\subnamespace\FOO;
echo Test\Bar\subnamespace\FOO;

//use Foo\Bar\subnamespace;
//use Test\Bar\subnamespace;

use Foo\Bar\subnamespace as A;
use Test\Bar\subnamespace as B;

echo A\FOO;
echo B\FOO;

