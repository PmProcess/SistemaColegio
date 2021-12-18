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
                        Colegio
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
                            Datos del Colegio
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
                    <form :action="ruta" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" :value="csrf" />
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-md-6">
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
                                                <span class="required"
                                                    >Ruc</span
                                                >
                                                <i
                                                    class="
                                                        fas
                                                        fa-exclamation-circle
                                                        ms-2
                                                        fs-7
                                                    "
                                                    data-bs-toggle="tooltip"
                                                    title="El ruc de colegio"
                                                ></i>
                                            </label>
                                            <input
                                                type="number"
                                                class="
                                                    form-control
                                                    form-control-solid
                                                    form-control-sm
                                                "
                                                name="ruc"
                                                v-model="colegio.ruc"
                                            />
                                        </div>
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
                                                <span class="required"
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
                                                    title="El Telefono de colegio"
                                                ></i>
                                            </label>
                                            <input
                                                type="text"
                                                class="
                                                    form-control
                                                    form-control-solid
                                                    form-control-sm
                                                "
                                                name="telefono"
                                                v-model="colegio.telefono"
                                            />
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
                                                    >Razon Social</span
                                                >
                                                <i
                                                    class="
                                                        fas
                                                        fa-exclamation-circle
                                                        ms-2
                                                        fs-7
                                                    "
                                                    data-bs-toggle="tooltip"
                                                    title="La Razon Social del colegio"
                                                ></i>
                                            </label>
                                            <input
                                                type="text"
                                                class="
                                                    form-control
                                                    form-control-solid
                                                    form-control-sm
                                                "
                                                name="razon_social"
                                                v-model="colegio.razon_social"
                                            />
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
                                                    title="La Direccion del colegio"
                                                ></i>
                                            </label>
                                            <input
                                                type="text"
                                                class="
                                                    form-control
                                                    form-control-solid
                                                    form-control-sm
                                                "
                                                name="direccion"
                                                v-model="colegio.direccion"
                                            />
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
                                                    >Correo</span
                                                >
                                                <i
                                                    class="
                                                        fas
                                                        fa-exclamation-circle
                                                        ms-2
                                                        fs-7
                                                    "
                                                    data-bs-toggle="tooltip"
                                                    title="El Correo del colegio"
                                                ></i>
                                            </label>
                                            <input
                                                type="text"
                                                class="
                                                    form-control
                                                    form-control-solid
                                                    form-control-sm
                                                "
                                                name="correo"
                                                v-model="colegio.correo"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--begin::Image input-->
                                    <div
                                        class="image-input image-input-empty mt-2"
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
                                                class="bi bi-pencil-fill fs-7"
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
    props: ["csrf", "colegio"],
    data() {
        return {
            ruta: null,
        };
    },
    created() {
        this.ruta = route("colegio.store");
    },
    mounted() {
        if (this.colegio.url_imagen == null) {
            $("#img_avatar_profile").css(
                "background-image",
                "url(" +
                    window.location.origin +
                    "/metronic/media/avatars/blank.png" +
                    ")"
            );
        } else {
            $("#img_avatar_profile").css(
                "background-image",
                "url(" +
                    window.location.origin +
                    "/" +
                    this.colegio.url_imagen.replace("public", "storage") +
                    ")"
            );
        }
    },
};
</script>
