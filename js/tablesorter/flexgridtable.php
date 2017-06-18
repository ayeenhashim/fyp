<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
	<title>jQuery plugin: Tablesorter 2.0 - Pager plugin</title>
	<link rel="stylesheet" href="inc.lib/tablesorter/addons/pager/jq.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" href="inc.lib/tablesorter/themes/blue/style.css" type="text/css" media="print, projection, screen" />
	<script type="text/javascript" src="inc.lib/tablesorter/jquery-latest.js"></script>
	<script type="text/javascript" src="inc.lib/tablesorter/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="inc.lib/tablesorter/jquery.tablesorter.pager.js"></script>

	<!--<script type="text/javascript" src="js/chili/chili-1.8b.js"></script>
	<script type="text/javascript" src="js/docs.js"></script>-->
	<script type="text/javascript">
	$(function() {
		$("table")
		
			.tablesorter({widthFixed: true, widgets: ['zebra']})
			.tablesorterPager({container: $("#pager")});
	});
	</script>
</head>
<body>
<div id="main">

<h1>Javascript</h1>
<pre class="javascript">
$(document).ready(function() {
	$("table")
	.tablesorter({widthFixed: false, widgets: ['zebra']})
	.tablesorterPager({container: $("#pager")});
});
</pre>
<h1>Demo</h1>
<table cellspacing="1" class="tablesorter">

	<thead>
		<tr>
        <th>Bil</th>
			<th>Kod</th>
			<th>Keterangan</th>
			<th>Tindakan</th>

		</tr>
	</thead>
	
	<tbody>
    
    <?php
	mysql_connect("localhost","root","");
	mysql_select_db("ekewangan");
	
	 $sql="select * from kod_jenis_daerah";
			$q=mysql_query($sql);
			$bil=1;
			while ($data=mysql_fetch_array($q))
			{
	$kod=$data['kod'];
		$keterangan=$data['keterangan'];

	 ;?>
		<tr>
        <td><?php echo $bil;?></td>
			<td><?php echo $kod;?></td>
			<td><?php echo $keterangan;?></td>
            <td>Kemaskini / Delete</td>
			</tr>
		
<?php
$bil++;
}
?>

		</tbody>
</table>
<div id="pager" class="pager">
	<form>
		<img src="inc.lib/tablesorter/addons/icon/first.png" class="first"/>
		<img src="inc.lib/tablesorter/addons/icon/prev.png" class="prev"/>
		<input type="text" class="pagedisplay"/>
		<img src="inc.lib/tablesorter/addons/icon/next.png" class="next"/>
		<img src="inc.lib/tablesorter/addons/icon/last.png" class="last"/>
		<select class="pagesize">
			<option selected="selected"  value="10">10</option>

			<option value="20">20</option>
			<option value="30">30</option>
			<option  value="40">40</option>
		</select>
	</form>
</div>

</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>

<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>
</body>
</html>

