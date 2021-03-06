
			

$(document).ready(function(){
	var array = [];
		/* call the php that has the php array which is json_encoded */
	$.getJSON("seat_selection.php", function(data) {
						$.each(data, function(key,val) {
							array.push(parseInt(val));
						});
	});
					
	var settings = {
               rows: 5,
               cols:20,
			   brek: 12,
               rowCssPrefix: 'row-',
               colCssPrefix: 'col-',
               seatWidth: 35,
               seatHeight: 35,
               seatCss: 'seat',
			   blankCss: 'blank_row',
               selectedSeatCss: 'selectedSeat',
               selectingSeatCss: 'selectingSeat'
			   
           };
	    			


	var init = function (reservedSeat) {
					var str = [], seatNo, className;
					for (i = 0; i < settings.rows; i++) {
						for (j = 0; j < settings.cols; j++) {
							seatNo = (i + j * settings.rows + 1);
							className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
		
							if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
								className += ' ' + settings.selectedSeatCss;
								
							}
							str.push('<li class="' + className + '"' +
									  'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
									  '<a title="' + seatNo + '">' + seatNo + '</a>' +
									  '</li>');
						}
					}
					$('#place').html(str.join(''));
					
	};
				
	init(array);
							
	$('.' + settings.seatCss).click(function () {
	if ($(this).hasClass(settings.selectedSeatCss)){
		alert('This seat is already reserved');
	}
	else{
		$(this).toggleClass(settings.selectingSeatCss);
		}
	});
	 
	$('#btnShow').click(function () {
		var str = [];
		$.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.'+ settings.selectingSeatCss + ' a'), function (index, value) {
			str.push($(this).attr('title'));
		});
		alert(str.join(','));
	})
	 
	$('#btnShowNew').click(function () {
		var str = [], item;
		$.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
			item = $(this).attr('title');
			str.push(item);
			
		});
		var num = str.length;
		var urlString = "http://ec2-75-101-205-194.compute-1.amazonaws.com/CheckOut.php?item=";
		//var urlString = "http://localhost/GatorAirlines/GatorAirlines2/site/CheckOut.php?item=";
		for( var i = 0; i < num; i++)
		{
				urlString = urlString + str[i] + ",";
		}
			
		//change when going to the real website
		//window.location.href = "http://localhost/GatorAirlines/GatorAirlines2/site/CheckOut.php?item=" + item;
		//window.location.href = "http://ec2-75-101-205-194.compute-1.amazonaws.com/CheckOut.php?item=" + item;
		window.location.href = urlString;
		//alert(str.join(','));
	})		
						
						
});
		