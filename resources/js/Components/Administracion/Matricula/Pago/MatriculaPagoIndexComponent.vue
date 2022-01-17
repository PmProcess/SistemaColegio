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
                        Pagos
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
                            Lista de Pagos
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
                        @click="createPago()"
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
                                v-for="item in pagos"
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
                                                        '/metronic/media/svg/files/folder-document.svg'
                                                    "
                                                    alt=""
                                                />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="fs-5 fw-bolder mb-2">
                                                {{ "Pago: " + item.total }}
                                            </div>
                                            <!--end::Title-->
                                        </a>
                                        <!--end::Name-->
                                        <!--begin::Description-->
                                        <div class="fs-7 fw-bold text-gray-400">
                                            {{
                                                "Persona : " +
                                                item.nombre_cliente
                                            }}
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <button
                                                    @click="editPago(item)"
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
                                                <button
                                                    @click="deletePago(item)"
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
        <div class="modal fade" id="modalPago" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                    <!--begin::Modal header-->
                    <form
                        :action="ruta"
                        method="POST"
                        enctype="multipart/form-data"
                    >
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
                                <h1 class="mb-3">
                                    Monto Restante:
                                    {{ matricula.monto_deuda }}
                                </h1>
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
                                    <span class="required">Tipo Documento</span>
                                    <i
                                        class="
                                            fas
                                            fa-exclamation-circle
                                            ms-2
                                            fs-7
                                        "
                                        data-bs-toggle="tooltip"
                                        title="Especifica el tipo de documento"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <select
                                    class="form-select form-select-white"
                                    name="tipo_documento_id"
                                    id="tipo_documento_id"
                                    v-model="modelo.tipo_documento_id"
                                    data-control="select2"
                                    :class="
                                        errores.tipo_documento_id.error
                                            ? 'is-invalid'
                                            : ''
                                    "
                                    data-placeholder="Seleciona una opcion"
                                >
                                    <option value=""></option>
                                    <option
                                        v-for="item in tiposdocumentos"
                                        :key="item.id"
                                        :value="item.id"
                                    >
                                        {{ item.tipo }}
                                    </option>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row">
                                <div class="col-md-4">
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
                                            <span class="required"
                                                >Documento</span
                                            >
                                            <i
                                                class="
                                                    fas
                                                    fa-exclamation-circle
                                                    ms-2
                                                    fs-7
                                                "
                                                data-bs-toggle="tooltip"
                                                title="Especifica el numero de documento"
                                            ></i>
                                        </label>
                                        <!--end::Label-->
                                        <input
                                            class="
                                                form-control form-control-solid
                                            "
                                            name="documento"
                                            type="text"
                                            v-model="modelo.documento"
                                            placeholder="Ingrese el Nombre del cliente"
                                        />
                                        <div
                                            v-if="errores.documento.error"
                                            class="
                                                fv-plugins-message-container
                                                invalid-feedback
                                            "
                                        >
                                            <div
                                                data-field="text_input"
                                                data-validator="notEmpty"
                                            >
                                                {{ errores.documento.mensaje }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
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
                                            <span class="required">Nombre</span>
                                            <i
                                                class="
                                                    fas
                                                    fa-exclamation-circle
                                                    ms-2
                                                    fs-7
                                                "
                                                data-bs-toggle="tooltip"
                                                title="Especifica el nombre del cliente"
                                            ></i>
                                        </label>
                                        <!--end::Label-->
                                        <input
                                            class="
                                                form-control form-control-solid
                                            "
                                            name="nombre_cliente"
                                            type="text"
                                            v-model="modelo.nombre_cliente"
                                            placeholder="Ingrese el Nombre del cliente"
                                        />
                                        <div
                                            v-if="errores.nombre_cliente.error"
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
                                                    errores.nombre_cliente
                                                        .mensaje
                                                }}
                                            </div>
                                        </div>
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
                                    <span class="required">Monto Total</span>
                                    <i
                                        class="
                                            fas
                                            fa-exclamation-circle
                                            ms-2
                                            fs-7
                                        "
                                        data-bs-toggle="tooltip"
                                        title="monto total"
                                    ></i>
                                </label>
                                <!--end::Label-->
                                <input
                                    class="form-control form-control-solid"
                                    name="total"
                                    type="number"
                                    v-model="modelo.total"
                                    placeholder="Ingrese el monto Total"
                                />
                                <div
                                    v-if="errores.total.error"
                                    class="
                                        fv-plugins-message-container
                                        invalid-feedback
                                    "
                                >
                                    <div
                                        data-field="text_input"
                                        data-validator="notEmpty"
                                    >
                                        {{ errores.total.mensaje }}
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <div class="text-center">
                                <!--begin::Image input-->
                                <div
                                    class="image-input image-input-empty"
                                    id="img_avatar_profile"
                                    style="
                                        width: 100%;
                                        background-size: 100% 100%;
                                    "
                                    data-kt-image-input="true"
                                >
                                    <!--begin::Image preview wrapper-->
                                    <div
                                        class="image-input-wrapper h-300px"
                                        style="
                                            width: 100% !important;
                                            background-size: 100% 100%;
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
                                        <i class="bi bi-pencil-fill fs-7"></i>
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
                                        <i class="bi bi-x fs-2"></i>
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
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove button-->
                                </div>
                                <!--end::Image input-->
                            </div>

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
        "tiposdocumentos",
        "clientes",
        "csrf",
        "pagos",
        "matricula",
        "validaciones",
        "vista",
        "old",
        "elemento",
    ],
    data() {
        return {
            ruta: "",
            rutaprincipal: "",
            modelo: {
                tipo_documento_id: "",
                documento: "",
                nombre_cliente: "",
                total: "",
            },
            errores: {
                tipo_documento_id: {
                    error: false,
                    mensaje: "",
                },
                documento: {
                    error: false,
                    mensaje: "",
                },
                nombre_cliente: {
                    error: false,
                    mensaje: "",
                },
                total: {
                    error: false,
                    mensaje: "",
                },
            },
        };
    },
    created() {
        this.rutaprincipal = window.location.origin;
    },
    mounted() {
        let $this = this;
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
        //------------------------
        if (this.validaciones != null) {
            let validaciones_values = Object.entries(this.validaciones);
            validaciones_values.forEach((value, index, array) => {
                $this.errores[value[0]].error = true;
                $this.errores[value[0]].mensaje = value[1][0];
            });
        }
        //--------------------
        window.addEventListener("load", function (e) {
            if ($this.vista != null) {
                if ($this.vista == "create") {
                    $this.ruta = route("matricula.pago.store", {
                        matricula_id: $this.matricula.id,
                    });
                } else {
                    $this.ruta = route("matricula.pago.update", {
                        id: $this.elemento.id,
                        matricula_id: $this.matricula.id,
                    });
                }
                $("#modalPago").modal("show");
            }
            $("#img_avatar_profile").css(
                "background-image",
                "url(" +
                    window.location.origin +
                    "/metronic/media/avatars/blank.png" +
                    ")"
            );
            $("#tipo_documento_id").on("change", function (e) {
                $this.modelo.tipo_documento_id = $("#tipo_documento_id").val();
            });
        });
    },
    methods: {
        createPago: function () {
            if (this.matricula.monto_deuda > 0) {
                this.ruta = route("matricula.pago.store", {
                    matricula_id: this.matricula.id,
                });
                $("#modalPago").modal("show");
            } else {
                toastr.error("La matricula ya esta pagada completamente");
            }
        },
        editPago: function (item) {
            console.log(item);
            this.ruta = route("matricula.pago.update", {
                id: item.id,
                matricula_id: this.matricula.id,
            });
            $("#tipo_documento_id")
                .val(item.tipo_documento_id)
                .trigger("change");
            this.modelo.documento = item.documento;
            this.modelo.nombre_cliente = item.nombre_cliente;
            this.modelo.total = item.total;
            this.modelo.tipo_documento_id = item.tipo_documento_id;
            if (item.url_imagen != null) {
                console.log("lllgfd")
                $("#img_avatar_profile").css(
                    "background-image",
                    "url(" +
                        window.location.origin +
                        "/" +
                        +item.url_imagen.replace("public", "storage") +
                        ")"
                );
            }
            $("#modalPago").modal("show");
        },
        deletePago: function (item) {
            let $this = this;
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
                    window.location.href = route("matricula.pago.destroy", {
                        id: item.id,
                        matricula_id: $this.matricula.id,
                    });
                }
            });
        },
    },
};
</script>
