<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>JOJO I NELLISSERY </title>
 
 <link rel="stylesheet" type="text/css" href="../index.css">
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="../../shared/json2.js"></script>
<script type="text/javascript" language="javascript">
    var proxy = '../../ba-simple-proxy.php'
	var url = proxy + '?url=' +"http://secure.searstravel.ca/interview-test/index.php&full_headers=1&full_status=1";
	var url1= proxy + '?url=' + "http://secure.searstravel.ca/interview-test/ajax.php&full_headers=1&full_status=1";
$("#url").hide();

$(function(){
  // Handle form submit.
  $('#params').submit(function(){
	arr =[];
    {
   			$('table tbody tr').not(function(){if ($(this).has('th').length){return true}}).remove();
			$('#footer').empty();
			
			$.getJSON( url, function(data){
				var tr;
			//sorting based on price 	
				for( var key in data )
					{
						if( data.hasOwnProperty( key ) )
						{
						arr.push( data[key] );
						}
					}
			
			arr.sort
			( 
				function(a,b)
				 { 
				 if (typeof(a)!=='undefined' && typeof(a.length)!=='undefined')
				   	{
					a.sort( 
							function(c,d)
							{
								var nameAprice=parseInt(c.price.hotelPrice);
								var nameBPrice=parseInt(d.price.hotelPrice);
								if (nameAprice < nameBPrice)
									{ 
									return -1; 
									} 
								else if (nameAprice > nameBPrice)
									{ 
									return 1
									} 
								else
									{ 
									return 0
									}
							}
					    )
					
				  	}
				}
			);
	
	//	data=arr;	
	//alert(arr);
			
			for (var i = 0; i < data["contents"].length; i++) 
			{
			
			tr = $('<tr/>');
			tr.append("<td width='300px'>" + data["contents"][i].hotelName + "</td>");
			tr.append("<td>" + data["contents"][i].price.hotelPrice + "</td>");
			if(data["contents"][i].price.hotelPromoPrice!="")
			{
				if (typeof(data["contents"][i].price.hotelPromoPrice)!== 'undefined')
				{
				tr.append("<td>" + data["contents"][i].price.hotelPromoPrice + "</td>");
				}
				else
				{
					tr.append("<td> </td>");
				}
			}
			
			if(data["contents"][i].price.hotelPromoDescription!="")
			{
				if (typeof(data["contents"][i].price.hotelPromoDescription)!== 'undefined')
				{
				tr.append("<td>" + data["contents"][i].price.hotelPromoDescription + "</td>");
				}
				else
				{
					tr.append("<td> </td>");
				}
			}
			
			tr.append("<td>" + data["contents"][i].hotelStarUrl + "</td>");
			$('table').append(tr);
			}
			  $.getJSON(url1, function(data){
				$("#footer").append(data["contents"]);
			});
			
			});
			
		
    }
    
    // Prevent default form submit action.
    return false;
  });
  
  // Submit the form on page load if ?url= is passed into the example page.
 // if ( $('#url').val() !== '' )
  {
    $('#params').submit();
  }
});


         $(function() {
            $( "#slider-6" ).slider({
               range:true,
               min: 0,
               max: 500,
               values: [ 35, 200 ],
               start: function( event, ui ) {
                  $( "#startvalue" )
                     .val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
               },
               stop: function( event, ui ) {
                  $( "#stopvalue" )
                     .val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
               },
               change: function( event, ui ) {
                  $( "#changevalue" )
                     .val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
               },
               slide: function( event, ui ) {
		   
		$.getJSON( url, function(data){
			var tr;
   			$('table tbody tr').not(function(){if ($(this).has('th').length){return true}}).remove();
			$('#footer').empty();
			
			//sorting based on price 
			for( var key in data )
					{
						if( data.hasOwnProperty( key ) )
						{
						arr.push( data[key] );
						}
					}
			
			arr.sort
			( 
				function(a,b)
				 { 
				 if (typeof(a)!=='undefined' && typeof(a.length)!=='undefined')
				   	{
					a.sort( 
							function(c,d)
							{
								var nameAprice=parseInt(c.price.hotelPrice);
								var nameBPrice=parseInt(d.price.hotelPrice);
								if (nameAprice < nameBPrice)
									{ 
									return -1; 
									} 
								else if (nameAprice > nameBPrice)
									{ 
									return 1
									} 
								else
									{ 
									return 0
									}
							}
					    )
					
				  	}
				}
			);
			
			
			for (var i = 0; i < data["contents"].length; i++) 
			{
				if(parseInt(data["contents"][i].price.hotelPrice)>=ui.values[0]&& parseInt(data["contents"][i].price.hotelPrice)<=ui.values[1])
				{
				
					tr = $('<tr/>');
					tr.append("<td width='300px'>" + data["contents"][i].hotelName + "</td>");
					tr.append("<td>" + data["contents"][i].price.hotelPrice + "</td>");
					 
					if(data["contents"][i].price.hotelPromoPrice!="")
					{
					if (typeof(data["contents"][i].price.hotelPromoPrice)!== 'undefined')
					{
					
					tr.append("<td>" + data["contents"][i].price.hotelPromoPrice + "</td>");
					}
					else
					{
					tr.append("<td> </td>");
					}
					}
					
					
					if(data["contents"][i].price.hotelPromoDescription!="")
					{
					if (typeof(data["contents"][i].price.hotelPromoDescription)!== 'undefined')
					{
					tr.append("<td>" + data["contents"][i].price.hotelPromoDescription + "</td>");
					}
					else
					{
					tr.append("<td></td>");
					}
					}
					
					tr.append("<td>" + data["contents"][i].hotelStarUrl + "</td>");
					$('table').append(tr);
					
				}
			}
			  $.getJSON(url1, function(data){
				$("#footer").append(data["contents"]);
			});
			
		});
			
			 
                  $( "#slidevalue" )
                     .val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
               }
           });
         });

</script>
<style type="text/css" title="text/css">

/*
bg: #FDEBDC
bg1: #FFD6AF
bg2: #FFAB59
orange: #FF7F00
brown: #913D00
lt. brown: #C4884F
*/

#page {
  width: 700px;
}

#params input.text {
  display: block;
  border: 1px solid #000;
  width: 540px;
  padding: 2px;
  margin-bottom: 0.2em;
}

#params input.submit {
  display: block;
  margin-top: 0.6em;
}

.indent {
  margin-left: 1em;
}

#sample {
  font-size: 90%;
}

</style>

</head>
<body>

<div id="page">
  <div id="header">
   </div>
  <div id="content">
        <div id="donate">
     
      <div class="clear"></div>
    </div>


<form id="params" method="get" action="">
<div id="slider-6"> Range</div>
</br>
<p>
         <label for="slidevalue">Change: </label>   <input type="text" id="slidevalue"   style="border:0; color:black;" />
		 </br>
		   <input class="submit" type="submit" name="submit" value="Show All Results" val>
</p>
</form>


</div> 

<table>
<th>Hotel Name</th>
<th>HotelPrice</th>
<th>HotelPromoPrice</th>
<th>HotelPromoDescription</th>
<th>Hotel StarRatingUrl</th>

</table>


  </div>
  <div id="footer">
    
    <p>
      <a href="http://jnellissery/github">license page</a> for more details. 
    </p>
  </div>
 
</div>

</body>
</html>