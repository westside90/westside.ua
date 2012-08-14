<style type = 'text/css'>
ul#cssmenu {
        width:893px;
        margin: 0;
        border: 0 none;
        padding: 0;
        list-style: none;
        background: #003366;
        height: 30px;
        font: bold 12px/28px Verdana, Arial;
        border-left:#003366 1px solid;
}

ul#cssmenu li {
        margin: 0;
        border: 0 none;
        padding: 0;
        float: left;
        display: inline;
        list-style: none;
        position: relative;
        height: 30px;
}

ul#cssmenu ul {
        margin: 0;
        border: 0 none;
        padding: 0;
        width: auto;
        list-style: none;
        display: none;
        position: absolute;
        top: 30px;
        left: 0;
}

ul#cssmenu ul:after {
        clear: both;
        display: block;
        font: 1px/0px serif;
        content: ".";
        height: 0;
        visibility: hidden;
}

ul#cssmenu ul li {
        width: auto;
        display: block !important;
        display: inline;
}

/* Main Menu */
ul#cssmenu a {
        border: 0px;
        padding: 0 10px;
        float: none !important;
        float: left;
        display: block;
        background: #003366;
        color: #FFFFFF;
        font: bold 12px/28px Verdana, Arial;
        text-decoration: none;
        height: auto !important;
        height: 1%;
}

/* Main Menu Hover */
ul#cssmenu a:hover,
ul#cssmenu li:hover a,
ul#cssmenu li.iehover a {
        background: #FFFFFF;
        color:#003366;
        border-top:#003366 1px solid;
}

/* Second Menu */
ul#cssmenu li:hover li a,
ul#cssmenu li.iehover li a {
        border-top: 2px solid #FFFFFF;
        float: none;
        background: #003366;
        color: #FFFFFF;
}

/* Second Menu Hover */
ul#cssmenu li:hover li a:hover,
ul#cssmenu li:hover li:hover a,
ul#cssmenu li.iehover li a:hover,
ul#cssmenu li.iehover li.iehover a {
        border-top: 2px solid #FFFFFF;
        background: #FFFFFF;
        color:#003366;
        border:#003366 1px solid;
}

ul#cssmenu ul ul {
        display: none;
        position: absolute;
        top: 0;
        left: 170px;
}

ul#cssmenu li:hover ul ul,
ul#cssmenu li.iehover ul ul {
        display: none;
}

ul#cssmenu li:hover ul,
ul#cssmenu ul li:hover ul,
ul#cssmenu li.iehover ul,
ul#cssmenu ul li.iehover ul {
        display: block;
} 
</style>


<div align = 'center'>
<ul id="cssmenu">
        <li><a href="#">Товари (роботи, послуги)</a>
                <ul>
                        <li><a href="#">Товари</a></li>
                        <li><a href="#">Послуги</a></li>
						<li><a href="#">Список товарів/послуг</a></li>
                </ul>
        </li>
        <li><a href="#">Грошові кошти</a>
                <ul>
                        <li><a href="#">Каса</a></li>
                        <li><a href="#">Банк</a></li>
                        <li><a href="#">Рахунки</a></li>
                </ul>
        </li>
        <li><a href="#">Контрагенти</a>
                <ul>
                        <li><a href="#">Список контрагентів</a></li>
                        <li><a href="#">Розрахунки з контрагентами</a></li>
						<li><a href="#">Акт звірки взаєморозрахунків</a></li>
						<li><a href="#">Додати контрагента</a></li>
                </ul>
        </li>
		<li><a href="#">Співробітники</a>
				<ul>
						<li><a href="#">Ссылка 1</a></li>
                        <li><a href="#">Ссылка 2</a></li>
                </ul>
        </li>
		<li><a href="#">Фінансові результати/Звітність</a>
                <ul>
                        <li><a href="#">Ссылка 1</a></li>
                        <li><a href="#">Ссылка 2</a></li>
                </ul>
        </li>
        <li><a href="#">Налаштування</a>
                <ul>
                        <li><a href="#">Ссылка 1</a></li>
                        <li><a href="#">Ссылка 2</a></li>
                </ul>
        </li>
</ul>
</div>