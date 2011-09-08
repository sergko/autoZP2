<?php
function spaces($str, $num, $pos='left'){
/*	$str - —трока, которую нужно привести к длине $num 
	ориентиру€сь на выравнивание полезного текста в сторону $pos {'left','center,'right'}
*/
	$len = abs(strlen ($str)-$num)+1; //дополнительные пробелы
	switch ($pos) {
	case "left": 	{ for ( $i=1; $i<$len; $i++ ) $str .= ' '; 
					break;
					}
	case "right":	{ for ( $i=1; $i<$len; $i++ ) $str = ' ' . $str;
					break;
					}
	case "center":	{ for ( $i=1; $i<$len & $i>1; $i+2 ) $str = ' ' . $str . ' ';
					if ($len % 2)  $str .= ' ' ;
					break;
					}
	default : 		echo "Ќеправильно указана позици€ выравнивани€!";
	}
	return $str;
} 

function wrstr($f,$s) {
  if (fwrite($f, $s) === FALSE) {
        echo "Ќе могу произвести запись в файл tclient.txt";
        exit;
    }
}
?>