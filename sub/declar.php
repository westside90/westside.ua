<div align = "center">
<form name="form" 
	method="POST"
	action="">

<div align = "center">ПОДАТКОВА ДЕКЛАРАЦІЯ ПЛАТНИКА ЄДИНОГО ПОДАТКУ – ФІЗИЧНОЇ ОСОБИ - ПІДПРИЄМЦЯ</div>
<div align = "center">І. ЗАГАЛЬНІ ВІДОМОСТІ</div>
	
<table width="700px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="2" width = '20px'><div align="center">1</div></td>
    <td colspan="4"><div align="left">Тип податкової декларації</div></td>
  </tr>
  <tr>
    <td>
      <div align="left">
        <input type="radio" name="declar_type" value="0" checked>
      звітна</div></td>
    <td>
      <div align="left">
        <input type="radio" name="declar_type" value="1">
      нова звітна</div></td>
    <td>
      <div align="left">
        <input type="radio" name="declar_type" value="2">
        уточнююча
      </div></td>
    <td>
      <div align="left">
        <input type="radio" name="declar_type" value="3">
        довідково*
      </div></td>
  </tr>
  <tr>
    <td rowspan="2"><div align="center">2</div></td>
    <td colspan="3" rowspan="2"><div align="left">Звітний (податковий) період, за який подається або уточнюється податкова декларація:</div>
      <br>
      <div align="justify">І квартал <input type="radio" name="declar_period" value="3" checked> півріччя <input type="radio" name="declar_period" value="3"> три квартали <input type="radio" name="declar_period" value="3"> рік <input type="radio" name="declar_period" value="3"> місяць* <input type="radio" name="declar_period" value="4">
      </div></td>
    <td><div align="center">
      <input type="text" name="declar_year">
    </div></td>
  </tr>
  <tr>
    <td><div align="center">(рік)</div></td>
  </tr>
  <tr>
    <td rowspan="3"><div align="center">3</div></td>
    <td colspan="4"><div align="left">Прізвище, ім&rsquo;я, по батькові платника податку: <input type="text" name="declar_full_name"></div></td>
    </tr>
  <tr>
    <td colspan="3"><div align="left">Реєстраційний номер облікової картки платника<br>
      податків &ndash; фізичної особи - підприємця:</div></td>
    <td><div align="center">
      <input type="text" name="declar_ident_number">
    </div></td>
    </tr>
  <tr>
    <td colspan="4"><div align="center">або серія та номер паспорта (для фізичних осіб, які через релігійні переконання відмовляються від
      прийняття реєстраційного номера облікової картки платника податків та повідомили про це відповідний
      орган державної податкової служби і мають відмітку у паспорті)</div></td>
    </tr>
  <tr>
    <td rowspan="4"><div align="center">4</div></td>
    <td colspan="2"><div align="left">Податкова адреса (місце проживання) платника податку:</div></td>
    <td colspan="2"><div align="left">поштовий індекс
      <input type="text" name="declar_index">
    </div></td>
    </tr>
  <tr>
    <td colspan="2"><div align="left">(область, місто):
      <input type="text" name="declar_region">
    </div></td>
    <td colspan="2"><div align="left">міжміський код:
      <input type="text" name="declar_tel_kod">
    </div></td>
    </tr>
  <tr>
    <td colspan="2"><div align="left">Адреса:
      <input type="text" name="declar_address">
    </div></td>
    <td colspan="2"><div align="left">телефон:
      <input type="text" name="declar_tel">
    </div></td>
    </tr>
  <tr>
    <td colspan="2"><div align="left">Електронна адреса **:
		<input type="text" name="declar_email"></div></td>
    <td colspan="2"><div align="left">факс**:
      <input type="text" name="declar_faks">
    </div></td>
    </tr>
  <tr>
    <td rowspan="2"><div align="center">5</div></td>
    <td colspan="4"><div align="left">Найменування органу державної податкової служби, до якого подається податкова декларація:</div></td>
    </tr>
  <tr>
    <td colspan="4"><div align="left">&nbsp;</div></td>
    </tr>
  <tr>
    <td rowspan="8"><div align="center">6</div></td>
    <td colspan="4"><div align="left">Види підприємницької діяльності, які здійснювалися у звітному періоді:</div></td>
    </tr>
  <tr>
    <td><div align="center">номер згідно з КВЕД</div></td>
    <td colspan="3"><div align="center">назва згідно з КВЕД</div></td>
    </tr>
  <tr>
    <td><div align="center"><input type="text" name="declar_kved[0]"></div></td>
    <td colspan="3"><div align="center"><input type="text" name="declad_kved_name[0]"></div></td>
    </tr>
  <tr>
    <td><div align="center"><input type = 'button' value = 'Додати'></div></td>
    <td colspan="3"><div align="center"><input type = 'button' value = 'Видалити'></div></td>
    </tr>
  <tr>
    <td><div align="center">7</div></td>
    <td colspan="2"><div align="left">Фактична чисельність працівників у звітному періоді:</div></td>
    <td><div align="center"><input type="text" name="declar_workers"></div></td>
  </tr>
</table>

<div align = "center">* Подається з метою отримання довідки про доходи за інший період, ніж квартальний (річний) податковий (звітний) період, наростаючим підсумком.</div>
<div align = "center">** За бажанням платника податку.</div>
<div align = "center">ІІ. ПОКАЗНИКИ ГОСПОДАРСЬКОЇ ДІЯЛЬНОСТІ ДЛЯ ПЛАТНИКІВ ЄДИНОГО ПОДАТКУ І ГРУПИ</div>
<div align = "center">Щомісячні авансові внески, грн</div>

<table width="700px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">№ з/п</div></td>
    <td><div align="center">I квартал</div></td>
    <td><div align="center">II квартал</div></td>
    <td><div align="center">III квартал</div></td>
    <td><div align="center">IV квартал</div></td>
  </tr>
  <tr>
    <td><div align="center">1</div></td>
    <td><div align="center">2</div></td>
    <td><div align="center">3</div></td>
    <td><div align="center">4</div></td>
    <td><div align="center">5</div></td>
  </tr>
  <tr>
    <td>1-й місяць кварталу</td>
    <td><input type="text" name="declar_avans_01"></td>
    <td><input type="text" name="declar_avans_04"></td>
    <td><input type="text" name="declar_avans_07"></td>
    <td><input type="text" name="declar_avans_10"></td>
  </tr>
  <tr>
    <td>2-й місяць кварталу</td>
    <td><input type="text" name="declar_avans_02"></td>
    <td><input type="text" name="declar_avans_05"></td>
    <td><input type="text" name="declar_avans_08"></td>
    <td><input type="text" name="declar_avans_11"></td>
  </tr>
  <tr>
    <td>3-й місяць кварталу</td>
    <td><input type="text" name="declar_avans_03"></td>
    <td><input type="text" name="declar_avans_06"></td>
    <td><input type="text" name="declar_avans_09"></td>
    <td><input type="text" name="declar_avans_12"></td>
  </tr>
</table>

<table width="700px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">Назва показника</div></td>
    <td><div align="center">Код рядка</div></td>
    <td><div align="center">Обсяг (грн)*</div></td>
  </tr>
  <tr>
    <td><div align="center">1</div></td>
    <td><div align="center">2</div></td>
    <td><div align="center">3</div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу за звітний (податковий) період відповідно до<br />
      статті 292 глави 1 розділу XIV Податкового кодексу України<br />
      (згідно з підпунктом 1 пункту 291.4 статті 291 глави 1 розділу<br />
    XIV Податкового кодексу України)</div></td>
    <td><div align="center">01</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_01'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, що перевищує обсяги, встановлені підпунктом<br />
      1 пункту 291.4 статті 291 глави 1 розділу XIV Податкового<br />
    кодексу України, у звітному (податковому) періоді</div></td>
    <td><div align="center">02</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_02'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, отриманого від провадження діяльності, не<br />
      зазначеної у свідоцтві платника єдиного податку, у звітному<br />
    (податковому) періоді</div></td>
    <td><div align="center">03</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_03'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, отриманого при застосуванні іншого способу<br />
      розрахунків, ніж передбачено пунктом 291.6 статті 291 глави<br />
      1 розділу XIV Податкового кодексу України, у звітному<br />
    (податковому) періоді</div></td>
    <td><div align="center">04</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_04'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, отриманого від здійснення видів діяльності, які<br />
      не дають права на застосування спрощеної системи<br />
    оподаткування, у звітному (податковому) періоді</div></td>
    <td><div align="center">05</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_05'></div></td>
  </tr>
</table>

<div align = "center">* Заповнюється наростаючим підсумком з початку року.</div>
<div align = "center">ІІІ. ПОКАЗНИКИ ГОСПОДАРСЬКОЇ ДІЯЛЬНОСТІ ДЛЯ ПЛАТНИКІВ ЄДИНОГО ПОДАТКУ ІІ ГРУПИ</div>
<div align = "center">Щомісячні авансові внески, грн</div>

<table width="700px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">№ з/п</div></td>
    <td><div align="center">I квартал</div></td>
    <td><div align="center">II квартал</div></td>
    <td><div align="center">III квартал</div></td>
    <td><div align="center">IV квартал</div></td>
  </tr>
  <tr>
    <td><div align="center">1</div></td>
    <td><div align="center">2</div></td>
    <td><div align="center">3</div></td>
    <td><div align="center">4</div></td>
    <td><div align="center">5</div></td>
  </tr>
  <tr>
    <td>1-й місяць кварталу</td>
    <td><input type="text" name="declar_avans_01"></td>
    <td><input type="text" name="declar_avans_04"></td>
    <td><input type="text" name="declar_avans_07"></td>
    <td><input type="text" name="declar_avans_10"></td>
  </tr>
  <tr>
    <td>2-й місяць кварталу</td>
    <td><input type="text" name="declar_avans_02"></td>
    <td><input type="text" name="declar_avans_05"></td>
    <td><input type="text" name="declar_avans_08"></td>
    <td><input type="text" name="declar_avans_11"></td>
  </tr>
  <tr>
    <td>3-й місяць кварталу</td>
    <td><input type="text" name="declar_avans_03"></td>
    <td><input type="text" name="declar_avans_06"></td>
    <td><input type="text" name="declar_avans_09"></td>
    <td><input type="text" name="declar_avans_12"></td>
  </tr>
</table>

<table width="700px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">Назва показника</div></td>
    <td><div align="center">Код рядка</div></td>
    <td><div align="center">Обсяг (грн)*</div></td>
  </tr>
  <tr>
    <td><div align="center">1</div></td>
    <td><div align="center">2</div></td>
    <td><div align="center">3</div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу за звітний (податковий) період відповідно до<br />
      статті 292 глави 1 розділу XIV Податкового кодексу України<br />
      (згідно з підпунктом 2 пункту 291.4 статті 291 глави 1 розділу<br />
    XIV Податкового кодексу України)</div></td>
    <td><div align="center">06</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_06'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, що перевищує обсяги, встановлені підпунктом<br />
      2 пункту 291.4 статті 291 глави 1 розділу XIV Податкового<br />
    кодексу України, у звітному (податковому) періоді</div></td>
    <td><div align="center">07</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_07'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, отриманого від провадження діяльності, не<br />
      зазначеної у свідоцтві платника єдиного податку, у звітному<br />
    (податковому) періоді</div></td>
    <td><div align="center">08</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_08'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, отриманого при застосуванні іншого способу<br />
      розрахунків, ніж передбачено пунктом 291.6 статті 291 глави<br />
      1 розділу XIV Податкового кодексу України, у звітному<br />
    (податковому) періоді</div></td>
    <td><div align="center">09</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_09'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, отриманого від здійснення видів діяльності, які<br />
      не дають права на застосування спрощеної системи<br />
    оподаткування, у звітному (податковому) періоді</div></td>
    <td><div align="center">10</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_10'></div></td>
  </tr>
</table>

<div align = "center">* Заповнюється наростаючим підсумком з початку року.</div>
<div align = "center">ІV. ПОКАЗНИКИ ГОСПОДАРСЬКОЇ ДІЯЛЬНОСТІ ДЛЯ ПЛАТНИКІВ ЄДИНОГО ПОДАТКУ ІІІ ГРУПИ</div>

<table width="700px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">Назва показника</div></td>
    <td><div align="center">Код рядка</div></td>
    <td><div align="center">Обсяг (грн)*</div></td>
  </tr>
  <tr>
    <td><div align="center">1</div></td>
    <td><div align="center">2</div></td>
    <td><div align="center">3</div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу за звітний (податковий) період, що<br />
    оподатковується за ставкою 3 відсотки</div></td>
    <td><div align="center">11</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_11'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу за звітний (податковий) період, що<br />
    оподатковується за ставкою 5 відсотків</div></td>
    <td><div align="center">12</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_12'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, що перевищує обсяги, встановлені підпунктом<br />
      3 пункту 291.4 статті 291 глави 1 розділу XIV Податкового<br />
    кодексу України, у звітному (податковому) періоді</div></td>
    <td><div align="center">13</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_13'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, отриманого при застосуванні іншого способу<br />
      розрахунків, ніж передбачено пунктом 291.6 статті 291 глави<br />
      1 розділу XIV Податкового кодексу України, у звітному<br />
    (податковому) періоді</div></td>
    <td><div align="center">14</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_14'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума доходу, отриманого від здійснення видів діяльності, які<br />
      не дають права на застосування спрощеної системи<br />
    оподаткування, у звітному (податковому) періоді</div></td>
    <td><div align="center">15</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_15'></div></td>
  </tr>
</table>

<div align = "center">* Заповнюється наростаючим підсумком з початку року.</div>
<div align = "center">V. ВИЗНАЧЕННЯ ПОДАТКОВИХ ЗОБОВ’ЯЗАНЬ ПО ЄДИНОМУ ПОДАТКУ*</div>

<table width="700px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">Назва показника</div></td>
    <td><div align="center">Код рядка</div></td>
    <td><div align="center">Обсяг (грн)*</div></td>
  </tr>
  <tr>
    <td><div align="left">Загальна сума доходу за звітний (податковий) період (сума значень<br />
    рядків (01+02+03+04+05+06+07+08+09+10+11+12+13+14+15))</div></td>
    <td><div align="center">16</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_16'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума податку за ставкою 15% ((рядок 02 + рядок 03 + рядок 04 +<br />
      + рядок 05 + рядок 07 + рядок 08 + рядок 09 + рядок 10 + рядок 13 +<br />
    + рядок 14 + рядок 15) &times; 15%)</div></td>
    <td><div align="center">17</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_17'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума податку за ставкою 3% (рядок 11 &times; 3%)</div></td>
    <td><div align="center">18</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_18'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума податку за ставкою 5% (рядок 12 &times; 5%)</div></td>
    <td><div align="center">19</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_19'></div></td>
  </tr>
  <tr>
    <td><div align="left">Нараховано всього за звітний (податковий) період (рядок 17 + рядок 18 +<br />
    + рядок 19)</div></td>
    <td><div align="center">20</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_20'></div></td>
  </tr>
  <tr>
    <td><div align="left">Нараховано за попередній звітний (податковий) період (значення рядка 20<br />
    декларації попереднього звітного (податкового) періоду)</div></td>
    <td><div align="center">21</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_21'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума єдиного податку, яка підлягає нарахуванню та сплаті в бюджет за<br />
    підсумками поточного звітного (податкового) періоду (рядок 20 &ndash; рядок 21)</div></td>
    <td><div align="center">22</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_22'></div></td>
  </tr>
</table>

<div align = "center">* Не заповнюється платником податку, що подає декларацію „Довідково”.</div>
<div align = "center">VІ. ВИЗНАЧЕННЯ ПОДАТКОВИХ ЗОБОВ'ЯЗАНЬ У ЗВ'ЯЗКУ З ВИПРАВЛЕННЯМ САМОСТІЙНО ВИЯВЛЕНИХ ПОМИЛОК*</div>

<table width="700px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">Назва показника</div></td>
    <td><div align="center">Код рядка</div></td>
    <td><div align="center">Обсяг (грн)*</div></td>
  </tr>
  <tr>
    <td><div align="left">Сума єдиного податку, яка підлягала перерахуванню до бюджету, за<br />
      даними звітного (податкового) періоду, в якому виявлена помилка<br />
    (рядок 22 відповідної декларації)</div></td>
    <td><div align="center">23</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_23'></div></td>
  </tr>
  <tr>
    <td><div align="left">Уточнена сума податкових зобов'язань за звітний (податковий) період, у<br />
    якому виявлена помилка</div></td>
    <td><div align="center">24</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_24'></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="left">Розрахунки у зв'язку з виправленням помилки:</div></td>
  </tr>
  <tr>
    <td><div align="left">збільшення суми, яка підлягала перерахуванню до бюджету<br />
    (рядок 24 &ndash; рядок 23, якщо рядок 24 &gt; рядка 23)</div></td>
    <td><div align="center">25</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_25'></div></td>
  </tr>
  <tr>
    <td><div align="left">зменшення суми, яка підлягала перерахуванню до бюджету**<br />
    (рядок 24 &ndash; рядок 23, якщо рядок 24 &lt; рядка 23)</div></td>
    <td><div align="center">26</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_26'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума штрафу, яка нарахована платником податку самостійно у зв'язку з<br />
    виправленням помилки, <input type = 'text' name = ''> % (рядок 25 &times; 3% або 5%)</div></td>
    <td><div align="center">27</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_27'></div></td>
  </tr>
  <tr>
    <td><div align="left">Сума пені, яка нарахована платником податку самостійно відповідно до<br />
      підпункту 129.1.2 пункту 129.1 статті 129 глави 12 розділу ІІ Податкового<br />
    кодексу України</div></td>
    <td><div align="center">28</div></td>
    <td><div align="center"><input type = 'text' name = 'declar_28'></div></td>
  </tr>
</table>

<div align = "center">* Заповнюється платником податку, який уточнює податкові зобов’язання.</div>
<div align = "center">** Відображаються тільки позитивні значення.</div>

<table width="700px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td>Доповнення до податкової декларації (заповнюється і додається відповідно до пункту 46.4 статті 46 глави 2 розділу ІІ Податкового кодексу України) на:</td>
    <td align = 'center'><input type="text" name="declar_dodatok"></td>
    <td>арк.</td>
  </tr>
</table>

<div align = "center">Відповідно до пункту 46.4 статті 46 розділу ІІ Податкового кодексу України, повідомляємо:</div>

<table>
	<tr>
		<td>№ з/п</td>
		<td>Зміст доповнення</td>
	</tr>
	<tr>
		<td>1</td>
		<td></td>
	</tr>
		<td>&nbsp;</td>
		<td></td>
	</tr>
</table>

<table width="700px" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="left">Дата подання податкової декларації</div></td>
    <td><div align="center">
      <input type="date">
    </div></td>
  </tr>
</table>


<table width="700px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="left">Фізична особа - підприємець</div></td>
    <td><div align="center">
      <input type="text" name="declar_name" />
    </div></td>
    <td><div align="center">
      <input type="text" name="declar_ident_number" />
    </div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center">(ініціали та прізвище)</div></td>
    <td><div align="center">(реєстраційний номер облікової картки платника
    податків)</div></td>
  </tr>
</table>
</form>
</div>