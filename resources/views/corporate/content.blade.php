@if($portfolios && count($portfolios) > 0)
    <div id="content-home" class="content group">
		<div class="hentry group">
			<div class="section portfolio">
                <h3 class="title">Последние проекты</h3>
                @foreach ($portfolios as $key => $portfolio )
                    @if($key == 0)
                        <div class="hentry work group portfolio-sticky portfolio-full-description">
				            <div class="work-thumbnail">
				                <a class="thumb"><img src="{{ asset(env('CORP')) }}/images/projects/0081-385x192.jpg" alt="0081" title="0081" /></a>
				                <div class="work-overlay">
				                    <h3><a href="project.html">{{ $portfolio->title }}</a></h3>
				                    <p class="work-overlay-categories"><img src="{{ asset(env('CORP')) }}/images/categories.png" alt="Categories" /> in: <a href="category.html">Brand Identity</a>, <a href="category.html">Web Design</a></p>
				                </div>
				            </div>
				            <div class="work-description">
				                <h2><a href="project.html">Steep This!</a></h2>
				                <p class="work-categories">От: <a href="category.html">{{ $portfolio->filter->title }}</a></p>
				                <p>{{ str_limit($portfolio->text,200) }}</p>
				                <a href="#" class="read-more">|| Читать далее</a>
				            </div>
				         </div>        
				        <div class="clear"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@else
    <h2>Извините, но статей и коментариев пока нет.</h2>
@endif