@extends('layouts.app')

@section('content')
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.44.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.44.1/mapbox-gl.css' rel='stylesheet' />

    <section>
        <div class="container py-3">
            <h1>Titre du plan</h1>
            <div class="row">
                <div class="col-md-10">
                    <i class="fas fa-map-marker-alt"></i> Mirabel
                    Le xx/xx/201x
                </div>
                <div class="col-md-2">0 €</div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-3">
            <div class="row">
                <div class="col-md-6"><i class="fas fa-bicycle"></i> Vélo</div>
                <div class="col-md-6"><i class="fas fa-music"></i> Musique</div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-3">
            <h3>Description</h3>
        </div>
    </section>
    <section>
        <div class="container py-3">
            <h3>Parcours</h3>
        </div>
    </section>
    <section>
        <div class="container-fluid p-0">
            <div id="map" style="width: 100%; height: 300px"></div>
        </div>
    </section>

    <script>
        var center  = [4.4986169999999674,44.607301];
        mapboxgl.accessToken = 'pk.eyJ1IjoiY2JvdXZhdCIsImEiOiJjamVibXAyMXYxaXFsMnlvM3BiN3MxY2x4In0.fIK2zbbDBcKUKp6g9OZlvA';
        var map = new mapboxgl.Map({
            container: 'map',
            center: center,
            style: 'mapbox://styles/mapbox/streets-v10',
            zoom: 10
        });

        var markerHeight = 50, markerRadius = 10, linearOffset = 25;
        var popupOffsets = {
            'top': [0, 0],
            'top-left': [0,0],
            'top-right': [0,0],
            'bottom': [0, -markerHeight],
            'bottom-left': [linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
            'bottom-right': [-linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
            'left': [markerRadius, (markerHeight - markerRadius) * -1],
            'right': [-markerRadius, (markerHeight - markerRadius) * -1]
        };

        var popup = new mapboxgl.Popup({offset:popupOffsets})
            .setText('Mirabel');

        var marker = new mapboxgl.Marker()
            .setLngLat(center)
            .setPopup(popup)
            .addTo(map);
    </script>
@endsection