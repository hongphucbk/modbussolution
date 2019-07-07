<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if(Auth::check())
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="source/images/users/1.jpg" alt="user-img" class="img-circle"><span class="" style="color: green">{{ Auth::user()->name }}</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                        <!-- <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li> -->
                        <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                @endif
                <!-- <li class="nav-small-cap">--- PERSONAL</li> -->
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <!-- <ul aria-expanded="false" class="collapse">
                        <li><a href="index.html">Minimal </a></li>
                        <li><a href="index2.html">Analytical</a></li>
                        <li><a href="index3.html">Demographical</a></li>
                        <li><a href="index4.html">Modern</a></li>
                    </ul> -->
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-accordion-merged"></i><span class="hide-menu">USER</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="admin/user-group">User Group</a></li>
                        <li><a href="admin/user">User</a></li>
                        <li><a href="admin/user-role">User Role</a></li>
                        <li><a href="admin/role">Role</a></li>
                        
                    </ul>
                </li>
                <!-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Helpdesk</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="admin/app/helpdesk">Support Ticket</a></li>
                        <li><a href="admin/app/category">Category</a></li>
                         
                    </ul>
                </li> -->
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Apps Modbus TCP</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="admin/app/modbustcp/device">Device</a></li>
                        <li><a href="admin/app/modbustcp/parameter">Parameter</a></li>
                        <li><a href="admin/app/modbustcp/control">Control</a></li>
                        <li><a href="admin/app/modbustcp/value">Value</a></li>
                        <li><a href="admin/app/modbustcp/chart">Chart</a></li>
                        <li><a href="admin/app/modbustcp/export">Export</a></li>
                        <li><a href="admin/app/modbustcp/realtime">Realtime</a></li>
                        <!-- <li><a href="app-contact.html">Contact / Employee</a></li>
                        <li><a href="app-contact2.html">Contact Grid</a></li>
                        <li><a href="app-contact-detail.html">Contact Detail</a></li> -->
                    </ul>
                </li>

                <!-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-bars"></i><span class="hide-menu">Courses</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="admin/app/course/info">All Courses</a></li>
                        <li><a href="admin/app/course/info/add">Add Course</a></li>
                        <li><a href="admin/app/course/category">All Category</a></li>
                    </ul>
                </li> -->
                        
                <!-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Inbox</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="app-email.html">Mailbox</a></li>
                        <li><a href="app-email-detail.html">Mailbox Detail</a></li>
                        <li><a href="app-compose.html">Compose Mail</a></li>
                    </ul>
                </li> -->
                <!-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-palette"></i><span class="hide-menu">Ui Elements <span class="badge badge-pill badge-primary text-white ml-auto">25</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-user-card.html">User Cards</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-tab.html">Tab</a></li>
                        <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>
                        <li><a href="ui-tooltip-stylish.html">Tooltip stylish</a></li>
                        <li><a href="ui-sweetalert.html">Sweet Alert</a></li>
                       
                        <li><a href="ui-date-paginator.html">Date-paginator</a></li>
                        <li><a href="ui-dragable-portlet.html">Dragable Portlet</a></li>
                    </ul>
                </li> -->
                <!-- <li class="nav-small-cap">--- FORMS, TABLE &amp; WIDGETS</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Forms</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="form-basic.html">Basic Forms</a></li>
                        <li><a href="form-layout.html">Form Layouts</a></li>
                        
                        <li><a href="form-xeditable.html">Xeditable Editor</a></li>
                        <li><a href="form-summernote.html">Summernote Editor</a></li>
                        <li><a href="form-tinymce.html">Tinymce Editor</a></li>
                    </ul>
                </li> -->
                
                <!-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Widgets</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="widget-data.html">Data Widgets</a></li>
                        <li><a href="widget-apps.html">Apps Widgets</a></li>
                        <li><a href="widget-charts.html">Charts Widgets</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- EXTRA COMPONENTS</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-gallery"></i><span class="hide-menu">Page Layout</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="layout-single-column.html">1 Column</a></li>
                        <li><a href="layout-fix-header.html">Fix header</a></li>
                        <li><a href="layout-fix-sidebar.html">Fix sidebar</a></li>
                        <li><a href="layout-fix-header-sidebar.html">Fixe header &amp; Sidebar</a></li>
                        <li><a href="layout-boxed.html">Boxed Layout</a></li>
                        <li><a href="layout-logo-center.html">Logo in Center</a></li>
                    </ul>
                </li> -->
               <!--  <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-files"></i><span class="hide-menu">Sample Pages <span class="badge badge-pill badge-info">25</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="starter-kit.html">Starter Kit</a></li>
                        <li><a href="pages-blank.html">Blank page</a></li>
                        <li><a href="javascript:void(0)" class="has-arrow">Authentication <span class="badge badge-pill badge-success pull-right">6</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="pages-login.html">Login 1</a></li>
                                <li><a href="pages-login-2.html">Login 2</a></li>
                                
                                <li><a href="pages-recover-password.html">Recover password</a></li>
                            </ul>
                        </li>
                        <li><a href="pages-profile.html">Profile page</a></li>
                        <li><a href="pages-animation.html">Animation</a></li>
                        <li><a href="pages-fix-innersidebar.html">Sticky Left sidebar</a></li>
                        <li><a href="pages-fix-inner-right-sidebar.html">Sticky Right sidebar</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-treeview.html">Treeview</a></li>
                        <li><a href="pages-utility-classes.html">Helper Classes</a></li>
                        <li><a href="pages-search-result.html">Search result</a></li>
                        <li><a href="pages-scroll.html">Scrollbar</a></li>
                        <li><a href="pages-pricing.html">Pricing</a></li>
                        <li><a href="pages-lightbox-popup.html">Lighbox popup</a></li>
                        <li><a href="pages-gallery.html">Gallery</a></li>
                        <li><a href="pages-faq.html">Faqs</a></li>
                        <li><a href="javascript:void(0)" class="has-arrow">Error Pages</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="pages-error-400.html">400</a></li>
                                <li><a href="pages-error-403.html">403</a></li>
                                <li><a href="pages-error-404.html">404</a></li>
                                <li><a href="pages-error-500.html">500</a></li>
                                <li><a href="pages-error-503.html">503</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-pie-chart"></i><span class="hide-menu">Charts</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="chart-morris.html">Morris Chart</a></li>
                        
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-light-bulb"></i><span class="hide-menu">Icons</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-simple-lineicon.html">Simple Line icons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-location-pin"></i><span class="hide-menu">Maps</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="map-google.html">Google Maps</a></li>
                    </ul>
                </li> -->
                <!-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)">item 1.1</a></li>
                        <li><a href="javascript:void(0)">item 1.2</a></li>
                        <li> <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)">item 1.3.1</a></li>
                                <li><a href="javascript:void(0)">item 1.3.2</a></li>
                                
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">item 1.4</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- SUPPORT</li>
                <li> <a class="waves-effect waves-dark" href="source/documentation/documentation.html" aria-expanded="false"><i class="fa fa-circle-o text-danger"></i><span class="hide-menu">Documentation</span></a></li>
                <li> <a class="waves-effect waves-dark" href="pages-login.html" aria-expanded="false"><i class="fa fa-circle-o text-success"></i><span class="hide-menu">Log Out</span></a></li>
                <li> <a class="waves-effect waves-dark" href="pages-faq.html" aria-expanded="false"><i class="fa fa-circle-o text-info"></i><span class="hide-menu">FAQs</span></a></li> -->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>