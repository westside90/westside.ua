<style type = 'text/css'>

.drop-shadow {
            position:relative;
            float:left;
            width:40%;    
            padding:1em; 
            margin:2em 10px 4em; 
            background:#fff;
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

#embossment div {
	background: red;
	border-radius: 15px;
	box-shadow:inset rgba(255,255,255,0.5) 8px 8px 18px 5px,
				inset rgba(0,0,0,0.3) -8px -8px 18px 5px;
	height: 55px;
	margin: 20px; 
	width: 150px;
	text-shadow: 3px 3px 4px gray;
	}
#embossment div:hover {
	background: red;
	border-radius: 15px;
	box-shadow:inset rgba(255,255,255,0.3) -8px -8px 18px 5px,
				inset rgba(0,0,0,0.3) 8px 8px 18px 5px;
	height: 55px;
	margin: 20px; 
	width: 150px;
	text-shadow: 3px 3px 4px gray;
	}
		
</style>

<body bgcolor = '#ddd'>
<table class = 'drop-shadow lifted'>
<tr><td>rufhisrfuysgefaekufgwsvcki</td></tr>
</table>

<div class = 'canvas' id="embossment" style = 'color:#fff; font-size:40px;'>
<div align = 'center' valign = 'middle' style = 'padding:10px;'>Кнопка</div>
</div>
</body>





