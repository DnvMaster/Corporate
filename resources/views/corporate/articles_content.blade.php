<div id="content-blog" class="content group">
	@if($getArticles)
		@foreach($getArticles as $article)	            
			<div class="sticky hentry hentry-post blog-big group">
				<div class="thumbnail">
					<h2 class="post-title"><a href="{{ route('articles.show',$article->id) }}">{{ $article->title}}</a></h2>
					<div class="image-wrap">
						<img src="{{ asset('corporate') }}/images/articles/{{ $article->images->max}}" alt="{{ $article->title}}" title="{{ $article->title}}">        
					</div>
					<p class="date">
						<span class="month">{{ $article->created_at->format('M') }}</span>
						<span class="day">{{ $article->created_at->format('d') }}</span>
					</p>
				</div>
				<div class="meta group">
					<p class="author"><span>by <a href="#" title="Posts by {{ $article->user->name }}" rel="author">{{ $article->user->name }}</a></span></p>
					<p class="categories"><span>In: <a href="{{ route('articles.category', $article->category->alias) }}" title="{{ __('View all posts in') }} {{ $article->category->title }}" rel="category tag">{{ $article->category->title }}</a></span></p>
					<p class="comments"><span><a href="{{ route('articles.show', $article->id) }}#respond" title="{{ __('Comment on Section shortcodes &amp; sticky posts!') }}">{{ count($article->comments) ? count($article->comments) : 0 }} {{ trans_choice('No comments',count($article->comments)) }}</a></span></p>
				</div>
				<div class="the-content group">
					<p>{!! $article->description !!}</p>
					<a href="{{ route('articles.show', $article->alias) }}" class="btn   btn-beetle-bus-goes-jamba-juice-4 btn-more-link">{{ __('Read more') }}</a></p>
				</div>
				<div class="clear"></div>
			</div>
		@endforeach
		<div class="general-pagination group">
			@if($getArticles->lastPage() > 1)
				@if($getArticles->currentPage() !== 1)
					<a href="{{ $getArticles->url($getArticles->currentPage() - 1) }}">{{ __('Previous') }}</a>
				@endif
				@for($i = 1; $i <= $getArticles->lastPage(); $i++)
					@if($getArticles->currentPage() == $i)
						<a class="selected disabled">{{ $i }}</a>
					@else
						<a href="{{ $getArticles->url($i) }}">{{ $i }}</a>
					@endif
				@endfor
				@if($getArticles->currentPage() !== 1)
					<a href="{{ $getArticles->url($getArticles->currentPage() + 1) }}">{{ __('Next') }}</a>
				@endif
			@endif
		</div>
		@else
		@include('corporate.articles_no')
	@endif
</div>