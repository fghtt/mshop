ymaps.ready(init)

let myMap
let myPlacemark

function init() {
    let geolocation = ymaps.geolocation
    myMap = new ymaps.Map('map', {
        center: [55, 34],
        zoom: 10
    }, {
        searchControlProvider: 'yandex#search'
    })
    geolocation.get({
        provider: 'yandex',
        mapStateAutoApply: true
    })
    geolocation.get({
        provider: 'browser',
        mapStateAutoApply: true
    }).then(function (result) {
        result.geoObjects.options.set('preset', 'islands#blueCircleIcon')
        myMap.geoObjects.add(result.geoObjects)
    })
    myMap.cursors.push('arrow');
    myMap.events.add('click', function (e) {
        let coords = e.get('coords')
        if (typeof myPlacemark === "undefined") {
            myPlacemark = new ymaps.Placemark(coords)
        } else {
            myMap.geoObjects.remove(myPlacemark)
            myPlacemark = new ymaps.Placemark(coords)
        }
        myMap.geoObjects.add(myPlacemark)
        document.getElementById('point').setAttribute('value', coords.join(','))
    });
}

export function setAddress(address) {
    myMap.geoObjects.remove(myPlacemark)
    ymaps.geocode(address, {
        results: 1
    }).then(function (res) {
        let firstGeoObject = res.geoObjects.get(0),
            coords = firstGeoObject.geometry.getCoordinates(),
            bounds = firstGeoObject.properties.get('boundedBy')

        document.getElementById('point').setAttribute('value', coords.join(','))
        firstGeoObject.options.set('preset', 'islands#darkBlueDotIconWithCaption');
        firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());

        myMap.geoObjects.add(firstGeoObject);

        myMap.setBounds(bounds, {
            checkZoomRange: true
        });
    });
}
