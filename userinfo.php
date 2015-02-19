<style>
.fontt
{

font-family: 'Times New Roman', Times, serif;font-size: 17pt;text-align: center;width: 298px; color: #2214B9;border-class: solid;border-width: 1px;
}

.fontss{
font-family: 'Times New Roman', Times, serif;font-size: 15pt;text-align: left; color: #2214B9;border-class: solid;border-width: 1px; width: 298px;
}
</style>
<?php
	    $u_agent = $_SERVER['HTTP_USER_AGENT'];
	    $bname = 'Unknown';
	    $platform = 'Unknown';
	    $version= "";
	 
	    //First get the platform?
	    if (preg_match('/linux/i', $u_agent)) {
	        $platform = 'linux';
	    }
	    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	        $platform = 'mac';
	    }
	    elseif (preg_match('/windows|win32/i', $u_agent)) {
	        $platform = 'windows';
	    }
	 
	    // Next get the name of the useragent yes seperately and for good reason
	    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
	    {
	        $bname = 'Internet Explorer';
	        $ub = "MSIE";
	    }
	    elseif(preg_match('/Firefox/i',$u_agent))
	    {
	        $bname = 'Mozilla Firefox';
	        $ub = "Firefox";	        
	    }
	    elseif(preg_match('/Chrome/i',$u_agent))
	    {
	        $bname = 'Google Chrome';
	        $ub = "Chrome";
	    }
	    elseif(preg_match('/Safari/i',$u_agent))
	    {
	        $bname = 'Apple Safari';
	        $ub = "Safari";
	    }
	    elseif(preg_match('/Opera/i',$u_agent))
	    {
	        $bname = 'Opera';
	        $ub = "Opera";
	    }
	    elseif(preg_match('/Netscape/i',$u_agent))
	    {
	        $bname = 'Netscape';
	        $ub = "Netscape";
	    }
	 
	    // finally get the correct version number
	    $pos=strpos($u_agent,$ub);
	    $m=$pos+strlen($ub)+1;
	    if ($ub=='MSIE')
	    	$l=strpos($u_agent,';',$m)-$m;
	    else
		    $l=strpos($u_agent,' ',$m)-$m;
		if ($l<=0) $l=10;
		$version=substr($u_agent,$m,$l);
?>
<table class="border: 1px solid #000000;width: 600px" align="center">
	<tr>
		<td class="fontt">
		<strong>Your Information</strong></td>
		<td class="fontt">
		<strong>Value</strong></td>
	</tr>
	<tr>
		<td class="fontss">
		IP Address</td>
		<td class="fontss">
		<?php echo $_SERVER['REMOTE_ADDR']?></td>
	</tr>
	<tr>
		<td class="fontss">
		Operating System</td>
		<td class="fontss">
		<?php echo $platform ?></td>
	</tr>
	<tr>
		<td class="fontss">
		Web Browser Name</td>
		<td class="fontss">
		<?php echo $bname?></td>
	</tr>
	<tr>
		<td class="fontss">
		Web Browser Version</td>
		<td class="fontss">
		<?php echo $version ?></td>
	</tr>
	<tr>
		<td class="fontss">
		Page Refered to this page</td>
		<td class="fontss">
		<?php if (isset( $_SERVER["HTTP_REFERER"])) echo $_SERVER["HTTP_REFERER"]; else echo '<i>None</i>'?></td>
	</tr>
</table>

<div class="text-align: center">

<br><font face="Tahoma">Pulkit</font>
