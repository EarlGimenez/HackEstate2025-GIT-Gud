<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets_property/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets_property/css/font-awesome.css">

    <link rel="stylesheet" href="assets_property/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets_property/css/owl-carousel.css">

    <link rel="stylesheet" href="assets_property/css/lightbox.css">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>Placeholder Property Name</h4>
                            <h6>Placeholder Address</h6>
                            <p>This is a placeholder description for the property. It provides details about the property, such as its features, location, and other relevant information.</p>
                            <h6>Price: ₱10,000,000</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Message your Agent or Broker</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets_property/images/slide-01.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets_property/images/slide-02.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                          <!-- Item -->
                          <div class="item">
                            <div class="img-fill">
                                <img src="assets_property/images/slide-03.jpg" alt="">
                            </div>
                          </div>
                          <!-- // Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About the Property</h6>
                            <h2>Placeholder Property Overview</h2>
                        </div>
                        <p>This is a placeholder section that provides additional details about the property. It can include information about the neighborhood, nearby amenities, and other features that make the property unique.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div id="propertyMap" style="height: 400px; width: 100%; border-radius: 20px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

    <!-- jQuery -->
    <script src="assets_property/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets_property/js/popper.js"></script>
    <script src="assets_property/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets_property/js/owl-carousel.js"></script>
    <script src="assets_property/js/accordions.js"></script>
    <script src="assets_property/js/datepicker.js"></script>
    <script src="assets_property/js/scrollreveal.min.js"></script>
    <script src="assets_property/js/waypoints.min.js"></script>
    <script src="assets_property/js/jquery.counterup.min.js"></script>
    <script src="assets_property/js/imgfix.min.js"></script> 
    <script src="assets_property/js/slick.js"></script> 
    <script src="assets_property/js/lightbox.js"></script> 
    <script src="assets_property/js/isotope.js"></script> 

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Leaflet JS Test code -->
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const map = L.map('propertyMap').setView([14.5995, 120.9842], 13); // center on Manila for example
    
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);
    
            // Optional: Add a dummy marker for testing
            L.marker([14.5995, 120.9842])
                .addTo(map)
                .bindPopup('Sample Property')
                .openPopup();
        });
    </script> --}}

    {{-- Leaflet JS on 1 property --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function(){
            const propertyId = 1;
            const apiUrl = `http://localhost:8000/api/properties/${propertyId}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    const lat = parseFloat(data.latitude);
                    const lng = parseFloat(data.longitude);
                    const price = data.propPrice.toLocaleString();
                    const name = data.propName;
                    const desc = data.propDesc;

                    const map = L.map('propertyMap').setView([lat,lng], 16);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap'
                    }).addTo(map);

                    L.marker([lat,lng])
                        .addTo(map)
                        .bindPopup(`<strong>${name}</strong><br>${desc}<br><em>₱${price}</em>`)
                        .openPopup();
                })

                .catch(error => {
                    console.error("Error loading property:", error);
                });
        });
    </script> --}}

    {{-- Leaflet JS on all properties --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function(){
            const apiUrl = `http://localhost:8000/api/properties`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(properties => {
                    if (!properties.length) {
                        console.warn("No properties found.");
                        return;
                    }
    
                    const firstLat = parseFloat(properties[0].latitude);
                    const firstLng = parseFloat(properties[0].longitude);
                    const map = L.map('propertyMap').setView([firstLat, firstLng], 13);
    
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap'
                    }).addTo(map);
    
                    properties.forEach(property => {
                        const lat = parseFloat(property.latitude);
                        const lng = parseFloat(property.longitude);
                        const price = property.propPrice.toLocaleString();
                        const name = property.propName;
                        const desc = property.propDesc;
    
                        L.marker([lat, lng])
                            .addTo(map)
                            .bindPopup(`<strong>${name}</strong><br>${desc}<br><em>₱${price}</em>`);
                    });
                })
                .catch(error => {
                    console.error("Error loading properties:", error);
                });
        });
    </script> --}}
    
    {{-- Leaflet JS on properties grouped by area --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const map = L.map('propertyMap').setView([14.5995, 120.9842], 12);
        
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);
        
            fetch("http://localhost:8000/api/property-area-stats")
                .then(res => res.json())
                .then(data => {
                    data.forEach(area => {
                        const lat = parseFloat(area.avg_lat);
                        const lng = parseFloat(area.avg_lng);
                        const count = area.total_properties;
                        const avgPrice = area.avg_price;
        
                        // Color logic (green to blue scale based on price range)
                        let color = '#00FF00'; // default green
                        if (avgPrice > 4000000) color = '#55ccff';
                        if (avgPrice > 6000000) color = '#3399ff';
                        if (avgPrice > 8000000) color = '#0066ff';
        
                        // Radius logic based on property count
                        const radius = 500 + count * 100;
        
                        L.circle([lat, lng], {
                            color: color,
                            fillColor: color,
                            fillOpacity: 0.5,
                            radius: radius
                        }).addTo(map)
                          .bindPopup(`<strong>${area.propArea}</strong><br>₱${avgPrice.toLocaleString()} avg<br>${count} properties`);
                    });
                })
                .catch(err => console.error("Error loading area stats:", err));
        });
        </script>
        
    
    
    <!-- Global Init -->
    <script src="assets_property/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>