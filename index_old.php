<?php
require ("files.inc");
require ("upload.inc");
function spaces($str, $num, $pos='left'){
/*	$str - ������, ������� ����� �������� � ����� $num 
	������������ �� ������������ ��������� ������ � ������� $pos {'left','center,'right'}
*/
	$len = abs(strlen ($str)-$num)+1; //�������������� �������
//	echo $len . "<br>";
	switch ($pos) {
	case "left": 	{ for ( $i=1; $i<$len; $i++ ) $str .= ' '; 
//					echo $pos . "<br>" . $str;
					break;
					}
	case "right":	{ for ( $i=1; $i<$len; $i++ ) $str = ' ' . $str;
//					echo $pos . "<br>" . $str;
					break;
					}
	case "center":	{ for ( $i=1; $i<$len & $i>1; $i+2 ) $str = ' ' . $str . ' ';
					if ($len % 2)  $str .= ' ' ;
//					echo $pos;
					break;
					}
	default : 		echo "����������� ������� ������� ������������!";
	}
//	echo $str;
	return $str;
} 

function wrstr($f,$s) {
  if (fwrite($f, $s) === FALSE) {
        echo "�� ���� ���������� ������ � ���� tclient.txt";
        exit;
    }
}

$zp = 'zp';
$space =' '; 

$date = @date ("md");  //warning down :)
$date = "11$date";
$arr = array (
		"acc" => '',
		"sum" => '',
		"date" => '',
		"fio" => '',
		"fio2" => '',
		"doc" => '',
		"about" => '',
		"" => ''
		);
//26251000044265;2562;17.01.11;���������� ��������� ²��������;���������� ��������� ²��������;�� 117936;17.03.2003 ����������������� �� ���� ���. � ������-� ���.
$row = 0;
$fin = fopen("tclient.csv", "r");
$fout = fopen("tclient.txt", "w");
while (($data = fgetcsv($fin, 422, ";")) !== FALSE) {
    $num = count($data);
	//    echo "<p> $num ����� � ������ $row: <br /></p>\n";
    $row++;
	$c = 0;
/*	echo $c . "<br>";
	echo $data[$c++] . "<br>";
	echo $data[$c++] . "<br>";
	echo $data[$c++] . "<br>";  	//nax
	echo $data[$c++] . "<br>";
	echo $data[$c++] . "<br>";		//nax
	echo $data[$c++] . "<br>";
	echo $data[$c++] . "<br>";
*/

	$arr["acc"] = $data[$c++];
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$s = $data[$c++];	//float neeed
	$arr["sum"] = '';
	$tok = strtok($s, ",");
	while ($tok) {
		$arr["sum"] = $arr["sum"] .= $tok;
//	echo "<hr>" . $arr["sum"] .  "<hr>";
		
		$tok = strtok(",");
}
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	echo "<hr>" . $arr["sum"] .  "<hr>";
	$arr["date"] = $data[$c++];  	//nax
	$arr["fio"] = $data[$c++];
	$arr["fio2"] = $data[$c++];		//nax
	$arr["doc"] = $data[$c++];
	$arr["about"] = $data[$c++];
/*	echo "<hr>";
	$s = spaces ($arr["acc"],140, 'right') . '!';
	echo strlen ($arr["acc"]) . "<br>" . strlen ($s) . "<br>" . $s . "<br>";
	echo "<hr>";

	echo $date . "<br>";
	echo $c . "<br>";
	echo $arr["acc"] . "<br>";
	echo $arr["sum"] . "<br>";
	echo $arr["date"] . "<br>";  	//nax
	echo $arr["fio"] . "<br>";
	echo $arr["fio2"] . "<br>";		//nax
	echo $arr["doc"] . "<br>";
	echo $arr["about"] . "<br>";
	
*/

	$str = '';
	$str = "321723   10027001000006321723   292490030000001" . spaces($arr["sum"],16/*hz?????*/,'right') . "63" . spaces($zp . $row,10,'left') . "980" . $date . $date . "                                      ��� ���i������� ���������� ����i���� �" . spaces("���������� ���������� ������� � " . $arr["acc"] . " " . $arr["fio"],160,'left') . spaces('',60 + 3) . "4               " . spaces('CASH29',14,'left') . "\n";
	wrstr($fout, $str);
//	echo $str . "<br>" . strlen($str) . "<br>";
	$str = spaces("��� ����������=" . $arr["fio"], 419, 'left') . "\n";
	wrstr($fout, $str);
//	echo $str . "<br>";
	$str = spaces("����� ����=" . $arr["fio"], 419, 'left') . "\n";
//	$str = "����� ����=" . $arr["fio"] . $space . "\n";
	wrstr($fout, $str);
//	echo $str . "<br>";
	$str = spaces("���������� ��������=������� " . $arr["doc"], 419, 'left') . "\n";
//	$str = "���������� ��������=������� " . $arr["doc"] . $space . "\n";
	wrstr($fout, $str);
//	echo $str . "<br>";
	$str = spaces("���� � ����� ������ ���.=" . $arr["about"], 419, 'left') . "\n";
//	$str = "���� � ����� ������ ���.=" . $arr["about"] . $space . "\n";
	wrstr($fout, $str);
//	echo $str . "<br>";

	
//	$str = "���� ��������=" . $data[$c++] . $space . "\n";
//	echo $str . "<br>";
//	$str = "�����=$data[$c++]$space";

}
fclose($fin);
fclose($fout);

?>

<form enctype="multipart/form-data" action="/upload.php" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="30000">
Send this file: <input name="userfile" type="file">
<input type="submit" value="Send File">
</form>