import axios from "axios";

let map = $('#map'),
    printButton = $('#print-button'),
    albany = {lat: 31.5744842, lng: -84.1287211},
    googleMap,
    isLoggedIn;

function getNeeds() {
    axios.get('/map/needs')
        .then(response => {
            isLoggedIn = response.data.isLoggedIn;
            initMap(response.data);
        })
        .catch(error => {

        })
}


function initMap(locations) {
    googleMap = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: albany,
        scrollwheel: false
    });

    getUsersLocation();

    _.forEach(locations.needs, (value, key) => {
        let customMarker = 'markers/red_MarkerW.png';
        if (value.lat == null || value.lng == null) {
            return;
        }

        if (value.is_complete) {
            customMarker = 'markers/green_MarkerC.png';
        } else if (value.is_pending) {
            customMarker = 'markers/yellow_MarkerP.png';
        } else if (value.needs_met) {
            customMarker = 'markers/orange_MarkerM.png';
        } else {
            customMarker = 'markers/red_MarkerW.png';
        }

        let coordinates = {
            lat: parseFloat(value.lat),
            lng: parseFloat(value.lng)
        };

        let popup = new google.maps.InfoWindow({
            content: contentString(value)
        });

        let marker = new google.maps.Marker({
            position: coordinates,
            map: googleMap,
            title: `Case# ${value.id}`,
            infoWindow: popup,
            icon: customMarker
        });

        google.maps.event.addListener(marker, 'click', function () {
            this.infoWindow.open(googleMap, this);
        });
    });

}

function buildInfoWindow(content, address, zip, needs) {
    let output = `<div id="content">`;
    if (content.is_complete) {
        output += `<div id="siteNotice"><span class="label label-success">Complete</span></div>`;
    } else if (content.is_pending) {
        output += `<div id="siteNotice">
                        <span class="label label-warning">Pending</span>
                        <span class="pull-right">
                            <label>Print
                                <input type="checkbox" 
                                    name="needs[]"
                                    class="print" 
                                    data-need_id="${content.id}"
                                    value="${content.id}">
                            </label>
                        </span>
                    </div>`;
    } else if (content.needs_met) {
        output += `<div id="siteNotice"><span class="label label-info">Needs Met</span>
                        <span class="pull-right">
                            <label>Print
                                <input type="checkbox" 
                                    name="needs[]"
                                    class="print" 
                                    data-need_id="${content.id}"
                                    value="${content.id}">
                                </label>
                        </span>
                    </div>`;
    } else {
        output += `<div id="siteNotice"><span class="label label-default">Waiting</span>
                        <span class="pull-right">
                            <label>Print
                                <input type="checkbox" 
                                    name="needs[]"
                                    class="print" 
                                    data-need_id="${content.id}"
                                    value="${content.id}">
                            </label>
                        </span>
                    </div>`;
    }

    if (isLoggedIn) {
        output += `<h1 class="heading" class="firstHeading"><a href="/needs/${content.id}/edit">Case# ${content.id}</a></h1>
                <div id="bodyContent">`;
    } else {
        output += `<h1 class="heading" class="firstHeading">Case# ${content.id}</h1>
                    <div id="bodyContent">`;
    }
    if (content.first_name || content.last_name) {
        output += `<p>Name: <strong>${content.first_name} ${content.last_name}</strong></p>`
    }
    output += `<p>Address: <strong>${address}, ${zip}</strong></p>`;
    if (content.phone) {
        output += `<p>Phone: ${content.phone}</p>`;
    }
    if (needs != '') {
        output += needs;
    }
    output += `</div>
            </div>`;

    return output;
}

function contentString(content) {
    let address = content.address ? content.address : '';
    let zip = content.zip ? content.zip : '';
    let needs = '';
    if (content.physical_needs.length > 0) {
        _.forEach(content.physical_needs, function (value, key) {
            needs += `<div class="checkbox">
                          <label><input type="checkbox" class="physical_needs" 
                            data-need_id="${content.id}"
                            data-physical_needs_id="${value.id}"
                            value="">${_.capitalize(value.name)}</label>
                        </div>`;
        });
    }
    return buildInfoWindow(content, address, zip, needs);
}

function markPhysicalNeedComplete() {
    $('body').on('change', '.physical_needs', function () {
        let needId = $(this).data('need_id'),
            physicalNeedId = $(this).data('physical_needs_id'),
            isChecked = $(this).prop('checked');
        axios.post(`/needs/${needId}`, {
            need_met: true,
            physical_need_id: physicalNeedId,
            need_complete: isChecked
        })
            .then(response => {
                toastr.success('The job has been updated')
            })
            .catch(error => {
                console.log(error);
            })
    });
}

function getUsersLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {
            let lat = position.coords.latitude;
            let lng = position.coords.longitude;
            addUsersMarkerToMap(lat, lng)
        });
    }
}

function addUsersMarkerToMap(lat, lng) {
    new google.maps.Marker({
        position: {lat: lat, lng: lng},
        map: googleMap,
        title: `You are here!`,
        icon: 'markers/blue_MarkerM.png'
    });
}

function showPrintButton() {
    $('body').on('change', '.print', () => {
        let checkbox = $('.print:checkbox:checked');
        if (checkbox.length >= 1 && printButton.not(':visible')) {
            printButton.fadeIn();
        } else if (checkbox.length < 1 && printButton.is(':visible')) {
            printButton.fadeOut();
        }
    })
}

function init() {
    getNeeds();
    markPhysicalNeedComplete();
    showPrintButton();
}

init();