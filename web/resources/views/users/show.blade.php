@extends('home')

@section('content')

    @include('pages.partials.navigation')


    <div class="container" id="Public-Profile-Main-Container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card hovercard">
                    <div class="cardheader">
                    </div>
                    <div class="avatar">
                        @foreach ($publicName->Profilephotos as $photo)
                            <img alt="{{ $publicName->username }}'s зураг" src="/travel/{{ $photo->thumbnail_path }}">
                        @endforeach
                    </div><br><br><br>
                    <div class="info">
                        <div class="title">
                            <a target="_blank">{{ $publicName->username }}</a>
                        </div>
                        <div class="desc" id="Public-Flyer-Person-Description">
                            @if ($publicName->summary == '')
                                <p>{{ $publicName->username }} өөрийнхөө тухай мэдээлэл оруулаагүй байна.</p>
                            @else
                                {{ $publicName->summary }}
                            @endif
                        </div>
                    </div>
                    <div class="bottom">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12" id="Public-Profile-Users-Flyers-Container">
            <h4 id="Public-Profile-Header">{{ $publicName->username }}ий оруулсан ажлын саналууд</h4><hr>
            @foreach($ProfileJobs as $public)
                <div class="col-sm-6 col-md-4" id="card-center">
                    <div class="row">
                        <div class="ui link cards" id="Travel-Flyer-Display-Cards">
                            <div class="card" id="Flyer-Card">
                                <div class="image">
                                    <a href="{{ route('jobs.show', $public->title) }}">
                                        @foreach ($public->bannerPhotos as $photo)
                                            <img src="/{{ $photo->thumbnail_path }}" alt="{{ $publicName->username }}" data-id="{{ $photo->id }}">
                                        @endforeach
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="{{ route('jobs.show', $public->title) }}">
                                        <h4 class="ui header"> {{ str_limit($public->title, $limit = 80, $end = '...') }}</h4>
                                    </a>
                                    <div class="description">
                                        By: {{ $publicName->username }}
                                    </div><br>
                                    <div class="meta">
                                        <a>{{ str_limit($public->excerpt, $limit = 79, $end = '...') }}</a>
                                    </div>
                                </div>
                                <div class="extra content">
                                    <span class="right floated">
                                        {{ prettyDate($public->created_at) }}
                                    </span>
                                    <span>
                                        <i class="thumbs up icon"></i>{{ $public->likes->count() }}&nbsp;
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>  <!-- close col-md-12 -->

    </div>  <!-- close container -->

    <div class="container" id="Public-Profile-Badges-Container">
        <br>
        <div class="col-md-12" id="badges-container">
            @include('users.partials.public-badges')
        </div>

        <br>
        <a href="{{ URL::previous() }}"><button class="ui inverted red button">Буцах</button></a>
        <a href="{{ route('jobs.index') }}"><button class="ui inverted green button">Бүх ажил</button></a>

        <div class="col-md-12">
            @include('users.partials.status')
        </div>

    </div>  <!-- close container -->

@stop
