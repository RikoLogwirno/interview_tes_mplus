@extends('layout')

@section('title', 'Longest Prefix Which is Also Suffix')
@section('page_desc', 'Question in Number 2 by Riko Logwirno')

@section('main_content')

<div class="row">
    <div class="col-10 mx-auto table-responsive">

        <pre>
            <code>
                function preSu(teks) {

                    var total = 0;
                    var teksArr = teks.split("");
                    var teksArrL = teksArr.length;
                    var maxTeksSplit = teksArrL % 2 > 0 ? Math.floor(teksArrL / 2) : teksArrL / 2;
                    var suffix = "";
                    var prefix = "";
                    var prefixFound = "";
                    var suffixFound = "";

                    for( var i = 0; i < maxTeksSplit; i++ ) {
                        prefix += teksArr[i];
                        suffix += teksArr[teksArrL-i-1];
                        if( prefix == suffix.split("").reverse().join("") ) {
                            total = i+1;
                            prefixFound = prefix;
                            suffixFound = suffix.split("").reverse().join("");
                        }
                    }

                    return {total: total, prefixFound: prefixFound, suffixFound: suffixFound};

                }
                // Test:
                preSu('Lorem Ipsum Dolor Sit Lorem');
                // Result (JSON): {total: 5, prefixFound: "Lorem", suffixFound: "Lorem"}
            </code>
        </pre>

    </div>
</div>

@endsection
