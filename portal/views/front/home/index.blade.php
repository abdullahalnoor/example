@extends('front.master')


@section('body')
        
      <section class="team-page-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="text-center">Modern tools for modern doctors</h3>
                        <div class="row">
                           @foreach($modernTools as $item)

                            <div class="section-wrapper text-center " >
                                <div class="col-sm-6" style="min-height: 250px;">
                                    <div class="team-wrapper">
                                        <div class="contact-wrapper">
                                            <h4>{{ $item->title }}</h4>
                                        <p>{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    
                </div>
            </div>
             <div class="container">
                <div class="col-md-2"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="section-wrapper text-center ">
                           @foreach($toolBenefits as $item)

                                <div class="col-sm-3">
                                    <div class="team-wrapper">
                                       

                                        <div class="contact-wrapper">
                                             <img src="{{asset($item->icon)}}" style="width: 60px;height: 60px" alt="">
                                            <p>{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    
                        <div class="link text-center">
                            <a href="#" class="btn btn-primary">Sign Up For Free</a>
                        </div>
                    </div>

                    
                </div>
            </div>
        </section> <!-- team-page-section -->

		

         <section class="right-choice-section section-padding">
            <div class="container">
                <div class="section-title text-center">
                    <h2>What our community says</h2>
                    <div class="border-2"></div>
                   <!--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore <br> et dolore magna aliqua.</p> -->
                </div> <!-- section-title -->

                <div class="row">
                    <div class="col-md-1"></div>               
                    <div class="col-md-10">
                        <div class="row">
                             @foreach($communities as $community)
                        <div class="col-md-4 col-sm-4 text-center text-justify">
                            <div class="news-wrapper">
                                <img src="{{asset($community->image)}}" alt="" style="width: 100%">

                                <div class="news-content">
                                    <!-- <h4><a href="#">Florida insurance stocks get crushed for IRMA</a></h4> -->

                                    <p>{{ $community->speech }}</p>

                                    <span class="date">{{ $community->name }}</span>

                                    <span class="tag pull-right"><a href="#">{{ $community->city }} - </a> <a href="#">{{ $community->country }}</a></span>
                                </div>
                            </div>
                        </div>
                       @endforeach
                        </div>
                    </div>               
                    <div class="col-md-1"></div>                
                </div>  
            </div>
        </section> <!-- right-choice-section -->

        <section class="right-choice-section section-padding">
            <div class="container">
                <div class="section-title text-left">
                    <h2>In partnership with</h2>
                </div> <!-- section-title -->
                <div class="row">
                    <div class=" col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="row">
                             @foreach($partnerships as $item)
                            <div class="text-center col-sm-3">
                                <div class="news-wrapper">
                                    <img src="{{asset($item->image)}}" alt="" class="img-responsive" >
                                </div>
                            </div>
                           @endforeach 
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                   
                </div>     
            </div>
       
        </section> <!-- right-choice-section -->
         <section class="right-choice-section section-padding">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Featured on</h2>
                </div> <!-- section-title -->
                <div class="row">
                    <div class="col-md-offset-1">
                    @foreach($features as $item)
                    <div class="col-md-3 col-sm-6" style="padding: 40px;">
                        <div class="news-wrapper">
                            <img src="{{asset($item->image)}}" alt="" style="width:200px;height:  100px">
                        </div>
                    </div>
                   @endforeach 
                   <br>
                </div>     
            </div><br>
            <div class="link text-center">
                    <a href="#" class="btn btn-primary">Sign Up For Free </a>
            </div>
        </section> <!-- right-choice-section -->

        
   

@endsection