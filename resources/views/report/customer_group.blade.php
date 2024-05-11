@extends('layouts.app')
@section('title', __('lang_v1.customer_groups_report'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ __('lang_v1.customer_groups_report')}}</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @component('components.filters', ['title' => __('report.filters')])

              {!! Form::open(['url' => action([\App\Http\Controllers\ReportController::class, 'getCustomerGroup']), 'method' => 'get', 'id' => 'cg_report_filter_form' ]) !!}
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('cg_customer_group_id', __( 'lang_v1.customer_group_name' ) . ':') !!}
                        {!! Form::select('cg_customer_group_id', $customer_group, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'cg_customer_group_id']); !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('cg_location_id',  __('purchase.business_location') . ':') !!}
                        {!! Form::select('cg_location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']); !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('cg_date_range', __('report.date_range') . ':') !!}
                        {!! Form::text('date_range', null, ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'cg_date_range', 'readonly']); !!}
                    </div>
                </div>

                {!! Form::close() !!}
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @component('components.widget', ['class' => 'box-primary'])
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="cg_report_table">
                    <thead>
                        <tr>
                            <th>@lang('lang_v1.customer_group')</th>
                            <th>@lang('report.total_sell')</th>
                        </tr>
                    </thead>
                </table>
            </div>
            @endcomponent
        </div>
    </div>
</section>
<!-- /.content -->

@endsection

@section('javascript')
    
    <script type="text/javascript">
        $(document).ready(function(){
            function convertToAD(nepaliDate) {
        const bsToADYears = 56;
        const bsToADMonths = 8;
        const bsToADDays = 17; // Adjusted from 15 to 17 for reverse conversion
        const momentDate = moment(nepaliDate, 'YYYY-MM-DD');
        momentDate.subtract(bsToADYears, 'years').subtract(bsToADMonths, 'months').subtract(bsToADDays, 'days');
        return momentDate.format('YYYY-MM-DD');
    }

    if($('#cg_date_range').length == 1){
        $('#cg_date_range').daterangepicker(
            dateRangeSettings,
            function (start, end) {
                // Check if the year format is BS and convert dates accordingly before setting the value
                var yearFormat = $('#year-format').val(); // Assuming you have a way to select the year format
                if (yearFormat === 'BS') {
                    start = convertToAD(start.format('YYYY-MM-DD'));
                    end = convertToAD(end.format('YYYY-MM-DD'));
                }
                $('#cg_date_range').val(start.format(moment_date_format) + ' ~ ' + end.format(moment_date_format));
                cg_report_table.ajax.reload();
            }
        ).on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            cg_report_table.ajax.reload();
        });
    }


    var cg_report_table = $('#cg_report_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/reports/customer-group",
            data: function (d) {
                d.location_id = $('#cg_location_id').val();
                d.customer_group_id = $('#cg_customer_group_id').val();
                var dateRange = $('#cg_date_range').val().split(' ~ ');
                if (dateRange.length === 2) {
                    var start = moment(dateRange[0], moment_date_format);
                    var end = moment(dateRange[1], moment_date_format);
                    var yearFormat = $('#year-format').val();
                    if (yearFormat === 'BS') {
                        start = convertToAD(start.format('YYYY-MM-DD'));
                        end = convertToAD(end.format('YYYY-MM-DD'));
                    }
                    d.start_date = start.format('YYYY-MM-DD');
                    d.end_date = end.format('YYYY-MM-DD');
                }
            }
        },
                            columns: [
                                {data: 'name', name: 'CG.name'},
                                {data: 'total_sell', name: 'total_sell', searchable: false}
                            ],
                            "fnDrawCallback": function (oSettings) {
                                __currency_convert_recursively($('#cg_report_table'));
                            }
                        });
            //Customer Group report filter
            $('select#cg_location_id, select#cg_customer_group_id, #cg_date_range').change( function(){
                cg_report_table.ajax.reload();
            });
        })
    </script>
@endsection