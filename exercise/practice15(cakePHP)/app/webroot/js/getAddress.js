//XMLHttpRequestオブジェクトを取得するためのユーザ定義関数;
function getXHR() {
    var req;
    try {                
        req = new XMLHttpRequest();
    } catch (e) {               
        try {
            new ActiveXObject('Msxml2.XMLHTTP');
        } catch (e) {
            new ActiveXObject('Microsoft.XMLHTTP');
        }
    }
    return req;
}

//郵便番号検索ボタンクリック時の実行されるイベントハンドラ
function asyncSend() {
    var req = getXHR();
    //非同期通信時の処理（コールバック関数）を定義
    req.onreadystatechange = function () {
        var result = document.getElementById('result');
        //console.log(2);

        var pref = document.getElementById('pref');
        var city = document.getElementById('city');
        var add1 = document.getElementById('add1');

        if (req.readyState == 4) {//通信の完了時
            //alert(3);
            if (req.status == 200) {//通信が成功したとき
                //alert(4);
                var data = JSON.parse(req.responseText); 
                //console.log(data[0].pref_name);
                pref.value = data[0].Zipcode.pref_name;
                city.value = data[0].Zipcode.city_name;
                add1.value = data[0].Zipcode.add_name;
                result.innerHTML = "";
            } else {//通信が失敗したとき
                //alert(5);
                result.innerHTML ='サーバーエラーが発生しました。';
            }
        } else {// 通信が完了する前
            //alert(6);
            result.innerHTML ='通信中・・・';
        }
    }

    // サーバとの非同期通信を開始
    req.open('GET', 'getzip?zipcode='+
             encodeURIComponent(document.getElementById('zipcode').value), true);
    //alert(8);
    req.send(null);
}
