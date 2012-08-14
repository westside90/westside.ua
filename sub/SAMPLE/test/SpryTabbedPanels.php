<script 
	src="SpryTabbedPanels.js"
	type="text/javascript">
	</script>
<link 
	href="SpryTabbedPanels.css"
	rel="stylesheet"
	type="text/css">

<div 
	id="TabbedPanels1"
	class="TabbedPanels">
	
	<ul class="TabbedPanelsTabGroup">
		<li class="TabbedPanelsTab" tabindex="0">Вкладка 1
			</li>
		<li class="TabbedPanelsTab" tabindex="0">Вкладка 2
			</li>
	</ul>
  
	<div class="TabbedPanelsContentGroup">
		<div class="TabbedPanelsContent">Содержимое 1
			</div>
		<div class="TabbedPanelsContent">Содержимое 2
			</div>
	</div>
</div>

<script 
	type="text/javascript">
	var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
