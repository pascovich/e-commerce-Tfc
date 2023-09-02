<?php 

namespace Dompdf;

require_once 'dompdf/autoload.inc.php';
include '../database/connect.php';

$ensignant = $_POST['enseignant'];

$rqt = $db->query("SELECT * from report_cours_cotation WHERE enseignant='$enseignant' limit 1");
$rqt->execute();
$result = array();

$rqt1 = $db->query("SELECT * from report_cours_cotation WHERE enseignant='$enseignant' ");
$rqt1->execute();
$result1 = array();

$htmldata = '';
$id=0;
$entete='';
$body='';

while($fetchdata=$rqt->fetch()){
	$idd++;
	$entete.='

		<tr style="vertical-align:top;">
		<td style="height:20px;"></td>
		<td></td>
		<td></td>
		<td class="csB63DDD09" colspan="4" style="width:186px;height:20px;line-height:18px;text-align:left;vertical-align:top;"><nobr>ANNEE-ACADEMIQUE&nbsp;&nbsp;&nbsp;&nbsp;</nobr></td>
		<td></td>
		<td class="csE3FFF3AB" colspan="5" style="width:186px;height:20px;line-height:17px;text-align:left;vertical-align:top;"><nobr> : '.$fetchdata['annee'].'</nobr></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:20px;"></td>
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
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:19px;"></td>
		<td></td>
		<td></td>
		<td class="csB63DDD09" colspan="4" style="width:186px;height:19px;line-height:18px;text-align:left;vertical-align:top;"><nobr>ENSEIGNANT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</nobr></td>
		<td></td>
		<td class="csE3FFF3AB" colspan="6" style="width:205px;height:19px;line-height:17px;text-align:left;vertical-align:top;"><nobr> : '.$fetchdata['noms'].'</nobr></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>

	';
}

$htmldata = '' .


'

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html>
<head>
	<title>fiche2</title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8"/>
	<style type="text/css">
		.cs5971619E {color:#000000;background-color:#000000;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Times New Roman; font-size:13px; font-weight:normal; font-style:normal; }
		.cs5B97A8FB {color:#000000;background-color:transparent;border-left:#000000 1px solid;border-top:#000000 1px solid;border-right:#000000 1px solid;border-bottom:#000000 1px solid;font-family:Verdana; font-size:13px; font-weight:normal; font-style:normal; }
		.cs4F1C6E9A {color:#000000;background-color:transparent;border-left:#000000 1px solid;border-top:#000000 1px solid;border-right:#000000 1px solid;border-bottom:#000000 1px solid;font-family:Verdana; font-size:15px; font-weight:bold; font-style:normal; }
		.csFA62286C {color:#000000;background-color:transparent;border-left-style: none;border-top:#000000 1px solid;border-right:#000000 1px solid;border-bottom:#000000 1px solid;font-family:Verdana; font-size:13px; font-weight:normal; font-style:normal; }
		.cs4C5A98CB {color:#000000;background-color:transparent;border-left-style: none;border-top:#000000 1px solid;border-right:#000000 1px solid;border-bottom:#000000 1px solid;font-family:Verdana; font-size:15px; font-weight:bold; font-style:normal; }
		.csE3FFF3AB {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Lucida Fax; font-size:15px; font-weight:normal; font-style:italic; padding-left:2px;}
		.csB63DDD09 {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Lucida Fax; font-size:15px; font-weight:normal; font-style:normal; padding-left:2px;}
		.cs4718E0E1 {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Lucida Fax; font-size:16px; font-weight:bold; font-style:normal; padding-left:2px;}
		.cs101A94F7 {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Times New Roman; font-size:13px; font-weight:normal; font-style:normal; }
		.csF7D3565D {height:0px;width:0px;overflow:hidden;font-size:0px;line-height:0px;}
	</style>
</head>
<body leftMargin=10 topMargin=10 rightMargin=10 bottomMargin=10 style="background-color:#FFFFFF">
<table cellpadding="0" cellspacing="0" border="0" style="border-width:0px;empty-cells:show;width:786px;height:369px;position:relative;">
	<tr style="vertical-align:top;">
		<td style="width:6px;height:10px;"></td>
		<td style="width:6px;"></td>
		<td style="width:27px;"></td>
		<td style="width:64px;"></td>
		<td style="width:28px;"></td>
		<td style="width:64px;"></td>
		<td style="width:32px;"></td>
		<td style="width:11px;"></td>
		<td style="width:30px;"></td>
		<td style="width:61px;"></td>
		<td style="width:8px;"></td>
		<td style="width:84px;"></td>
		<td style="width:5px;"></td>
		<td style="width:19px;"></td>
		<td style="width:62px;"></td>
		<td style="width:43px;"></td>
		<td style="width:18px;"></td>
		<td style="width:12px;"></td>
		<td style="width:75px;"></td>
		<td style="width:5px;"></td>
		<td style="width:15px;"></td>
		<td style="width:106px;"></td>
		<td style="width:5px;"></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:1px;"></td>
		<td class="cs101A94F7" colspan="4" rowspan="7" style="width:125px;height:110px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:125px;height:110px;">
			<img alt="" src="fiche2_files/974578485.jpg" style="width:125px;height:110px;" /></div>
		</td>
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
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:22px;"></td>
		<td class="cs4718E0E1" colspan="15" style="width:527px;height:22px;line-height:19px;text-align:left;vertical-align:top;"><nobr>MINISTERE&nbsp;D\'ENSEIGNEMENT&nbsp;SUPERIEUR&nbsp;ET&nbsp;UNIVERSITAIRE</nobr></td>
		<td class="cs101A94F7" colspan="3" rowspan="7" style="width:126px;height:110px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:126px;height:110px;">
			<img alt="" src="fiche2_files/3087699795.jpg" style="width:126px;height:110px;" /></div>
		</td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:22px;"></td>
		<td></td>
		<td class="cs4718E0E1" colspan="12" style="width:383px;height:22px;line-height:19px;text-align:left;vertical-align:top;"><nobr>INSTITUT&nbsp;SUPERIEUR&nbsp;DE&nbsp;COMMERCE/GOMA</nobr></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:22px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="cs4718E0E1" colspan="6" style="width:237px;height:22px;line-height:19px;text-align:left;vertical-align:top;"><nobr>PROVINCE&nbsp;DU&nbsp;NORD-KIVU</nobr></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:22px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="cs4718E0E1" style="width:82px;height:22px;line-height:19px;text-align:left;vertical-align:top;"><nobr>BP.8633</nobr></td>
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
		<td style="height:14px;"></td>
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
		<td style="height:7px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="cs4718E0E1" colspan="8" rowspan="3" style="width:310px;height:22px;line-height:19px;text-align:left;vertical-align:top;"><nobr>FICHE&nbsp;DE&nbsp;COTATION&nbsp;ENSEIGNANT</nobr></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:1px;"></td>
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
		<td style="height:14px;"></td>
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
		<td style="height:1px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="cs5971619E" colspan="15" style="width:529px;height:1px;"><!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]--></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:1px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="cs101A94F7" colspan="15" style="width:529px;height:1px;"><!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]--></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:25px;"></td>
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
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:26px;"></td>
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
		<td></td>
		<td class="cs101A94F7" colspan="3" rowspan="8" style="width:126px;height:110px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:126px;height:110px;">
			<img alt="" src="fiche2_files/4273496728.jpg" style="width:126px;height:110px;" /></div>
		</td>
		<td></td>
	</tr>

	'.$entete.'

	<tr style="vertical-align:top;">
		<td style="height:12px;"></td>
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
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:1px;"></td>
		<td></td>
		<td></td>
		<td class="cs5971619E" colspan="14" style="width:529px;height:1px;"><!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]--></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:1px;"></td>
		<td></td>
		<td></td>
		<td class="cs101A94F7" colspan="14" style="width:529px;height:1px;"><!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]--></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:11px;"></td>
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
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:20px;"></td>
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
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:24px;"></td>
		<td></td>
		<td class="cs4F1C6E9A" colspan="2" style="width:89px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>#</nobr></td>
		<td class="cs4C5A98CB" colspan="6" style="width:225px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>PROMOTION&nbsp;&amp;&nbsp;OPTION</nobr></td>
		<td class="cs4C5A98CB" colspan="6" style="width:220px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>COURS</nobr></td>
		<td class="cs4C5A98CB" colspan="5" style="width:124px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>COTE</nobr></td>
		<td class="cs4C5A98CB" style="width:105px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>MAX</nobr></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:4px;"></td>
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
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:24px;"></td>
		<td></td>
		<td class="cs5B97A8FB" colspan="2" style="width:89px;height:22px;line-height:16px;text-align:center;vertical-align:middle;"><nobr>#</nobr></td>
		<td class="csFA62286C" colspan="6" style="width:225px;height:22px;line-height:16px;text-align:center;vertical-align:middle;"><nobr>PROMOTION&nbsp;&amp;&nbsp;OPTION</nobr></td>
		<td class="csFA62286C" colspan="6" style="width:220px;height:22px;line-height:16px;text-align:center;vertical-align:middle;"><nobr>COURS</nobr></td>
		<td class="csFA62286C" colspan="5" style="width:124px;height:22px;line-height:16px;text-align:center;vertical-align:middle;"><nobr>COTE</nobr></td>
		<td class="csFA62286C" style="width:105px;height:22px;line-height:16px;text-align:center;vertical-align:middle;"><nobr>MAX</nobr></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:1px;"></td>
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
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="height:24px;"></td>
		<td></td>
		<td class="cs4F1C6E9A" colspan="14" style="width:536px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>TOTAL&nbsp;COTE</nobr></td>
		<td class="cs4C5A98CB" colspan="5" style="width:124px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>COTE</nobr></td>
		<td class="cs4C5A98CB" style="width:105px;height:22px;line-height:19px;text-align:center;vertical-align:middle;"><nobr>MAX</nobr></td>
		<td></td>
	</tr>
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