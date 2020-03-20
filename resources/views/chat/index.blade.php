<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soho - Chat and Discussion Platform</title>

    <link rel="icon" href="{{asset('chat/dist/media/img/favicon.png')}}" type="image/png">

    <link rel="stylesheet" href="{{asset('chat/dist/css/soho.min.css')}}">
</head>
<body onload="connect();">

<div class="page-loading"></div>


<div class="modal fade" id="disconnected" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="connection-error">
                    <h4 class="text-center">Application disconnected...</h4>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="862.899px" height="862.9px" viewBox="0 0 862.899 862.9" style="enable-background:new 0 0 862.899 862.9;" xml:space="preserve">
<g>
    <g>
        <circle cx="385.6" cy="656.1" r="79.8" />
        <path d="M561.7,401c-15.801-10.3-32.601-19.2-50.2-26.6c-39.9-16.9-82.3-25.5-126-25.5c-44.601,0-87.9,8.9-128.6,26.6
                                    c-39.3,17-74.3,41.3-104.1,72.2L253.5,545c34.899-36.1,81.8-56,132-56c49,0,95.1,19.1,129.8,53.8l25.4-25.399L493,469.7L561.7,401
                                    z" />
        <path d="M385.6,267.1c107.601,0,208.9,41.7,285.3,117.4l98.5-99.5c-50-49.5-108.1-88.4-172.699-115.6
                                    c-66.9-28.1-138-42.4-211.101-42.4c-73.6,0-145,14.4-212.3,42.9c-65,27.5-123.3,66.8-173.3,116.9l99,99
                                    C175.5,309.299,277.3,267.1,385.6,267.1z" />
        <polygon points="616.8,402.5 549.7,469.599 639.2,559.099 549.7,648.599 616.8,715.7 706.3,626.2 795.8,715.7 862.899,648.599
                                    773.399,559.099 862.899,469.599 795.8,402.5 706.3,492 		" />
    </g>
</g>
                        <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary btn-lg">Reconnect</button>
            </div>
        </div>
    </div>
</div>


<div class="modal call fade" id="call" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="call">
                    <div class="call-background" style="background: url(chat/dist/media/img/call-bg.png)"></div>
                    <div>
                        <figure class="mb-4 avatar avatar-xl">
                            <img src="{{asset('chat/dist/media/img/women_avatar1.jpg')}}" class="rounded-circle">
                        </figure>
                        <h4 class="text-center">Jennica Kindred calling ...</h4>
                        <div class="action-button">
                            <button type="button" class="btn btn-danger btn-floating btn-lg" data-dismiss="modal">
                                <i class="ti-close"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-pulse btn-floating btn-lg">
                                <i class="fa fa-phone"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addFriends" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="ti-user"></i> Add Friends
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">Send invitations to friends.</div>
                <form>
                    <div class="form-group">
                        <label for="emails" class="col-form-label">Email addresses</label>
                        <input type="text" class="form-control" id="emails">
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-form-label">Invitation message</label>
                        <textarea class="form-control" id="message"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="newGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-users"></i> New Group
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="group_name" class="col-form-label">Group name</label>
                        <input type="text" class="form-control" id="group_name">
                    </div>
                    <div class="form-group">
                        <label for="users" class="col-form-label">Users</label>
                        <input type="text" class="form-control" id="users" placeholder="Find user">
                    </div>
                    <div class="form-group">
                        <div class="avatar-group">
                            <figure class="avatar">
                                <span class="avatar-title bg-success rounded-circle">E</span>
                            </figure>
                            <figure class="avatar">
                                <img src="{{asset('chat/dist/media/img/women_avatar1.jpg')}}" class="rounded-circle">
                            </figure>
                            <figure class="avatar">
                                <span class="avatar-title bg-danger rounded-circle">S</span>
                            </figure>
                            <figure class="avatar">
                                <img src="{{asset('chat/dist/media/img/man_avatar2.jpg')}}" class="rounded-circle">
                            </figure>
                            <figure class="avatar">
                                <span class="avatar-title bg-info rounded-circle">C</span>
                            </figure>
                            <a href="#">
                                <figure class="avatar">
                                    <span class="avatar-title bg-primary rounded-circle">+</span>
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Create Group</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="ti-settings"></i> Settings
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="false">Notification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Security</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="account" role="tabpanel">
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Allow connected contacts</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch2">
                            <label class="custom-control-label" for="customSwitch2">Confirm message requests</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">Profile privacy</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch4">
                            <label class="custom-control-label" for="customSwitch4">Developer mode options</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch5">
                            <label class="custom-control-label" for="customSwitch5">Two-step security verification</label>
                        </div>
                    </div>
                    <div class="tab-pane" id="notification" role="tabpanel">
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch6">
                            <label class="custom-control-label" for="customSwitch6">Allow mobile notifications</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch7">
                            <label class="custom-control-label" for="customSwitch7">Notifications from your friends</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch8">
                            <label class="custom-control-label" for="customSwitch8">Send notifications by email</label>
                        </div>
                    </div>
                    <div class="tab-pane" id="contact" role="tabpanel">
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch9">
                            <label class="custom-control-label" for="customSwitch9">Suggest changing passwords every month.</label>
                        </div>
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" checked id="customSwitch10">
                            <label class="custom-control-label" for="customSwitch10">Let me know about suspicious entries to your account</label>
                        </div>
                        <div class="form-item">
                            <p>
                                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <span class="ti-plus btn-icon"></span> Security Questions
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Question 1">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Question 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="ti-pencil"></i> Profile Edit
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#social-links" role="tab" aria-controls="social-links" aria-selected="false">Social Links</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="personal" role="tabpanel">
                        <form>
                            <div class="form-group">
                                <label for="fullname" class="col-form-label">Fullname</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text">
<i class="ti-user"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" id="fullname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Avatar</label>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <figure class="avatar mr-3 item-rtl">
                                            <img src="{{asset('chat/dist/media/img/man_avatar3.jpg')}}" class="rounded-circle">
                                        </figure>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-form-label">City</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text">
<i class="ti-map-alt"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" id="city">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Phone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text">
<i class="ti-mobile"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" id="phone" placeholder="(555) 555 55 55">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="website" class="col-form-label">Website</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text">
<i class="ti-link"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" id="website">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="about" role="tabpanel">
                        <form action="">
                            <div class="form-group">
                                <label for="about-text" class="col-form-label">Write a few words that describe you</label>
                                <textarea class="form-control" id="about-text"></textarea>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">View profile</label>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="social-links" role="tabpanel">
                        <form action="">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text bg-facebook">
<i class="ti-facebook"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
 <span class="input-group-text bg-twitter">
<i class="ti-twitter"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text bg-instagram">
<i class="ti-instagram"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text bg-linkedin">
<i class="ti-linkedin"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text bg-dribbble">
<i class="ti-dribbble"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text bg-youtube">
<i class="ti-youtube"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text bg-google">
<i class="ti-google"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
<span class="input-group-text bg-whatsapp">
<i class="fa fa-whatsapp"></i>
</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<div class="layout">

    <nav class="navigation">
        <div class="nav-group">
            <ul>
                <li>
                    <a class="logo" href="#">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="33.004px" height="33.003px" viewBox="0 0 33.004 33.003" style="enable-background:new 0 0 33.004 33.003;" xml:space="preserve">
<g>
    <path d="M4.393,4.788c-5.857,5.857-5.858,15.354,0,21.213c4.875,4.875,12.271,5.688,17.994,2.447l10.617,4.161l-4.857-9.998
                                    c3.133-5.697,2.289-12.996-2.539-17.824C19.748-1.072,10.25-1.07,4.393,4.788z M25.317,22.149l0.261,0.512l1.092,2.142l0.006,0.01
                                    l1.717,3.536l-3.748-1.47l-0.037-0.015l-2.352-0.883l-0.582-0.219c-4.773,3.076-11.221,2.526-15.394-1.646
                                    C1.469,19.305,1.469,11.481,6.277,6.672c4.81-4.809,12.634-4.809,17.443,0.001C27.919,10.872,28.451,17.368,25.317,22.149z" />
    <g>
        <circle cx="9.835" cy="16.043" r="1.833" />
        <circle cx="15.502" cy="16.043" r="1.833" />
        <circle cx="21.168" cy="16.043" r="1.833" />
    </g>
</g>
                            <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
</svg>
                    </a>
                </li>
                <li>
                    <a data-navigation-target="chats" class="active" href="#">
                        <i class="ti-comment-alt"></i>
                    </a>
                </li>
                <li>
                    <a data-navigation-target="friends" href="#" class="notifiy_badge">
                        <i class="ti-user"></i>
                    </a>
                </li>
                <li data-navigation-target="favorites" class="brackets">
                    <a href="#">
                        <i class="ti-star"></i>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#editProfileModal">
                        <i class="ti-pencil"></i>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#settingModal">
                        <i class="ti-settings"></i>
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <i class="ti-power-off"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="content">

        <div class="sidebar-group">

            <div id="chats" class="sidebar active">
                <header>
                    <span>Chats</span>
                    <ul class="list-inline">
                        <li class="list-inline-item" data-toggle="tooltip" title="New Group">
                            <a class="btn btn-light" href="#" data-toggle="modal" data-target="#newGroup">
                                <i class="fa fa-users"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-light" data-toggle="tooltip" title="New Chat" href="#" data-navigation-target="friends">
                                <i class="ti-comment-alt"></i>
                            </a>
                        </li>
                        <li class="list-inline-item d-lg-none d-sm-block">
                            <a href="#" class="btn btn-light sidebar-close">
                                <i class="ti-close"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <form action="">
                    <input type="text" class="form-control" placeholder="Search chat">
                </form>
                <div class="sidebar-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <figure class="avatar avatar-state-success">
                                <img src="{{asset('chat/dist/media/img/man_avatar1.jpg')}}" class="rounded-circle">
                            </figure>
                            <div class="users-list-body">
                                <h5>Patsy Paulton</h5>
                                <p>Traditional heading elscas sdscsd sdcsdsc</p>
                                <div class="users-list-action">
                                    <div class="new-message-count">2</div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item open-chat">
                            <div>
                                <figure class="avatar">
                                    <img src="{{asset('chat/dist/media/img/man_avatar3.jpg')}}" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Karl Hubane</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="avatar-group">
                                <figure class="avatar">
<span class="avatar-title bg-warning bg-success rounded-circle">
<i class="fa fa-users"></i>
</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Entertainment Group</h5>
                                <p><strong>Maher Ruslandi: </strong>Hello!!!</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar avatar-state-warning">
                                    <img src="{{asset('chat/dist/media/img/women_avatar1.jpg')}}" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Jennica Kindred</h5>
                                <p>I know how important this file is to you. You can trust me ;)</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <span class="avatar-title bg-info rounded-circle">M</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Marvin Rohan</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="{{asset('chat/dist/media/img/man_avatar2.jpg')}}" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Frans Hanscombe</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <div id="friends" class="sidebar">
                <header>
                    <span>Friends</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="btn btn-light" href="#" data-toggle="modal" data-target="#addFriends">
                                <i class="ti-plus btn-icon"></i> Add Friends
                            </a>
                        </li>
                        <li class="list-inline-item d-lg-none d-sm-block">
                            <a href="#" class="btn btn-light sidebar-close">
                                <i class="ti-close"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <form action="">
                    <input type="text" class="form-control" placeholder="Search chat">
                </form>
                <div class="sidebar-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="{{asset('chat/dist/media/img/women_avatar5.jpg')}}" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Harrietta Souten</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <span class="avatar-title bg-success rounded-circle">A</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Aline McShee</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="{{asset('chat/dist/media/img/women_avatar1.jpg')}}" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Brietta Blogg</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="{{asset('chat/dist/media/img/man_avatar3.jpg')}}" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Karl Hubane</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="{{asset('chat/dist/media/img/man_avatar2.jpg')}}" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Jillana Tows</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <span class="avatar-title bg-info rounded-circle">AD</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Alina Derington</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <span class="avatar-title bg-warning rounded-circle">S</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Stevy Kermeen</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="{{asset('chat/dist/media/img/man_avatar1.jpg')}}" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Stevy Kermeen</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <img src="{{asset('chat/dist/media/img/man_avatar5.jpg')}}" class="rounded-circle">
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Gloriane Shimmans</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div>
                                <figure class="avatar">
                                    <span class="avatar-title bg-secondary rounded-circle">B</span>
                                </figure>
                            </div>
                            <div class="users-list-body">
                                <h5>Bernhard Perrett</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Open</a>
                                            <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <div id="favorites" class="sidebar">
                <header>
                    <span>Favorites</span>
                    <ul class="list-inline">
                        <li class="list-inline-item d-lg-none d-sm-block">
                            <a href="#" class="btn btn-light sidebar-close">
                                <i class="ti-close"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <form action="">
                    <input type="text" class="form-control" placeholder="Search favorites">
                </form>
                <div class="sidebar-body">
                    <ul class="list-group list-group-flush users-list">
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <h5>Jennica Kindred</h5>
                                <p>I know how important this file is to you. You can trust me ;)</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">View Chat</a>
                                            <a href="#" class="dropdown-item">Forward</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <h5>Marvin Rohan</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">View Chat</a>
                                            <a href="#" class="dropdown-item">Forward</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <h5>Frans Hanscombe</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">View Chat</a>
                                            <a href="#" class="dropdown-item">Forward</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="users-list-body">
                                <h5>Karl Hubane</h5>
                                <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                                <div class="users-list-action action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="ti-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">View Chat</a>
                                            <a href="#" class="dropdown-item">Forward</a>
                                            <a href="#" class="dropdown-item">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>


        <div class="chat">
            <div class="chat-header">
                <div class="chat-header-user">
                    <figure class="avatar avatar-lg">
                        <img src="{{$user['portrait']}}" class="rounded-circle">
                    </figure>
                    <div>
                        <h5>Karl Hubane</h5>
                        <small class="text-muted">
                            <i>Online</i>
                        </small>
                    </div>
                </div>
                <div class="chat-header-action">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-success">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-secondary">
                                <i class="fa fa-video-camera" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-secondary" data-toggle="dropdown">
                                <i class="ti-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" data-navigation-target="contact-information" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Add to archive</a>
                                <a href="#" class="dropdown-item">Delete</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Block</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="chat-body">

                <div class="messages">
                    <div class="message-item outgoing-message">
                        <div class="message-content">
                            Hey, Maher! I'm waiting for you to send me the files.
                        </div>
                        <div class="message-action">
                            Am 09:34 <i class="ti-double-check"></i>
                        </div>
                    </div>
                    <div class="message-item">
                        <div class="message-content">
                            I'm sorry :( I'll send you as soon as possible.
                        </div>
                        <div class="message-action">
                            Pm 14:20
                        </div>
                    </div>
                    <div class="message-item outgoing-message">
                        <div class="message-content">
                            I'm waiting. Thank you :)
                        </div>
                        <div class="message-action">
                            Pm 14:25 <i class="ti-double-check"></i>
                        </div>
                    </div>
                    <div class="message-item">
                        <div class="message-content">
                            I'm sending files now.
                        </div>
                        <div class="message-action">
                            Pm 14:20
                        </div>
                    </div>
                    <div class="message-item">
                        <div class="message-content message-file">
                            <div class="file-icon">
                                <i class="ti-file"></i>
                            </div>
                            <div>
                                <div>important_documents.pdf <i class="text-muted small">(50KB)</i></div>
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="#">Download</a></li>
                                    <li class="list-inline-item"><a href="#">View</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="message-action">
                            Pm 14:25
                        </div>
                    </div>
                    <div class="message-item outgoing-message">
                        <div class="message-content">
                            Thank you so much. After I review these files, I will give you my opinion. If there's a problem, you can send it back. Good luck with!
                        </div>
                        <div class="message-action">
                            Pm 14:50 <i title="Message could not be sent" class="ti-info-alt text-danger"></i>
                        </div>
                    </div>
                    <div class="message-item">
                        <div class="message-content">
                            I can't wait
                        </div>
                        <div class="message-action">
                            Pm 15:00
                        </div>
                    </div>
                    <div class="message-item outgoing-message">
                        <div class="message-content">
                            I know how important this file is to you. You can trust me ;)
                        </div>
                        <div class="message-action">
                            Pm 14:50 <i class="ti-double-check"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-footer">
                <form action="">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="form-buttons">
                        <button class="btn btn-light btn-floating" type="button">
                            <i class="fa fa-paperclip"></i>
                        </button>
                        <button class="btn btn-light btn-floating" type="button">
                            <i class="fa fa-microphone"></i>
                        </button>
                        <button class="btn btn-primary btn-floating" type="submit">
                            <i class="fa fa-send"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="sidebar-group">
            <div id="contact-information" class="sidebar">
                <header>
                    <span>About</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn btn-light sidebar-close">
                                <i class="ti-close"></i>
                            </a>
                        </li>
                    </ul>
                </header>
                <div class="sidebar-body">
                    <div class="pl-4 pr-4 text-center">
                        <figure class="avatar avatar-state-danger avatar-xl mb-4">
                            <img src="{{asset('chat/dist/media/img/women_avatar5.jpg')}}" class="rounded-circle">
                        </figure>
                        <h5 class="text-primary">Frans Hanscombe</h5>
                        <p class="text-muted">Last seen: Today</p>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>About</h6>
                        <p class="text-muted">I love reading, traveling and discovering new things. You need to be happy in life.</p>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>Phone</h6>
                        <p class="text-muted">(555) 555 55 55</p>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>Media</h6>
                        <div class="files">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
<span class="avatar-title bg-warning">
 <i class="fa fa-file-pdf-o"></i>
</span>
                                        </figure>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
                                            <img src="{{asset('chat/dist/media/img/women_avatar1.jpg')}}">
                                        </figure>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
                                            <img src="{{asset('chat/dist/media/img/women_avatar3.jpg')}}">
                                        </figure>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
                                            <img src="{{asset('chat/dist/media/img/women_avatar4.jpg')}}">
                                        </figure>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
<span class="avatar-title bg-success">
<i class="fa fa-file-excel-o"></i>
</span>
                                        </figure>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <figure class="avatar avatar-lg">
<span class="avatar-title bg-info">
<i class="fa fa-file-text-o"></i>
</span>
                                        </figure>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>City</h6>
                        <p class="text-muted">Germany / Berlin</p>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>Website</h6>
                        <p>
                            <a href="#">www.franshanscombe.com</a>
                        </p>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <h6>Social Links</h6>
                        <ul class="list-inline social-links">
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-whatsapp">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-google">
                                    <i class="fa fa-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-behance">
                                    <i class="fa fa-behance"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn btn-sm btn-floating btn-instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="pl-4 pr-4">
                        <div class="form-group">
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch11">
                                <label class="custom-control-label" for="customSwitch11">Block</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked="" id="customSwitch12">
                                <label class="custom-control-label" for="customSwitch12">Mute</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-item custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch13">
                                <label class="custom-control-label" for="customSwitch13">Get notification</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="https://www.jq22.com/jquery/jquery-1.10.2.js"></script>

<script src="{{asset('chat/vendor/popper.min.js')}}"></script>

<script src="{{asset('chat/vendor/bootstrap/bootstrap.min.js')}}"></script>

<script src="{{asset('chat/vendor/jquery.nicescroll.min.js')}}"></script>

<script src="{{asset('chat/dist/js/soho.min.js')}}"></script>

<script src="{{asset('chat/dist/js/examples.js')}}"></script>

<script type="text/javascript">


    // 连接服务端
    function connect() {
        // 创建websocket
        ws = new WebSocket("ws://chat.jmpj.xyz:2346");
        // 当socket连接打开时，输入用户名
        ws.onopen = onopen;
        // 当有消息时根据消息类型显示不同信息
        ws.onmessage = onmessage;
        ws.onclose = function() {
            console.log("连接关闭，定时重连");
            connect();
        };
        ws.onerror = function() {
            console.log("出现错误");
        };
    }



    // 连接建立时发送登录信息
    function onopen()
    {

        // 登录
        var login_data = '{"type":"login","client_name":"'+name.replace(/"/g, '\\"')+'","room_id":"<?php echo isset($_GET['room_id']) ? $_GET['room_id'] : 1?>"}';
        console.log("websocket握手成功，发送登录数据:"+login_data);
        ws.send(login_data);
    }

    // 服务端发来消息时
    function onmessage(e)
    {
        console.log(e.data);
        var data = JSON.parse(e.data);
        switch(data['type']){
            // 服务端ping客户端
            case 'ping':
                ws.send('{"type":"pong"}');
                break;
            // 登录 更新用户列表
            case 'login':
                //{"type":"login","client_id":xxx,"client_name":"xxx","client_list":"[...]","time":"xxx"}
                say(data['client_id'], data['client_name'],  data['client_name']+' 加入了聊天室', data['time']);
                if(data['client_list'])
                {
                    client_list = data['client_list'];
                }
                else
                {
                    client_list[data['client_id']] = data['client_name'];
                }

                flush_client_list();
                console.log(data['client_name']+"登录成功");
                break;
            // 发言
            case 'say':
                //{"type":"say","from_client_id":xxx,"to_client_id":"all/client_id","content":"xxx","time":"xxx"}
                say(data['from_client_id'], data['from_client_name'], data['content'], data['time']);
                break;
            // 用户退出 更新用户列表
            case 'logout':
                //{"type":"logout","client_id":xxx,"time":"xxx"}
                say(data['from_client_id'], data['from_client_name'], data['from_client_name']+' 退出了', data['time']);
                delete client_list[data['from_client_id']];
                flush_client_list();
        }
    }
</script>
</body>
</html>
