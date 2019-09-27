@extends('layouts.dashboard-profile')

@section('content')

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Asset Registration Link Details</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" id="search-bar" class="form-control" placeholder="Search for..." onkeyup="filterCards()">
                    
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="#"  class="carousel-control-prev" role="button" data-slide="prev""><i class="fa fa-chevron-left"></i></a>
                      </li>
                      <li><a href="#" class="carousel-control-next" role="button" data-slide="next""><i class="fa fa-chevron-right"></i></a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a href="{{route('asset_registration_links.index')}}"><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-4 col-sm-4 col-xs-12 profile_left">
                 
                      <h3><i class="fa fa-clipboard user-profile-icon" ></i> {{$asset_registration_link->caption}}</h3>
                     
                      <ul class="list-unstyled user_data">
                        <li>
                          <i class="fa fa-link user-profile-icon"> Link:</i> <span style="word-wrap: break-word; color: #2A3F54;"> {{$asset_registration_link->link}} </span>
                        </li>
                        <li>
                          <i class="fa fa-bank user-profile-icon"> Locations:</i> {{{count($asset_registration_link->locations)}}}
                        </li>
                         <li>
                          <i class="fa fa-box user-profile-icon"> Type:</i> {{$asset_registration_link->type? $asset_registration_link->type->name :''}}  
                        </li>
                      </ul>


                      <a class="btn btn-success" href="{{route('asset_registration_links.edit', ['id'=>$asset_registration_link->id])}}"><i class="fa fa-edit m-right-xs"></i>Edit Location</a>
                      <br />

                      <!-- Start Table -->

                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                           
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                               
                               
                            </ul>
                            <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Created By</th>
                                    <td>{{$asset_registration_link->parent? $asset_registration_link->parent->name : ''}}</td>
                                </thead>
                              </tr>
                                <tbody>
                                  <tr>
                                    <th>Expiry Date</th>
                                    <td>{{$asset_registration_link->expiry_date}}</td>
                                  </tr>
                                  <tr>
                                    <th>Created At</th>
                                    <td>{{$asset_registration_link->created_at}}</td>
                                  </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>

                        <!-- End Table -->

              
                      
                       

                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      

                     <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Linked Locations</a>
                          </li>


                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Linked Users</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Registered Assets</a>
                          </li>
                        </ul>
                         <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#.</th>
                                    <th>Name</th>
                                   
                                   
                                    <th>Organization</th>
                                   
                                
                                    <th class="text-center">No. Assets</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                    @foreach($asset_registration_link->locations as $key => $location)
                                        <tr>
                                            <td>{{1+$key}}.</td>
                                            <td>{{$location->name}}</td>
                                            
                                            
                                            <td>{{$location->organization ? $location->organization->name : ''}}</td>
                                          
                                            <!-- <td>{{$location->user_name}}</td> -->
                                            <td class="text-center">{{count($location->assets)}}</td>
                            
                                            <td class="text-center">
                                                <a href="{{route('location.show', ['id'=>$location->id])}}">
                                                    <i class="fa fa-search-plus text-info"></i>
                                                </a>
                                                <a href="{{route('location.edit', ['id'=>$location->id])}}">
                                                    <i class="fa fa-edit text-warning"></i>
                                                </a>
                                                <a href="{{route('location.destroy', ['id' => $location->id])}}" onclick="event.preventDefault(); confirm('Are you sure?', document.getElementById('delete-location-form-{{$location->id}}').submit());">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>

                                                 <form id="delete-location-form-{{$location->id}}" action="{{ route('location.destroy', ['id' => $location->id]) }}" method="POST" style="display: none;">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                       
                 
                          
                           </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Username</th>
                                  <th>Email</th>
                                  <th>Type</th>
                                </tr>
                              </thead>
                             
                              <tbody>
                                @foreach($asset_registration_link->locations as $key=> $location)
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-center"></td>
                                </tr>
                                @endforeach
                               
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p> </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </tr>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection