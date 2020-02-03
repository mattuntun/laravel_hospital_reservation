<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/only_opening_rest_closing_time.css')}}">
</head>

<h2>現在1コマ当たり{{$possibleNumber}}人のネット予約が可能です</h2>

<h2>1コマの予約空席状況表示の条件を設定してください</h2> 

<br>
<br>

<table>
    <tr>
        <td style="white-space: nowrap;">
            <p class="term">予約可能数が</p>
        </td>
        <td>
        </td>
    <tr>
        <td style="white-space: nowrap;">
            <select name="doubleCircleReservationValue" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                @for($i = 60; $i <= 90; $i = $i + 10)
                <option value="{{$i}}">{{$i}}%</option>
                @endfor
                            </select>
        </td>
        <td style="white-space: nowrap;">
            <p class="term">以上の時&#x25CE;</p>
        </td>
    </tr>
    <tr>
        <td style="white-space: nowrap;">
            <select name="circleReservationValue" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                @for($i = 30; $i < 60; $i = $i + 10)
                <option value="{{$i}}">{{$i}}%</option>
                @endfor
                            </select>
        </td>
        <td style="white-space: nowrap;">
            <p class="term">以上◎未満の時〇</p>
        </td>
    </tr>
    <tr>
        <td style="white-space: nowrap;">
            <select name="triangleReservationValue" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                @for($i = 0; $i < 30; $i = $i + 10)
                <option value="{{$i}}">{{$i}}%</option>
                @endfor            </select>
        </td>
        <td style="white-space: nowrap;">
            <p class="term">以上〇未満の時△</p>
        </td>
    </tr>             
</table>
<h3>※△未満は×表記となります。</h3>