const MAPBOX_TOKEN = 'pk.eyJ1IjoicG9oYW5nZ2ciLCJhIjoiY2xia2ptdGljMDB3MDNubXZqNnpsNW05ZSJ9.A3LoOKPSmbvKilqNx6qxvA';

$(window).on('load', function() {       
    $("#preloader").fadeOut();
});

function clock() {
    const month = [ "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October",
                    "November", "December" ];

    function harold(standIn) {
        if (standIn < 10) {
            standIn = '0' + standIn;
        } return standIn;
    }
    
    let time = new Date(),
        theDate = harold(time.getDate()) + ' ' + (month[time.getMonth()]) + ' ' + time.getFullYear(),
        hours = time.getHours(),   
        minutes = time.getMinutes(),
        seconds = time.getSeconds();

    document.body.querySelector('#clock').innerHTML = theDate + ' ' + harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
}

const setClock = document.body.querySelector('#clock');

if (setClock) {
    setInterval(clock, 1000);
}

$(window).on('scroll', function() {
    let currentScroll = $(this).scrollTop();
    let winHeight = $(this).height();
    let docHeight = $(document).height();
    let scrollPercentage = 100 * (currentScroll / (docHeight - winHeight));
    $('#progress').css({
        'width': (scrollPercentage) + '%',
    });
    // if (currentScroll < 56) {
    //     $('#sidenavAccordion').css({
    //         paddingTop: 'calc(56px - ' + (currentScroll) + 'px',
    //     });
    // }
});

$('#alert_timer').fadeTo(2750, 500).slideUp(500, function() {
    $('#alert_timer').slideUp(500);
});

function showChar(event) {
    const pass = [...document.body.querySelectorAll('.password')];
    pass.map((item) => {
        item.type = event.target.checked ? 'text' : 'password';
    });
}

function ckChange(ckType){
    var ckName = document.getElementsByName(ckType.name);
    var checked = document.getElementById(ckType.id);

    if (checked.checked) {
      for(var i=0; i < ckName.length; i++){

          if(!ckName[i].checked){
              ckName[i].disabled = true;
          }else{
              ckName[i].disabled = false;
          }
      } 
    }
    else {
      for(var i=0; i < ckName.length; i++){
        ckName[i].disabled = false;
      } 
    }    
}

window.addEventListener('DOMContentLoaded', (event) => {
    if (document.body.querySelector('#sidebarToggle')) {
        if (localStorage.getItem('isToggled') === 'true') {
            document.body.classList.toggle('sb-sidenav-toggled');
        }
        sidebarToggle.addEventListener('click', (event) => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('isToggled', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
    if (document.body.querySelector('#fetchTable')) {
        $('#fetchTable').DataTable({
            responsive: true,
            language: {
                paginate: {
                    previous: '<i class="fas fa-caret-left"></i>',
                    next: '<i class="fas fa-caret-right"></i>'
                }
            }
        });
    }
    if (document.body.querySelector('#camHolder')) {
        const box = document.body.querySelector('.camera-box');
        const mid = document.body.querySelector('.mid');
        if (box.classList.contains('d-none')) {
            box.remove();
            mid.remove();
        } else {
            Webcam.set({
                width: 480,
                height: 360,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach('#camHolder');
        }
    }
});


function showToast(event) {
    let target = document.body.querySelector('.toast');
    let container = document.body.querySelector('#toast-container');
    let clonedTarget = target.cloneNode(true);
    // clonedTarget.children[1].innerHTML = event + ' has added.';
    container.appendChild(clonedTarget);
    const bsToast = bootstrap.Toast.getOrCreateInstance(clonedTarget);
    bsToast.show();
    setTimeout(() => {
        while (container.childNodes.length > 1) {
            container.removeChild(container.firstChild);
        }
    }, 3600);
}

// CKEDITOR
// CKEDITOR.replace('taskDone');
// $('#signature').signature();

function capture() {
    Webcam.snap((dataUri) => {
        document.body.querySelector('#captureId').value = dataUri;
        document.body.querySelector('#imgTemp').innerHTML = '<img src="'+dataUri+'" alt="Capture" class="img-fluid mt-3" width="100%"/>';
    });
}

function clearCapture() {
    document.body.querySelector('#captureId').value = '';
    document.body.querySelector('#imgTemp').innerHTML = '';
}

function showGeo() {
    if (navigator && navigator.geolocation) {
        navigator.geolocation.watchPosition((position) => {
            document.body.querySelector('#latId').value = position.coords.latitude;
            document.body.querySelector('#longId').value = position.coords.longitude;
        });
    }
}

function getGeo() {
    let geoPromise = new Promise((resolve, reject) => {
        if (navigator && navigator.geolocation) {
            navigator.geolocation.watchPosition((position) => {
                resolve({
                    latitude: position.coords.latitude,
                    longitude: position.coords.longitude,
                    accuracy: position.coords.accuracy
                });
            }, (error) => {
                console.warn(`ERROR(${error.code}): ${error.message}`);
            }, { enableHighAccuracy: true, timeout: 5000, maximumAge: 0 });
        } else {
            reject('Not supported.');
        }
    }).then((result) => {
        document.body.querySelector('#latId').value = result.latitude;
        document.body.querySelector('#longId').value = result.longitude;
    }).catch((error) => {
        console.warn(error);
    }).finally((conclude) => {
        navigator.geolocation.clearWatch(geoPromise);
        console.log('Watch ended.');
    });
}


if (document.body.querySelector('#map')) {
    mapboxgl.accessToken = MAPBOX_TOKEN;

    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v12',
        zoom: 11,
        preloadOnly: true,
        animate: false,
        center: [106.919428, -6.24653821],
        essential: true,
    });

    const geo = new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true,
        showUserHeading: true,
    });

    map.addControl(geo);

    geo.on('geolocate', (event) => {
        document.body.querySelector('#latId').value = event.coords.latitude;
        document.body.querySelector('#longId').value = event.coords.longitude;

        let from = [106.919428, -6.24653821];
        let to = [event.coords.longitude, event.coords.latitude];
        let units = 'kilometers';

        let distance = turf.distance(to, from, units).toFixed([2]);
        document.body.querySelector('#distanceId').value = distance;
    });

    const circular = new MapboxCircle({lat: -6.24653821, lng: 106.919428}, 2460, {
        editable: true,
        minRadius: 500,
        fillColor: '#2255D8',
        draggable: false,
    }).addTo(map);

    const marker = new mapboxgl.Marker({
        color: '#28375C',
    }).setLngLat([106.919428, -6.24653821]).addTo(map);
}