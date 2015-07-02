@if (isset($forum_posters))
<div class="">
    @foreach($forum_posters as $user)
    <div class="forum-partials top-posters">
        <div class="avatar text-center">
            <img src="{{ array_get($user, 'avatar') }}" class="img-circle">
        </div>
        <div class="info col-md-8">
            <div class="row">
                <h4><a href="{{ array_get($user, 'href') }}">{{ array_get($user, 'screenname')}}</a></h4>
            </div>
            <div class="row">
                <p>Post Count: {{ array_get($user, 'post_count') }}</p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    @endforeach
</div>
@else
    <div class="alert alert-info">No Categories Found</div>
@endif