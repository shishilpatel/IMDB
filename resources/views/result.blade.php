@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Search Movie</div>                
                <div class="card-body ">
                    <hgroup class="mb20">
                        <h1>Search Results</h1>                        
                    </hgroup>
                    @for($i = 0;$i< count($result);$i++)
                    <section class="col-xs-12 col-sm-6 col-md-12">
                        <article class="search-result row">
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <a href="#" title="{{$result[$i]['title']}}" class="thumbnail"><img src="{{$result[$i]['URL']}}" alt="" height="100px" width="100px" /></a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <ul class="meta-search">
                                    <li><i class="glyphicon glyphicon-calendar"></i> <span>{{$result[$i]['release_year']}}</span></li>                                    
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 excerpet">                                
                                <p>{{$result[$i]['genre']}}</p>						                                
                            </div>
                            <span class="clearfix borda"></span>
                        </article>
                    </section>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@endsection
