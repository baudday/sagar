@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Choose a Location</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('products') }}" method="get" role="form">
                        <div class="form-group">
                            <label for="">State</label>
                            <select name="state" id="state" class="form-control input-lg" required="required">
                                <option value="">State</option>
                                @foreach($states as $state => $location)
                                <option value="{{ $state }}">{{ $state }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" style="display:none;" id="county-group">
                            <label for="">County</label>
                            <select name="county" id="county" class="form-control input-lg" required="required">
                                <option value="">County</option>
                            </select>
                        </div>

                        <button style="display:none" type="submit" id="submit" class="btn btn-lg btn-default col-xs-12">Go!</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('body-scripts')
    <script type="text/javascript">
        $(function() {
            var states = {!! $states->toJson() !!};
            $('#state').on('change', function() {
                $('#county').html('<option value="">County</option>');
                $.each(states[$(this).val()], function(key, obj) {
                    $('#county').append($("<option></option>")
                                .attr("value", obj.county)
                                .text(obj.county));
                });
                $('#county-group').show();
            });

            $('#county').on('change', function() {
                $('#submit').show();
            });
        });
    </script>
@stop
