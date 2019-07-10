@extends('layout')

@section('title', 'Self Numbers')
@section('page_desc', 'Question in Number 5 by Riko Logwirno')

@section('main_content')

<div class="row">
    <div class="col-10 mx-auto table-responsive">

        <pre>
            <code>
                function selfNumber(maxRange) {

                    var allNumArr = [];
                    var normalNumArr = [];
                    var selfNum = [];
                    var totalSelfNum = 0;

                    // Cari angka normal
                    for(var i = 1; i <= maxRange; i++){

                        allNumArr.push(i);
                        var breakNumStr = i.toString().split("");
                        var breakNumDigitSum = 0;

                        // Jumlahkan tiap digit
                        breakNumStr.forEach(function(v, k){
                            breakNumDigitSum += parseInt(v);
                        });
                        normalNumArr.push(i+breakNumDigitSum);

                    }

                    // Ambil angka self number saja
                    selfNum = allNumArr.filter(function(i) {
                        return normalNumArr.indexOf(i) < 0;
                    });

                    for(var i = 0; i < selfNum.length; i++) {
                        totalSelfNum += selfNum[i];
                    }
                    return totalSelfNum;
                }
                // Test, you can type in any Integer number you want:
                selfNumber(5000);
                // Result: 1227365
            </code>
        </pre>

    </div>
</div>

@endsection
