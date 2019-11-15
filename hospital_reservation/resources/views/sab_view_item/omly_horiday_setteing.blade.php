<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/only_horiday_setting.css')}}">
</head>
<div class = "close-setting">
<h2>適用させる場合は&#x2611;</h2>       
    <table>
        <tr>
            <td>
                <!--セレクトボックスの形態 size="2"以上にするとリスト形式-->
                <!--セレクトボックスの形態 ブートストラップによってclass="form-control"で画面いっぱい-->
                <select name="close_week" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="毎週">毎週</option>
                    <option value="第１">第１</option>
                    <option value="第１＆第２">第１＆第２</option>
                    <option value="第１＆第３">第１＆第３</option>
                    <option value="第１＆第４">第１＆第４</option>
                    <option value="第１＆第５">第１＆第５</option>
                    <option value="第２">第２</option>
                    <option value="第２＆第３">第２＆第３</option>
                    <option value="第２＆第４">第２＆第４</option>
                    <option value="第２＆第５">第２＆第５</option>
                    <option value="第３">第３</option>
                    <option value="第３＆第４">第３＆第４</option>
                    <option value="第３＆第５">第３＆第５</option>
                    <option value="第４">第４</option>
                    <option value="第４＆第５">第４＆第５</option>
                    <option value="第５">第５</option>
                </select>
            </td>
            <td>
                <!--セレクトボックスの形態 size="2"以上にするとリスト形式-->
                <!--セレクトボックスの形態 ブートストラップによってclass="form-control"で画面いっぱい-->
                <select name="close_day" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value=”日曜日”>日曜日</option>
                    <option value="月曜日">月曜日</option>
                    <option value="火曜日">火曜日</option>
                    <option value="水曜日">水曜日</option>
                    <option value="木曜日">木曜日</option>
                    <option value="金曜日">金曜日</option>
                    <option value="土曜日">土曜日</option>              
                </select>
            </td>
            <td>
                <p></p>
            </td>             
        </tr>
        <tr>
            <td>
                <select name="close_time_start" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="0：00~">0：00~</option>
                    <option value="1：00~">1：00~</option>
                    <option value="2：00~">2：00~</option>
                    <option value="3：00~">3：00~</option>
                    <option value="4：00~">4：00~</option>
                    <option value="5：00~">5：00~</option>
                    <option value="6：00~">6：00~</option>
                    <option value="7：00~">7：00~</option>
                    <option value="8：00~">8：00~</option>
                    <option value="9：00~">9：00~</option>
                    <option value="10：00~">10：00~</option>
                    <option value="11：00~">11：00~</option>
                    <option value="12：00~">12：00~</option>
                    <option value="13：00~">13：00~</option>
                    <option value="14：00~">14：00~</option>
                    <option value="15：00~">15：00~</option>
                    <option value="16：00~">16：00~</option>
                    <option value="17：00~">17：00~</option>
                    <option value="18：00~">18：00~</option>
                    <option value="19：00~">19：00~</option>
                    <option value="20：00~">20：00~</option>
                    <option value="21：00~">21：00~</option>
                    <option value="22：00~">22：00~</option>
                    <option value="23：00~">23：00~</option>
                    <option value="24：00~">24：00~</option>
                </select>
            </td>
            <td>        
                <select name="close_time_end" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="0：00">0：00</option>
                    <option value="1：00">1：00</option>
                    <option value="2：00">2：00</option>
                    <option value="3：00">3：00</option>
                    <option value="4：00">4：00</option>
                    <option value="5：00">5：00</option>
                    <option value="6：00">6：00</option>
                    <option value="7：00">7：00</option>
                    <option value="8：00">8：00</option>
                    <option value="9：00">9：00</option>
                    <option value="10：00">10：00</option>
                    <option value="11：00">11：00</option>
                    <option value="12：00">12：00</option>
                    <option value="13：00">13：00</option>
                    <option value="14：00">14：00</option>
                    <option value="15：00">15：00</option>
                    <option value="16：00">16：00</option>
                    <option value="17：00">17：00</option>
                    <option value="18：00">18：00</option>
                    <option value="19：00">19：00</option>
                    <option value="20：00">20：00</option>
                    <option value="21：00">21：00</option>
                    <option value="22：00">22：00</option>
                    <option value="23：00">23：00</option>
                    <option value="24：00">24：00</option>
                </select>
            </td>
            <td>
                <p class="close_term">を休診設定</p>
            </td>
        </tr>  
    </table>
</div>