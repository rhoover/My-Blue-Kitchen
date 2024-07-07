let map;

function initMap() {

  //initial needed stuff for Google
  const mapTarget = document.getElementById('events-map');
  const mapOptions = {
    center: {lat: 44.58792634446149, lng: -72.49345485914775}, 
    zoom: 9,
    mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    zoomControl: true,
    streetViewControl: false,
    mapTypeId: google.maps.MapTypeId.TERRAIN,
    //styles courtesy: https://snazzymaps.com/style/61/blue-essence
    styles:[
      {
          "featureType": "landscape.natural",
          "elementType": "geometry.fill",
          "stylers": [
              {
                  "visibility": "on"
              },
              {
                  "color": "#e0efef"
              }
          ]
      },
      {
          "featureType": "poi",
          "elementType": "geometry.fill",
          "stylers": [
              {
                  "visibility": "on"
              },
              {
                  "hue": "#1900ff"
              },
              {
                  "color": "#c0e8e8"
              }
          ]
      },
      {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
              {
                  "lightness": 100
              },
              {
                  "color": "#667700"
                },
              {
                  "visibility": "simplified"
              }
          ]
      },
      {
          "featureType": "road",
          "elementType": "labels",
          "stylers": [
              {
                  "visibility": "off"
              }
          ]
      },
      {
          "featureType": "transit.line",
          "elementType": "geometry",
          "stylers": [
              {
                  "visibility": "on"
              },
              {
                  "lightness": 700
              }
          ]
      },
      {
          "featureType": "water",
          "elementType": "all",
          "stylers": [
              {
                  "color": "#7dcdcd"
              }
          ]
      }
    ]
  };
  map = new google.maps.Map(mapTarget, mapOptions);

  //get my event data asynchronously
  async function getEvents() {
    const response = await fetch('/wp-content/themes/mbk/data/events.json');
    const eventsData = await response.json();
    return eventsData;
  };

  async function handleEvents() {

    let events = await getEvents();

    //initialize marker popup thing and variables
    let infowindow = new google.maps.InfoWindow({});
    let marker, count;
    var eventMarkers = [];
    
    //create content for infowindow
    function windowContent(name, location, town) {
      var content = document.createElement('div');
      content.setAttribute('class', 'events-map-infoslider');

      content.innerHTML = `
      <div class="events-map-infoslider-details">
        <p class="events-map-infoslider-name">${name}</p>
        <p class="events-map-infoslider-address">${location}</p>
        <p class="events-map-infoslider-address">${town}, VT</p>
      </div>
      `;

      return content;
    };

    //loop through all the events...
    //to create each marker...
    for(count = 0; count < events.length; count++) {

      marker = new google.maps.Marker({
        position: new google.maps.LatLng(events[count].latitude, events[count].longitude),
        map: map,
        icon: {url: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png"},
        title: `Event Info: ${events[count].name}`
      });

      eventMarkers.push(marker);

      //then add listener for click to pop up info window
      google.maps.event.addListener(marker, 'click', (function (marker, count) {
        return function () {
          infowindow.setContent(windowContent(events[count].name, events[count].location, events[count].town));
          infowindow.open(map, marker);
        };
      })(marker, count));
    } // end for loop

    let eventsSection = document.querySelector('.events-items');

    eventsSection.addEventListener('click', (event) => {
      let chosenButtonID = event.target.dataset.id;
      mapTarget.scrollIntoView({behavior: "smooth", block: "end"});

      switch (chosenButtonID) {
        case "waterbury":
          google.maps.event.trigger(eventMarkers[0],'click');
        break;
        case "montpelier-summer":
          google.maps.event.trigger(eventMarkers[1],'click');
        break;
        case "parkstreet":
          google.maps.event.trigger(eventMarkers[2],'click');
        break;
        case "taste":
          google.maps.event.trigger(eventMarkers[3],'click');
        break;
        case "autumn":
          google.maps.event.trigger(eventMarkers[4],'click');
        break;
      
        default:
          break;
      };
    });


  }; // end handleEvents

  handleEvents();

}; // end initMap