<?php

namespace Dompdf;

require_once 'dompdf/autoload.inc.php';
require_once("../../database/connect.php");
// require_once("../../../include/initialize.php");


$rqt = $db->query("SELECT * from tblcustomer");
$rqt->execute();
// $rqt2 = mysqli_query($db, $rqt) or die(mysql_error());
$result = array();

$htmldata = '';
$id=0;
$entete='';
$body='';

while($fetchdata=$rqt->fetch()){
	$idd++;
	$entete.='
		<h1>Entete</h1>

	';

	$body.='

		<tr style="vertical-align:top;">
		<td style="width:0px;height:24px;"></td>
		<td></td>
		<td class="cs75E96840" colspan="7" style="width:297px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>CAPACITE&nbsp;ENSEIGNEMENT</nobr></td>
		<td class="cs48B2CC25" colspan="5" style="width:234px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>dd</nobr></td>
		<td class="cs48B2CC25" colspan="4" style="width:235px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>10</nobr></td>
	</tr>
	
	 ';

}



$htmldata = '' .


'

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html>
<head>
	<title>exemple_report</title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8"/>
	<style type="text/css">
		.cs5971619E {color:#000000;background-color:#000000;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Times New Roman; font-size:13px; font-weight:normal; font-style:normal; }
		.cs4F1C6E9A {color:#000000;background-color:transparent;border-left:#000000 1px solid;border-top:#000000 1px solid;border-right:#000000 1px solid;border-bottom:#000000 1px solid;font-family:Verdana; font-size:15px; font-weight:bold; font-style:normal; }
		.cs75E96840 {color:#000000;background-color:transparent;border-left:#000000 1px solid;border-top:#000000 1px solid;border-right:#000000 1px solid;border-bottom:#000000 1px solid;font-family:Verdana; font-size:15px; font-weight:normal; font-style:normal; }
		.csA5B070AD {color:#000000;background-color:transparent;border-left:#000000 1px solid;border-top-style: none;border-right:#000000 1px solid;border-bottom:#000000 1px solid;font-family:Verdana; font-size:15px; font-weight:normal; font-style:normal; }
		.cs4C5A98CB {color:#000000;background-color:transparent;border-left-style: none;border-top:#000000 1px solid;border-right:#000000 1px solid;border-bottom:#000000 1px solid;font-family:Verdana; font-size:15px; font-weight:bold; font-style:normal; }
		.cs48B2CC25 {color:#000000;background-color:transparent;border-left-style: none;border-top:#000000 1px solid;border-right:#000000 1px solid;border-bottom:#000000 1px solid;font-family:Verdana; font-size:15px; font-weight:normal; font-style:normal; }
		.csD99AA0E0 {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right:#000000 1px solid;border-bottom:#000000 1px solid;font-family:Verdana; font-size:15px; font-weight:normal; font-style:normal; }
		.csE3FFF3AB {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Lucida Fax; font-size:15px; font-weight:normal; font-style:italic; padding-left:2px;}
		.csB63DDD09 {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Lucida Fax; font-size:15px; font-weight:normal; font-style:normal; padding-left:2px;}
		.cs4718E0E1 {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Lucida Fax; font-size:16px; font-weight:bold; font-style:normal; padding-left:2px;}
		.cs101A94F7 {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Times New Roman; font-size:13px; font-weight:normal; font-style:normal; }
		.csF7D3565D {height:0px;width:0px;overflow:hidden;font-size:0px;line-height:0px;}
	</style>
</head>
<body leftMargin=10 topMargin=10 rightMargin=10 bottomMargin=10 style="background-color:#FFFFFF">
<table cellpadding="0" cellspacing="0" border="0" style="border-width:0px;empty-cells:show;width:780px;height:576px;position:relative;">
	<tr style="vertical-align:top;">
		<td style="width:0px;height:10px;"></td>
		<td style="width:10px;"></td>
		<td style="width:115px;"></td>
		<td style="width:65px;"></td>
		<td style="width:8px;"></td>
		<td style="width:11px;"></td>
		<td style="width:24px;"></td>
		<td style="width:30px;"></td>
		<td style="width:46px;"></td>
		<td style="width:23px;"></td>
		<td style="width:65px;"></td>
		<td style="width:19px;"></td>
		<td style="width:86px;"></td>
		<td style="width:42px;"></td>
		<td style="width:31px;"></td>
		<td style="width:79px;"></td>
		<td style="width:1px;"></td>
		<td style="width:125px;"></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:22px;"></td>
		<td class="cs101A94F7" colspan="2" rowspan="6" style="width:125px;height:110px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:125px;height:110px;">
			<img alt="" src="exemple_report_files/974578485.jpg" style="width:125px;height:110px;" /></div>
		</td>
		<td class="cs4718E0E1" colspan="13" style="width:527px;height:22px;line-height:19px;text-align:left;vertical-align:top;"><nobr>MINISTERE&nbsp;D\' ENSEIGNEMENT&nbsp;SUPERIEUR&nbsp;ET&nbsp;UNIVERSITAIRE</nobr></td>
		<td></td>
		<td class="cs101A94F7" rowspan="6" style="width:125px;height:110px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:125px;height:110px;">
			<img alt="" src="exemple_report_files/3087699795.jpg" style="width:125px;height:110px;" /></div>
		</td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:22px;"></td>
		<td></td>
		<td class="cs4718E0E1" colspan="11" style="width:383px;height:22px;line-height:19px;text-align:left;vertical-align:top;"><nobr>INSTITUT&nbsp;SUPERIEUR&nbsp;DE&nbsp;COMMERCE/GOMA</nobr></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:22px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="cs4718E0E1" colspan="5" style="width:237px;height:22px;line-height:19px;text-align:left;vertical-align:top;"><nobr>PROVINCE&nbsp;DU&nbsp;NORD-KIVU</nobr></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:22px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="cs4718E0E1" colspan="2" style="width:82px;height:22px;line-height:19px;text-align:left;vertical-align:top;"><nobr>BP.8633</nobr></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:14px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:8px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="cs4718E0E1" colspan="7" rowspan="2" style="width:310px;height:22px;line-height:19px;text-align:left;vertical-align:top;"><nobr>FICHE&nbsp;DE&nbsp;COTATION&nbsp;DU&nbsp;COURS</nobr></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:14px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:1px;"></td>
		<td></td>
		<td></td>
		<td class="cs5971619E" colspan="13" style="width:529px;height:1px;"><!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]--></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:1px;"></td>
		<td></td>
		<td></td>
		<td class="cs101A94F7" colspan="13" style="width:529px;height:1px;"><!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]--></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:30px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:1px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="cs101A94F7" rowspan="7" style="width:125px;height:110px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:125px;height:110px;">
			<img alt="" src="exemple_report_files/4273496728.jpg" style="width:125px;height:110px;" /></div>
		</td>
	</tr>

	'.$entete.'

	<tr style="vertical-align:top;">
		<td style="width:0px;height:24px;"></td>
		<td></td>
		<td class="cs4F1C6E9A" colspan="7" style="width:297px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>DESIGNATION</nobr></td>
		<td class="cs4C5A98CB" colspan="5" style="width:234px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>COTE</nobr></td>
		<td class="cs4C5A98CB" colspan="4" style="width:235px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>MAX</nobr></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:1px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	'.$body.'
</table>
</body>
</html>
';
ob_end_clean();
$dompdf = new Dompdf();
$dompdf->loadHtml($htmldata);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("", array("Attachment" => false));
exit(0);