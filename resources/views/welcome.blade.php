@extends('layouts.app')

@section('content')
    <section id="home-header" class="py-5 text-light">
        <div class="container">
            <h1 class="text-center">Pour les ardèchois qui ont des bogues dans les poches</h1>
            <form action="search" method="get">
                <div class="row pt-5">
                    <div class="col">
                        <input type="text" name="place" class="form-control" placeholder="Lieu">
                    </div>
                    <div class="col">
                        <input type="date" name="date" class="form-control" placeholder="Date">
                    </div>
                    <div class="col">
                        <select name="activity" class="custom-select">
                            <option value="">Activités</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-primary btn-block" value="Rechercher">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Tendances plans</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-10">
                                    <h6>Visite de saucisson-land</h6>
                                    <p>A Mirabel, le 4 mars</p>
                                </div>
                                <div class="col-md-2">
                                    0€
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-10">
                                    <h6>Visite de saucisson-land</h6>
                                    <p>A Mirabel, le 4 mars</p>
                                </div>
                                <div class="col-md-2">
                                    0€
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-10">
                                    <h6>Visite de saucisson-land</h6>
                                    <p>A Mirabel, le 4 mars</p>
                                </div>
                                <div class="col-md-2">
                                    0€
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Les prochaines activités</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-10">
                                    <h6>Visite de saucisson-land</h6>
                                    <p>A Mirabel, le 4 mars</p>
                                </div>
                                <div class="col-md-2">
                                    0€
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-10">
                                    <h6>Visite de saucisson-land</h6>
                                    <p>A Mirabel, le 4 mars</p>
                                </div>
                                <div class="col-md-2">
                                    0€
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-10">
                                    <h6>Visite de saucisson-land</h6>
                                    <p>A Mirabel, le 4 mars</p>
                                </div>
                                <div class="col-md-2">
                                    0€
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
