<?php 
    session_start();
    session_destroy();
?>
<?php include('Client_handling.php')?>


<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="with=device-width, initial-scale=1.0">
      <title> WebReat </title>
      <link href="Resources/map-marker-icon.png" rel="icon" type="x-icon">
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
      <!--Header-->
      	<section class="header"> 
			<nav>
				<a href="index.php" id="logo"><img src="Resources/WebReat.png" alt="Logo" width="150"></a>
				<div class="navs" id="navs">
					<i class="fa fa-window-close-o" onclick="hideMenu()"></i>					
					<ul>
						<li><a href="ListOwnerPlaceRegister.php">List your Place</a></li>  
					</ul>
				</div>
				<i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>
		</section>
		 
		<!--JavaScript for Menu-->
		<script>

			var navs = document.getElementById("navs");

			function showMenu(){
				navs.style.right = "0";
			}
			function hideMenu(){
				navs.style.right = "-200px";
			}

		</script>
		<section>
		<center>
        <div class="search">
            <div class="search-container">
            <form action="SearchResultsPage.php" method="get">
               <div class="search-bar">
                    <div class="search-bar-content">
                        <input type="search" id="main-search-bar" name="main-search-bar" placeholder="Search a destination or retreat place">
                    </div>
                    <div class="searchbtnhome">
                        <input type="submit" id="search_btn" name="search_btn" value="Search">
                    </div>     
                </div>
            </form>
            </div>
        </div>
        </center>
    </section>

	<!--Body-->
    <section class="container1">
		
		<h1>Top destinations</h1><hr>
		<div class="rowcontent">
			<div class="topplaces">     
				<img src="Resources/antipolo.jpg">  
				<div class="layer">
					<br><br><h2>Antipolo</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis reiciendis error</p>
				</div>     
			</div>
			<div class="topplaces">     
				<img src="Resources/morong.jpg">  
				<div class="layer">
					<br><br><h2>Morong</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis reiciendis error</p>
				</div>     
			</div>
			<div class="topplaces">     
				<img src="Resources/tagaytay.jpg">  
				<div class="layer">
					<br><br><h2>Tagaytay</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis reiciendis error</p>
				</div>     
			</div>
		</div>

		<h1>Top Retreat Places in the Philippines</h1><hr>
		<div class="rowcontent">
			<div class="topeventplaces">     
				<img src="Resources/top1place.jpg">  
				<div class="layer">
					<br><h2>North Zen Villas </h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis reiciendis error</p>
				</div>     
			</div>
			<div class="topeventplaces">     
				<img src="Resources/top2place.jpg">  
				<div class="layer">
					<br><h2>Luljetta???s Place</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis reiciendis error</p>
				</div>     
			</div>
			<div class="topeventplaces">     
				<img src="Resources/top3place.jpg">  
				<div class="layer">
					<br><h2>Anya Resort</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis reiciendis error</p>
				</div>     
			</div>
		</div>
		
	</section>  

    </body>
	<foooter>
		<div class="copyright">
			<center>
            <img src="Resources/WebReat1.png" alt="Logo" width="140"/>
            <p>
                <br>
                Copyright ?? 2021 WebReat.com???. All rights reserved.
                <br>
                Polytechnic University of the Philippines, College of Computer and Information Science
            </p> 
			</center>
        </div>
	</foooter>
</html>