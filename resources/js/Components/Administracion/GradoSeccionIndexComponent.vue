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
                        Seccion
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
                            Lista de Seccion
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center py-1">
                    <a
                        href="#"
                        class="btn btn-sm btn-primary"
                        @click="createSeccion()"
                        ><i class="fa fa-plus"></i> Create</a
                    >
                </div>
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
                            <div
                                class="col-md-6 col-lg-4 col-xl-3"
                                v-for="item in secciones"
                                :key="item.id"
                            >
                                <!--begin::Card-->
                                <div class="card h-100">
                                    <!--begin::Card body-->
                                    <div
                                        class="
                                            card-body
                                            d-flex
                                            justify-content-center
                                            text-center
                                            flex-column
                                            p-8
                                        "
                                    >
                                        <!--begin::Name-->
                                        <a
                                            href="#"
                                            class="
                                                text-gray-800 text-hover-primary
                                                d-flex
                                                flex-column
                                            "
                                        >
                                            <!--begin::Image-->
                                            <div
                                                class="symbol symbol-75px mb-5"
                                            >
                                                <img
                                                    :src="
                                                        rutaprincipal +
                                                        'metronic/media/svg/files/folder-document.svg'
                                                    "
                                                    alt=""
                                                />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bolder mb-2">
                                                {{ "Seccion: " + item.seccion }}
                                            </div>
                                            <!--end::Title-->
                                        </a>
                                        <!--end::Name-->
                                        <!--begin::Description-->
                                        <div class="fs-7 fw-bold text-gray-400">
                                            {{
                                                "N alumnos: " +
                                                item.pivot.n_alumnos
                                            }}
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <button
                                                    @click="editSeccion(item)"
                                                    class="
                                                        btn btn-warning btn-sm
                                                    "
                                                >
                                                    <i
                                                        class="
                                                            fas
                                                            fa-pencil-alt
                                                        "
                                                    ></i>
                                                </button>
                                            </div>
                                            <div class="col-md-6">
                                                <button @click="deleteSeccion(item)"
                                                    class="
                                                        btn btn-danger btn-sm
                                                    "
                                                >
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!--end::Description-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!-- <div class="col-md-12">
                                <table
                                    id="tableRoles"
                                    class="
                                        table
                                        table-striped
                                        table-bordered
                                        table-hover
                                    "
                                    style="width: 100%"
                                >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="modal fade"
            id="modalSeccion"
            tabindex="-1"
            aria-hidden="true"
        >
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                    <!--begin::Modal header-->
                    <form :action="ruta" method="POST">
                        <input type="hidden" name="_token" :value="csrf" />
                        <div
                            class="
                                modal-header
                                pb-0
                                border-0
                                justify-content-end
                            "
                        >
                            <!--begin::Close-->
                            <div
                                class="
                                    btn btn-sm btn-icon btn-active-color-primary
                                "
                                data-bs-dismiss="modal"
                            >
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
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
                                            y="17.3137"
                                            width="16"
                                            height="2"
                                            rx="1"
                                            transform="rotate(-45 6 17.3137)"
                                            fill="black"
                                        />
                                        <rect
                                            x="7.41422"
                                            y="6"
                                            width="16"
                                            height="2"
                                            rx="1"
                                            transform="rotate(45 7.41422 6)"
                                            fill="black"
                                        />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div
                            class="
                                modal-body
                                scroll-y
                                px-10 px-lg-15
                                pt-0
                                pb-15
                            "
                        >
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <!--begin::Title-->
                                <h1 class="mb-3">Crear Seccion</h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label
                                    class="
                                        d-flex
                                        align-items-center
                                        fs-6
                                        fw-bold
                                        mb-2
                                    "
                                >
                                    <span class="required">Seccion</span>
                                    <i
                                        class="
                                            fas
                                            fa-exclamation-circle
                                            ms-2
                                            fs-7
                                        "
                                        data-bs-toggle="tooltip"
                                        title="Especifica la seccion"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    placeholder="Ingrese la Seccion"
                                    v-model="modelo.seccion"
                                    name="seccion"
                                />
                                <div
                                    v-if="errores.seccion.error"
                                    class="
                                        fv-plugins-message-container
                                        invalid-feedback
                                    "
                                >
                                    <div
                                        data-field="text_input"
                                        data-validator="notEmpty"
                                    >
                                        {{ errores.seccion.mensaje }}
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label
                                    class="
                                        d-flex
                                        align-items-center
                                        fs-6
                                        fw-bold
                                        mb-2
                                    "
                                >
                                    <span class="required">N° Alumnos</span>
                                    <i
                                        class="
                                            fas
                                            fa-exclamation-circle
                                            ms-2
                                            fs-7
                                        "
                                        data-bs-toggle="tooltip"
                                        title="N° de Alumnos de la seccion"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <input
                                    class="form-control form-control-solid"
                                    name="n_alumnos"
                                    v-model="modelo.n_alumnos"
                                    placeholder="Ingrese el numero de alumnos en la seccion"
                                />
                                <div
                                    v-if="errores.n_alumnos.error"
                                    class="
                                        fv-plugins-message-container
                                        invalid-feedback
                                    "
                                >
                                    <div
                                        data-field="text_input"
                                        data-validator="notEmpty"
                                    >
                                        {{ errores.n_alumnos.mensaje }}
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label
                                    class="
                                        d-flex
                                        align-items-center
                                        fs-6
                                        fw-bold
                                        mb-2
                                    "
                                >
                                    <span class="required">Descripcion</span>
                                    <i
                                        class="
                                            fas
                                            fa-exclamation-circle
                                            ms-2
                                            fs-7
                                        "
                                        data-bs-toggle="tooltip"
                                        title="Descripcion de la Seccion"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <textarea
                                    class="form-control form-control-solid"
                                    rows="3"
                                    name="descripcion"
                                    v-model="modelo.descripcion"
                                    placeholder="Ingrese la descripcion de la Seccion"
                                ></textarea>
                                <div
                                    v-if="errores.descripcion.error"
                                    class="
                                        fv-plugins-message-container
                                        invalid-feedback
                                    "
                                >
                                    <div
                                        data-field="text_input"
                                        data-validator="notEmpty"
                                    >
                                        {{ errores.descripcion.mensaje }}
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Guardar</span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </div>
                    </form>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
    </div>
</template>

<script>
export default {
    props: [
        "old",
        "errores_laravel",
        "error",
        "id",
        "idgrado",
        "csrf",
        "secciones",
        "tipo",
    ],
    data() {
        return {
            ruta: null,
            rutaprincipal: null,
            modelo: {
                seccion: null,
                n_alumnos: null,
                descripcion: null,
            },
            errores: {
                seccion: {
                    error: false,
                    mensaje: "",
                },
                descripcion: {
                    error: false,
                    mensaje: "",
                },
                n_alumnos: {
                    error: false,
                    mensaje: "",
                },
            },
        };
    },
    created() {
        let $this = this;
        $this.rutaprincipal = window.location.origin + "/";
        if (this.errores_laravel != null) {
            let errores_laravel_values = Object.entries(this.errores_laravel);
            errores_laravel_values.forEach((value, index, array) => {
                $this.errores[value[0]].error = true;
                $this.errores[value[0]].mensaje = value[1][0];
            });
        }
        let old_values = Object.entries(this.old);
        old_values.forEach((value, index, array) => {
            if (value != "_token") {
                $this.modelo[value[0]] = value[1];
            }
        });
        window.addEventListener("load", () => {
            if ($this.tipo != null) {
                if ($this.tipo == "create") {
                    $this.ruta = route("grado.seccion.store", {
                        grado_id: $this.idgrado,
                    });
                } else {
                    $this.ruta = route("grado.seccion.update", {
                        grado_id: $this.idgrado,
                        id: $this.id,
                    });
                }
                $("#modalSeccion").modal("show");
            }
        });
    },
    methods: {
        createSeccion: function () {
            this.ruta = route("grado.seccion.store", {
                grado_id: this.idgrado,
            });
            $("#modalSeccion").modal("show");
        },
        editSeccion: function (item) {
            let $this = this;
            $this.ruta = route("grado.seccion.update", {
                id: item.id,
                grado_id: item.pivot.grado_id,
            });
            $this.modelo.seccion = item.seccion;
            $this.modelo.n_alumnos = item.pivot.n_alumnos;
            $this.modelo.descripcion = item.pivot.descripcion;
            $("#modalSeccion").modal("show");
        },
        deleteSeccion: function (item) {
            Swal.fire({
                title: "Estas Seguro?",
                text: "Tu deseas eliminar este Registro",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar",
            }).then(async (result) => {
                if (result.isConfirmed) {
                    window.location.href = route("grado.seccion.destroy", {
                        id: item.id,
                        grado_id: item.pivot.grado_id,
                    });
                }
            });
        },
    },
};
</script>
