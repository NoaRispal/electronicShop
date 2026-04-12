// 1. Initialisation de la carte 
// [10.7746, 106.6679] Latitude,Longitude (HCMC D10)
var map = L.map('map').setView([10.7746, 106.6679], 13);

// 2. Chargement du design de la carte (OpenStreetMap)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// 3. Ajout du point (Marker) sur la carte, appelle à l'API de contactController.php
fetch('index.php?page=contact&action=get_stores')
        .then(response => response.json())
        .then(data => {
            data.forEach(store => {
                // Création du marqueur
                var marker = L.marker([store.latitude, store.longitude]).addTo(map);
                
                // Contenu de la popup
                var content = `
                    <div style="font-family: sans-serif;">
                        <h6 style="color: #0d6efd; margin-bottom: 5px;">${store.store_name}</h6>
                        <p style="font-size: 0.85rem; margin-bottom: 0;">
                            ${store.store_address}<br>
                            ${store.store_phone}<br>
                            ${store.store_mail}
                        </p>
                        <hr>
                        <p class="fw-bold text-center"> ${store.store_open === 1 ? 'Open' : 'Close'} </p>
                    </div>
                `;
                marker.bindPopup(content);
            });
        })
        .catch(error => console.error('Error :', error));