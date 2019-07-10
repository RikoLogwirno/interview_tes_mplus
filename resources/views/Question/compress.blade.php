@extends('layout')

@section('title', 'Compress String')
@section('page_desc', 'Question in Number 3 by Riko Logwirno')

@section('main_content')

<div class="row">
    <div class="col-10 mx-auto table-responsive">

        <pre>
            <code>
                function stringCompressor(str) {

                    var strArr = str.split("");
                    var currentText = strArr[0];
                    var currentBit = 0;
                    var out = "";

                    for( var i = 0; i < strArr.length; i++ ) {

                        if( currentText == strArr[i] ) {
                            currentBit++;
                            if( (strArr.length-1) == i ) {
                                out += currentText;
                                out += ( currentBit == 1 ? "" : currentBit );
                            }
                        }
                        else {
                            out += currentText;
                            out += ( currentBit == 1 ? "" : currentBit );
                            currentText = strArr[i];
                            currentBit = 1;
                            if( (strArr.length-1) == i ) out += currentText;
                        }

                    }

                    return out;

                }
                // Test:
                stringCompressor("aaaaabbbbcccccccdaa")
                // Result: "a5b4c7da2"
            </code>
        </pre>

    </div>
</div>

@endsection
