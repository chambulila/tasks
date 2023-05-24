const getlocation = document.getElementById('getlocation');
getlocation.addEventListener('click', function () {
    if (navigator.geolocation) {
        navigator.getlocation.getCurrentPosition(function (posistion) {
            let latitude = posistion.coords.latitude;
            let longitude = posistion.coords.longitude;
            var pos = {
                lat: posistion.coords.latitude,
                lng: posistion.coords.longitude
            }
            console.log(latitude, longitude);
            $.ajax({
                url:'https://www.googleapis.com/geolocation/v1/geolocate?key='+latitude+','+longitude+'AIzaSyDSReZ8nj2VUb_Usv3Twhm3C0JHDqXKEok',
                success:function(result){
                    console.log(result);
                }
            })

            // my google API
            // AIzaSyDSReZ8nj2VUb_Usv3Twhm3C0JHDqXKEok
        })
    } else {
        console.log('not supported');
    }

});