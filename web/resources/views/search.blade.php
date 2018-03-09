@extends('layouts.app')

@section('content')

@include('partials.cards')

    <script src='https://api.mapbox.com/mapbox-gl-js/v0.44.1/mapbox-gl.js'></script>
    <script src='js/mustache.min.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.44.1/mapbox-gl.css' rel='stylesheet' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <div class="container-fluid">
        <div  class="row">
            <div id="target" class="col-md-6 p-0">
            </div>
            <div class="col-md-6 p-0">
                <div id="map" style="width: 100%; height: 1000px"></div>
            </div>
        </div>
    </div>

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



        $.get( '{{config('es.es_url')}}/plans/plan/_search' , function( data ) {
            var hits = data.hits.hits;
            console.log(hits);
            var template = $('#cards').html();
            Mustache.parse(template);   // optional, speeds up future uses
            var rendered ='';

            for (var i=0; i<hits.length;i++) {
                id = hits[i]._id;
                commune = hits[i]._source.city;
                zipcode = hits[i]._source.zipcode
                title = hits[i]._source.activityName;
                dateStart = hits[i]._source.dateStart;
                price = hits[i]._source.price;
                rendered += Mustache.render(template, {id:id, title: title, zipcode: zipcode, commune: commune, date: dateStart , price:price});
            }
            $('#target').html(rendered);
        });
    </script>
@endsection
