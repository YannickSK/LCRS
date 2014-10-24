<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Aurora's LCRS</title>
	<link rel="stylesheet" type="text/css" href="style/view.css" media="all">
	<link rel="stylesheet" type="text/css" href="style/navigationbar.css" media="all">
	<script type="text/javascript" src="js/view.js"></script>
	<script type="text/javascript" src="js/calendar.js"></script>
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
	<script type="text/javascript" src="js/jquery.values.js"></script>
</head>	
<body id="main_body">
	<div id="form_container">
		<h1><p>Aurora's Loot Council Report System</p></h1>
		<form action="scripts/save-report.php" method="post">
			<div class="form_description">
				<h2>&nbsp;Aurora Loot-council.</h2>
				&nbsp;&nbsp;Fill the form out for administration purposes.
			</div>						
		<ul>
		<li id="li_1" >
			<label class="description" for="element_1">Date: </label>
			<span>
				<input id="element_1_1" name="element_1_1" class="element text" size="2" maxlength="2" value="" type="text"> /
				<label for="element_1_1">MM</label>
			</span>
		<span>
			<input id="element_1_2" name="element_1_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_1_2">DD</label>
		</span>
		<span>
	 		<input id="element_1_3" name="element_1_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_1_3">YYYY</label>
		</span>
		<span id="calendar_1">
			<img id="cal_img_1" class="datepicker" src="style/calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_1_3",
			baseField    : "element_1",
			displayArea  : "calendar_1",
			button		 : "cal_img_1",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script> 
		</li>		
		<li id="li_3" >
			<label class="description" for="form_maincharname">Name of MAIN character: </label>
		<div>
			<input id="form_maincharname" name="form_maincharname" class="element text medium" type="text" maxlength="255" value=""/>
		</div> 
		</li>		
			<li id="li_6" >
				<label class="description" for="form_altormain">Item won on: MAIN/ALT </label>
		<div>
			<select class="element select medium" id="form_altormain" name="form_altormain"> 
			<option value="MAIN" >MAIN</option>
			<option value="ALT" >ALT</option>
			</select>
		</div> 
		</li>		
		<li id="li_4" >
			<label class="description" for="form_altnameclass">If alt: state name+class here. If not: fill - in. </label>
			<div>
				<input id="element_4" name="form_altnameclass" class="element text medium" type="text" maxlength="255" value=""/> 
			</div> 
		</li>		
		<li id="li_2" >
			<label class="description" for="form_instance">Instance (RS25HC, ICC25HC	): </label>
			<div>
				<input id="form_instance" name="form_instance" class="element text medium" type="text" maxlength="255" value=""/> 
			</div> 
		</li>		
		<li id="li_5" >
			<label class="description" for="form_itemname">Item won: </label>
			<div>
				<input id="form_itemname" name="form_itemname" class="element text medium" type="text" maxlength="255" value=""/> 
			</div> 
		</li>	
		<p>
			<button type="submit">Submit</button>
		</p>			</ul>
		</form>	
		<ul id="navmenu1" class="topmenu">
			<input type="checkbox" id="navmenu1-switcher" class="switchbox"><label onclick="" class="switch" for="navmenu1-switcher"></label>	<li class="toproot"><a href="#" style="height:16px;line-height:16px;"><span>Navigation</span></a>
				<ul>
					<li><a href="http://aurora-rag.comuv.com/itemlist" target="_blank" title="Itemlist if you're not sure what abbreviation means what item.">Itemlist</a></li>
					<li><a href="http://aurora-rag.comuv.com/LCRS" target="_blank" title="LCRS reporting form, used for Loot Council reporting.">LCRS Form</a></li>
					<li><a href="http://aurora-rag.comuv.com/" target="_blank" title="Contains all loot council reports thus far.">Reports</a></li>
					<li><a href="http://aurora-rag.shivtr.com/forum_threads/1892867" target="_blank" title="A tutorial on how to properly use the LCRS.">Tutorial</a></li>
					</li>
				</ul>
			</input>
		</ul>
	</div>
	</body>
</html>