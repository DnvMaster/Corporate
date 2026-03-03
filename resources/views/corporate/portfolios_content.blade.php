<div id="content-page" class="content-group">
    <div class="henty group">
        @if($getPortfolios)
            <div id="portfolio" class="portfolio-big-image">
                @foreach($getPortfolios as $portfolio)
                    <div class="hentry work group">
				        <div class="work-thumbnail">
				            <div class="nozoom">
				                 <img src="{{ asset('corporate') }}/images/projects/{{ $portfolio->images->max }}" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}">
				            <div class="overlay">
				                <a class="overlay_img" href="{{ asset('corporate') }}/images/projects/{{ $portfolio->images->path }}" rel="lightbox" title="{{ $portfolio->title }}"></a>
				                <a class="overlay_project" href="{{ route('portfolio.show',$portfolio->id) }}"></a>
				                <span class="overlay_title">{{ $portfolio->title }}</span>
				            </div>
				        </div>
				    </div>
				    <div class="work-description">
				        <h3>{{ $portfolio->title }}</h3>
				        <p>{{ str($portfolio->text)->limit(200) }}</p>
				        <div class="clear"></div>
				        <div class="work-skillsdate">
				            <p class="skills"><span class="overlay_title">{{ __('Filter') }}:</span> {{ $portfolio->filter->title }}</p>
                            <p class="workdate"><span class="overlay_title">{{ __('Customer') }}:</span> {{ $portfolio->customer }}</p>
                            @if($portfolio->created_at)
                                <p class="workdate"><span class="overlay_title">{{ __('Year') }}:</span> {{ $portfolio->created_at->format('Y') }}</p>
                            @endif
				        </div>
				        <a class="read-more" href="{{ route('portfolio.show',$portfolio->id) }}">View Project</a>
				    </div>
				    <div class="clear"></div>
                @endforeach
                <link rel="stylesheet" href="{{ asset('corporate/css/bootstrap.min.css') }}">
                <div class="general-pagination group">
			        @if($getPortfolios->lastPage() > 1)
				        <ul class="pagination">
					        @if($getPortfolios->currentPage() !== 1)
						        <li><a href="{{ $getPortfolios->url($getPortfolios->currentPage() - 1) }}" aria-label="Previous">{{ __('pagination.previous')}}</a></li>
					        @endif
					        @for($i = 1; $i <= $getPortfolios->lastPage(); $i++)
						        @if($getPortfolios->currentPage() == $i)
							        <li><a class="selected disabled">{{ $i }}</a></li>
						        @else
							        <li><a href="{{ $getPortfolios->url($i) }}">{{ $i }}</a></li>
						        @endif
					        @endfor
					        @if($getPortfolios->currentPage() !== 1)
						        <li><a href="{{ $getPortfolios->url($getPortfolios->currentPage() + 1) }}" aria-label="Next">{{ __('pagination.next')}}</a></li>
					        @endif
				        </ul>
			        @endif
		        </div>
                <script src="{{ asset('corporate/js/bootstrap.min.js') }}"></script>
            </div>
        @endif
    <div class="clear"></div>
    </div>
</div>
