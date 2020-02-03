<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // カタカナのみ受け付ける
        \Validator::extend( "kana", function ($attribute, $value, $parameters, $validator){
            // 参考
            // http://pentan.info/php/reg/is_kana.html
            // http://aspiration.sakura.ne.jp/wiki/index.php?develop%2FUTF-8%E3%81%B2%E3%82%89%E3%81%8C%E3%81%AA%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A%E8%A1%A8
            // http://orange-factory.com/sample/utf8/code3-ef.html
            // \xef\xbc[\x90-\x99] => 全角数字
            // \xe3\x82[\xa1-\xbf]|\xe3\x83[\x80-\xbe] => カタカナ
            // \xef\xbd[\xa6-\xbf]|\xef\xbe[\x80-\x9f] => ｦ -> ﾟ の半角カタカナ
            //(\xe3\x82[\xa1-\xbf]) # カタカナ
            //|(\xe3\x83[\x80-\xbe]) # カタカナ
            //|(\xef\xbc[\x90-\x99]) # 全角数字
            //|(\xe3\x80\x80)   # 全角スペース
            $regex = '{^(
                (\xef\xbd[\xa6-\xbf]) # 半角カタカナ
                |(\xef\xbe[\x80-\x9f]) # 半角カタカナ
                |[0-9a-zA-Z ]     # 半角英数字空白
            )+$}x';
            $result = preg_match( $regex, $value, $match );
            if ($result === 1) {
                return true;
            }

            return false;
        } );
    }
}
