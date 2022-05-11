<?php

/**
 * @
 */
class A{

    public function __get($b){
        return $b;
    }


}
$a = new A;
print_r($a->car);