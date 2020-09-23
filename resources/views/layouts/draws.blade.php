@extends('layouts.base')

@section('db-content')
    <div class="container-fluid font-regular form-wrap">
        <div class="row justify-content-end">
            <div class="col-3">
                <input type="text" autocomplete="off" class="form-control-1 form-rounded form-input-1 font-16 datepicker" placeholder="Select Draw Date" value="{{ isset($_GET['date']) ? $_GET['date'] : date('Y-m-d') }}" />
            </div>
        </div>
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#time-d" aria-controls="timeDTab" role="tab" data-toggle="tab">D</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#time-m" aria-controls="timeMTab" role="tab" data-toggle="tab">M</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#time-md" aria-controls="timeMDTab" role="tab" data-toggle="tab">MD</a>
            </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="time-d">
                    <div class="container-fluid">
                        @include('partials.d-table')
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="time-m">
                    <div class="container-fluid">
                        @include('partials.m-table')
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="time-md">
                    <div class="container-fluid">
                        @include('partials.md-table')
                    </div>
                </div>
            </div>
        </div>

        <form id="draw-form" method="post" action="/draws/save">
            {{ csrf_field() }}
            <input type="hidden" name="draw-date" value="" />
            <input type="hidden" name="l2_d_draw" value="" />
            <input type="hidden" name="s3_d_draw" value="" />
            <input type="hidden" name="p3_d_draw" value="" />

            <input type="hidden" name="l2_m_draw" value="" />
            <input type="hidden" name="s3_m_draw" value="" />
            <input type="hidden" name="p3_m_draw" value="" />

            <input type="hidden" name="l2_md_draw" value="" />
            <input type="hidden" name="s3_md_draw" value="" />
            <input type="hidden" name="p3_md_draw" value="" />

            @include('partials.saveinfo')
        </form>
    </div>
   
    
    <script type="text/javascript">
        var hitval = {
            'l2': 75,
            's3': 550
        };

        var gross_arr = {
            'l2': {
                'd': parseInt("{{ $draws['gross']['d']['l2'] }}"), 
                'm': parseInt("{{ $draws['gross']['m']['l2'] }}"), 
                'md': parseInt("{{ $draws['gross']['md']['l2'] }}")
            },
            's3': {
                'd': parseInt("{{ $draws['gross']['d']['s3'] }}"), 
                'm': parseInt("{{ $draws['gross']['m']['s3'] }}"), 
                'md': parseInt("{{ $draws['gross']['md']['s3'] }}")
            },
            'p3': {
                'd': parseInt("{{ $draws['gross']['d']['p3'] }}"), 
                'm': parseInt("{{ $draws['gross']['m']['p3'] }}"), 
                'md': parseInt("{{ $draws['gross']['md']['p3'] }}")
            } 
        };

        $(document).ready(function() {
            $('#d-tbl tbody tr').each(function() { calc($(this)); });
            $('#m-tbl tbody tr').each(function() { calc($(this)); });
            $('#md-tbl tbody tr').each(function() { calc($(this)); });

            $('.datepicker').change(function() {
                location.href = '?date=' + $(this).val();
            });

            $('#draw-form').submit(function(e) {
                $('input[name="draw-date"]').val($('.datepicker').val());
                save('d-tbl', 2);
                save('m-tbl', 5);
                save('md-tbl', 8);
            });
        });

        $('#d-tbl select[name="draw"], #m-tbl select[name="draw"], #md-tbl select[name="draw"]').change(function() {
            calc($(this).parents('tr'));
        });

        function save(table_id, offset) {
            $('#' + table_id + ' tbody tr').each(function() {
                let draw = $('td:eq(0) select option:selected', this).text();
                if (draw == 'Draw') draw = -1;
                $('input:eq(' + offset++ + ')', '#draw-form').val(draw);
            });
        }

        function calc(tr) {
            let hits = $('select[name="draw"]', tr).val();

            if (hits == -1) {
                clearRow(tr);
                return;
            }

            let dtime = tr.parents('table').attr("id").split('-')[0];
            let draw_type = tr.attr('data');
            let hit_amount = hits * hitval[draw_type];
            let gross = gross_arr[draw_type][dtime];

            $('td:eq(2)', tr).html(hits);
            $('td:eq(3)', tr).html(formatNumber(hit_amount));
            $('td:eq(4)', tr).html(formatNumber(gross));

            let net = gross - (gross * 0.25);
            $('td:eq(5)', tr).html(formatNumber(net));
            
            let A = gross * 0.0333;
            $('td:eq(6)', tr).html(formatNumber(A));

            let total = (net - A) - hit_amount;
            let subtotal = formatNumber(total);

            $('td:eq(7)', tr).html(subtotal);
            $('td:eq(9)', tr).html(subtotal);

            if (total < 0) {
                $('td:eq(7)', tr).addClass('font-red-1');
                $('td:eq(9)', tr).addClass('font-red-1');
            } else {
                $('td:eq(7)', tr).removeClass('font-red-1');
                $('td:eq(9)', tr).removeClass('font-red-1');
            }

            calcTotal();
        }

        function formatNumber(num) {
            num = num.toFixed(2);
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        function clearRow(tr) {
            $('td:eq(2)', tr).html(0);
            for (let i = 3; i <= 9; ++i) {
                $('td:eq('+ i + ')', tr).html(0.00);
            }

            $('td:eq(7)', tr).removeClass('font-red-1');
            $('td:eq(9)', tr).removeClass('font-red-1');

            calcTotal();
        }

        function calcTotal() {
            let tables = ['d-tbl', 'm-tbl', 'md-tbl'];

            for (let k in tables) {
                let total = 0;

                $('#' + tables[k] + ' tbody tr').each(function() { 
                    let kt = $('td:eq(9)', this).html().replace(',', '');
                    total += parseFloat(kt);
                });

                $('#' + tables[k] + '-total').html(formatNumber(total));

                if (total < 0) {
                    $('#' + tables[k] + '-total').addClass('font-red-1');
                } else {
                    $('#' + tables[k] + '-total').removeClass('font-red-1');
                }
            }
        }
    </script>
@stop