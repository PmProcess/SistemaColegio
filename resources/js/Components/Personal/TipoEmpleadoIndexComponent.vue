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
                        Tipo de Empleado
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
                            Lista de Tipo Empleados
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
                        data-bs-toggle="modal"
                        data-bs-target="#modalCreateTipoEmpleado"
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
                                    id="tableTipoEmpleados"
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
                                            <th>Tipo</th>
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
            id="modalCreateTipoEmpleado"
            tabindex="-1"
            aria-hidden="true"
        >
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div
                            class="btn btn-sm btn-icon btn-active-color-primary"
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
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                        <!--begin:Form-->
                        <form
                            id="kt_modal_new_target_form"
                            class="form"
                            action="#"
                        >
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <!--begin::Title-->
                                <h1 class="mb-3">Crear Tipo Empleado</h1>
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
                                    <span class="required">Tipo</span>
                                    <i
                                        class="
                                            fas
                                            fa-exclamation-circle
                                            ms-2
                                            fs-7
                                        "
                                        data-bs-toggle="tooltip"
                                        title="Especifica el tipo de empleado"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    placeholder="Ingrese el tipo de empleado"
                                    v-model="modelo.tipo"
                                    name="tipo"
                                />
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
                                        title="Descripcion del tipo de empleado"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <textarea
                                    class="form-control form-control-solid"
                                    rows="3"
                                    name="descripcion"
                                    v-model="modelo.descripcion"
                                    placeholder="Ingrese la descripcion del tipo de empleado"
                                ></textarea>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    @click="registrarTipoEmpleado()"
                                >
                                    <span class="indicator-label">Guardar</span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end:Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
                <div
            class="modal fade"
            id="modalEditTipoEmpleado"
            tabindex="-1"
            aria-hidden="true"
        >
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div
                            class="btn btn-sm btn-icon btn-active-color-primary"
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
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                        <!--begin:Form-->
                        <form
                            id="kt_modal_new_target_form"
                            class="form"
                            action="#"
                        >
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <!--begin::Title-->
                                <h1 class="mb-3">Editar Tipo Empleado</h1>
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
                                    <span class="required">Tipo</span>
                                    <i
                                        class="
                                            fas
                                            fa-exclamation-circle
                                            ms-2
                                            fs-7
                                        "
                                        data-bs-toggle="tooltip"
                                        title="Especifica el tipo de empleado"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <input
                                    type="text"
                                    class="form-control form-control-solid"
                                    placeholder="Ingrese el tipo de empleado"
                                    v-model="modeloEdit.tipo"
                                    name="tipo"
                                />
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
                                        title="Descripcion del tipo de empleado"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <textarea
                                    class="form-control form-control-solid"
                                    rows="3"
                                    name="descripcion"
                                    v-model="modeloEdit.descripcion"
                                    placeholder="Ingrese la descripcion del tipo de empleado"
                                ></textarea>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    @click="editarTipoEmpleado()"
                                >
                                    <span class="indicator-label">Guardar</span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end:Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
    </div>
</template>

<script>
// window.$ = window.jQuery = require('jquery');
import "datatables.net-bs4";
import "datatables.net-buttons-bs4";
export default {
    data() {
        return {
            modelo: {
                tipo: "",
                descripcion: "",
            },
            modeloEdit:{
                tipo:"",
                descripcion:""
            },
            id:"",
            table: null,
        };
    },
    mounted() {
        let $this = this;
        $(document).on("click", ".btn-edit", function () {
            let row = $this.table.row($(this).closest("tr")).data();
            $this.id=row.id
            $this.modeloEdit.tipo=row.tipo
            $this.modeloEdit.descripcion=row.descripcion
            $("#modalEditTipoEmpleado").modal('show')
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
                        .post(route("tipoEmpleado.destroy", row.id))
                        .then((value) => {
                            // $this.table
                            //     .row($(this).closest("tr"))
                            //     .remove()
                            //     .draw();
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
        dataTableInicializacion: function () {
            this.table = $("#tableTipoEmpleados").DataTable({
                bPaginate: true,
                bLengthChange: true,
                bFilter: true,
                bInfo: true,
                bAutoWidth: false,
                processing: true,
                language: {
                    url: window.location.origin + "/Spanish.json",
                },
                ajax: route("tipoEmpleado.getList"),
                columns: [
                    {
                        data: null,
                        className: "text-center",
                        render: function (data) {
                            return data.id;
                        },
                    },
                    {
                        data: null,
                        render: function (data) {
                            return data.tipo;
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
        registrarTipoEmpleado: function () {
            var $this = this;
            toastr.options = this.$helperJs.getOptionToastr();
            if (this.modelo.tipo == "" || this.modelo.descripcion == "") {
                toastr.error("Ingrese todo los datos", "Error");
            } else {
                let data = new FormData();
                data.append("tipo", $this.modelo.tipo);
                data.append("descripcion", $this.modelo.descripcion);
                axios.post(route("tipoEmpleado.store"), data).then((value) => {
                    if (value.data.success) {
                        $this.table.ajax.reload();
                        $("#modalCreateTipoEmpleado").modal("hide");
                    } else {
                        toastr.error("Ocurrio un error");
                    }
                });
            }
        },
        editarTipoEmpleado: function () {
            var $this = this;
            toastr.options = this.$helperJs.getOptionToastr();
            if (this.modeloEdit.tipo == "" || this.modeloEdit.descripcion == "") {
                toastr.error("Ingrese todo los datos", "Error");
            } else {
                let data = new FormData();
                data.append("tipo", $this.modeloEdit.tipo);
                data.append("descripcion", $this.modeloEdit.descripcion);
                axios.post(route("tipoEmpleado.update",$this.id), data).then((value) => {
                    if (value.data.success) {
                        $this.table.ajax.reload();
                        $("#modalEditTipoEmpleado").modal("hide");
                    } else {
                        toastr.error("Ocurrio un error");
                    }
                });
            }
        },
    },
};
</script>
