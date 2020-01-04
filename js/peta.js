function initialize(){
	
	// Variabel untuk menyimpan informasi (desc)
  var infoWindow = new google.maps.InfoWindow;
	
	var lokasi = new google.maps.LatLng(-7.951347,112.607460);
	var myOptions = {
		zoom: 17,
		center: lokasi,
		mapTypeId: 'roadmap'
	};
	var peta = new google.maps.Map(document.getElementById('map_canvas'), myOptions);

	<?php
    $query = mysqli_query($con,"select * from w_bakso");
    while ($data = mysqli_fetch_array($query))
    {
        $nama = $data['nama_warung'];
        $lat = $data['latitude'];
        $lon = $data['longitude'];
        
        echo ("addMarker($lat, $lon, '<b>$nama</b>');\n");                        
    }
  ?>

  // Proses membuat marker 
  function addMarker(lat, lng, info) {
      var lokasi = new google.maps.LatLng(lat, lng);
      //bounds.extend(lokasi);
      var marker = new google.maps.Marker({
          map: peta,
          position: lokasi
      });
      //map.fitBounds(bounds);
      bindInfoWindow(marker, peta, infoWindow, info);
  }

   // Menampilkan informasi pada masing-masing marker yang diklik
  function bindInfoWindow(marker, map, infoWindow, ket) {
    google.maps.event.addListener(marker, 'click', function() {
      infoWindow.setContent(html);
      infoWindow.open(map, marker);
    });
  }





	// var tanda = new google.maps.Marker({position: {lat:-7.954115, lng:112.606843}, map: peta, title: 'Warung Lalapan Echo' });
	
	// var contentString = '<div id="content">'+
	// 								    '<div id="siteNotice">'+
	// 								    '</div>'+
	// 								    '<h3 id="firstHeading" class="firstHeading">Warung lalapan Echo</h3>'+
	// 								    '<div id="bodyContent">'+
	// 								    '<p>Melayani lalapan ayam, tempe, tahu, ikan dll</p>'+
	// 								    '<p>Buka pukul 07.30 - 17.00 WIB</p>'+
	// 								    '</div>'+
	// 								    '</div>';
 
	// var infowindow = new google.maps.InfoWindow({ content: contentString });

	// google.maps.event.addListener(tanda, 'click', function() {
	//   infowindow.open(peta,tanda);
	// });
}