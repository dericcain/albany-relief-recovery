webpackJsonp([6],{

/***/ 32:
/***/ function(module, exports, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios__ = __webpack_require__(1);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_axios__);


var map = $('#map'),
    albany = {lat: 31.5744842, lng: -84.1287211},
    currentUser = {
        lat: 0,
        lng: 0
    },
    googleMap;

function getNeeds() {
    __WEBPACK_IMPORTED_MODULE_0_axios___default.a.get('/map/needs')
        .then(function (response) {
            initMap(response.data);
        })
        .catch(function (error) {

        })
}

function initMap(locations) {
    googleMap = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: albany,
        scrollwheel: false
    });

    getUsersLocation();

    _.forEach(locations, function (value, key) {
        var customMarker = 'markers/brown_MarkerW.png';
        if (value.lat == null || value.lng == null) {
            return;
        }

        if (value.is_complete) {
            customMarker = 'markers/green_MarkerC.png';
        } else if (value.is_pending) {
            customMarker = 'markers/orange_MarkerP.png';
        } else if (value.needs_met) {
            customMarker = 'markers/blue_MarkerM.png';
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
            map: googleMap,
            title: ("Case# " + (value.id)),
            infoWindow: popup,
            icon: customMarker
        });

        google.maps.event.addListener(marker, 'click', function () {
            this.infoWindow.open(googleMap, this);
        });
    });

}

function buildInfoWindow(content, address, zip, needs) {
    var output = "<div id=\"content\">";
    if (content.is_complete) {
        output += "<div id=\"siteNotice\"><span class=\"label label-success\">Complete</span></div>";
    } else if (content.is_pending) {
        output += "<div id=\"siteNotice\"><span class=\"label label-warning\">Pending</span></div>";
    } else if (content.needs_met) {
        output += "<div id=\"siteNotice\"><span class=\"label label-info\">Needs Met</span></div>";
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

function contentString(content) {
    var address = content.address ? content.address : '';
    var zip = content.zip ? content.zip : '';
    var needs = '';
    if (content.physical_needs.length > 0) {
        _.forEach(content.physical_needs, function (value, key) {
            needs += "<div class=\"checkbox\">\n                          <label><input type=\"checkbox\" class=\"physical_needs\" \n                            data-need_id=\"" + (content.id) + "\"\n                            data-physical_needs_id=\"" + (value.id) + "\"\n                            value=\"\">" + (_.capitalize(value.name)) + "</label>\n                        </div>";
        });
    }
    return buildInfoWindow(content, address, zip, needs);
}

function markPhysicalNeedComplete() {
    $('body').on('change', '.physical_needs', function () {
        var needId = $(this).data('need_id'),
            physicalNeedId = $(this).data('physical_needs_id'),
            isChecked = $(this).prop('checked');
        __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(("/needs/" + needId), {
            need_met: true,
            physical_need_id: physicalNeedId,
            need_complete: isChecked
        })
            .then(function (response) {
                toastr.success('The job has been updated')
            })
            .catch(function (error) {
                console.log(error);
            })
    });
}

function getUsersLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            addUsersMarkerToMap(lat, lng)
        });
    }
}

function addUsersMarkerToMap(lat, lng) {
    console.log(lat, lng);
    console.log(googleMap);
    new google.maps.Marker({
        position: {lat: lat, lng: lng},
        map: googleMap,
        title: "You are here!",
        icon: 'markers/red_MarkerM.png'
    });
}

function init() {
    getNeeds();
    markPhysicalNeedComplete();
}

init();

/***/ }

},[32]);
//# sourceMappingURL=map.bundle.js.map