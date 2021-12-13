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
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
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
@if (auth()->user()->can('haveaccess', 'tipoEmpleado.index') ||
    auth()->user()->can('haveaccess', 'empleado.index'))
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link @yield('personas-active')">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                            fill="black" />
                        <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="black" />
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
            @if (auth()->user()->can('haveaccess', 'tipoEmpleado.index'))
                <div class="menu-item">
                    <a class="menu-link @yield('tiposEmpleados-active')" href="{{ route('tipoEmpleado.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Tipos de Empleados</span>
                    </a>
                </div>
            @endif

            @if (auth()->user()->can('haveaccess', 'empleado.index'))
                <div class="menu-item">
                    <a class="menu-link @yield('empleados-active')" href="{{ route('empleado.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Empleados</span>
                    </a>
                </div>
            @endif
        </div>
    </div>

@endif
@if (auth()->user()->can('haveaccess', 'rol.index'))
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link @yield('administracion-active')">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z"
                            fill="black" />
                        <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="black" />
                        <path opacity="0.3"
                            d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Administracion</span>
            <span class="menu-arrow"></span>
        </span>
        <div class="menu-sub menu-sub-accordion @yield('administracion-show')">

            @if (auth()->user()->can('haveaccess', 'rol.index'))
                <div class="menu-item ">
                    <a class="menu-link @yield('rol-active')" href="{{route('rol.index')}}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Roles</span>
                    </a>
                </div>
            @endif


        </div>
    </div>

@endif
