<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/13/15
 * Time: 8:04 PM
 */
$editUrl = base_url('trips/edit/' . $trip->getId());
$fmt = numfmt_create( 'vi_VN', NumberFormatter::CURRENCY);
$breakfast = numfmt_format_currency($fmt, 1000000, "VND");
$taxifare = numfmt_format_currency($fmt, 100000, "VND");
$taxihalong = numfmt_format_currency($fmt, 1000000, "VND");
$hotel = numfmt_format_currency($fmt, 350000, "VND");
$lunch = numfmt_format_currency($fmt, 2000000, "VND");
$dinner = numfmt_format_currency($fmt, 4000000, "VND");
$content = <<<HTML
<div class="container">
    <section id="news" class="white-bg padding-top-bottom">
    	<div class="container">
			<div class="timeline">
				<div class="date-title">
					<span>{$trip->getName()} - <small>{$trip->getDescription()}</small></span>
				</div>
				<div class="row">
					<div class="col-sm-6 news-item">
						<div class="news-content">
							<div class="date">
								<p>{$trip->getDateStart()->format('d')}</p>
								<small>{$trip->getDateStart()->format('m')}</small>
							</div>
							<h2 class="news-title">TP HCM</h2>
							<div class="news-media">
								<a class="colorbox cboxElement" href="#">
                                    <img class="img-responsive" src="http://lorempixel.com/400/400/sports/1/" alt="">
                                </a>
							</div>
							<p>Ăn sáng - {$breakfast}</p>
							<p>Tiền taxi ra sân bay - {$taxifare}</p>
							<!--<a class="read-more" href="#">Read More</a>-->
						</div>
					</div>
					<div class="col-sm-6 news-item right">
						<div class="news-content">
							<div class="date">
								<p>29</p>
								<small>06</small>
							</div>
							<h2 class="news-title">Hà Nội</h2>
							<div class="news-media gallery">
								<a class="colorbox cboxElement" href="#">
									<img class="img-responsive" src="http://lorempixel.com/400/400/sports/2/" alt="">
								</a>
								<a class="colorbox cboxElement" href="#"></a>
							</div>
							<p>Lấy phòng khách sạn - {$hotel}</p>
							<p>Ăn trưa - {$lunch}</p>
							<p>Ăn tối - {$dinner}</p>
							<!--<a class="read-more" href="#">Read More</a>-->
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 news-item">
						<div class="news-content">
							<div class="date">
								<p>30</p>
								<small>06</small>
							</div>
							<h2 class="news-title">Hạ Long</h2>
							<div class="news-media">
								<a class="colorbox cboxElement" href="#">
                                    <img class="img-responsive" src="http://lorempixel.com/400/400/sports/1/" alt="">
                                </a>
							</div>
							<p>Ăn sáng - {$breakfast}</p>
							<p>Tiền xe đi Hạ Long - {$taxihalong}</p>
							<!--<a class="read-more" href="#">Read More</a>-->
						</div>
					</div>
					<div class="col-sm-6 news-item right">
						<div class="news-content">
							<div class="date">
								<p>29</p>
								<small>06</small>
							</div>
							<h2 class="news-title">Hà Nội</h2>
							<div class="news-media gallery">
								<a class="colorbox cboxElement" href="#">
									<img class="img-responsive" src="http://lorempixel.com/400/400/sports/2/" alt="">
								</a>
								<a class="colorbox cboxElement" href="#"></a>
							</div>
							<p>Lấy phòng khách sạn - {$hotel}</p>
							<p>Ăn trưa - {$lunch}</p>
							<p>Ăn tối - {$dinner}</p>
							<!--<a class="read-more" href="#">Read More</a>-->
						</div>
					</div>
				</div>
				<!--<div class="row">-->
					<!--<div class="col-sm-6 news-item">-->
						<!--<div class="news-content">-->
							<!--<div class="date">-->
								<!--<p>26</p>-->
								<!--<small>Wen</small>-->
							<!--</div>-->
							<!--<h2 class="news-title">Title 3</h2>-->
							<!--<div class="news-media video">-->
								<!--<a class="colorbox-video cboxElement" href="#">-->
									<!--<img class="img-responsive" src="http://lorempixel.com/400/400/sports/3/" alt="">-->
								<!--</a>-->
							<!--</div>-->
							<!--<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized…</p>-->
							<!--<a class="read-more" href="#">Read More</a>-->
						<!--</div>-->
					<!--</div>-->

					<!--<div class="col-sm-6 news-item right">-->
						<!--<div class="news-content">-->
							<!--<div class="date">-->
								<!--<p>25</p>-->
								<!--<small>Tue</small>-->
							<!--</div>-->
							<!--<h2 class="news-title">Title 4</h2>-->
							<!--<div class="news-media gallery">-->
								<!--<a class="colorbox cboxElement" href="#">-->
									<!--<img class="img-responsive" src="http://lorempixel.com/400/400/sports/4/" alt="">-->
								<!--</a>-->
								<!--<a class="colorbox cboxElement" href="#"></a>-->
							<!--</div>-->
							<!--<p>The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains…</p>-->
							<!--<a class="read-more" href="#">Read More</a>-->
						<!--</div>-->
					<!--</div>-->
				<!--</div>-->
				<div class="date-title">
					<span>{$trip->getDateEnd()->format('d/m/Y')}</span>
				</div>
				<!--<div class="row">-->
					<!--<div class="col-sm-6 news-item">-->
						<!--<div class="news-content">-->
							<!--<div class="date">-->
								<!--<p>27</p>-->
								<!--<small>Thu</small>-->
							<!--</div>-->
							<!--<h2 class="news-title">Title 5</h2>-->
							<!--<div class="news-media video">-->
								<!--<a class="colorbox-video cboxElement" href="#">-->
									<!--<img class="img-responsive" src="http://lorempixel.com/400/400/sports/5/" alt="">-->
								<!--</a>-->
							<!--</div>-->
							<!--<p>But who has any right to find fault with a man who chooses to enjoy a pleasure…</p>-->
							<!--<a class="read-more" href="#">Read More</a>-->
						<!--</div>-->
					<!--</div>-->
<!---->
					<!--<div class="col-sm-6 news-item right">-->
						<!--<div class="news-content">-->
							<!--<div class="date">-->
								<!--<p>24</p>-->
								<!--<small>Mon</small>-->
							<!--</div>-->
							<!--<h2 class="news-title">Title 6</h2>-->
							<!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
							<!--<a class="read-more" href="#">Read More</a>-->
						<!--</div>-->
					<!--</div>-->
				<!--</div>-->
			</div>
		</div>
	</section>
</div>

HTML;

echo $content;