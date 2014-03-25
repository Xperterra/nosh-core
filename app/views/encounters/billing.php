<button type="button" id="print_invoice">Print Invoice</button>
<button type="button" id="print_hcfa">Print HCFA-1500</button>
<button type="button" id="encounter_payment">Add Payment for Encounter</button>
<input type="hidden" name="insurance_id_1_old" id="insurance_id_1_old"/>
<input type="hidden" name="insurance_id_2_old" id="insurance_id_2_old"/>
<input type="hidden" name="bill_complex_old" id="billing_bill_complex_old"/>
<form id="encounter_billing_form">
<input type="hidden" name="insurance_id_1" id="insurance_id_1"/>
<input type="hidden" name="insurance_id_2" id="insurance_id_2"/>
<hr class="ui-state-default"/>
<table>
	<tr>
		<td>Complexity of encounter:</td>
		<td><select name="bill_complex" id="billing_bill_complex" class="text ui-widget-content ui-corner-all"></select></td>
	</tr>
</table><br>
</form>
<hr class="ui-state-default"/>
<table>
	<tr>
		<td>Primary Insurance:</td>
		<td id="insuranceinfo1"></td>
		<td><button type="button" id="clear_insurance1">Clear</button></td>
	</tr>
	<tr>
		<td>Secondary Insurance:</td>
		<td id="insuranceinfo2"></td>
		<td><button type="button" id="clear_insurance2">Clear</button></td>
	</tr>
</table><br>
<table id="billing_insurance_list" class="scroll" cellpadding="0" cellspacing="0"></table>
<div id="billing_insurance_pager" class="scroll" style="text-align:center;"></div><br>
<button type="button" id="select_insurance1">Select as primary insurance</button>
<button type="button" id="select_insurance2">Select as secondary insurance</button>
<button type="button" id="select_self_pay">No insurance</button><br>
<hr class="ui-state-default"/><br>
<table id="cpt_list" class="scroll" cellpadding="0" cellspacing="0"></table>
<div id="cpt_list_pager" class="scroll" style="text-align:center;"></div><br>
<button type="button" id="add_billing_cpt">Add Row</button>
<button type="button" id="edit_billing_cpt">Edit Row</button>
<button type="button" id="remove_billing_cpt">Remove Row</button><br><br>
<div id="cpt_billing_dialog" title="CPT Helper" style="font-size: 0.9em">
	<form id="billing_form">
	<input type="hidden" name="billing_core_id" id="billing_core_id"/>
		<table>
				<tr>
					<td>CPT Code:</td>
					<td><input type="text" name="cpt" id="billing_cpt" style="width:200px" class="text ui-widget-content ui-corner-all"/> <button type="button" id="cpt_favorites">CPT Favorites</button><button type="button" id="cpt_helper">CPT Helper</button><button type="button" id="cpt_link">CPT Editor</button></td>
				</tr>
				<tr>
					<td>Charge:</td>
					<td>$<input type="text" name="cpt_charge" id="billing_cpt_charge" style="width:195px" class="text ui-widget-content ui-corner-all"/> <button type="button" id="update_cpt_charge">Update Charge</button></td>
				</tr>
				<tr>
					<td>Unit:</td>
					<td><input type="text" name="unit" id="billing_unit" style="width:200px" class="text ui-widget-content ui-corner-all"/></td>
				</tr>
				<tr>
					<td>Modifier:</td>
					<td><select name="modifier" id="billing_modifier" style="width:200px" class="text ui-widget-content ui-corner-all"></select></td>
				</tr>
				<tr>
					<td>Date of Service/From:</td>
					<td><input type="text" name="dos_f" id="billing_dos_f" style="width:200px" class="text ui-widget-content ui-corner-all"/></td>
				</tr>
				<tr>
					<td>Date of Service/To:</td>
					<td><input type="text" name="dos_t" id="billing_dos_t" style="width:200px" class="text ui-widget-content ui-corner-all"/></td>
				</tr>
				<tr>
					<td>Diagnosis Pointer</td>
					<td><select name="icd_pointer[]" id="billing_icd" multiple="multiple" style="width:400px" class="multiselect"></select></td>
				</tr>
			</table><br>
	</form>
</div>
<div id="cpt_helper_dialog" title="CPT Helper" style="font-size: 0.9em">
	<div id="cpt_helper_items">
		<h3><a href="#">Evaluation and Management Codes</a></h3>
		<div>
			<table>
				<tr>
					<td>New Patient:</td>
					<td>
						<input name="cpt_helper1" id="99202" value="99202" type="radio" class="cpt_buttons"><label for="99202">99202</label>
						<input name="cpt_helper1" id="99203" value="99203" type="radio" class="cpt_buttons"><label for="99203">99203</label>
						<input name="cpt_helper1" id="99204" value="99204" type="radio" class="cpt_buttons"><label for="99204">99204</label>
						<input name="cpt_helper1" id="99205" value="99205" type="radio" class="cpt_buttons"><label for="99205">99205</label>
					</td>
				</tr>
				<tr>
					<td>Established Patient:</td>
					<td>
						<input name="cpt_helper1" id="99212" value="99212" type="radio" class="cpt_buttons"><label for="99212">99212</label>
						<input name="cpt_helper1" id="99213" value="99213" type="radio" class="cpt_buttons"><label for="99213">99213</label>
						<input name="cpt_helper1" id="99214" value="99214" type="radio" class="cpt_buttons"><label for="99214">99214</label>
						<input name="cpt_helper1" id="99215" value="99215" type="radio" class="cpt_buttons"><label for="99215">99215</label>
					</td>
				</tr>
			</table>
		</div>
		<h3><a href="#">Preventative Visit Codes</a></h3>
		<div>
			<input name="cpt_helper1" id="new_prevent" value="<?php echo $prevent_new;?>" type="radio" class="cpt_buttons"><label for="new_prevent">New - <?php echo $prevent_new;?></label>
			<input name="cpt_helper1" id="established_prevent" value="<?php echo $prevent_established;?>" type="radio" class="cpt_buttons"><label for="established_prevent">Established - <?php echo $prevent_established;?></label>
		</div>
		<h3><a href="#">Prolonged Visit Codes</a></h3>
		<div>
			<input name="cpt_helper1" id="99354" value="99354" type="radio" class="cpt_buttons"><label for="99354">99354</label>
			<input name="cpt_helper1" id="99355" value="99355" type="radio" class="cpt_buttons"><label for="99355">99355 - Additional 30 minutes</label>
		</div>
	</div>
</div>
<script type="text/javascript">
	function get_insurance_info1() {
		var a = $("#insurance_id_1").val();
		var b = $("#insurance_id_2").val();
		$.ajax({
			type: "POST",
			url: "ajaxchart/get-insurance-info",
			data: "insurance_id_1=" + a + "&insurance_id_2=" + b,
			dataType: "json",
			success: function(data){
				$("#insuranceinfo1").html(data.result1);
				$("#insuranceinfo2").html(data.result2);
			}
		});
	}
	$(".cpt_buttons").button();
	$("#billing_bill_complex").addOption({"":"","Low Complexity":"Low Complexity","Medium Complexity":"Medium Complexity","High Complexity":"High Complexity"}, false);
	$("#billing_modifier").addOption({"":"","25":"25 - Significant, Separately Identifiable E & M Service.","52":"52 - Reduced Service .","59":"59 - Distinct Procedural Service."}, false);
	$.ajax({
		type: "POST",
		url: "ajaxchart/get-insurance-id",
		dataType: "json",
		success: function(data){
			$("#insurance_id_1").val(data.insurance_id_1);
			$("#insurance_id_2").val(data.insurance_id_2);
			$("#billing_bill_complex").val(data.bill_complex);
			$("#insurance_id_1_old").val(data.insurance_id_1);
			$("#insurance_id_2_old").val(data.insurance_id_2);
			$("#billing_bill_complex_old").val(data.bill_complex);
			if (data.insurance_id_1 == '') {
				$("#insuranceinfo1").html("No primary insurance chosen");
			}
			if (data.insurance_id_2 == '') {
				$("#insuranceinfo2").html("No secondary insurance chosen");
			}
			get_insurance_info1();
		}
	});
	$("#cpt_billing_dialog").dialog({ 
		bgiframe: true, 
		autoOpen: false, 
		height: 400, 
		width: 800, 
		modal: true,
		draggable: false,
		resizable: false,
		open: function() {
			$("#billing_cpt").catcomplete({
				source: function (req, add){
					$.ajax({
						url: "ajaxsearch/cpt1",
						dataType: "json",
						type: "POST",
						data: req,
						success: function(data){
							if(data.response =='true'){
								add(data.message);
							} else {
								var addterm = [{"label": req.term + ": Select to add CPT to database.", "value":"*/add/*", "value1": req.term, "category":"New CPT Code"}];
								add(addterm);
							}
						}
					});
				},
				minLength: 3,
				select: function(event, ui){
					if (ui.item.value == "*/add/*") {
						$("#configuration_cpt_form").clearForm();
						if (ui.item.value1.length > 5) {
							$("#configuration_cpt_description").val(ui.item.value1);
						} else {
							$("#configuration_cpt_code").val(ui.item.value1);
						}
						$('#configuration_cpt_origin').val("billing_cpt");
						$('#configuration_cpt_dialog').dialog('open');
						$('#configuration_cpt_dialog').dialog('option', 'title', "Add CPT Code");
					} else {
						$("#billing_cpt_charge").val(ui.item.charge);
						$("#billing_unit").val(ui.item.unit);
					}
				},
				change: function (event, ui) {
					if(!ui.item){
						$.jGrowl("CPT code must be selected from the database!");
						$("#billing_cpt").addClass("ui-state-error");
					} else {
						$("#billing_cpt").removeClass("ui-state-error");
					}
				}
			});
		},
		buttons: {
			'Save': function() {
				var a = $("#billing_icd");
				var b = $("#billing_cpt");
				var c = $("#billing_cpt_charge");
				var bValid = true;
				bValid = bValid && checkEmpty(a,"ICD Pointer");
				bValid = bValid && checkEmpty(b,"CPT Code");
				bValid = bValid && checkEmpty(c,"CPT Charge");
				if (bValid) {
					var str = $("#billing_form").serialize();
					if(str){
						$.ajax({
							type: "POST",
							url: "<?php echo site_url('provider/encounters/billing_save');?>/",
							data: str,
							success: function(data){
								if (data == 'Close Chart') {
									window.location = "<?php echo site_url();?>";
								} else {
									$.jGrowl(data);
									$("#billing_form").clearForm();
									$("#cpt_billing_dialog").dialog('close');
									jQuery("#cpt_list").trigger("reloadGrid");
									billing_autosave('now');
								}
							}
						});
					} else {
						$.jGrowl("Please complete the form");
					}
				}
			},
			Cancel: function() {
				$("#billing_form").clearForm();
				$("#cpt_billing_dialog").dialog('close');
			}
		}
	});
	$("#cpt_helper_dialog").dialog({ 
		bgiframe: true, 
		autoOpen: false, 
		height: 500, 
		width: 800, 
		modal: true,
		draggable: false,
		resizable: false,
		open: function() {
			$("#cpt_helper_items").accordion({active: false, fillSpace: true});
		},
		close: function(event, ui) {
			var b = $("input[name='cpt_helper1']:checked").val();
			if (b) {
				$("#billing_cpt").val(b);
				$.ajax({
					type: "POST",
					url: "ajaxchart/get-cpt-charge",
					data: "cpt=" + b,
					success: function(data){
						$("#billing_cpt_charge").val(data);
					}
				});
			}
			$('#cpt_helper_items').clearDiv();
		}
	});
	$("#clear_insurance1").button({
		icons: {
			primary: "ui-icon-close"
		},
	});
	$("#clear_insurance2").button({
		icons: {
			primary: "ui-icon-close"
		},
	});
	$("#print_invoice").button({icons: {primary: "ui-icon-print"}}).click(function(){
		var a = $("#insurance_id_1");
		var bValid = true;
		bValid = bValid && checkEmpty(a,"Primary Insurance");
		if (bValid) {
			var ins1 = $("#insurance_id_1").val();
			var ins2 = $("#insurance_id_2").val();
			var bc = $("#billing_bill_complex").val();
			window.open("print_invoice1/" + noshdata.eid + "/" + ins1 + "/" + ins2 + "/" + bc);
		}
	});
	$("#print_hcfa").click(function(){
		var a = $("#insurance_id_1");
		var bValid = true;
		bValid = bValid && checkEmpty(a,"Primary Insurance");
		if (bValid) {
			var ins1 = $("#insurance_id_1").val();
			var ins2 = $("#insurance_id_2").val();
			var bc = $("#billing_bill_complex").val();
			if (ins1 == '' || ins1 == '0') {
				$.jGrowl("No HCFA-1500 printed due to no primary insurance!")
			} else {
				window.open("generate_hcfa1/" + noshdata.eid + "/" + ins1 + "/" + ins2 + "/n/" + bc);
			}
		}
	});
	$("#print_hcfa_flat").click(function(){
		var a = $("#insurance_id_1");
		var bValid = true;
		bValid = bValid && checkEmpty(a,"Primary Insurance");
		if (bValid) {
			var ins1 = $("#insurance_id_1").val();
			var ins2 = $("#insurance_id_2").val();
			var bc = $("#billing_bill_complex").val();
			if (ins1 == '' || ins1 == '0') {
				$.jGrowl("No HCFA-1500 printed due to no primary insurance!")
			} else {
				window.open("generate_hcfa1/" + noshdata.eid + "/" + ins1 + "/" + ins2 + "/y/" + bc);
			}
		}
	});
	$("#encounter_payment").button({icons: {primary: "ui-icon-check"}}).click(function(){
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('provider/encounters/get_eid');?>",
			success: function(data){
				$('#billing_payment_eid').val(data);
				var currentDate = getCurrentDate();
				$('#billing_payment_payment').val('');
				$('#billing_payment_payment_old').val('');
				$('#billing_payment_payment_type').val('');
				$('#billing_payment_payment_type_old').val('');
				$('#billing_payment_dos_f').val(currentDate);
				$('#billing_payment_dos_f_old').val(currentDate);
				$('#billing_payment_dialog').dialog('open');
				$("#billing_payment_payment").focus();		
			}
		});
	});
	
	jQuery("#cpt_list").jqGrid({
		url: "ajaxchart/procedure-codes",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','CPT','CPT Description','Charge','Units','Modifier','ICD','DOS From','DOS To'],
		colModel:[
			{name:'billing_core_id',index:'billing_core_id',width:1,hidden:true},
			{name:'cpt',index:'cpt',width:50},
			{name:'cpt_description',index:'cpt_description',width:100},
			{name:'cpt_charge',index:'cpt_charge',width:100,formatter:'currency',formatoptions:{decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, prefix: "$ "}},
			{name:'unit',index:'unit',width:50},
			{name:'modifier',index:'modifier',width:50},
			{name:'icd_pointer',index:'icd_pointer',width:50,edittype: 'select'},
			{name:'dos_f',index:'dos_f',width:75},
			{name:'dos_t',index:'dos_t',width:75}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#cpt_list_pager'),
		sortname: 'cpt_charge',
	 	viewrecords: true,
	 	sortorder: "desc",
	 	caption:"Procedure codes for this encounter - Click on ICD Pointer column to get diagnosis codes for each procedure.",
		height: "100%",
	 	onCellSelect: function(id,iCol) {
			if (iCol == 6) {
				var item = jQuery("#cpt_list").getCell(id,'icd_pointer');
				$.ajax({
					type: "POST",
					url: "ajaxchart/define-icd",
					data: "icd=" + item,
					dataType: "json",
					success: function(data){
						$.jGrowl(data.item, {sticky:true});	
					}
				});
			}
		},
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#cpt_list_pager',{search:false,edit:false,add:false,del:false});
	$("#billing_icd").chosen();
	$("#billing_icd").change(function() {
		var a = $(this).val();
		if (a != '') {
			var b = ["1","2","3","4"];
			var c = 0;
			for (var i=0;i<a.length;i++) {
				if (b.indexOf(a[i]) > 0) {
					c++;
				}
			}
			if (c != 0 && c<a.length) {
				$.jGrowl("You must choose diagnoses grouped 1-4 or 5-6!");
			}
		}
	});
	$("#add_billing_cpt").button();
	$("#add_billing_cpt").click(function(){
		$('#billing_form').clearForm();
		$("#billing_unit").val('1');
		$("#billing_modifier").val('');
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('provider/encounters/get_billing_dos');?>",
			success: function(data){
				$("#billing_dos_f").val(data);
				$("#billing_dos_t").val(data);
			}
		});
		$.ajax({
			type: "POST",
			url: "ajaxchart/get-billing",
			dataType: "json",
			success: function(data){
				if (data.message == "OK") {
					$("#billing_icd").addOption(data, false).removeOption("message").trigger("liszt:updated");
				} else {
					$.jGrowl(data.message);
				}
				
			}
		});
		$("#cpt_billing_dialog").dialog('open');
		$("#billing_cpt").focus();
	});
	$("#edit_billing_cpt").button();
	$("#edit_billing_cpt").click(function(){
		var item = jQuery("#cpt_list").getGridParam('selrow');
		if(item){
			$.ajax({
				type: "POST",
				url: "ajaxchart/get-billing",
				dataType: "json",
				success: function(data){
					if (data.message = "OK") {
						$("#billing_icd").addOption(data, false).removeOption("message");
						jQuery("#cpt_list").GridToForm(item,"#billing_form");
						var dx = jQuery("#cpt_list").getCell(item,"icd_pointer");
						var icd_array = String(dx).split("");
						var length = icd_array.length;
						for (var i = 0; i < length; i++) {
							$("#billing_icd").selectOptions(icd_array[i]);
						}
						$("#billing_icd").trigger("liszt:updated");
						$("#cpt_billing_dialog").dialog('open');
						$("#billing_cpt_charge").focus();
					} else {
						$.jGrowl(data.message);
					}
				
				}
			});
		} else {
			$.jGrowl("Please select row to edit!");
		}
	});
	$("#remove_billing_cpt").button();
	$("#remove_billing_cpt").click(function(){
		var item = jQuery("#cpt_list").getGridParam('selrow');
		if(item){
			$.ajax({
				url: "ajaxchart/remove-cpt",
				type: "POST",
				data: "billing_core_id=" + item,
				success: function(data){
					$.jGrowl(data);
					jQuery("#cpt_list").trigger("reloadGrid");
					billing_autosave('now');
				}
			});
		} else {
			$.jGrowl("Please select row to remove!");
		}
	});
	$("#cpt_favorites").button().click(function(){
		$("#billing_cpt").catcomplete("search", "***");
	});
	$("#cpt_helper").button({
		icons: {
			primary: "ui-icon-copy"
		},
	});
	$('#cpt_helper').click(function(){
		$("#cpt_helper_dialog").dialog('open');
	});
	$("#update_cpt_charge").button({
		icons: {
			primary: "ui-icon-check"
		},
	});
	$('#update_cpt_charge').click(function(){
		var item = $("#billing_cpt").val();
		if(item != ''){
			var item2 = $("#billing_cpt_charge").val();
			$.ajax({
				url: "ajaxchart/update-cpt-charge",
				type: "POST",
				data: "cpt=" + item + "&cpt_charge=" + item2,
				success: function(data){
					$.jGrowl(data);
				}
			});
		} else {
			$.jGrowl("Please enter a CPT code to update!");
		}
	});
	$("#billing_dos_f").datepicker({showOn: 'button', buttonImage: '<?php echo base_url()."images/calendar.gif";?>', buttonImageOnly: true});
	$("#billing_dos_t").datepicker({showOn: 'button', buttonImage: '<?php echo base_url()."images/calendar.gif";?>', buttonImageOnly: true});
	$("#billing_dos_f").mask("99/99/9999");
	$("#billing_dos_t").mask("99/99/9999");
	jQuery("#billing_insurance_list").jqGrid({
		url: "ajaxdashboard/insurance",
		datatype: "json",
		mtype: "POST",
		colNames:['ID','Insurance','ID Number','Group Number','Priority','Lastname','Firstname','DOB','Gender','Address','City','State','Zip','Copay','Deductible','Comments','Address ID','Relationship'],
		colModel:[
			{name:'insurance_id',index:'insurance_id',width:1,hidden:true},
			{name:'insurance_plan_name',index:'insurance_plan_name',width:270},
			{name:'insurance_id_num',index:'insurance_id_num',width:100},
			{name:'insurance_group',index:'insurance_group',width:100},
			{name:'insurance_order',index:'insurance_order',width:100},
			{name:'insurance_insu_lastname',index:'insurance_insu_lastname',width:1,hidden:true},
			{name:'insurance_insu_firstname',index:'insurance_insu_firstname',width:1,hidden:true},
			{name:'insurance_insu_dob',index:'insurance_insu_dob',width:1,hidden:true},
			{name:'insurance_insu_gender',index:'insurance_insu_gender',width:1,hidden:true},
			{name:'insurance_insu_address',index:'insurance_insu_address',width:1,hidden:true},
			{name:'insurance_insu_city',index:'insurance_insu_city',width:1,hidden:true},
			{name:'insurance_insu_state',index:'insurance_insu_state',width:1,hidden:true},
			{name:'insurance_insu_zip',index:'insurance_insu_zip',width:1,hidden:true},
			{name:'insurance_copay',index:'insurance_copay',width:1,hidden:true},
			{name:'insurance_deductible',index:'insurance_deductible',width:1,hidden:true},
			{name:'insurance_comments', index:'insurance_comments',width:1,hidden:true},
			{name:'address_id',index:'address_id',width:1,hidden:true},
			{name:'insurance_relationship',index:'insurance_relationship',width:1,hidden:true}
		],
		rowNum:10,
		rowList:[10,20,30],
		pager: jQuery('#billing_insurance_pager'),
		sortname: 'insurance_order',
	 	viewrecords: true,
	 	sortorder: "asc",
	 	caption:"Insurance Payors",
	 	height: "100%",
	 	jsonReader: { repeatitems : false, id: "0" }
	}).navGrid('#billing_insurance_pager',{search:false,edit:false,add:false,del:false});
	$("#select_insurance1").button();
	$("#select_insurance1").click(function(){
		var item = jQuery("#billing_insurance_list").getGridParam('selrow');
		if(item){
			$("#insurance_id_1").val(item);
			get_insurance_info1();
		} else {
			$.jGrowl("Please select insurance!");
		}
	});
	$("#select_insurance2").button();
	$("#select_insurance2").click(function(){
		var item = jQuery("#billing_insurance_list").getGridParam('selrow');
		if(item){
			$("#insurance_id_2").val(item);
			get_insurance_info1();
		} else {
			$.jGrowl("Please select insurance!");
		}
	});
	$("#select_self_pay").button();
	$("#select_self_pay").click(function(){
		$("#insurance_id_1").val('0');
		$("#insurance_id_2").val('');
		get_insurance_info1();
	});
	$("#clear_insurance1").click(function(){
		$("#insurance_id_1").val('');
		get_insurance_info1();
	});
	$("#clear_insurance2").click(function(){
		$("#insurance_id_2").val('');
		get_insurance_info1();
	});
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('start/check_mtm_extension');?>",
		dataType: "json",
		success: function(data){
			if (data.response == 'y') {
				var a = '<h3><a href="#">Medication Therapy Management Codes</a></h3><div><input name="cpt_helper1" id="99605" value="99605" type="radio" class="cpt_buttons"><label for="99605">99605 - New patient, initial 15 minutes</label><input name="cpt_helper1" id="99606" value="99606" type="radio" class="cpt_buttons"><label for="99606">99606 - Established patient, initial 15 minutes</label><input name="cpt_helper1" id="99607" value="99607" type="radio" class="cpt_buttons"><label for="99607">99607 - Additional 15 minutes</label></div>';
				$("#cpt_helper_items").append(a);
				$(".cpt_buttons").button();
			}
		}
	});
	
	setInterval(billing_autosave, 10000);
	$("#cpt_link").button().click(function(){
		$("#configuration_dialog").dialog('open');
		$("#configuration_accordion").accordion("option", "active", 7);
	});
</script>
