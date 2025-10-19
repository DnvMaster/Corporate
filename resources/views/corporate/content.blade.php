@if($portfolios && count($portfolios) > 0)
    <div id="content-home" class="content group">
		<div class="hentry group">
			<div class="section portfolio">
                <h3 class="title">{{ trans('ru.latest_projects') }}</h3>
                @foreach ($portfolios as $key => $portfolio )
                    @if($key == 0)
                        <div class="hentry work group portfolio-sticky portfolio-full-description">
				            <div class="work-thumbnail">
				                <a class="thumb"><img src="{{ asset(env('CORP')) }}/images/projects/{{ $portfolio->img->max }}" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}" /></a>
				                <div class="work-overlay">
				                    <h3><a href="{{ route('portfolios.show',['portfolios'=> $portfolio->alias]) }}">{{ $portfolio->title }}></a></h3>
				                    <p class="work-overlay-categories"><img src="{{ asset(env('CORP')) }}/images/categories.png" alt="Categories" /> От: <a href="category.html">{{ $portfolio->filter->title }}</a></p>
				                </div>
				            </div>
				            <div class="work-description">
				                <h2><a href="{{ route('portfolios.show',['portfolios'=> $portfolio->alias]) }}">{{ $portfolio->title }}!</a></h2>
				                <p class="work-categories">От: <a href="category.html">{{ $portfolio->filter->title }}</a></p>
				                <p>{{ str_limit($portfolio->text,200) }}</p>
				                <a href="{{ route('portfolios.show',['portfolios'=> $portfolio->alias]) }}" class="read-more">|| Читать далее</a>
				            </div>
				         </div>        
				        <div class="clear"></div>
						@continue
                    @endif

				@if ($key == 1)
					<div class="portfolio-project">
				@endif
					<div class="related_project {{ ($key == 4) ? 'related_project_last' : '' }}">
						<div class="overlay_a related_img">
							<div class="overlay_wrapper">
								<img src="{{ asset(env('CORP')) }}/images/projects/{{ $portfolio->img->mini }}" alt="0061" title="0061">
								<div class="overlay">
									<a class="overlay_img" href="{{ asset(env('CORP')) }}/images/projects/{{ $portfolio->img->path }}" rel="lightbox" title=""></a>
				                	<a class="overlay_project" href="{{ route('portfolios.show',['portfolios'=> $portfolio->alias]) }}">{{ $portfolio->title }}</a>
				                    <span class="overlay_title">{{ $portfolio->title }}</span>
								</div>
							</div>
						</div>
						<h4><a href="{{ route('portfolios.show',['portfolios'=> $portfolio->alias]) }}">{{ $portfolio->title }}</a></h4>
						<p>{{ str_limit($portfolio->text,50) }}</p>
					</div>
					@endforeach
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div id="comments"></div>
    </div>
@else
    <h2>Извините, но статей и коментариев пока нет.</h2>
@endif