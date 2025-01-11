<div>
    @if($expenses->count() > 0)

        <table width="100%">
            <thead>
            <tr class="bg-primary">
                <th colspan="10"><img width="100%" src="{{ asset('dashboard/img/header-table.jpg') }}" alt=""></th>
            </tr>
            <tr class="bg-light">
                <th colspan="5" align="start" style="font-size: 18px;border: 0"><span
                        style="display: inline-block;padding: 10px">From the date of : <b> {{ request('from') }}</b> </span>
                </th>
                <th colspan="5" align="start" style="font-size: 18px;border: 0"><span
                        style="display: inline-block;padding: 10px">To date : <b> {{ request('to') }}</b> </span>
                </th>
            </tr>
            <tr class="bg-primary">
                <th class="text-white" colspan="10"><span
                        style="display: inline-block;padding: 10px">Expenses</span>
                </th>
            </tr>
            <tr align="center" class="bg-primary">
                <th class="table-title" scope="col">#</th>
                <th class="table-title" scope="col">Name of the expense</th>
                <th class="table-title" scope="col">User Name</th>
                <th class="table-title" scope="col">The total amount</th>
                <th class="table-title" scope="col">The amount paid</th>
                <th class="table-title" scope="col">Remaining amount</th>
                <th class="table-title" scope="col">Notes</th>
                <th class="table-title" scope="col">Expense date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($expenses as $key => $expense)
                <tr align="center">
                    <th scope="row">{{$key+1}}</th>
                    <td><p>{{$expense->name  }}</p></td>
                    <td><p>{{$expense->user ? $expense->user->name : ''}}</p></td>
                    <td><p>{{$expense->total_amount}}</p></td>
                    <td><p>{{$expense->amount}}</p></td>
                    <td><p>{{$expense->remainder_amount}}</p></td>
                    <td><p>{{$expense->notes}}</p></td>
                    <td><p>{{ date('Y/m/d', strtotime($expense->date))   }}</p></td>
                </tr>
            @endforeach
            <tr align="center">
                <td colspan="3" class="table-title bg-primary"><p>Total</p></td>
                <td><p>{{ $expenses->sum('total_amount') }}</p></td>
                <td><p>{{ $expenses->sum('amount') }}</p></td>
                <td><p>{{ $expenses->sum('remainder_amount') }}</p></td>
                <td colspan="2"></td>
            </tr>

            </tbody>
            <tfoot>
            <tr class="bg-primary">
                <th colspan="10">
                    @if ($expenses->count() > 12)
                        <img width="100%" src="{{asset('dashboard/img/footer-table.jpg')}}" alt="">

                    @else
                        <footer>
                            <img width="100%" src="{{asset('dashboard/img/footer-table.jpg')}}" alt="">
                        </footer>
                    @endif
                </th>
            </tr>

            </tfoot>

        </table>
    @else
        <h1 style="color: red;text-align: center"> Empty list</h1>
    @endif

</div>
@section('js_code')
    <script type="text/javascript">
        $(window).on('load', function () {
            window.print();
        });
    </script>
@endsection
