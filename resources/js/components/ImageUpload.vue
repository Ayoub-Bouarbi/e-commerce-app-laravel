<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <vue-dropzone 
                ref="myVueDropzone" 
                id="dropzone"
                :vdropzone-success="afterFilesComplete"
                :options="dropzoneOptions">
                </vue-dropzone>
            </div>
        </div>
        <div class="row d-print-none mt-2">
            <div class="col-12 text-right">
                <button class="btn btn-success" type="button" @click="UploadFiles" id="uploadButton">
                    <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        name: 'ImageUpload',
        components: {
            vueDropzone: vue2Dropzone
        },
        props:['url','productId'],   
        data: function () {
            return {
                dropzoneOptions: {
                    url: this.url,
                    acceptedFileTypes: 'image/*',
                    thumbnailWidth: 160,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    uploadMultiple: false,
                    autoProcessQueue: false, 
                    paramName: 'image',
                    params: {
                        productId:this.productId,
                    },
                    headers : {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                    }
                }
            }
        },
        methods: {
            UploadFiles(){ 
                if (this.$refs.myVueDropzone.dropzone.files.length === 0) {
                    this.showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {          
                    this.$refs.myVueDropzone.processQueue()
                }
            },
            afterFilesComplete(file, response) {
                window.location.reload();
                this.showNotification('Completed', 'All product images uploaded', 'success', 'fa-check');
            },
            showNotification(title, message, type, icon) {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                }, {
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        },
    }

</script>
