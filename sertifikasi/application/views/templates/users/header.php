<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="utf-8" />

    <title><?php echo $this->config->item('title') ?></title>

    <!-- Favicon -->
    <link href='<?=base_url()?>favicon.ico' rel='icon' type='image/x-icon'/>
    <link rel="apple-touch-icon" href="<?=base_url("assets/img/logo.png")?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="product" content="Sistem Informasi Sertifikasi Online <?=$aplikasi->singkatan_unit?>">
    <meta name="description" content="Sistem Informasi Sertifikasi Online <?=$aplikasi->singkatan_unit?>">
    <meta name="author" content="terabytee" />

    <!-- <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black"> -->

    <link rel="stylesheet" href="<?=base_url("assets/admin/plugins/bootstrap/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/admin/plugins/font-awesome/css/font-awesome.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/admin/fonts/style.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/admin/css/main.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/admin/css/main-responsive.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/admin/plugins/iCheck/skins/all.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/admin/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/admin/plugins/perfect-scrollbar/src/perfect-scrollbar.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/admin/css/theme_light.css")?>" type="text/css" id="skin_color">
    <link rel="stylesheet" href="<?=base_url("assets/admin/css/print.css")?>" type="text/css" media="print" />

    <link rel="stylesheet" href="<?=base_url("assets/admin/plugins/fullcalendar/fullcalendar/fullcalendar.css")?>">
    
    <link href="<?=base_url("assets/admin/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css")?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url("assets/admin/plugins/bootstrap-modal/css/bootstrap-modal.css")?>" rel="stylesheet" type="text/css" />
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
    <script src="<?=base_url("assets/admin/js/jquery_2.0.3.min.js")?>"></script>

    <!-- <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css"> -->
    <link rel="stylesheet" href="<?=base_url("assets/admin/css/nprogress.css")?>">

    <script>
        var baseUrl = "<?=base_url()?>";
    </script>

    <style media="screen">
        #spinner {
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #snackbar2 {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: rgba(10, 10, 10, 0.6);
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 12px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 13px;
        }

        #snackbar2.show {
            visibility: visible;
            -webkit-animation: fadein 0.0s, fadeout 0.0s 0.0s;
            animation: fadein 0.0s, fadeout 0.0s 0.0s;
        }
    </style>

</head>

<body>
    <!-- start: HEADER -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <!-- start: TOP NAVIGATION CONTAINER -->
        <div class="container">
            <div class="navbar-header">
                <!-- start: RESPONSIVE MENU TOGGLER -->
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="clip-list-2"></span>
                </button>
                <!-- end: RESPONSIVE MENU TOGGLER -->
                <!-- start: LOGO -->
                <a class="navbar-brand" href="<?=base_url();?>">
                    <img src="<?=base_url("assets/img/logo.png")?>" style="width:40px;margin-top:-10px;" class="circle-img"><?php echo $aplikasi->singkatan_unit ?>
                </a>
                <!-- end: LOGO -->
            </div>
            <div class="navbar-tools">
                <!-- start: TOP NAVIGATION MENU -->
                <ul class="nav navbar-right">

                    <!-- start: TO-DO DROPDOWN -->
                    <!-- <li class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true"
                            href="#">
                            <i class="clip-list-5"></i>
                            <span class="badge"> 12</span>
                        </a>
                        <ul class="dropdown-menu todo">
                            <li>
                                <span class="dropdown-menu-title"> You have 12 pending tasks</span>
                            </li>
                            <li>
                                <div class="drop-down-wrapper">
                                    <ul>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc" style="opacity: 1; text-decoration: none;">Staff
                                                    Meeting</span>
                                                <span class="label label-danger" style="opacity: 1;"> today</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc" style="opacity: 1; text-decoration: none;"> New
                                                    frontend layout</span>
                                                <span class="label label-danger" style="opacity: 1;"> today</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc"> Hire developers</span>
                                                <span class="label label-warning"> tommorow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc">Staff Meeting</span>
                                                <span class="label label-warning"> tommorow</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc"> New frontend layout</span>
                                                <span class="label label-success"> this week</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc"> Hire developers</span>
                                                <span class="label label-success"> this week</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc"> New frontend layout</span>
                                                <span class="label label-info"> this month</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc"> Hire developers</span>
                                                <span class="label label-info"> this month</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc" style="opacity: 1; text-decoration: none;">Staff
                                                    Meeting</span>
                                                <span class="label label-danger" style="opacity: 1;"> today</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc" style="opacity: 1; text-decoration: none;"> New
                                                    frontend layout</span>
                                                <span class="label label-danger" style="opacity: 1;"> today</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="todo-actions" href="javascript:void(0)">
                                                <i class="fa fa-square-o"></i>
                                                <span class="desc"> Hire developers</span>
                                                <span class="label label-warning"> tommorow</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="view-all">
                                <a href="javascript:void(0)">
                                    See all tasks <i class="fa fa-arrow-circle-o-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- end: TO-DO DROPDOWN-->

                    <!-- start: NOTIFICATION DROPDOWN -->
                    <!-- <li class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true"
                            href="#">
                            <i class="clip-notification-2"></i>
                            <span class="badge"> 11</span>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li>
                                <span class="dropdown-menu-title"> You have 11 notifications</span>
                            </li>
                            <li>
                                <div class="drop-down-wrapper">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-primary"><i class="fa fa-user"></i></span>
                                                <span class="message"> New user registration</span>
                                                <span class="time"> 1 min</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                <span class="message"> New comment</span>
                                                <span class="time"> 7 min</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                <span class="message"> New comment</span>
                                                <span class="time"> 8 min</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                <span class="message"> New comment</span>
                                                <span class="time"> 16 min</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-primary"><i class="fa fa-user"></i></span>
                                                <span class="message"> New user registration</span>
                                                <span class="time"> 36 min</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-warning"><i
                                                        class="fa fa-shopping-cart"></i></span>
                                                <span class="message"> 2 items sold</span>
                                                <span class="time"> 1 hour</span>
                                            </a>
                                        </li>
                                        <li class="warning">
                                            <a href="javascript:void(0)">
                                                <span class="label label-danger"><i class="fa fa-user"></i></span>
                                                <span class="message"> User deleted account</span>
                                                <span class="time"> 2 hour</span>
                                            </a>
                                        </li>
                                        <li class="warning">
                                            <a href="javascript:void(0)">
                                                <span class="label label-danger"><i
                                                        class="fa fa-shopping-cart"></i></span>
                                                <span class="message"> Transaction was canceled</span>
                                                <span class="time"> 6 hour</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                <span class="message"> New comment</span>
                                                <span class="time"> yesterday</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-primary"><i class="fa fa-user"></i></span>
                                                <span class="message"> New user registration</span>
                                                <span class="time"> yesterday</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-primary"><i class="fa fa-user"></i></span>
                                                <span class="message"> New user registration</span>
                                                <span class="time"> yesterday</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                <span class="message"> New comment</span>
                                                <span class="time"> yesterday</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <span class="label label-success"><i class="fa fa-comment"></i></span>
                                                <span class="message"> New comment</span>
                                                <span class="time"> yesterday</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="view-all">
                                <a href="javascript:void(0)">
                                    See all notifications <i class="fa fa-arrow-circle-o-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- end: NOTIFICATION DROPDOWN -->

                    <!-- start: MESSAGE DROPDOWN -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown"
                            href="#">
                            <i class="clip-bubble-3"></i>
                            <span class="badge"> 9</span>
                        </a>
                        <ul class="dropdown-menu posts">
                            <li>
                                <span class="dropdown-menu-title"> You have 9 messages</span>
                            </li>
                            <li>
                                <div class="drop-down-wrapper">
                                    <ul>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="clearfix">
                                                    <div class="thread-image">
                                                        <img alt="" src="">
                                                    </div>
                                                    <div class="thread-content">
                                                        <span class="author">Nicole Bell</span>
                                                        <span class="preview">Duis mollis, est non commodo luctus, nisi
                                                            erat porttitor ligula, eget lacinia odio sem nec
                                                            elit.</span>
                                                        <span class="time"> Just Now</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="clearfix">
                                                    <div class="thread-image">
                                                        <img alt="" src="">
                                                    </div>
                                                    <div class="thread-content">
                                                        <span class="author">Peter Clark</span>
                                                        <span class="preview">Duis mollis, est non commodo luctus, nisi
                                                            erat porttitor ligula, eget lacinia odio sem nec
                                                            elit.</span>
                                                        <span class="time">2 mins</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="clearfix">
                                                    <div class="thread-image">
                                                        <img alt="" src="">
                                                    </div>
                                                    <div class="thread-content">
                                                        <span class="author">Steven Thompson</span>
                                                        <span class="preview">Duis mollis, est non commodo luctus, nisi
                                                            erat porttitor ligula, eget lacinia odio sem nec
                                                            elit.</span>
                                                        <span class="time">8 hrs</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="clearfix">
                                                    <div class="thread-image">
                                                        <img alt="" src="">
                                                    </div>
                                                    <div class="thread-content">
                                                        <span class="author">Peter Clark</span>
                                                        <span class="preview">Duis mollis, est non commodo luctus, nisi
                                                            erat porttitor ligula, eget lacinia odio sem nec
                                                            elit.</span>
                                                        <span class="time">9 hrs</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="clearfix">
                                                    <div class="thread-image">
                                                        <img alt="" src="">
                                                    </div>
                                                    <div class="thread-content">
                                                        <span class="author">Kenneth Ross</span>
                                                        <span class="preview">Duis mollis, est non commodo luctus, nisi
                                                            erat porttitor ligula, eget lacinia odio sem nec
                                                            elit.</span>
                                                        <span class="time">14 hrs</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="view-all">
                                <a href="pages_messages.html">
                                    See all messages <i class="fa fa-arrow-circle-o-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end: MESSAGE DROPDOWN -->

                    <!-- start: USER DROPDOWN -->
                    <li class="dropdown current-user">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true"
                            href="#">
                            <img src="<?=base_url("assets/admin/images/avatar-1-small.jpg")?>" class="circle-img"
                                alt="">
                            <span class="username"><?=$nama_user?></span>
                            <i class="clip-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- <li>
                                <a href="<?=base_url()?>">
                                    <i class="clip-user-2"></i>
                                    &nbsp;My Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>">
                                    <i class="clip-calendar"></i>
                                    &nbsp;My Calendar
                                </a>
                            <li>
                                <a href="<?=base_url()?>">
                                    <i class="clip-bubble-4"></i>
                                    &nbsp;My Messages (3)
                                </a>
                            </li>
                            <li class="divider"></li> -->

                            <li>
                                <a href="" data-target="#modal_edit_password" data-toggle="modal"><i
                                        class="clip-locked"></i>
                                    &nbsp;Ubah Password </a>
                            </li>
                            <li>
                                <a href="<?=base_url().'users/logout'?>">
                                    <i class="clip-exit"></i>
                                    &nbsp;Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end: USER DROPDOWN -->
                </ul>
                <!-- end: TOP NAVIGATION MENU -->
            </div>
        </div>
        <!-- end: TOP NAVIGATION CONTAINER -->
    </div>
    <!-- end: HEADER -->

    <div class="main-container">
			<div class="navbar-content">
				<div class="main-navigation navbar-collapse collapse">
					<div class="navigation-toggler">
						<i class="clip-chevron-left"></i>
						<i class="clip-chevron-right"></i>
					</div>

					<ul class="main-navigation-menu">

                        <?php if (isset($menus)) echo $menus ?>

                    </ul>
            </div>
        </div>
    </div>