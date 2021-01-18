export default class MapObject {
    constructor() {
        this.init();
    }

    init() {

        ($('#map').length) ? ymaps.ready(init) : false;

        let myMap;
        let objectManager;
        let file = location.hostname === "localhost" || location.hostname === "127.0.0.1"
            ? './images/svg/mark.svg'
            : '/local/templates/main/frontend/assets/images/svg/mark.svg';
        let url = location.hostname === "localhost" || location.hostname === "127.0.0.1"
            ? './objectManager/data.json'
            : '/local/templates/main/frontend/assets/objectManager/data.json';

        function init() {
            myMap = new ymaps.Map("map", {
                center: [45.05725,38.93232],
                zoom: 16,
                controls: []
            });
            objectManager = new ymaps.ObjectManager({
                clusterize: true,
                gridSize: 6,
                clusterDisableClickZoom: true,
            });
            objectManager.objects.options.set({
                preset: 'islands#redIcon',
                iconLayout: 'default#image',
                iconImageHref: file
            });
            objectManager.clusters.options.set({
                preset:'islands#orangeClusterIcons'
            });

            $.ajax({
                url: url
            }).done(function(data) {
                objectManager.add(data);
                myMap.setBounds(myMap.geoObjects.getBounds(), {
                    checkZoomRange:true
                }).then(function(){
                    if(myMap.getZoom() > 16) myMap.setZoom(16);
                });
            });

            myMap.geoObjects.add(objectManager);

            function setObjectManager(type) {
                objectManager.setFilter(function (object) {
                    return object.properties.type == type;
                });
            }

            $(document).on('click', '[data-map-point-id]', function(e) {
                e.preventDefault();

                let $pointId = $(this).attr('data-map-point-id');

                setObjectManager($pointId);

                myMap.setBounds(myMap.geoObjects.getBounds(), {
                    checkZoomRange:true
                }).then(function(){
                    if(myMap.getZoom() > 16) myMap.setZoom(16);
                });
            });
        }
    }
}