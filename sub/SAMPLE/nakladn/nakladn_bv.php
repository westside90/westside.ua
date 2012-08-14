<?php
//Форма заповнення банківської виписки
echo "<form action = 'php/rahunki/nakladn_bv.php' method='post'>
  <table width='487' border='0'>
    <tr>
      <th colspan='2' scope='col'>Банківська виписка № 
      <input type='text' name='bv_number' id='bv_number'></th>
    </tr>
    <tr>
      <td width='95'>Дата</td>
      <td width='382'><input type='text' name='bv_date' id='bv_date'></td>
    </tr>
    <tr>
      <td>Рахунок</td>
      <td><select name='bv_rahunok' id='bv_rahunok'>
      </select></td>
    </tr>
    <tr>
      <td>Залишок на початок</td>
      <td><input type='text' name='bv_zalyshok' id='bv_begin'></td>
    </tr>
    <tr>
      <td>Залишок на кінець</td>
      <td><input type='text' name='bv_end' id='bv_end'></td>
    </tr>
  </table>
 <br>
  <table width='487' border='1' cellpadding='0' cellspacing='1'>
    <tr>
      <td width='93' align='center'>Прихід/Розхід</td>
	  <td width='93' align='center'>Номер</td>
      <td width='170' align='center'>Контрагент/витрати</td>
      <td width='91' align='center'>Сума</td>
      <td width='90' align='center'>Призначення</td>
      <td width='25' align='center'>X</td>
    </tr>
    <tr>
      <td align='center'><select name='bv_type' id='bv_type'>
        <option>Прихід</option>
        <option>Розхід</option>
      </select></td>
	  <td align='center'><input type='text' name='bv_nomer' id='bv_nomer' width='50'></td>
      <td align='center'>&nbsp;</td>
      <td align='center'><input type='text' name='bv_summa' id='bv_summa' width='50'></td>
      <td align='center'><input type='text' name='bv_descr' id='bv_descr' width='50'></td>
      <td align='center'>&nbsp;</td>
    </tr>
  </table>
  <a href=''>Додати нову строку</a><br><br>
  <a href=''>Заповнити згідно платіжних доручень</a>
</form>";
?>