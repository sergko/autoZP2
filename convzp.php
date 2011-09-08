<?php
require ("files.inc");

//echo 1;
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
	//26251000044265;2562;17.01.11;АНДРЮЩЕНКО ОЛЕКСАНДР ВІКТОРОВИЧ;АНДРЮЩЕНКО ОЛЕКСАНДР ВІКТОРОВИЧ;АН 117936;17.03.2003 Красногвардійським РВ УМВС Укр. в Дніпроп-й обл.
	$row = 0;
	$fin = fopen("tclient.csv", "r");
	$fout = fopen("tclient.txt", "w");
//echo 2;
	while (($data = fgetcsv($fin, 422, ";")) !== FALSE) {
		$num = count($data);
		//    echo "<p> $num полей в строке $row: <br /></p>\n";
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
			$tok = strtok(",");
	}
	//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//	echo "<hr>" . $arr["sum"] .  "<hr>";
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
//echo 3;
		$str = '';
		$str = "321723   10027001000006321723   292490030000001" . spaces($arr["sum"],16/*hz?????*/,'right') . "63" . spaces($zp . $row,10,'left') . "980" . $date . $date . "                                      Для готiвкового поповнення платiжних к" . spaces("Поповнення карткового рахунку № " . $arr["acc"] . " " . $arr["fio"],160,'left') . spaces('',60 + 3) . "4               " . spaces('CASH29',14,'left') . "\n";
		wrstr($fout, $str);
		$str = spaces("ФИО ПОЛУЧАТЕЛЯ=" . $arr["fio"], 419, 'left') . "\n";
		wrstr($fout, $str);
		$str = spaces("ЧЕРЕЗ КОГО=" . $arr["fio"], 419, 'left') . "\n";
		wrstr($fout, $str);
		$str = spaces("ПРЕДЪЯВЛЕН ДОКУМЕНТ=паспорт " . $arr["doc"], 419, 'left') . "\n";
		wrstr($fout, $str);
		$str = spaces("ДАТА И МЕСТО ВЫДАЧИ ДОК.=" . $arr["about"], 419, 'left') . "\n";
		wrstr($fout, $str);
	}
	fclose($fin);
	fclose($fout);
//echo 4;
echo "<hr>Download converted file: <a href=\"/autoZP/tclient.txt\"> tclient.txt </a><hr>";  //URL to file!!!
?>
