@extends('layout')

@section('title', 'Maximum Difference')
@section('page_desc', 'Question in Number 1 by Riko Logwirno')

@section('main_content')

<div class="row">
    <div class="col-10 mx-auto table-responsive">

        <pre>
            <code>
                function maxDiff(arr) {
                    var max_diff = arr[1] - arr[0];
                    for( i in arr ) {
                        if(!arr.hasOwnProperty(i)) continue;
                        for( j in arr ) {
                            var n = parseInt(j)+parseInt(i)+1;
                            if(!arr.hasOwnProperty(n)) continue;
                            max_diff = ( (arr[n]-arr[i]) > max_diff ) ? arr[n]-arr[i] : max_diff;
                        }
                    }
                    return max_diff;
                }
                // Test;
                maxDiff([7,9,5,8,3,2]);
                // Result: 3
            </code>
        </pre>

    </div>
</div>

@endsection
