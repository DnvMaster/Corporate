<div class="widget-first widget recent-posts">
	<h3>{{ __('Recent posts') }}</h3>
	<div class="recent-post group">
        @if(!$getPortfolios->isEmpty())
            @foreach($getPortfolios as $portfolio)
                <div class="hentry-post group">
                    <div class="thumb-img">
                        <img style="width: 55px" src="{{ asset('corporate') }}/images/projects/{{ $portfolio->images->mini }}" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}">
                    </div>
                    <div class="text">
                        <a href="{{ route('articles.show',$portfolio->id) }}" title="{{ $portfolio->title }}" class="title">{{ $portfolio->title }}</a>
                        <p>{{ str($portfolio->text)->limit(120) }}</p>
                        <a class="read-more" href="{{ route('articles.show',$portfolio->id) }}">{{ __("Read more")}}</a>
                    </div>
                </div>
            @endforeach
        @endif
	</div>
</div>
@if(!$getComments->isEmpty())
	<div class="widget-last widget recent-comments">
		<h3>{{ __('Recent Comments') }}</h3>
		<div class="recent-post recent-comments group">
			@foreach($getComments as $comment)
				<div class="the-post group">
				    <div class="avatar">
						@settings($hash, ($comment->email) ? md5($comment->email) : $comment->user->email)
						<img  class="avatar" src="https://gravatar.com/avatar/{{ $hash}}?d=mm&s=55" alt="{{ $comment->name }}">   
				    </div>
				    <span class="author"><strong><a href="#">{{ isset($comment->user) ? $comment->user->name : $comment->name }}</a></strong> in</span> 
				    <a class="title" href="{{ route('articles.show', $comment->article->id ) }}">{{ $comment->article->title }}</a>
				    <p class="comment">
                    	 {{ $comment->text }} <a class="goto" href="{{ route('articles.show', $comment->article->id ) }}">&#187;</a>
                    </p>
				</div>
			@endforeach
		</div>
	</div>
@endif