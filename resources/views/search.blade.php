<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form method="get" action="{{ route('search.result') }}" class="form-inline mr-auto">
                <input type="text" name="query" value="{{ isset($searchterm) ? $searchterm : ''  }}" class="form-control col-sm-8"  placeholder="Search events or blog posts..." aria-label="Search">
                <button class="btn aqua-gradient btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
            </form>
            <br>
            @if(isset($searchResults))
                @if ($searchResults-> isEmpty())
                    <h2>Sorry, no results found for the term <b>"{{ $searchterm }}"</b>.</h2>
                @else
                    <h2>There are {{ $searchResults->count() }} results for the term <b>"{{ $searchterm }}"</b></h2>
                    <hr />
                    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                        <h2>{{ ucwords($type) }}</h2>

                        @foreach($modelSearchResults as $searchResult)
                            <ul>
                                <a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a>
                            </ul>
                        @endforeach
                    @endforeach
                @endif
            @endif
        </div>
    </div>
</div>
</body>
</html>
