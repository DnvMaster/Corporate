<div class="widget-first widget recent-posts">
	@if($articles)
		<h3>{{ trans('ru.from_our_blog') }}</h3>
		<div class="recent-post group">
			@foreach ($articles as $article)
			    <div class="hentry-post group">
				    <div class="thumb-img">
						<img src="{{ asset(env('CORP')) }}/images/articles/{{ $article->img->mini }}" alt="{{ $article->title }}" title="{{ $article->title }}">
					</div>
				    <div class="text">
				        <a href="{{ route('articles.show',['alias'=>$article->alias]) }}" title="Section shortcodes &amp; sticky posts!" class="title">{{ $article->title }}</a>
				        <p class="post-date">{{ $article->created_at->format('d. F Y') }}</p>
				    </div>
				</div>
			@endforeach
		</div>
	@endif
</div>

<div class="widget-last widget text-image">
	<h3>{{ trans('ru.support_for_custom') }}</h3>
	<div class="text-image" style="text-align:left">
		<img src="{{ asset('corporate/images/callus.gif') }}" alt="Customer support">
	</div>
	<p>{{ trans('ru.text_client_rightbar') }}</p>
</div>
				            