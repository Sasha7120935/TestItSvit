@extends('layouts.app')

@section('content')
    <div class="card-body">
        @include('errors')
        <form action="{{ url('beer') }}" method="POST" class="form-horizontal">
         {{csrf_field()}}

            <div class="row">
                <div class="form-group">
                    <label form="Beer" class="col-sm-3 control-label">Beer</label>

                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="name" id="beer-name" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-fa-plus"></i>
                                Add Beer</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if(count($beers) > 0)
        <div class="card">
            <div class="card-heading">
                Types of beer
            </div>
            <div class="card-body">
                <table class="table.table.table-striped beer-table">
                    <thead>
                    <th>beer</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbdoy>
                        @foreach($beers as $beer)

                            <td class="table-text">
                                <div>{{$beer -> name}}</div>
                                <div>{{$beer-> description}}</div>
                            </td>
                            <td>
                                <form action="{{url('beer/'.$beer->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            @endforeach
                    </tbdoy>
                </table>
            </div>
        </div>
    @endif
        <form action="{{ url('beer_producer') }}" method="POST" class="form-horizontal">
            {{csrf_field()}}

            <div class="row">
                <div class="form-group">
                    <label form="Beer_Producer" class="col-sm-3 control-label">Beer Producer</label>

                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="name" id="beer_producer-name" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-fa-plus"></i>
                                Add Beer Producer</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection