<!DOCTYPE html>
<html lang="en">
<head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Directory Landing Page</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

		<!--flaticon.css-->
        <link rel="stylesheet" href="assets/css/flaticon.css">

		<!--slick.css-->
        <link rel="stylesheet" href="assets/css/slick.css">
		<link rel="stylesheet" href="assets/css/slick-theme.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">

		<!-- Leaflet CSS -->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

		<!-- Leaflet JS -->
		<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
<body>
<section id="home" class="welcome-hero">
	<div class="mb-3">
        <label for="viewSelector" class="form-label">Map View:</label>
        <select id="viewSelector" class="form-control" style="max-width: 200px;">
          <option value="area">Grouped by Area</option>
          <option value="pins">Show All Pins</option>
        </select>
      </div>
    <div class="welcome-hero-serch-box">
        <div class="welcome-hero-form">
            <div class="single-welcome-hero-form">
                <h3>what?</h3>
                <form action="index.html">
                    <input type="text" placeholder="Ex: palce, resturent, food, automobile" />
                </form>
                <div class="welcome-hero-form-icon">
                    <i class="flaticon-list-with-dots"></i>
                </div>
            </div>
            <div class="single-welcome-hero-form">
                <h3>location</h3>
                <form action="index.html">
                    <input type="text" placeholder="Ex: london, newyork, rome" />
                </form>
                <div class="welcome-hero-form-icon">
                    <i class="flaticon-gps-fixed-indicator"></i>
                </div>
            </div>
            
            <div class="welcome-hero-serch">
                    <button class="welcome-hero-btn" onclick="window.location.href='#'">
                            search  <i data-feather="search"></i> 
                    </button>
                </div>
				
        </div>
		
		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->
		<div id="property-map" style="height: 600px; width: 100%; margin-bottom: 15rem;"></div>
		<!--list-topics start -->
		<section id="list-topics" class="list-topics">
			<div class="container">
				<div class="list-topics-content">
					<ul>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-restaurant"></i>
								</div>
								<h2><a href="#">resturent</a></h2>
								<p>150 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-travel"></i>
								</div>
								<h2><a href="#">destination</a></h2>
								<p>214 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-building"></i>
								</div>
								<h2><a href="#">hotels</a></h2>
								<p>185 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-pills"></i>
								</div>
								<h2><a href="#">healthcaree</a></h2>
								<p>200 listings</p>
							</div>
						</li>
						<li>
							<div class="single-list-topics-content">
								<div class="single-list-topics-icon">
									<i class="flaticon-transport"></i>
								</div>
								<h2><a href="#">automotion</a></h2>
								<p>120 listings</p>
							</div>
						</li>
					</ul>
				</div>
			</div><!--/.container-->

		</section><!--/.list-topics-->
		

		<script>
			// Initialize the map centered on the Philippines
			var map = L.map('property-map').setView([13.41, 122.56], 6);
		
			// Add tile layer
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				attribution: '© OpenStreetMap contributors'
			}).addTo(map);
		
			// Property data from Laravel
			var properties = @json($properties);
		
			// Helper function to get color based on price
			function getColor(price) {
				const minPrice = 100000;     // Adjust based on your expected lowest price
				const maxPrice = 10000000;   // Adjust based on your expected highest price

				// Clamp the price between min and max
				const clamped = Math.max(minPrice, Math.min(price, maxPrice));

				// Calculate the ratio (0 = green, 1 = blue)
				const ratio = (clamped - minPrice) / (maxPrice - minPrice);

				// Interpolate green to blue
				const r = 0;
				const g = Math.round(255 * (1 - ratio));
				const b = Math.round(255 * ratio);

				return `rgb(${r}, ${g}, ${b})`;
			}
		
			// Group properties by location (latitude+longitude key)
			const grouped = {};
			properties.forEach(prop => {
				if (prop.latitude && prop.longitude) {
					const key = `${prop.latitude},${prop.longitude}`;
					if (!grouped[key]) grouped[key] = [];
					grouped[key].push(prop);
				}
			});
		
			// Render bubbles
			for (const key in grouped) {
				const [lat, lng] = key.split(',').map(Number);
				const group = grouped[key];
				const count = group.length;
				const avgPrice = group.reduce((sum, p) => sum + p.propPrice, 0) / count;
		
				// Draw circle
				const circle = L.circle([lat, lng], {
					color: getColor(avgPrice),
					fillColor: getColor(avgPrice),
					fillOpacity: 0.6,
					radius: 500 * count // Adjust scale as needed
				}).addTo(map);
		
				// Popup content
				const popupContent = `
					<strong>${count} properties</strong><br>
					Average Price: ₱${Math.round(avgPrice).toLocaleString()}<br>
					Location: ${group[0].propAddress || 'Unknown'}
				`;
		
				circle.bindPopup(popupContent);
			}

			function clearMapLayers() {
		map.eachLayer(function (layer) {
			if (layer instanceof L.Circle || layer instanceof L.Marker) {
				map.removeLayer(layer);
			}
		});
	}

	// Function to render grouped circles
	function renderGroupedCircles() {
		clearMapLayers();

		for (const key in grouped) {
			const [lat, lng] = key.split(',').map(Number);
			const group = grouped[key];
			const count = group.length;
			const avgPrice = group.reduce((sum, p) => sum + p.propPrice, 0) / count;

			const circle = L.circle([lat, lng], {
				color: getColor(avgPrice),
				fillColor: getColor(avgPrice),
				fillOpacity: 0.6,
				radius: 500 * count
			}).addTo(map);

			const popupContent = `
				<strong>${count} properties</strong><br>
				Average Price: ₱${Math.round(avgPrice).toLocaleString()}<br>
				Location: ${group[0].propAddress || 'Unknown'}
			`;
			circle.bindPopup(popupContent);
		}
	}

	// Function to render individual pins
	function renderAllPins() {
		clearMapLayers();

		properties.forEach(prop => {
			if (prop.latitude && prop.longitude) {
				const marker = L.marker([prop.latitude, prop.longitude]).addTo(map);
				const popupContent = `
					<strong>${prop.propName || 'Property'}</strong><br>
					Price: ₱${Math.round(prop.propPrice).toLocaleString()}<br>
					Location: ${prop.propAddress || 'Unknown'}
				`;
				marker.bindPopup(popupContent);
			}
		});
	}

	// Initial render
	renderGroupedCircles();

	// Handle dropdown change
	document.getElementById('viewSelector').addEventListener('change', function () {
		if (this.value === 'area') {
			renderGroupedCircles();
		} else {
			renderAllPins();
		}
	});
		</script>
		
</body>
</html>