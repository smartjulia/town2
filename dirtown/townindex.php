<?php
namespace Townmy;
use Townmy\Town as Town;
use Townmy\Street as Street;
use Townmy\House as House;
use Townmy\Flat as Flat;


require 'vendor/autoload.php';

/*error_reporting( E_ERROR );

//require "House.php";  

function __autoload($class_name) {
    include $class_name . '.php';
}

*/
  
///////////////////////////////////////

$numstreet=rand(1,3);

 $arrayName =  array("Kharkiv", "Rome", "Paris");
 $name_rend =array_rand($arrayName,1);
 $nameTown=$arrayName[$name_rend];

 
$yearTown=rand(1300,1600);

$arrayCoord =  array("11.755831", "22.755831", "33.755831","44.755831","55.755831");
$coord_rend =array_rand($arrayCoord,2);
$coordinateTownB=$arrayCoord[$coord_rend[0]];
$coordinateTownE=$arrayCoord[$coord_rend[1]];






for ($k=1; $k < $numstreet+1; $k++)

    {

$numhouse=rand(1,3);
 
 $arrayName =  array("Молодежная Ул.", "Набережный Пер.", "Парижской Коммуны Ул.");
 $name_rend =array_rand($arrayName,1);
 $nameStreet=$arrayName[$name_rend];

 
$lengthStreet=rand(20,100);

$arrayCoord =  array("55.755831", "77.755831", "88.755831","99.755831°","100.755831");
$coord_rend =array_rand($arrayCoord,2);
$coordinateStreetB=$arrayCoord[$coord_rend[0]];
$coordinateStreetE=$arrayCoord[$coord_rend[1]];



for ($j=1; $j < $numhouse+1; $j++)

    {

 
$numflat=rand(1,3);  
    
 $number=rand(1,50);
 $numFloat=rand(1,16);
 $numPorch=rand(1,5);
 $areaOfTeretorii=rand(1,100);  
        
for ($i=1; $i<$numflat+1; $i++)  {    
         $humans=rand(1,5);
         $area=rand(10,100);
        
          $flatArr[$i]=  new Flat($humans, $area);
        //тестовый вывод для проверки генерации данных
         // $flatArr[$i]->infoFlatforHouse($i);
     
     }     

      $houseArr[$j] = new House($flatArr, $number, $numFloat, $numPorch, $areaOfTeretorii);
      
    
       //тестовый вывод для проверки генерации данных
      //echo "---------------------------------------<br>";
     // $tt=count ($flatArr);
     // echo  "колличество сгенеренных квартиры $tt <br><br>";
      //
      
    //уничтожение  массива квартир

      unset($flatArr);

     
    }
   
 
$streetArr[$k] = new Street($houseArr,$nameStreet,$lengthStreet,$coordinateStreetB,$coordinateStreetE);  

     unset($houseArr); 
   
    }  
   
   
$myobj = new Town($streetArr,$nameTown,$yearTown,$coordinateTownB,$coordinateTownE);


/*$myobj->infoTown();

///вызов метода который обращается к конкретному дому и конкретной квартире
$myobj->infoSpecificTown(1,2,3);


$myobj->taxTown();
$myobj->humTown();   */


echo 'Формат JSON '.$myobj->getJSON();





?>
 