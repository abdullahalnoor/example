@extends('front.master')


@section('body')
          <section class="team-page-section section-padding">
            <div class="container">
                <div class="col-md-2"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="section-wrapper text-center ">
                           @foreach($federationAdvantage as $item)

                                <div class="col-sm-6">
                                    <div class="team-wrapper">
                                       

                                        <div class="contact-wrapper">
                                            <h4>{{ $item->title }}</h4>
                                        <p>{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
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
                           @foreach($federationFacility as $item)

                                <div class="col-sm-4">
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
                            <a href="#" class="btn btn-primary">Load more</a>
                        </div>
                    </div>

                    
                </div>
            </div>
        </section> <!-- team-page-section -->
      



        
  <section class="right-choice-section section-padding">
            <div class="container text-center">


                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row">
                           
                                <div class="col-sm-12">
                                    <div class="section-wrapper">
                                        <div class="content">
                                            <p>{{ $federationSpeech->description  }}</p>
                                            <p> {{ $federationSpeech->name }}</p>
                                        </div>
                                    </div>
                                </div>
                               
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>
        


        
         
        
   

@endsection