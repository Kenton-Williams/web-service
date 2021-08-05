<html>
<head>
<title>Bond Web Service Demo</title>
<style>
body {font-family:georgia;}

.film{
	border:1px solid #E77DC2;
	border-radius: 5px;
	padding: 5px;
	margin-bottom:5px;
	position:relative;	
}

.pic{
	position:absolute;
	right:10px;
	top:10px;
}

</style>
<script src="https://code.jquery.com/jquery-latest.js" type="text/javascript"></script>

<script type="text/javascript">

function serverSetup(server,cat){
  server = server.toLowerCase();
  let url = "";
  if(server == "php"){//use web service
      url = "api.php?cat=" + cat;
  }else{//server is HTML only - simulate web service
      if(cat == "box"){//box office
          url = "data/bond-box-office.js";
      }else{//year
          url = "data/bond-year.js";
      }
  }
  return url;
}

$(document).ready(function() {  

	$('.category').click(function(e){
        e.preventDefault(); //stop default action of the link
		cat = $(this).attr("href");  //get category from URL
		loadAJAX(cat);  //load AJAX and parse JSON file
	});
});	

let url = serverSetup("html",cat);


function loadAJAX(cat)
{
	//AJAX connection will go here
    //alert('cat is: ' + cat);

	$.ajax({
		type:"GET",
		dataType: "json",
		url : "api.php?cat=" + cat,
		success: bondJSON
	});
}
    
function toConsole(data)
{//return data to console for JSON examination
	console.log(data); //to view,use Chrome console, ctrl + shift + j
}

function bondJSON(data){
//JSON processing data goes here
	console.log(data);

	let myData = JSON.stringify(data,null,4);
	myData = '<pre>' + myData + '<pre>';
	$(#output).html(myData);
}

</script>
</head>
	<body>
	<h1>Bond Web Service</h1>
		<a href="year" class="category">Bond Films By Year</a><br />
		<a href="box" class="category">Bond Films By International Box Office Totals</a>
		<h3 id="filmtitle">Title Will Go Here</h3>
		<div id="films">
			<div class="flim">
			<b>Film</b>:1<br />
				<b>Title:</b>Dr. No<br/>
				<b>Year:</b>1962<br />
				<b>Director:</b>Terence Young<br/>
				<b>Producers:</b>Harry Saltzman and Albert R. Broccoli,<br />
				<b>Writers:</b>Richard Maibaum, Johanna Harwood and Berkely Mather,<br />
				<b>Composer:</b>Monty Norman,<br />
				<b>Bond:</b>Sean Connery,<br />
				<b>Budget:</b>$1,000,000.00,<br />
				<b>BoxOffice:</b>$59,567,035.00,<br />
				<b>Image:</b>dr-no.jpg<br />





			<div class="pic"><img src="tumbnails/dr-no.jpg"/></div>
			</div>



		</div>
		<div id="output">Results go here</div>
	</body>
</html>
