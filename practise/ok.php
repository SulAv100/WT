<?php

echo "This is what you came for";
// $ means varaible
$name = "SUlav";
$name = true;
// gets the value of the $name
echo "This is $name";
echo 'This is $name';
define('PI',3.14);
echo PI;

if(PI>5){
    echo "Greater"
}else{
    echo "Smaller"
}
for($i =0;$i<10;$i++){
    echo $i;
}
$j =0;
while($j >5){
    echo $j;
}
$k =0;
do{
    echo $k++;
}while($k <5);
$nameagain = "SUlav Gautam";
echo $nameagain;
$i ="5";
$j = "i";
echo $$j;
// Types of array
// Single dimensional array
// ?Function
$names = array('Alucard','Freya');
// literal
$names = ['Argus','Cecillion'];
echo $names[1];
echo $names[2];


// 2. associative array
$students = array("name" => "ALucard SHrestha", "roll" =>1, "Address" => "Pokhara");
$students = ["name" => "ALucard SHrestha", "roll" =>1, "Address" => "Pokhara"];

//debugging
var_dump($students);

print_r($students);

echo $students['name'];

// Multidimensional array
$student = [
    ["name"=>"Cecillion", "roll" => 1],
    ["name"=>"Freya","roll"=>2]
];
$student =[
    [1,2,3],
    ["anil","alucard","Cecillion"]
];

$rolls =[1,2,3,4,5];
$nam =["ALLucard","Ferya","Saber"];
for($i =0; $i<count($nam);$i++){
    echo "ROll=".$rolls[$i] . "& name = ". $names[$i];
    echo "<br/>";
}
$stu = [
    ["name"=>"Alice", "roll"=>1],
    ["name"=>"Karina", "roll"=>2],
    ["name"=> "Wanwan", "roll"=>3],
    ["name"=>"Fanny", "roll"=>4]
];
// loop for array

foreach($stu as $student)
{
    var_dump($student);
    echo "Roll=".$student['roll']. "&name=".$student['name'];
    echo "<br>"
}
echo $students[0]['name'];
echo $students[2]['roll no'];

?>

<h1>Heading</h1>
