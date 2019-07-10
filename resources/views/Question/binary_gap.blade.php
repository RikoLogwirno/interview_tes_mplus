@extends('layout')

@section('title', 'Binary Gap')
@section('page_desc', 'Question in Number 4 by Riko Logwirno')

@section('main_content')

<div class="row">
    <div class="col-10 mx-auto table-responsive">

        <pre>
            <code>
                function binGap(num) {

                    var gap = 0;
                    var bin = num.toString(2);
                    var binArr = bin.split("");
                    var foundIndex = 0;

                    for(var i = 0; i < binArr.length; i++) {
                        if(binArr[i] == "1") {
                            gap = (i - foundIndex - 1) >= gap ? (i - foundIndex - 1) : gap;
                            foundIndex = i;
                        }
                    }

                    return gap;

                }
                // Test using iteration:
                [1, 2, 147, 483, 647].forEach(function(v, k) {
                    console.log(binGap(v));
                })
                // Result for each iteration separated by comma: 0, 0, 2, 3, 4
            </code>
        </pre>

    </div>
</div>

@endsection
