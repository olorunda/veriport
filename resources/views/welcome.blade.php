<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>veriPort</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/twitter.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pace.green.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/ladda.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

    <!--JavaScript Libraries-->
    <script type="text/javascript" src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" data-pace-options='{ "ajax": true }' src="{{asset('js/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/spin.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ladda.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway';
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <!--<div id="data">
            
    </div>-->
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">veriPort</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'veriPort') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <div class="navbar-form navbar-left" id="search2">
                        <input type="text" class="form-control input-lg has-success" id="ref_numf2" name="ref_numf2" required="required" placeholder="Click here and scan printout form" autofocus="autofocus">
                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }} <span class="caret"></span></a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="flex-center position-ref full-height" id="bTitle">
            <div class="content">
                <div class="title m-b-md">
                    <img alt="logo" src="{{asset('img/veriport.png')}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control input-lg has-success" id="ref_numf" name="ref_numf" required="required" placeholder="Click here and scan printout form" autofocus="autofocus">
                                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                    <button type="button" class="btn btn-default btn-lg ladda-button" data-style="expand-right" data-color="green" id="vsearch"><span class="ladda-label">veriSearch</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="links">
                    <a href="http://www.snapnet.com.ng"  target="_blank">Documentation</a>
                    <a href="http://www.snapnet.com.ng"  target="_blank">Snapnet</a>
                    <a href="http://www.snapnet.com.ng"  target="_blank">News</a>
                    <a href="http://www.snapnet.com.ng"  target="_blank">Forge</a>
                    <a href="http://www.snapnet.com.ng"  target="_blank">GitHub</a>
                </div>
                <div class="row">
                    <div class="col-md-9 col-md-offset-4">
                        <p></p>
                        <a href="http://www.snapnet.com.ng" target="_blank"><img class="img-responsive" alt="snapnet" src="{{asset('img/snapnet.png')}}" style="height:40px"></a>
                    </div>
                </div>
            </div>
        </div>

        <div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;font-weight:bold;color:black;"><img src="{{asset('img/demo_wait.gif')}}" width="64" height="64" /><br>Verifing applicant...</div>

        <div class="container" id="dt">
            <div class="row">
                <div class="user-data panel panel-success">
                    <div class="panel-heading">
                        <h3><i class="fa fa-male"></i> / <i class="fa fa-female"></i> Applicant Data</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-5">
                            <div class="img-responsive">
                                <?php $imge = session('image');?>
                                <img class="img-thumbnail" id="usr" alt="user-image" src="{{asset('upload').'/'.$imge}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#basic" aria-controls="home" role="tab" data-toggle="tab">BASIC DATA</a></li>
                                <li role="presentation"><a href="#bio" aria-controls="profile" role="tab" data-toggle="tab">BIO-DATA</a></li>
                                <li role="presentation"><a href="#contact" aria-controls="messages" role="tab" data-toggle="tab">CONTACT INFORMATION</a></li>
                                <li role="presentation"><a href="#education" aria-controls="settings" role="tab" data-toggle="tab">EDUCATIONAL BACKGROUND</a></li>
                                <!--<li role="presentation"><a href="#quals" aria-controls="settings" role="tab" data-toggle="tab">PREOFESSIONAL QUALIFICATIONS</a></li>-->
                                <li role="presentation"><a href="#ref" aria-controls="settings" role="tab" data-toggle="tab">REFEREES</a></li>
                                <li role="presentation"><a href="#exam" aria-controls="settings" role="tab" data-toggle="tab">EXAM CENTER</a></li>
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="basic">
                                    <br>
                                    <div class="list-group">
                                      <a href="#" class="list-group-item active">
                                        BASIC USER INFORMATION
                                      </a>
                                      <a href="#" class="list-group-item" id="it">Name: <span id="name">Allen Bary</span></a>
                                      <a href="#" class="list-group-item" id="it">Address: <span id="address">1B, Abayomi Shonuga Street, Lekki, Ekiti </span></a>
                                      <a href="#" class="list-group-item" id="it">Phone Number: <span id="phone">09876543214</span></a>
                                      <a href="#" class="list-group-item" id="it">E-Mail: <span id="email">allen@cbt.com </span></a>
                                      <a href="#" class="list-group-item" id="it">Reference Number: <span id="ref_num">DPR/2016/LAG/107 </span></a>
                                    </div>
                                    <br>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="bio">
                                    <br>
                                    <div class="list-group">
                                      <a href="#" class="list-group-item active">
                                        BIO-DATA INFORMATION
                                      </a>
                                      <a href="#" class="list-group-item" id="it">First Name: <span id="f_name">Allen Bary</span></a>
                                      <a href="#" class="list-group-item" id="it">Last Name: <span id="l_name">Allen Bary</span></a>
                                      <a href="#" class="list-group-item" id="it">Maiden Name: <span id="maiden_name">Allen Bary</span></a>
                                      <a href="#" class="list-group-item" id="it">Other Name: <span id="m_name">Allen Bary</span></a>
                                      <a href="#" class="list-group-item" id="it">Sex: <span id="sex">1B, Abayomi Shonuga Street, Lekki, Ekiti </span></a>
                                      <a href="#" class="list-group-item" id="it">Marital Status: <span id="status">09876543214</span></a>
                                      <a href="#" class="list-group-item" id="it">Date of Birth: <span id="dob">allen@cbt.com </span></a>
                                    </div>
                                    <br>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="contact">
                                    <br>
                                    <div class="list-group">
                                      <a href="#" class="list-group-item active">
                                        CONTACT INFORMATION
                                      </a>
                                      <a href="#" class="list-group-item" id="it">Street: <span id="street">Allen Bary</span></a>
                                      <a href="#" class="list-group-item" id="it">City: <span id="city">1B, Abayomi Shonuga Street, Lekki, Ekiti </span></a>
                                      <a href="#" class="list-group-item" id="it">Local Government Area: <span id="lga">09876543214</span></a>
                                      <a href="#" class="list-group-item" id="it">State of Residence: <span id="state">allen@cbt.com </span></a>
                                      <a href="#" class="list-group-item" id="it">State of Origin: <span id="ostate">DPR/2016/LAG/107 </span></a>
                                    </div>
                                    <br>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="education">
                                    <br>
                                    <div class="list-group">
                                      <a href="#" class="list-group-item active">
                                        EDUCATIONAL BACKGROUND
                                      </a>
                                      <a href="#" class="list-group-item" id="it">Secondary School: <span id="sname">Allen Bary</span></a>
                                      <a href="#" class="list-group-item" id="it">Date Attended: <span id="sdate">1B, Abayomi Shonuga Street, Lekki, Ekiti </span></a>
                                      <a href="#" class="list-group-item" id="it">Higher Institution: <span id="iname">09876543214</span></a>
                                      <a href="#" class="list-group-item" id="it">Date Attended: <span id="idate">allen@cbt.com </span></a>
                                      <a href="#" class="list-group-item" id="it">In Country: <span id="country">allen@cbt.com </span></a>
                                      <a href="#" class="list-group-item" id="it">Course: <span id="course">allen@cbt.com </span></a>
                                      <a href="#" class="list-group-item" id="it">Degree Obtained: <span id="degree">allen@cbt.com </span></a>
                                    </div>
                                    <br>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="quals">
                                    <br>
                                    <div class="list-group">
                                      <a href="#" class="list-group-item active">
                                        PROFESSIONAL QUALIFICATIONS
                                      </a>
                                      <a href="#" class="list-group-item" id="it">Name of Governing Body: <span id="prof_name">Allen Bary</span></a>
                                      <a href="#" class="list-group-item" id="it">Position: <span id="pos">1B, Abayomi Shonuga Street, Lekki, Ekiti </span></a>
                                    </div>
                                    <br>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="ref">
                                    <br>
                                    <div class="list-group">
                                      <a href="#" class="list-group-item active">
                                        AVAILABLE REFEREES
                                      </a>
                                      <a href="#" class="list-group-item" id="it">Name of Referee: <span id="rname">Allen Bary</span></a>
                                      <a href="#" class="list-group-item" id="it">Organization: <span id="org">1B, Abayomi Shonuga Street, Lekki, Ekiti </span></a>
                                      <a href="#" class="list-group-item" id="it">Position: <span id="rpos">09876543214</span></a>
                                      <a href="#" class="list-group-item" id="it">E-Mail: <span id="remail">allen@cbt.com </span></a>
                                      <a href="#" class="list-group-item" id="it">Phone: <span id="rphone">DPR/2016/LAG/107 </span></a>
                                    </div>
                                    <br>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="exam">
                                    <br>
                                    <div class="list-group">
                                      <a href="#" class="list-group-item active">
                                        EXAMINATION CENTER 
                                      </a>
                                      <a href="#" class="list-group-item" id="it">Preferred Center</a>
                                      <a href="#" class="list-group-item" id="it">Region: <span id="pregion">1B, Abayomi Shonuga Street, Lekki, Ekiti </span></a>
                                      <a href="#" class="list-group-item" id="it">Center: <span id="pcenter">09876543214</span></a>
                                      <a href="#" class="list-group-item" id="it">Alternate Center</a>
                                      <a href="#" class="list-group-item" id="it">Region: <span id="aregion">1B, Abayomi Shonuga Street, Lekki, Ekiti </span></a>
                                      <a href="#" class="list-group-item" id="it">Center: <span id="acenter">09876543214</span></a>
                                    </div>
                                    <br>
                                </div>
                              </div>

                            </div>
                        </div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    </html>
