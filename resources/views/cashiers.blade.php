@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Cashiers Sales</div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Cashier</th>
                            <th>Today Sales Count</th>
                            <th>Yesterday Sales Count</th>
                            <th>This Week Sales Count</th>
                            <th>Today Sales</th>
                            <th>Yesterday Sales</th>
                            <th>This Week Sales</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $c = 0 ?>
                        @if($all_cashiers)
                            @foreach($all_cashiers as $a)
                                <tr>
                                    <td> {{$a->username}} </td>
                                    <td> {{$count_cashiers_of_today[$c]->count}}  </td>
                                    <td> @if(!$count_cashiers_of_yesterday){{0}}@else{{$count_cashiers_of_yesterday[$c]->count}}@endif</td>
                                    <td> {{$count_cashiers_of_week[$c]->count}}  </td>
                                    <td> {{$orders_today[$c]->sum}}  </td>
                                    <td> @if(!$orders_yesterday){{0}}@else{{$orders_yesterday[$c]->sum}}@endif</td>
                                    <td> {{$orders_week[$c]->sum}}  </td>
                                </tr>
                                <?php $c += 1?>

                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
