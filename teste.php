<?
$a= new DateTime('10-9-2000');
$b= new DateTime('11-10-1999');

function validaData($d1,$d2,$d1r,$d2r){
	if($d1>$d1r&&$d2>$d1r&&$d1>$d2r&&$d2>$d2r){return 'true 1';}
	elseif($d1>=$d1r||$d2>=$d1r||$d1<=$d2r&&$d2>=$d2r){
		return 'false 2';
	}else{
		return 'true';
	}
}


echo validaData(1,2,3,4).'</br>';#true

echo validaData(1,3,2,4).'</br>';#false

echo validaData(1,2,2,4).'</br>';#false

echo validaData(1,5,1,10).'</br>';#false

echo validaData(2,4,1,3).'</br>';#false

echo validaData(4,5,1,3).'</br>';#true