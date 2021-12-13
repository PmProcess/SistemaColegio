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
                        Rol
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
                            Lista de Roles
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
                    <form :action="ruta" method="POST">
                        <input type="hidden" name="_token" :value="csrf" />
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
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
                                                    >Nombre</span
                                                >
                                                <i
                                                    class="
                                                        fas
                                                        fa-exclamation-circle
                                                        ms-2
                                                        fs-7
                                                    "
                                                    data-bs-toggle="tooltip"
                                                    title="El nombre del rol"
                                                ></i>
                                            </label>
                                            <input
                                                type="text"
                                                autocomplete="current-password"
                                                class="
                                                    form-control
                                                    form-control-solid
                                                    form-control-sm
                                                "
                                                name="name"
                                                v-model="modelo.name"
                                            />
                                            <div
                                                v-if="errores.name.error"
                                                class="
                                                    fv-plugins-message-container
                                                    invalid-feedback
                                                "
                                            >
                                                <div
                                                    data-field="text_input"
                                                    data-validator="notEmpty"
                                                >
                                                    {{ errores.name.mensaje }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
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
                                                    >Alias</span
                                                >
                                                <i
                                                    class="
                                                        fas
                                                        fa-exclamation-circle
                                                        ms-2
                                                        fs-7
                                                    "
                                                    data-bs-toggle="tooltip"
                                                    title="El Alias del rol"
                                                ></i>
                                            </label>
                                            <input
                                                type="text"
                                                autocomplete="current-password"
                                                class="
                                                    form-control
                                                    form-control-solid
                                                    form-control-sm
                                                "
                                                name="slug"
                                                v-model="modelo.slug"
                                            />
                                            <div
                                                v-if="errores.slug.error"
                                                class="
                                                    fv-plugins-message-container
                                                    invalid-feedback
                                                "
                                            >
                                                <div
                                                    data-field="text_input"
                                                    data-validator="notEmpty"
                                                >
                                                    {{ errores.slug.mensaje }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
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
                                                    >Descripcion</span
                                                >
                                                <i
                                                    class="
                                                        fas
                                                        fa-exclamation-circle
                                                        ms-2
                                                        fs-7
                                                    "
                                                    data-bs-toggle="tooltip"
                                                    title="La descripcion del rol"
                                                ></i>
                                            </label>
                                            <textarea
                                                name="description"
                                                v-model="modelo.description"
                                                cols="30"
                                                rows="3"
                                                class="
                                                    form-control
                                                    form-control-solid
                                                    form-control-sm
                                                "
                                            ></textarea>
                                            <div
                                                v-if="errores.description.error"
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
                                                        errores.description.mensaje
                                                    }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
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
                                                    >Full Acceso</span
                                                >
                                                <i
                                                    class="
                                                        fas
                                                        fa-exclamation-circle
                                                        ms-2
                                                        fs-7
                                                    "
                                                    data-bs-toggle="tooltip"
                                                    title="Acceso total a los permisos"
                                                ></i>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-control">
                                                <div
                                                    class="
                                                        custom-control
                                                        custom-radio
                                                        custom-control-inline
                                                    "
                                                >
                                                    <input
                                                        type="radio"
                                                        id="customRadioInline1"
                                                        name="full-access"
                                                        @click="fullacceso()"
                                                        v-model="
                                                            modelo[
                                                                'full-access'
                                                            ]
                                                        "
                                                        class="
                                                            custom-control-input
                                                        "
                                                        value="yes"
                                                    />
                                                    <label
                                                        class="
                                                            custom-control-label
                                                        "
                                                        for="customRadioInline1"
                                                        >Si</label
                                                    >
                                                </div>
                                                <div
                                                    class="
                                                        custom-control
                                                        custom-radio
                                                        custom-control-inline
                                                    "
                                                >
                                                    <input
                                                        type="radio"
                                                        id="customRadioInline2"
                                                        name="full-access"
                                                        v-model="
                                                            modelo[
                                                                'full-access'
                                                            ]
                                                        "
                                                        @click="nofullacceso()"
                                                        class="
                                                            custom-control-input
                                                        "
                                                        value="no"
                                                    />
                                                    <label
                                                        class="
                                                            custom-control-label
                                                        "
                                                        for="customRadioInline2"
                                                        >NO</label
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row mt-4">
                                        <div
                                            class="col-md-6"
                                            v-for="item in permisos"
                                            :key="item.id"
                                        >
                                            <input
                                                type="checkbox"
                                                class="
                                                    custom-control-input
                                                    check
                                                "
                                                v-model="modelo.permission"
                                                :value="item.id"
                                                name="permission[]"
                                            />
                                            <label class="custom-control-label">
                                                {{ item.id }}-{{ item.name }}
                                                <i>({{ item.description }})</i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4" style="float: right">
                                <button
                                    class="btn btn-primary btn-sm"
                                    type="submit"
                                >
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["permisos", "old", "errores_laravel", "csrf", "error"],

    data() {
        return {
            ruta: "",
            modelo: {
                name: null,
                slug: null,
                description: null,
                "full-access": "no",
                permission: [],
            },
            errores: {
                name: {
                    error: false,
                    mensaje: null,
                },
                slug: {
                    error: false,
                    mensaje: null,
                },
                description: {
                    error: false,
                    mensaje: null,
                },
                "full-access": {
                    error: false,
                    mensaje: null,
                },
            },
        };
    },
    created() {
        this.ruta = route("rol.store");
    },
    mounted() {
        let $this = this;
        let old_values = Object.entries(this.old);
        old_values.forEach((value, index, array) => {
            $this.modelo[value[0]] = value[1];
        });
        if (this.errores_laravel != null) {
            let errores_laravel_values = Object.entries(this.errores_laravel);
            errores_laravel_values.forEach((value, index, array) => {
                console.log(value[0]);
                $this.errores[value[0]].error = true;
                $this.errores[value[0]].mensaje = value[1][0];
            });
        }

    },
    methods: {
        fullacceso: function () {
            $(".check").removeAttr("checked");
            $(".check").attr("disabled", true);
        },
        nofullacceso: function () {
            $(".check").removeAttr("disabled");
        },
    },
};
</script>
