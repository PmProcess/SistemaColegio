<template>
    <div>
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div
                id="kt_toolbar_container"
                class="container-fluid d-flex flex-stack"
            >
                <!--begin::Page title-->
                <div
                    data-kt-swapper="true"
                    data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="
                        page-title
                        d-flex
                        align-items-center
                        flex-wrap
                        me-3
                        mb-5 mb-lg-0
                    "
                >
                    <!--begin::Title-->
                    <h1
                        class="
                            d-flex
                            align-items-center
                            text-dark
                            fw-bolder
                            fs-3
                            my-1
                        "
                    >
                        Empleado
                    </h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span
                        class="h-20px border-gray-200 border-start mx-4"
                    ></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul
                        class="
                            breadcrumb breadcrumb-separatorless
                            fw-bold
                            fs-7
                            my-1
                        "
                    >
                        <!--begin::Item-->
                        <!-- <li class="breadcrumb-item text-muted">
                            <a
                                href="../../demo1/dist/index.html"
                                class="text-muted text-hover-primary"
                                >Home</a
                            >
                        </li> -->
                        <!--end::Item-->
                        <!--begin::Item-->
                        <!-- <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li> -->
                        <!--end::Item-->
                        <!--begin::Item-->
                        <!-- <li class="breadcrumb-item text-muted">Customers</li> -->
                        <!--end::Item-->
                        <!--begin::Item-->
                        <!-- <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li> -->
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">
                            Lista de Empleados
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <!-- <div class="d-flex align-items-center py-1">
                    <a href="#" class="btn btn-sm btn-primary"
                        ><i class="fa fa-plus"></i> Create</a
                    >
                </div> -->
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 p-1">
                                <!--begin::Stepper-->
                                <div
                                    class="
                                        stepper stepper-links
                                        d-flex
                                        flex-column
                                        pt-15
                                    "
                                    id="kt_create_account_stepper"
                                >
                                    <!--begin::Nav-->
                                    <div class="stepper-nav mb-5">
                                        <!--begin::Step 1-->
                                        <div
                                            class="stepper-item current"
                                            data-kt-stepper-element="nav"
                                        >
                                            <h3 class="stepper-title">
                                                Datos Personales
                                            </h3>
                                        </div>
                                        <!--end::Step 1-->
                                        <!--begin::Step 2-->
                                        <div
                                            class="stepper-item"
                                            data-kt-stepper-element="nav"
                                        >
                                            <h3 class="stepper-title">
                                                Datos Usuario
                                            </h3>
                                        </div>
                                        <!--end::Step 2-->
                                    </div>
                                    <!--end::Nav-->
                                    <!--begin::Form-->
                                    <form
                                        :action="ruta"
                                        method="POST"
                                        enctype="multipart/form-data"
                                    >
                                        <!--begin::Step 1-->
                                        <div
                                            class="current"
                                            data-kt-stepper-element="content"
                                        >
                                            <div class="container-fluid p-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <input
                                                                    type="hidden"
                                                                    name="_token"
                                                                    :value="
                                                                        csrf
                                                                    "
                                                                />
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Tipo
                                                                        Documento</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica el tipo de Documento"
                                                                    ></i>
                                                                </label>
                                                                <select
                                                                    class="
                                                                        form-select
                                                                        form-select-white
                                                                    "
                                                                    name="tipo_documento"
                                                                    id="tipo_documento"
                                                                    v-model="
                                                                        modelo.tipo_documento
                                                                    "
                                                                    :class="
                                                                        errores
                                                                            .tipo_documento
                                                                            .error
                                                                            ? 'is-invalid'
                                                                            : ''
                                                                    "
                                                                    data-control="select2"
                                                                    data-placeholder="Select an option"
                                                                >
                                                                    <option></option>
                                                                    <option
                                                                        value="DNI"
                                                                    >
                                                                        DNI
                                                                    </option>
                                                                    <option
                                                                        value="RUC"
                                                                    >
                                                                        RUC
                                                                    </option>
                                                                </select>
                                                                <div
                                                                    class="
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    {{
                                                                        errores
                                                                            .tipo_documento
                                                                            .mensaje
                                                                    }}
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Numero
                                                                        Documento</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica el Numero de Documento"
                                                                    ></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <input
                                                                    v-if="
                                                                        modelo.tipo_documento ==
                                                                        'DNI'
                                                                    "
                                                                    type="text"
                                                                    class="
                                                                        form-control
                                                                        form-control-sm
                                                                        form-control-solid
                                                                    "
                                                                    v-model="
                                                                        modelo.dni
                                                                    "
                                                                    name="dni"
                                                                />
                                                                <input
                                                                    v-else-if="
                                                                        modelo.tipo_documento ==
                                                                        'RUC'
                                                                    "
                                                                    type="text"
                                                                    class="
                                                                        form-control
                                                                        form-control-sm
                                                                        form-control-solid
                                                                    "
                                                                    v-model="
                                                                        modelo.ruc
                                                                    "
                                                                    name="ruc"
                                                                />
                                                                <div
                                                                    v-if="
                                                                        errores
                                                                            .dni
                                                                            .error ||
                                                                        errores
                                                                            .ruc
                                                                            .error
                                                                    "
                                                                    class="
                                                                        fv-plugins-message-container
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    <div
                                                                        data-field="text_input"
                                                                        data-validator="notEmpty"
                                                                    >
                                                                        {{
                                                                            errores
                                                                                .tipo_documento
                                                                                .error ==
                                                                            false
                                                                                ? errores
                                                                                      .dni
                                                                                      .mensaje ==
                                                                                  ""
                                                                                    ? errores
                                                                                          .ruc
                                                                                          .mensaje
                                                                                    : errores
                                                                                          .dni
                                                                                          .mensaje
                                                                                : ""
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row"
                                                            v-if="
                                                                modelo.tipo_documento ==
                                                                'RUC'
                                                            "
                                                        >
                                                            <div
                                                                class="
                                                                    col-md-12
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Nombre
                                                                        Comercial</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica el Nombre Comercial"
                                                                    ></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <input
                                                                    type="text"
                                                                    class="
                                                                        form-control
                                                                        form-control-sm
                                                                        form-control-solid
                                                                    "
                                                                    name="nombre_comercial"
                                                                />
                                                                <div
                                                                    v-if="
                                                                        errores
                                                                            .nombre_comercial
                                                                            .error
                                                                    "
                                                                    class="
                                                                        fv-plugins-message-container
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    <div
                                                                        data-field="text_input"
                                                                        data-validator="notEmpty"
                                                                    >
                                                                        {{
                                                                            errores
                                                                                .nombre_comercial
                                                                                .mensaje
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row"
                                                            v-else-if="
                                                                modelo.tipo_documento ==
                                                                'DNI'
                                                            "
                                                        >
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Nombres</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica el Nombre"
                                                                    ></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <input
                                                                    type="text"
                                                                    v-model="
                                                                        modelo.nombres
                                                                    "
                                                                    class="
                                                                        form-control
                                                                        form-control-sm
                                                                        form-control-solid
                                                                    "
                                                                    name="nombres"
                                                                />
                                                                <div
                                                                    v-if="
                                                                        errores
                                                                            .nombres
                                                                            .error
                                                                    "
                                                                    class="
                                                                        fv-plugins-message-container
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    <div
                                                                        data-field="text_input"
                                                                        data-validator="notEmpty"
                                                                    >
                                                                        {{
                                                                            errores
                                                                                .nombres
                                                                                .mensaje
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Apellidos</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica los apellidos"
                                                                    ></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <input
                                                                    type="text"
                                                                    v-model="
                                                                        modelo.apellidos
                                                                    "
                                                                    class="
                                                                        form-control
                                                                        form-control-sm
                                                                        form-control-solid
                                                                    "
                                                                    name="apellidos"
                                                                />
                                                                <div
                                                                    v-if="
                                                                        errores
                                                                            .apellidos
                                                                            .error
                                                                    "
                                                                    class="
                                                                        fv-plugins-message-container
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    <div
                                                                        data-field="text_input"
                                                                        data-validator="notEmpty"
                                                                    >
                                                                        {{
                                                                            errores
                                                                                .apellidos
                                                                                .mensaje
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Departamento</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica el departamento"
                                                                    ></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <select
                                                                    class="
                                                                        form-select
                                                                        form-select-white
                                                                    "
                                                                    id="departamento_id"
                                                                    data-control="select2"
                                                                    data-placeholder="Seleciona una opcion"
                                                                >
                                                                    <option
                                                                        value=""
                                                                    ></option>
                                                                    <option
                                                                        v-for="item in departamentos"
                                                                        :key="
                                                                            item.id
                                                                        "
                                                                        :value="
                                                                            item.id
                                                                        "
                                                                    >
                                                                        {{
                                                                            item.nombre
                                                                        }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Provincia</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica La Provincia"
                                                                    ></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <select
                                                                    class="
                                                                        form-select
                                                                        form-select-white
                                                                    "
                                                                    id="provincia_id"
                                                                    data-control="select2"
                                                                    data-placeholder="Seleciona una opcion"
                                                                ></select>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Distrito</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica el Nombre Comercial"
                                                                    ></i>
                                                                </label>
                                                                <!--end::Label-->
                                                                <select
                                                                    class="
                                                                        form-select
                                                                        form-select-white
                                                                    "
                                                                    :class="
                                                                        errores
                                                                            .distrito_id
                                                                            .error
                                                                            ? 'is-invalid'
                                                                            : ''
                                                                    "
                                                                    name="distrito_id"
                                                                    id="distrito_id"
                                                                    data-control="select2"
                                                                    data-placeholder="Seleciona una opcion"
                                                                ></select>
                                                                <div
                                                                    class="
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    {{
                                                                        errores
                                                                            .distrito_id
                                                                            .mensaje
                                                                    }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div
                                                                class="
                                                                    col-md-12
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Direccion</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica la direccion"
                                                                    ></i>
                                                                </label>
                                                                <input
                                                                    type="text"
                                                                    class="
                                                                        form-control
                                                                        form-control-sm
                                                                        form-control-solid
                                                                    "
                                                                    v-model="
                                                                        modelo.direccion
                                                                    "
                                                                    name="direccion"
                                                                />
                                                                <div
                                                                    v-if="
                                                                        errores
                                                                            .direccion
                                                                            .error
                                                                    "
                                                                    class="
                                                                        fv-plugins-message-container
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    <div
                                                                        data-field="text_input"
                                                                        data-validator="notEmpty"
                                                                    >
                                                                        {{
                                                                            errores
                                                                                .direccion
                                                                                .mensaje
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Telefono</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica el Telefono"
                                                                    ></i>
                                                                </label>
                                                                <input
                                                                    type="number"
                                                                    v-model="
                                                                        modelo.telefono
                                                                    "
                                                                    class="
                                                                        form-control
                                                                        form-control-sm
                                                                        form-control-solid
                                                                    "
                                                                    name="telefono"
                                                                />
                                                                <div
                                                                    v-if="
                                                                        errores
                                                                            .telefono
                                                                            .error
                                                                    "
                                                                    class="
                                                                        fv-plugins-message-container
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    <div
                                                                        data-field="text_input"
                                                                        data-validator="notEmpty"
                                                                    >
                                                                        {{
                                                                            errores
                                                                                .telefono
                                                                                .mensaje
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Fecha
                                                                        Nacimiento</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica la Fecha Nacimiento"
                                                                    ></i>
                                                                </label>
                                                                <input
                                                                    type="date"
                                                                    v-model="
                                                                        modelo.fecha_nacimiento
                                                                    "
                                                                    class="
                                                                        form-control
                                                                        form-control-sm
                                                                        form-control-solid
                                                                    "
                                                                    name="fecha_nacimiento"
                                                                    id="fecha_nacimiento"
                                                                />
                                                                <div
                                                                    v-if="
                                                                        errores
                                                                            .fecha_nacimiento
                                                                            .error
                                                                    "
                                                                    class="
                                                                        fv-plugins-message-container
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    <div
                                                                        data-field="text_input"
                                                                        data-validator="notEmpty"
                                                                    >
                                                                        {{
                                                                            errores
                                                                                .fecha_nacimiento
                                                                                .mensaje
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Genero</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica el Genero"
                                                                    ></i>
                                                                </label>
                                                                <select
                                                                    class="
                                                                        form-select
                                                                        form-select-white
                                                                    "
                                                                    name="genero"
                                                                    id="genero"
                                                                    v-model="
                                                                        modelo.genero
                                                                    "
                                                                    data-control="select2"
                                                                    :class="
                                                                        errores
                                                                            .genero
                                                                            .error
                                                                            ? 'is-invalid'
                                                                            : ''
                                                                    "
                                                                    data-placeholder="Seleciona una opcion"
                                                                >
                                                                    <option
                                                                        value=""
                                                                    ></option>
                                                                    <option
                                                                        value="M"
                                                                    >
                                                                        MASCULINO
                                                                    </option>
                                                                    <option
                                                                        value="F"
                                                                    >
                                                                        FEMENINO
                                                                    </option>
                                                                </select>
                                                                <div
                                                                    class="
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    {{
                                                                        errores
                                                                            .genero
                                                                            .mensaje
                                                                    }}
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Estado
                                                                        Civil</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica El estado Civil"
                                                                    ></i>
                                                                </label>
                                                                <select
                                                                    class="
                                                                        form-select
                                                                        form-select-white
                                                                    "
                                                                    name="estado_civil"
                                                                    v-model="
                                                                        modelo.estado_civil
                                                                    "
                                                                    id="estado_civil"
                                                                    :class="
                                                                        errores
                                                                            .estado_civil
                                                                            .error
                                                                            ? 'is-invalid'
                                                                            : ''
                                                                    "
                                                                    data-control="select2"
                                                                    data-placeholder="Seleciona una opcion"
                                                                >
                                                                    <option
                                                                        value=""
                                                                    ></option>
                                                                    <option
                                                                        value="Casado"
                                                                    >
                                                                        Casado(a)
                                                                    </option>
                                                                    <option
                                                                        value="Viudo"
                                                                    >
                                                                        Viudo(a)
                                                                    </option>
                                                                    <option
                                                                        value="Soltero"
                                                                    >
                                                                        Soltero(a)
                                                                    </option>
                                                                </select>
                                                                <div
                                                                    class="
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    {{
                                                                        errores
                                                                            .estado_civil
                                                                            .mensaje
                                                                    }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Step 1-->
                                        <!--begin::Step 2-->
                                        <div data-kt-stepper-element="content">
                                            <div class="container-fluid p-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div
                                                                class="
                                                                    col-md-12
                                                                "
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Email</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica El email"
                                                                    ></i>
                                                                </label>
                                                                <input
                                                                    type="email"
                                                                    autocomplete="username"
                                                                    class="
                                                                        form-control
                                                                        form-control-solid
                                                                    "
                                                                    name="email"
                                                                />
                                                                <div
                                                                    v-if="
                                                                        errores
                                                                            .email
                                                                            .error
                                                                    "
                                                                    class="
                                                                        fv-plugins-message-container
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    <div
                                                                        data-field="text_input"
                                                                        data-validator="notEmpty"
                                                                    >
                                                                        {{
                                                                            errores
                                                                                .email
                                                                                .mensaje
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Password</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Especifica El password"
                                                                    ></i>
                                                                </label>
                                                                <input
                                                                    type="password"
                                                                    autocomplete="current-password"
                                                                    class="
                                                                        form-control
                                                                        form-control-solid
                                                                    "
                                                                    name="password"
                                                                />
                                                                <div
                                                                    v-if="
                                                                        errores
                                                                            .password
                                                                            .error
                                                                    "
                                                                    class="
                                                                        fv-plugins-message-container
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    <div
                                                                        data-field="text_input"
                                                                        data-validator="notEmpty"
                                                                    >
                                                                        {{
                                                                            errores
                                                                                .password
                                                                                .mensaje
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Confirm
                                                                        Password</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Ecribe el mismo password"
                                                                    ></i>
                                                                </label>
                                                                <input
                                                                    type="password"
                                                                    autocomplete="current-password"
                                                                    class="
                                                                        form-control
                                                                        form-control-solid
                                                                    "
                                                                    name="confirm_password"
                                                                />
                                                                <div
                                                                    v-if="
                                                                        errores
                                                                            .confirm_password
                                                                            .error
                                                                    "
                                                                    class="
                                                                        fv-plugins-message-container
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    <div
                                                                        data-field="text_input"
                                                                        data-validator="notEmpty"
                                                                    >
                                                                        {{
                                                                            errores
                                                                                .confirm_password
                                                                                .mensaje
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <label
                                                                    class="
                                                                        d-flex
                                                                        align-items-center
                                                                        fs-6
                                                                        fw-bold
                                                                        mt-4
                                                                        mb-2
                                                                    "
                                                                >
                                                                    <span
                                                                        class="
                                                                            required
                                                                        "
                                                                        >Tipo
                                                                        Empleado</span
                                                                    >
                                                                    <i
                                                                        class="
                                                                            fas
                                                                            fa-exclamation-circle
                                                                            ms-2
                                                                            fs-7
                                                                        "
                                                                        data-bs-toggle="tooltip"
                                                                        title="Selecciona el Tipo de Empleado"
                                                                    ></i>
                                                                </label>
                                                                <select
                                                                    class="
                                                                        form-select
                                                                        form-select-white
                                                                    "
                                                                    name="tipo_id"
                                                                    id="tipo_id"
                                                                    v-model="
                                                                        modelo.tipo_id
                                                                    "
                                                                    data-control="select2"
                                                                    :class="
                                                                        errores
                                                                            .tipo_id
                                                                            .error
                                                                            ? 'is-invalid'
                                                                            : ''
                                                                    "
                                                                    data-placeholder="Seleciona una opcion"
                                                                >
                                                                    <option
                                                                        value=""
                                                                    ></option>
                                                                    <option v-for="item in tipo_empleados" :key="item.id"
                                                                        :value="item.id"
                                                                    >
                                                                        {{item.tipo}}
                                                                    </option>
                                                                </select>
                                                                <div
                                                                    class="
                                                                        invalid-feedback
                                                                    "
                                                                >
                                                                    {{
                                                                        errores
                                                                            .tipo_id
                                                                            .mensaje
                                                                    }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="
                                                            col-md-6
                                                            text-center
                                                        "
                                                    >
                                                        <!--begin::Image input-->
                                                        <div
                                                            class="
                                                                image-input
                                                                image-input-empty
                                                            "
                                                            id="img_avatar_profile"
                                                            data-kt-image-input="true"
                                                        >
                                                            <!--begin::Image preview wrapper-->
                                                            <div
                                                                class="
                                                                    image-input-wrapper
                                                                    w-300px
                                                                    h-300px
                                                                "
                                                            ></div>
                                                            <!--end::Image preview wrapper-->
                                                            <!--begin::Edit button-->
                                                            <label
                                                                class="
                                                                    btn
                                                                    btn-icon
                                                                    btn-circle
                                                                    btn-active-color-primary
                                                                    w-25px
                                                                    h-25px
                                                                    bg-white
                                                                    shadow
                                                                "
                                                                data-kt-image-input-action="change"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-dismiss="click"
                                                                title="Change avatar"
                                                            >
                                                                <i
                                                                    class="
                                                                        bi
                                                                        bi-pencil-fill
                                                                        fs-7
                                                                    "
                                                                ></i>
                                                                <!--begin::Inputs-->
                                                                <input
                                                                    type="file"
                                                                    name="avatar"
                                                                    accept=".png, .jpg, .jpeg"
                                                                />
                                                                <input
                                                                    type="hidden"
                                                                    name="avatar_remove"
                                                                />
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Edit button-->
                                                            <!--begin::Cancel button-->
                                                            <span
                                                                class="
                                                                    btn
                                                                    btn-icon
                                                                    btn-circle
                                                                    btn-active-color-primary
                                                                    w-25px
                                                                    h-25px
                                                                    bg-white
                                                                    shadow
                                                                "
                                                                data-kt-image-input-action="cancel"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-dismiss="click"
                                                                title="Cancel avatar"
                                                            >
                                                                <i
                                                                    class="
                                                                        bi bi-x
                                                                        fs-2
                                                                    "
                                                                ></i>
                                                            </span>
                                                            <!--end::Cancel button-->

                                                            <!--begin::Remove button-->
                                                            <span
                                                                class="
                                                                    btn
                                                                    btn-icon
                                                                    btn-circle
                                                                    btn-active-color-primary
                                                                    w-25px
                                                                    h-25px
                                                                    bg-white
                                                                    shadow
                                                                "
                                                                data-kt-image-input-action="remove"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-dismiss="click"
                                                                title="Remove avatar"
                                                            >
                                                                <i
                                                                    class="
                                                                        bi bi-x
                                                                        fs-2
                                                                    "
                                                                ></i>
                                                            </span>
                                                            <!--end::Remove button-->
                                                        </div>
                                                        <!--end::Image input-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Step 2-->

                                        <!--begin::Actions-->
                                        <div class="d-flex flex-stack pt-15">
                                            <!--begin::Wrapper-->
                                            <div class="mr-2"></div>
                                            <div>
                                                <button
                                                    type="button"
                                                    class="
                                                        btn
                                                        btn-sm
                                                        btn-light-primary
                                                        me-3
                                                    "
                                                    data-kt-stepper-action="previous"
                                                >
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                                    <span
                                                        class="
                                                            svg-icon svg-icon-4
                                                            me-1
                                                        "
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                        >
                                                            <rect
                                                                opacity="0.5"
                                                                x="6"
                                                                y="11"
                                                                width="13"
                                                                height="2"
                                                                rx="1"
                                                                fill="black"
                                                            />
                                                            <path
                                                                d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                                fill="black"
                                                            />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Atras
                                                </button>
                                                <button
                                                    type="submit"
                                                    class="
                                                        btn btn-sm btn-primary
                                                        me-3
                                                    "
                                                    data-kt-stepper-action="submit"
                                                >
                                                    <span
                                                        class="indicator-label"
                                                        >Guardar
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                        <span
                                                            class="
                                                                svg-icon
                                                                svg-icon-3
                                                                ms-2
                                                                me-0
                                                            "
                                                        >
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                width="24"
                                                                height="24"
                                                                viewBox="0 0 24 24"
                                                                fill="none"
                                                            >
                                                                <rect
                                                                    opacity="0.5"
                                                                    x="18"
                                                                    y="13"
                                                                    width="13"
                                                                    height="2"
                                                                    rx="1"
                                                                    transform="rotate(-180 18 13)"
                                                                    fill="black"
                                                                />
                                                                <path
                                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                    fill="black"
                                                                />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon--></span
                                                    >
                                                    <!-- <span
                                                        class="
                                                            indicator-progress
                                                        "
                                                        >Please wait...
                                                        <span
                                                            class="
                                                                spinner-border
                                                                spinner-border-sm
                                                                align-middle
                                                                ms-2
                                                            "
                                                        ></span
                                                    ></span> -->
                                                </button>
                                                <button
                                                    type="button"
                                                    class="
                                                        btn btn-sm btn-primary
                                                    "
                                                    data-kt-stepper-action="next"
                                                >
                                                    Continuar
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                    <span
                                                        class="
                                                            svg-icon svg-icon-4
                                                            ms-1
                                                            me-0
                                                        "
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                        >
                                                            <rect
                                                                opacity="0.5"
                                                                x="18"
                                                                y="13"
                                                                width="13"
                                                                height="2"
                                                                rx="1"
                                                                transform="rotate(-180 18 13)"
                                                                fill="black"
                                                            />
                                                            <path
                                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                fill="black"
                                                            />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Stepper-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import "select2";
export default {
    props: [
        "departamentos",
        "provincias",
        "distritos",
        "old",
        "errores_laravel",
        "csrf",
        "error",
        "tipo_empleados",
    ],
    data() {
        return {
            modelo: {
                tipo_documento: null,
                direccion: null,
                telefono: null,
                fecha_nacimiento: null,
                genero: null,
                distrito_id: null,
                estado_civil: null,
                nombres: null,
                apellidos: null,
                dni: null,
                nombre_comercial: null,
                razon_social: null,
                ruc: null,
                email: null,
                confirm_password: null,
                password: null,
                tipo_id:null,
            },
            errores: {
                tipo_documento: {
                    error: false,
                    mensaje: "",
                },
                direccion: {
                    error: false,
                    mensaje: "",
                },
                telefono: {
                    error: false,
                    mensaje: "",
                },
                fecha_nacimiento: {
                    error: false,
                    mensaje: "",
                },
                genero: {
                    error: false,
                    mensaje: "",
                },
                distrito_id: {
                    error: false,
                    mensaje: "",
                },
                estado_civil: {
                    error: false,
                    mensaje: "",
                },
                nombres: {
                    error: false,
                    mensaje: "",
                },
                apellidos: {
                    error: false,
                    mensaje: "",
                },
                dni: {
                    error: false,
                    mensaje: "",
                },
                nombre_comercial: {
                    error: false,
                    mensaje: "",
                },
                razon_social: {
                    error: false,
                    mensaje: "",
                },
                ruc: {
                    error: false,
                    mensaje: "",
                },
                email: {
                    error: false,
                    mensaje: "",
                },
                confirm_password: {
                    error: false,
                    mensaje: "",
                },
                password: {
                    error: false,
                    mensaje: "",
                },
                tipo_id: {
                    error: false,
                    mensaje: "",
                },
            },
            ruta: "",
        };
    },
    created() {
        // this.modelo.
    },
    mounted() {
        let $this = this;
        $this.ruta = route("empleado.store");
        let old_values = Object.entries(this.old);
        old_values.forEach((value, index, array) => {
            if (value[0] != "_token") {
                if (value[0] == "distrito_id") {
                    $this.getUbigeoOld(value[1]);
                } else {
                    $this.modelo[value[0]] = value[1];
                }
            }
        });
        if (this.errores_laravel != null) {
            let errores_laravel_values = Object.entries(this.errores_laravel);
            errores_laravel_values.forEach((value, index, array) => {
                $this.errores[value[0]].error = true;
                $this.errores[value[0]].mensaje = value[1][0];
            });
        }
        if (this.error != null) {
            let error_value = Object.entries(this.error);
        }
        window.addEventListener("load", () => {
            $this.iniciarFormulario();
            $("#departamento_id").on("change", function (e) {
                $this.cargarProvincia(null);
            });
            $("#provincia_id").on("change", function (e) {
                $this.cargarDistrito(null);
            });
            $("#tipo_documento").on("change", function (e) {
                $this.modelo.tipo_documento = $("#tipo_documento").val();
            });
            $("#genero").on("change", function (e) {
                $this.modelo.genero = $("#genero").val();
            });
            $("#estado_civil").on("change", function (e) {
                $this.modelo.estado_civil = $("#estado_civil").val();
            });
            $("#distrito_id").on("change", function (e) {
                $this.modelo.distrito_id = $("#distrito_id").val();
            });
            $("#distrito_id").on("change", function (e) {
                $this.modelo.tipo_id = $("#tipo_id").val();
            });
        });
    },
    methods: {
        cargarProvincia: function (e) {
            let $this = this;
            let departamento = $("#departamento_id").val();
            $("#provincia_id").empty().trigger("change");
            $this.provincias.forEach((element) => {
                if (element.departamento_id == departamento) {
                    let newOption;
                    if (e == null) {
                        newOption = new Option(
                            element.nombre,
                            element.id,
                            false,
                            false
                        );
                    } else {
                        if (e.id == element.id) {
                            newOption = new Option(
                                element.nombre,
                                element.id,
                                true,
                                true
                            );
                        } else {
                            newOption = new Option(
                                element.nombre,
                                element.id,
                                false,
                                false
                            );
                        }
                    }
                    $("#provincia_id").append(newOption);
                }
            });
            $("#provincia_id").trigger("change");
        },
        cargarDistrito: function (e) {
            let $this = this;
            let provincia = $("#provincia_id").val();
            $("#distrito_id").empty().trigger("change");
            $this.distritos.forEach((element) => {
                if (element.provincia_id == provincia) {
                    let newOption;
                    if (e == null) {
                        newOption = new Option(
                            element.nombre,
                            element.id,
                            false,
                            false
                        );
                    } else {
                        if (e.id == element.id) {
                            newOption = new Option(
                                element.nombre,
                                element.id,
                                true,
                                true
                            );
                        } else {
                            newOption = new Option(
                                element.nombre,
                                element.id,
                                false,
                                false
                            );
                        }
                    }
                    $("#distrito_id").append(newOption);
                }
            });
            $("#distrito_id").trigger("change");
        },
        getUbigeoOld: function (distrito_id) {
            let $this = this;
            let distrito = null;
            let departamento = null;
            let provincia = null;
            distrito = this.distritos.find((e) => e.id == distrito_id);
            provincia = this.provincias.find(
                (e) => e.id == distrito.provincia.id
            );
            departamento = this.departamentos.find(
                (e) => e.id == provincia.departamento.id
            );
            $("#departamento_id").val(departamento.id).trigger("change");
            $this.cargarProvincia(provincia);
            $this.cargarDistrito(distrito);
            // $("#provincia_id").val(provincia.id).trigger("change");
            // $("#distrito_id").val(distrito.id).trigger("change");
        },
        iniciarFormulario: function () {
            let stepper = document.querySelector("#kt_create_account_stepper");
            let stepperObj = new KTStepper(stepper);
            let formSubmitButton = stepper.querySelector(
                '[data-kt-stepper-action="submit"]'
            );
            let formContinueButton = stepper.querySelector(
                '[data-kt-stepper-action="next"]'
            );
            stepperObj.on("kt.stepper.changed", function (stepper) {
                if (stepperObj.getCurrentStepIndex() === 2) {
                    formSubmitButton.classList.remove("d-none");
                    formSubmitButton.classList.add("d-inline-block");
                    formContinueButton.classList.add("d-none");
                } else {
                    formSubmitButton.classList.remove("d-inline-block");
                    formSubmitButton.classList.remove("d-none");
                    formContinueButton.classList.remove("d-none");
                }
            });

            // Validation before going to next page
            stepperObj.on("kt.stepper.next", function (stepper) {
                console.log("stepper.next");
                stepper.goNext();

                KTUtil.scrollTop();
                // Validate form before change stepper step
            });

            // Prev event
            stepperObj.on("kt.stepper.previous", function (stepper) {
                console.log("stepper.previous");
                stepper.goPrevious();
                KTUtil.scrollTop();
            });
            $("#img_avatar_profile").css(
                "background-image",
                "url(" +
                    window.location.origin +
                    "/metronic/media/avatars/blank.png" +
                    ")"
            );
        },
    },
};
</script>
