@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-sm-4" style="text-align: center;">
            <img src="//maps.googleapis.com/maps/api/staticmap?center={{$location->county}}+County,{{$location->state}}&zoom=12&size=400x400&key=AIzaSyDvLOgM6XsQWyK_nOEED34veSD6GKsjTXQ" style="width:100%; max-width: 400px;" class="img-circle" />
            <h1>{{ $location->county }} County, {{ $location->state }}</h1>
            <a href="/" style="margin-bottom:20px;" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-chevron-left"></span>Check Another Location</a>
            <br />
        </div>
        <div class="col-sm-8">
            @foreach ($products as $product)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $product->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>OPIS Avg</th>
                                    <th>Freight</th>
                                    <th>Margin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${{ $product->opis_avg }}</td>
                                    <td>${{ $product->freight }}</td>
                                    <td>${{ $product->margin }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop

@section('body-scripts')
@stop
