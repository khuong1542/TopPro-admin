<table class="table table-bordered table-striped">
    <colgroup>
        <col width="5%">
        <col width="40%">
        <col width="40%">
        <col width="15%">
    </colgroup>
    <thead class="thead-light">
        <th>STT</th>
        <th colspan="2">Chức năng</th>
        <th>#</th>
    </thead>
    <tbody>
        @if(isset($datas) && count($datas) > 0)
        @php $i = 0; @endphp
        @foreach($datas as $key => $value)
        <tr>
            <td align="center">{{ ++$i }}</td>
            <!-- Tồn tại mục con -->
            @if(isset($value['child']) && !empty($value['child']))
            <td rowspan="{{ count($value['child']) }}">{{ $value['name'] }}</td>
            @php
            $vChild = array_splice( $value['child'], 0, 1 );
            $kChild = key($vChild);
            @endphp
            <td>{{ $vChild[key($vChild)]['name'] }}</td>
            <td align="center">
                <button type="button" id="btn_{{ $vChild[key($vChild)]['code'] }}" class="btn btn-primary" onclick="updateData('{{ $key }}', '{{ $kChild }}')">Cập nhật</button>
            </td>
            <!-- Hết Tồn tại mục con -->
            @else
            <td colspan="2">{{ $value['name'] }}</td>
            <td align="center">
                <button type="button" id="btn_{{ $value['code'] }}" class="btn btn-primary" onclick="updateData('{{ $key }}')">Cập nhật</button>
            </td>
            @endif
        </tr>
        <!-- Tồn tại mục con -->
        @if(isset($value['child']) && !empty($value['child']))
        @foreach($value['child'] as $keyChild => $child)
        <tr>
            <td align="center">{{ ++$i }}</td>
            <td>
                <div class="row">
                    <span class="col-md-6">{{ $child['name'] }}</span>
                    <span class="col-md-6 option_{{ $child['code'] }}">
                        @if(isset(${$child['code']}) && $child['code'] != 'DM_PHUONG_XA')
                        <select name="listtype_id" id="listtype_id" class="form-control chzn-select">
                            <option value="">--Chọn--</option>
                            @foreach(${$child['code']} as $danhmuc)
                            <option value="{{ $danhmuc['id'] }}">{{ $danhmuc['name'] }}</option>
                            @endforeach
                        </select>
                        @endif
                    </span>
                </div>
            </td>
            <td align="center">
                <button type="button" id="btn_{{ $child['code'] }}" class="btn btn-primary" onclick="updateData('{{ $key }}', '{{ $keyChild }}')">Cập nhật</button>
            </td>
        </tr>
        @endforeach
        @endif
        <!-- Hết Tồn tại mục con -->
        @endforeach
        @endif
    </tbody>
</table>