<?php
class A { 
    function __construct(){ 
        echo "I am A!\n"; 
    } 
    function test() { 
        echo "test A.\n"; 
    } 
} 
// (1) 
class B extends A { 
    function test() { 
        echo "test B.\n"; 
    } 
} 
$b = new B; 
$b->test(); 
// (2) 
class C extends B { 
    function __construct(){ 
        echo "I am C!\n"; 
    } 
    function test() { 
        echo "test C.\n"; 
    } 
} 
$c = new C; 
$c->test();  
// (3) 
class D extends C { 
    function __construct(){ 
        parent::__construct(); 
        echo "I am D!\n"; 
    } 
    function test() { 
        echo "test D.\n"; 
    } 
} 
$d = new D; 
$d->test(); 
// (4) 
class E extends D { 
    function __construct(){ 
        echo "I am E!\n"; 
    } 
    function test($s) { 
        echo "test $s.\n"; 
    } 
} 
$e = new E; 
$e->test(); 
