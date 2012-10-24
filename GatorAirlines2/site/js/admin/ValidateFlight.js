// JQuery that uses the Validate plugin to validate the customer data on the client side

// This part is for AddCustomerForm
$(document).ready(function()
{	
    $("#AddFlightForm").validate({
		// Apply rules
		rules: {
			"plane_id":{
				required: true, 
				maxlength: 30,
				digits: true
			},
			"org_id": {
				required: true, 
				maxlength: 30,
				digits: true
				
			},
			"dest_id": {
				required: true,
				maxlength: 30,
				digits: true
			},
			"first_class_cost": {
				required: true, 
				maxlength: 30,
				digits: true
			},
			"coach_class_cost": {
				required: true, 
				maxlength: 30,
				digits: true
			},
			"e_depart_time": {
				required: true,
				maxlength: 30
				
			},
			"e_arrival_time": {
				required: true,
				maxlength: 30
				
			},
			"distance": {
				required: true, 
				maxlength: 30,
				digits: true
			}
		},
		
		// Messages for the rules
		messages: {
			"plane_id": {
				required: "You must provide a plane ID.",
				digits: "The plane ID is an integer."
			},
			"org_id": {
				required: "You must provide an organization ID.",
				digits: "The origin ID is an integer."
			},
			"dest_id": {
				required: "You must provide a destination ID.",
				digits: "The destination ID is an integer."
			},
			"first_class_cost": {
				required: "You must provide the cost of first class.",
				digits: "The cost is an integer."
			},
			"coach_class_cost": {
				required: "You must provide the cost of coach class.",
				digits: "The cost is an integer."
			},
			"e_depart_time": {
				required: "You must provide the estimated departure time."
				
			},
			"e_arrival_time": {
				required: "You must provide the estimated arrival time."
				
			},
			"distance": {
				required: "You must provide the travel distance.",
				digits: "The distance is an integer."
			}
		}
	});
});

// This part is for ModifyCustomerForm
$(document).ready(function()
{	
    $("#ModifyFlightForm").validate({
		// Apply rules
		rules: {
			"plane_id":{
				required: true, 
				maxlength: 30,
				digits: true
			},
			"org_id": {
				required: true, 
				maxlength: 30,
				digits: true
				
			},
			"dest_id": {
				required: true,
				maxlength: 30,
				digits: true
			},
			"first_class_cost": {
				required: true, 
				maxlength: 30,
				digits: true
			},
			"coach_class_cost": {
				required: true, 
				maxlength: 30,
				digits: true
			},
			"depart_time": {
				required: true,
				maxlength: 30
			},
			"arrival_time": {
				required: true,
				maxlength: 30
				
			},
			"distance": {
				required: true, 
				maxlength: 30,
				digits: true
			}
		},
		
		// Messages for the rules
		messages: {
			"plane_id": {
				required: "You must provide a plane ID.",
				digits: "The plane ID is an integer."
			},
			"org_id": {
				required: "You must provide an organization ID.",
				digits: "The origin ID is an integer."
			},
			"dest_id": {
				required: "You must provide a destination ID.",
				digits: "The destination ID is an integer."
			},
			"first_class_cost": {
				required: "You must provide the cost of first class.",
				digits: "The cost is an integer."
			},
			"coach_class_cost": {
				required: "You must provide the cost of coach class.",
				digits: "The cost is an integer."
			},
			"depart_time": {
				required: "You must provide the new departure time."
				
			},
			"arrival_time": {
				required: "You must provide the new arrival time."
				
			},
			"distance": {
				required: "You must provide the travel distance.",
				digits: "The distance is an integer."
			}
		}
	});
});