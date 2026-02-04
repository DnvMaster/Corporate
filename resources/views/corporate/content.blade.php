@if($getPortfolios && count($getPortfolios) > 0)
	<div id="content-home" class="content group">
		<div class="hentry group">
			<div class="section portfolio">
				<h3 class="title">{{ __('Latest_projects') }}</h3>
				@foreach($getPortfolios as $key => $portfolio)
					@if($key == 0)
						<div class="hentry work group portfolio-sticky portfolio-full-description">
				            <div class="work-thumbnail">
				                <a class="thumb">
									@if(!empty($portfolio->images->max))
										<img src="{{ asset('corporate/images/projects/'.$portfolio->images->max) }}" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}">
									@endif
								</a>
				                <div class="work-overlay">
				                    <h3><a href="{{ route('portfolios.show', $portfolio->id) }}">{{ $portfolio->title }}</a></h3>
				                    <p class="work-overlay-categories">
										<img src="{{ asset('corporate/images/categories.png') }}" alt="Categories"> in: <a href="#">{{ $portfolio->filter->alias }}</a>
									</p>
				                </div>
				            </div>
				            <div class="work-description">
				                <h2><a href="{{ route('portfolios.show',$portfolio->id) }}">{{ $portfolio->title }}!</a></h2>
				                <p class="work-categories">in: <a href="#">{{ $portfolio->filter->alias }}</a></p>
				                <p>{{ str($portfolio->text)->limit(200) }}</p>
				                <a href="{{ route('portfolios.show', $portfolio->id) }}" class="read-more">|| Read more</a>
				            </div>
				        </div>
				        <div class="clear"></div>
						@continue
					@endif

					@if($key == 1)
						<div class="portfolio-projects">
					@endif
				    <div class="related_project {{ ($key == 4) ? 'related_project_last' : '' }}">
				    	<div class="overlay_a related_img">
				            <div class="overlay_wrapper">
								@if(!empty($portfolio->images->mini))
				            		<img src="{{ asset('corporate/images/projects/'.$portfolio->images->mini) }}" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}">
								@endif						
				                <div class="overlay">
				                    <a class="overlay_img" href="{{ asset('corporate/images/projects/'.$portfolio->images->path) }}" rel="lightbox" title="{{ $portfolio->title }}"></a>
				                    <a class="overlay_project" href="{{ route('portfolios.show',$portfolio->id) }}"></a>
				                    <span class="overlay_title">{{ $portfolio->title }}</span>
				                </div>
				            </div>
				        </div>
				        <h4><a href="{{ route('portfolios.show',$portfolio->id) }}">{{ $portfolio->title }}</a></h4>
				        <p>{{ str($portfolio->text)->limit(200) }}</p>
				    </div> 
				@endforeach                 
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div id="comments"></div>
	</div>
	@else
	<div id="content-home" class="content group">
		@include('corporate.articles_no')
	</div>
@endif