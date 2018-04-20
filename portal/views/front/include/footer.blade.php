 <footer class="footer-section">
            <div class="footer-container">
                <div class="container">
                    <div id="footer">
                         <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="footer-wrapper">
                                    <img src="{{asset('/front/img/logo-lc.png')}}" />

                                    <ul class="location">
                                        <li><i class="fa fa-home" aria-hidden="true"></i> 
                                            {{ $address->floor_number }},<br>
                                            {{ $address->street_number }},<br>
                                            {{ $address->city }}
                                            {{ $address->country }}

                                        </li>
                                        <li>
                                            {{ $address->country }}
                                        </li>
                                    </ul>
                                </div> <!-- footer-wrapper -->
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <div class="footer-wrapper">
                                    <h3>About</h3>
                                     <ul class="wrapper-option clearfix">
                                        @foreach($aboutMenus as $item)
                                        <li><a href="#">{{ $item->name}}</a></li>
                                        @endforeach                      
                                    </ul>
                                   
                                </div> <!-- footer-wrapper -->
                            </div>

                            <div class="col-md-3  col-sm-3">
                                <div class="footer-wrapper last-wrapper">
                                    <h3>Locums</h3>

                                    <ul class="wrapper-option clearfix">
                                        @foreach($lucumMenus as $item)
                                        <li><a href="#">{{ $item->name}}</a></li>
                                        @endforeach
                                    </ul> <!-- wrapper-option -->                         
                                  </div> <!-- footer-wrapper -->
                            </div>
                            <div class="col-md-3  col-sm-3">
                                <div class="footer-wrapper last-wrapper">
                                    <h3>Practices</h3>

                                    <ul class="wrapper-option clearfix">
                                        @foreach($practiceMenus as $item)
                                        <li><a href="#">{{ $item->name}}</a></li>
                                        @endforeach
                                    </ul> <!-- wrapper-option -->                         
                                  </div> <!-- footer-wrapper -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6" id="copyRight">
                                <p>© 2017 Locum LTD, formerly Network Locum. All Rights Reserved.</p>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div> <!-- footer-container -->


        </footer> <!-- footer-section -->
        

       