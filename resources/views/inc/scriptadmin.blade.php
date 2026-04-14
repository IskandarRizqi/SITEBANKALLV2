<!-- BEGIN: JS Assets-->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
<script src="{{asset('admin/dist/js/app.js')}}"></script>

<script src="{{asset('plugin/jquery/jquery-3.7.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
<!-- END: JS Assets-->

{{-- BEGIN: Custom Inline Script --}}
<script>
    var quilldefaulteditor = null;
    Quill.register('modules/imageResize', QuillResizeModule);
    $(document).ready(function () {
        showToast();
        var dttbl = new DataTable('#datatabledefault');
        deletemodal = tailwind.Modal.getOrCreateInstance(document.querySelector("#delete-confirmation-modal"));
        $('input[type="file"]').each(function (i, e) {
            displayfilepreview($(this), $(this).parent(), i);
        });
        
        quilldefaulteditor = new Quill('#quilldefaulteditor', {
            theme: 'snow',
            modules: {
                imageResize: {
                    modules: [ 'Resize', 'DisplaySize', 'Toolbar' ]
                },
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    ['link', 'image', 'formula'],
                ]
            }
        });
    });

    function displayfilepreview(t, p, i) {
        if(t.attr('dat-showpreview') == 'true') {
            t.on('change', function () {
                var filarr = this.files;
                for (let j = 0; j < filarr.length; j++) {
                    const f = filarr[j];
                    var src = URL.createObjectURL(f);
                    if ($('img.showpreviewfile_' + i + '_' + j).length == 0) {
                        p.append('<img src="' + src + '" class="showpreviewfile_' + i + '_' + j + ' mt-2" style="width:100%;max-height:130px;max-width:130px;">')
                    } else {
                        $('img.showpreviewfile_' + i + '_' + j).attr('src', src);
                    }
                }
                if (filarr.length <= 0) {
                    $('img[class^="showpreviewfile_' + i + '_"]').remove();
                }
                // var src = URL.createObjectURL(this.files[0]);
                // if ($('img.showpreviewfile_' + i).length == 0) {
                //     p.append('<img src="' + src + '" class="showpreviewfile_' + i + ' mt-2" style="width:100%;max-height:130px;max-width:130px;">')
                // } else {
                //     $('img.showpreviewfile_' + i).attr('src', src);
                // }
            })
        }
    }
    function htmlDecode(value) {
        return $("<textarea/>").html(value).text();
    }
    function confirmdelete(t) {
        $('#formdelete').attr('action', t);
        deletemodal.show();
    }
    function showToast() {
        let s = $('#showToastsuccess').val();
        let e = $('#showToasterror').val();
        let i = $('#showToastinfo').val();
        
        if(s != '') {
            Toastify({
            text: s,
            className: "success",
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            duration: 10000,
            close: true,
            }).showToast();
        }
        if(e != '') {
            Toastify({
            text: e,
            className: "error",
            style: {
                background: "linear-gradient(to right, #B00000, #AAB000)",
            },
            duration: 10000,
            close: true,
            }).showToast();
        }
        if(i != '') {
            Toastify({
            text: i,
            className: "info",
            style: {
                background: "linear-gradient(to right, #0900B0, #00b09b)",
            },
            duration: 10000,
            close: true,
            }).showToast();
        }
    }
</script>
{{-- END: Custom Inline Script --}}