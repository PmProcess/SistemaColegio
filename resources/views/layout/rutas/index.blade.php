<div class="menu-item">
    <div class="menu-content pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
    </div>
</div>
<div class="menu-item">
    <a class="menu-link @yield('dashboard-active')" href="../../demo1/dist/index.html">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                        fill="black" />
                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                        fill="black" />
                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                        fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Default</span>
    </a>
</div>
{{-- <div class="menu-item">
    <div class="menu-content pt-8 pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Crafted</span>
    </div>
</div> --}}

<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link @yield('personas-active')">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                        fill="black" />
                    <path
                        d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z"
                        fill="black" />
                    <path opacity="0.3"
                        d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                        fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Personal</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion @yield('personas-show')">
        <div class="menu-item">
            <a class="menu-link @yield('tiposEmpleados-active')" href="{{route('tipoEmpleado.index')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Tipos de Empleados</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link @yield('empleados-active')"  href="{{route('empleado.index')}}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Empleados</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="../../demo1/dist/apps/customers/list.html">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Roles</span>
            </a>
        </div>
    </div>
    {{-- <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Profile</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/profile/overview.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Overview</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/profile/projects.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Projects</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/profile/campaigns.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Campaigns</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/profile/documents.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Documents</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/profile/connections.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Connections</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/profile/activity.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Activity</span>
                    </a>
                </div>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Projects</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/projects/list.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">My Projects</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/projects/project.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">View Project</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/projects/targets.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Targets</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/projects/budget.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Budget</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/projects/users.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Users</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/projects/files.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Files</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/projects/activity.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Activity</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/projects/settings.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Settings</span>
                    </a>
                </div>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Wizards</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/wizards/horizontal.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Horizontal</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/wizards/vertical.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Vertical</span>
                    </a>
                </div>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Search</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/search/horizontal.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Horizontal</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/search/vertical.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Vertical</span>
                    </a>
                </div>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Blog</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link" href="../../demo1/dist/pages/blog/home.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Blog Home</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="../../demo1/dist/pages/blog/post.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Blog Post</span>
                    </a>
                </div>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Company</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/company/about.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">About Us</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/company/pricing.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Pricing</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/company/contact.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Contact Us</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/company/team.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Our Team</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/company/licenses.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Licenses</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/company/sitemap.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Sitemap</span>
                    </a>
                </div>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Careers</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/careers/list.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Careers List</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/careers/apply.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Careers Apply</span>
                    </a>
                </div>
            </div>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
            <span class="menu-link">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">FAQ</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/faq/classic.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Classic</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="../../demo1/dist/pages/faq/extended.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Extended</span>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
</div>
