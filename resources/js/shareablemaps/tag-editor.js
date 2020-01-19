export default class TagEditor {

    constructor() {
        this.swal = window.shareablemaps.swal
    }

    setupEventListeners() {
        $('.editTag').click((e) => {
            e.preventDefault()
            this.editTag($(e.target).data('tagid'), $(e.target).data('tagname'))
        })
    }

    editTag(tagId, tagName) {
        this.swal.fire({
                title: 'Edit Tag',
                backdrop: false,
                input: 'text',
                inputValue: tagName,
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Save Tag',
                allowOutsideClick: () => !this.swal.isLoading()
            })
            .then((name) => {
                axios.post(`${window.shareablemaps.APP_URL}/admin/tags/`, {
                    id: tagId,
                    name: name.value
                }).then(response => {
                    this.swal.fire({
                        title: 'Saved!',
                        text: response.data,
                        icon: 'success'
                    }).then(() => {
                        // reload
                        window.location = `${window.shareablemaps.APP_URL}/admin/tags`
                    })
                }).catch((error) => {
                    this.swal.fire({
                        icon: 'error',
                        text: error
                    })
                })
            })
    }
}
