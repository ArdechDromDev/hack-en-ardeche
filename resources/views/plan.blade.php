@extends('layouts.app')

@section('content')

    <script id="details" type="template">
        <div class="container py-3">
            <h1>@{{title}}</h1>
        <div class="row">
            <div class="col-md-10">
            <i class="fas fa-map-marker-alt"></i> @{{commune}}
        Le @{{date}}
        </div>
        <div class="col-md-2">@{{ price }} €</div>
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
            <div>
                @{{description}}
            </div>
            </section>
            <section>
            <div class="container py-3">
            <h3>Parcours</h3>
                <div>
                    @{{{step}}}
                </div>


    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v0.44.1/mapbox-gl.js'></script>
    <script src='/js/mustache.min.js'></script>

    <link href='https://api.mapbox.com/mapbox-gl-js/v0.44.1/mapbox-gl.css' rel='stylesheet' />
    <section id="target">

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

        $.get( '{{config('es.es_url')}}/plans/plan/{{$planid}}' , function( data ) {
            var hits = data._source;
            console.log(hits)
            var template = $('#details').html();
            Mustache.parse(template);   // optional, speeds up future uses
            var rendered ='';


                commune = hits.city;
                zipcode = hits.zipcode
                title = hits.activityName;
                dateStart = hits.dateStart;
                price = hits.price;
                step = '';
                steps = hits.steps;
                for(s=0;s<steps.length;s++) {
                    step += steps[s].dateStart + ' : ' + steps[s].type +'<br/>';
                }
                //description = hits.
                rendered += Mustache.render(template, {step:step,title: title, zipcode: zipcode, commune: commune, date: dateStart , price:price});
                //console.log(data.hits.hits[i]._source.Commune)
                console.log("toto");
            $('#target').html(rendered);
        });
    </script>
@endsection