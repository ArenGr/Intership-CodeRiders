<?php
class A {
    public $a;
    public $b;
    public function __construct($a, $b){
        $this->a = $a;
        $this->b = $b;
    }
}

class B extends A{
    public $obj;
    public function __construct($a, $b)
    {
        parent::__construct($a, $b);
        $this->obj = new A("anun", "azganun");
    }
}

class C extends B{
    public function __construct()
    {
        parent::__construct("poxos", "petros");
        echo $this->obj->a;
    }


}
/* $b = new B('name', 'surname'); */
/* var_dump($b->obj); */

$c = new C();

?>
