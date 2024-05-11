<div class="pos-tab-content active">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('name',__('business.business_name') . ':*') !!}
                {!! Form::text('name', $business->name, ['class' => 'form-control', 'required',
                'placeholder' => __('business.business_name')]); !!}
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('start_date', __('business.start_date') . ' (Today) :') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    
                    {!! Form::hidden('start_date', @format_date($business->start_date), ['class' => 'form-control start-date-picker','placeholder' => __('business.start_date'), 'readonly']); !!}
                    {!! Form::text('start_date_bs', $bstime, ['class' => 'form-control start-date-picker_bs','placeholder' => __('business.start_date'), 'readonly']); !!}
                
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('default_profit_percent', __('business.default_profit_percent') . ':*') !!} @show_tooltip(__('tooltip.default_profit_percent'))
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    {!! Form::text('default_profit_percent', @num_format($business->default_profit_percent), ['class' => 'form-control input_number']); !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('currency_id', __('business.currency') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-money-bill-alt"></i>
                    </span>
                    {!! Form::select('currency_id', $currencies, $business->currency_id, ['class' => 'form-control select2','placeholder' => __('business.currency'), 'required']); !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('currency_symbol_placement', __('lang_v1.currency_symbol_placement') . ':') !!}
                {!! Form::select('currency_symbol_placement', ['before' => __('lang_v1.before_amount'), 'after' => __('lang_v1.after_amount')], $business->currency_symbol_placement, ['class' => 'form-control select2', 'required']); !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('time_zone', __('business.time_zone') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-clock"></i>
                    </span>
                    {!! Form::select('time_zone', $timezone_list, $business->time_zone, ['class' => 'form-control select2', 'required']); !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('business_logo', __('business.upload_logo') . ':') !!}
                    {!! Form::file('business_logo', ['accept' => 'image/*']); !!}
                    <p class="help-block"><i> @lang('business.logo_help')</i></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('fy_start_month', __('business.fy_start_month') . ':') !!} @show_tooltip(__('tooltip.fy_start_month'))
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    {!! Form::select('fy_start_month', $months, $business->fy_start_month, ['class' => 'form-control select2', 'required']); !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('fy_start_date', __('business.fy_start_date') . ':') !!} @show_tooltip(__('tooltip.fy_start_date'))
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    {!! Form::select('fy_start_date', $dates, $business->fy_start_date, ['class' => 'form-control select2', 'required']); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('accounting_method', __('business.accounting_method') . ':*') !!}
                @show_tooltip(__('tooltip.accounting_method'))
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calculator"></i>
                    </span>
                    {!! Form::select('accounting_method', $accounting_methods, $business->accounting_method, ['class' => 'form-control select2', 'required']); !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('transaction_edit_days', __('business.transaction_edit_days') . ':*') !!}
                @show_tooltip(__('tooltip.transaction_edit_days'))
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-edit"></i>
                    </span>
                    {!! Form::number('transaction_edit_days', $business->transaction_edit_days, ['class' => 'form-control','placeholder' => __('business.transaction_edit_days'), 'required']); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('date_format', __('lang_v1.date_format') . ':*') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                    {!! Form::select('date_format', $date_formats, $business->date_format, ['class' => 'form-control select2', 'required']); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('time_format', __('lang_v1.time_format') . ':*') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-clock"></i>
                    </span>
                    {!! Form::select('time_format', [12 => __('lang_v1.12_hour'), 24 => __('lang_v1.24_hour')], $business->time_format, ['class' => 'form-control select2', 'required']); !!}
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('currency_precision', __('lang_v1.currency_precision') . ':*') !!} @show_tooltip(__('lang_v1.currency_precision_help'))
                {!! Form::select('currency_precision', [0 =>0, 1=>1, 2=>2, 3=>3,4=>4], $business->currency_precision, ['class' => 'form-control select2', 'required']); !!}
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('quantity_precision', __('lang_v1.quantity_precision') . ':*') !!} @show_tooltip(__('lang_v1.quantity_precision_help'))
                {!! Form::select('quantity_precision', [0 =>0, 1=>1, 2=>2, 3=>3,4=>4], $business->quantity_precision, ['class' => 'form-control select2', 'required']); !!}
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('year_format', __('lang_v1.year_format') . ':*') !!} @show_tooltip(__('lang_v1.year_format_help'))
                {!! Form::select('year_format', ['AD' => 'AD', 'BS'=>'BS'], $business->year_format, ['class' => 'form-control select2', 'required']); !!}
            </div>
        </div>
    </div>
     {{-- code --}}
    <div class="row hide">
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('code_label_1', __('lang_v1.code_1_name') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('code_label_1', $business->code_label_1, ['class' => 'form-control']); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('code_1', __('lang_v1.code_1') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('code_1', $business->code_1, ['class' => 'form-control']); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('code_label_2', __('lang_v1.code_2_name') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('code_label_2', $business->code_label_2, ['class' => 'form-control']); !!}
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('code_2', __('lang_v1.code_2') . ':') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info"></i>
                    </span>
                    {!! Form::text('code_2', $business->code_2, ['class' => 'form-control']); !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row hide">
        <div class="col-sm-8">
            <div class="form-group">
                <label>
                    {!! Form::checkbox('common_settings[is_enabled_export]', true, !empty($common_settings['is_enabled_export']) ? true : false , 
                    [ 'class' => 'input-icheck']); !!} {{ __( 'lang_v1.enable_export' ) }}
                </label>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function getDaysOptionsOfMonth(month = 1, selDate = '01') {
        const year = new Date().getFullYear();
        const numMonth = Number(month);
        if (numMonth < 1 || numMonth > 12) {
            return;
        }

        const daysInMonth = new Date(year, numMonth, 0).getDate();

        return (new Array(daysInMonth).fill().reduce((pr, _, idx) => {
            const date = (idx + 1).toString().padStart(2, '0');
            pr += `<option value="${date}" ${selDate == date ? 'selected' : ''}>${date}</option>`;
            return pr;
        }, ''))
    }

    function fyStartMonthHandler() {
        const observer = new MutationObserver(function handleTextChange(mutationsList, observer) {
            const [mutation] = mutationsList;
            if (mutation && mutation.type === 'childList' && mutation.target.nodeType === 1) {
                const newTextContent = mutation.target.textContent.trim();
                let match;
                const fy_start_months = document.querySelectorAll('#fy_start_month option');
                for (let i = 0; i < fy_start_months.length; i++) {
                    if (fy_start_months[i]['textContent'] === newTextContent) {
                        match = fy_start_months[i]['value'];
                        break;
                    }
                }
                const fyStartDate = document.getElementById('fy_start_date').value;
                document.getElementById('fy_start_date').innerHTML = getDaysOptionsOfMonth(match, fyStartDate);
            }
        });
        observer.observe(document.getElementById('select2-fy_start_month-container'), {
            childList: true,
            characterData: true,
            subtree: true
        });
    }

    setTimeout(function() {
        const fyStartMonth = document.getElementById('fy_start_month').value;
        const fyStartDate = document.getElementById('fy_start_date').value;
        document.getElementById('fy_start_date').innerHTML = getDaysOptionsOfMonth(fyStartMonth, fyStartDate);
        fyStartMonthHandler();
    }, 1000);
</script>
