<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/only_opening_rest_closing_time.css')}}">
</head>

<h2>予約1コマあたりの予約可能人数を設定してください</h2>


<br> <!--チェックボックスとh2のスペース-->        

 
    
    <h3><b>以下の設定を適用する</b></h3>


<table>
    <tr>
        <td>
            <p class="term">予約1コマあたり</p>
        </td>
        <td>
            <select name="possible_number" class="form-control" size="1" style="height: 100px; font-size: 32px;" >
                    <option disabled selected value>選択してください</option>
                    @for($oclock = 1; $oclock <= 35; $oclock++)                    
                        <option value="{{$oclock}}">{{$oclock}}人</option>                        
                    @endfor
        </td>
        <td>
            <p class="term">予約可能</p>
        </td>             
    </tr>
</table>

