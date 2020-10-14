@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Branch Sales</div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Branch</th>
                            <th>Today Sales Count</th>
                            <th>Yesterday Sales Count</th>
                            <th>This Week Sales Count</th>
                            <th>Today Sales</th>
                            <th>Yesterday Sales</th>
                            <th>This Week Sales</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($allbranches)
                            @foreach($allbranches as $a)
                                <tr>
                                    <td> {{$a->name}} </td>
                                    <td> {{$count_sales_of_today}}  </td>
                                    <td> @if(!$count_sales_of_yesterday){{0}}@else{{$count_sales_of_yesterday}}@endif</td>
                                    <td> {{$count_sales_of_week}}  </td>
                                    <td> {{$sum_of_today}}  </td>
                                    <td> @if(!$sum_of_yesterday){{0}}@else{{$sum_of_yesterday}}@endif</td>
                                    <td> {{$sum_of_week}}  </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
