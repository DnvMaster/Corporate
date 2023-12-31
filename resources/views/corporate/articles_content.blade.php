<div id="content-blog" class="content group">
    @if($articles)
        @foreach($articles as $article)
            <div class="hentry hentry-post blog-big group">
                <!-- post featured & title -->
                <div class="thumbnail">
                    <!-- post title -->
                    <h2 class="post-title"><a href="{{ route('articles.show',['alias' => $article->alias]) }}">{!! $article->title !!}</a></h2>
                    <!-- post featured -->
                    <div class="image-wrap">
                        <img src="{{ asset(env('MASTER')) }}/images/articles/{{ $article->img->max }}" alt="{!! $article->title !!}" title="{!! $article->title !!}" />
                    </div>
                    <p class="date">
                        <span class="month">{{ $article->created_at->format('M') }}</span>
                        <span class="day">{{ $article->created_at->format('d') }} </span>
                    </p>
                </div>
                <!-- post meta -->
                <div class="meta group">
                    <p class="author"><span>by <a href="#" title="{{ $article->title }}" rel="author">{{ $article->user->name }}</a></span></p>
                    <p class="categories"><span>In: <a href="{{ route('articlesCat',['cat_alias'=>$article->category->alias]) }}" title="View all posts in {{ $article->category->title }}" rel="category tag">{{ $article->category->title }}</a>
                    <p class="comments"><span><a href="{{ route('articles.show',['alias'=>$article->alias]) }}#respond" title="{{ $article->title }}">{{ count($article->comments) ? count($article->comments) : '0' }} {{ Lang:: choice('russian.comments',count($article->comments)) }}</a></span></p>

                </div>
                <!-- post content -->
                <div class="the-content group">
                    <p>{!! $article->desc !!}</p>
                    <p><a href="{{ route('articles.show',['alias'=>$article->alias]) }}" class="btn   btn-beetle-bus-goes-jamba-juice-4 btn-more-link">→ Read more</a></p>
                </div>
                <div class="clear"></div>
            </div>
        @endforeach
        <div class="general-pagination group"><a href="#" class="selected">1</a><a href="#">2</a><a href="#">&rsaquo;</a></div>
    @endif
</div>
