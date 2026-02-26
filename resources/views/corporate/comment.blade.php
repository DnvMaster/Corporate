@foreach($items as $item)
    <li id="li-comment-{{ $item->id }}" class="comment even {{ ($item->user_id == $article->user_id) ? 'bypostauthor odd' : '' }}">
        <div id="comment-{{ $item->id }}" class="comment-container">
            <div class="comment-author vcard">
                @settings($hash,isset($item->email) ? md5($item->email) : md5($item->user->email))
                <img alt="{{ $item->user->name ?? $item->name }}" src="https://gravatar.com/avatar/{{ $hash}}?d=mm&s=75" class="avatar" height="75" width="75">
                <cite class="fn">{{ $item->user->name ?? $item->name }}</cite>
            </div>
            <div class="comment-meta commentmetadata">
                <div class="intro">
                    <div class="commentDate">
                        <a href="#comment-2">{{ is_object($item->created_at) ? $item->created_at->format('F d, Y \a\t H:i') : '' }}</a>
                    </div>
                    <div class="commentNumber"># </div>
                </div>
                <div class="comment-body">
                    <p>{!! $item->text !!}</p>
                </div>
                <div class="reply group">
                    <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{ $item->id }}&quot;, &quot;{{ $item->id }}&quot;, &quot;respond&quot;, &quot;{{ $item->article_id }}&quot;)">{{ __('Reply') }}</a>
                </div>
            </div>
        </div>
        @if(isset($comment[$item->id]))
            <ul class="children">
                @include('corporate.comment',['items'=>$comment[$item->id]])
            </ul>
        @endif
    </li>
@endforeach
