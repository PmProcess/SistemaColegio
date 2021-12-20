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
                            Matricula Create
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
            <div class="container-xxl">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="container mb-4">
                        <form :action="ruta" method="post" id="frm_store">
                            <input type="hidden" name="_token" :value="csrf" />
                            <div class="row">
                                <div class="col-md-6">
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
                                        <span class="required">Alumno</span>
                                        <i
                                            class="
                                                fas
                                                fa-exclamation-circle
                                                ms-2
                                                fs-7
                                            "
                                            data-bs-toggle="tooltip"
                                            title="Especifica el Alumno"
                                        ></i>
                                    </label>
                                    <!--end::Label-->
                                    <select
                                        class="form-select form-select-white"
                                        id="alumno_id"
                                        v-model="modelo.alumno_id"
                                        :class="
                                            errores.alumno_id.error
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        data-control="select2"
                                        data-placeholder="Select an option"
                                    >
                                        <option></option>
                                        <option
                                            v-for="item in alumnos"
                                            :key="item.id"
                                            :value="item.id"
                                        >
                                            {{
                                                item.persona.persona_dni
                                                    .apellidos +
                                                " " +
                                                item.persona.persona_dni.nombres
                                            }}
                                        </option>
                                    </select>
                                    <input
                                        type="hidden"
                                        name="alumno_id"
                                        v-model="modelo.alumno_id"
                                    />
                                </div>
                                <div class="col-md-3">
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
                                        <span class="required"
                                            >Fecha Registro</span
                                        >
                                        <i
                                            class="
                                                fas
                                                fa-exclamation-circle
                                                ms-2
                                                fs-7
                                            "
                                            data-bs-toggle="tooltip"
                                            title="Especifica la Fecha de Registro"
                                        ></i>
                                    </label>
                                    <!--end::Label-->
                                    <input
                                        type="date"
                                        v-model="modelo.fecha_registro"
                                        readonly
                                        class="
                                            form-control
                                            form-control-sm
                                            form-control-solid
                                        "
                                        name="fecha_registro"
                                    />
                                    <div
                                        v-if="errores.fecha_registro.error"
                                        class="
                                            fv-plugins-message-container
                                            invalid-feedback
                                        "
                                    >
                                        <div
                                            data-field="text_input"
                                            data-validator="notEmpty"
                                        >
                                            {{ errores.fecha_registro.mensaje }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                        <span class="required"
                                            >Año escolar</span
                                        >
                                        <i
                                            class="
                                                fas
                                                fa-exclamation-circle
                                                ms-2
                                                fs-7
                                            "
                                            data-bs-toggle="tooltip"
                                            title="Especifica el año escolar"
                                        ></i>
                                    </label>
                                    <!--end::Label-->
                                    <select
                                        class="form-select form-select-white"
                                        id="year_escolar_id"
                                        v-model="modelo.year_escolar_id"
                                        :class="
                                            errores.year_escolar_id.error
                                                ? 'is-invalid'
                                                : ''
                                        "
                                        data-control="select2"
                                        data-placeholder="Select an option"
                                    >
                                        <option></option>
                                        <option
                                            v-for="item in year_escolar"
                                            :key="item.id"
                                            :value="item.id"
                                        >
                                            {{ item.year }}
                                        </option>
                                    </select>
                                    <input
                                        type="hidden"
                                        name="year_escolar_id"
                                        v-model="modelo.year_escolar_id"
                                    />
                                </div>
                                <div class="col-md-3">
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
                                    <select
                                        class="form-select form-select-white"
                                        id="grado"
                                        name="grado"
                                        data-control="select2"
                                        data-placeholder="Select an option"
                                    >
                                        <option></option>
                                        <option
                                            v-for="item in grados"
                                            :key="item.id"
                                            :value="item.id"
                                        >
                                            {{ item.grado }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
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
                                        <span class="required">Seccion</span>
                                        <i
                                            class="
                                                fas
                                                fa-exclamation-circle
                                                ms-2
                                                fs-7
                                            "
                                            data-bs-toggle="tooltip"
                                            title="Especifica la secciones"
                                        ></i>
                                    </label>
                                    <!--end::Label-->
                                    <select
                                        class="form-select form-select-white"
                                        id="grado_seccion_id"
                                        name="grado_seccion_id"
                                        v-model="modelo.grado_seccion_id"
                                        data-control="select2"
                                        data-placeholder="Select an option"
                                    >
                                        <option></option>
                                        <!-- <option
                                        v-for="item in grados.secciones"
                                        :key="item.id"
                                        :value="item.pivot.id"
                                    >
                                        {{ item.seccion }}
                                    </option> -->
                                    </select>
                                    <input
                                        type="hidden"
                                        name="grado_seccion_id"
                                        v-model="modelo.grado_seccion_id"
                                    />
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
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
                                        <span class="required"
                                            >Monto Total</span
                                        >
                                        <i
                                            class="
                                                fas
                                                fa-exclamation-circle
                                                ms-2
                                                fs-7
                                            "
                                            data-bs-toggle="tooltip"
                                            title="Especifica El Monto Total"
                                        ></i>
                                    </label>
                                    <!--end::Label-->
                                    <input
                                        type="number"
                                        v-model="modelo.monto_total"
                                        class="
                                            form-control
                                            form-control-sm
                                            form-control-solid
                                        "
                                        name="monto_total"
                                    />
                                    <div
                                        v-if="errores.monto_total.error"
                                        class="
                                            fv-plugins-message-container
                                            invalid-feedback
                                        "
                                    >
                                        <div
                                            data-field="text_input"
                                            data-validator="notEmpty"
                                        >
                                            {{ errores.monto_total.mensaje }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <table
                                    id="tableCursos"
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
                                            <th>Curso</th>
                                            <th>Descripcion</th>
                                            <th>Seleccionar</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <input
                                type="hidden"
                                name="detalle_matricula"
                                id="detalle_matricula"
                            />
                            <div style="float: right">
                                <button
                                    type="button"
                                    @click="guardar"
                                    class="btn btn-primary"
                                >
                                    <i class="fa fa-plus"></i>Guardar
                                </button>
                            </div>
                        </form>
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
        "alumnos",
        "grados",
        "old",
        "errores_laravel",
        "csrf",
        "error",
        "year_escolar",
    ],
    data() {
        return {
            table: null,
            modelo: {
                alumno_id: null,
                grado_seccion_id: null,
                year_escolar_id: null,
                fecha_registro: null,
                monto_total: null,
            },
            errores: {
                alumno_id: {
                    error: false,
                    mensaje: "",
                },
                grado_seccion_id: {
                    error: false,
                    mensaje: "",
                },
                year_escolar_id: {
                    error: false,
                    mensaje: "",
                },
                fecha_registro: {
                    error: false,
                    mensaje: "",
                },
                monto_total: {
                    error: false,
                    mensaje: "",
                },
            },
            ruta: "",
        };
    },
    created() {
        let fecha = new Date();
        this.modelo.fecha_registro =
            fecha.getFullYear() +
            "-" +
            (fecha.getMonth() + 1 < 10
                ? "0" + fecha.getMonth()
                : fecha.getMonth()) +
            "-" +
            (fecha.getDay() < 10 ? "0" + fecha.getDay() : fecha.getDay());
        console.log(this.grados);
    },
    mounted() {
        let $this = this;
        $this.ruta = route("matricula.store");
        let old_values = Object.entries(this.old);
        old_values.forEach((value, index, array) => {
            if (value[0] != "_token") {
                // if (value[0] == "distrito_id") {
                //     $this.getUbigeoOld(value[1]);
                // } else {
                //     $this.modelo[value[0]] = value[1];
                // }
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
            $("#grado").on("change", function (e) {
                let grado_value = $("#grado").val();
                let grado = $this.grados.find(
                    (element) => element.id == grado_value
                );
                $("#grado_seccion_id").empty().trigger("change");
                grado.secciones.forEach((value, index, array) => {
                    let newOption = new Option(
                        value.seccion,
                        value.pivot.id,
                        false,
                        false
                    );
                    $("#grado_seccion_id").append(newOption).trigger("change");
                });
                $this.table.clear().draw();
                grado.cursos.forEach((value, index, array) => {
                    value.seleccionado = true;
                    $this.table.row.add(value).draw();
                });

                // console.log(grado)
            });
            $("#alumno_id").on("change", function (e) {
                $this.modelo.alumno_id = $("#alumno_id").val();
            });
            $("#year_escolar_id").on("change", function (e) {
                $this.modelo.year_escolar_id = $("#year_escolar_id").val();
            });
            $("#grado_seccion_id").on("change", function (e) {
                $this.modelo.grado_seccion_id = $("#grado_seccion_id").val();
            });
        });
        this.datosInicializacion();

        $(document).on("click", ".check_custom", function (e) {
            $this.table.row($(this).closest("tr")).data().seleccionado =
                !$this.table.row($(this).closest("tr")).data().seleccionado;
        });
    },
    methods: {
        guardar: function () {
            let $this = this;
            let datos = [];
            $this.table
                .rows()
                .data()
                .each(function (value, index) {
                    datos.push({
                        id: value.pivot.id,
                        estado: value.seleccionado ? "SI" : "NO",
                    });
                });
            $("#detalle_matricula").val(JSON.stringify(datos));
            $("#frm_store").submit();
        },
        datosInicializacion: function () {
            this.table = $("#tableCursos").DataTable({
                bPaginate: true,
                bLengthChange: true,
                bFilter: true,
                bInfo: true,
                bAutoWidth: false,
                processing: true,
                language: {
                    url: window.location.origin + "/Spanish.json",
                },
                columns: [
                    {
                        data: null,
                        className: "text-center",
                        width: "40%",
                        render: function (data) {
                            return data.curso;
                        },
                    },
                    {
                        data: null,
                        className: "text-center",
                        width: "40%",
                        render: function (data) {
                            return data.pivot.descripcion;
                        },
                    },
                    {
                        data: null,
                        className: "text-center",
                        render: function (data) {
                            return '<label class="container_custom"><input type="checkbox" class="check_custom" checked="checked"><span class="checkmark"></span></label>';
                        },
                    },
                ],
            });
        },
    },
};
</script>
<style>
/* The container */
.container_custom {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container_custom input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container_custom :hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container_custom input:checked ~ .checkmark {
    background-color: #2196f3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container_custom input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container_custom .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>
