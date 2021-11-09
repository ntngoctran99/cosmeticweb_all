@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    @if (session()->has('flashMes'))
                                        <div class="alert alert-{{ session()->get('flashLevel') }} alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="icon fas fa-check"></i>
                                            {{ session()->get('flashMes') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <form autocomplete="off" class="col-md-12">
                                    @csrf
                                    <div class="col-md-4"
                                         style="padding-left: 0 !important; padding-right: 0 !important;">
                                        <input placeholder="Start time" name="start_time" type="text" id="dt1"
                                               class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="col-md-4"
                                         style="padding-left: 0 !important; padding-right: 0 !important;">
                                        <input placeholder="End time" name="end_time" type="text" id="dt2"
                                               class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="col-md-4" style="padding-left: 0 !important;">
                                        <button type="submit" class="btn btn-primary btn-block" id="btn-filter">Filter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--                         /.card-header-->
                        <div class="card-body" style="overflow: visible ">
                            <div id="myfirstchart" style="height: 250px; text-align: center; margin-bottom: 25px"></div>
                        </div>
                        <!--                        /.card-body-->
                    </div>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <h5>Total Product Order</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card-header -->--}}
{{--                        <div class="card-body">--}}
{{--                            <div id="donut" class="morris-donut-inverse"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js')}}"></script>
    <script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')}}"></script>

    <script>

        $(document).ready(function () {

            $("#dt1").datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function(selected) {
                    $("#dt2").datepicker("option","minDate", selected)
                }
            });
            $('#dt2').datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function(selected) {
                    $("#dt1").datepicker("option","maxDate", selected)
                }
            });

            var chart = new Morris.Bar({
                element: 'myfirstchart',

                lineColors: ['red'],

                xkey: 'name',
                ykeys: ['total'],
                labels: ['Total'],
                hideHover: 'auto',
            });

            $('#btn-filter').click(function (e){
                e.preventDefault();
                var _token = $('meta[name="csrf-token"]').attr('content');
                var from_date = $('#dt1').val();
                var to_date = $('#dt2').val();

                from_date += ' 00:00:00';
                to_date += ' 23:59:59';

                $.ajax({
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    url: "/admin/reports",
                    data: {
                        _token: _token,
                        from_date: from_date,
                        to_date: to_date,
                    }
                })
                    .done(function (data) {
                        console.log(data)
                        /*if (data.status == -1) {
                            console.log(response)
                            // window.location.reload(true);
                        }*/
                        chart.setData(data)
                    })
                    .fail(function () {
                        alert("No data in this period")
                    })
                    .always(function () {
                        //alert( "complete" );
                    });
            });


        });
    </script>

    <script>
        {{--$(document).ready(function () {--}}
        {{--    var colorDanger = "#FF1744";--}}
        {{--    Morris.Donut({--}}
        {{--        element: 'donut',--}}
        {{--        resize: true,--}}
        {{--        colors: [--}}
        {{--            '#E0F7FA',--}}
        {{--            '#B2EBF2',--}}
        {{--            '#80DEEA',--}}
        {{--            '#4DD0E1',--}}
        {{--            '#26C6DA'--}}
        {{--        ],--}}
        {{--        //labelColor:"#cccccc", // text color--}}
        {{--        //backgroundColor: '#333333', // border color--}}
        {{--        data: [--}}
        {{--                <?php foreach ($products as $key => $val) {?>--}}
        {{--            {label:"<?php echo $val->name;?>", value:<?php echo $val->total;?>},--}}
        {{--            <?php  }?>--}}
        {{--        ]--}}
        {{--    });--}}

        {{--});--}}
    </script>


@endpush

