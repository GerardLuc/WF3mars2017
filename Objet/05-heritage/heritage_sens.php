<?php

class A {
    return 'testA';
}
// -----
class B extends A{
    return 'testB';

}
// -----
class C extends B{
    return 'testC';

}
// -----
// C herite de A => transitivité
$c = new C;
echo $c -> testA()'<br>'; // A accessible par C (heritage indirect)
echo $c -> testB()'<br>'; // B accessible par C (heritage direct)
echo $c -> testC()'<br>'; // C accessible par C

var_dump(get_class_methods($c)); // Affiche les 3 methodes, car elles appartiennent toutes a C

/*
    L'heritage est non reflexif: class D extends D impossible
    sans cycle: si F extends E, E peut pas extends F
    non symetrique
*/ 