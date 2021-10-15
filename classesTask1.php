<?php
// 1) Создать родительский (главный класс) Класс должен содержать 2 свойства Каждое свойство должно иметь геттеры и сеттеры

Class GrandParent {
    public int $firstNum = 2;
    public int $secondNum = 5;

    public function setFirstNum($number){
        $this->firstNum = $number;
    }
    public function getFirstNum():int {
        return $this->firstNum;
    }

    public function setSecondNum($number){
        $this->secondNum = $number;

    }
    public function getSecondNum():int{
        return $this->secondNum;
    }
}

$grandObj = new GrandParent();
var_dump($grandObj);
echo '<br>';
$grandObj->setFirstNum(54);
var_dump($grandObj);
echo '<br>';
$grandObjSec = new GrandParent();
var_dump($grandObjSec);

echo '<br>';
echo '============= 1st level extended=====================';
echo '<br>';
//2) Создать 3 наследника родительского класса Каждый наследник должен содержать одно свойство.
// Каждое свойство должно иметь геттер и сеттер
// Наследники должны реализовать по одному методу который выполняет одно математическое действие с данными родителя и своими данными
//Один наследник не должен быть наследуемым Один из наследников должен содержать абстрактную функцию возведения в степень

Class Parent1 extends GrandParent{
    public int $thirdNum = 3;

    public function setThirdNum($number){
        $this->thirdNum = $number;
    }
    public function getThirdNum():int{
        return $this->thirdNum;
    }
    public function sumWithPar():int {
        return $this->getThirdNum() + $this->getSecondNum();
    }

}

$parObj1 = new Parent1();
var_dump($parObj1);
$parObj1->setThirdNum(100);
echo '<br>';
var_dump($parObj1->sumWithPar());
echo '<br>';


final Class Parent2NotExtendable extends GrandParent{
    public int $fourthNum = 54;

    public function setFourthNum($number){
        $this->fourthNum = $number;
    }
    public function getFourthNum():int{
        return $this->fourthNum;
    }
    public function diffGrandPar():int{
        return $this->getFourthNum() - $this->getFirstNum();
    }
}

$parObj2 = new Parent2NotExtendable();
var_dump($parObj2);
echo '<br>';
var_dump($parObj2->diffGrandPar());
echo '<br>';


abstract Class Parent3 extends GrandParent{
    public int $fifthNum = 6;

    public function setFifthNum($number){
        $this->fifthNum = $number;
    }
    public function getFifthNum():int{
        return $this->fifthNum;
    }
    public function moduleWithGrandPar():int{
        return $this->getSecondNum()%$this->getFifthNum();
    }
    abstract function pow();
}

echo '<br>';
echo '============= 2nd level extended=====================';
echo '<br>';

//3) Создать по 2 наследника от наследников первого уровня
//Каждое свойство должно иметь геттер и сеттер
//Наследники должны реализовать по одному методу который выполняет одно математическое действие с данными родителя и своими данными
//И по одному методу который выполняет любое математическое действие со свойством корневого класса и своим свойством
//В случае если реализован наследник класса содержащего абстрактную функцию то класс должен содержать реализацию абстракции

Class Child1Par1 extends Parent1 {
    public int $sixthNum = 20;
    public function setSixthNum($number){
        $this->sixthNum = $number;
    }
    public function getSixthNum():int{
        return $this->sixthNum;
    }
    public function doubleSumPar():int{
        return $this->getSixthNum()+$this->sumWithPar();
    }
    public function devPar():float{
        return $this->sixthNum/$this->getThirdNum();
    }
    public function devGr():float{
        return $this->sixthNum/$this->getSecondNum();
    }
}

$child1Par1Obj = new Child1Par1();
var_dump($child1Par1Obj);
echo '<br>';
var_dump($child1Par1Obj->doubleSumPar());
echo '<br>';
var_dump($child1Par1Obj->devPar());
echo '<br>';
var_dump($child1Par1Obj->devGr());
echo '<br>';


Class Child2Par2 extends Parent1 {
    public int $seventhNum = 33;

    public function setSeventhNum($number){
        $this->seventhNum = $number;
    }
    public function getSeventhNum():int{
        return $this->seventhNum;
    }
    public function doubleParDev():float{
        return $this->sumWithPar()/$this->getSeventhNum();
    }
    public function plusPar():int{
        return $this->getSeventhNum() + $this->getThirdNum();
    }
    public function plusGr():int{
        return $this->getSeventhNum() + $this->getFirstNum();
    }
}

$child2Par1Obj = new Child2Par2();
var_dump($child2Par1Obj);
echo '<br>';
var_dump($child2Par1Obj->doubleParDev());
echo '<br>';
var_dump($child2Par1Obj->plusPar());
echo '<br>';
var_dump($child2Par1Obj->plusGr());
echo '<br>';

Class Child1AbsParent3 extends Parent3 {
    public int $ninthNum = 11;

    public function setNinthNum($number){
        $this->ninthNum = $number;
    }
    public function getNinthNum():int{
        return $this->ninthNum;
    }
    public function pow(){
        return pow($this->getFifthNum(),$this->getNinthNum());
    }
    public function moduleGrand():int{
        return $this->getNinthNum()%$this->getFirstNum();
    }
}

$child1Par3Obj = new Child1AbsParent3();
var_dump($child1Par3Obj);
echo '<br>';
var_dump($child1Par3Obj->pow());
echo '<br>';
var_dump($child1Par3Obj->moduleGrand());
echo '<br>';

Class Child2AbsParent3 extends Parent3 {
    public int $tenthNum = 8;

    public function setTenthNum($number){
        $this->tenthNum = $number;
    }
    public function getTenthNum():int{
        return $this->tenthNum;
    }
    public function pow(){
        return pow($this->getTenthNum(),$this->getFifthNum());
    }
    public function moduleGrand():int{
        return $this->getTenthNum()%$this->getSecondNum();
    }
}
$child2Par3Obj = new Child2AbsParent3();
var_dump($child2Par3Obj);
echo '<br>';
var_dump($child2Par3Obj->pow());
echo '<br>';
var_dump($child2Par3Obj->moduleGrand());
echo '<br>';
var_dump($child2Par3Obj->moduleWithGrandPar());

