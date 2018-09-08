  <!-- paricing area start -->
    <section class="pricing-area" id="price">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="section-title">
                        <h3>{{$data->pricing_title}}</h3>
                        <span class="separator">
                            <img src="assets/frontend/img/separator.png" alt="separator">
                        </span>
                        <p>{!! $data->pricing_description !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($pricingPlan as $item)
                <div class="col-md-3 col-sm-6">
                    <div class="single-pricing-plan pricing-bg" style="background-image: url($item->image) ;">
                        <div class="header">
                            <span class="name">{{$item->name}}</span>
                            <div class="price">
                                <h3>{{$item->type}}</h3>
                            </div>
                        </div>
                        <div class="body">
                            <ul>
                                @foreach($pricingPlanDetail as $detail)
                                @if($detail->plan_id == $item->id)
                                <li>
                                    <i class="fas fa-shield-alt"></i> {{ $detail->title }}
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="footer">
                            <a href="{{$item->link}}" class="boxed-btn">try now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- paricing area start -->