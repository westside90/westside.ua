<style type = 'text/css'>
#table {
		display: table;
		border-collapse: collapse;
		border-radius: 10px;
		margin-left: 100px;
		margin-top: 50px;
		width: 90%;
		height: 90%;
		background-color: #fff;
		}
		
.out {
	box-shadow: 0px 5px 10px #999;
	-moz-box-shadow: 0px 5px 10px #999;
	-webkit-box-shadow: 0px 5px 10px #999;
	}
	
.drop-shadow {
            position:relative;
            float:center;
            width:98%;    
            padding:1em; 
            margin:2em 10px 4em; 
            background:#f8f2dd;
            -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
               -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                    box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
        }
 
        .drop-shadow:before,
        .drop-shadow:after {
            content:"";
            position:absolute; 
            z-index:-2;
        }
 
        .drop-shadow p {
            font-size:16px;
            font-weight:bold;
        }
 
        /* Поднятые углы */
 
        .lifted {
            -moz-border-radius:4px; 
             border-radius:4px;
        }
 
        .lifted:before,
        .lifted:after { 
            bottom:15px;
            left:10px;
            width:50%;
            height:20%;
            max-width:300px;
            -webkit-box-shadow:0 15px 10px rgba(0, 0, 0, 0.3);   
             -moz-box-shadow:0 15px 10px rgba(0, 0, 0, 0.3);
             box-shadow:0 15px 10px rgba(0, 0, 0, 0.3);
            -webkit-transform:rotate(-3deg);    
             -moz-transform:rotate(-3deg);   
             -ms-transform:rotate(-3deg);   
              -o-transform:rotate(-3deg);
              transform:rotate(-3deg);
        }
 
        .lifted:after {
            right:10px; 
            left:auto;
            -webkit-transform:rotate(3deg);   
             -moz-transform:rotate(3deg);  
             -ms-transform:rotate(3deg);  
             -o-transform:rotate(3deg);
              transform:rotate(3deg);
		}

.time {
	behavior:url(#default#time2)
	}

#menu {
	width:100%;
	height:50px;
	background:#fff;
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
	top:50px;
	border-collapse: collapse;
	border:1px solid #0a5c90;
	border-radius: 5px;
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
	font:bold 14px arial,sans-serif;
	color:#000;
	line-height:50px;
	text-decoration:none;
	padding:0 10px 0 20px;
	border:1px solid #0a5c90;
	border-radius: 5px;
	}

#menu ul ul a {
	border: 0;
	}

#menu ul.level1 li.level1-li a.level1-a {
	float:left;
	}

#menu ul li:hover > ul {
	display:block;
	}

#menu li:hover {
	background:#0a5c90;
	color:#fff;
	cursor:default;
	}

#menu a:hover {
	background:#fff;
	color:#0a5c90;
	}

#menu li:hover > a, #menu li:hover > span {
	background:#0a5c90;
	color:#fff;
	}
</style>

<html>
<head>
<title>БУХГАЛТЕР 24
</title>
</head>
<body bgcolor = '#b7cddb'>

<table id = 'table'  class = 'drop-shadow lifted'>
	<tr>
		<td colspan = '2' width = '100%' height = '100px'>
			<div style = 'padding: 10px; background-color: #0a5c90; border-radius: 10px; text-shadow: 2px 2px 3px black; color: white; font-size:40px; font-weight:900; font-family: cursive'>БУХГАЛТЕР<font style ='vertical-align: -5px; background-color: #0a5c90; text-shadow: 2px 2px 3px black; color: red; font-size:60px; font-weight:400; font-family: cursive' >24</font>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan = '2' width = '100%' height = '50px'>
<div id="menu">
	<ul class="level1">
		<li class="level1-li" id="a1"><a class="level1-a" href="/index.php">Головна</a></li>
		<li class="level1-li" id="s1"><span>Товари (послуги)</span>
			<ul class="time" begin="s1.mouseenter" end="s1.mouseleave" timeAction="display">
				<li><a href="">Надані/Отримані товари</a></li>
				<li><a href="">Надані/Отримані послуги</a></li>
				<li><a href="">Список товарів і послуг</a></li>
			</ul>
		</li>
		<li class="level1-li" id="s2"><span>Грошові кошти</span>
			<ul class="time" begin="s2.mouseenter" end="s2.mouseleave" timeAction="display">
				<li><a href="">Касові розрахунки</a></li>
				<li><a href="">Банківські розрахунки</a></li>
				<li><a href="">Власні рахунки</a></li>
			</ul>
		</li>
		<li class="level1-li" id="s3"><span>Покупці / Постачальники</span>
			<ul class="time" begin="s3.mouseenter" end="s3.mouseleave" timeAction="display">
				<li><a href="">Список контрагентів</a></li>
				<li><a href="">Розрахунки з контрагентами</a></li>
				<li><a href="">Розрахунки з постачальниками</a></li>
				<li><a href="">Розрахунки з покупцями</a></li>
				<li><a href="">Акт звірки взаєморозрахунків</a></li>
			</ul>
		</li>
		<li class="level1-li" id="s4"><span>Співробітники</span>
			<ul class="time" begin="s4.mouseenter" end="s4.mouseleave" timeAction="display">
				<li><a href="">Список співробітників</a></li>
				<li><a href="">Нарахування і виплата заробітної плати</a></li>
				<li><a href="">Додати нового співробітника</a></li>
			</ul>
		</li>
		<li class="level1-li" id="s5"><span>Фінансові результати / Звітність</span>
			<ul class="time" begin="s5.mouseenter" end="s5.mouseleave" timeAction="display">
				<li><a href="">Оборотно-сальдова відомість</a></li>
				<li><a href="">Книга обліку доходів</a></li>
				<li><a href="">Закриття періоду</a></li>
				<li><a href="">Податкова звітність</a></li>
				<li><a href="">Звітність до пенсійного фонду</a></li>
			</ul>
		</li>
		<li class="level1-li" id="s6"><span>Налаштування</span>
			<ul class="time" begin="s6.mouseenter" end="s6.mouseleave" timeAction="display">
				<li><a href="">Одиниці виміру</a></li>
				<li><a href="">Витрати / Надходження</a></li>
			</ul>
	</ul>
</div>
		</td>
	</tr>
	<tr>
		<td width = '75%'>&nbsp;</td>
		<td width = '25%'>&nbsp;
			<div align = 'center' valign = 'middle'>
				Логін <input type = 'text' name = 'login'><br>
				Пароль <input type = 'password' name = 'pass'><br>
				<input type = 'submit' value = 'Ввійти'>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan = '2' width = '100%' height = '80px'>
			<div style = 'padding: 25px; background-color: #0a5c90; border-radius: 10px; color: white; font-size:20px; font-weight:500; font-family: cursive' align = 'center'>
			buhgalter24@ukr.net
			</div>
		</td>
	</tr>
</table>	
	
</body>
</html>