<?php 
/**
 * test
 */
class Test
{
    private $item;
    /**
     * 
     */
    public function __construct()
    {
        $this->item = 10;
    }
}
$obj = new Test();
echo '<pre>'; var_dump($obj); echo '</pre>';
?>
