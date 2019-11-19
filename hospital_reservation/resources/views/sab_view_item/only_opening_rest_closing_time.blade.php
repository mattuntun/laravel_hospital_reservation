<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/only_opening_rest_closing_time.css')}}">
</head>

<h2>開院時間を設定してください</h2>
<h2>適用させる場合は&#x2611;</h2>       

<div class="chkbox"><!--開始　chkbox　開始--> 
    <input type="checkbox" id="chkbox1" name="chkbox01" value="1" checked>
    <label for="chkbox1">以下の設定を適用する</label>
</div>

<div class = "setting">
    <table>
        <tr>
            <td>
                <select name="h-open-time1" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="0oclock">0時</option>
                    <option value="1oclock">1時</option>
                    <option value="2oclock">2時</option>
                    <option value="3oclock">3時</option>
                    <option value="4oclock">4時</option>
                    <option value="5oclock">5時</option>
                    <option value="6oclock">6時</option>
                    <option value="7oclock">7時</option>
                    <option value="8oclock">8時</option>
                    <option value="9oclock">9時</option>
                    <option value="10oclock">10時</option>
                    <option value="11oclock">11時</option>
                    <option value="12oclock">12時</option>
                    <option value="13oclock">13時</option>
                    <option value="14oclock">14時</option>
                    <option value="15oclock">15時</option>
                    <option value="16oclock">16時</option>
                    <option value="17oclock">17時</option>
                    <option value="18oclock">18時</option>
                    <option value="19oclock">19時</option>
                    <option value="20oclock">20時</option>
                    <option value="21oclock">21時</option>
                    <option value="22oclock">22時</option>
                    <option value="23oclock">23時</option>
                    <option value="24oclock">24時</option> 
                </select>
            </td>
            <td>
                <select name="m-open-time1" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="00min">00分</option>
                    <option value="10min">10分</option>
                    <option value="20min">20分</option>
                    <option value="30min">30分</option>
                    <option value="40min">40分</option>
                    <option value="50min">50分</option>
                    <option value="60min">60分</option>              
                </select>
            </td>
            <td>
                <p class="term">を開院時間</p>
            </td>             
        </tr>
    </table>

    <div class="chkbox"><!--開始　chkbox　開始--> 
        <input type="checkbox" id="chkbox2" name="chkbox02" value="2">
    <label for="chkbox2">以下の設定を適用する</label>
    </div>

    <table>
        <tr>
            <td>
                <select name="h-open-time2" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="0oclock">0時</option>
                    <option value="1oclock">1時</option>
                    <option value="2oclock">2時</option>
                    <option value="3oclock">3時</option>
                    <option value="4oclock">4時</option>
                    <option value="5oclock">5時</option>
                    <option value="6oclock">6時</option>
                    <option value="7oclock">7時</option>
                    <option value="8oclock">8時</option>
                    <option value="9oclock">9時</option>
                    <option value="10oclock">10時</option>
                    <option value="11oclock">11時</option>
                    <option value="12oclock">12時</option>
                    <option value="13oclock">13時</option>
                    <option value="14oclock">14時</option>
                    <option value="15oclock">15時</option>
                    <option value="16oclock">16時</option>
                    <option value="17oclock">17時</option>
                    <option value="18oclock">18時</option>
                    <option value="19oclock">19時</option>
                    <option value="20oclock">20時</option>
                    <option value="21oclock">21時</option>
                    <option value="22oclock">22時</option>
                    <option value="23oclock">23時</option>
                    <option value="24oclock">24時</option> 
                </select>
            </td>
            <td>
                <select name="m-open-time2" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                <option value="00min">00分</option>
                    <option value="10min">10分</option>
                    <option value="20min">20分</option>
                    <option value="30min">30分</option>
                    <option value="40min">40分</option>
                    <option value="50min">50分</option>
                    <option value="60min">60分</option>               
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
<h2>適用させる場合は&#x2611;</h2>       


<div class="chkbox"><!--開始　chkbox　開始--> 
    <input type="checkbox" id="chkbox3" name="chkbox03" value="3" checked>
    <label for="chkbox3">以下の設定を適用する</label>
</div>

<div class = "setting">
    <table>
        <tr>
            <td>
                <select name="h-rest-start1" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                   <option value="0oclock">0時</option>
                    <option value="1oclock">1時</option>
                    <option value="2oclock">2時</option>
                    <option value="3oclock">3時</option>
                    <option value="4oclock">4時</option>
                    <option value="5oclock">5時</option>
                    <option value="6oclock">6時</option>
                    <option value="7oclock">7時</option>
                    <option value="8oclock">8時</option>
                    <option value="9oclock">9時</option>
                    <option value="10oclock">10時</option>
                    <option value="11oclock">11時</option>
                    <option value="12oclock">12時</option>
                    <option value="13oclock">13時</option>
                    <option value="14oclock">14時</option>
                    <option value="15oclock">15時</option>
                    <option value="16oclock">16時</option>
                    <option value="17oclock">17時</option>
                    <option value="18oclock">18時</option>
                    <option value="19oclock">19時</option>
                    <option value="20oclock">20時</option>
                    <option value="21oclock">21時</option>
                    <option value="22oclock">22時</option>
                    <option value="23oclock">23時</option>
                    <option value="24oclock">24時</option> 
                </select>
            </td>
            <td>
                <select name="m-rest-start1" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="00min">00分</option>
                    <option value="10min">10分</option>
                    <option value="20min">20分</option>
                    <option value="30min">30分</option>
                    <option value="40min">40分</option>
                    <option value="50min">50分</option>
                    <option value="60min">60分</option>           
            </td>
            <td>
                <p class="term">を休診開始時間</p>
            </td>             
        </tr>
        <tr>
            <td>
                <select name="h-rest-stop1" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                   <option value="0oclock">0時</option>
                    <option value="1oclock">1時</option>
                    <option value="2oclock">2時</option>
                    <option value="3oclock">3時</option>
                    <option value="4oclock">4時</option>
                    <option value="5oclock">5時</option>
                    <option value="6oclock">6時</option>
                    <option value="7oclock">7時</option>
                    <option value="8oclock">8時</option>
                    <option value="9oclock">9時</option>
                    <option value="10oclock">10時</option>
                    <option value="11oclock">11時</option>
                    <option value="12oclock">12時</option>
                    <option value="13oclock">13時</option>
                    <option value="14oclock">14時</option>
                    <option value="15oclock">15時</option>
                    <option value="16oclock">16時</option>
                    <option value="17oclock">17時</option>
                    <option value="18oclock">18時</option>
                    <option value="19oclock">19時</option>
                    <option value="20oclock">20時</option>
                    <option value="21oclock">21時</option>
                    <option value="22oclock">22時</option>
                    <option value="23oclock">23時</option>
                    <option value="24oclock">24時</option> 
                </select>
            </td>
            <td>
                <select name="m-rest-stop1" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                   <option value="00min">00分</option>
                    <option value="10min">10分</option>
                    <option value="20min">20分</option>
                    <option value="30min">30分</option>
                    <option value="40min">40分</option>
                    <option value="50min">50分</option>
                    <option value="60min">60分</option>                 
                </select> 
            </td>
            <td>
                <p class="term">を休診終了時間</p>
            </td>             
        </tr>
    </table>

    <div class="chkbox"><!--開始　chkbox　開始--> 
        <input type="checkbox" id="chkbox4" name="chkbox04" value="4">
        <label for="chkbox4">以下の設定を適用する</label>
    </div>

    <table>
        <tr>
            <td>
                <select name="h-rest-start2" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="0oclock">0時</option>
                    <option value="1oclock">1時</option>
                    <option value="2oclock">2時</option>
                    <option value="3oclock">3時</option>
                    <option value="4oclock">4時</option>
                    <option value="5oclock">5時</option>
                    <option value="6oclock">6時</option>
                    <option value="7oclock">7時</option>
                    <option value="8oclock">8時</option>
                    <option value="9oclock">9時</option>
                    <option value="10oclock">10時</option>
                    <option value="11oclock">11時</option>
                    <option value="12oclock">12時</option>
                    <option value="13oclock">13時</option>
                    <option value="14oclock">14時</option>
                    <option value="15oclock">15時</option>
                    <option value="16oclock">16時</option>
                    <option value="17oclock">17時</option>
                    <option value="18oclock">18時</option>
                    <option value="19oclock">19時</option>
                    <option value="20oclock">20時</option>
                    <option value="21oclock">21時</option>
                    <option value="22oclock">22時</option>
                    <option value="23oclock">23時</option>
                    <option value="24oclock">24時</option>  
                </select>
            </td>
            <td>
                <select name="m-rest-start2" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="00min">00分</option>
                    <option value="10min">10分</option>
                    <option value="20min">20分</option>
                    <option value="30min">30分</option>
                    <option value="40min">40分</option>
                    <option value="50min">50分</option>
                    <option value="60min">60分</option>              
                </select>
            </td>
            <td>
                <p class="term">を休診開始時間</p>
            </td>             
        </tr>
        <tr>
            <td>
                <select name="h-rest-stop2" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="0oclock">0時</option>
                    <option value="1oclock">1時</option>
                    <option value="2oclock">2時</option>
                    <option value="3oclock">3時</option>
                    <option value="4oclock">4時</option>
                    <option value="5oclock">5時</option>
                    <option value="6oclock">6時</option>
                    <option value="7oclock">7時</option>
                    <option value="8oclock">8時</option>
                    <option value="9oclock">9時</option>
                    <option value="10oclock">10時</option>
                    <option value="11oclock">11時</option>
                    <option value="12oclock">12時</option>
                    <option value="13oclock">13時</option>
                    <option value="14oclock">14時</option>
                    <option value="15oclock">15時</option>
                    <option value="16oclock">16時</option>
                    <option value="17oclock">17時</option>
                    <option value="18oclock">18時</option>
                    <option value="19oclock">19時</option>
                    <option value="20oclock">20時</option>
                    <option value="21oclock">21時</option>
                    <option value="22oclock">22時</option>
                    <option value="23oclock">23時</option>
                    <option value="24oclock">24時</option> 
                </select>
            </td>
            <td>
                <select name="h-rest-stop2" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                   <option value="00min">00分</option>
                    <option value="10min">10分</option>
                    <option value="20min">20分</option>
                    <option value="30min">30分</option>
                    <option value="40min">40分</option>
                    <option value="50min">50分</option>
                    <option value="60min">60分</option>              
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
<h2>適用させる場合は&#x2611;</h2>       

<div class="chkbox"><!--開始　chkbox　開始--> 
    <input type="checkbox" id="chkbox5" name="chkbox05" value="5" checked>
    <label for="chkbox5">以下の設定を適用する</label>
</div>

<div class = "setting">
    <table>
        <tr>
            <td>
                <select name="h-close-time1" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="0oclock">0時</option>
                    <option value="1oclock">1時</option>
                    <option value="2oclock">2時</option>
                    <option value="3oclock">3時</option>
                    <option value="4oclock">4時</option>
                    <option value="5oclock">5時</option>
                    <option value="6oclock">6時</option>
                    <option value="7oclock">7時</option>
                    <option value="8oclock">8時</option>
                    <option value="9oclock">9時</option>
                    <option value="10oclock">10時</option>
                    <option value="11oclock">11時</option>
                    <option value="12oclock">12時</option>
                    <option value="13oclock">13時</option>
                    <option value="14oclock">14時</option>
                    <option value="15oclock">15時</option>
                    <option value="16oclock">16時</option>
                    <option value="17oclock">17時</option>
                    <option value="18oclock">18時</option>
                    <option value="19oclock">19時</option>
                    <option value="20oclock">20時</option>
                    <option value="21oclock">21時</option>
                    <option value="22oclock">22時</option>
                    <option value="23oclock">23時</option>
                    <option value="24oclock">24時</option> 
                </select>
            </td>
            <td>
                <select name="m-close-time1" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="00min">00分</option>
                    <option value="10min">10分</option>
                    <option value="20min">20分</option>
                    <option value="30min">30分</option>
                    <option value="40min">40分</option>
                    <option value="50min">50分</option>
                    <option value="60min">60分</option>                  
                </select>
            </td>
            <td>
                <p class="term">を閉院時間</p>
            </td>             
        </tr>
    </table>

    <div class="chkbox"><!--開始　chkbox　開始--> 
        <input type="checkbox" id="chkbox6" name="chkbox06" value="6">
        <label for="chkbox6">以下の設定を適用する</label>
    </div>

    <table>
        <tr>
            <td>
                <select name="h-close-time2" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="0oclock">0時</option>
                    <option value="1oclock">1時</option>
                    <option value="2oclock">2時</option>
                    <option value="3oclock">3時</option>
                    <option value="4oclock">4時</option>
                    <option value="5oclock">5時</option>
                    <option value="6oclock">6時</option>
                    <option value="7oclock">7時</option>
                    <option value="8oclock">8時</option>
                    <option value="9oclock">9時</option>
                    <option value="10oclock">10時</option>
                    <option value="11oclock">11時</option>
                    <option value="12oclock">12時</option>
                    <option value="13oclock">13時</option>
                    <option value="14oclock">14時</option>
                    <option value="15oclock">15時</option>
                    <option value="16oclock">16時</option>
                    <option value="17oclock">17時</option>
                    <option value="18oclock">18時</option>
                    <option value="19oclock">19時</option>
                    <option value="20oclock">20時</option>
                    <option value="21oclock">21時</option>
                    <option value="22oclock">22時</option>
                    <option value="23oclock">23時</option>
                    <option value="24oclock">24時</option> 
                </select>
            </td>
            <td>
                <select name="m-close-time2" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                    <option value="00min">00分</option>
                    <option value="10min">10分</option>
                    <option value="20min">20分</option>
                    <option value="30min">30分</option>
                    <option value="40min">40分</option>
                    <option value="50min">50分</option>
                    <option value="60min">60分</option>                 
                </select>
            </td>
            <td>
                <p class="term">を閉院時間</p>
            </td>             
        </tr>
    </table>
</div>

