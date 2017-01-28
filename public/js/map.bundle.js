webpackJsonp([4],{

/***/ 32:
/***/ function(module, exports, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_axios__);


var locations,
    map = $('#map');

function getNeeds() {
    __WEBPACK_IMPORTED_MODULE_0_axios___default.a.get('/map/needs')
        .then(function (response) {
            // console.log(response);
            initMap(response.data);
        })
        .catch(function (error) {

        })
}

function initMap(locations) {
    var albany = {lat: 31.5744842, lng: -84.1287211};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: albany,
        scrollwheel: false
    });

    _.forEach(locations, function (value, key) {
        console.log(value);
        var customMarker = 'markers/brown_MarkerW.png';
        if (value.lat == null || value.lng == null) {
            return;
        }

        if (value.is_complete) {
            customMarker = 'markers/green_MarkerC.png';
        } else if (value.is_pending) {
            customMarker = 'markers/orange_MarkerP.png';
        } else {
            customMarker = 'markers/brown_MarkerW.png';
        }

        var coordinates = {
            lat: parseFloat(value.lat),
            lng: parseFloat(value.lng)
        };

        var popup = new google.maps.InfoWindow({
            content: contentString(value)
        });

        var marker = new google.maps.Marker({
            position: coordinates,
            map: map,
            title: ("Case# " + (value.id)),
            infoWindow: popup,
            icon: customMarker
        });

        google.maps.event.addListener(marker, 'click', function () {
            this.infoWindow.open(map, this);
        });
    });

}

function contentString(content) {
    var address = content.address ? content.address : '';
    var zip = content.zip ? content.zip : '';
    var needs = '';
    if (content.physical_needs.length > 0) {
        _.forEach(content.physical_needs, function (value, key) {
            needs += "<p class=\"item\">" + (_.upperFirst(value.name)) + "</p>";
        });
    }
    var output = "<div id=\"content\">";
    if (content.is_complete) {
        output += "<div id=\"siteNotice\"><span class=\"label label-success\">Complete</span></div>";
    } else if (content.is_pending) {
        output += "<div id=\"siteNotice\"><span class=\"label label-warning\">Pending</span></div>";
    } else {
        output += "<div id=\"siteNotice\"><span class=\"label label-default\">Waiting</span></div>";
    }

    output += "<h1 class=\"heading\" class=\"firstHeading\">Case# " + (content.id) + "</h1>\n                <div id=\"bodyContent\">";
    if (content.first_name || content.last_name) {
        output += "<p>Name: <strong>" + (content.first_name) + " " + (content.last_name) + "</strong></p>"
    }
    output += "<p>Address: <strong>" + address + ", " + zip + "</strong></p>";
    if (content.phone) {
        output += "<p>Phone: " + (content.phone) + "</p>";
    }
    if (needs != '') {
        output += needs;
    }
    output += "</div>\n            </div>";

    return output;
}

getNeeds();


/***/ }

},[32]);
//# sourceMappingURL=map.bundle.js.map