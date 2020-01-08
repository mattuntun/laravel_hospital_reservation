<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/only_opening_rest_closing_time.css')}}">
</head>

<h2>現在1コマ当たり{{$possibleNumber}}人のネット予約が可能です</h2>

<h2>1コマの予約空席状況表示の条件を設定してください</h2>       
<table>
    <tr>
        <td>
            <p class="term">予約可能数が</p>
        </td>
        <td>
        </td>
    <tr>
        <td>
            <select name="double_maru" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                <option disabled selected value>選択してください</option>
                @for($i = 1; $i <= 35; $i++)
                <option value="{{$i}}">{{$i}}人</option>
                @endfor
                            </select>
        </td>
        <td>
            <p class="term">以上の時◎</p>
        </td>
    </tr>
    <tr>
        <td>
            <select name="maru" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                <option disabled selected value>選択してください</option>
                @for($i = 1; $i <= 35; $i++)
                <option value="{{$i}}">{{$i}}人</option>
                @endfor
                            </select>
        </td>
        <td>
            <p class="term">以上◎未満の時〇</p>
        </td>
    </tr>
    <tr>
        <td>
            <select name="triangle" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                <option disabled selected value>選択してください</option>
                @for($i = 1; $i <= 35; $i++)
                <option value="{{$i}}">{{$i}}人</option>
                @endfor            </select>
        </td>
        <td>
            <p class="term">以上〇未満の時△</p>
        </td>
    </tr>             
</table>
<h3>※△未満は×表記となります。</h3>