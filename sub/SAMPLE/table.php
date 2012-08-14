<style type = 'text/css'>

table 
	{
	border:1px solid #aaa;
	width:80%;
	margin:0px auto;
	}

td 
	{
	text-align:center;
	border:1px solid #aaa;
	height:100px;
	width:33%;
	}
	
tr:hover > td
	{
	border:1px solid #000;
	background:#aaa;
	}

input
	{
	font:25px;
	margin:0px;
	height:80px;
	width:250px;
	border:1px solid #aaa;
	}
p
	{
	text-align:center;
	font-variant:small-caps;
	font:25px;
	}
p:first-letter
	{
	font:40px;
	color:red;
	}	
	
input:focus
	{
	border:1px solid violet;
	}
input:hover
	{
	border:1px solid green;
	}
input:active
	{
	border:1px solid red;
	}
	
</style>

<table>
	<tr>
		<td colspan = '3'>&nbsp;</td>
	</tr>
	<tr>
		<td colspan = '2'>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan = '2'>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			<p>який-небудь текст</p>
		</td>
		<td>
			<input type = 'text' name = 'text' value = '€кий-небудь текст'>
		</td>
		<td>&nbsp;</td>
	</tr>
</table>