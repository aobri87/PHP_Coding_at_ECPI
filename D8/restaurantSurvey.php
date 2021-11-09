<!DOCTYPE html>
<html>
	<head>
		<title>Restaurant Survey</title>
		<style>
			body {color: #4D5D6D; margin-left: auto; margin-right: auto; text-align: center; text-align: center; font-family: arial; color: white;}
			html {height: 100%; background: rbg(2,0,36);background: -webkit-linear-gradient(50deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,215,255,1) 100%);}
			h1{font-family: arial; color: white;}
			h2{font-family: arial; color: white;}
			h3{border: 1px solid; font-family: arial; color: white; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;}
			table{background-color: #EFEFEF;}
		</style>
	</head>
	<body>
		<h1>Restaurant Survey</h1>
		<form action="restaurantSurveyResults.php" method="POST">
			<span id="label">What area do you live in? </span>
			<select name="area">
				<option value="11111">11111</option>
				<option value="11112">11112</option>
				<option value="11113">11113</option>
				<option value="11114">11114</option>
			</select>
			<br/><hr/>
			<span id="label">What is your favorite Sports Bar?</span><br/>
			<input type="radio" name="sb" id="bold" value="1"/>
			<span>Bold Orchid Bar and Grill</span>
			<input type="radio" name="sb" id="basil" value="2"/>
			<span>The Basil Bar and Grille</span>
			<input type="radio" name="sb" id="andrew" value="3"/>
			<span>Andrew's Sports Bar</span>
			
			<br/><hr/>
			
			<span id="label">What is your favorite buffet?</span><br/>
			<input type="radio" name="buffet" id="king" value="4"/>
			<span>King's Fox Eats</span>
			<input type="radio" name="buffet" id="jamil" value="5"/>
			<span>Jamil's Soul Food Buffet</span>
			<input type="radio" name="buffet" id="super" value="6"/>
			<span>Super Buffet Buffet</span>
			
			<br/><hr/>
			
			<span id="label">What is your favorite Comedy Club?</span><br/>
			<input type="radio" name="comedy" id="jumping" value="7"/>
			<span>Jumping Sailor House</span>
			<input type="radio" name="comedy" id="prime" value="8"/>
			<span>Prime Forest Lounge</span>
			<input type="radio" name="comedy" id="moonshine" value="9"/>
			<span>Moonshine Gourmet Lounge</span>
		
			<br/><hr/>
			
			<span id="label">What is your favorite Traditional Restaurant?</span><br/>
			<input type="radio" name="traditional" id="tumbler" value="10"/>
			<span>Tumbler Roadhouse</span>
			<input type="radio" name="traditional" id="small" value="11"/>
			<span>Small Season's Place</span>
			<input type="radio" name="traditional" id="michael" value="12"/>
			<span>Michael's Authentic Food</span>
			
			<br/><hr/>
			
			<input type="submit"/>
		</form>
		
	</body>
</html>