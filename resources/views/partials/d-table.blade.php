<table id="d-tbl" class="table tb-style-1">
    <thead>
        <tr class="font-lime font-bold">
            <th scope="col">Draw</th>
            <th scope="col">Type</th>
            <th scope="col">Hits</th>
            <th scope="col">Hits Amount</th>
            <th scope="col">Gross</th>
            <th scope="col">Net</th>
            <th scope="col">A</th>
            <th scope="col">Sub Total</th>
            <th scope="col">B</th>
            <th scope="col">K/T</th>
        </tr>
    </thead>
    <tbody class="font-10">
        <tr data="l2">
            <td>
                <select name="draw">
                    <option value="-1">Draw</option>
                    @foreach($draws['hits']['d']['l2'] as $key => $val)
                        <option value="{{ $val }}" {{ count($daily_draw) && $key == $daily_draw->l2_d_draw ? 'selected' : '' }}>{{ $key }}</option>
                    @endforeach
                </select>
            </td>
            <td>L2</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="text-right">&nbsp;</td>
        </tr>
        <tr data="s3">
            <td>
                <select name="draw">
                    <option value="-1">Draw</option>
                    @foreach($draws['hits']['d']['s3'] as $key => $val)
                        <option value="{{ $val }}" {{ count($daily_draw) &&  $key == $daily_draw->s3_d_draw ? 'selected' : '' }}>{{ $key }}</option>
                    @endforeach
                </select>
            </td>
            <td>S3</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="text-right">&nbsp;</td>
        </tr>
        <tr data="p3">
            <td>
                <select name="draw">
                    <option value="-1">Draw</option>
                    @foreach($draws['hits']['d']['p3'] as $key => $val)
                        <option value="{{ $val }}" {{ count($daily_draw) &&  $key == $daily_draw->p3_d_draw ? 'selected' : '' }}>{{ $key }}</option>
                    @endforeach
                </select>
            </td>
            <td>P3</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="text-right">&nbsp;</td>
        </tr>
    </tbody>
</table>

<div class="row justify-content-end">
    <div class="col-1">
        <span class="font-15 font-bold">TOTAL:</span>
    </div>
    <div class="col-1">
        <span id="d-tbl-total" class="font-bold">0.00</span>
    </div>
</div>