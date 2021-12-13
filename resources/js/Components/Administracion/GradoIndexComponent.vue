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
                        Grado
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
                            Lista de Grados
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
                        @click="createGrado()"
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
                            <div class="col-md-12">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="modal fade"
            id="modalGrado"
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
                                <h1 class="mb-3">Crear Grado</h1>
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
                                    <span class="required">Grado</span>
                                    <i
                                        class="
                                            fas
                                            fa-exclamation-circle
                                            ms-2
                                            fs-7
                                        "
                                        data-bs-toggle="tooltip"
                                        title="Especifica el Grado"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    placeholder="Ingrese el Grado"
                                    v-model="modelo.grado"
                                    name="grado"
                                />
                                <div
                                    v-if="errores.grado.error"
                                    class="
                                        fv-plugins-message-container
                                        invalid-feedback
                                    "
                                >
                                    <div
                                        data-field="text_input"
                                        data-validator="notEmpty"
                                    >
                                        {{ errores.grado.mensaje }}
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
                                        title="Descripcion del Grado"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <textarea
                                    class="form-control form-control-solid"
                                    rows="3"
                                    name="descripcion"
                                    v-model="modelo.descripcion"
                                    placeholder="Ingrese la descripcion del Grado"
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
import "datatables.net-bs4";
import "datatables.net-buttons-bs4";
export default {
    props: ["csrf", "errores_laravel", "old", "tipo", "id"],

    data() {
        return {
            ruta: "",
            rutaEdit: "",
            modelo: {
                id: null,
                grado: null,
                descripcion: null,
            },
            errores: {
                grado: {
                    error: false,
                    mensaje: "",
                },
                descripcion: {
                    error: false,
                    mensaje: "",
                },
            },
        };
    },
    created() {},
    mounted() {
        let $this = this;
        window.addEventListener("load", () => {
            if ($this.tipo != null) {
                if (this.tipo == "create") {
                    this.ruta = route("grado.store");
                } else if (this.tipo == "edit") {
                    this.ruta = route("grado.update", this.id);
                }
                let old_values = Object.entries(this.old);
                old_values.forEach((value, index, array) => {
                    $this.modelo[value[0]] = value[1];
                });
                let errores_laravel_values = Object.entries(
                    this.errores_laravel
                );
                errores_laravel_values.forEach((value, index, array) => {
                    $this.errores[value[0]].error = true;
                    $this.errores[value[0]].mensaje = value[1][0];
                });
                $("#modalGrado").modal("show");
            }
        });
        $(document).on("click", ".btn-edit", function () {
            let row = $this.table.row($(this).closest("tr")).data();
            $this.limpiarErrores();
            $this.limpiarModelo();
            $this.ruta = route("grado.update",row.id);
            $this.modelo.grado=row.grado
            $this.modelo.descripcion=row.descripcion
            $("#modalGrado").modal("show");
        });
        $(document).on("click", ".btn-delete", function () {
            let row = $this.table.row($(this).closest("tr")).data();
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
                    await axios
                        .post(route("grado.destroy", row.id))
                        .then((value) => {
                            $this.table.ajax.reload();
                            Swal.fire(
                                "Elimando!",
                                "Tu Registro se ha eliminado con Exito",
                                "success"
                            );
                        });
                }
            });
        });
        $this.dataTableInicializacion();
    },
    methods: {
        createGrado: function () {
            this.limpiarErrores();
            this.limpiarModelo();
            this.ruta = route("grado.store");
            $("#modalGrado").modal("show");
        },
        limpiarErrores: function () {
            let $this = this;
            let errores_values = Object.entries(this.errores);
            errores_values.forEach((value, index, array) => {
                $this.errores[value[0]].error=false
                $this.errores[value[0]].mensaje=""
            })
        },
        limpiarModelo: function () {
            let $this = this;
            let create_values = Object.entries(this.modelo);
            create_values.forEach((value, index, array) => {
                $this.modelo[value[0]] = null;
            });
        },
        dataTableInicializacion: function () {
            this.table = $("#tableRoles").DataTable({
                bPaginate: true,
                bLengthChange: true,
                bFilter: true,
                bInfo: true,
                bAutoWidth: false,
                processing: true,
                language: {
                    url: window.location.origin + "/Spanish.json",
                },
                ajax: route("grado.getList"),
                columns: [
                    {
                        data: null,
                        className: "text-center",
                        render: function (data) {
                            data;
                            return data.id;
                        },
                    },
                    {
                        data: null,
                        className: "text-center",
                        render: function (data) {
                            return data.grado;
                        },
                    },
                    {
                        data: null,
                        render: function (data) {
                            return data.descripcion;
                        },
                    },
                    {
                        data: null,
                        render: function (data) {
                            return (
                                "<div class='btn-group'>" +
                                "<button class='btn btn-primary btn-sm btn-edit'><i class='fas fa-pencil-alt'></i></button>" +
                                "<button class='btn btn-danger btn-sm btn-delete'><i class='fa fa-trash'></i></button>" +
                                "</div>"
                            );
                        },
                    },
                ],
            });
        },
    },
};
</script>
