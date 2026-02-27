<div id="content-single" class="content group">
	<div class="hentry hentry-post blog-big group ">
         @if($article)
		    <div class="thumbnail">
			    <h1 class="post-title">{{ $article->title }}</h1>
				<div class="image-wrap">
				    <img src="{{ asset('corporate') }}/images/articles/{{ $article->images->max }}" alt="{{ $article->title }}" title="{{ $article->title }}">
				</div>
				<p class="date">
				    <span class="month">{{ $article->created_at->format('M') }}</span>
				    <span class="day">{{ $article->created_at->format('d') }}</span>
				</p>
			</div>
			<div class="meta group">
				<p class="author"><span>{{ __('by') }}&nbsp;<a href="#" title="{{ $article->title }}" rel="author">{{ $article->user->name }}</a></span></p>
				<p class="categories"><span>{{ __('In') }}:&nbsp;<a href="{{ route('articles.category',['category'=>$article->category->title]) }}" title="{{ __('View all post in') }}&nbsp;{{ $article->category->title }}" rel="category tag">{{ $article->category->title }}</a></span></p>
				<p class="comments"><span><a href="#comments" title="{{ __('Comment on article') }}">{{ count($article->comments) ? count($article->comments) : 0 }} {{ trans_choice('No comments',count($article->comments)) }}</a></span></p>
		    </div>
			<div class="the-content single group">
                <p>{!! $article->text !!}</p>
			</div>
			<div class="clear"></div>
        @endif
	</div>

	<div id="comments">
		<h3 id="comments-title"><span>{{ count($article->comments) ? count($article->comments) : 0 }}&nbsp;</span>{{ trans_choice('No comments',count($article->comments)) }}</h3>
        @settings($comment, $article->comments->groupBy('parent_id'))
	    @if(count($article->comments) > 0)
            <ol class="commentlist group">
                @foreach($comment as $key => $comments)
                    @if($key !== 0)
                        @break
                    @endif
                    @include('corporate.comment',['items' => $comments])
                @endforeach
	        </ol>
        @endif
        <!-- START TRACKBACK & PINGBACK -->
		<h2 id="trackbacks">{{ __('Trackbacks and pingbacks') }}</h2>
		<ol class="trackbacklist"></ol>
		<p><em>{{ __('No trackback or pingback available for this article') }}</em></p>
        <!-- END TRACKBACK & PINGBACK -->
		<div id="respond">
			<h3 id="reply-title">{{ __('Leave a') }} & <span>{{ __('Reply') }}</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('Cancel reply') }}</a></small></h3>
			<form action="{{ route('comments.store') }}" method="post" id="commentform">
                @if(!Auth::check())
				    <p class="comment-form-author"><label for="author">{{ __('Name') }}</label> <input id="name" name="name" type="text" value="" size="30" aria-required="true"></p>
				    <p class="comment-form-email"><label for="email">{{ __('Email') }}</label> <input id="email" name="email" type="text" value="" size="30" aria-required="true"></p>
				    <p class="comment-form-url"><label for="url">{{ __('Website') }}</label><input id="url" name="domain" type="text" value="" size="30"></p>
				@endif
                <p class="comment-form-comment"><label for="comment">{{ __('Your comment') }}</label><textarea id="comment" name="text" cols="45" rows="8"></textarea></p>
				<div class="clear"></div>
				<p class="form-submit">
                    {{ csrf_field() }}
                    <input id="comment_post_ID" type="hidden" name="comment_post_ID" value="{{ $article->id }}">
                    <input id="comment_parent" type="hidden" name="comment_parent" value="0">
                    <input type="submit" id="submit" value="{{ __('Create')}}">
                </p>
                <div class="clear"></div>
			</form>
		</div>
	</div>
</div>
