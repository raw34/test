<?php 

trait A{
    /**
     * undocumented function
     *
     * @return void
     */
    public function test1()
    {
        echo 1;
    }
    
}

trait B{
    /**
     * undocumented function
     *
     * @return void
     */
    public function test2()
    {
        echo 2;
    }
    
}

/**
 * Class Test
 * @author changle
 */
class Test
{
    use A;
    use B;

    /**
     * undocumented function
     *
     * @return void
     */
    public function __construct()
    {
        $this->test1();
        $this->test2();
    }
    
}


$obj = new Test;
