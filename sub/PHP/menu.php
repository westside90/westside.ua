<style type="text/css">

.time {
	behavior:url(#default#time2)
	}

#menu {
	width:951px;
	height:40px;
	background:#aaa;
	border-bottom:1px solid #aaa;
	border-top:1px solid #aaa;
	}

#menu ul {
	margin:0;
	padding:0;
	list-style:none;
	white-space:nowrap;
	text-align:left;
	}

#menu ul {
	float:left;
	} 

#menu li {
	display:inline-block;
	display:inline;
	}

#menu ul ul {
	position:absolute;
	display:none;
	left:0;
	top:40px;
	border:1px solid #aaa;
	}

#menu ul.level1 li.level1-li {
	float:left; 
	display:block; 
	position:relative;
	}

#menu ul {
	background:#fff;
	}

#menu span, #menu a {
	display:block;
	font:bold 12px arial,sans-serif;
	color:#000;
	line-height:40px;
	text-decoration:none;
	padding:0 10px 0 20px;
	border-left:1px solid #aaa;
	}

#menu ul ul a {
	border:0;
	}

#menu ul.level1 li.level1-li a.level1-a {
	float:left;
	}

#menu ul li:hover > ul {
	display:block;
	}

#menu li:hover {
	background:#d50c1c;
	color:#fff;
	cursor:default;
	}

#menu a:hover {
	background:#d50c1c;
	color:#fff;
	}

#menu li:hover > a, #menu li:hover > span {
	background:#d50c1c;
	color:#fff;
	}

</style>

<div align = 'center'>
<div id="menu">
	<ul class="level1">
		<li class="level1-li" id="a1"><a class="level1-a" href="/index.php">�������</a></li>
		<li class="level1-li" id="s1"><span>������ (�������)</span>
			<ul class="time" begin="s1.mouseenter" end="s1.mouseleave" timeAction="display">
				<li><a href="">�����/������� ������</a></li>
				<li><a href="">�����/������� �������</a></li>
				<li><a href="">������ ������ � ������</a></li>
			</ul>
		</li>
		<li class="level1-li" id="s2"><span>������ �����</span>
			<ul class="time" begin="s2.mouseenter" end="s2.mouseleave" timeAction="display">
				<li><a href="">����� ����������</a></li>
				<li><a href="">�������� ����������</a></li>
				<li><a href="">����� �������</a></li>
			</ul>
		</li>
		<li class="level1-li" id="s3"><span>������� / �������������</span>
			<ul class="time" begin="s3.mouseenter" end="s3.mouseleave" timeAction="display">
				<li><a href="">������ �����������</a></li>
				<li><a href="">���������� � �������������</a></li>
				<li><a href="">���������� � ���������������</a></li>
				<li><a href="">���������� � ���������</a></li>
				<li><a href="">��� ����� ���������������</a></li>
			</ul>
		</li>
		<li class="level1-li" id="s4"><span>�����������</span>
			<ul class="time" begin="s4.mouseenter" end="s4.mouseleave" timeAction="display">
				<li><a href="">������ �����������</a></li>
				<li><a href="">����������� � ������� �������� �����</a></li>
				<li><a href="">������ ������ �����������</a></li>
			</ul>
		</li>
		<li class="level1-li" id="s5"><span>Գ������ ���������� / �������</span>
			<ul class="time" begin="s5.mouseenter" end="s5.mouseleave" timeAction="display">
				<li><a href="">��������-�������� �������</a></li>
				<li><a href="">����� ����� ������</a></li>
				<li><a href="">�������� ������</a></li>
				<li><a href="">��������� �������</a></li>
				<li><a href="">������� �� ��������� �����</a></li>
			</ul>
		</li>
		<li class="level1-li" id="s6"><span>������������</span>
			<ul class="time" begin="s6.mouseenter" end="s6.mouseleave" timeAction="display">
				<li><a href="">������� �����</a></li>
				<li><a href="">������� / �����������</a></li>
			</ul>
	</ul>
</div>
</div>
<hr>