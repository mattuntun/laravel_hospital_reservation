<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/only_opening_rest_closing_time.css')}}">
</head>

<h2>半日診療にする曜日を選択してください</h2>
<div class = "setting">
    <table>
        <tr>
            <td>
                <select name="half_week_day" class="form-control" size="1" style="height: 100px; font-size: 32px;" >
                    <option disabled selected value>選択してください</option>
                        <option value="7">半日診療設定なし</option>
                        <option value="0">日曜日</option>
                        <option value="1">月曜日</option>
                        <option value="2">火曜日</option>
                        <option value="3">水曜日</option>
                        <option value="4">木曜日</option>
                        <option value="5">金曜日</option>
                        <option value="6">土曜日</option>       
                </select>
            </td>
            <td style="white-space: nowrap;">
                <p class="term">を半日診療とする</p>
            </td>
        </tr>
    </table>
</div>

<div class = "setting">

<h2>半日診療での開院時間を設定してください</h2>

    <table>
        <tr>
            <td>
                <select name="half_h_open_time" class="form-control" size="1" style="height: 100px; font-size: 32px;" >
                    <option disabled selected value>選択してください</option>
                    @for($oclock = 1; $oclock <= 24; $oclock++)                    
                        <option value="{{sprintf('%02d',$oclock)}}">{{$oclock}}時</option>                        
                    @endfor
                </select>
            </td>
            <td>
                <select name="half_m_open_time" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option disabled selected value>選択してください</option>
                    @for($min = 00; $min <= 50; $min = $min+30)                    
                        <option value="{{sprintf('%02d',$min)}}">{{$min}}分</option>                        
                    @endfor
                </select>
            </td>
            <td>
                <p class="term">を開院時間</p>
            </td>             
        </tr>
    </table>
</div>

<!--終了　開院時間　終了-->
<!--開始　閉院時間　開始-->
<div class = "setting">

<h2>半日診療での閉院時間を設定してください</h2>  


    <table>
        <tr>
            <td>
                <select name="half_h_close_time" class="form-control" size="1" style="height: 100px; font-size: 32px;" >
                    <option disabled selected value>選択してください</option>
                    @for($oclock = 1; $oclock <= 24; $oclock++)                    
                        <option value="{{sprintf('%02d',$oclock)}}">{{$oclock}}時</option>                        
                    @endfor
                </select>
            </td>
            <td>
                <select name="half_m_close_stop" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option disabled selected value>選択してください</option>
                    @for($min = 00; $min <= 50; $min = $min+30)                    
                        <option value="{{sprintf('%02d',$min)}}">{{$min}}分</option>                        
                    @endfor
                </select>
            </td>
            <td>
                <p class="term">を閉院時間</p>
            </td>             
        </tr>
    </table>

    <br>
</div>

<!--終了　閉院時間　終了-->
