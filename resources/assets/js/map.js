import axios from "axios";

let locations,
    map = $('#map'),
    physicalNeeds = $('.physical_needs');

function getNeeds() {
    axios.get('/map/needs')
        .then(response => {
            // console.log(response);
            initMap(response.data);
        })
        .catch(error => {

        })
}

function initMap(locations) {
    let albany = {lat: 31.5744842, lng: -84.1287211};

    let map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: albany,
        scrollwheel: false
    });

    _.forEach(locations, (value, key) => {
        console.log(value);
        let customMarker = 'markers/brown_MarkerW.png';
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

        let coordinates = {
            lat: parseFloat(value.lat),
            lng: parseFloat(value.lng)
        };

        let popup = new google.maps.InfoWindow({
            content: contentString(value)
        });

        let marker = new google.maps.Marker({
            position: coordinates,
            map: map,
            title: `Case# ${value.id}`,
            infoWindow: popup,
            icon: customMarker
        });

        google.maps.event.addListener(marker, 'click', function () {
            this.infoWindow.open(map, this);
        });
    });

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
    let output = `<div id="content">`;
    if (content.is_complete) {
        output += `<div id="siteNotice"><span class="label label-success">Complete</span></div>`;
    } else if (content.is_pending) {
        output += `<div id="siteNotice"><span class="label label-warning">Pending</span></div>`;
    } else if (content.needs_met) {
        output += `<div id="siteNotice"><span class="label label-info">Needs Met</span></div>`;
    } else {
        output += `<div id="siteNotice"><span class="label label-default">Waiting</span></div>`;
    }

    output += `<h1 class="heading" class="firstHeading">Case# ${content.id}</h1>
                <div id="bodyContent">`;
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
                console.log(response);
                toastr.success('The job has been marked complete.')
            })
            .catch(error => {
                console.log(error);
            })
    });
}

getNeeds();
markPhysicalNeedComplete();