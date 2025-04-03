var map = L.map('map', {
    maxBounds: [[41.333740, -5.142222], [51.124199, 9.662499]],
    maxBoundsViscosity: 1.0,
    minZoom: 6 
}).setView([46.603354, 1.888334], 6);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Ajout d'une légende à la carte
var legend = L.control({ position: 'bottomright' });

legend.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'legend');
    div.innerHTML = `
        <h4>Légende</h4>
        <div><span style="display: inline-block; width: 20px; height: 20px; background-color: #f7c948; border: 1px solid #000; margin-right: 5px;"></span>Départ</div>
        <div><span style="display: inline-block; width: 20px; height: 20px; background-color: #8B0000; border: 1px solid #000; margin-right: 5px;"></span>Arrivée</div>
        <div><span style="display: inline-block; width: 20px; height: 2px; background-color: red; margin-right: 5px;"></span>Tracé entre départ et arrivée</div>
    `;
    return div;
};

legend.addTo(map);

var etapes = [
    [50.6292, 3.0573, "Lille Métropole", 50.6292, 3.0573, "Lille Métropole", 185],
    [50.4167, 2.8333, "Lauwin-Planque", 50.7256, 1.6147, "Boulogne-sur-Mer", 212],
    [50.358, 3.525, "Valenciennes", 51.033, 2.377, "Dunkerque", 178],
    [49.895, 2.302, "Amiens Métropole", 49.443, 1.099, "Rouen", 173],
    [49.182, -0.370, "Caen", 49.182, -0.370, "Caen", 33],
    [49.277, -0.705, "Bayeux", 48.838, -0.887, "Vire Normandie", 201],
    [48.649, -2.025, "Saint-Malo", 48.276, -2.994, "Mûr-de-Bretagne Guerlédan", 194],
    [48.188, -2.033, "Saint-Méen-le-Grand", 48.078, -0.768, "Laval Espace Mayenne", 174],
    [47.167, 0.237, "Chinon", 46.813, 1.691, "Châteauroux", 170],
    [45.889, 3.198, "Ennezat", 45.573, 2.808, "Le Mont-Dore Puy de Sancy", 163],
    [43.604, 1.444, "Toulouse", 43.604, 1.444, "Toulouse", 154],
    [43.647, 0.588, "Auch", 42.853, -0.011, "Hautacam", 181],
    [42.798, 0.408, "Loudenvielle", 42.789, 0.437, "Peyragudes", 11],
    [43.295, -0.370, "Pau", 42.787, 0.593, "Luchon-Superbagnères", 183],
    [43.464, 1.335, "Muret", 43.213, 2.351, "Carcassonne", 169],
    [43.611, 3.877, "Montpellier", 44.173, 5.270, "Mont Ventoux", 172],
    [44.283, 4.750, "Bollène", 44.933, 4.892, "Valence", 161],
    [45.100, 5.683, "Vif", 45.414, 6.634, "Courchevel Col de la Loze", 171],
    [45.675, 6.392, "Albertville", 45.507, 6.677, "La Plagne", 130],
    [46.150, 5.600, "Nantua", 46.903, 6.355, "Pontarlier", 185],
    [48.983, 2.133, "Mantes-la-Ville", 48.8738, 2.295, "Paris Champs-Élysées", 120]
];

etapes.forEach(function([latDep, lngDep, depart, latArr, lngArr, arrivee, km], index) {
    var customIcon = L.divIcon({
        className: 'leaflet-marker-icon',
        html: `${index + 1}`,
        iconSize: [30, 20]
    });

    // Ajout du marqueur de départ
    var departMarker = L.marker([latDep, lngDep], { icon: customIcon, riseOnHover: true })
        .addTo(map)
        .bindPopup(
            `<strong>Étape ${index + 1}</strong><br>Départ : ${depart}<br>Arrivée : ${arrivee}<br>Distance : ${km} km`,
            { autoPan: true, autoPanPadding: [10, 10], offset: [0, -10] } // Positionne le popup sur le rectangle
        );

    // Ajoute un événement pour relier la ville de départ à la ville d'arrivée
    departMarker.on('click', function () {
        // Supprime les tracés existants
        if (window.currentPolyline) {
            map.removeLayer(window.currentPolyline);
        }

        // Tracé entre la ville de départ et la ville d'arrivée
        window.currentPolyline = L.polyline([[latDep, lngDep], [latArr, lngArr]], { color: 'red', weight: 4 }).addTo(map);
    });

    // Ajout du marqueur d'arrivée uniquement si la ville d'arrivée est différente de la ville de départ
    if (latDep !== latArr || lngDep !== lngArr) {
        var arrivalIcon = L.divIcon({
            className: 'arrival-marker-icon',
            html: `${index + 1}`, // Numéro de l'étape
            iconSize: [30, 20]
        });

        L.marker([latArr, lngArr], { icon: arrivalIcon, riseOnHover: true })
            .addTo(map)
            .bindPopup(
                `<strong>Ville d'arrivée</strong><br>${arrivee}`,
                { autoPan: true, autoPanPadding: [10, 10], offset: [0, -10] } // Positionne le popup sur le rectangle
            );
    }
});