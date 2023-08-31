let map;function initMap(){const mapTarget=document.getElementById("events-map"),mapOptions={center:{lat:44.58792634446149,lng:-72.49345485914775},zoom:8,mapTypeControl:!0,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DROPDOWN_MENU},zoomControl:!0,streetViewControl:!1,mapTypeId:google.maps.MapTypeId.TERRAIN,styles:[{featureType:"landscape.natural",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"#e0efef"}]},{featureType:"poi",elementType:"geometry.fill",stylers:[{visibility:"on"},{hue:"#1900ff"},{color:"#c0e8e8"}]},{featureType:"road",elementType:"geometry",stylers:[{lightness:100},{color:"#667700"},{visibility:"simplified"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit.line",elementType:"geometry",stylers:[{visibility:"on"},{lightness:700}]},{featureType:"water",elementType:"all",stylers:[{color:"#7dcdcd"}]}]};map=new google.maps.Map(mapTarget,mapOptions),async function(){let marker,count,events=await async function(){const response=await fetch("/data/events.json");return await response.json()}(),infowindow=new google.maps.InfoWindow({});var eventMarkers=[];for(count=0;count<events.length;count++)marker=new google.maps.Marker({position:new google.maps.LatLng(events[count].latitude,events[count].longitude),map:map,icon:{url:"https://maps.google.com/mapfiles/ms/icons/blue-dot.png"},title:"Cidery Info:"}),eventMarkers.push(marker),google.maps.event.addListener(marker,"click",function(marker,count){return function(){var name,town,event,image,content;infowindow.setContent((name=events[count].name,town=events[count].town,event=events[count].event,(content=document.createElement("div")).setAttribute("class","events-map-infoslider"),content.innerHTML=`\n      <div class="events-map-infoslider-image">\n        <img src="${image}" alt="${event}-logo"/>\n      </div>\n      <div class="events-map-infoslider-details">\n        <p class="events-map-infoslider-name">${name}</p>\n        <p class="events-map-infoslider-address">${town}, VT</p>\n      </div>\n      `,content)),infowindow.open(map,marker)}}(marker,count))}()}