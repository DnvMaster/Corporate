@if($articles)
	<div class="widget-first widget recent-posts">
		<h3>From our blog</h3>
		<div class="recent-post group">
			@foreach($articles as $article)
				<div class="hentry-post group">
					<div class="thumb-img">
						@if(!empty($article->images->mini))
							<img src="{{ asset('corporate/images/articles/'.$article->images->mini) }}" alt="{{ $article->title }}" title="{{ $article->title }}">
						@endif
					</div>
				    <div class="text">
				        <a href="{{ route('articles.show', $article->id) }}" title="{{ $article->title }}!" class="title">{{ $article->title }}</a>
				        <p class="post-date">{{ $article->created_at->diffForHumans() }}</p>
				    </div>
				</div>
			@endforeach
		</div>
	</div>
@endif       
<div class="widget-last widget text-image">
	<h3>Customer support</h3>
	<div class="text-image" style="text-align:left">
		<img src="{{ asset('corporate/images/callus.gif') }}" alt="Customer support" />
	</div>
	<p>Proin porttitor dolor eu nibh lacinia at ultrices lorem venenatis. Sed volutpat scelerisque vulputate. </p>
</div>