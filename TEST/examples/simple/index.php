<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>JOJO I NELLISSERY </title>
  <script type="text/javascript" src="../../shared/ba-debug.js"></script>
  <script type="text/javascript" src="../../shared/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="../../shared/SyntaxHighlighter/scripts/shCore.js"></script><script type="text/javascript" src="../../shared/SyntaxHighlighter/scripts/shBrushJScript.js"></script>
  <script type="text/javascript" src="../../shared/SyntaxHighlighter/scripts/shBrushXml.js">
  </script>  <link rel="stylesheet" type="text/css" href="../../shared/SyntaxHighlighter/styles/shCore.css">
  <link rel="stylesheet" type="text/css" href="../../shared/SyntaxHighlighter/styles/shThemeDefault.css">
  <link rel="stylesheet" type="text/css" href="../index.css">
<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="../../shared/json2.js"></script>
<script type="text/javascript" language="javascript">

$(function(){
  
  // Handle form submit.
  $('#params').submit(function(){
    var proxy = '../../ba-simple-proxy.php'
	var url = proxy + '?' + $('#params').serialize();
	var url1= proxy + '?url=' + "http://secure.searstravel.ca/interview-test/ajax.php&full_headers=1&full_status=1";
    {
   
			
			$.getJSON( url, function(data){
			var tr;
			for (var i = 0; i < data["contents"].length; i++) 
			{
			
			tr = $('<tr/>');
			tr.append("<td width='300px'>" + data["contents"][i].hotelName + "</td>");
			tr.append("<td>" + data["contents"][i].price.hotelPrice + "</td>");
			if(data["contents"][i].price.hotelPromoPrice!="")
			{
			if (typeof(data["contents"][i].price.hotelPromoPrice)!== 'undefined')
			
			tr.append("<td>" + data["contents"][i].price.hotelPromoPrice + "</td>");
			}
			
			if(data["contents"][i].price.hotelPromoDescription!="")
			{
			if (typeof(data["contents"][i].price.hotelPromoDescription)!== 'undefined')
			tr.append("<td>" + data["contents"][i].price.hotelPromoDescription + "</td>");
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
  if ( $('#url').val() !== '' ) {
    $('#params').submit();
  }
  
  // Disable AJAX caching.
  $.ajaxSetup({ cache: false });
  
  // Disable dependent checkboxes as necessary.
  $('input:radio').click(function(){
    var that = $(this),
      c1 = 'dependent-' + that.attr('name'),
      c2 = c1 + '-' + that.val();
    
    that.closest('form')
      .find( '.' + c1 + ' input' )
        .attr( 'disabled', 'disabled' )
        .end()
      .find( '.' + c2 + ' input' )
        .removeAttr( 'disabled' );
  
   
  
  });
  

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
			
				var proxy = '../../ba-simple-proxy.php'
				var url = proxy + '?' + $('#params').serialize();
				var url1= proxy + '?url=' + "http://secure.searstravel.ca/interview-test/ajax.php&full_headers=1&full_status=1";
		   
		$.getJSON( url, function(data){
			var tr;
			$('table').empty();
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
					
					tr.append("<td>" + data["contents"][i].price.hotelPromoPrice + "</td>");
					}
					
					if(data["contents"][i].price.hotelPromoDescription!="")
					{
					if (typeof(data["contents"][i].price.hotelPromoDescription)!== 'undefined')
					tr.append("<td>" + data["contents"][i].price.hotelPromoDescription + "</td>");
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
<p>
         <label for="slidevalue">Change:</label>
         <input type="text" id="slidevalue" 
            style="border:0; color:black;">
      </p>

  <div>
    <label>
      <b>Remote URL</b>
      <input id="url" class="text" type="text" name="url" value="http://secure.searstravel.ca/interview-test/index.php">
    </label>
  </div>
  <p id="sample">
 
  </p>
  <div>
    <label>
      <input type="radio" name="mode" value="native" disabled="disabled">
      Native <i>(disabled by default)</i>
    </label>
  </div>
 
  <div class="dependent-mode dependent-mode-json indent">
    <div>
      <label>
        <input type="checkbox" name="full_headers" value="1" checked="checked">
        Full Headers
      </label>
    </div>
    <div>
      <label>
        <input type="checkbox" name="full_status" value="1" checked="checked" >
        Full Status
      </label>
    </div>
  </div>
  <input class="submit" type="submit" name="submit" value="Submit" val>
</form>


</div> 
 

<h3>The code</h3>
<table>
<th>Hotel Name</th>
<th>HotelPrice</th>
<th>Hotel StarRatingUrl</th>
<th>HotelPromoPrice</th>
<th>HotelPromoDescription</th>
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