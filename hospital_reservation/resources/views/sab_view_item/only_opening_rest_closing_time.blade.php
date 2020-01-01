<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/only_opening_rest_closing_time.css')}}">
</head>

<h2>開院時間を設定してください</h2>
      

<div class = "setting">
    <table>
        <tr>
            <td>
                <select name="h_open_time" class="form-control" size="1" style="height: 100px; font-size: 32px;" >
                    <option disabled selected value>選択してください</option>
                    @for($oclock = 1; $oclock <= 24; $oclock++)                    
                        <option value="{{sprintf('%02d',$oclock)}}">{{$oclock}}時</option>                        
                    @endfor
                </select>
            </td>
            <td>
                <select name="m_open_time" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option disabled selected value>選択してください</option>
                    @for($min = 00; $min <= 50; $min = $min+10)                    
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
<!--開始　休診時間　開始-->

<h2>休診時間を設定してください</h2>     

<div class = "setting">
    <table>
        <tr>
            <td>
                <select name="h_rest_start" class="form-control" size="1" style="height: 100px; font-size: 32px;" >
                <option disabled selected value>選択してください</option>
                    @for($oclock = 1; $oclock <= 24; $oclock++)                    
                        <option value="{{sprintf('%02d',$oclock)}}">{{$oclock}}時</option>                        
                    @endfor
                </select>
            </td>
            <td>
                <select name="m_rest_start" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option disabled selected value>選択してください</option>
                    @for($min = 00; $min <= 50; $min = $min+10)                    
                        <option value="{{sprintf('%02d',$min)}}">{{$min}}分</option>                        
                    @endfor
                </select>    
            </td>
            <td>
                <p class="term">を休診開始時間</p>
            </td>             
        </tr>
        <tr>
            <td>
                <select name="h_rest_stop" class="form-control" size="1" style="height: 100px; font-size: 32px;" >
                    <option disabled selected value>選択してください</option>
                    @for($oclock = 1; $oclock <= 24; $oclock++)                    
                        <option value="{{sprintf('%02d',$oclock)}}">{{$oclock}}時</option>                        
                    @endfor
                </select>
            </td>
            <td>
                <select name="m_rest_stop" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option disabled selected value>選択してください</option>
                    @for($min = 00; $min <= 50; $min = $min+10)                    
                        <option value="{{sprintf('%02d',$min)}}">{{$min}}分</option>                        
                    @endfor
                </select>
            </td>
            <td>
                <p class="term">を休診終了時間</p>
            </td>             
        </tr>
    </table>
</div>
<!--終了　休診時間　終了-->
<!--開始　閉院時間　開始-->

<h2>閉院時間を設定してください</h2>  

<div class = "setting">
    <table>
        <tr>
            <td>
                <select name="h_close_time" class="form-control" size="1" style="height: 100px; font-size: 32px;" >
                    <option disabled selected value>選択してください</option>
                    @for($oclock = 1; $oclock <= 24; $oclock++)                    
                        <option value="{{sprintf('%02d',$oclock)}}">{{$oclock}}時</option>                        
                    @endfor
                </select>
            </td>
            <td>
                <select name="m_close_stop" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option disabled selected value>選択してください</option>
                    @for($min = 00; $min <= 50; $min = $min+10)                    
                        <option value="{{sprintf('%02d',$min)}}">{{$min}}分</option>                        
                    @endfor
                </select>
            </td>
            <td>
                <p class="term">を閉院時間</p>
            </td>             
        </tr>
    </table>
</div>

