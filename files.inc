<?php
function spaces($str, $num, $pos='left'){
/*	$str - ������, ������� ����� �������� � ����� $num 
	������������ �� ������������ ��������� ������ � ������� $pos {'left','center,'right'}
*/
	$len = abs(strlen ($str)-$num)+1; //�������������� �������
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
	default : 		echo "����������� ������� ������� ������������!";
	}
	return $str;
} 

function wrstr($f,$s) {
  if (fwrite($f, $s) === FALSE) {
        echo "�� ���� ���������� ������ � ���� tclient.txt";
        exit;
    }
}
?>