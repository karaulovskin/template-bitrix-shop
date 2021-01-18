export default class Map {
    map = '[data-map]';
    point = '[data-map-point]';

    constructor() {
        this.init();
    }

    init() {
        if ($('#map').length)
            ymaps.ready(init);

        let self = this;
        let myMap;
        let myClusterer;
        let file = location.hostname === "localhost" || location.hostname === "127.0.0.1"
            ? './images/svg/mark.svg'
            : '/local/templates/main/frontend/assets/images/svg/mark.svg'
        ;

        function init(){
            myMap = new ymaps.Map("map", {
                center: [45.034736813972934,39.05084792855831],
                zoom: 8,
                controls: ['zoomControl']
            });

            let clusterIcons = [{
                href: file,
                size: [36, 54],
                offset: [-20, -20]
            }];

            myClusterer = new ymaps.Clusterer({
                clusterIcons: clusterIcons,
            });

            $(self.point).each(function () {
                let lon = $(this).attr('data-lon');
                let lat = $(this).attr('data-lat');

                let newPlacemark = new ymaps.Placemark([lon, lat], {
                    balloonContentHeader: "Балун метки",
                    balloonContentBody: "Содержимое <em>балуна</em> метки",
                    balloonContentFooter: "Подвал",
                }, {
                    iconLayout: 'default#image',
                    iconImageHref: file,
                    iconImageSize: [36, 54],
                });
                myClusterer.add(newPlacemark);

            });
            myMap.geoObjects.add(myClusterer);
            myMap.setBounds(myMap.geoObjects.getBounds(), {
                checkZoomRange:true
            }).then(function(){
                if(myMap.getZoom() > 16) myMap.setZoom(16);
            });
        }
    }
}