<?php
class Person {
    /**  
     * For the sake of demonstration, we"re setting this private 
     */   
    private $_allowDynamicAttributes = false;  

    /** type=primary_autoincrement */  
    protected $id = 0;  

    /** type=varchar length=255 null */  
    protected $name;  

    /** type=text null */  
    protected $biography;  

    public function getId()  
    {  
        return $this->id;  
    }
    public function setId($v)  
    {  
        $this->id = $v;  
    }  
    public function getName()  
    {  
        return $this->name;  
    }  
    public function setName($v)  
    {  
        $this->name = $v;  
    }  
    public function getBiography()  
    {  
        return $this->biography;  
    }  
    public function setBiography($v)  
    {  
        $this->biography = $v;  
    }
}

$class = new ReflectionClass('Person');//建立 Person这个类的反射类  
$instance  = $class->newInstanceArgs();//相当于实例化Person 类 
#$instance  = $class->newInstanceArgs($args);//相当于实例化Person 类 

//获取属性
$properties = $class->getProperties();
foreach($properties as $property) {  
    echo '<br/>';
    echo $property->getName()."\n";  
}  

//获取注释
foreach($properties as $property) {
    if($property->isProtected()) {  
        $docblock = $property->getDocComment();  
        preg_match('/ type\=([a-z_]*) /', $property->getDocComment(), $matches);  
        echo '<br/>';
        echo $matches[1]."\n";  
    }  
}

//获取类的方法
$methods = $class->getMethods();
foreach ($methods as $method) {
    echo '<br/>';
    echo $method . "\n";
}

//执行类的方法
echo '<br/>';
$instance->setBiography('test me');
echo $instance->getBiography(); //执行Person 里的方法getBiography  

//或者：  
$instance->setName('kenny');
$ec=$class->getmethod('getName');  //获取Person 类中的getName方法  
echo '<br/>';
echo $ec->invoke($instance);       //执行getName 方法  
