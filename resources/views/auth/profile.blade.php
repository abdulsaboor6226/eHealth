@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="border-bottom text-center pb-4">
                                    <img src="../../../../images/faces/face12.jpg" alt="profile" class="img-lg rounded-circle mb-3">
                                    <div class="mb-3">
                                        <h3>David Grey. H</h3>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <h5 class="mb-0 me-2 text-muted">Canada</h5>
                                            <div class="br-wrapper br-theme-css-stars"><select id="profile-rating" name="rating" autocomplete="off" style="display: none;">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select><div class="br-widget"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="2"></a><a href="#" data-rating-value="3" data-rating-text="3"></a><a href="#" data-rating-value="4" data-rating-text="4"></a><a href="#" data-rating-value="5" data-rating-text="5"></a></div></div>
                                        </div>
                                    </div>
                                    <p class="w-75 mx-auto mb-3">Bureau Oberhaeuser is a design bureau focused on Information- and Interface Design. </p>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-success me-1">Hire Me</button>
                                        <button class="btn btn-success">Follow</button>
                                    </div>
                                </div>
                                <div class="border-bottom py-4">
                                    <p>Skills</p>
                                    <div>
                                        <label class="badge badge-outline-dark">Chalk</label>
                                        <label class="badge badge-outline-dark">Hand lettering</label>
                                        <label class="badge badge-outline-dark">Information Design</label>
                                        <label class="badge badge-outline-dark">Graphic Design</label>
                                        <label class="badge badge-outline-dark">Web Design</label>
                                    </div>
                                </div>
                                <div class="border-bottom py-4">
                                    <div class="d-flex mb-3">
                                        <div class="progress progress-md flex-grow">
                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="progress progress-md flex-grow">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <p class="clearfix">
                          <span class="float-left">
                            Status
                          </span>
                                        <span class="float-right text-muted">
                            Active
                          </span>
                                    </p>
                                    <p class="clearfix">
                          <span class="float-left">
                            Phone
                          </span>
                                        <span class="float-right text-muted">
                            006 3435 22
                          </span>
                                    </p>
                                    <p class="clearfix">
                          <span class="float-left">
                            Mail
                          </span>
                                        <span class="float-right text-muted">
                            Jacod@testmail.com
                          </span>
                                    </p>
                                    <p class="clearfix">
                          <span class="float-left">
                            Facebook
                          </span>
                                        <span class="float-right text-muted">
                            <a href="#">David Grey</a>
                          </span>
                                    </p>
                                    <p class="clearfix">
                          <span class="float-left">
                            Twitter
                          </span>
                                        <span class="float-right text-muted">
                            <a href="#">@davidgrey</a>
                          </span>
                                    </p>
                                </div>
                                <button class="btn btn-primary btn-block mb-2">Preview</button>
                            </div>
                            <div class="d-block d-md-flex justify-content-between mt-4 mt-md-0">
                                <div class="text-center mt-4 mt-md-0">
                                    <button class="btn btn-outline-primary">Message</button>
                                    <button class="btn btn-primary">Request</button>
                                </div>
                            </div>
                            <div class="mt-4 py-2 border-top border-bottom">
                                <ul class="nav profile-navbar">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="ti-user"></i>
                                            Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">
                                            <i class="ti-receipt"></i>
                                            Feed
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="ti-calendar"></i>
                                            Agenda
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="ti-clip"></i>
                                            Resume
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    <img src="../../../../images/faces/face13.jpg" alt="profile" class="img-sm rounded-circle">
                                    <div class="ms-4">
                                        <h6>
                                            Mason Beck
                                            <small class="ms-4 text-muted"><i class="ti-time me-1"></i>10 hours</small>
                                        </h6>
                                        <p>
                                            There is no better advertisement campaign that is low cost and also successful at the same time.
                                        </p>
                                        <p class="small text-muted mt-2 mb-0">
                              <span>
                                <i class="ti-star me-1"></i>4
                              </span>
                                            <span class="ms-2">
                                <i class="ti-comment me-1"></i>11
                              </span>
                                            <span class="ms-2">
                                <i class="ti-share"></i>
                              </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start profile-feed-item">
                                    <img src="../../../../images/faces/face16.jpg" alt="profile" class="img-sm rounded-circle">
                                    <div class="ms-4">
                                        <h6>
                                            Willie Stanley
                                            <small class="ms-4 text-muted"><i class="ti-time me-1"></i>10 hours</small>
                                        </h6>
                                        <img src="../../../../images/samples/1280x768/12.jpg" alt="sample" class="rounded mw-100">
                                        <p class="small text-muted mt-2 mb-0">
                              <span>
                                <i class="ti-star me-1"></i>4
                              </span>
                                            <span class="ms-2">
                                <i class="ti-comment me-1"></i>11
                              </span>
                                            <span class="ms-2">
                                <i class="ti-share"></i>
                              </span>
                                        </p>
                                    </div>
                                </div>
                                <img src="../../../../images/faces/face19.jpg" alt="profile" class="img-sm rounded-circle">
                                <div class="ms-4">
                                    <h6>
                                        Dylan Silva
                                        <small class="ms-4 text-muted"><i class="ti-time me-1"></i>10 hours</small>
                                    </h6>
                                    <p>
                                        When I first got into the online advertising business, I was looking for the magical combination
                                        that would put my website into the top search engine rankings
                                    </p>
                                    <img src="../../../../images/samples/1280x768/5.jpg" alt="sample" class="rounded mw-100">
                                    <p class="small text-muted mt-2 mb-0">
                              <span>
                                <i class="ti-star me-1"></i>4
                              </span>
                                        <span class="ms-2">
                                <i class="ti-comment me-1"></i>11
                              </span>
                                        <span class="ms-2">
                                <i class="ti-share"></i>
                              </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection