$(function () {
    $('#map').tinyMap({
        center: '台中市南區忠明南路758號25樓-A', 
        zoom: 17, 
        mapTypeId: 'roadmap', 
		marker: [ 
        {addr: '台中市南區忠明南路758號25樓-A', text: '<h5>台灣雲端運算股份有限公司</h5>台中市南區忠明南路758號25樓-A',  css: 'label',
		 icon: 'images/map_mark.png'
		}, 
		]
    });
});