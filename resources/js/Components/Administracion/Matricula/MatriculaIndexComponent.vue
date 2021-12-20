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
                        Matricula
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
                            Lista de Matriculas
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
                        @click="createMatricula()"
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
                                    id="tableMatriculas"
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
                                            <th>Alumno</th>
                                            <th>N°Cursos</th>
                                            <th>Grado-Seccion</th>
                                            <th>Monto Total</th>
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
    </div>
</template>

<script>
import "datatables.net-bs4";
import "datatables.net-buttons-bs4";
export default {
    data() {
        return {
            table:null
        };
    },
    mounted() {
        let $this=this;
        $(document).on("click", ".btn-edit", function () {
            let row = $this.table.row($(this).closest("tr")).data();
            window.location.href = route("matricula.edit", row.id);
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
                    window.location.href=route("matricula.destroy", row.id)
                }
            });
        });
        $this.dataTableInicializacion();
    },
    methods: {
        createMatricula:function(){
            window.location.href=route('matricula.create')
        },
        dataTableInicializacion: function () {
            this.table = $("#tableMatriculas").DataTable({
                bPaginate: true,
                bLengthChange: true,
                bFilter: true,
                bInfo: true,
                bAutoWidth: false,
                processing: true,
                language: {
                    url: window.location.origin + "/Spanish.json",
                },
                ajax: route("matricula.getList"),
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
                        className: "text-center",
                        render: function (data) {
                            return data.alumno.persona.persona_dni.apellidos+" "+data.alumno.persona.persona_dni.nombres;
                        },
                    },
                    {
                        data: null,
                        className: "text-center",
                        render: function (data) {
                            return data.n_cursos;
                        },
                    },
                    {
                        data: null,
                        className: "text-center",
                        render: function (data) {
                            console.log(data)
                            return data.grado_seccion.grado.grado+"-"+data.grado_seccion.seccion.seccion;
                        },
                    },
                    {
                        data: null,
                        render: function (data) {
                            return data.monto_total;
                        },
                    },
                    {
                        data: null,
                        render: function (data) {
                            return (
                                "<div class='btn-group'>" +
                                // "<button class='btn btn-primary btn-sm btn-edit'><i class='fas fa-pencil-alt'></i></button>" +
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
